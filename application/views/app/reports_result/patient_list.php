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
	font-size:10px;
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
	<th style="border-bottom:1px #999 solid">Reg. No.</th>
    <th style="border-bottom:1px #999 solid">Patient Name</th>
    <th style="border-bottom:1px #999 solid">Address</th>
    <th style="border-bottom:1px #999 solid">Mobile No.</th>
    <th style="border-bottom:1px #999 solid">Birthday</th>
    <th style="border-bottom:1px #999 solid">Age</th>
    <th style="border-bottom:1px #999 solid">Date Entry</th>
    <th style="border-bottom:1px #999 solid">Gender</th>
    <th style="border-bottom:1px #999 solid">Civil Status</th>
    <th style="border-bottom:1px #999 solid">Blood Group</th>
    <th style="border-bottom:1px #999 solid">Insurance Company</th>
</tr>
<?php foreach($patient_list as $patient_list){?>
<tr>
	<td><?php echo $patient_list->patient_no?></td>
    <td><?php echo $patient_list->name?></td>
    <td><?php echo $patient_list->address?></td>
    <td><?php echo $patient_list->mobile_no?></td>
    <td align="center"><?php echo date("M d, Y",strtotime($patient_list->birthday))?></td>
    <td align="center"><?php echo $patient_list->age?></td>
    <td align="center"><?php echo date("M d, Y h:i:s A",strtotime($patient_list->date_entry))?></td>
    <td align="center"><?php echo $patient_list->gender?></td>
    <td align="center"><?php echo $patient_list->civil_status?></td>
    <td align="center"><?php echo $patient_list->blood_group?></td>
</tr>
<?php }?>
</table>












</body>
</html>