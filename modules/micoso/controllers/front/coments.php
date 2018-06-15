<?php
class MiCosoCommentsModuleFrontController extends ModuleFrontController{
    public function setMedia(){
        parent::setMedia();
        $this->path=__PS_BASE_URI__.'modules/mymodcomments/';
		$this->context->controller->addCSS($this->path.'views/css/star-rating.css', 'all');
		$this->context->controller->addJS($this->path.'views/js/star-rating.js');
		$this->context->controller->addCSS($this->path.'views/css/micoso.css', 'all');
		$this->context->controller->addJS($this->path.'views/js/micoso.js');
    }
    public function initList(){
        $nb_comments=Db::getInstance()->getValue('SELECT COUNT (`id_product`) FROM `'._DB_PREFIX_.'micoso` WHERE `id_product` = '.(int)$this->product->id);
        $nb_per_page=10;
        $nb_pages=ceil($nb_comments/$nb_per_page);
        $page=1;
        if (Tools::getValue('page')) {
            $page=(int)$_GET['page'];
        }
        $limit_start=($page-1)*$nb_per_page;
        $limit_end=$nb_per_page;
        $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'mymod_comment` WHERE `id_product` = '.(int)$this->product->id.' ORDER BY `date_add` DESC LIMIT'.(int)$limit_start.', '.(int)$limit_end);
        $this->setTemplate('list.tpl');
    }
    public function initContent()
	{
        $this->product=new Product((int)$id_product,false, $this->context->cookie->id_lang);
        parent::initContent();
	}
}