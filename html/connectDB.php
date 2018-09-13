<?php
	header("Content-type:text/html;charset=utf-8");

	define("USERNAME","root");
	define("PASSWORD","");
	define("DBNAME","cheat");

	function connectDB(){
		$conn=@mysqli_connect("localhost",USERNAME,PASSWORD,DBNAME);
		if(!mysqli_connect_errno($conn)){
			mysqli_set_charset($conn,"utf8");
		}else{
			die("Connect failed");
		}
		return $conn;
	}
?>