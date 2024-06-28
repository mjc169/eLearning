<?php

class AccountController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

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
		if (Yii::app()->user->isGuest || !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_ADMIN)) {
			throw new CHttpException(401, 'You are not authorized to perform this action. For Admin only');
		}

		return array(
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' =>  array('index', 'view', 'create', 'update', 'admin', 'delete', 'studentFormPartial', 'teacherFormPartial'),
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

	public function validateRelatedModel(&$account, &$relatedModel, &$valid)
	{
		if (isset($_POST['Teacher'])) {

			if ($relatedModel === null || !($relatedModel instanceof Teacher)) {
				$relatedModel = new Teacher;
			}

			$relatedModel->attributes = $_POST['Teacher'];

			$valid = $valid && $relatedModel->validate();
		}

		if (isset($_POST['Student'])) {
			if ($relatedModel === null || !($relatedModel instanceof Student)) {
				$relatedModel = new Student;
			}
			$relatedModel->attributes = $_POST['Student'];

			$valid = $valid && $relatedModel->validate();
		}

		if (isset($_POST['Account']) && $valid) {

			if (!$account->isNewRecord) {
				if ($account->student())
					$account->student()->delete();

				if ($account->teacher())
					$account->teacher()->delete();
			}

			$account->save(false);
			$relatedModel->account_id = $account->id;
			$relatedModel->save(false);

			$this->redirect(array('view', 'id' => $account->id));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$account = new Account;
		$relatedModel = new Teacher; //can be Student
		$valid = true;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($account);

		if (isset($_POST['Account'])) {
			$account->attributes = $_POST['Account'];

			$valid = $valid && $account->validate();
			$account->salt = Account::generateRandomStringWithUniqid();
			$account->password = password_hash($_POST['Account']['password'] . $account->salt, PASSWORD_DEFAULT);
		}

		$this->validateRelatedModel($account, $relatedModel, $valid);

		$this->render('create', array(
			'account' => $account,
			'relatedModel' => $relatedModel ?? null,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$account = $this->loadModel($id);
		$oldPassword = $account->password;
		$relatedModel = $account->getRelatedModel();
		$valid = true;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Account'])) {
			$account->attributes = $_POST['Account'];

			$valid = $valid && $account->validate();
			if ($oldPassword !== $_POST['Account']['password']) {
				$account->salt = Account::generateRandomStringWithUniqid();
				$account->password = $this->passwordHash($_POST['Account']['password'], $account->salt);
			}
		}

		$this->validateRelatedModel($account, $relatedModel, $valid);

		$this->render('update', array(
			'account' => $account,
			'relatedModel' => $relatedModel ?? new Teacher,
		));
	}

	private function passwordHash(string $password, $salt)
	{
		return password_hash($password . $salt, PASSWORD_DEFAULT);
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
		$dataProvider = new CActiveDataProvider('Account');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Account the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Account::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Account $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'account-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionStudentFormPartial($id = null)
	{
		$student = new Student;

		if ($id !== null) {
			$account = $this->loadModel($id);
			$student = $account->getRelatedModel();
		}

		if (!($student instanceof Student)) {
			$student = new Student;
		}

		if (isset($_POST['Student'])) {
			$student->attributes = $_POST['Student'];
			$student->validate();
		}

		$this->renderPartial('_studentForm', array(
			'student' => $student
		), false, true); // Don't include layout or scripts
	}

	public function actionTeacherFormPartial($id = null)
	{
		$teacher = new Teacher;

		if ($id !== null) {
			$account = $this->loadModel($id);
			$teacher = $account->getRelatedModel();
		}

		if (!($teacher instanceof Teacher)) {
			$teacher = new Teacher;
		}

		if (isset($_POST['Teacher'])) {
			$teacher->attributes = $_POST['Teacher'];
			$teacher->validate();
		}

		$this->renderPartial('_teacherForm', array(
			'teacher' => $teacher
		), false, true); // Don't include layout or scripts
	}
}
