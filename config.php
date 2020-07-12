<?php

// XOOPS2 - Auth version 1
// Presented by ADMIN @ ROUTE286, 2004.


// ● 認証ディレクトリ(フォルダ)
// このディレクトリ下に置かれたファイルは
// XOOPS の認証を経由して参照できます。
// 　ディレクトリ名のみの場合は
// 　auth ディレクトリの下に置かれたディレクトリです。
// 　このソースを知っている人から直接参照されるのを逃れるため、
// 　必ず sample から変更して下さい。

$auth_dir = "authpage";

// 　直接指定も可能です。
// 　できれば URL で参照できない場所に置くのがベストです。
// 　$auth_dir = "/home/user/page";


// ● 区切り(デリミタ)
// 通常はこのままで構いません。index.php/ファイル名 となります。
// Apache 1.3 以外のサーバで PATH_INFO の取得ができない設定にしてある場合は
// "?" に変更して下さい。index.php?ファイル名 となります。

$auth_delimiter = "/";


// ● ページ変更の方法
// 0 = Location を用いる……通常はこのままで構いません。
// 1 = redirect_header を用いる……バナー広告が自動追加される環境はこちら。

$auth_redirect = 0;


// ● 拒否する文字列
// 以下「許可・拒否するユーザ群」の値で以下に記載した文字列を入れた場合、
// 拒否され、参照できません。

$auth_deny = "/deny/";


// ● ユーザの許可・拒否およびデフォルトファイル名
// "ユーザ名" => "ファイル名・URL または 拒否文字列", です。
// 　ユーザ名は /guest でログインしていない状態での制御となります。
// 　また、/default で記載されていないユーザの状態となります。
// ファイル名は XOOPS/modules/auth/ のみで入った際に参照されるファイル名です。
// index.html 等であっても省略せずに記載して下さい。
// index.php は使用できません。index.html や default.php 等に変えて下さい。
// 　URL も記載できます。その URL へ飛ばす事ができます。
// 　http:// https:// 等も省略せずに記載して下さい。
// 「拒否する文字列」に記載された文字列を入れるとそのユーザは拒否となります。

$auth_user = array (
	"/default"	=> "../index.html" );

//$auth_user = array (
//	"user123"	=> "user.html",
//	"user234"	=> "user.html",
//	"userurl"	=> "http://url.com/user.html",
//	"/guest"	=> "/deny/",
//	"/default"	=> "index.html" );


// ● Content-Type に入れる MIME-TYPE
// "拡張子" => "MIME-TYPE", です。
// 記載されていない拡張子を表示する場合は追記して下さい。

$auth_mimetype = array (
	"ai"	=> "application/postscript" ,
	"aif"	=> "audio/x-aiff" ,
	"aifc"	=> "audio/x-aiff" ,
	"aiff"	=> "audio/x-aiff" ,
	"asc"	=> "text/plain" ,
	"au"	=> "audio/basic" ,
	"avi"	=> "video/x-msvideo" ,
	"bcpio"	=> "application/x-bcpio" ,
	"bin"	=> "application/octet-stream" ,
	"bmp"	=> "image/bmp" ,
	"cdf"	=> "application/x-netcdf" ,
	"class"	=> "application/octet-stream" ,
	"cpio"	=> "application/x-cpio" ,
	"cpt"	=> "application/mac-compactpro" ,
	"csh"	=> "application/x-csh" ,
	"css"	=> "text/css" ,
	"dcr"	=> "application/x-director" ,
	"dir"	=> "application/x-director" ,
	"djv"	=> "image/vnd.djvu" ,
	"djvu"	=> "image/vnd.djvu" ,
	"dll"	=> "application/octet-stream" ,
	"dms"	=> "application/octet-stream" ,
	"doc"	=> "application/msword" ,
	"dvi"	=> "application/x-dvi" ,
	"dxr"	=> "application/x-director" ,
	"eps"	=> "application/postscript" ,
	"etx"	=> "text/x-setext" ,
	"exe"	=> "application/octet-stream" ,
	"ez"	=> "application/andrew-inset" ,
	"gif"	=> "image/gif" ,
	"gtar"	=> "application/x-gtar" ,
	"hdf"	=> "application/x-hdf" ,
	"hqx"	=> "application/mac-binhex40" ,
	"htm"	=> "text/html" ,
	"html"	=> "text/html" ,
	"ice"	=> "x-conference/x-cooltalk" ,
	"ief"	=> "image/ief" ,
	"iges"	=> "model/iges" ,
	"igs"	=> "model/iges" ,
	"jpe"	=> "image/jpeg" ,
	"jpeg"	=> "image/jpeg" ,
	"jpg"	=> "image/jpeg" ,
	"js"	=> "application/x-javascript" ,
	"kar"	=> "audio/midi" ,
	"latex"	=> "application/x-latex" ,
	"lha"	=> "application/octet-stream" ,
	"lzh"	=> "application/octet-stream" ,
	"m3u"	=> "audio/x-mpegurl" ,
	"man"	=> "application/x-troff-man" ,
	"me"	=> "application/x-troff-me" ,
	"mesh"	=> "model/mesh" ,
	"mid"	=> "audio/midi" ,
	"midi"	=> "audio/midi" ,
	"mif"	=> "application/vnd.mif" ,
	"mov"	=> "video/quicktime" ,
	"movie"	=> "video/x-sgi-movie" ,
	"mp2"	=> "audio/mpeg" ,
	"mp3"	=> "audio/mpeg" ,
	"mpe"	=> "video/mpeg" ,
	"mpeg"	=> "video/mpeg" ,
	"mpg"	=> "video/mpeg" ,
	"mpga"	=> "audio/mpeg" ,
	"ms"	=> "application/x-troff-ms" ,
	"msh"	=> "model/mesh" ,
	"mxu"	=> "video/vnd.mpegurl" ,
	"nc"	=> "application/x-netcdf" ,
	"oda"	=> "application/oda" ,
	"pbm"	=> "image/x-portable-bitmap" ,
	"pdb"	=> "chemical/x-pdb" ,
	"pdf"	=> "application/pdf" ,
	"pgm"	=> "image/x-portable-graymap" ,
	"pgn"	=> "application/x-chess-pgn" ,
	"png"	=> "image/png" ,
	"pnm"	=> "image/x-portable-anymap" ,
	"ppm"	=> "image/x-portable-pixmap" ,
	"ppt"	=> "application/vnd.ms-powerpoint" ,
	"ps"	=> "application/postscript" ,
	"qt"	=> "video/quicktime" ,
	"ra"	=> "audio/x-realaudio" ,
	"ram"	=> "audio/x-pn-realaudio" ,
	"ras"	=> "image/x-cmu-raster" ,
	"rgb"	=> "image/x-rgb" ,
	"rm"	=> "audio/x-pn-realaudio" ,
	"roff"	=> "application/x-troff" ,
	"rpm"	=> "audio/x-pn-realaudio-plugin" ,
	"rtf"	=> "text/rtf" ,
	"rtx"	=> "text/richtext" ,
	"sgm"	=> "text/sgml" ,
	"sgml"	=> "text/sgml" ,
	"sh"	=> "application/x-sh" ,
	"shar"	=> "application/x-shar" ,
	"silo"	=> "model/mesh" ,
	"sit"	=> "application/x-stuffit" ,
	"skd"	=> "application/x-koan" ,
	"skm"	=> "application/x-koan" ,
	"skp"	=> "application/x-koan" ,
	"skt"	=> "application/x-koan" ,
	"snd"	=> "audio/basic" ,
	"so"	=> "application/octet-stream" ,
	"spl"	=> "application/x-futuresplash" ,
	"src"	=> "application/x-wais-source" ,
	"sv4crc"	=> "application/x-sv4cpio" ,
	"swf"	=> "application/x-shockwave-flash" ,
	"t"	=> "application/x-troff" ,
	"tar"	=> "application/x-tar" ,
	"tcl"	=> "application/x-tcl" ,
	"tex"	=> "application/x-tex" ,
	"texi"	=> "application/x-texinfo" ,
	"texinfo"	=> "application/x-texinfo" ,
	"tif"	=> "image/tiff" ,
	"tiff"	=> "image/tiff" ,
	"tr"	=> "application/x-troff" ,
	"tsv"	=> "text/tab-separated-values" ,
	"txt"	=> "text/plain" ,
	"ustar"	=> "application/x-ustar" ,
	"vcd"	=> "application/x-cdlink" ,
	"vrml"	=> "model/vrml" ,
	"wav"	=> "audio/x-wav" ,
	"wbmp"	=> "image/vnd.wap.wbmp" ,
	"wbxml"	=> "application/vnd.wap.wbxml" ,
	"wml"	=> "text/vnd.wap.wml" ,
	"wmlc"	=> "application/vnd.wap.wmlc" ,
	"wmls"	=> "text/vnd.wap.wmlscript" ,
	"wmlsc"	=> "application/vnd.wap.wmlscriptc" ,
	"wrl"	=> "model/vrml" ,
	"xbm"	=> "image/x-xbitmap" ,
	"xht"	=> "application/xhtml+xml" ,
	"xhtml"	=> "application/xhtml+xml" ,
	"xls"	=> "application/vnd.ms-excel" ,
	"xml"	=> "text/xml" ,
	"xpm"	=> "image/x-xpixmap" ,
	"xsl"	=> "text/xml" ,
	"xwd"	=> "image/x-xwindowdump" ,
	"xyz"	=> "chemical/x-xyz" ,
	"zip"	=> "application/zip" );


?>
