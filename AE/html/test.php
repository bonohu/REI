<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
	<title>Project REI test</title>
	<style>
	<!--
	td.l {font-size:12pt;}
	-->
	</style>
</head>
<body>
<?php
$sv = "localhost";
$dbname = "rei";
$user = "root";
$pass = "";
//
function cnv_sqlstr($string) {
    if (!get_magic_quotes_gpc()) {
        return addslashes($string);
    }
    else {
        return $string;
    }
}
//
$conn = mysql_connect($sv, $user, $pass) or die("Cannot connect to dbserver");
mysql_select_db($dbname) or die("Cannot connect to $dbname");

// select conditions
$key   = !empty($_GET['key']) ? $_GET['key'] : 'hypoxia';
$org   = !empty($_GET['org']) ? $_GET['org'] : '';
$arraygroup = !empty($_GET['arraygroup']) ? $_GET['arraygroup'] : '';
$rows  = !empty($_GET['rows']) ? $_GET['rows'] : '10';
$aord  = !empty($_GET['aord']) ? $_GET['aord'] : 'DESC';
$order = !empty($_GET['order']) ? $_GET['order'] : 'date';
// print header
echo "<h1>Search $key in AE</h1>";
// construct SQL
$hsql = "SELECT reporg,count(reporg) FROM test WHERE description like '%$key%' AND reporg like '$org%' AND arraygroup like '$arraygroup%' GROUP BY reporg ORDER BY count(reporg) DESC";
$gsql = "SELECT arraygroup,count(arraygroup) FROM test WHERE description like '%$key%' AND reporg like '$org%' AND arraygroup like '$arraygroup%' GROUP BY arraygroup ORDER BY count(arraygroup) DESC";
$sql = "SELECT id,description,date,arraytype,organisms FROM test WHERE description like '%$key%' AND reporg like '$org%' AND arraygroup like '$arraygroup%' ORDER BY $order $aord LIMIT $rows";
// header(representative organism)
$res = mysql_query($hsql, $conn) or die("");
echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr style=\"background-color:#E0E0FF;\">";
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	echo "<td nowrap><span style=\"font-style: italic;\">".$row["reporg"]."</span>[<a href=\"".$_SERVER["PHP_SELF"]."?key=$key&org=".$row["reporg"]."\">".$row["count(reporg)"]."</a>]"."</td>";
}
echo "</tr></table>";
// header(arraygroup)
$res = mysql_query($gsql, $conn) or die("");
echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr style=\"background-color:#E0FFE0;\">";
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	echo "<td nowrap>".$row["arraygroup"]."</span>[<a href=\"".$_SERVER["PHP_SELF"]."?key=$key&arraygroup=".$row["arraygroup"]."\">".$row["count(arraygroup)"]."</a>]"."</td>";
}
//
$res = mysql_query($sql, $conn) or die("");
echo "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr style=\"background-color:#E0E0E0;\">";
echo "<th>id</th>";
echo "<th>description</th>";
echo "<th>date</th>";
echo "<th>arraytype</th>";
echo "<th>organisms</th>";
echo "</tr>";
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
  if($i++ % 2 == 0) {	
    echo "<tr style=\"background-color:#FFFFFF;\">"; 
  } else {
    echo "<tr style=\"background-color:#F2F2F2;\">";
  }
	echo "<td nowrap><a target=_blank href=\"http://www.ebi.ac.uk/arrayexpress/search?query=".$row["id"]."\">".$row["id"]."</a></td>";
	echo "<td height=\"40\" width=\"600\"><div style=\"height:40px; width:600px; overflow:auto;\">".$row["description"]."</div></td>";
	echo "<td>".$row["date"]."</td>";
	echo "<td height=\"40\" width=\"200\"><div style=\"height:40px; width:200px; overflow:auto;\">".$row["arraytype"]."</div></td>";
	echo "<td><div style=\"font-style: italic;\">".$row["organisms"]."</div></td>";
    echo "</tr>";
}
echo "</table>";
// 
mysql_close($conn);
?>
</body>
</html>
