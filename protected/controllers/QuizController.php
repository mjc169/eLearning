<?php

class QuizController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'precreate', 'create', 'update', 'admin', 'delete'),
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
	public function actionPreCreate()
	{
		$model = new Quiz;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Quiz'])) {

			$model->attributes = $_POST['Quiz'];
			$this->redirect(array('create', 'subject_id' => $model->subject_id));
			exit;
		}

		$this->render('precreate', array(
			'model' => $model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($subject_id = null)
	{
		if (empty($subject_id)) {
			$this->redirect(array('precreate'));
		}

		$model = new Quiz;
		$model->subjectId = $subject_id;
		$model->questions = ['', '', '', '', '', '', '', '', '', ''];
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Quiz'])) {
			$model->attributes = $_POST['Quiz'];

			$model->due_date = !empty($model->due_date) ? $this->dateToYmd($model->due_date) : "";
			$model->availability_date = !empty($model->availability_date) ? $this->dateToYmd($model->availability_date) : "";
			$model->lock_date = !empty($model->lock_date) ? $this->dateToYmd($model->lock_date) : "";

			if ($model->save()) {
				$model->validateTos('question', '', true);
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	private function dateToYmd($dateStringMDY)
	{
		$dateTime = new DateTime($dateStringMDY); //"06/29/2024"

		// Format the DateTime object as Y-m-d
		$formattedDate = $dateTime->format("Y-m-d");

		return $formattedDate; // Output: 2024-06-29
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Quiz'])) {
			$model->attributes = $_POST['Quiz'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('update', array(
			'model' => $model,
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
		$dataProvider = new CActiveDataProvider('Quiz');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Quiz('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Quiz']))
			$model->attributes = $_GET['Quiz'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Quiz the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Quiz::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Quiz $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'quiz-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
