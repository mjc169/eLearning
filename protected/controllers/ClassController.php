<?php

class ClassController extends Controller
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
		if (Yii::app()->user->isGuest || Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) {
			throw new CHttpException(401, 'You are not authorized to perform this action. For Teacher only');
		}

		return array(
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'assignClass'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$teacher_id = Yii::app()->user->account->id;

		$groupBySubjects = ClassAssignment::listBySubjectAndNumberOfStudents($teacher_id);
		$subjects = [];
		foreach ($groupBySubjects as $groupBySubject) {
			$subject = $groupBySubject['subject'];
			$subjects[$subject->subject_code] = $groupBySubject;
		}

		$studentsBySubject = $subjects;
		$this->render('index', array(
			'studentsBySubject' => $studentsBySubject,
		));
	}



	public function actionAssignClass()
	{
		$model = new ClassAssignment;
		$model->teacher_id = Yii::app()->user->account->id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['ClassAssignment'])) {
			$model->attributes = $_POST['ClassAssignment'];
			$model->status = 1; //active

			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Class assigned successfully!');
				$this->redirect(array('assignClass', 'id' => $model->id));
			}
		}

		$this->render('assignClass', array(
			'model' => $model,
		));
	}
}
