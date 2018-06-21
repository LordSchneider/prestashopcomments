<?php /* Smarty version Smarty-3.1.19, created on 2018-06-21 11:36:12
         compiled from "C:\xampp\htdocs\prestashop\modules\micoso\views\templates\admin\view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305b2be20ced9fb9-81561983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20decf7b43d59513354319b11b3f7ddf28d30446' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\micoso\\views\\templates\\admin\\view.tpl',
      1 => 1529602570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305b2be20ced9fb9-81561983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'micoso' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b2be20cf2c973_94714059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2be20cf2c973_94714059')) {function content_5b2be20cf2c973_94714059($_smarty_tpl) {?><fieldset>
    <div class="panel">
        <div class="panel-heading">
            <legend>
                <i class="icon-info"></i>
                <?php echo smartyTranslate(array('s'=>'Comentarios del producto','mod'=>'micoso'),$_smarty_tpl);?>

            </legend>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'ID:','mod'=>'micoso'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->id;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'Nombre: ','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->name;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'E-Mail: ','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->mail;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'Producto: ','mod'=>'micoso'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->product;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'Puntuacion: ','mod'=>'micoso'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->grade;?>
/5
            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'Comentario: ','mod'=>'micoso'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo nl2br($_smarty_tpl->tpl_vars['micoso']->value->comment);?>

            </div>
        </div>
    </div>
</fieldset><?php }} ?>
