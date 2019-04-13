<?php

$connection = new mysqli("localhost", "root", "", "online_store_dp");

$selectBrandcommand = $connection->prepare("select distinct brand from electronic_products");

$selectBrandcommand->execute();

$brandsresult = $selectBrandcommand->get_result();

$brands = array();

while($row = $brandsresult->fetch_assoc()){

	array_push($brands, $row);

}

echo json_encode($brands);
