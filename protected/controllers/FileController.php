<?php

class FileController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index', 'myFiles', 'sharedFiles', 'assignFiles', 'view', 'create', 'update', 'admin', 'delete', 'download'),
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
		$model = new File;
		$model->uploader_id = Yii::app()->user->account->id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['File'])) {
			$model->attributes = $_POST['File'];
			$model->status = 1; //active

			//manual input
			$cUploadedFileInstance = CUploadedFile::getInstance($model, 'original_filename');

			if (!empty($cUploadedFileInstance)) {

				// Generate a unique filename (optional)
				$fileName = time() . '.' . $cUploadedFileInstance->extensionName;

				// Save the uploaded file
				$cUploadedFileInstance->saveAs('uploads/' . $fileName);

				$model->original_filename = $cUploadedFileInstance->name;
				$model->file_extension = $cUploadedFileInstance->extensionName;
				$model->e_filename = $fileName;
			}

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
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

		if (isset($_POST['File'])) {
			$model->attributes = $_POST['File'];
			$cUploadedFileInstance = CUploadedFile::getInstance($model, 'original_filename');

			print_r($cUploadedFileInstance);
			exit;
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
		$dataProvider = new CActiveDataProvider('File');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionMyFiles()
	{
		$uploader_id = Yii::app()->user->account->id;

		$criteria = new CDbCriteria();
		$criteria->compare('uploader_id', $uploader_id);

		$dataProvider = new CActiveDataProvider('File', array(
			'criteria' => $criteria,
		));

		$this->render('myFiles', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAssignFiles()
	{
		$model = new FileAssignment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['FileAssignment'])) {
			$model->attributes = $_POST['FileAssignment'];
			$model->status = 1; //active

			if (!empty($model->receiver_id)) {
				if ($model->save()) {
					Yii::app()->user->setFlash('success', 'File has been assigned successfully!');
					$this->redirect(array('assignFiles', 'id' => $model->id));
				}
			}

			if (!empty($model->teacher_class_subject_id)) {
				$groupBySubjects = ClassAssignment::listBySubjectAndNumberOfStudents(Yii::app()->user->account->id);

				if (!empty($groupBySubjects)) {

					if (isset($groupBySubjects[$model->teacher_class_subject_id])) {
						$studentAccounts = $groupBySubjects[$model->teacher_class_subject_id]['students'];

						foreach ($studentAccounts as $account) {

							$classFileAssignment = new FileAssignment;
							$classFileAssignment->file_id = $model->file_id;
							$classFileAssignment->receiver_id = $account->id;
							$classFileAssignment->status = 1; //active

							if ($classFileAssignment->validate()) {
								$classFileAssignment->save(false);
							}
						}

						Yii::app()->user->setFlash('success', 'File has been assigned successfully!');
						$this->redirect(array('assignFiles', 'id' => $model->id));
					}
				}

				Yii::app()->user->setFlash('error', 'Class has not been found, unable to share the file!');
				$this->redirect(array('assignFiles', 'id' => $model->id));
			}
		}

		$this->render('assignFiles', array(
			'model' => $model,
		));
	}

	public function actionSharedFiles()
	{
		$receiver_id = Yii::app()->user->account->id;

		$criteria = new CDbCriteria();
		$criteria->compare('receiver_id', $receiver_id);

		$dataProvider = new CActiveDataProvider('FileAssignment', array(
			'criteria' => $criteria,
		));

		$this->render('sharedFiles', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return File the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = File::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param File $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'file-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDownload($id)
	{
		$model = $this->loadModel($id);
		$this->downloadFile($model);
	}

	private function downloadFile(File $model)
	{
		// Validate filename (optional)
		// You can implement logic to validate the existence and access permission of the file

		$filePath = 'uploads/' . $model->e_filename; // Replace with your actual file path
		try {
			if (file_exists($filePath)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename=' . basename($model->original_filename));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($filePath));
				readfile($filePath);
				exit;
			} else {
				echo "File not found.";
				// Handle file not found error (optional)
				// You can redirect to an error page or display an error message
			}
		} catch (Exception $e) {
			print_r($e);
		}
	}
}
