<?php
class Dbfunctions
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "bts";

	function __construct(){
		$conn=$this->connectDB();
		if(!empty($conn))
		{
			$this->selectDB($conn);
		}
	}

	function connectDB()
	{
		$conn= mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	function selectDB($conn)
	{
		mysql_select_db($this->database,$conn);
	}

	function runQuery($query)
	{
		$result=mysql_query($query);
		while ($row=mysql_fetch_assoc($result)) {
			$resultset[]=$row;		
		}
		if(!empty($resultset))
		{
			return $resultset;
		}
	}
}
?>