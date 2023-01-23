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
	font-size:11px;
}
</style>
<body>
<center>
	<font size="+1"><?php echo $companyInfo->company_name;?></font></b><br>                   
    <?php echo $companyInfo->company_address;?><br>     
    <?php echo $companyInfo->company_contactNo;?><br><br>
    SURGICAL QUOTATION COSTING
</center>   
<br /><br />
<table cellpadding="2" cellspacing="2" align="center" width="80%">
<tr>
	<td width="23%"><strong>DATE</strong></td>
    <td width="77%"><?php echo strtoupper(date("M d, Y",strtotime(date("Y-m-d"))));?></td>
</tr>
<tr>
	<td><strong>SURGERY NAME</strong></td>
    <td><?php echo strtoupper($SurgeryName->surgery_name)?></td>
</tr>
<tr>
	<td><strong>TO</strong></td>
    <td><?php echo strtoupper($requestby);?></td>
</tr>
<tr>
	<td><strong>SUBJECT</strong></td>
    <td><?php echo strtoupper($subjects);?></td>
</tr>
</table>
<br>
<table cellpadding="3" cellspacing="3" align="center" width="80%" border="1" style="border:1px #999; border-collapse:collapse">
<tr>
	<td width="37%" style="border-bottom:1px #999 solid">&nbsp;&nbsp;<strong>Surgery Description</strong></td>
	<td width="46%" style="border-bottom:1px #999 solid">&nbsp;&nbsp;<strong>Details</strong></td>
    <td width="17%" style="border-bottom:1px #999 solid">&nbsp;&nbsp;<strong>Cost</strong></td>
</tr>
<?php foreach($SurgeryItems as $SurgeryItems){?>
<tr>
    <td nowrap>&nbsp;&nbsp;<?php echo $SurgeryItems->particular_name?></td>
    <td>&nbsp;&nbsp;<?php echo $SurgeryItems->cDesc?></td>
    <td align="right"><?php echo number_format($SurgeryItems->costs,2)?>&nbsp;&nbsp;</td>
</tr>
<?php }?>
<tr>
	<td>&nbsp;&nbsp;<strong>TOTAL ESTIMATE</strong></td>
    <td></td>
    <td align="right"><strong><?php echo number_format($SurgeryName->total_costs,2)?></strong>&nbsp;&nbsp;</td>
</tr>
</table>
<br>
<table cellpadding="2" cellspacing="2" align="center" width="80%">
<tr>
	<td>
    <p align="justify">
    Please note that this is an estimate not a quote. Additional charges may be incurred depending on 
    patient's recovery time following surgery, response treatment and accomodation extras. Full amount of
    the estimate is required as a up-front deposit 1 day prior to admission.
    </p>
    </td>
</tr>
</table>












</body>
</html>	