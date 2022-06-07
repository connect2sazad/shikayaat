<?php
	session_start();

	if(!isset($_SESSION['shikayat_userid'])){
		//if session not exists, force to login
		header("location: ../");
	}
