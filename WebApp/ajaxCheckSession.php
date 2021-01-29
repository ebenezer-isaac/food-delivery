<?php
session_start();
if (isset($_SESSION["customer_id"])) {
    echo "1";
} else {
    echo "2";
}
