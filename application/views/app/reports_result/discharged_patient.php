<!DOCTYPE html>
<html>
<head>
<head>

<meta charset="UTF-8">
<title>Hospital Management System</title>   
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
    <?php echo $reports_title;?>
</center>   
<br /><br />
<table cellpadding="2" cellspacing="2" align="center" width="100%">
<tr>
	<th style="border-bottom:1px #999 solid">Date Admitted</th>
	<th style="border-bottom:1px #999 solid">IP No.</th>
    <th style="border-bottom:1px #999 solid">Reg. No.</th>
    <th style="border-bottom:1px #999 solid">Patient Name</th>
    <th style="border-bottom:1px #999 solid">Incharge Doctor</th>
    <th style="border-bottom:1px #999 solid">Department</th>
    <th style="border-bottom:1px #999 solid">Room & Bed No.</th>
    <th style="border-bottom:1px #999 solid">Status</th>
</tr>
<?php foreach($discharged_patient as $discharged_patient){?>
<tr>
	<td align="center"><?php echo date("M d, Y",strtotime($discharged_patient->date_visit))." ".$discharged_patient->time_visit?></td>
    <td align="center">
	<?php if($discharged_patient->patient_type == "IPD"){?>
    	<a target="_blank" href="<?php echo base_url()?>app/ipd/view/<?php echo $discharged_patient->IO_ID?>/<?php echo $discharged_patient->patient_no?>"><?php echo $discharged_patient->IO_ID?></a>
    <?php }else if($discharged_patient->patient_type == "OPD"){?>
    	<a target="_blank" href="<?php echo base_url()?>app/opd/view/<?php echo $discharged_patient->IO_ID?>/<?php echo $discharged_patient->patient_no?>"><?php echo $discharged_patient->IO_ID?></a>
    <?php }?>
	
    </td>
    <td align="center"><?php echo $discharged_patient->patient_no?></td>
    <td align="center"><?php echo $discharged_patient->name?></td>
    <td align="center"><?php echo $discharged_patient->doctor?></td>
    <td align="center"><?php echo $discharged_patient->dept_name?></td>
    <td align="center"><?php echo "Rm.".$discharged_patient->room_name." Bed No.".$discharged_patient->bed_name?></td>
    <td align="center">
	<?php 
	if($discharged_patient->nStatus == "Pending"){
		echo "Admitted";
	}else{
		echo "Discharged";
	}
	?></td>
</tr>
<?php }?>
</table>












</body>
</html>	