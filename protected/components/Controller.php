<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();


	public function init()
	{
		//$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_ADMIN) ? '//layouts/column2' : '//layouts/column1';
	}

	/**

	public $layout;

	public function init()
	{
		if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER)) {
			$this->layout = '//layouts/sp2-main';
			return;
		}

		if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) {
			$this->layout = '//layouts/sp2-student';
			return;
		}
	}

	

	public function init()
	{
		if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER)) {
			$this->layout = '//layouts/sp2-main';
			return;
		}

		if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) {
			$this->layout = '//layouts/sp2-student';
			return;
		}
	}

	public $layout;

	public function init()
	{
		$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER) ? '//layouts/sp2-main' : '//layouts/column2';
	}

	
	public $layout = '//layouts/column2';

	public function init()
	{
		$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT) ? '//layouts/sp2-student' : '//layouts/column1';
	}

	public $layout = '//layouts/column2';

	public function init()
	{
		$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER) ? '//layouts/sp2-main' : '//layouts/column2';
	}
	 */
	public function printExit($mixed)
	{
		print_r($mixed);
		exit;
	}

	public function varDumpExit($mixed)
	{
		var_dump($mixed);
		exit;
	}
}
