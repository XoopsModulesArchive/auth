<?php
// $Id: xoops_version.php,v 1.1 2006/03/27 15:10:26 mikhail Exp $

// XOOPS2 - Auth version 1
// Presented by ADMIN @ ROUTE286, 2004.

// ● モジュール名
// メインメニューに表示される名称です。
$modversion['name'] = 'Auth モジュール';

// ● 保管先ディレクトリ
// ディレクトリ auth から別の名前にした場合は変更して下さい。
$modversion['dirname'] = "auth";

// ● サブメニュー
$modversion['sub'][1]['name'] = "配布CGIスクリプト";
$modversion['sub'][1]['url'] = 'cgi/index.html';

// サブメニューを追加したい場合は以下の記載を追加します。
//  $modversion['sub'][1]['name'] = "メニュー名";
//  $modversion['sub'][1]['url'] = 'index.php/ファイル名';
// 言語別にメニュー名を分けたい場合は 
//  $modversion['sub'][1]['name'] = _AT_MENU_1;
//  $modversion['sub'][1]['url'] = 'index.php/ファイル名';
// とし、lunguage/(言語)/main.php に以下を追加します。
//  define ( "_AT_MENU_1" , "メニュー名"); 

$modversion['description'] = $modversion['name'];
$modversion['version'] = "1.11";
$modversion['credits'] = "";
$modversion['author'] = 'Presented by ADMIN @ ROUTE286.';
$modversion['help'] = "help.html";
$modversion['license'] = "GPL see LICENSE";
$modversion['official'] = 0;
$modversion['image'] = "files/authlogo.gif";

$modversion['hasMain'] = 1;
$modversion['hasAdmin'] = 0;

?>