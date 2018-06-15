<?php
class MiCosos extends ObjectModel
{
	public $id_mymod_comment;
	public $id_shop;
	public $id_product;
	public $product_name;
	public $firstname;
	public $email;
	public $grade;
	public $comment;
	public $date_add;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'mymod_comment', 'primary' => 'id_mymod_comment', 'multilang' => false,
		'fields' => array(
			'id_shop' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'id_product' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'firstname' => array('type' => self::TYPE_STRING, 'validate' => 'isName', 'size' => 20),
			'email' => array('type' => self::TYPE_STRING, 'validate' => 'isEmail'),
			'grade' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'comment' => array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml'),
			'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDate', 'copy_post' => false),
		),
    );
}
