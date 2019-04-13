<?php

$connection = new mysqli("localhost", "root", "", "online_store_dp");

$selectProduct = $connection->prepare("select * from electronic_products where brand=?");

$selectProduct->bind_param("s", $_GET["brand"]);

$selectProduct->execute();

$productsresult = $selectProduct->get_result();

$products = array();

while($row = $productsresult->fetch_assoc()){

	array_push($products, $row);

}

echo json_encode($products);