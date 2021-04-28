<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Kontrola pakiranja</title>
  </head>
  <body>
	<?php
		// Create connection
		$serverName = ".\DEVELOP";
		$connectionInfo = array( "Database"=>"db", "UID"=>"root", "PWD"=>"rootpass");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);
		#
		
		// connection error check
		if( $conn ) {
			 // echo "Connection established. <br />";
		}else{
			 echo "Connection could not be established.<br />";
			 die( print_r( sqlsrv_errors(), true));
		}
		#

		//query
		$sql = "SELECT [acKey] as acKey
					  ,[acDocType] as acDocType
					  ,cast([adDate] as varchar(20)) as adDate
					  ,[acReceiver] as acReceiver
				FROM [tHE_Move]";
		$result = sqlsrv_query($conn,$sql);
		#
		
		if ($result) {
			echo "<table border='1'>";
			while($row = sqlsrv_fetch_array($result)) {
				echo "<tr>"
						."<td>"."<a href=viewpoz.php?acKey=".$row["acKey"].">".$row['acKey']."</a>"."</td>"
						."<td>".$row["acDocType"] ."</td>"
						."<td>".$row["adDate"]."</td>"
						."<td>". $row["acReceiver"] . "</td>"
					."</tr>" ;
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
	?>
  </body>
</html>
