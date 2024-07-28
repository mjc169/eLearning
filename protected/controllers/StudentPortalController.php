<?php

class StudentPortalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	public function init()
	{
		$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT) ? '//layouts/sp2-student' : '//layouts/column1';
	}

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
		if (Yii::app()->user->isGuest || !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) {
			throw new CHttpException(401, 'You are not authorized to perform this action. For Student only');
		}

		return array(
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' =>  array('classList', 'quizList', 'takeQuiz'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionClassList()
	{
		$student_id = Yii::app()->user->account->id;
		$classLists = ClassAssignment::listBySubjectForStudent($student_id);

		$this->render('classList', array(
			'classLists' => $classLists,
		));
	}

	public function actionQuizList()
	{
		$student_id = Yii::app()->user->account->id;
		$classLists = ClassAssignment::listBySubjectForStudent($student_id);
		$subjectIds = [];
		foreach ($classLists as $classList) {
			$subjectIds[] = $classList['subject']->id;
		}

		$criteria = new CDbCriteria;
		$criteria->addInCondition('id', $subjectIds);
		$quizzes = Quiz::model()->findAll($criteria);

		$this->render('quizList', array(
			'quizzes' => $quizzes,
		));
	}

	public function actionTakeQuiz($quiz_id)
	{
		$student_id = Yii::app()->user->account->id;
		$quiz = Quiz::model()->findByPk($quiz_id);

		$this->render('takeQuiz', array(
			'quiz' => $quiz,
		));
	}
}
