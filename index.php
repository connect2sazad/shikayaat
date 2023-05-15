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
    canvas {
      height: 100%;
      width: 100%;
    }
  </style>

  <script>
    $.ajax({
      url: '<?= NEWS_API ?>?nc=6',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        var swiper_news = '';
        response.forEach(element => {
          // console.log(element.description);
          swiper_news += '<div class="swiper-slide">';
          swiper_news += '<div class="news-title">' + element.title + '</div>';
          swiper_news += '<div class="news-date">' + formatDate(element.updated_at) + '</div>';
          swiper_news += '<div class="news-description">' + element.description + '</div>';
          swiper_news += '</div>';
        });
        // console.log(swiper_news);
        $('#swiper-news').html(swiper_news);
      },
      error: function(error) {
        console.log(error);
      }
    });
  </script>
</head>

<body>

  <div class="loader-overlay">
    <div class="loader-gate left-loader">
      <div class="logo-left">
        <img src="./assets/images/logo-left.png">
      </div>
    </div>

    <div class="loader-gate right-loader">
      <div class="logo-right">
        <img src="./assets/images/logo-right.png">
      </div>
    </div>

    <div class="shikayaat-name">
      shikayaat
    </div>
  </div>

  <main>
    <div class="section-holder">
      <?= getComponent('header') ?>
      <?= getSidebar() ?>
      <section class="right-content-section" id="right-content-section">

        <div class="info-tiles">

          <div class="tile">
            <div class="icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number"><?= getComplaintsCount() ?></div>
              <div class="number number-desc">Raised Tickets</div>
            </div>
          </div>

          <div class="tile">
            <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number"><?= getUsersCount() ?></div>
              <div class="number number-desc">Registered Users</div>
            </div>
          </div>

          <div class="tile">
            <div class="icon"><i class="fa fa-building" aria-hidden="true"></i></div>
            <div class="content">
              <div class="number"><?= getDepartmentsCount() ?></div>
              <div class="number number-desc">Registered Departments</div>
            </div>
          </div>

          <div class="tile">
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
              <h1 class="card-heading">Tickets against Departments</h1>
              <div class="card-content m0 p0">
                <div class="blank-60px"></div>
                <canvas id="lineChart"></canvas>
                <div class="blank-30px"></div>
              </div>
            </div>
          </div>
          <div class="column-40">
            <div class="card full-width p0 m0 height-100">
              <h1 class="card-heading">Tickets Soberness</h1>
              <div class="card-content m0">
                <div class="blank-60px"></div>
                <canvas id="pieChart"></canvas>
                <div class="blank-30px"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row m20px">
          <div class="column-70">
            <div class="card full-width p0 m0">
              <h1 class="card-heading">Tickets Frequency</h1>
              <div class="card-content m0 p0">
                <div class="blank-60px"></div>
                <canvas id="barChart"></canvas>
                <div class="blank-30px"></div>
              </div>
            </div>
          </div>
          <div class="column-30">
            <div class="card full-width p0 m0 height-100">
              <h1 class="card-heading">News</h1>
              <div class="card-content m0">
                <div class="blank-60px"></div>
                <div class="swiper news-and-events" id="news-and-events">
                  <div class="swiper-wrapper" id="swiper-news">
                    <!-- <div class="swiper-slide">
                      <div class="news-title">SECOND last frontier for financial sector reforms: Cooperative Banks</div>
                      <div class="news-date">2023-04-19 12:23:26</div>
                      <div class="news-description">the Highlights India\u2019s cooperative banks have so far remained out of bounds of the multiple reforms for the financial sector taken since 1991 Cooperative banks still remain handy instruments for political parties, a channel for dispensing political patronage RBI observed a series of challenges regarding cooperative banks, including deficient corporate governance practices, and rising incidence of frauds Lines of distinction between commercial banks, and cooperative banks are fast blurring with everyone competing for the same set of clients Large-scale reforms, and not the gradualism noticed.</div>
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div> -->
                  </div>
                </div>
                <!-- <div class="swiper mySwiper">
                  <div class="swiper-wrapper height-100">
                    <div class="swiper-slide">Slide 1</div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>

    <?php
    $priorities_list = getPrioritiesList();
    $priority_colors = array();
    $priority_names = array();
    $priority_counts = array();
    if (mysqli_num_rows($priorities_list) > 0) {
      while ($row = mysqli_fetch_assoc($priorities_list)) {
        if ($row['is_priority']) {
          array_push($priority_colors, $row['color']);
          array_push($priority_names, $row['priority_name']);
          array_push($priority_counts, getPriorityCounts($row['priorityid'])['COUNT(*)']);
        }
      }
    }


    // Last 8 Months Graph
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $last8months_data = last8MonthsComplaintsCounts();
    $last8months = array();
    for ($i = 0; $i < 8; $i++) {
      $timestamp = strtotime("-$i month");

      $last8months[date('F Y', $timestamp)] = 0;
    }

    $last8months = array_reverse($last8months);
    if (mysqli_num_rows($last8months_data) > 0) {
      while ($row = mysqli_fetch_assoc($last8months_data)) {
        $month_data = $months[$row['month'] - 1] . " " . $row['year'];
        $last8months[$month_data] = $row['count'];
      }
    }
    print_r($last8months);


    ?>

    <script>
      const xValues1 = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

      new Chart("lineChart", {
        type: "line",
        data: {
          labels: xValues1,
          datasets: [{
              data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
              borderColor: "red",
              fill: false
            },
            {
              data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
              borderColor: "green",
              fill: false
            }, {
              data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
              borderColor: "blue",
              fill: false
            }
          ]
        },
        options: {
          legend: {
            display: false
          }
        }
      });


      // pie chart
      var xValues = [<?php echo '"' . implode('", "', $priority_names) . '"'; ?>];
      var yValues = [<?php echo '"' . implode('", "', $priority_counts) . '"'; ?>];
      var barColors = [<?php echo '"#' . implode('", "#', $priority_colors) . '"'; ?>];

      new Chart("pieChart", {
        type: "pie",
        data: {
          labels: xValues,
          datasets: [{
            backgroundColor: barColors,
            data: yValues
          }]
        }
      });



      var xValues3 = [
        <?php
        $last8months_keys = array_keys($last8months);
        echo '"' . implode('", "', $last8months_keys) . '"';
        ?>
      ];
      var yValues3 = [
        <?php
        $last8months_counts = array_values($last8months);
        echo '"' . implode('", "', $last8months_counts) . '"';
        ?>
      ];
      var barColors3 = "#8A8585";

      new Chart("barChart", {
        type: "bar",
        data: {
          labels: xValues3,
          datasets: [{
            backgroundColor: barColors3,
            data: yValues3
          }]
        },
        options: {
          scales: {
            y: {
              type: 'linear',
              ticks: {
                stepSize: 1
              }
            }
          },
          legend: {
            display: false
          }
        }
      });
    </script>

    <?= loadFooterScripts() ?>

    <script>
      var swiper = new Swiper(".news-and-events", {
        direction: "vertical",
        loop: true,
        autoplay: {
          delay: 2000,
        },
        speed: 2000,
        // autoHeight: true,
        slidesPerView: 2,
      });
    </script>
</body>

</html>
<?php
ob_end_flush();
?>