<?php

$connection = new mysqli("localhost", "root", "", "online_store_dp");


// If email already exists 

$emailCheckSQLCommand = $connection->prepare("select * from app_users_table where email=?");


$emailCheckSQLCommand->bind_param("s", $_GET["email"]);


$emailCheckSQLCommand->execute();


$emailResult = $emailCheckSQLCommand->get_result();



if($emailResult->num_rows==0){

 $sqlCommand = $connection->prepare("insert into app_users_table values (?,?,?)");

 $sqlCommand->bind_param("sss",$_GET["email"],$_GET["username"],$_GET["password"]);

 $sqlCommand->execute();

 echo "Congratulations, the Registration process was Succesfull!";

}else{

	echo "A User with the same Email is Already exsits";
}