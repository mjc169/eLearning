<?php

class TeacherSectionController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		if (Yii::app()->user->isGuest || !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER)) {
			throw new CHttpException(401, 'You are not authorized to perform this action. For Teacher only');
		}

		return array(
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' =>  array('preview'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionPreview()
	{
		//$teacher_id = Yii::app()->user->account->id;
		$sectionLists = Section::listByNumberOfStudents();

		$this->render('preview', array(
			'sectionLists' => $sectionLists,
		));
	}
}
