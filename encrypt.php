<?php
	public function encrypt($value)
	{
		$val="";
		for($i=0;$i<=(strlen($value)-1);$i++)
		{
			$val=$value[i];
			$enc=$val+1;

		}
	}
?>