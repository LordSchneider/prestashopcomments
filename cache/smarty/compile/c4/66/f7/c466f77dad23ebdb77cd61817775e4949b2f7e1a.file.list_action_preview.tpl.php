<?php /* Smarty version Smarty-3.1.19, created on 2018-06-22 14:13:14
         compiled from "C:\xampp\htdocs\prestashop\admin483gp16uy\themes\default\template\helpers\list\list_action_preview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125825b2d585a6f9427-86541015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c466f77dad23ebdb77cd61817775e4949b2f7e1a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\admin483gp16uy\\themes\\default\\template\\helpers\\list\\list_action_preview.tpl',
      1 => 1527281578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125825b2d585a6f9427-86541015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b2d585a712064_80641342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2d585a712064_80641342')) {function content_5b2d585a712064_80641342($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" target="_blank">
	<i class="icon-eye"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a>
<?php }} ?>
