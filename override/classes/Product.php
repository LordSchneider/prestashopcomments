<?php
class Product extends ProductCore
{
	/*
    * module: Micoso
    * date: 2018-06-18 11:07:10
    * version: 1.1
    */
    public function getComments($limit_start, $limit_end = false)
	{
		$limit = (int)$limit_start;
		if ($limit_end)
			$limit = (int)$limit_start.','.(int)$limit_end;
		$comments = Db::getInstance()->executeS('
		SELECT * FROM `'._DB_PREFIX_.'micoso`
		WHERE `id_product` = '.(int)$this->id.'
		ORDER BY `date_add` DESC LIMIT '.$limit);
		return $comments;
	}
}