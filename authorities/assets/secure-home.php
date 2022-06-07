<?php
	session_start();

	if(!isset($_SESSION['shikayat_authorityid'])){
		//if session not exists, force to login
		header("location: ./login");
	}
