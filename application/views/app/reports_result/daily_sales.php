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
	<th style="border-bottom:1px #999 solid">Receipt No.</th>
	<th style="border-bottom:1px #999 solid">Date</th>
    <th style="border-bottom:1px #999 solid">Patient No.</th>
    <th style="border-bottom:1px #999 solid">Patient Name</th>
    <th style="border-bottom:1px #999 solid">Sub-total</th>
    <th style="border-bottom:1px #999 solid">Discount</th>
    <th style="border-bottom:1px #999 solid">Total</th>
</tr>
<?php foreach($daily_sales as $daily_sales){?>
<tr>
	<td align="left">&nbsp;&nbsp;<?php echo $daily_sales->receipt_no?></td>
	<td align="left">&nbsp;&nbsp;<?php echo date("M d, Y",strtotime($daily_sales->dDate))?></td>
    <td align="left">&nbsp;&nbsp;<?php echo $daily_sales->patient_no?></td>
    <td align="left">&nbsp;&nbsp;<?php echo $daily_sales->patient?></td>
    <td align="right"><?php echo $daily_sales->subtotal?>&nbsp;&nbsp;</td>
    <td align="right"><?php echo $daily_sales->discount?>&nbsp;&nbsp;</td>
    <td align="right"><?php echo $daily_sales->total_amount?>&nbsp;&nbsp;</td>
</tr>
<?php }?>
<tr>
	<th style="border-top:1px #999 solid; border-bottom:1px #999 solid">TOTAL</th>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid"></td>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid"></td>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid"></td>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid" align="right"><strong><?php echo number_format($total_sales->subtotal,2);?>&nbsp;&nbsp;</strong></td>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid" align="right"><strong><?php echo number_format($total_sales->discount,2);?>&nbsp;&nbsp;</strong></td>
    <td style="border-top:1px #999 solid; border-bottom:1px #999 solid" align="right"><strong><?php echo number_format($total_sales->total_amount,2);?>&nbsp;&nbsp;</strong></td>
</tr>
</table>

</body>
</html>	