<?php
 
 //这是以sqlsrv_connect的方式连接微软SQL Server数据库（即MSSQL数据库）的示例。
$serverName = "NEPTUNE-PC"; //serverName\instanceName
$connectionInfo = array( "Database"=>"lccee", "UID"=>"sa", "PWD"=>"111111");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
  
if( $conn ) {
     echo "连接成功<br />";
}else{
     echo "连接失败<br />";
      
}
 
$query ="select * from phpcustom";
$result = sqlsrv_query($conn, $query);
while($row = sqlsrv_fetch_array($result)){
  
       print_r($row);
       echo "<br>";
}
 
?>