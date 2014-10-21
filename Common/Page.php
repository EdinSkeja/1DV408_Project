<?php
namespace Common;

class Page {

	/**
	 * Returns full html page
	 * 
	 * @param string $content
	 * @return $xhtml
	 */
	public function GetHTMLPage($content) {
		$xhtml = "
		<!DOCTYPE html>
		<html lang='sv'>
			<head>
				<meta charset='utf-8'>
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<title>MiniStore</title>
				<!-- Bootstrap -->
				<link href='Resources/css/bootstrap.min.css' rel='stylesheet'>
				<!-- MetisMenu CSS -->
    			<link href='Resources/css/plugins/metisMenu/metisMenu.min.css' rel='stylesheet'>
    			<!-- Timeline CSS -->
			    <link href='Resources/css/plugins/timeline.css' rel='stylesheet'>
			    <!-- Custom CSS -->
			    <link href='Resources/css/sb-admin-2.css' rel='stylesheet'>
			    <!-- Morris Charts CSS -->
			    <link href='Resources/css/plugins/morris.css' rel='stylesheet'>
			    <!-- Custom Fonts -->
    			<link href='Resources/fonts/font-awesome-4.1.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
			</head>
			<body>
				<div id='wrapper'>
					<nav class='navbar navbar-default navbar-static-top' role='navigation' style='margin-bottom: 0'>
				    <div class='navbar-header'>
				        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
				            <span class='sr-only'>Toggle navigation</span>
				            <span class='icon-bar'></span>
				            <span class='icon-bar'></span>
				            <span class='icon-bar'></span>
				        </button>
				        <a class='navbar-brand' href='index.php'>MiniStore v0.1</a>
				    </div>
				    <!-- /.navbar-header -->
				    <ul class='nav navbar-top-links navbar-right'>
				        <li class='dropdown'>
				            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				                <i class='fa fa-envelope fa-fw'></i>  <i class='fa fa-caret-down'></i>
				            </a>
				            <ul class='dropdown-menu dropdown-messages'>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <strong>John Smith</strong>
				                            <span class='pull-right text-muted'>
				                                <em>Yesterday</em>
				                            </span>
				                        </div>
				                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <strong>John Smith</strong>
				                            <span class='pull-right text-muted'>
				                                <em>Yesterday</em>
				                            </span>
				                        </div>
				                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <strong>John Smith</strong>
				                            <span class='pull-right text-muted'>
				                                <em>Yesterday</em>
				                            </span>
				                        </div>
				                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a class='text-center' href='#'>
				                        <strong>Read All Messages</strong>
				                        <i class='fa fa-angle-right'></i>
				                    </a>
				                </li>
				            </ul>
				            <!-- /.dropdown-messages -->
				        </li>
				        <!-- /.dropdown -->
				        <li class='dropdown'>
				            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				                <i class='fa fa-tasks fa-fw'></i>  <i class='fa fa-caret-down'></i>
				            </a>
				            <ul class='dropdown-menu dropdown-tasks'>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <p>
				                                <strong>Task 1</strong>
				                                <span class='pull-right text-muted'>40% Complete</span>
				                            </p>
				                            <div class='progress progress-striped active'>
				                                <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: 40%'>
				                                    <span class='sr-only'>40% Complete (success)</span>
				                                </div>
				                            </div>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <p>
				                                <strong>Task 2</strong>
				                                <span class='pull-right text-muted'>20% Complete</span>
				                            </p>
				                            <div class='progress progress-striped active'>
				                                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: 20%'>
				                                    <span class='sr-only'>20% Complete</span>
				                                </div>
				                            </div>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <p>
				                                <strong>Task 3</strong>
				                                <span class='pull-right text-muted'>60% Complete</span>
				                            </p>
				                            <div class='progress progress-striped active'>
				                                <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 60%'>
				                                    <span class='sr-only'>60% Complete (warning)</span>
				                                </div>
				                            </div>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <p>
				                                <strong>Task 4</strong>
				                                <span class='pull-right text-muted'>80% Complete</span>
				                            </p>
				                            <div class='progress progress-striped active'>
				                                <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100' style='width: 80%'>
				                                    <span class='sr-only'>80% Complete (danger)</span>
				                                </div>
				                            </div>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a class='text-center' href='#'>
				                        <strong>See All Tasks</strong>
				                        <i class='fa fa-angle-right'></i>
				                    </a>
				                </li>
				            </ul>
				            <!-- /.dropdown-tasks -->
				        </li>
				        <!-- /.dropdown -->
				        <li class='dropdown'>
				            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				                <i class='fa fa-bell fa-fw'></i>  <i class='fa fa-caret-down'></i>
				            </a>
				            <ul class='dropdown-menu dropdown-alerts'>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <i class='fa fa-comment fa-fw'></i> New Comment
				                            <span class='pull-right text-muted small'>4 minutes ago</span>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <i class='fa fa-twitter fa-fw'></i> 3 New Followers
				                            <span class='pull-right text-muted small'>12 minutes ago</span>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <i class='fa fa-envelope fa-fw'></i> Message Sent
				                            <span class='pull-right text-muted small'>4 minutes ago</span>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <i class='fa fa-tasks fa-fw'></i> New Task
				                            <span class='pull-right text-muted small'>4 minutes ago</span>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a href='#'>
				                        <div>
				                            <i class='fa fa-upload fa-fw'></i> Server Rebooted
				                            <span class='pull-right text-muted small'>4 minutes ago</span>
				                        </div>
				                    </a>
				                </li>
				                <li class='divider'></li>
				                <li>
				                    <a class='text-center' href='#'>
				                        <strong>See All Alerts</strong>
				                        <i class='fa fa-angle-right'></i>
				                    </a>
				                </li>
				            </ul>
				            <!-- /.dropdown-alerts -->
				        </li>
				        <!-- /.dropdown -->
				        <li class='dropdown'>
				            <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
				                <i class='fa fa-user fa-fw'></i>  <i class='fa fa-caret-down'></i>
				            </a>
				            <ul class='dropdown-menu dropdown-user'>
				                <li><a href='#'><i class='fa fa-user fa-fw'></i> User Profile</a>
				                </li>
				                <li><a href='#'><i class='fa fa-gear fa-fw'></i> Settings</a>
				                </li>
				                <li class='divider'></li>
				                <li><a href='login.html'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
				                </li>
				            </ul>
				            <!-- /.dropdown-user -->
				        </li>
				        <!-- /.dropdown -->
				    </ul>
				    <!-- /.navbar-top-links -->
				    <div class='navbar-default sidebar' role='navigation'>
				        <div class='sidebar-nav navbar-collapse'>
				            <ul class='nav' id='side-menu'>		                        
				                <li>
				                    <a class='active' href='index.php'><i class='fa fa-home fa-fw'></i> Home</a>
				                </li>		                        
				                <li>
				                    <a href='?page=products'><i class='fa fa-table fa-fw'></i> Products</a>
				                </li>		                       
				                <li>
				                    <a href='#'><i class='fa fa-wrench fa-fw'></i> My Account<span class='fa arrow'></span></a>
				                    <ul class='nav nav-second-level collapse'>
				                        <li>
				                            <a href='?page=account&personal'>Personal settings</a>
				                        </li>
				                        <li>
				                            <a href='?page=account&orders'>Orders</a>
				                        </li>
				                        <li>
				                            <a href='?logout'>Logout</a>
				                        </li>
				                    </ul>
				                    <!-- /.nav-second-level -->
				                </li>
				            </ul>
				        </div>
				        <!-- /.sidebar-collapse -->
				    </div>
				    <!-- /.navbar-static-side -->
				</nav>
				<div id='page-wrapper' style='min-height: 368px;'>	
				    <div class='row'> 
				    	$content     
				    </div>	      
				</div>
				</div>	
				<!-- jQuery Version 1.11.0 -->
				<script src='Resources/js/jquery-1.11.0.js'></script>
				<!-- Bootstrap Core JavaScript -->
				<script src='Resources/js/bootstrap.min.js'></script>
				<!-- Metis Menu Plugin JavaScript -->
				<script src='Resources/js/plugins/metisMenu/metisMenu.min.js'></script>
				<!-- Morris Charts JavaScript -->
				<script src='Resources/js/plugins/morris/raphael.min.js'></script>
				<script src='Resources/js/plugins/morris/morris.min.js'></script>
				<script src='Resources/js/plugins/morris/morris-data.js'></script>
				<!-- Custom Theme JavaScript -->
				<script src='Resources/js/sb-admin-2.js'></script>	   
			</body>
		</html>";		
		return $xhtml;
	}
}