<?php
class Search extends SearchCore
{
	/*
    * module: Micoso
    * date: 2018-06-18 11:07:11
    * version: 1.1
    */
    public static function find($id_lang, $expr, $page_number = 1, $page_size = 1, $order_by = 'position',
								$order_way = 'desc', $ajax = false, $use_cookie = true, Context $context = null)
	{
        $find = parent::find($id_lang, $expr, $page_number, $page_size, $order_by, $order_way, $ajax, $use_cookie, $context);
        
        if (isset($find['result']) && !empty($find['result']) && Module::isInstalled('mymodcomments'))
		{
			$products = $find['result'];
			$id_product_list = array();
			foreach ($products as $p)
				$id_product_list[] = (int)$p['id_product'];
			require_once(dirname(__FILE__).'/../../modules/mymodcomments/classes/MyModComment.php');
			$grades_comments = Db::getInstance()->executeS('SELECT `id_product`, AVG(`grade`) as grade_avg, count(`ai_di`) as nb_comments FROM `'._DB_PREFIX_. 'micoso` WHERE `ai_di` IN('.implode(',',$id_product_list).') GROUP BY `ai_di`');
			foreach ($products as $kp => $p)
				foreach ($grades_comments as $gc)
					if ($gc['id_product'] == $p['id_product'])
					{
						$products[$kp]['mymodcomments']['grade_avg'] = round($gc['grade_avg']);
						$products[$kp]['mymodcomments']['nb_comments'] = $gc['nb_comments'];
					}
			$find['result'] = $products;
        }
	}
}