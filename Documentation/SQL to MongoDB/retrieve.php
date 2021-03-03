<?php
$mongo = new \MongoDB\Driver\Manager('mongodb://localhost:27017/bloodbank');
$id           = new \MongoDB\BSON\ObjectId("601a15fc2c67000009002dc6");
$filter      = ['_id' => $id];
$options = [];
$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $mongo->executeQuery('db.collectionName', $query);

foreach ($rows as $document) {
  echo $document;
}
?>