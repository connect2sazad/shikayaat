<?php

require_once "./constants.php";
require_once ___FUNCTIONS___;

// session_start();
// if (!isset($_SESSION['msh_admin']) || !array_key_exists('msh_admin', $_SESSION)) {
//   header('location: login.php');
// } else {
//   // do nothing
// }

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

</head>

<body>

  <main>
    <div class="section-holder">
      <?= getComponent('header') ?>
      <?= getSidebar() ?>
      <section class="right-content-section" id="right-content-section">
        fsd
        <?= getPage($pn) ?>
      </section>

    </div>


    <?= loadFooterScripts() ?>
</body>

</html>
<?php
ob_end_flush();
?>