<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<table id="customers">
    <tr>
        <th>Feedback</th>

    </tr>

<?php
$filter = ['comments' => 'sas'];
$filter = ['_id' => ['$gt' => 0]];
$manager = new MongoDB\Driver\Manager( 'mongodb://localhost:27017' );
$query = new MongoDB\Driver\Query($filter);
try {
    $rows = $manager->executeQuery('bloodbank.feedback', $query);
}
catch(Exception $e)
{
    echo $e;
}

foreach($rows as $r){
    $array = get_object_vars($r);
   echo"<tr>";
       echo"<td>";
    echo $array["comments"];
    echo"</td>";
    echo"</tr>";

}

?>

</table>

</body>
</html>
