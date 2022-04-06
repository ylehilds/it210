<?php
if (isset($q)) 
	{
		switch(strtolower($q)) {
					case 'it210' : return '1';
					break;
					
					default: return '0';
					}
	} 
else
	{
		return '0';
	}
?>
