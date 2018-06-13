<?php
class MiCosoCommentsModuleFrontController extends ModuleFrontController{
    public function setMedia(){
        parent::setMedia();
        $this->path=__PS_BASE_URI__.'modules/mymodcomments/';
		$this->context->controller->addCSS($this->path.'views/css/star-rating.css', 'all');
		$this->context->controller->addJS($this->path.'views/js/star-rating.js');
		$this->context->controller->addCSS($this->path.'views/css/mymodcomments.css', 'all');
		$this->context->controller->addJS($this->path.'views/js/mymodcomments.js');
    }
    public function initList(){
        $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'mymod_comment` WHERE `id_product` = '.(int)$this->product->id.' ORDER BY `date_add` DESC');
        $this->context->smarty->assign('comments', $comments);
		$this->context->smarty->assign('product', $this->product);
		$this->context->smarty->assign('page', $page);
		$this->context->smarty->assign('nb_pages', $nb_pages);
        $this->setTemplate('list.tpl');
    }
    public function initContent()
	{
        $this->product=new Product((int)$id_product,false, $this->context->cookie->id_lang);
        parent::initContent();
	}
}