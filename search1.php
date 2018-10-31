<?php

$pdo=new PDO('mysql:host=127.0.0.1;dbname=hows','root','');

$search=$_GET['q'];
//echo "<pre>";
$searche=explode(" ", $search);
$x=0;
$params = array();
$construct="";
foreach ($searche as $term) {

	$x++;
	if($x==1){

		$construct.="title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";

	}
	else{

		$construct.="AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";

	}
	$params[":search$x"]=$term;
}

$results=$pdo->prepare("SELECT * FROM `index` WHERE $construct");
$results->execute($params);

if($results->rowCount() == 0){

	echo "0 results found! <hr/>";

}
else {

	echo $results->rowCount()." results found! <hr/>";

}
echo "<pre>";
$result=(object)[];
foreach ($results->fetchAll() as $result) {
	
	$url=$result["url"];
	$title=$result["title"];
	echo "<a href='$url'>$title</a><br/>";
	echo $result["url"]."<br/>";
	if($result["description"]==""){

		echo "No description available."."<br/>";

	}else{
		echo $result["description"]."<br/>";
	}
	//echo "<a href='$url'></a><br/>";
	echo "<hr/>";


}
//print_r($results->fetchAll());
//<h2><a href='$link'>