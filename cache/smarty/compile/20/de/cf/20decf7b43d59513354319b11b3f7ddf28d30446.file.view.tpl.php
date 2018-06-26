<?php /* Smarty version Smarty-3.1.19, created on 2018-06-26 09:46:16
         compiled from "C:\xampp\htdocs\prestashop\modules\micoso\views\templates\admin\view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93945b325fc8cad8a3-10690133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20decf7b43d59513354319b11b3f7ddf28d30446' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\micoso\\views\\templates\\admin\\view.tpl',
      1 => 1529688756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93945b325fc8cad8a3-10690133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'micoso' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b325fc8cc61f1_57932867',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b325fc8cc61f1_57932867')) {function content_5b325fc8cc61f1_57932867($_smarty_tpl) {?><fieldset>
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
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->namen;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'E-Mail: ','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->email;?>

            </div>
        </div>
        <div class="form-group clearfix">
            <label class="col-lg-3"><?php echo smartyTranslate(array('s'=>'Producto: ','mod'=>'micoso'),$_smarty_tpl);?>
</label>
            <div class="col-lg-9">
                <?php echo $_smarty_tpl->tpl_vars['micoso']->value->product_name;?>
 (#<?php echo $_smarty_tpl->tpl_vars['micoso']->value->id_product;?>
)
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
