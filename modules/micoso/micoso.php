<?php
require_once(dirname(__FILE__).'/classes/MiCosos.php');
    class MiCoso extends Module
    {
        public function loadSQLFile($sql_file){
            $sql_content=file_get_contents($sql_file);
            $sql_content=str_replace('PREFIX_',_DB_PREFIX_,$sql_content);
            $sql_requests=preg_split("/;\s*[\r\n]+/",$sql_content);
            $result=true;
            foreach($sql_requests as $request)
            if(!empty($request))
            $result &=Db::getInstance()->execute(trim($request));
            return $result;
        }
        public function __construct()
        {
            $this->name='Micoso';
            $this->tab='front_office_features';
            $this->displayName=$this->l('Modulo de pruebas');
            $this->version='1.1';
            $this->author='Ignacio Casado';
            $this->description=$this->l('Modulo de prueba.');
            $this->ps_versions_compliancy=array('min'=>'1.5.2','max'=>'1.6.1.19');
            $this->bootstrap=true;
            parent::__construct();
        }
        public function install(){
            if (!parent::install()) {
                return false;
            }
            $sql_file=dirname(__FILE__).'/install/install.sql';
            $this->loadSQLFile($sql_file);
            if (!$this->registerHook('displayProductTabContent') || !$this->registerHook('displayBackOfficeHeader') || !$this->registerHook('ModuleRoutes') || !$this->registerHook('displayAdminProductsExtra'))
            return false;
            if (!$this->installTab('AdminCatalog','AdminMiCoso','Mi Coso')) {
                return false;
            }
            Configuration::updateValue('MYMOD_GRADES','1');
            Configuration::updateValue('MYMOD_COMMENTS','1');
            return true;
        }
        public function uninstall(){
            if (!parent::uninstall())
            return false;
            $sql_file=dirname(__FILE__).'/install/uninstall.sql';
            if (!$this->loadSQLFile($sql_file))
            return false;
            if (!$this->uninstallTab('AdminMiCoso'))
            return false;
            Configuration::deleteByName('MYMOD_GRADES');
            Configuration::deleteByName('MYMOD_COMMENTS');
            return true;
        }
        public function processConfiguration(){
            if (Tools::isSubmit('my_form')){
                $enable_grades=Tools::getValue('enable_grades');
                $enable_comments=Tools::getValue('enable_comments');
                Configuration::updateValue('MYMOD_GRADES',$enable_grades);
                Configuration::updateValue('MYMOD_COMMENTS',$enable_comments);
                $this->context->smarty->assign('confirmation', 'ok');
            }
        }
        public function assignConfiguration(){
            $enable_grades=Configuration::get('MYMOD_GRADES');
            $enable_comments=Configuration::get('MYMOD_COMMENTS');
            $this->context->smarty->assign('enable_grades',$enable_grades);
            $this->context->smarty->assign('enable_comments',$enable_comments);
            
        }
        public function getContent(){
            $this->processConfiguration();
            $html_confirmation_message=$this->display(__FILE__,'getContent.tpl');
            $html_form=$this->renderForm();
            return $html_confirmation_message.$html_form;
        }
        public function processProductTabContent(){
            if (Tools::isSubmit('mymod_pc_submit_comment'))  {
                $id_product=Tools::getValue('id_product');
                $grade=Tools::getValue('grade');
                $name=Tools::getValue('name');
                $mail=Tools::getValue('email');
                $comment=Tools::getValue('comment');
                $comment=pSQL($comment);
                if ($grade!=0 || !empty($name) || !empty($comment) || !empty($mail)) {
                        $insert=array(
                        'id_product'=>(int) $id_product,
                        'namen'=>"$name",
                        'email'=>"$mail",
                        'grade'=>(int) $grade,
                        'comment'=>"$comment",
                        'date_add'=>date('Y-m-d H:i:s'),
                    );
                    Db::getInstance()->insert('micoso',$insert);
                    $this->context->smarty->assign('new_comment_posted','true');
                }
            }
        }
        public function hookDisplayProductTabContent($params){
            $this->processProductTabContent();
            $this->assignProductTabContent();
            return $this->display(__FILE__,'displayProductTabContent.tpl');
        }
        public function hookDisplayAdminProductsExtra($params){
            $controller=$this->getHookController('displayAdminProductsExtra');
            return $controller->run();
        }
        public function assignProductTabContent(){
            $enable_grades=Configuration::get('MYMOD_GRADES');
            $enable_comments=Configuration::get('MYMOD_COMMENTS');
            $id_product=Tools::getValue('id_product');
            $comments=Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'micoso WHERE id_product = '.(int)$id_product.' ORDER BY `date_add` DESC LIMIT 3');
            $this->context->controller->addCSS($this->_path.'views/css/micoso.css','all');
            $this->context->controller->addCSS($this->_path.'views/css/star-rating.css','all');
            $this->context->controller->addJS($this->_path.'views/js/star-rating.js');
            $this->context->controller->addJS($this->_path.'views/js/micoso.js');
            $this->context->smarty->assign('enable_grades',$enable_grades);
            $this->context->smarty->assign('enable_comments',$enable_comments);
            $this->context->smarty->assign('comments',$comments);
            $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'micoso` WHERE `id_product` = '.(int)$id_product.' ORDER BY `date_add` DESC LIMIT 3');
        }
        public function onClickOption($type, $href=false){
            $confirm_reset = $this->l('Reincializar este modulo borrara todos los datos de tu base de datos. ¿Seguro que quieres hacerlo?');
		    $reset_callback = "return micoso_reset('".addslashes($confirm_reset)."');";
		    $matchType = array(
			'reset' => $reset_callback,
			'delete' => "return confirm('Seguro Chaz?')",
		        );
		    if (isset($matchType[$type]))
			    return $matchType[$type];
		    return '';
        }
        public function hookDisplayBackOfficeHeader(){
            if(Tools::getValue('controller')!='AdminModules'){
                return '';
            }
            $this->context->smarty->assign('pc_base_dir',__PS_BASE_URI__.'modules/'.$this->name.'/');
            $this->display(__FILE__,'displayBackOfficeHeader.tpl');
        }
        public function renderForm(){
            $fields_form = array(
                'form' => array(
                    'legend' => array(
                        'title' =>'My Module configuration',
                        'icon' => 'icon-envelope'
                    ),
                    'input' => array(
                        array(
                            'type' => 'switch',
                            'label' =>'Enable grades:',
                            'name' => 'enable_grades',
                            'desc' =>'Enable grades on products.',
                            'values' => array(
                                array('id' => 'enable_grades_1', 'value' => 1, 'label' =>'Enabled'),
                                array('id' => 'enable_grades_0', 'value' => 0, 'label' =>'Disabled')
                            ),
                        ),
                        array(
                            'type' => 'switch',
                            'label' =>'Enable comments:', 'name' => 'enable_comments',
                            'desc' =>'Enable comments on products.',
                            'values' => array(
                                array('id' => 'enable_comments_1', 'value' => 1, 'label' =>'Enabled'),
                                array('id' => 'enable_comments_0', 'value' => 0, 'label' =>'Disabled')
                            ),
                        ),
                    ),
                    'submit' => array('title' =>'Save'))
                )
            ;
            $helper = new HelperForm();
            $helper->table = 'micoso';
            $helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
            $helper->allow_employee_form_lang = (int)Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG');
            $helper->submit_action = 'mymod_pc_form';
            $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->tpl_vars = array(
                'fields_value' => array(
                    'enable_grades' => Tools::getValue('enable_grades', Configuration::get('MYMOD_GRADES')),
                    'enable_comments' => Tools::getValue('enable_comments', Configuration::get('MYMOD_COMMENTS')),
                ),
                'languages' => $this->context->controller->getLanguages()
            );
            return $helper->generateForm(array($fields_form));
        }
        public function installTab($parent, $class_name, $name) {
            $tab = new Tab();
            $tab->id_parent = (int)Tab::getIdFromClassName($parent);
            $tab->name = array();
        
            foreach (Language::getLanguages(true) as $lang) {
                $tab->name[$lang['id_lang']]  = $name;
            }
        
            $tab->class_name = $class_name;
            $tab->module = $this->name;
            $tab->active = 1;
        
            return $tab->add();
        }
        public function uninstallTab($class_name){
            $id_tab=(int)Tab::getIdFromClassName($class_name);
            $tab=new Tab((int) $id_tab);
            return $tab->delete();
        }
        public function hookModuleRoutes(){
            return array(
                'module-micoso-comments' => array(
                    'controller' => 'comments',
                    'rule' => 'product-comments{/:module_action}{/:product_rewrite}{/:id_product}/page{/:page}',
                    'keywords' => array(
                        'id_product' => array(
                            'regexp' => '[\d]+',
                            'param' => 'id_product'
                        ),
                        'page' => array(
                            'regexp' => '[\d]+',
                            'param' => 'page'
                        ),
                        'module_action' => array(
                            'regexp' => '[\w]+',
                            'param' => 'module_action'
                        ),
                        'product_rewrite' => array(
                            'regexp' => '[\w-_]+',
                            'param' => 'product_rewrite'
                        ),
                    ),
                    'params' => array(
                        'fc' => 'module',
                        'module' => 'micoso',
                        'controller' => 'comments'
                    )
                )
            );
        }
    }