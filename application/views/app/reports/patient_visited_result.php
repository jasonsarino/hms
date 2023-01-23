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
	font-size:12px;
}
</style>
<body>

<center>
<font size="+1"><?php echo $companyInfo->company_name;?></font></b><br>                   
                            <?php echo $companyInfo->company_address;?><br>     
                            <?php echo $companyInfo->company_contactNo;?><br><br>
                            Individual Patient Reports
</center>   
<br /><br />
<table align="center" width="100%" border="1" cellpadding="2" cellspacing="2" style="border:1px #666; border-collapse:collapse">
<tr>
	<td><strong>Patient Name</strong><br /><br /><?php echo strtoupper($patientInfo->patient);?></td>
    <td><strong>Patient No.</strong><br /><br /><?php echo strtoupper($patientInfo->patient_no)?></td>
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

<table cellpadding="5" cellspacing="5" width="100%" align="center">
<tr>
	<th width="5%" style="border-bottom:1px #999 solid">Type</th>
    <th width="8%" style="border-bottom:1px #999 solid">IOP No.</th>
    <th width="12%" style="border-bottom:1px #999 solid">Date Visited</th>
    <th width="13%" style="border-bottom:1px #999 solid">InCharge Doctor</th>
    <th width="12%" style="border-bottom:1px #999 solid">Refferal Doctor</th>
    <th width="13%" style="border-bottom:1px #999 solid">Department</th>
    <th width="13%" style="border-bottom:1px #999 solid">Room Name</th>
    <th width="14%" style="border-bottom:1px #999 solid">Personal History</th>
    <th width="10%" style="border-bottom:1px #999 solid">Past Medical History</th>
</tr>
<?php foreach($patientvisited as $patientvisited){?>
<tr>
	<td align="center"><?php echo $patientvisited->patient_type?></td>
    <td align="center">
    <?php if($patientvisited->patient_type == "IPD"){?>
    	<a target="_blank" href="<?php echo base_url()?>app/ipd/view/<?php echo $patientvisited->IO_ID?>/<?php echo $patientvisited->patient_no?>"><?php echo $patientvisited->IO_ID?></a>
    <?php }else if($patientvisited->patient_type == "OPD"){?>
    	<a target="_blank" href="<?php echo base_url()?>app/opd/view/<?php echo $patientvisited->IO_ID?>/<?php echo $patientvisited->patient_no?>"><?php echo $patientvisited->IO_ID?></a>
    <?php }?>
	
    </td>
    <td align="center"><?php echo date("M d, Y",strtotime($patientvisited->date_visit))." ".$patientvisited->time_visit?></td>
    <td>
    <?php
	$ci_obj = & get_instance();
	$ci_obj->load->model('app/general_model');
	$results = $ci_obj->general_model->getDoctor($patientvisited->doctor_id);
	echo $results->doctor;
	?>
    </td>
    <td align="center">
    <?php
	$ci_obj2 = & get_instance();
	$ci_obj2->load->model('app/general_model');
	$results2 = $ci_obj2->general_model->getDoctor($patientvisited->refferal_doctor);
	if($results2){
		echo $results2->doctor;
	}else{
		echo "-";	
	}
	?>
    </td>
    <td align="center">
	<?php
	$ci_obj3 = & get_instance();
	$ci_obj3->load->model('app/general_model');
	$results3 = $ci_obj3->general_model->getDeptName($patientvisited->department_id);
	if($results3){
		echo $results3->dept_name;
	}else{
		echo "-";	
	}
	?>
    </td>
    <td align="center">
    <?php
	$ci_obj4 = & get_instance();
	$ci_obj4->load->model('app/general_model');
	$results4 = $ci_obj4->general_model->getroomName($patientvisited->room_id);
	if($results4){
		echo $results4->room_name;
	}else{
		echo "-";	
	}
	?>
    </td>
    <td><?php echo $patientvisited->personal_history?></td>
    <td><?php echo $patientvisited->past_medical_history?></td>
</tr>
<?php }?>
</table>















</body>
</html>