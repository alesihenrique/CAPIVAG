<?php

class ConnectionFactory{
	
	private static $host = 'localhost';
	private static $user = 'redco269_clinica';
	private static $pass = 'clinmed';
	private static $database = 'redco269_clinica';

	private static $connection;
	private static $connection_base;

	//Contesto estático, deve conter variaveis estáticas
	static function getConnection(){
		try{
			self::$connection =  new PDO("mysql:host=".self::$host.";dbname=".self::$database, self::$user, self::$pass);
			return self::$connection;
			
		}catch(Exception $error){
			echo $error->getFile().": ".$error->getLine()." # ".$error->getMessage();
			return null;
		}
		return null;
	}
}
?>