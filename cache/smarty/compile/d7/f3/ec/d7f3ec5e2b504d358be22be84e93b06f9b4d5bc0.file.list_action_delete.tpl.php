<?php /* Smarty version Smarty-3.1.19, created on 2018-06-01 16:37:02
         compiled from "C:\xampp\htdocs\prestashop\admin483gp16uy\themes\default\template\helpers\list\list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159425b11ca8e2d6612-14739908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7f3ec5e2b504d358be22be84e93b06f9b4d5bc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\admin483gp16uy\\themes\\default\\template\\helpers\\list\\list_action_delete.tpl',
      1 => 1527281578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159425b11ca8e2d6612-14739908',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b11ca8e2e9a07_31166990',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b11ca8e2e9a07_31166990')) {function content_5b11ca8e2e9a07_31166990($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)) {?> onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){return true;}else{event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delete">
	<i class="icon-trash"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a>
<?php }} ?>
