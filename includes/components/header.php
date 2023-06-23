<header>
    <div class="project-title-container">
      <div class="logo-img">
        <div class="img-holder">
          <img src="<?=SITE_HOME?>assets/images/logo.png" alt="Logo">
        </div>
      </div>
      <div class="project-title">
        shikayaat
      </div>
    </div>
    <div class="control-menu">
      <ul class="control-menu-list">
        <li><a href="<?=SITE_HOME?>">home</a></li>
        <li><a href="<?=SITE_HOME?>page/?pn=about">about</a></li>
        <li><a href="<?=SITE_HOME?>page/?pn=sales">sales</a></li>
        <li><a href="<?=SITE_HOME?>page/?pn=support">support</a></li>
        <li><a href="<?=SITE_HOME?>page/?pn=settings"><?= $_SESSION[USER_GLOBAL_VAR] ?></a></li>
        <li><a href="<?=SITE_HOME?>logout.php">logout</a></li>
      </ul>
    </div>
  </header>