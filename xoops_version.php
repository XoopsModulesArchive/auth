<?php
// $Id: xoops_version.php,v 1.1 2006/03/27 15:10:26 mikhail Exp $

// XOOPS2 - Auth version 1
// Presented by ADMIN @ ROUTE286, 2004.

// �� �⥸�塼��̾
// �ᥤ���˥塼��ɽ�������̾�ΤǤ���
$modversion['name'] = 'Auth �⥸�塼��';

// �� �ݴ���ǥ��쥯�ȥ�
// �ǥ��쥯�ȥ� auth �����̤�̾���ˤ��������ѹ����Ʋ�������
$modversion['dirname'] = "auth";

// �� ���֥�˥塼
$modversion['sub'][1]['name'] = "����CGI������ץ�";
$modversion['sub'][1]['url'] = 'cgi/index.html';

// ���֥�˥塼���ɲä��������ϰʲ��ε��ܤ��ɲä��ޤ���
//  $modversion['sub'][1]['name'] = "��˥塼̾";
//  $modversion['sub'][1]['url'] = 'index.php/�ե�����̾';
// �����̤˥�˥塼̾��ʬ���������� 
//  $modversion['sub'][1]['name'] = _AT_MENU_1;
//  $modversion['sub'][1]['url'] = 'index.php/�ե�����̾';
// �Ȥ���lunguage/(����)/main.php �˰ʲ����ɲä��ޤ���
//  define ( "_AT_MENU_1" , "��˥塼̾"); 

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