<?php /* Smarty version Smarty-3.1.19, created on 2018-06-20 14:32:06
         compiled from "C:\xampp\htdocs\prestashop\modules\Micoso\views\templates\hook\getContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113285b2ab9c6ef7a30-80543044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '113285b2ab9c6ef7a30-80543044',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b2ab9c6efe3c2_14132656',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2ab9c6efe3c2_14132656')) {function content_5b2ab9c6efe3c2_14132656($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
    <div class="alert alert-success"><?php echo smartyTranslate(array('s'=>'Settings updated','mod'=>'mymodcomments'),$_smarty_tpl);?>
</div>
<?php }?>
<?php }} ?>
