<?php
$page = "Organizer profile";
#include "logger.php";
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION["customer_id"])) {
	$xml = simplexml_load_file("./database/profile.xml");
	foreach ($xml->customer as $customer) {
		if($_SESSION["customer_id"] == (string)$customer->customerid){?>
		    <font size=5><b><?php echo (string)$customer->name; ?></b></font>
		    <br><?php echo (string)$customer->emailid; ?>
		    <br><?php echo (string)$customer->phonenumber; ?>
		    <br><br>
		    <?php echo (string)$customer->address;
		}
	}
}