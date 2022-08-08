<?php
$con = mysqli_connect("localhost", "root", "", "sls");  
$sql="SELECT * FROM student_req_form WHERE DATE(dateOfUse) = CURRENT_DATE()";
$res=mysqli_query($con,$sql);
$html='
<table>
<tr>
	<td>Reference No.</td>
	<td>First Name</td>
	<td>Middle Name</td>
	<td>Last Name</td>
	<td>Room</td>
	<td>Section</td>	
	<td>Subject</td>
	<td>Date Of Use</td>
	<td>Time</td>
	<td>Day(s)</td>
	<td>Instructor Name</td>
	<td>Type</td>
	<td>Status</td>
	<td>Remark(s)</td>
</tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='
	<tr>
		<td>'.$row['referenceNo'].'</td>
		<td>'.$row['firstName']. '</td>
		<td>'.$row['middleName']. '</td>
		<td>'.$row['lastName']. '</td>
		<td>'.$row['room'].'</td>
		<td>'.$row['section'].'</td>
		<td>'.$row['subject'].'</td>
		<td>'.$row['dateOfUse'].'</td>
		<td>' .date('h:i A',strtotime($row['time'])).'</td>
		<td>'.$row['days'].'</td>
		<td>'.$row['instructorName'].'</td>
		<td>'.$row['type'].'</td>
		<td>'.$row['req_status'].'</td>
		<td>'.$row['remarks'].'</td>
	</tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>