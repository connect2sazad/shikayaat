<?php

require_once "../constants.php";
require_once ___FUNCTIONS___;

session_start();
if (!isset($_SESSION[USER_GLOBAL_VAR]) || !array_key_exists(USER_GLOBAL_VAR, $_SESSION)) {
  header('location: ../login.php');
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
  <?= loadTitleAndFavicon('The Digital Complaint Platform') ?>
  <?= loadStyleSheets() ?>
  <?= loadScripts() ?>
  <?= getAjaxRequester() ?>

  <script src="https://cdn.tiny.cloud/1/ajtejntm7b6j5pcvcakxixlmbh09wbma7bvicap7n63ns0ad/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'autolink lists link image',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image'
    });
  </script>
</head>

<body>

  <div class="loader-overlay">
    <div class="loader-gate left-loader">
      <div class="logo-left">
        <img src="../assets/images/logo-left.png">
      </div>
    </div>

    <div class="loader-gate right-loader">
      <div class="logo-right">
        <img src="../assets/images/logo-right.png">
      </div>
    </div>

    <div class="shikayaat-name">
      shikayaat
    </div>
  </div>

  <main>
    <?= getComponent('header') ?>
    <div class="section-holder">

      <?= getSidebar($pn) ?>
      <section class="right-content-section" id="right-content-section">
        <?= getPage($pn) ?>
      </section>

    </div>


    <?= loadFooterScripts() ?>


</body>

</html>
<?php
ob_end_flush();
?>