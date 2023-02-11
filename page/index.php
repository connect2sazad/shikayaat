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
  <?= loadTitleAndFavicon('The digital complaint box') ?>
  <?= loadStyleSheets() ?>
  <?= loadScripts() ?>
  <?= getAjaxRequester() ?>
</head>

<body>

  <main>
    <div class="section-holder">
      <?= getComponent('header') ?>
      <?= getSidebar() ?>
      <section class="right-content-section" id="right-content-section">
        <?= getPage($pn) ?>
      </section>

    </div>


    <?= loadFooterScripts() ?>

    <script src="<?= SITE_DIR ?>assets/vendors/tinymce/tinymce.min.js"></script>

    <!-- <script>
        // $('#tox-statusbar__branding').hide();
        // $('.tox-promotion').hide();
        tinymce.init({
            selector: 'textarea',
            height: 500,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'help'
            ],
            toolbar1: 'undo redo | styleselect | bold italic underline ' +
                'fontsizeselect fontselect | forecolor backcolor',
            toolbar2: ' spellchecker | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat lineheight | code fullscreen codesample preview | help',
            table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',
            table_appearance_options: true,
            spellchecker_dialog: true,
            menubar: 'favs file edit view insert format tools table help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            statusbar: false,
            fontsize_formats: '6pt 8pt 10pt 12pt 14pt 18pt 24pt 36pt 72pt',
            // skin: skin,
            // content_css: content_css,
        });
    </script> -->
</body>

</html>
<?php
ob_end_flush();
?>