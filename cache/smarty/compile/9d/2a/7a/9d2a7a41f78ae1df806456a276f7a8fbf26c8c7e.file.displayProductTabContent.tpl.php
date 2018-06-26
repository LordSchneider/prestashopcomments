<?php /* Smarty version Smarty-3.1.19, created on 2018-06-26 09:47:35
         compiled from "C:\xampp\htdocs\prestashop\modules\Micoso\views\templates\hook\displayProductTabContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26125b326017d035e1-83092174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d2a7a41f78ae1df806456a276f7a8fbf26c8c7e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\Micoso\\views\\templates\\hook\\displayProductTabContent.tpl',
      1 => 1529096694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26125b326017d035e1-83092174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new_comment_posted' => 0,
    'enable_grades' => 0,
    'enable_comments' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b326017d348a7_64902159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b326017d348a7_64902159')) {function content_5b326017d348a7_64902159($_smarty_tpl) {?><h3 class="page-product-heading" id="mymodcomments-content-tab"<?php if (isset($_smarty_tpl->tpl_vars['new_comment_posted']->value)) {?> data-scroll="true"<?php }?>><?php echo smartyTranslate(array('s'=>'Product Comments','mod'=>'mymodcomments'),$_smarty_tpl);?>
</h3>
<?php if ($_smarty_tpl->tpl_vars['enable_grades']->value==1||$_smarty_tpl->tpl_vars['enable_comments']->value==1) {?>
<div class="rte">
    <?php if (isset($_smarty_tpl->tpl_vars['new_comment_posted']->value)&&$_smarty_tpl->tpl_vars['new_comment_posted']->value=='error') {?>
		<div class="alert alert-danger">
			<p><?php echo smartyTranslate(array('s'=>'Some fields of the form seems wrong, please check them before submitting your comment.','mod'=>'mymodcomments'),$_smarty_tpl);?>
</p>
		</div>
    <?php }?>
	<form action="" method="POST" id="comment-form">

		<div class="form-group">
			<label for="name"><?php echo smartyTranslate(array('s'=>'Nombre:','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
			<div class="row"><div class="col-xs-4">
                <input type=”text” name="name" id="name" class="form-control" />
            </div></div>
        </div>
		<div class="form-group">
			<div class="row"><div class="col-xs-4">
                
            </div></div>
        </div>
		<div class="form-group">
            <label for="email"><?php echo smartyTranslate(array('s'=>'Email:','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
			<div class="row"><div class="col-xs-4">
				<input type=”email” name="email" id="email" class="form-control" />
			</div></div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['enable_grades']->value==1) {?>
            <div class="form-group">
                <label for="grade"><?php echo smartyTranslate(array('s'=>'Puntuacion:','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
                <div class="row">
                    <div class="col-xs-4" id="grade-tab">
						<input id="grade" name="grade" value="0" type="number" class="rating" min="0" max="5" step="1" data-size="sm" >
				    </div>
			    </div>
		    </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['enable_comments']->value==1) {?>
    		<div class="form-group">
	    		<label for="comment"><?php echo smartyTranslate(array('s'=>'Comentario:','mod'=>'mymodcomments'),$_smarty_tpl);?>
</label>
		    	<textarea name="comment" id="comment" class="form-control"></textarea>
		    </div>
        <?php }?>
		<div class="submit">
			<button type="submit" name="mymod_pc_submit_comment" class="button btn btn-default button-medium"><span><?php echo smartyTranslate(array('s'=>'Send','mod'=>'mymodcomments'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i></span></button>
		</div>
	</form>
</div>
<div class="rte">
<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
	<div class="mymodcomments-comment">
		<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($_smarty_tpl->tpl_vars['comment']->value['email'])));?>
?s=45" class="pull-left img-thumbnail mymodcomments-avatar" />
		<div><?php echo $_smarty_tpl->tpl_vars['comment']->value['namen'];?>
 <small><?php echo substr($_smarty_tpl->tpl_vars['comment']->value['date_add'],0,10);?>
</small></div>
		<div class="star-rating"><i class="glyphicon glyphicon-star"></i> <strong><?php echo smartyTranslate(array('s'=>'Puntuacion:','mod'=>'mymodcomments'),$_smarty_tpl);?>
</strong></div> <input value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['grade'];?>
" type="number" class="rating" min="0" max="5" step="1" data-size="xs" />
		<div><i class="glyphicon glyphicon-comment"></i> <strong><?php echo smartyTranslate(array('s'=>'Comentario: ','mod'=>'mymodcomments'),$_smarty_tpl);?>
 </strong> <?php echo $_smarty_tpl->tpl_vars['comment']->value['comment'];?>
</div>
	</div>
    <hr />
<?php } ?>
<?php }?><?php }} ?>
