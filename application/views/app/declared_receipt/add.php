<!DOCTYPE html>
<html>
    <head>
<head>

        <meta charset="UTF-8">
        <title>Hospital Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 <meta content="Live Demo Hospital Management System,HMS is designed for medical practitioners and health-related institutions to assistant them in storing and keeping track of all correlated information such as patient medical records, admission/discharge reports, pharmaceutical management, billing and report generation and more. " name="description">
 <meta content="free live demo hms,free live demo hospital management system,live demo,demo,live,hospital management system live demo,hospital management system free source codes,source codes,php,mysql,codeigniter,mvc,php frameworks,hospital management system,hospital,management,system,solution,online demo,demo hospital management system,live demo,demo trial,trial,hospital solution,clinic management system,clinic solution,management system,system,online management system" name="keywords">
  <meta content="Jayson Sarino" name="author">

  <meta property="og:site_name" content="Hospital Management System Free Trial Demo">
  <meta property="og:title" content="Hospital Management System">
  <meta property="og:description" content="Live Demo Hospital Management System,HMS is designed for medical practitioners and health-related institutions to assistant them in storing and keeping track of all correlated information such as patient medical records, admission/discharge reports, pharmaceutical management, billing and report generation and more.">
  <meta property="og:type" content="website">
  <meta property="og:image" content="http://hms-demo.jaysonsarino.com/public/img/new/hms_logo.png"><!-- link to image for socio -->
  <meta property="og:url" content="http://hms-demo.jaysonsarino.com/">

        <link href="<?php echo base_url()?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>public/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>public/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php require_once(APPPATH.'views/include/header.php');?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            
            <?php require_once(APPPATH.'views/include/sidebar.php');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <script language="javascript">
            function isNumberKey(evt)
       				{
          				var charCode = (evt.which) ? evt.which : event.keyCode;
         				 if (charCode != 46 && charCode > 31 
            				&& (charCode < 48 || charCode > 57))
             				return false;

          				return true;
       				}
            </script>
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Add Declared Receipt</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Administrator</a></li>
                        <li><a href="<?php echo base_url()?>app/declared_receipt">Declared Receipt</a></li>
                        <li class="active">Add Declared Receipt</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content">
                 
                 
                 <div class="row">
                 	<div class="col-md-12">
                    
                    	 <div class="box">
                         		
                         		<div class="box-header">
                                    <h3 class="box-title"></h3>
                                    
                                </div>
                                
                        	<div class="box-body table-responsive">
                            	<form role="form" method="post" action="<?php echo base_url()?>app/declared_receipt/save" onSubmit="return confirm('Are you sure you want to save?');">
                                <input type="hidden" name="old_receipt_no" id="old_receipt_no" value="<?php echo $ORList->receipt_no?>">
                                <input type="hidden" name="invoice_no" id="invoice_no" value="<?php echo $ORList->invoice_no?>">
                                <input type="hidden" name="iop_id" id="iop_id" value="<?php echo $ORList->receipt_no?>">
                                <input type="hidden" name="payment_type" id="payment_type" value="<?php echo $ORList->payment_type?>">
                                
                                
                                <input type="hidden" name="amountPaid" id="amountPaid" value="<?php echo $ORList->amountPaid?>">
                                <input type="hidden" name="change" id="change" value="<?php echo $ORList->change?>">
                                <input type="hidden" name="total_purchased" id="total_purchased" value="<?php echo $ORList->total_purchased?>">
                                
                                		<?php echo validation_errors(); ?>   
                                        
                                        <table width="100%" cellpadding="2" cellspacing="2">
                                        <tr>
                                        	<td width="18%">OR No.</td>
                                            <td width="82%"><input value="<?php echo $ORList->receipt_no?>" class="form-control input-sm" name="receipt_no" id="receipt_no" type="text" placeholder="OR No." style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Date</td>
                                            <td><input readonly value="<?php echo $ORList->dDate?>" class="form-control input-sm" name="dDate" id="dDate" type="text" placeholder="Date" style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Patient Type</td>
                                            <td><input readonly value="<?php echo $ORList->patient_type?>" class="form-control input-sm" type="text" placeholder="Patient Type" style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Patient No.</td>
                                            <td><input readonly value="<?php echo $ORList->patient_no?>" name="patient_no" id="patient_no" class="form-control input-sm" type="text" placeholder="Patient No." style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Patient Name</td>
                                            <td><input readonly value="<?php echo $ORList->patient?>" class="form-control input-sm" type="text" placeholder="Patient No." style="width: 250px;" required></td>
                                        </tr>
                                        
                                        <tr>
                                        	<td>Sub Total</td>
                                            <td>
                                            <input onKeyUp="return compute()" onBlur="return validate_sub(this.value)" onkeypress="return isNumberKey(event)" value="<?php echo $ORList->subtotal?>" name="subtotal" id="subtotal" class="form-control input-sm" type="text" placeholder="Sub Total" style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Discount</td>
                                            <td>
                                            <input onKeyUp="return compute()" onBlur="return validate_discount(this.value)" onkeypress="return isNumberKey(event)" value="<?php echo $ORList->discount?>" name="discount" id="discount" class="form-control input-sm" type="text" placeholder="Discount" style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Total Amount</td>
                                            <td><input readonly nkeypress="return isNumberKey(event)" value="<?php echo $ORList->total_amount?>" name="total_amount" id="total_amount" class="form-control input-sm" type="text" placeholder="Patient No." style="width: 250px;" required></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2"><br></td>
                                        </tr>
                                        </table>
                                        <script language="javascript">
										function validate_sub(){
											if(eval(document.getElementById("subtotal").value) == 0 || document.getElementById("subtotal").value == ""){
												alert('Invalid Sub-total.');
												document.getElementById("subtotal").value = "0";
												document.getElementById("subtotal").focus();
												compute();
												return false;
											}else{
												return true;
											}
										}
										
										function validate_discount(){
											if(document.getElementById("discount").value == ""){
												alert('Invalid discount.');
												document.getElementById("discount").value = "0";
												document.getElementById("discount").focus();
												compute();
												return false;
											}else{
												return true;
											}
										}
										
                                        function compute(){
											var	subtotal,discount,total_amount;
											subtotal = document.getElementById("subtotal").value;
											discount = document.getElementById("discount").value;
											total_amount = eval(subtotal) - eval(discount);
											if(eval(total_amount) < 0){
												alert('Invalid input.');
												return false;
											}else{
												document.getElementById("total_amount").value = total_amount;
												return true;
											}
											
										}
                                        </script>
                                        <div class="form-group">
                                            <a href="<?php echo base_url();?>app/declared_receipt" class="btn btn-default">Cancel</a>
                                            <button class="btn btn-primary" name="btnSubmit" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                        </div>
                                        
                                </form>
                                
                            </div>
                        </div>
                    </div>
                 </div>
                 
                 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
  
        
         <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
         <script src="<?php echo base_url();?>public/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url();?>public/js/AdminLTE/app.js" type="text/javascript"></script>
        
    </body>
</html>