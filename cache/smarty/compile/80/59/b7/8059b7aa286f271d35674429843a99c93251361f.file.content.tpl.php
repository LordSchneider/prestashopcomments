<?php /* Smarty version Smarty-3.1.19, created on 2018-06-26 09:46:17
         compiled from "C:\xampp\htdocs\prestashop\admin483gp16uy\themes\default\template\content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142085b325fc904fcb9-70541952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8059b7aa286f271d35674429843a99c93251361f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\admin483gp16uy\\themes\\default\\template\\content.tpl',
      1 => 1527281578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142085b325fc904fcb9-70541952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b325fc90655a1_59091537',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b325fc90655a1_59091537')) {function content_5b325fc90655a1_59091537($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
