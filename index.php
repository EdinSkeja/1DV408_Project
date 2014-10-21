<?php
session_start();
//Models
require_once ('Model/Database.php');
require_once ('Model/DBConfig.php');
require_once ('Model/LoginHandler.php');
require_once ('Model/RegisterHandler.php');
//Views
require_once ('View/Router.php');
require_once ('View/LoginView.php');
require_once ('View/RegisterView.php');
//Controllers
require_once ('Controller/MasterController.php');
require_once ('Controller/LoginController.php');
require_once ('Controller/RegisterController.php');
//Common
require_once ("Common/Page.php");
require_once ("Common/Validator.php");

$xhtml = "";

$mcontroller = new Controller\MasterController();

$xhtml .= $mcontroller -> DoControll();

echo $xhtml;