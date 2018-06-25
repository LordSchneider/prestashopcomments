<?php /* Smarty version Smarty-3.1.19, created on 2018-06-22 16:52:59
         compiled from "C:\xampp\htdocs\prestashop\modules\Micoso\views\templates\hook\getContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:325095b2d7dcb5d1765-12028040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a35cbf92c2b04a6fde279d4b97fb4fffce0783b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\Micoso\\views\\templates\\hook\\getContent.tpl',
      1 => 1529096694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325095b2d7dcb5d1765-12028040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b2d7dcb5ee3c0_42440072',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2d7dcb5ee3c0_42440072')) {function content_5b2d7dcb5ee3c0_42440072($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
    <div class="alert alert-success"><?php echo smartyTranslate(array('s'=>'Settings updated','mod'=>'mymodcomments'),$_smarty_tpl);?>
</div>
<?php }?>
<?php }} ?>
