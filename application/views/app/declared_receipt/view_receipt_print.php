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
    Acknowledge Receipt
</center>   
<br /><br />

Patient No: <?php echo $OR_details->patient_no?><br>
Patient Name: <?php echo $OR_details->firstname?> <?php echo $OR_details->middlename?>, <?php echo $OR_details->lastname?>
<br><Br>


<table width="100%" align="center">
<tr>
	<td>Date</td>
    <td><?php echo $OR_details->dDate?></td>
</tr>
<tr>
	<td>Receipt No.</td>
    <td><?php echo $OR_details->receipt_no?></td>
</tr>
<tr>
	<td>Sub Total:</td>
    <td><?php echo number_format($OR_details->subtotal,2)?></td>
</tr>
<tr>
	<td>Discount:</td>
    <td><?php echo number_format($OR_details->discount,2)?></td>
</tr>
<tr>
	<td>Total Amount:</td>
    <td><?php echo number_format($OR_details->total_amount,2)?></td>
</tr>
<tr>
	<td>Amount Paid::</td>
    <td><?php echo number_format($OR_details->amountPaid,2)?></td>
</tr>
<tr>
	<td>Change:</td>
    <td><?php echo number_format($OR_details->change,2)?></td>
</tr>
</table>

</body>
</html>	