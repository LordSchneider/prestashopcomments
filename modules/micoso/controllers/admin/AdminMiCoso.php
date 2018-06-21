<?php

    class AdminMiCosoController extends ModuleAdminController{
        
		public function __construct()
		{
			$this->table = 'micoso';
			$this->className = 'AdminMiCosoController';
			$this->fields_list = array(
				'id_micoso' => array('title' => 'Id de comentario', 'align' => 'center', 'width' => 25),
				'namen' => array('title' => 'Firstname', 'width' => 120),
				'email' => array('title' => 'E-mail', 'width' => 150),
				'id_product' => array('title' => 'Product', 'width' => 100, 'filter_key' => 'pl!name'),
				'grade' => array('title' => 'Grade', 'align' => 'right', 'width' => 80, 'filter_key' => 'a!grade'),
				'comment' => array('title' => 'Comment', 'search' => false),
				'date_add' => array('title' => 'Date add', 'type' => 'date'),
			);
			$this->context = Context::getContext();
			$this->context->controller = $this;
			$this->bootstrap = true;
			parent::__construct();
			$this->meta_title='Comentarios en productos';
			$this->toolbar_title[]=$this->meta_title;
			$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.`id_product` = a.`id_product` AND pl.`id_lang` = '. (int)$this->context->language->id.')';
			$this->addRowAction('edit');
			$this->addRowAction('view');
			$this->addRowAction('delete');
			$this->bulk_actions = array(
				'delete' => array(
					'text' => $this->l('Delete selected'),
					'confirm' => $this->l('Would you like to delete the selected items?'),
				)
			);
		}
		public function renderView()
		{
			$tpl = $this->context->smarty->createTemplate(dirname(__FILE__). '/../../views/templates/admin/view.tpl');
			$tpl->assign('micoso',$this->object);
			return $tpl->fetch();
		}
    }