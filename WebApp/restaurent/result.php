<?php
$search_text = $_GET['search'];
if(strlen($search_text)>0)
{

	
	$xml = simplexml_load_file("./database/res.xml");
	foreach ($xml->res as $res)
	 {
		
			if (strpos(trim(strtolower((string)$res->name)), trim(strtolower($search_text))) !== false)
		{
				echo $res->name . "<br> " ;
				echo $res->id . "<br> " ;
				echo $res->address ."<br>";
				echo $res->rating . "<br> ";

		}
		
	}

}
?>

