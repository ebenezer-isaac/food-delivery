<?php
require_once 'vendor/autoload.php';
$manager = new MongoDB\Driver\Manager("mongodb+srv://food_delivery:contech%402021@food-delivery.3ukn0.mongodb.net/food_delivery?authSource=admin&replicaSet=atlas-o0xpuf-shard-0&w=majority&readPreference=primary&appname=MongoDB%20Compass&retryWrites=true&ssl=true");
$query = new MongoDB\Driver\Query([]);
session_start();
$id =$_SESSION["id"];
$filter  = ['id' => $id];
$options = [];
    $query = new \MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery("food_delivery.restaurants",$query);
    foreach($cursor as $document){
        $rest_id=$document->id;
        $rest_rating=$document->rating;
        $rest_name=$document->name;
        $rest_address=$document->address;
       ?>
         <form action="" method="get">
    <table style='overflow: auto;'>
        <tr>
            <td style='text-align:left;' width = '20%'>Restaurant Id</td>
            <td width = '5%'> : </td>
            <td style='text-align:left;'><?php echo $rest_id; ?> </td>
        </tr>
         <tr>
            <td style='text-align:left;' width = '20%'>Restaurant Rating</td>
            <td width = '5%'> : </td>
            <td style='text-align:left;'><?php echo $rest_rating; ?> </td>
        </tr>
        <tr>
            <td style='text-align:left;' width = '20%'>Name</td>
            <td width = '5%'> : </td>
            <td style='text-align:left;'><input type="text" name= "name" value= "<?php echo $rest_name; ?> "size=30></td>
        </tr>
        <tr>
            <td style='text-align:left;' width = '20%'>Address</td>
            <td width = '5%'> : </td>
            <td style='text-align:left;'><input type="text" name= "name" value= "<?php echo $rest_address; ?> "size=30></td>
        </tr>
    </table>
    <input type="submit" name= "update" value="Update"></p>
</form>
<?php
    }
?>
