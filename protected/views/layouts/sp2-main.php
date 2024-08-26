<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<?php Yii::app()->clientScript->registerCoreScript('jquery', CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui', CClientScript::POS_END); ?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/sp2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<?php /*<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">*/ ?>

	<!-- Custom styles for this template-->
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/sp2/css/sb-admin-2.css" rel="stylesheet">
	<style>
		<?php if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_ADMIN)) { ?>.bg-gradient-primary {
			background-color: #2d8937;
			background-image: linear-gradient(180deg, #2d8937 10%, #0d2f11 100%);
			background-size: cover;
		}

		<?php } ?>.error {
			color: #5a5c69;
			font-size: inherit;
			position: inherit;
			line-height: inherit;
			/*width: inherit; */
		}
	</style>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php if (!Yii::app()->user->isGuest && !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) : ?>
			<?php $this->widget('SideNavWidget'); ?>
		<?php endif; ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column <?php echo Yii::app()->user->isGuest ? "bg-gradient-primary" : ""; ?>">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->widget('TopBarWidget'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<?php if (isset($this->breadcrumbs) && !Yii::app()->user->isGuest) : ?>
						<?php $this->widget('zii.widgets.CBreadcrumbs', array(
							'links' => $this->breadcrumbs,
						)); ?><!-- breadcrumbs -->
					<?php endif ?>

					<!-- Page Heading -->
					<!--<h1 class="h3 mb-4 text-gray-800">Blank Page</h1>-->

					<?php $this->widget('SpFlashMessageWidget'); ?>
					<br>
					<?php echo $content; ?>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; <?php echo date('Y'); ?></span><br />
						All Rights Reserved.<br />
					</div>
				</div>
			</footer>

			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/sp2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/sp2/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/sp2/js/sb-admin-2.min.js"></script>

</body>

</html>