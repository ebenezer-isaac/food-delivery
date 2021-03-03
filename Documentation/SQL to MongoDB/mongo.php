<?php

try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
echo"connection established";

    }
catch(Exception $e)
{
echo $e;
}

?>