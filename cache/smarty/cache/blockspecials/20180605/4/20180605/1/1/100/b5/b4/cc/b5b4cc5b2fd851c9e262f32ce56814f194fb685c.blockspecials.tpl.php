<?php /*%%SmartyHeaderCode:30885b16dad00a1274-81762378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5b4cc5b2fd851c9e262f32ce56814f194fb685c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\themes\\default-bootstrap\\modules\\blockspecials\\blockspecials.tpl',
      1 => 1527281578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30885b16dad00a1274-81762378',
  'variables' => 
  array (
    'link' => 0,
    'special' => 0,
    'PS_CATALOG_MODE' => 0,
    'priceDisplay' => 0,
    'specific_prices' => 0,
    'priceWithoutReduction_tax_excl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b16dad074b498_29162138',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b16dad074b498_29162138')) {function content_5b16dad074b498_29162138($_smarty_tpl) {?>
<!-- MODULE Block specials -->
<div id="special_block_right" class="block">
	<p class="title_block">
        <a href="http://localhost/prestashop/bajamos-precios" title="Promociones especiales">
            Promociones especiales
        </a>
    </p>
	<div class="block_content products-block">
    		<ul>
        	<li class="clearfix">
            	<a class="products-block-image" href="http://localhost/prestashop/vestidos-verano/7-vestido-estampado-gasa.html">
                    <img 
                    class="replace-2x img-responsive" 
                    src="http://localhost/prestashop/20-small_default/vestido-estampado-gasa.jpg" 
                    alt="" 
                    title="Vestido de gasa estampado" />
                </a>
                <div class="product-content">
                	<h5>
                        <a class="product-name" href="http://localhost/prestashop/vestidos-verano/7-vestido-estampado-gasa.html" title="Vestido de gasa estampado">
                            Vestido de gasa estampado
                        </a>
                    </h5>
                                        	<p class="product-description">
                            Vestido sin mangas hasta la rodilla,...
                        </p>
                                        <div class="price-box">
                    	                        	<span class="price special-price">
                                                                    18,37 Q                            </span>
                                                                                                                                 <span class="price-percent-reduction">-20%</span>
                                                                                         <span class="old-price">
                                                                    22,96 Q                            </span>
                            
                                            </div>
                </div>
            </li>
		</ul>
		<div>
			<a 
            class="btn btn-default button button-small" 
            href="http://localhost/prestashop/bajamos-precios" 
            title="Todas las promociones especiales">
                <span>Todas las promociones especiales<i class="icon-chevron-right right"></i></span>
            </a>
		</div>
    	</div>
</div>
<!-- /MODULE Block specials -->
<?php }} ?>
