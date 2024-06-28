<?php

class StudentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout;

	public function init()
	{
		$this->layout = !Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER) ? '//layouts/sp2-main' : '//layouts/column2';
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

	public function accessRules()
	{
		if (Yii::app()->user->isGuest || !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_TEACHER)) {
			throw new CHttpException(401, 'You are not authorized to perform this action. For Admin only');
		}

		return array(
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' =>  array('index', 'view', 'create', 'update', 'admin', 'delete'),
				'users' => array('@'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$student = new Student;
		$account = new Account;
		$account->account_type = Account::ACCOUNT_TYPE_STUDENT;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($student);

		if (isset($_POST['Student']) || isset($_POST['Account'])) {
			if (isset($_POST['Student']))
				$student->attributes = $_POST['Student'];

			if (isset($_POST['Account']))
				$account->attributes = $_POST['Account'];

			if ($account->validate() && $student->validate()) {
				$account->salt = Account::generateRandomStringWithUniqid();
				$account->password = password_hash($_POST['Account']['password'] . $account->salt, PASSWORD_DEFAULT);
				$account->save(false);

				$student->account_id = $account->id;
				$student->save(false);

				$this->redirect(array('view', 'id' => $student->id));
			}
		}

		$this->render('create', array(
			'student' => $student,
			'account' => $account
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate($id)
	{
		$student = $this->loadModel($id);
		$account = $student->account;
		$oldPassword = $account->password;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if (isset($_POST['Student']) || isset($_POST['Account'])) {
			if (isset($_POST['Student']))
				$student->attributes = $_POST['Student'];

			if (isset($_POST['Account']))
				$account->attributes = $_POST['Account'];

			if ($account->validate() && $student->validate()) {

				if ($oldPassword !== $_POST['Account']['password']) {
					$model->salt = Account::generateRandomStringWithUniqid();
					$model->password = $this->passwordHash($_POST['Account']['password'], $model->salt);
				}

				$account->save();
				$student->save();

				$this->redirect(array('view', 'id' => $student->id));
			}
		}

		$this->render('update', array(
			'student' => $student,
			'account' => $account,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Student');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Student the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Student::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Student $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
