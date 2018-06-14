<?php
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
            if (!$this->registerHook('displayProductTabContent') || !$this->registerHook('displayBackOfficeHeader') || !$this->registerHook('ModuleRoutes'))
            return false;
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
                        'ai_di'=>(int) $id_product,
                        'namen'=>"$name",
                        'email'=>"$mail",
                        'grade'=>(int) $grade,
                        'comment'=>"$comment",
                        'date_add'=>date('Y-m-d H:i:s'),
                    );
                    Db::getInstance()->insert('mymod_comment',$insert);
                    $this->context->smarty->assign('new_comment_posted','true');
                }
            }
        }
        public function hookDisplayProductTabContent($params){
            $this->processProductTabContent();
            $this->assignProductTabContent();
            return $this->display(__FILE__,'displayProductTabContent.tpl');
        }
        public function assignProductTabContent(){
            $enable_grades=Configuration::get('MYMOD_GRADES');
            $enable_comments=Configuration::get('MYMOD_COMMENTS');
            $id_product=Tools::getValue('id_product');
            $comments=Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'mymod_comment WHERE id_product = '.(int)$id_product.' ORDER BY `date_add` DESC LIMIT 3');
            $this->context->controller->addCSS($this->_path.'views/css/micoso.css','all');
            $this->context->controller->addCSS($this->_path.'views/css/star-rating.css','all');
            $this->context->controller->addJS($this->_path.'views/js/star-rating.js');
            $this->context->controller->addJS($this->_path.'views/js/micoso.js');
            $this->context->smarty->assign('enable_grades',$enable_grades);
            $this->context->smarty->assign('enable_comments',$enable_comments);
            $this->context->smarty->assign('comments',$comments);
            $comments=Db::getInstance()->executeS('SELECT * FROM `'._DB_PREFIX_.'mymod_comment` WHERE `id_product` = '.(int)$id_product.' ORDER BY `date_add` DESC LIMIT 3');
        }
        public function onClickOption($type, $href=false){
            $confirm_reset= $this->l('Reinicializar este modulo borrara todos los datos de tu base de datos.¿Deseas reinicializarlo? ');
            $reset_callback="return mymodcomments_reset('".addslashes($confirm_reset)."');";
            $matchType=array(
                'reset'=>"return confirm('Resetear?');",
                'delete'=>"return confirm('Quieres borrar?');",
            );
            if (isset($matchType[$type])) {
                return $matchType[$type];
                return '';
            }
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
                        'title' => $this->module->l('My Module configuration'),
                        'icon' => 'icon-envelope'
                    ),
                    'input' => array(
                        array(
                            'type' => 'switch',
                            'label' => $this->module->l('Enable grades:'),
                            'name' => 'enable_grades',
                            'desc' => $this->module->l('Enable grades on products.'),
                            'values' => array(
                                array('id' => 'enable_grades_1', 'value' => 1, 'label' => $this->module->l('Enabled')),
                                array('id' => 'enable_grades_0', 'value' => 0, 'label' => $this->module->l('Disabled'))
                            ),
                        ),
                        array(
                            'type' => 'switch',
                            'label' => $this->module->l('Enable comments:'), 'name' => 'enable_comments',
                            'desc' => $this->module->l('Enable comments on products.'),
                            'values' => array(
                                array('id' => 'enable_comments_1', 'value' => 1, 'label' => $this->module->l('Enabled')),
                                array('id' => 'enable_comments_0', 'value' => 0, 'label' => $this->module->l('Disabled'))
                            ),
                        ),
                    ),
                    'submit' => array('title' => $this->module->l('Save'))
                )
            );
            $helper = new HelperForm();
		    $helper->table = 'mymodcomments';
	    	$helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
		    $helper->allow_employee_form_lang = (int)Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG');
	    	$helper->submit_action = 'mymod_pc_form';
	    	$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->module->name.'&tab_module='.$this->module->tab.'&module_name='.$this->module->name;
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
                        'module' => 'mymodcomments',
                        'controller' => 'comments'
                    )
                )
            );
        }
    }