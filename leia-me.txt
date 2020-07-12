
XOOPS2 - Auth Module 1.11 -----------------------------------------------------
----------------------------------------- Presented by ADMIN @ ROUTE286, 2004.


・Auth モジュールとは？ -------------------------------------------------------

既に存在しているファイルを置いて構築したい場合は、
TinyContent や iContent 等を使って実現ができますが、
どうも管理者メニューからコンテンツ生成を行うという手間や
ソースに行わせている処理によるサーバ負担が気になる方も多いかと思います。
単に HTML ファイルを記載したものを
１メニューとして表示させたいという人もいるでしょう。

また、XOOPS のモジュールに満足できず、用いたい php・CGI が別にありながら、
「php・CGI の知識があるけど、モジュールを作るまでの力は……」
という方もいるでしょう。

Auth モジュールは HTML ファイルや画像ファイル・php・CGI ファイルを
特定のディレクトリに置くことで、
XOOPS による認証やヘッダ・フッタを付加して表示を行います。
index.html とか作って、ディレクトリに突っ込んでしまえば、

　XOOPS/module/auth/index.cgi/index.html

として、XOOPS のヘッダ・フッタを含めて表示されてしまうわけです。
ユーザ別でデフォルトファイルを変更したり、参照できなくしたりもできます。
（ none に近いのですが、
　 none は１ファイルしか認証が反映されず、またユーザ別の操作はできません。
　 Auth モジュール は ディレクトリ 下全体に認証をかける事ができます。）

「余計な機能はいらない。HTML 等がそのまま XOOPS で表示できれば良い」
「php・CGI 等を XOOPS で手軽に動かしたい」という方、ぜひお試しを。 


・インストールと使用方法 ------------------------------------------------------

ディレクトリ(フォルダ) auth は変更しても動作するようになっています。
用途に応じて変更を行って下さい。
また、sample が指定ユーザに表示されるファイルとなります。
できれば URL で参照できない場所に置くのがおすすめです。

合わせて xoops_version.php を変更します。
サブメニューも追加したい場合は記載の通り追記して下さい。

	// ● モジュール名
	// メインメニューに表示される名称です。
	$modversion['name'] = 'Auth モジュール';

	// ● 保管先ディレクトリ
	// ディレクトリ auth から別の名前にした場合は変更して下さい。
	$modversion['dirname'] = "auth";

	// ● サブメニュー
	// サブメニューを追加したい場合は以下の記載を追加します。
	//  $modversion['sub'][1]['name'] = "メニュー名";
	//  $modversion['sub'][1]['url'] = 'index.php/ファイル名';
	// 言語別にメニュー名を分けたい場合は 
	//  $modversion['sub'][1]['name'] = _AT_MENU_1;
	//  $modversion['sub'][1]['url'] = 'index.php/ファイル名';
	// とし、lunguage/(言語)/main.php に以下を追加します。
	//  define ( "_AT_MENU_1" , "メニュー名"); 

また、config.php も設定して下さい。

	// ● 認証ディレクトリ(フォルダ)
	// このディレクトリ下に置かれたファイルは
	// XOOPS の認証を経由して参照できます。
	// 　ディレクトリ名のみの場合は
	// 　auth ディレクトリの下に置かれたディレクトリです。
	// 　このソースを知っている人から直接参照されるのを逃れるため、
	// 　必ず sample から変更して下さい。

	$auth_dir = "sample";

	// 直接指定も可能です。
	// できれば URL で参照できない場所に置くのがベストです。
	// $auth_dir = "/home/user/page";


	// ● 区切り(デリミタ)
	// 通常はこのままで構いません。index.php/ファイル名 となります。
	// Apache 1.3 以外のサーバで
	// PATH_INFO の取得ができない設定にしてある場合は
	// "?" に変更して下さい。index.php?ファイル名 となります。

	$auth_delimiter = "/";


	// ● ページ変更の方法
	// 0 = Location を用いる……通常はこのままで構いません。
	// 1 = redirect_header を用いる……
	//       バナー広告が自動追加される環境はこちら。

	$auth_redirect = 0;


	// ● 拒否する文字列
	// 以下「許可・拒否するユーザ群」の値で
	// 以下に記載した文字列を入れた場合、拒否され、参照できません。

	$auth_deny = "/deny/";


	// ● ユーザの許可・拒否およびデフォルトファイル名
	// "ユーザ名" => "ファイル名・URL または 拒否文字列", です。
	// 　ユーザ名は /guest でログインしていない状態での制御となります。
	// 　また、/default で記載されていないユーザの状態となります。
	// ファイル名は XOOPS/modules/auth/ のみで入った際に
	// 参照されるファイル名です。
	// index.html 等であっても省略せずに記載して下さい。
	// index.php は使用できません。index.html や default.php 等に
	// 変えて下さい。
	// 　URL も記載できます。その URL へ飛ばす事ができます。
	// 　http:// https:// 等も省略せずに記載して下さい。
	// 「拒否する文字列」に記載された文字列を入れると
	// そのユーザは拒否となります。

	$auth_user = array (
		"/default"	=> "index.html" );

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

			:

		"xyz"	=> "chemical/x-xyz" ,
		"zip"	=> "application/zip" );

このままアップロードし、管理メニューよりインストールして下さい。

参照は以下の通りです。
（ディレクトリ(フォルダ) auth でインストールしている場合）

	xoops/modules/auth/index.php/ファイル名

例えば sample にある index.html を表示するなら

	xoops/modules/auth/index.php/index.html

となります。
参照するファイルは html でなくても構いません。php も動作します。
画像ファイル等も参照可能です。

.php と .html のみ XOOPS のヘッダ・フッタが付加して表示されます。
そのため、表示したくない場合は .php .html 以外の拡張子にすると良いです。
例えば .htm や .php4 等は表示されなくなります。

珍しい拡張子で正しく動作しない場合は、
MIME-TYPE の追加・変更で改善するかもしれません。

	// ● Content-Type に入れる MIME-TYPE
	// "拡張子" => "MIME-TYPE", です。
	// 記載されていない拡張子を表示する場合は追記して下さい。

	$auth_mimetype = array (
		"ai"	=> "application/postscript" ,
		"aif"	=> "audio/x-aiff" ,

			:

		"xyz"	=> "chemical/x-xyz" ,
		"zip"	=> "application/zip" );

メインメニュー等でクリックした場合は以下となりますが、

	XOOPS/modules/auth/

この場合、ユーザ毎に設定されているファイル名へ飛びます。

	// ● ユーザの許可・拒否およびデフォルトファイル名
	// "ユーザ名" => "ファイル名・URL または 拒否文字列", です。
	// 　ユーザ名は /guest でログインしていない状態での制御となります。
	// 　また、/default で記載されていないユーザの状態となります。
	// ファイル名は XOOPS/modules/auth/ のみで入った際に
	// 参照されるファイル名です。
	// index.html 等であっても省略せずに記載して下さい。
	// index.php は使用できません。index.html や default.php 等に
	// 変えて下さい。
	// 　URL も記載できます。その URL へ飛ばす事ができます。
	// 　http:// https:// 等も省略せずに記載して下さい。
	// 「拒否する文字列」に記載された文字列を入れると
	// そのユーザは拒否となります。

	$auth_user = array (
		"user123"	=> "user.html",
		"user234"	=> "user.html",
		"userurl"	=> "http://url.com/user.html",
		"/guest"	=> "/deny/",
		"/default"	=> "index.html" );

上記の場合、会員 user123 さん および user234 さん であれば、

	XOOPS/modules/auth/index.php/user.html

上記の場合、会員 userurl さん であれば、

	http://url.com/user.html

それ以外の会員さんは

	XOOPS/modules/auth/index.php/index.html

となります。ログインしていない場合は拒否となります。
/guest も省略可能です。その場合は /default の値となります。
必ず index.html 等であっても省略せずに記載して下さい。

Apache 1.3 以外の環境では、期待の動作をしないかもしれません。
これは Auth で用いている方式がサーバによって異なる方法だからです。

　　Apache 2.0.30 以降では、AcceptPathInfo によって、
　　この問題を解決する事ができます。
　　例えば .htaccess が動作する場合、以下の文を加えれば大丈夫でしょう。

　　　　php_flag AcceptPathInfo On

　　自分でサーバを建てている場合であれば、
　　httpd.conf に直接記載しても大丈夫です。

　　これが不可能である場合、また IIS 等の他サーバである場合は
　　区切り(デリミタ) を変更する事で対応できます。

	// ● 区切り(デリミタ)
	// 通常はこのままで構いません。index.php/ファイル名 となります。
	// Apache 2.0 系で PATH_INFO の取得ができない設定にしてある場合は
	// "?" に変更して下さい。index.php?ファイル名 となります。

	$auth_delimiter = "/";

ただし、"?" に変更した場合はリンクの記載方法に違いがあります。
リンクとして間接指定はできません。（例えば <a href="ファイル名"> ）
index.php から記載する必要があります。（ <a href="index.php?ファイル名"> ）
認証ディレクトリ(フォルダ)内に
更にディレクトリ(フォルダ)を作成した場合も同様です。


・便利な使い方 ----------------------------------------------------------------

ファイル名として .html .php .cgi の場合に XOOPS のヘッダ・フッタを付加します。
他の拡張子では付加しません。
これにより、画像ファイル等も認証を行った上で表示する事ができます。


HTML によるリンクの際、以下の値を用いる事ができます。

　　<?= $url ?>   Auth モジュールの URL（index.php/ または index.php? まで）
　　<?= $files ?> files ディレクトリ(フォルダ)の URL
　　index.php     許可・拒否するユーザ群で記載しているページへ

画像ファイル等は認証ディレクトリ(フォルダ)内に入れても表示されますが、
その場合、画像ファイル等も index.php が実行されて表示されます。
そのため、あまりに容量が大きいファイルや多くのファイルを参照させたりすると、
サーバが高負荷になり、下手するとサーバダウンを起こします。
$files はそのために用意されたディレクトリ(フォルダ)です。
認証せずに表示しても構わないファイルはここに入れる事で
<?= $files ?>ファイル名 で参照できます。
例えば image.gif を files ディレクトリ(フォルダ)に入れて、
<img src="<?= $files ?>image.gif"> と記載すれば表示されるわけです。

リンクを間接指定（例えば <a href="ファイル名"> ）で記載できるのは
区切り(デリミタ) が "/" の場合に限られます。
"?" の場合は index.php? からの記載が必須です。または <?= $url ?> で参照します。


.html .htm .php .phpN (N=3〜5) のファイル名である場合、
php のコードを記載できます。

　1.02 までは require_once を用いていました。
　1.03 以降で include_once を用いています。

以下の値を用いる事ができます。

　　$url   = Auth モジュールの URL（index.php/ または index.php? まで）
　　$files = files ディレクトリ(フォルダ)の URL
　　$paths = Auth モジュールのパス（index.php/ または index.php? まで）
　　$users = ユーザ名(ログインしていない場合は /guest )

例えば $users を用いてユーザ別に異なる動作を行う事ができます。
php のソースを入れて Auth モジュール内で動かす事も可能です。
　　　* 文字コードを XOOPS の文字コードにあわせる。
　　　* chdir を頭につけて、php を実行するパスをカレントにする。
　　　　または読み込むファイルをフルパスで記載する。
　　　* .php の場合は http・HTML のヘッダ・フッタ・Cookie 等を外す。
　　　* ユーザ名・URL・メール等は Cookie の代わりに XOOPS から取り出す。


.cgi .pl の場合は passthru によって CGI の実行を行ないます。
（そのため php をセーフモードにしている場合は動作しません。）
これにより、Auth モジュール内で Perl 等の CGI を実行する事が可能です。
環境変数の取得も可能です。更に Auth モジュール独自の環境変数もあります。

　　POST_DATA         = POST メソッドの値
　　URL_DATA          = Auth モジュールの URL（index.php/・index.php? まで）
　　FILES_DATA        = files ディレクトリ(フォルダ)の URL
　　PATHS_DATA        = Auth モジュールのパス（index.php/・index.php? まで）
　　USER_DATA         = ユーザ名(ログインしていない場合は /guest )

1.08 からはアカウント情報（プロフィール）の一部も環境変数に入れています。

　　USER_DATA_ADMIN   = 管理者の場合はユーザ名・一般ユーザは非記載
　　USER_DATA_UID     = ユーザID
　　USER_DATA_UNAME   = ユーザ名(ログインしていない場合は非記載)
　　USER_DATA_AVATAR  = アバター
　　USER_DATA_NAME    = 本名
　　USER_DATA_URL     = ホームページ
　　USER_DATA_MAIL    = メールアドレス(公開・非公開に限らず代入)
　　USER_DATA_EMAIL   = メールアドレス(非公開の場合は非記載)
　　USER_DATA_ICQ     = ICQ
　　USER_DATA_AIM     = AIM
　　USER_DATA_YIM     = YIM
　　USER_DATA_MSNM    = MSNM
　　USER_DATA_FROM    = 居住地
　　USER_DATA_OCC     = 職業
　　USER_DATA_INTREST = 趣味

以下の点にご注意下さい。

　・POST メソッドで受け渡された値は環境変数 POST_DATA に入っています。
　　標準入力による取得ではありません。
　　また、ファイルアップロードは対応していません。
　　環境変数には文字数制限があるため、全ての値が取得できない可能性もあります。
　・Apache を用いているサーバで suexec を採用している場合でも
　　php を Apache モジュールで実行している場合、suexec は効きません。
　　php と同じようなファイル権限となる事にご注意下さい。
　・ユーザ名は環境変数 USER_DATA に入っています。
　・配布されている CGI を XOOPS で動作したい場合、以下の点の改良が必要です。
　　　* 文字コードを XOOPS の文字コードにあわせる。
　　　* chdir を頭につけて、CGI を実行するパスをカレントにする。
　　　　または読み込むファイルをフルパスで記載する。
　　　* .cgi の場合は http・HTML のヘッダ・フッタ・Cookie 等を外す。
　　　* ユーザ名・URL・メール等は Cookie の代わりに環境変数から取り出す。
　　　* POST メゾットで読んでいる部分を変更する。


Apache の mod_rewrite を用いて index.php を外す事ができます。
一例として .htaccess が使えるようになっている場合は、
以下の .htaccess を用意して下さい。

　RewriteEngine on
　RewriteCond %{REQUEST_FILENAME} !-f
　RewriteCond %{REQUEST_FILENAME} !-d
　RewriteRule ^(.*)$ index.php/$1 [L,QSA]

区切り記号を ? に変えている場合は index.php/$1 を
index.php?$1 と変更します。
このリンクも index.php?... と記載せずにすむようになり、
目的通りに動作するようになります。

config.php の「ユーザの許可・拒否およびデフォルトファイル名」では、
../ をつける事で index.php を外した形で動作する事ができます。

　$auth_user = array (
　　　　"/default"　　　　=> "../index.html" );

サブメニューの場合は index.php/ を外します。

　$modversion['sub'][1]['name'] = "メニュー名";
　$modversion['sub'][1]['url'] = 'ファイル名';


・その他のヒント --------------------------------------------------------------

ROUTE286/XOOPS 内に「Auth モジュールのページ」を作成しています。
ここには記載していないいろんな使用方法が記載していますので、
ぜひ参照してみて下さい。

　　ROUTE286/XOOPS http://r286.com/xoops/


・感謝。 ----------------------------------------------------------------------

このモジュールを作成するきっかけとなったのは、
XOOPS 日本公式サイトより、フォーラム「basic 認証みたいなのをやりたい。」です。

　　http://jp.xoops.org/modules/xhnewbb/viewtopic.php?topic_id=3849&forum=13

製作するきっかけを作ってくれた tadashi さんに感謝です。^^


・改版遍歴 --------------------------------------------------------------------

2004/07/05 Auth module version 1.11
　・Web サーバの種類によって正常に動作しない問題に対応。

2004/06/21 Auth module version 1.10
　・バナー広告を追加するサーバで正常に動作しない問題に対応。

2004/06/11 Auth module version 1.09
　・セキュリティ対策の強化。

2004/06/09 Auth module version 1.08
　・CGI でアカウント情報（プロフィール）の一部を取得できるようにした。

2004/05/26 Auth module version 1.07
　・ユーザの取得ができていない不都合を改善。
　・xoops_version.php の $modversion['hasMain'] 変更を廃止。
　　管理者メニューの「モジュール管理」表示順 でメニューを非表示にできます。

2004/05/21 Auth module version 1.06
　・Auth モジュールまでのパス $paths を追加。
　・.cgi .pl で Auth モジュール独自の環境変数を拡張。

2004/05/20 Auth module version 1.05
　・.cgi .pl で環境変数の取得が動作するように。

2004/05/19 Auth module version 1.04
　・Internet Explorer で一部のファイルが参照・ダウンロードできない問題を改善。

2004/05/17 Auth module version 1.03
　・CGI（ .cgi および .pl ）による動作に対応。
　・config.php の「許可・拒否するユーザ群」の値に URL を記載できるように。
　・config.php のコメント表記を変更。分かりやすくした。

2004/05/16 Auth module version 1.02
　・区切り(デリミタ) を "?" にした場合の不都合を改善。
　・テーマ変更後に Not Found になる不都合を改善。
　　代償で表示ファイルとして index.php 使用不可に。
　・ディレクトリを作成し階層化した場合の動作に対応。

2004/05/15 Auth module version 1.01
　・xoops_version.php に「メニュー」「サブメニュー」を追加。
　・config.php の「許可・拒否するユーザ群」の初期値を変更。
　・files ディレクトリと $files を追加。

2004/05/14 Auth module version 1.00
　・初版公開。


・お問い合わせ・最新情報 ------------------------------------------------------

最新情報は ROUTE286/XOOPS で行います。
お問い合わせフォームも ROUTE286/XOOPS にできました。
リンクを行っていただける場合は直接 ROUTE286/XOOPS へ行って頂いて構いません。
Blog の記事で扱う場合はトラックバックを用いて下さい。
　ROUTE286/XOOPS http://r286.com/xoops/

ROUTE286/XOOPS の本家 ROUTE286 はオリジナルシステムにより動作しています。
表示部は SSI と HTML で完結しています。こちらもどうぞ。
　ROUTE286 http://r286.com/
