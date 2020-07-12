<?php

// XOOPS2 - Auth version 1
// Presented by ADMIN @ ROUTE286, 2004.

require ( '../../mainfile.php' );
require ( 'config.php' );

if ( empty($xoopsUser) )
{
    $user = "/guest";
}
else
{
    $user = $xoopsUser->getVar('uname','E');
}

$inserver = $_SERVER;

$url = XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/index.php"
     . $auth_delimiter;
$files = XOOPS_URL . "/modules/" . $xoopsModule->dirname() . "/files/";
$paths = XOOPS_ROOT_PATH . "/modules/" . $xoopsModule->dirname()
       . "/index.php" . $auth_delimiter;

if ( ( $auth_user [ $user ] == "" )
  && ( $auth_user ['/default'] == $auth_deny ) )
{
    redirect_header ( XOOPS_URL , 0 , _AT_ACCESS_DENIED );
}

if ( $auth_user [ $user ] == $auth_deny )
{
    redirect_header ( XOOPS_URL , 0 , _AT_ACCESS_DENIED );
}

if ( $auth_delimiter != "?" )
{
    $page = $_SERVER['PATH_INFO'];
}
else
{
    $page = "?" . $_SERVER['QUERY_STRING'];
}

if ( preg_match ( "/\:/" , $page ) )
{
    echo "XOOPS - Auth modules :-)";
    exit ();
}

if ( ( $page == "" )
  || ( preg_match ( "/\/$/" , $page ) )
  || ( preg_match ( "/\?$/" , $page ) )
  || ( preg_match ( "/index\.php$/" , $page ) ) )
{
    $url = XOOPS_URL . "/modules/" . $xoopsModule->dirname();

    if ( ! $auth_user [ $user ] == "" )
    {
        $next = $auth_user [ $user ];
    }
    else
    {
        $next = $auth_user ['/default'];
    }

    if ( preg_match ( "/\:/" , $next ) )
    {
        if ( $auth_redirect == 0 )
        {
            header ( "Location: $next" );
            exit ();
        }
        else
        {
            redirect_header ( $next , 0 , _AT_REDIRECT );
            exit ();
        }
    }
    else if ( ( $next != "" ) && ( $next != "index.php" ) )
    {
        if ( $auth_redirect == 0 )
        {
            header ( "Location: $url/index.php" . $auth_delimiter . $next );
            exit ();
        }
        else
        {
            redirect_header ( "$url/index.php" . $auth_delimiter . $next
                            , 5 , _AT_REDIRECT );
            exit ();
        }
    }
    else
    {
        redirect_header ( XOOPS_URL , 0 , _AT_ACCESS_DENIED );
        exit ();
    }
}

if ( $auth_delimiter != "/" )
{
    $page = "/" . substr ( $page , 1 );
}

$page = $auth_dir . $page;

if ( ! is_file ( $page ) )
{
    redirect_header ( XOOPS_URL , 0 , _AT_NOT_FOUND );
}

if ( ( strpos ( $page , ".html")  !== false )
  || ( strpos ( $page , ".php")   !== false )
  || ( strpos ( $page , ".cgi")   !== false ) )
{
   include ( XOOPS_ROOT_PATH . '/header.php' );
}
else
{
   $ext = substr ( strrchr ( $page , "." ) , 1 );

   if ( $auth_mimetype [ $ext ] == "" )
   {
       header ( "Content-Type: application/octet-stream" );
   }
   else
   {
       $set_mimetype = $auth_mimetype [ $ext ];
       header ( "Content-Type: $set_mimetype" );
   }
}

if ( ( strpos ( $page , ".html") !== false )
  || ( strpos ( $page , ".htm")  !== false )
  || ( strpos ( $page , ".php")  !== false )
  || ( strpos ( $page , ".php5") !== false )
  || ( strpos ( $page , ".php4") !== false )
  || ( strpos ( $page , ".php3") !== false ) )
{
    include_once ( $page );
}
else if ( ( strpos ( $page , ".cgi") !== false )
       || ( strpos ( $page , ".pl")  !== false ) )
{
    foreach ( $inserver as $name => $value )
    {
        putenv ( $name . "=" . $value );
    }

    foreach ( $_POST as $name => $value )
    {
        if ( ! $inpost == "" )
        {
            $inpost .= "&";
        }

        $inpost .= urlencode ( $name ) . "=" . urlencode ( $value );
    }

    putenv ( "POST_DATA="  . $inpost );
    putenv ( "URL_DATA="   . $url );
    putenv ( "PATHS_DATA=" . $paths );
    putenv ( "FILES_DATA=" . $files );
    putenv ( "USER_DATA="  . $user );

    if ( ! empty($xoopsUser) )
    {
        if ( is_object ( $xoopsUser ) && $xoopsUser->isAdmin() )
        {
            putenv ( "USER_DATA_ADMIN=" . $xoopsUser->getVar('uname') );
        }

        putenv ( "USER_DATA_UID="     . $xoopsUser->getVar('uid') );
        putenv ( "USER_DATA_UNAME="   . $xoopsUser->getVar('uname') );
        putenv ( "USER_DATA_AVATAR="  . $xoopsUser->getVar('user_avatar') );
        putenv ( "USER_DATA_NAME="    . $xoopsUser->getVar('name') );
        putenv ( "USER_DATA_URL="     . $xoopsUser->getVar('url') );
        putenv ( "USER_DATA_MAIL="    . $xoopsUser->getVar('email') );

        if ( $xoopsUser->getVar('user_viewemail') == 1 )
        {
            putenv ( "USER_DATA_EMAIL=". $xoopsUser->getVar('email') );
        }

        putenv ( "USER_DATA_ICQ="     . $xoopsUser->getVar('user_icq') );
        putenv ( "USER_DATA_AIM="     . $xoopsUser->getVar('user_aim') );
        putenv ( "USER_DATA_YIM="     . $xoopsUser->getVar('user_yim') );
        putenv ( "USER_DATA_MSNM="    . $xoopsUser->getVar('user_msnm') );
        putenv ( "USER_DATA_FROM="    . $xoopsUser->getVar('user_from') );
        putenv ( "USER_DATA_OCC="     . $xoopsUser->getVar('user_occ') );
        putenv ( "USER_DATA_INTREST=" . $xoopsUser->getVar('user_intrest') );
    }

    passthru ( $page );
}
else
{
    $filename = substr ( strrchr ( $page , "/" ) , 1 );
    $filesize = filesize ( $page );

    mb_http_output ( "pass" );
//    header ( "Content-Disposition: inline; filename=$filename" );
    header ( "Content-length: $filesize" );
    header ( "Cache-Control: public" );
    header ( "Pragma: public" );
    readfile ( $page );
}

if ( ( strpos ( $page , ".html")  !== false )
  || ( strpos ( $page , ".php")   !== false )
  || ( strpos ( $page , ".cgi")   !== false ) )
{
    include ( XOOPS_ROOT_PATH . '/footer.php' );
}

?>
