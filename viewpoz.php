<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Detalji računa</title>
  </head>
  <body>
	<?php
		// print function acKey-a
		// function acKey(){
			$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$split = explode('=',$url);
			$acKey = $split[sizeof($split)-1];
			echo $acKey;
			echo "</br>";
		// }
		#
	
		// Create connection
		$serverName = ".\DEVELOP";
		$connectionInfo = array( "Database"=>"db", "UID"=>"root", "PWD"=>"rootpass");
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		#
		
		// connection error check
		if($conn)
		{
			 echo "Connection established.<br />";
		}
		else
		{
			 echo "Connection could not be established.<br />";
			 die( print_r( sqlsrv_errors(), true));
		}
		#
		
		//print acKey-a
		// acKey();
		#
		
		//query
		echo $sql = "select acIdent, acName, anQty from the_MoveItem where ackey = '".$acKey."'";
		echo "</br>";
		$result = sqlsrv_query($conn,$sql);
		#
		
		//razrada query-ja
		if ($result) {
			echo "<table border='1'>";
			while($row = sqlsrv_fetch_array($result)) {
				echo "<td>".$row['acIdent']."</td>"
					."<td>".$row["acName"] ."</td>"
					."<td>".$row["anQty"]."</td>"
				."</tr>" . "<br>";
			}
			echo "</table>";
			}

		else {
			echo "0 results";
		}
	?>
  </body>
</html>
