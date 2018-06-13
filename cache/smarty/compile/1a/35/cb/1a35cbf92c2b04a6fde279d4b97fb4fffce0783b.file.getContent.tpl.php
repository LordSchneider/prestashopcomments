<?php /* Smarty version Smarty-3.1.19, created on 2018-06-12 12:25:16
         compiled from "C:\xampp\htdocs\prestashop\modules\Micoso\views\templates\hook\getContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:64795b20100c5a1ff1-39839165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a35cbf92c2b04a6fde279d4b97fb4fffce0783b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\Micoso\\views\\templates\\hook\\getContent.tpl',
      1 => 1528299041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64795b20100c5a1ff1-39839165',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'confirmation' => 0,
    'enable_grades' => 0,
    'enable_comments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b20100c5b8965_81067653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b20100c5b8965_81067653')) {function content_5b20100c5b8965_81067653($_smarty_tpl) {?>  <?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" type="text/css" media=""<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
"/>
        <?php } ?>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
        <div class="alert alert-success">GUARDADO</div>
    <?php }?>                            
<fieldset>
    <h1>Configuracion de mi coso</h1>
    <div class="panel">
        <div class="panel-heading">
            <legend>
                <img src="https://www.awesomelyluvvie.com/wp-content/uploads/2015/06/Welp-dog-blank.jpg" alt="" width="16"/>
                Configuracion
            </legend>
        </div>
        <form action="" method="post">
            <div class="form-group clearfix">
                <label class="col-lg-3"> Enable Grades: </label>
                <div class="col-lg-9">
                    <img src="" />
                    <input type="radio" id="enable_grades_1" name="enable_grades" value="1"<?php if ($_smarty_tpl->tpl_vars['enable_grades']->value=='1') {?>checked<?php }?> />
                    <label class="t" for="enable_grades_1">SI</label>
                    <img src="" />
                    <input type="radio" id="enable_grades_0" name="enable_grades" value="0"<?php if ($_smarty_tpl->tpl_vars['enable_grades']->value=='0') {?>checked<?php }?> />
                    <label class="t" for="enable_grades_0">NO</label>
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-3">Enable comments: </label>
                <div class="col-lg-9">
                    <img src="">
                    <input type="radio" id="enable_comments_1" name="enable_comments" value="1"<?php if ($_smarty_tpl->tpl_vars['enable_comments']->value=='1') {?>checked<?php }?>/>
                    <label class="t" for="enable_comments_1">SI</label>
                    <img src="">
                    <input type="radio" id="enable_comments_0" name="enable_comments" value="0"<?php if ($_smarty_tpl->tpl_vars['enable_comments']->value=='0') {?>checked<?php }?>/>
                    <label class="t" for="enable_comments_0">NO</label>
                </div>
            </div>
            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit" name="my_form" value="GUARDAR" />
            </div>
        </form>
    </div>
</fieldset><?php }} ?>
