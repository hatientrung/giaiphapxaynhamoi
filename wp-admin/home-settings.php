<?php
require_once( dirname( __FILE__ ) . '/admin.php' );
$redirect = 'options-general.php?page=home_settings';
if (isset($_POST["home-settings"]) && !empty($_POST["home-settings"]) && $_POST["home-settings"] == "ok") {
	update_option('company_name', $_POST["company-name"]);
	wp_redirect(admin_url($redirect));
}else{  
}
?>