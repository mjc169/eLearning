<?php

class SectionController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions' =>  array('index', 'view', 'create', 'update', 'delete', 'preview'),
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
		$model = new Section;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Section'])) {
			$model->attributes = $_POST['Section'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
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

		if (isset($_POST['Section'])) {
			$model->attributes = $_POST['Section'];
			if ($model->save()) {
				Yii::app()->user->setFlash('success', 'Section updated successfully!');
				$this->redirect(array('index', 'id' => $model->id));
			}
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
		if (!isset($_GET['ajax'])) {
			Yii::app()->user->setFlash('success', 'Section deleted successfully!');
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index', array());
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Section the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Section::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Section $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'section-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
