

<?php

$db = mysqli_connect('localhost', 'root', '', 'wog_db');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = 'SELECT p.pID,p.pName, h.hName, i.iName
        FROM person p, house h, item i
        WHERE p.is_member_of = h.hID and p.iID = i.iID
		GROUP by p.pID';
		
		

$result = mysqli_query($db, $sql);

$sqlCount = 'SELECT COUNT(*) as count FROM person';
$resultCount = mysqli_query($db, $sqlCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$count = $rowCount['count'];

	
?>

<html>
<head>
<title>World of Galdor</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<style type="text/css">
<!--
body {
	background-image: url(https://s-media-cache-ak0.pinimg.com/originals/e1/23/13/e123130f7353c6bab1f88700e29be61a.jpg);
}
body,td,th {
	color: #CCCCCC;
	font-size: 16px;
	font-family: Georgia, Times New Roman, Times, serif;
}
a:link {
	color: #CCCCCC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #CCCCCC;
}
a:hover {
	text-decoration: none;
	color:#454A61;
	background-color: #CCCCCC;
}
a:active {
	text-decoration: none;
	color: #CCCCCC;
}
.style2 {font-size: 18px}
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (World of Galdor.psd) -->
<center>
  <p>&nbsp;	</p>
  <table width="1123" height="357" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="4" bgcolor="#454A61"><p>&nbsp;</p>      </td>
	</tr>
	<tr>
		<td width="4" height="254">&nbsp;</td>
		<td colspan="2" bgcolor="#343955"><img src="images/logo.jpg" alt="" width="1115" height="254" border="0" usemap="#Map">
		  <map name="Map">
            <area shape="rect" coords="945,181,1101,237" href="tradebook.php">
            <area shape="rect" coords="763,181,918,238" href="wars.php">
            <area shape="rect" coords="586,182,741,239" href="lands.php">
            <area shape="rect" coords="415,180,570,237" href="bosses.php">
            <area shape="rect" coords="239,183,394,240" href="people.php">
            <area shape="rect" coords="46,181,201,238" href="houses.php">
          <area shape="rect" coords="264,50,776,161" href="index.php">
		  </map></td>
		<td width="4">&nbsp;</td>
	</tr>
	<tr>
		<td height="18">&nbsp;</td>
		<td colspan="2" bgcolor="#343955">
			<img src="images/worldofgaldor_06.gif" width="1115" height="6" alt=""></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="2">&nbsp;</td>
	  <td width="301" bgcolor="#454A61" border="1"  bordercolor="38394F" ><table width="276" height="389" border="1" align="center" bordercolor="#003333">
        <tr>
          <td width="266"><div align="center">MENU</div></td>
        </tr>
        <tr>
          <td><a href="addnewperson.php"><img src="images/icon.png" width="10" height="10" border="0"/> ADD NEW PERSON </a></td>
        </tr>
        <tr>
          <td><a href="discover.php"><img src="images/icon.png" width="10" height="10" border="0"/> DISCOVER PLACES </a></td>
        </tr>
        <tr>
          <td><a href="createhouse.php"><img src="images/icon.png" width="10" height="10" border="0"/> CREATE A HOUSE </a></td>
        </tr>
        <tr>
          <td><a href="declarewar.php"><img src="images/icon.png" width="10" height="10" border="0"/> DECLARE A WAR </a></td>
        </tr>
        <tr>
          <td><a href="activewars.php"><img src="images/icon.png" width="10" height="10" border="0"/> LIST ALL THE ACTIVE WARS </a></td>
        </tr>
        <tr>
          <td><a href="housemoney.php"><img src="images/icon.png" width="10" height="10" border="0"/> HOUSE TREASURIES </a></td>
        </tr>
        <tr>
          <td><a href="notableresources.php"><img src="images/icon.png" width="10" height="10" border="0"/> NOTABLE RESOURCES </a></td>
        </tr>
        <tr>
          <td><a href="housestatistics.php"><img src="images/icon.png" width="10" height="10" border="0"/> MOST CROWDED HOUSES </a></td>
        </tr>
        <tr>
          <td><a href="valuabletradingitems.php"><img src="images/icon.png" width="10" height="10" border="0"/> VALUABLE TRADING ITEMS </a></td>
        </tr>
      </table>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p></td>
		<td width="814"  bordercolor="38394F" bgcolor="5a607d" border="1" >
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<p>&nbsp;</p>
	    <p align="center">Welcome to World of Galdor </p>
		
		
		
		
		
		
		<!-- BEGININNG OF THE PHP CODE  --> 
		
		
		
		
		
	    <p align="center">Here are the people in this merciless world. </p>
	    <div align="center">
          <table width="541" style = "border: 1px dashed">
            <thead>
              <tr>
                <th width="88" bgcolor="#333333" class="style8">Person ID</th>
          <th width="264" bgcolor="#333333" class="style8">Person Name</th>
          <th width="129" bgcolor="#333333" class="style8">House</th>
          <th width="40" bgcolor="#333333" class="style8">Item</th>
      </tr>
            </thead>
            <tbody>
              
              
  <?php

	while($row = mysqli_fetch_assoc($result)) {
    $pid = $row['pID'];
    $pname = $row['pName'];
    $house = $row['hName'];
    $item = $row['iName'];
	
    echo "<tr>
          <td><font color='grey'><center>$pid</center></font></td>
          <td>$pname</td>
          <td><center><font color='#BD6060'>$house</font></center></td>
          <td><center><font color='#79BD8B'>$item</font></center></td>
          </tr>";
}
 
?>
            </tbody>
          </table>
        </div>        <p align="center"><?php echo $count; ?> people
		&nbsp;</p>
		
		
		
		
		<!-- END OF THE PHP CODE  -->		</td>
		
		<td rowspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" background="images/worldofgaldorsmall_12.gif"><div align="center">
		  <p class="style2">2017 World of Galdor </p>
	    </div></td>
	</tr>
</table>
</center>
<div align="center">
  <!-- End ImageReady Slices -->
</div>
</body>
</html>