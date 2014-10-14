<?php
session_start();
//Models
require_once ('Model/Database.php');
require_once ('Model/DBConfig.php');
require_once ('Model/LoginHandler.php');
//Views
require_once ('View/LoginView.php');
require_once ('View/Router.php');
//Controllers
require_once ('Controller/MasterController.php');
require_once ('Controller/LoginController.php');
//Common
require_once ("Common/Page.php");
require_once ("Common/Validator.php");

$xhtml = "";

$mcontroller = new Controller\MasterController();

$xhtml .= $mcontroller -> DoControll();

echo $xhtml;