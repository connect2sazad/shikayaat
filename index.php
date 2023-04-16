<?php

require_once "./constants.php";
require_once ___FUNCTIONS___;

session_start();
if (!isset($_SESSION[USER_GLOBAL_VAR]) || !array_key_exists(USER_GLOBAL_VAR, $_SESSION)) {
  header('location: login.php');
} else {
  // do nothing
}

$pn = isset($_GET['pn']) ? $_GET['pn'] : '404';

// ob_start("minifier");

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./" data-template="vertical-menu-template-free">

<head>
  <?= loadMetaData() ?>
  <?= loadTitleAndFavicon('The digital complaint box') ?>
  <?= loadStyleSheets() ?>
  <?= loadScripts() ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <style>
    canvas{
      height: 100%;
      width: 100%;
    }
  </style>
</head>

<body>

  <main>
    <div class="section-holder">
      <?= getComponent('header') ?>
      <?= getSidebar() ?>
      <section class="right-content-section" id="right-content-section">

        <div class="info-tiles">

          <div class="tile">
            <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number">452</div>
              <div class="number number-desc">Created Tickets</div>
            </div>
          </div>

          <div class="tile red-tile">
            <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number">452</div>
              <div class="number number-desc">Registered Users</div>
            </div>
          </div>

          <div class="tile green-tile">
            <div class="icon"><i class="fa fa-building" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number">452</div>
              <div class="number number-desc">Registered Departments</div>
            </div>
          </div>

          <div class="tile yellow-tile">
            <div class="icon"><i class="fa fa-university" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number">1</div>
              <div class="number number-desc">Organisation</div>
            </div>
          </div>

        </div>

        <div class="row m20px">
          <div class="column-60">
            <div class="card full-width p0 m0">
              <h1 class="card-heading">All Complaints</h1>
              <div class="card-content m0 p0">
                <div class="blank-60px"></div>
                <canvas id="myChart1"></canvas>
                <div class="blank-30px"></div>
              </div>
            </div>
          </div>
          <div class="column-40">
            <div class="card full-width p0 m0 height-100">
              <h1 class="card-heading">All Complaints</h1>
              <div class="card-content m0">
                <div class="blank-60px"></div>
                <canvas id="myChart"></canvas>
                <div class="blank-30px"></div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>

    <script>
      const xValues1 = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

      new Chart("myChart1", {
        type: "line",
        data: {
          labels: xValues1,
          datasets: [{
            data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
            borderColor: "red",
            fill: false
          }, {
            data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
            borderColor: "green",
            fill: false
          }, {
            data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
            borderColor: "blue",
            fill: false
          }]
        },
        options: {
          legend: {
            display: false
          }
        }
      });


      // pie chart
      var xValues = ["Italy", "France", "Spain"];
      var yValues = [55, 49, 44];
      var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797"
      ];

      new Chart("myChart", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        },
        options: {
          title: {
            display: true,
            text: "World Wide Wine Production 2018"
          }
        }
      });
    </script>

    <?= loadFooterScripts() ?>
</body>

</html>
<?php
ob_end_flush();
?>