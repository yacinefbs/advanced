<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\models\User;

AppAsset::register($this);
DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class='skin-blue sidebar-mini wysihtml5-supported'>
<?php $this->beginBody() ?>

<div class="wrapper">
<!-- header modifié -->
  <header class="main-header">
    <!-- Logo -->
    <a href="<?= Url::to(['site/index']) ?> " class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <?php
        if (!Yii::$app->user->isGuest) {
        ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                  <?php 
                     $user = User::findOne(Yii::$app->user->id); 
                      echo $user->username;
                  ?>                
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p> 
                  <?php 
                     $user = User::findOne(Yii::$app->user->id); 
                     echo $user->username;
                     ?>
                  <small>Membre depuis 
                    <?php 
                     $user = User::findOne(Yii::$app->user->id);
                     $date = date('d/M/Y', $user->created_at); 
                      echo $date;
                     ?>
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row"> -->
                  <!-- <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div> -->
                <!-- </div> -->
                <!-- /.row -->
              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <div class="btn btn-default btn-flat">
                    <?= Html::a('Logout', ['site/logout'], ['data-method' => 'post']); ?>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <?php
          }
          else{
          ?>
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
          <?php } ?>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!-- header modifié fin -->


 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php 
            if (!Yii::$app->user->isGuest) {
               $user = User::findOne(Yii::$app->user->id); 
                echo $user->username;
            }
             ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <!--<li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['client/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['client/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un Client</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Article</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['article/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['article/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un article</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Article Api</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['articles-api/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['articles-api/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un article</a></li>
          </ul>
        </li>
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Publication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['publication/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['publication/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un Publication</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Catégorie</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['categorie/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['categorie/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter une catégorie</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>&Eacute;v&eacute;nement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['evenement/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['evenement/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un événement</a></li>
          </ul>
        </li>
        -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Cinéma</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['evenement/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['evenement/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un événement</a></li>
          </ul>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Pays</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['pays/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['pays/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un pays</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Ville</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['villes/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['villes/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter une ville</a></li>
          </ul>
        </li>
        <!-- Début : sidebar ajoutée -->
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Acteurs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-equipe/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-equipe/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un acteur (réalisateur)</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Métiers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-metiers/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-metiers/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un métier</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Films</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-films/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-films/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un film</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Genres</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-genres/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-genres/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un genre</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Métiers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-metiers/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-metiers/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter un métier</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Salles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="active"><a href="<?= Url::to(['cinema-salles/index']) ?> "><i class="fa  fa-eye"></i> Listes</a></li>
            <li class="active"><a href="<?= Url::to(['cinema-salles/create']) ?>"><i class="fa  fa-plus-circle"></i> Ajouter une salle</a></li>
          </ul>
        </li>
        <!-- Fin   : sidebar ajoutée -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
<div class="content-wrapper">
<!-- <div class="container"> -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <!-- </div> -->
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script>
  // /*$(function () {
  //   //Initialize Select2 Elements
  //   $(".select2").select2();

  //   //Datemask dd/mm/yyyy
  //   $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  //   //Datemask2 mm/dd/yyyy
  //   $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
  //   //Money Euro
  //   $("[data-mask]").inputmask();

  //   //Date range picker
  //   $('#reservation').daterangepicker();
  //   //Date range picker with time picker
  //   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
  //   //Date range as a button
  //   $('#daterange-btn').daterangepicker(
  //       {
  //         ranges: {
  //           'Today': [moment(), moment()],
  //           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
  //           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //           'This Month': [moment().startOf('month'), moment().endOf('month')],
  //           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //         },
  //         startDate: moment().subtract(29, 'days'),
  //         endDate: moment()
  //       },
  //       function (start, end) {
  //         $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  //       }
  //   );

  //   //Date picker
  //   $('#datepicker').datepicker({
  //     autoclose: true
  //   });

  //   //iCheck for checkbox and radio inputs
  //   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  //     checkboxClass: 'icheckbox_minimal-blue',
  //     radioClass: 'iradio_minimal-blue'
  //   });
  //   //Red color scheme for iCheck
  //   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  //     checkboxClass: 'icheckbox_minimal-red',
  //     radioClass: 'iradio_minimal-red'
  //   });
  //   //Flat red color scheme for iCheck
  //   $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  //     checkboxClass: 'icheckbox_flat-green',
  //     radioClass: 'iradio_flat-green'
  //   });

  //   //Colorpicker
  //   $(".my-colorpicker1").colorpicker();
  //   //color picker with addon
  //   $(".my-colorpicker2").colorpicker();

  //   //Timepicker
  //   $(".timepicker").timepicker({
  //     showInputs: false
  //   });
  // });
  // $(function () {
  //   /* ChartJS
  //    * -------
  //    * Here we will create a few charts using ChartJS
  //    */

  //   //--------------
  //   //- AREA CHART -
  //   //--------------

  //   // Get context with jQuery - using jQuery's .get() method.
  //   var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
  //   // This will get the first returned node in the jQuery collection.
  //   var areaChart = new Chart(areaChartCanvas);

  //   var areaChartData = {
  //     labels: ["January", "February", "March", "April", "May", "June", "July"],
  //     datasets: [
  //       {
  //         label: "Electronics",
  //         fillColor: "rgba(210, 214, 222, 1)",
  //         strokeColor: "rgba(210, 214, 222, 1)",
  //         pointColor: "rgba(210, 214, 222, 1)",
  //         pointStrokeColor: "#c1c7d1",
  //         pointHighlightFill: "#fff",
  //         pointHighlightStroke: "rgba(220,220,220,1)",
  //         data: [65, 59, 80, 81, 56, 55, 40]
  //       },
  //       {
  //         label: "Digital Goods",
  //         fillColor: "rgba(60,141,188,0.9)",
  //         strokeColor: "rgba(60,141,188,0.8)",
  //         pointColor: "#3b8bba",
  //         pointStrokeColor: "rgba(60,141,188,1)",
  //         pointHighlightFill: "#fff",
  //         pointHighlightStroke: "rgba(60,141,188,1)",
  //         data: [28, 48, 40, 19, 86, 27, 90]
  //       }
  //     ]
  //   };

  //   var areaChartOptions = {
  //     //Boolean - If we should show the scale at all
  //     showScale: true,
  //     //Boolean - Whether grid lines are shown across the chart
  //     scaleShowGridLines: false,
  //     //String - Colour of the grid lines
  //     scaleGridLineColor: "rgba(0,0,0,.05)",
  //     //Number - Width of the grid lines
  //     scaleGridLineWidth: 1,
  //     //Boolean - Whether to show horizontal lines (except X axis)
  //     scaleShowHorizontalLines: true,
  //     //Boolean - Whether to show vertical lines (except Y axis)
  //     scaleShowVerticalLines: true,
  //     //Boolean - Whether the line is curved between points
  //     bezierCurve: true,
  //     //Number - Tension of the bezier curve between points
  //     bezierCurveTension: 0.3,
  //     //Boolean - Whether to show a dot for each point
  //     pointDot: false,
  //     //Number - Radius of each point dot in pixels
  //     pointDotRadius: 4,
  //     //Number - Pixel width of point dot stroke
  //     pointDotStrokeWidth: 1,
  //     //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
  //     pointHitDetectionRadius: 20,
  //     //Boolean - Whether to show a stroke for datasets
  //     datasetStroke: true,
  //     //Number - Pixel width of dataset stroke
  //     datasetStrokeWidth: 2,
  //     //Boolean - Whether to fill the dataset with a color
  //     datasetFill: true,
  //     //String - A legend template
  //     legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  //     //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  //     maintainAspectRatio: true,
  //     //Boolean - whether to make the chart responsive to window resizing
  //     responsive: true
  //   };

  //   //Create the line chart
  //   areaChart.Line(areaChartData, areaChartOptions);

  //   //-------------
  //   //- LINE CHART -
  //   //--------------
  //   var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
  //   var lineChart = new Chart(lineChartCanvas);
  //   var lineChartOptions = areaChartOptions;
  //   lineChartOptions.datasetFill = false;
  //   lineChart.Line(areaChartData, lineChartOptions);

  //   //-------------
  //   //- PIE CHART -
  //   //-------------
  //   // Get context with jQuery - using jQuery's .get() method.
  //   var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  //   var pieChart = new Chart(pieChartCanvas);
  //   var PieData = [
  //     {
  //       value: 700,
  //       color: "#f56954",
  //       highlight: "#f56954",
  //       label: "Chrome"
  //     },
  //     {
  //       value: 500,
  //       color: "#00a65a",
  //       highlight: "#00a65a",
  //       label: "IE"
  //     },
  //     {
  //       value: 400,
  //       color: "#f39c12",
  //       highlight: "#f39c12",
  //       label: "FireFox"
  //     },
  //     {
  //       value: 600,
  //       color: "#00c0ef",
  //       highlight: "#00c0ef",
  //       label: "Safari"
  //     },
  //     {
  //       value: 300,
  //       color: "#3c8dbc",
  //       highlight: "#3c8dbc",
  //       label: "Opera"
  //     },
  //     {
  //       value: 100,
  //       color: "#d2d6de",
  //       highlight: "#d2d6de",
  //       label: "Navigator"
  //     }
  //   ];
  //   var pieOptions = {
  //     //Boolean - Whether we should show a stroke on each segment
  //     segmentShowStroke: true,
  //     //String - The colour of each segment stroke
  //     segmentStrokeColor: "#fff",
  //     //Number - The width of each segment stroke
  //     segmentStrokeWidth: 2,
  //     //Number - The percentage of the chart that we cut out of the middle
  //     percentageInnerCutout: 50, // This is 0 for Pie charts
  //     //Number - Amount of animation steps
  //     animationSteps: 100,
  //     //String - Animation easing effect
  //     animationEasing: "easeOutBounce",
  //     //Boolean - Whether we animate the rotation of the Doughnut
  //     animateRotate: true,
  //     //Boolean - Whether we animate scaling the Doughnut from the centre
  //     animateScale: false,
  //     //Boolean - whether to make the chart responsive to window resizing
  //     responsive: true,
  //     // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  //     maintainAspectRatio: true,
  //     //String - A legend template
  //     legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  //   };
  //   //Create pie or douhnut chart
  //   // You can switch between pie and douhnut using the method below.
  //   pieChart.Doughnut(PieData, pieOptions);

  //   //-------------
  //   //- BAR CHART -
  //   //-------------
  //   var barChartCanvas = $("#barChart").get(0).getContext("2d");
  //   var barChart = new Chart(barChartCanvas);
  //   var barChartData = areaChartData;
  //   barChartData.datasets[1].fillColor = "#00a65a";
  //   barChartData.datasets[1].strokeColor = "#00a65a";
  //   barChartData.datasets[1].pointColor = "#00a65a";
  //   var barChartOptions = {
  //     //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
  //     scaleBeginAtZero: true,
  //     //Boolean - Whether grid lines are shown across the chart
  //     scaleShowGridLines: true,
  //     //String - Colour of the grid lines
  //     scaleGridLineColor: "rgba(0,0,0,.05)",
  //     //Number - Width of the grid lines
  //     scaleGridLineWidth: 1,
  //     //Boolean - Whether to show horizontal lines (except X axis)
  //     scaleShowHorizontalLines: true,
  //     //Boolean - Whether to show vertical lines (except Y axis)
  //     scaleShowVerticalLines: true,
  //     //Boolean - If there is a stroke on each bar
  //     // barShowStroke: true,
  //     //Number - Pixel width of the bar stroke
  //     barStrokeWidth: 2,
  //     //Number - Spacing between each of the X value sets
  //     barValueSpacing: 5,
  //     //Number - Spacing between data sets within X values
  //     barDatasetSpacing: 1,
  //     //String - A legend template
  //     legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  //     //Boolean - whether to make the chart responsive
  //     responsive: true,
  //     maintainAspectRatio: true
  //   };

  //   barChartOptions.datasetFill = false;
  //   barChart.Bar(barChartData, barChartOptions);
  // });*/
</script>
</body>
</html>
<?php $this->endPage() ?>
