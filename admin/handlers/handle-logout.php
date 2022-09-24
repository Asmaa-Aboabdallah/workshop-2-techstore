<?php

require_once("../../app.php");

use TeachStore\Classes\Models\Admin;

$ad = new Admin;
$ad->logout($session);

$request->aredirect("login.php");