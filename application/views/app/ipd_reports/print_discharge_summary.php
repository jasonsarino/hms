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
											if(is_object($get_discharge_summary)){
												$reason_admission = $get_discharge_summary->reason_admission;
												$condition = $get_discharge_summary->condition_upon_discharge;
												$admitting_impression = $get_discharge_summary->admitting_impression;
												$final_diagnosis = $get_discharge_summary->final_diagnosis;
												$physical_exam_findings = $get_discharge_summary->physical_exam_findings;
												$course_ward = $get_discharge_summary->course_ward;
											}else{
												$reason_admission = "";
												$condition = "";
												$admitting_impression = "";
												$final_diagnosis = "";
												$physical_exam_findings = "";
												$course_ward = "";
											}
											?>
<table cellpadding="5" cellspacing="5" width="100%" align="center">
<tr>
	<td width="36%"><strong>Reason for Admission</strong></td>
    <td width="64%"><?php echo $reason_admission;?></td>
</tr>
<tr>
	<td><strong>Condition Upon Discharge</strong></td>
    <td>
	<?php
	$ci_obj = & get_instance();
	$ci_obj->load->model('app/general_model');
	$condition = $ci_obj->general_model->getConditionUpon($condition);
	if(is_object($condition)){
		echo $condition->cValue;
	}else{
		
	}
	
	?>
    </td>
</tr>
<tr>
	<td><strong>Admitting Impression</strong></td>
    <td><?php echo $admitting_impression;?></td>
</tr>
<tr>
	<td><strong>Final Diagnosis</strong></td>
    <td><?php echo $final_diagnosis;?></td>
</tr>
<tr>
	<td><strong>Clinical Findings</strong></td>
    <td><?php echo $physical_exam_findings;?></td>
</tr>
<tr>
	<td><strong>Course in the Ward</strong></td>
    <td><?php echo $course_ward;?></td>
</tr>
</table>















</body>
</html>