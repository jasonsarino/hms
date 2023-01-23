<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $reports_title?></title>
</head><div style="position:fixed; bottom: 0; right: 0; width: 67%; border: 2px solid #CCC; top:200px; z-index:1001; background-color: #FFF; display:none;" id="ad2">
    <span style="right: 0; position: fixed; cursor: pointer; z-index:1002" onclick="closeAd('ad2')" >CLOSE</span>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Payroll Management System -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3182624105910612"
     data-ad-slot="4635770289"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Hospital Management System -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3182624105910612"
     data-ad-slot="3101991489"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Grading System -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3182624105910612"
     data-ad-slot="6132191885"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- HMS Website -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3182624105910612"
     data-ad-slot="1562391480"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<style>
body{
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
}
</style>
<body>

<center>
<font size="+1"><?php echo $companyInfo->company_name;?></font></b><br>                   
                            <?php echo $companyInfo->company_address;?><br>     
                            <?php echo $companyInfo->company_contactNo;?><br><br>
                            <?php echo $reports_title?>
</center>   
<br /><br />
<table align="center" width="100%" border="1" cellpadding="2" cellspacing="2" style="border:1px #999; border-collapse:collapse">
<tr>
	<td><strong>Patient Name</strong><br /><br /><?php echo strtoupper($patientInfo->name);?></td>
    <td><strong>Reg No./IOP No.</strong><br /><br /><?php echo strtoupper($patientInfo->patient_no." / ".$getOPDPatient->IO_ID)?></td>
    <td><strong>Gender</strong><br /><br /><?php echo strtoupper($patientInfo->gender)?></td>
    <td><strong>Date of Birth</strong><br /><br /><?php echo date("M d, Y",strtotime($patientInfo->birthday));?></td>
</tr>
<tr>
	<td><strong>Address</strong><br /><br /><?php echo strtoupper($patientInfo->address)?></td>
    <td><strong>Age</strong><br /><br /><?php echo strtoupper($patientInfo->age)?></td>
    <td><strong>Contact No.</strong><br /><br /><?php echo strtoupper($patientInfo->phone_no)?></td>
    <td><strong>Civil Status</strong><br /><br /><?php echo strtoupper($patientInfo->civil_status)?></td>
</tr>
</table>
<br />
<?php
											if(is_object($getOperationTheater)){
												$dDate_from = $getOperationTheater->dDate_from;
												$dTime_from = $getOperationTheater->dTime_from;
												$dDate_to = $getOperationTheater->dDate_to;
												$dTime_to = $getOperationTheater->dTime_to;
												$operation_name = $getOperationTheater->surgery_name;
												$diagnosis = $getOperationTheater->diagnosis;
												$name_of_surgeon = $getOperationTheater->name_of_surgeon;
												$name_of_anesthesia = $getOperationTheater->name_of_anesthesia;
												$assistant_name1 = $getOperationTheater->assistant_name1;
												$assistant_name2 = $getOperationTheater->assistant_name2;
												$assistant_name3 = $getOperationTheater->assistant_name3;
												$assistant_name4 = $getOperationTheater->assistant_name4;
												$operation_procedure = $getOperationTheater->operation_procedure;
												$notes = $getOperationTheater->notes;
											}else{
												$dDate_from = "";
												$dTime_from = "";
												$dDate_to = "";
												$dTime_to = "";
												$operation_name = "";
												$diagnosis = "";
												$name_of_surgeon = 0;
												$name_of_anesthesia = "";
												$assistant_name1 = "";
												$assistant_name2 = "";
												$assistant_name3 = "";
												$assistant_name4 = "";
												$operation_procedure = "";
												$notes = "";
											}
											?>
<table cellpadding="5" cellspacing="5" width="100%" align="center">
<tr>
	<td width="32%"><strong>From Date</strong></td>
    <td width="68%"><?php echo date("M d, Y",strtotime($dDate_from))." ".$dTime_from;?></td>
</tr>
<tr>
	<td><strong>To Date</strong></td>
    <td><?php echo date("M d, Y",strtotime($dDate_to))." ".$dTime_to;?></td>
</tr>
<tr>
	<td><strong>Operation Name</strong></td>
    <td><?php echo $operation_name?></td>
</tr>
<tr>
	<td><strong>Diagnosis</strong></td>
    <td><?php echo $diagnosis?></td>
</tr>
<tr>
	<td><strong>Name of Surgeon</strong></td>
    <td>
	<?php
	$ci_obj = & get_instance();
	$ci_obj->load->model('app/general_model');
	$surgeon = $ci_obj->general_model->getPreparedBy($name_of_surgeon);
	if(is_object($surgeon)){
		echo $surgeon->cPreparedBy;
	}else{
		echo "";
	}
		
	
	?>
</tr>
<tr>
	<td><strong>Name of Anesthesia</strong></td>
    <td>
	<?php
	$ci_obj2 = & get_instance();
	$ci_obj2->load->model('app/general_model');
	$surgeon2 = $ci_obj2->general_model->getPreparedBy($name_of_anesthesia);

	if(is_object($surgeon2)){
		echo $surgeon2->cPreparedBy;
	}else{
		echo "";
	}
	?></td>
</tr>
<tr>
	<td><strong>Assistant Name 1</strong></td>
    <td><?php echo $assistant_name1?></td>
</tr>
<tr>
	<td><strong>Assistant Name 2</strong></td>
    <td><?php echo $assistant_name2?></td>
</tr>
<tr>
	<td><strong>Assistant Name 3</strong></td>
    <td><?php echo $assistant_name3?></td>
</tr>
<tr>
	<td><strong>Assistant Name 4</strong></td>
    <td><?php echo $assistant_name4?></td>
</tr>
<tr>
	<td><strong>Operation Procedure</strong></td>
    <td><?php echo $operation_procedure?></td>
</tr>
<tr>
	<td><strong>Notes</strong></td>
    <td><?php echo $notes?></td>
</tr>
</table>















</body>
</html>