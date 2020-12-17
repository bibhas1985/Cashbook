<html>
<head>
<style>
#f{
	border:3px solid green;
	
	width:220px;
	
	margin-top:20px;
	height:110x;

	}
	#f1{
	
	
	width:200px;
	
	height:0px;
	padding:0px;
	}
	.s{
	margin-bottom:10px;
	}
</style>
<?php// include('java script/myscript.php');
//require "common.php";
?>
<center>

<form action="" method="post" id="f">

<input type="date" name="date"  /><br>	
<select name="particulars">
<option>Chumki Das</option>
<option> Madan Da</option>
<option> Shrabani Dutta</option>
<option> Supriya Mondal</option>
<option> Uday Da</option>
<option> Partha Chatterjee</option>
<option> Ajit Kumar Biswas</option>
<option> Jyotirmoy Mondal</option>
<option>Anamoy</option>
<option> PNB</option>
<option>UBI</option>
<option> Sangita Bhattacharya</option>
<option> Akash Routh</option>
<option> OPENING BALANCE</option>
<option> Subhashis Banerjee</option>
<option>Prasanta Kumar Karmakar </option>
<option>Return to Patient </option>
<option>Pabir Da</option>
<option>Biswanath Karmakar</option>
<option>Sisir Da</option>
<option>S Sen</option>
<option>PNB</option>
<option>Sayan Kr. Das</option>
<option>Anirban Ghosh</option>
<option>OPD1</option>
<option>OPD</option>
<option>Mridula Ghosh</option>
<option>Jalaluddin Molla</option>
<option>Dibakar Dutta</option>
<option>Subhashis Banerjee</option>
</select>
</select>
</select>
<input type="number" name="amount" placeholder="Amount" ><br>
<select name="type">
<option>Dr</option>
<option>Cr</option>
</select>
<input type="submit" name="submit" value="Submit" />
</form>
<form action="pdf.php" method="post" id="f1">
	From<input type="date" name="fromdate" >
	To<input type="date" name="todate" >
	<input type="submit" name="pdf" value="Generate PDF" class="s"/>
</form>
</center>
<?php
if(isset($_POST['submit']))
	{
	$date=$_POST['date'];
	$particulars=$_POST['particulars'];
	$type=$_POST['type'];
	$amount=$_POST['amount'];
	$conn=mysqli_connect("localhost","root","","bmch");
	
	$qb="select balance from cash order by id DESC LIMIT 1";
	$rb=mysqli_query($conn,$qb);
	$rowb=mysqli_fetch_assoc($rb);
	$balance= $rowb['balance'];
	$q="INSERT INTO cash (date ,particulars ,type ,amount,balance )VALUES ('$date','$particulars','$type','$amount','$balance');";
	mysqli_query($conn,$q);
	$q1="select id from cash order by id DESC LIMIT 1";
	$r1=mysqli_query($conn,$q1);
	$row1=mysqli_fetch_assoc($r1);
	$id1= $row1['id'];
	
	$qdr="update cash set balance=$balance+$amount where id='$id1' and type='DR'  "; 
	mysqli_query($conn,$qdr);
	$qcr="update cash set balance=$balance-$amount where id='$id1' and type='CR'  "; 
	mysqli_query($conn,$qcr);
	
	}
	
?>
</body>
</html>
