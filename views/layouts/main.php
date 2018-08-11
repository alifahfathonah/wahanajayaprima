<?php /* @var $this Controller */ 
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<?php $this->head() ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<?= Html::csrfMetaTags() ?>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>	
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<title><?php echo Yii::$app->name . ' - ' . Yii::$app->controller->selected ?></title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.min.js" type="text/javascript"></script>
	
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->		
		<div class="top-menu">
			
			<ul class="nav navbar-nav pull-right">								
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->			
				<?php if (!\Yii::$app->user->isGuest) { ?>
						
				<li class="dropdown dropdown-user">					
					<a href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username username-hide-on-mobile">
					<?php echo Yii::$app->user->identity->username; ?></span>
					
					</a>
					
				</li>
				
				<?php }?>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="<?php echo Yii::$app->urlManager->createUrl('site/logout'); ?>" class="dropdown-toggle">
					KELUAR
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">	
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
			
					<input type="text" class="form-control sidebar-search-bordered" placeholder="PENCARIAN"/>
			
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					&nbsp;
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>		

				
				
				<?php if (!\Yii::$app->user->isGuest) { ?>
				
					<li class="start <?php if(Yii::$app->controller->selected == 'Dashboard') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('site/index');?>">
						
						<span class="title">MENU UTAMA</span>					
							<?php if(Yii::$app->controller->selected == "Dashboard") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
					<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>
					<li class="start <?php if(Yii::$app->controller->selected == 'KEUANGAN') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/index');?>">
						
						<span class="title">1. KEUANGAN</span>					
							<?php if(Yii::$app->controller->selected == "KEUANGAN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
					<?php } else { ?>
					<li class="start <?php if(Yii::$app->controller->selected == 'KEUANGAN') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('keuangan/harian');?>">
						
						<span class="title">1. LAPORAN HARIAN</span>					
							<?php if(Yii::$app->controller->selected == "KEUANGAN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
					<?php } ?>
					
					<li class="start <?php if(Yii::$app->controller->selected == 'BARANG HABIS PAKAI') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">2. BARANG HABIS PAKAI</span>					
							<?php if(Yii::$app->controller->selected == "BARANG HABIS PAKAI") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
					
					<li class="start <?php if(Yii::$app->controller->selected == 'ALAT BERAT & KENDARAAN') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">3. ALAT BERAT & KENDARAAN</span>					
							<?php if(Yii::$app->controller->selected == "ALAT BERAT & KENDARAAN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					
					<li class="start <?php if(Yii::$app->controller->selected == 'PROFILE PERUSAHAAN') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">4. PROFILE PERUSAHAAN</span>					
							<?php if(Yii::$app->controller->selected == "PROFILE PERUSAHAAN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					
					<?php if(Yii::$app->user->identity->role != 'Lapangan') { ?>
					<li class="start <?php if(Yii::$app->controller->selected == 'DOKUMEN PERUSAHAAN') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">5. DOKUMEN PERUSAHAAN</span>					
							<?php if(Yii::$app->controller->selected == "DOKUMEN PERUSAHAAN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					
					<li class="start <?php if(Yii::$app->controller->selected == 'PROFILE ANDA') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">6. PROFILE ANDA</span>					
							<?php if(Yii::$app->controller->selected == "PROFILE ANDA") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					<?php } else {?>
					<li class="start <?php if(Yii::$app->controller->selected == 'PROFILE ANDA') { echo 'active'; } ?> open">
						<a href="">
						
						<span class="title">5. PROFILE ANDA</span>					
							<?php if(Yii::$app->controller->selected == "PROFILE ANDA") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					<?php } ?>
					
					<?php if(Yii::$app->user->identity->role == 'Admin') { ?>
					<li class="start <?php if(Yii::$app->controller->selected == 'ADMIN') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('admin/index');?>">
						
						<span class="title">7. ADMIN</span>					
							<?php if(Yii::$app->controller->selected == "ADMIN") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
					<?php } ?>
				
				
			<?php } ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			
			
			<?php echo $content; ?>			
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">		 
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/scripts/components-pickers.js"></script>

<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jquery.numeric.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jshashtable-3.0.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jquery.numberformatter-1.2.4.jsmin.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>



<!-- END PAGE LEVEL SCRIPTS -->

<script>
	jQuery(document).ready(function() {    	
		
	
	   Metronic.init(); // init metronic core componets
	   Layout.init(); // init layout
	   QuickSidebar.init(); // init quick sidebar   
	   ComponentsPickers.init();
	  
	   
	});
</script>

<!-- END JAVASCRIPTS -->
<?php $this->endBody() ?>
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>