<?php foreach($patientMedication as $patientMedication){?>

<script language="javascript">

var tbl = window.opener.document.getElementById('myTable').getElementsByTagName('tr');
var lastRow = tbl.length;	

var category,particular,qty,rate,note,amount,isPackage;

qty = '<?php echo $patientMedication->total_qty;?>';
note = "";
category = "";
particular = '<?php echo $patientMedication->drug_name;?>';
rate = '<?php echo $patientMedication->nPrice;?>';
isPackage = '<?php echo $patientMedication->isPackage;?>';

amount = eval(qty) * eval(rate);
amount = amount.toFixed(2); 

var a=window.opener.document.getElementById('myTable').insertRow(-1);
var b=a.insertCell(0);
var c=a.insertCell(1);
var d=a.insertCell(2);
var e=a.insertCell(3);
var f=a.insertCell(4);
var g=a.insertCell(5);
var h=a.insertCell(6);
						
b.innerHTML = "<input type=\"hidden\" name=\"isPackage" + lastRow + "\" id=\"isPackage" + lastRow + "\" value=\""+ isPackage + "\"><input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc; text-align:right\" name=\"id" + lastRow + "\" id=\"id" + lastRow + "\" value=\""+ lastRow + ". \" readonly=\"true\">";
c.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc;\" name=\"bill_name" + lastRow + "\" id=\"bill_name" + lastRow + "\" value=\""+ particular + "\" readonly=\"true\">";
d.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; text-align:right\" name=\"qty" + lastRow + "\" id=\"qty" + lastRow + "\" class=\"" + lastRow + "\" value=\""+ qty + "\" onBlur=\"return validate_input(this.className,'qty')\" onkeyup=\"validate_gross(this.className,'qty')\" onkeypress=\"return isNumberKey(event)\" >";
e.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; text-align:right\" name=\"rate" + lastRow + "\" id=\"rate" + lastRow + "\" class=\"" + lastRow + "\" value=\""+ rate + "\" onBlur=\"return validate_input(this.className,'rate')\" onkeyup=\"validate_gross(this.className,'rate')\" onkeypress=\"return isNumberKey(event)\">";
f.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc; text-align:right\" name=\"amount" + lastRow + "\" id=\"amount" + lastRow + "\" value=\""+ amount + "\" readonly=\"true\">";
g.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%;\" name=\"note" + lastRow + "\" id=\"note" + lastRow + "\" value=\""+ note + "\">";
h.innerHTML = "<img src=\"<?php echo base_url()?>public/img/b_drop.png\" onclick=\"deleteRow(this)\" style=\"cursor:pointer;\">";
						
window.opener.document.getElementById("hdnrowcnt").value = lastRow;
window.opener.getGross();

</script>

<?php }?>
<script>


window.opener.closeModal();
window.close();


						
</script>