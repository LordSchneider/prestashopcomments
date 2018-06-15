<?php
    class AdminMiCosoController extends ModuleAdminController{
        
	public function __construct()
	{
		$this->table = 'micoso';
		$this->className = 'MiCosos';
		$this->fields_list = array(
			'id_mymod_comment' => array('title' => $this->l('ID'), 'align' => 'center', 'width' => 25),
			'shop_name' => array('title' => $this->l('Shop'), 'width' => 120, 'filter_key' => 's!name'),
			'namen' => array('title' => $this->l('Nombre'), 'width' => 120),
			'email' => array('title' => $this->l('E-mail'), 'width' => 150),
			'product_name' => array('title' => $this->l('Product'), 'width' => 100, 'filter_key' => 'pl!name'),
			'grade_display' => array('title' => $this->l('Grade'), 'align' => 'right', 'width' => 80, 'filter_key' => 'a!grade'),
			'comment' => array('title' => $this->l('Comment'), 'search' => false),
			'date_add' => array('title' => $this->l('Date add'), 'type' => 'date'),
		);
		$this->bootstrap = true;
		parent::__construct();
    }