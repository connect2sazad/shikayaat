<?php

require_once "./constants.php";
require_once ___FUNCTIONS___;

ob_start("minifier");

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./" data-template="vertical-menu-template-free">

<head>
    <?= loadMetaData() ?>
    <?= loadTitleAndFavicon('The digital complaint box') ?>
    <?= loadStyleSheets() ?>
    <?= loadScripts() ?>

    <style>
        .section-holder{
            position: static;
        }
        #notfound {
            height: 100%;
            width: 100%;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 410px;
            width: 100%;
            text-align: center;
        }

        .notfound .notfound-404 {
            height: 280px;
            position: relative;
            z-index: -1;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 230px;
            margin: 0px;
            font-weight: 900;
            position: absolute;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            background: url('./assets/images/side-bar.jpg') no-repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: cover;
            background-position: center;
        }


        .notfound h2 {
            font-family: 'Montserrat', sans-serif;
            color: #000;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 40px;
        }

        .notfound p {
            font-family: 'Montserrat', sans-serif;
            color: #000;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 20px;
            margin-top: 0px;
        }

        .notfound a {
            margin-top: 20px;
            width: max-content;
            padding: 10px 30px;
            cursor: pointer;
            background: var(--primary-button-color);
            color: var(--primary-color);
            border-bottom: 2px solid rgb(165, 148, 148);
            font-weight: 500;
            transition: 1s;
            text-decoration: none;
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 {
                height: 142px;
            }

            .notfound .notfound-404 h1 {
                font-size: 112px;
            }
        }
    </style>

</head>

<body>

    <main>
        <div class="section-holder">

            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                    <a href=".">Go To Homepage</a>
                </div>
            </div>

        </div>
    </main>

    <?= loadFooterScripts() ?>

</body>

</html>
<?php
ob_end_flush();
?>