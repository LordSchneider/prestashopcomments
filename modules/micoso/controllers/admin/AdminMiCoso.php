<?php

    class AdminMiCosoController extends ModuleAdminController{
        
		public function __construct()
		{
			$this->table = 'micoso';
			$this->className = 'MiCosos';
			$this->fields_list = array(
				"id_micoso" => array('title' => 'Id de comentario', 'align' => 'center', 'width' => 25),
				"namen" => array('title' => 'Namen', 'width' => 120),
				"email" => array('title' => 'E-mail', 'width' => 150),
				"id_product" => array('title' => 'Product', 'width' => 100, 'filter_key' => 'pl!name'),
				"grade" => array('title' => 'Grade', 'align' => 'right', 'width' => 80, 'filter_key' => 'a!grade'),
				"comment" => array('title' => 'Comment', 'search' => false),
				"date_add" => array('title' => 'Date add', 'type' => 'date'),
			);
			$this->context = Context::getContext();
			$this->context->controller = $this;
			$this->fields_form = array(
				'legend' => array('title' =>'Add / Edit Comment', 'image' => '../img/admin/contact.gif'),
				'input' => array(
					array('type' => 'text', 'label' =>'Firstname', 'name' => 'namen', 'size' => 30, 'required' => true),
					array('type' => 'text', 'label' =>'E-mail', 'name' => 'email', 'size' => 30, 'required' => true),
					array('type' => 'select', 'label' =>'Product', 'name' => 'id_product', 'required' => true, 'default_value' => 1, 'options' => array('query' => Product::getProducts($this->context->cookie->id_lang, 1, 1000, 'name', 'ASC'), 'id' => 'id_product', 'name' => 'name')),
					array('type' => 'text', 'label' =>'Grade', 'name' => 'grade', 'size' => 30, 'required' => true, 'desc' =>'Grade must be between 1 and 5'),
					array('type' => 'textarea', 'label' =>'Comment', 'name' => 'comment', 'cols' => 50, 'rows' => 5, 'required' => false),
				),
				'submit' => array('title' =>'Save')
			);
			$this->bootstrap = true;
			parent::__construct();
			$this->meta_title='Comentarios en productos';
			if (Tools::getIsset('viewmicoso')) {
				$this->meta_title='Ver comentario #'.Tools::getValue('id_micoso');
			}
			$this->toolbar_title[]=$this->meta_title;
			$this->_join = 'LEFT JOIN `'._DB_PREFIX_.'product_lang` pl ON (pl.`id_product` = a.`id_product` AND pl.`id_lang` = '. (int)$this->context->language->id.')';
			$this->addRowAction('edit');
			$this->addRowAction('view');
			$this->addRowAction('delete');
			$this->bulk_actions = array(
				'delete' => array(
					'text' => 'Delete selected',
					'confirm' => 'Would you like to delete the selected items?',
				)
			);
		}
		public function renderView()
		{
			$tpl = $this->context->smarty->createTemplate(dirname(__FILE__). '/../../views/templates/admin/view.tpl');
			$tpl->assign('micoso',$this->object);
			$this->object->loadProductName();
			$admin_delete_link=$this->context->link->getAdminLink('AdminMiCoso').'&deletemicoso&id_micoso='.(int)$this->object->id;
			$this->page_header_toolbar_btn['Borrar']=array(
				'href'=>$admin_delete_link,
				'desc'=>'Borrarlo',
				'icon'=>'process-icon-delete',
				'js'=>"return confirm('Seguro que deseas borrar el comentario?');",
			);
			return $tpl->fetch();
		}
    }