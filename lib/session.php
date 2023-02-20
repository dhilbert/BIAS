<?php

session_cache_limiter('no-cache, must-revalidate'); 
ini_set("session.cache_expire", 86400);    
ini_set("session.gc_maxlifetime", 86400);
ini_set("session.cookie_lifetime", 0);
session_start();
$admin_idx=$_SESSION['admin_idx']	;
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
$admin_lv = $_SESSION['admin_lv'];
$division_idx = $_SESSION['division_idx'];
$jira_id = $_SESSION['jira_id'];



set_time_limit(0);

?>