<?Php

	$dbhost = 'localhost';
	$dbname = 'ordermyfood';  
	$dbuser = 'root';                  
	$dbpass = 'root';                  
	
	try{
		
		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
	}
