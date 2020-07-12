<?php

// XOOPS2 - Auth version 1
// Presented by ADMIN @ ROUTE286, 2004.


// �� ǧ�ڥǥ��쥯�ȥ�(�ե����)
// ���Υǥ��쥯�ȥ겼���֤��줿�ե������
// XOOPS ��ǧ�ڤ��ͳ���ƻ��ȤǤ��ޤ���
// ���ǥ��쥯�ȥ�̾�Τߤξ���
// ��auth �ǥ��쥯�ȥ�β����֤��줿�ǥ��쥯�ȥ�Ǥ���
// �����Υ��������ΤäƤ���ͤ���ľ�ܻ��Ȥ����Τ�ƨ��뤿�ᡢ
// ��ɬ�� sample �����ѹ����Ʋ�������

$auth_dir = "authpage";

// ��ľ�ܻ�����ǽ�Ǥ���
// ���Ǥ���� URL �ǻ��ȤǤ��ʤ������֤��Τ��٥��ȤǤ���
// ��$auth_dir = "/home/user/page";


// �� ���ڤ�(�ǥ�ߥ�)
// �̾�Ϥ��Τޤޤǹ����ޤ���index.php/�ե�����̾ �Ȥʤ�ޤ���
// Apache 1.3 �ʳ��Υ����Ф� PATH_INFO �μ������Ǥ��ʤ�����ˤ��Ƥ������
// "?" ���ѹ����Ʋ�������index.php?�ե�����̾ �Ȥʤ�ޤ���

$auth_delimiter = "/";


// �� �ڡ����ѹ�����ˡ
// 0 = Location ���Ѥ���ġ��̾�Ϥ��Τޤޤǹ����ޤ���
// 1 = redirect_header ���Ѥ���ġĥХʡ����𤬼�ư�ɲä����Ķ��Ϥ����顣

$auth_redirect = 0;


// �� ���ݤ���ʸ����
// �ʲ��ֵ��ġ����ݤ���桼�����פ��ͤǰʲ��˵��ܤ���ʸ��������줿��硢
// ���ݤ��졢���ȤǤ��ޤ���

$auth_deny = "/deny/";


// �� �桼���ε��ġ����ݤ���ӥǥե���ȥե�����̾
// "�桼��̾" => "�ե�����̾��URL �ޤ��� ����ʸ����", �Ǥ���
// ���桼��̾�� /guest �ǥ����󤷤Ƥ��ʤ����֤Ǥ�����Ȥʤ�ޤ���
// ���ޤ���/default �ǵ��ܤ���Ƥ��ʤ��桼���ξ��֤Ȥʤ�ޤ���
// �ե�����̾�� XOOPS/modules/auth/ �Τߤ����ä��ݤ˻��Ȥ����ե�����̾�Ǥ���
// index.html ���Ǥ��äƤ��ά�����˵��ܤ��Ʋ�������
// index.php �ϻ��ѤǤ��ޤ���index.html �� default.php �����Ѥ��Ʋ�������
// ��URL �⵭�ܤǤ��ޤ������� URL �����Ф������Ǥ��ޤ���
// ��http:// https:// �����ά�����˵��ܤ��Ʋ�������
// �ֵ��ݤ���ʸ����פ˵��ܤ��줿ʸ����������Ȥ��Υ桼���ϵ��ݤȤʤ�ޤ���

$auth_user = array (
	"/default"	=> "../index.html" );

//$auth_user = array (
//	"user123"	=> "user.html",
//	"user234"	=> "user.html",
//	"userurl"	=> "http://url.com/user.html",
//	"/guest"	=> "/deny/",
//	"/default"	=> "index.html" );


// �� Content-Type ������� MIME-TYPE
// "��ĥ��" => "MIME-TYPE", �Ǥ���
// ���ܤ���Ƥ��ʤ���ĥ�Ҥ�ɽ����������ɵ����Ʋ�������

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
