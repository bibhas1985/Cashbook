<?php
require ("fpdf/fpdf.php");
if(isset($_POST['pdf']))
{
	$todate=$_POST['todate'];
	$fromdate=$_POST['fromdate'];
	$daten=explode('-',$todate);
		$dayn=$daten[2];
		$monthn=$daten[1];
		$yearn=$daten[0];
		$datenew=$dayn.'-'.$monthn.'-'.$yearn;
		$daten1=explode('-',$fromdate);
		$dayn1=$daten1[2];
		$monthn1=$daten1[1];
		$yearn1=$daten1[0];
		$datenew1=$dayn1.'-'.$monthn1.'-'.$yearn1;
		$c=1;
	$conn=mysqli_connect("localhost","root","","bmch");
	$select="Select * from cash where date  between '$fromdate' AND '$todate' ; ";
	$result=$conn->query($select);
	$pdf = new FPDF();
	$pdf->Addpage();
	$pdf->SetFont("Arial","B",10);
	$today=date('d-m-Y');
	$pdf->Cell(190,8,"Burdwan Medical College & Hospital(From $datenew1 to $datenew)",0,1,'C');
	$pdf->SetFillColor(140,140,140);
	$pdf->Cell(13,8,"Sl. No. ",1,0,'C','true');
	$pdf->Cell(25,8,"Date ",1,0,'C','true');
		$pdf->Cell(76,8,"Particulars ",1,0,'C','true');
		$pdf->Cell(16,8," Type",1,0,'C','true');
		$pdf->Cell(25,8,"Amount ",1,0,'C','true');
		$pdf->Cell(33,8,"Balance ",1,1,'C','true');	
	while($row=$result->fetch_object())
	{
		
		$date=$row->date;
		$datenew=explode('-',$date);
		$day=$datenew[2];
		$month=$datenew[1];
		$year=$datenew[0];
		$date=$day.'-'.$month.'-'.$year;
		$particulars=$row->particulars;
		$type=$row->type;
		$amount=$row->amount;
		$balance=$row->balance;
		$pdf->Cell(13,5,"$c ",1,0,'C');
		$pdf->Cell(25,5,"$date ",1,0,'C');
		$pdf->Cell(76,5,"$particulars ",1,0,'C');
		$pdf->Cell(16,5," $type",1,0,'C');
		$pdf->Cell(25,5,"$amount ",1,0,'C');
		$pdf->Cell(33,5,"$balance ",1,1,'C');
		$c++;
	}
	$pdf->output();
}	
?>
