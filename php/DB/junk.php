<?php 
				$DBConn = new mysqli("efraimmkrugcom.domaincommysql.com","pearl","$pray613");
				if(!$DBConn){
					echo "Failure!";
					}
				if(!$DBConn->select_db("pearl")){
					echo "SELECT DB Failure";
					}
?> 	
