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
        
        <link href="<?php echo base_url();?>public/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
        
        
        <!-- scrollbar -->
        <link rel="stylesheet" href="<?php echo base_url()?>public/scrollbar/jquery.mCustomScrollbar.css">
        <!-- Google CDN jQuery with fallback to local -->
		<script src="<?php echo base_url()?>public/scrollbar/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo base_url()?>public/scrollbar/js/minified/jquery-1.11.0.min.js"><\/script>')</script>
	
		<!-- custom scrollbar plugin -->
        <link rel="stylesheet" href="<?php echo base_url()?>public/scrollbar/style.css">
		<script src="<?php echo base_url()?>public/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	
		<script>
		(function($){
			$(window).load(function(){
				
				$("#content-1").mCustomScrollbar({
					autoHideScrollbar:true,
					theme:"rounded"
				});
				
			});
		})(jQuery);
	</script>
        <!-- scrollbar -->
        
        
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
    <body class="skin-blue" onLoad="autoload();">
        <!-- header logo: style can be found in header.less -->
        <?php require_once(APPPATH.'views/include/header.php');?>
        		<form method="post" action="<?php echo base_url()?>app/billing/save_invoice" onSubmit="return validate_form();">
             	<input type="hidden" name="patient" id="patient" value="<?php echo (isset($direct)) ? $patient_rows->patient_no : "";?>">
        		
                <section class="content">
                 
                 <div class="row">
                 	<div class="col-md-3">
                    	<div class="box box-primary">
                            <div class="box-header">
                            </div>
                            
                            <div class="box-content"> 
                            	<div class="box-body table-responsive no-padding">
                                    <?php 
                                    if( isset($direct) )
                                    {
                                    ?>
                                        <table width="100%" cellpadding="3" cellspacing="3">
                                        <tr>
                                            <td width="15%" valign="top" align="center">
                                                <img src="<?php echo base_url();?>public/patient_picture/avatar.png" class="img-rounded" width="86" height="81">
                                            </td>
                                            <td>
                                                <table cellpadding="2" width="100%">
                                                <tr>
                                                    <td><strong>Patient No.</strong></td>
                                                    <td><?php echo $patient_rows->patient_no;?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Patient Name.</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $patient_rows->name;?></td>
                                                </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        </table>
                                        <input type="hidden" name="opd_no" id="opd_no" value="0">
                                        <input type="hiddens" name="patient_no" id="patient_no" value="<?php echo $patient_rows->patient_no?>">
                                    <?php }else {?>
                                	 <span id="patientDetials">
                                     	<table width="100%" cellpadding="3" cellspacing="3">
                                        <tr>
                                        	<td width="15%" valign="top" align="center">
												<img src="<?php echo base_url();?>public/patient_picture/avatar.png" class="img-rounded" width="86" height="81">
                                    		</td>
                                    		<td>
                                    			<table cellpadding="2" width="100%">
                                                <tr>
                                                	<td><strong>Patient No.</strong></td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                	<td><strong>IOP No.</strong></td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>
                                                	<td><strong>Patient Name.</strong></td>
                                                </tr>
                                                <tr>
                                                	<td>-</td>
                                                </tr>
                                                </table>
                                    		</td>
                                        </tr>
                                        </table>
                                     </span>
                                     <?php }?>
                                </div>	
                            </div>
                            <div class="box-footer">
                            <script>
                                                function setTitle(val){
													if(val == "cash"){
														document.getElementById("credit").style.display = "none";
														document.getElementById("insurance").style.display = "none";
														document.getElementById("totalAmount").style.display = "inline";
														document.getElementById("amountPaid").style.display = "inline";
														document.getElementById("change").style.display = "inline";	
													}else if(val == "credit"){
														document.getElementById("credit").style.display = "inline";
														document.getElementById("insurance").style.display = "none";	
														document.getElementById("totalAmount").style.display = "none";
														document.getElementById("amountPaid").style.display = "none";
														document.getElementById("change").style.display = "none";	
													}else if(val == "insurance"){
														document.getElementById("credit").style.display = "none";
														document.getElementById("insurance").style.display = "inline";	
														document.getElementById("totalAmount").style.display = "none";
														document.getElementById("amountPaid").style.display = "none";
														document.getElementById("change").style.display = "none";	
													}
												}
                                                </script>
                                        
                                        		<?php
													$userID = $invoice_no->invoice_no;
													$userID2 = $invoice_no->invoice_no;
													if(strlen($userID) == 1){
														$userID = "00000".$userID;
													}else if(strlen($userID) == 2){
														$userID = "0000".$userID;
													}else if(strlen($userID) == 3){
														$userID = "000".$userID;
													}else if(strlen($userID) == 4){
														$userID = "00".$userID;
													}else if(strlen($userID) == 5){
														$userID = "0".$userID;
													}else if(strlen($userID) == 6){
														$userID = $userID;
													}
													
													$receipt_no = $receipt_no2->receipt_no;
													$receipt_no2 = $receipt_no2->receipt_no;
													if(strlen($receipt_no) == 1){
														$receipt_no = "00000".$receipt_no;
													}else if(strlen($receipt_no) == 2){
														$receipt_no= "0000".$receipt_no;
													}else if(strlen($receipt_no) == 3){
														$receipt_no = "000".$receipt_no;
													}else if(strlen($receipt_no) == 4){
														$receipt_no = "00".$receipt_no;
													}else if(strlen($receipt_no) == 5){
														$receipt_no = "0".$receipt_no;
													}else if(strlen($receipt_no) == 6){
														$receipt_no = $receipt_no;
													}
												?>
                                    <input type="hidden" name="invoiceno2" value="<?php echo $userID2;?>">
                                   
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Date</label>
                                     <input type="text" value="<?php echo date("m/d/Y");?>" readonly name="dDate22222" id="dDate22222" class="form-control input-sm">
                                </div>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Invoice No.</label>
                                     <input type="text" value="SI-<?php echo $userID;?>" readonly name="invoiceno" id="invoiceno" class="form-control input-sm">
                                </div>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Total Items</label>
                                     <input type="text" readonly name="hdnrowcnt" id="hdnrowcnt" value="0" class="form-control input-sm">
                                </div>
                                
                                
                                
                                
                                 
                                
                                <script>
                                function validate_discount(val){
									if(val == ""){
										alert('Invalid discount');
										document.getElementById("discount").value = "0";
									}
									getGross();	
								}
                                </script>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Sub Total</label>
                                     <input type="text" readonly name="nGross" id="nGross" placeholder="0.00" class="form-control input-sm">
                                </div>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Discount</label>
                                     <input type="text" name="discount" id="discount" value="0" onKeyUp="validate_discount(this.value)" class="form-control input-sm" onkeypress="return isNumberKey(event)" >
                                </div>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">TOTAL AMOUNT</label>
                                     <input type="text" placeholder="0.00" readonly name="total_amount" id="total_amount" class="form-control input-sm">
                                </div>
                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Reason for Discount</label>
                                    <select name="reason_dicount" id="reason_dicount" class="form-control input-sm">
                                    	<option value="">- Reason for Discount -</option>
                                        <?php foreach($reason_dicount as $reason_dicount){?>
                                        <option value="<?php echo $reason_dicount->param_id?>"><?php echo $reason_dicount->cValue?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                                
                                <div class="form-group">
                                	<label for="exampleInputEmail1">Remarks</label>
                                	<textarea placeholder="Remarks" class="form-control input-sm" name="remarks" id="remarks" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-9">
                    	<div class="nav-tabs-custom">
                        	<ul class="nav nav-tabs">
                               	<li class="active"><a href="#tab_1" data-toggle="tab"><strong>Billing List</strong></a></li>
                            	<!--<li><a href="#tab_2" data-toggle="tab">Header Details</a></li>-->
                            </ul>
                            <div class="tab-content">
                            	<div class="tab-pane active" id="tab_1">
                                
                                 <div class="alt2" dir="ltr" style="
											margin: 0px;
											padding: 0px;
											border: 0px solid #919b9c;
											width: 100%;
											height: 390px;
											text-align: left;
											overflow: auto">
                               <table id="myTable" width="100%" cellpadding="2" cellspacing="2">
                                <thead>
                                	<tr style="border-bottom:1px #999 solid; border-collapse:collapse">
                                    	<th width="3%">No.</th>
                                        <th width="42%">Particular Name</th>
                                        <th width="7%">Qty</th>
                                        <th width="10%">Rate</th>
                                        <th width="10%">Amount</th>
                                        <th width="25%">Note</th>
                                        <th width="3%"></th>
                                    </tr>
                                </thead>
                                </table>
                                
                               
                                </div>
                                </div>
                               <!-- <div class="tab-pane" id="tab_2">
                                aaa
                                </div>-->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                    	<div class="box box-primary">
                        	<div class="box-body">
                            	<a class="btn btn-app" href="<?php echo base_url()?>app/pos/"><i class="fa fa-refresh"></i> Refresh</a>

                                <a class="btn btn-app" data-toggle="modal" data-target="#doctorListModal" style="display: <?php echo ( isset($direct) ) ? "none" : "inline-block";?>"><i class="fa fa-user-md"></i> Doctor's Fee</a>
                            	<a class="btn btn-app" data-toggle="modal" data-target="#patientListModal" style="display: <?php echo ( isset($direct) ) ? "none" : "inline-block";?>"><i class="fa fa-user"></i> Patient</a>
                           
                                <a class="btn btn-app" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Item</a>
                                <a href="#" class="btn btn-app" onClick="return getPatientMedication()" style="display: <?php echo ( isset($direct) ) ? "none" : "inline-block";?>"><i class="fa fa-hand-o-down"></i> 1-Click Billed</a>
                                <button type="submit" class="btn btn-app"><i class="fa fa-save"></i> Save</button>
                                <a class="btn btn-app" onClick="alert('Please save current transaction to make Payment');"><i class="fa fa-credit-card"></i> Payment</a>
                                <!--<a class="btn btn-app" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-credit-card"></i> Payment</a>-->
                                <a class="btn btn-app" onClick="alert('Please save current transaction to print Invoice');"><i class="fa fa-print"></i> Print Invoice</a>
                                <a class="btn btn-app" onClick="alert('Please save current transaction to print Receipt');"><i class="fa fa-print"></i> Print Receipt</a>
                                
                                
                            </div>
                        </div>
                    </div>
                 </div>
                 
                 
                </section><!-- /.content -->
         		</form>
  
        
         <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
         <script src="<?php echo base_url();?>public/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url();?>public/js/AdminLTE/app.js" type="text/javascript"></script>
        
         <!-- BDAY -->
         <script src="<?php echo base_url();?>public/datepicker/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>public/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#cFrom').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  
				
				$('#cTo').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  
            
            });
        </script>
        <!-- END BDAY -->
        
        
        
        
        
        
        
        
        				<!-- / patientListModal modal -->   
        					<div class="modal fade" id="patientListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Search Patient</h4>
                                        </div>
                                        <div class="modal-body">
                                        			
                                                    
<script language="javascript">
function addPatient(patient,patient_no){
	//var patient;
	//patient = document.getElementById("patient").value;

if (window.XMLHttpRequest)
  {
  xmlhttp2=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
	
    document.getElementById("patientDetials").innerHTML=xmlhttp2.responseText;
    }
  }
	document.getElementById("patient").value = patient_no;

xmlhttp2.open("GET","<?php echo base_url();?>app/pos/patientDetials/"+patient,true);
xmlhttp2.send();

$('#patientListModal').modal('hide');
						return true;	
}

function autoload(){
	getPatientList('');	
}

function getPatientList(val)
{
	
	
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
    document.getElementById("showPatients").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php echo base_url();?>app/pos/showPatients/"+val,true);
xmlhttp.send();

}
</script>   
                                                    <input onKeyUp="getPatientList(this.value)" class="form-control input-sm" name="cSearch" id="cSearch" type="text" placeholder="Search here">
                                        		<span id="showPatients">
                                                
                                                </span>
                                                
                                               
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           <!-- <button type="button" class="btn btn-primary" onClick="return addPatient()">Proceed</button>-->
                                        </div>
                                       
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>














<!-- / patientListModal modal -->   
    <div class="modal fade" id="doctorListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Doctor's Fee</h4>
                </div>
                <div class="modal-body">

                    <div id="msgNotif"></div>
                            
                    <form name="frmDoctorFee" id="frmDoctorFee" method="post">
                    <table class="table table-striped">
                        <tr>
                            <td>Select Doctor <font color="#FF0000">*</font></td>
                            <td>
                                <select name="doctor" id="doctorC" class="form-control input-sm" style="width: 100%;" required onchange="clearFields()">
                                    <option value="">- Select Doctor -</option>
                                    <?php 
                                    foreach($doctorList as $doctorList){

                                    ?>
                                    <option value="<?php echo trim($doctorList->user_id);?>" ><?php echo $doctorList->name;?></option>
                                    <?php }?>
                                </select>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Fee Type <font color="#FF0000">*</font></td>
                            <td>
                                <select name="cType" id="cType" class="form-control input-sm" style="width: 100%;" required>
                                    <option value="">- Select Fee Type  -</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="actual">Actual Fee</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Value <font color="#FF0000">*</font></td>
                            <td>
                                <input type="text" class="form-control input-sm" style="width: 100%;" required placeholder="Value" onkeyup="compute(this.value)" name="valueFee" id="valueFee">
                            </td>
                        </tr>
                        <tr>
                            <td>Total Fee <font color="#FF0000">*</font></td>
                            <td>
                                <input type="text" style="font-size:26px; width:100%; background-color:rgba(243, 215, 16, 0.27);;" readonly="" name="totalFee" id="totalFee">
                            </td>
                        </tr>
                        <tr>
                            <td>Notes <font color="#FF0000">*</font></td>
                            <td>
                                <textarea style="width:100%;" name="notes" id="notes" rows="4"></textarea>
                            </td>
                        </tr>
                    </table>    
                    </form>
                        
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="saveDoctorFee()" name="btnSaveDoctorFee" id="btnSaveDoctorFee">Save</button>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



<script type="text/javascript">


$(document).ready(function(){
    var invoiceno = $('#invoiceno').val();
    // alert(invoiceno);
    $.ajax({
        url: "<?php echo base_url();?>app/pos/getDoctorFee/" + invoiceno,
        type: "POST",
        dataType: "json",
        success: function(result)
        {
            // alert(result.user_id);
            $('#doctorC').val(result.user_id);
            $('#cType').val(result.feeType);
            $('#valueFee').val(result.value);
            $('#totalFee').val(result.totalFee);
            $('#notes').val(result.notes);
        }
    });
});


    function compute(val)
    {
        var cType           =   $('#cType').val();
        var total_amount    =   $('#total_amount').val();
        
        
        if(cType == "percentage")
        {
            var percentageValue = 0;
            percentageValue = val/100;

            totalFee = total_amount * percentageValue;
        }
        else if(cType == "actual")
        {
            totalFee = val;
        }

        $('#totalFee').val(totalFee);

    }

    function saveDoctorFee()
    {
        var formdata = $('#frmDoctorFee').serialize();
        var invoiceno       =   $('#invoiceno').val();
        
        $.ajax({
            url: "<?php echo base_url();?>app/pos/saveDoctorFee/" + invoiceno,
            type: "POST",
            data: formdata,
            success: function(result)
            {
                // alert(result);
                $('#btnSaveDoctorFee').removeClass("disabled");
                $('#btnSaveDoctorFee').text('Save');

                alert("Doctor's Fee has been saved.");

            }, beforeSend: function()
            {
                $('#btnSaveDoctorFee').addClass("disabled");
                $('#btnSaveDoctorFee').text('Saving...');
            }
        });

        
    }

    function clearFields()
    {
        $('#valueFee').val("");
        $('#totalFee').val("");
    }
</script>
































                           
                            <!-- / payment modal -->   
        						
        					<!-- / payment modal -->   
        					<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Payment</h4>
                                        </div>
                                        <div class="modal-body">
                                        
                                        		<div class="form-group">
                                            		<label for="exampleInputEmail1">Receipt No.</label>
                                            		 <input type="text" value="OR-<?php echo $receipt_no;?>" readonly name="receiptno" id="receiptno" class="form-control input-sm">
                                        		</div>
                                        
                                        		<div class="form-group">
                                            		<label for="exampleInputEmail1">Mode of Payment</label>
                                            		<select name="paymentType" id="paymentType" class="form-control input-sm" onChange="setTitle(this.value)" readonly>
                                     					<!--<option value="">- Mode of Payment -</option>-->
                                     					<option value="cash">Cash</option>
                                     					<option value="credit">Credit</option>
                                     					<option value="insurance">Insurance Company</option>
                                     				</select>
                                        		</div>
                                                
                                                <div class="form-group" id="totalAmount">
                                            		<label for="exampleInputEmail1">Total Amount</label>
                                            		 <input type="text" placeholder="Total Amount" readonly name="totalAmount" id="totalAmount" class="form-control input-sm">
                                        		</div>
                                                
                                                <div class="form-group" id="amountPaid">
                                            		<label for="exampleInputEmail1">Amount Paid</label>
                                            		 <input type="text" placeholder="Amount Paid" name="amountPaid" id="amountPaid" class="form-control input-sm">
                                        		</div>
                                                
                                                <div class="form-group" id="change">
                                            		<label for="exampleInputEmail1">Change</label>
                                            		 <input type="text" placeholder="Change" name="change" readonly id="change" class="form-control input-sm">
                                        		</div>
                                                
                               					<div class="form-group" id="credit" style=" display:none;">
                                            		<label for="exampleInputEmail1">Credit Card No.</label>
                                            		 <input type="text" placeholder="Credit Card No." name="creditCardNo" id="creditCardNo" class="form-control input-sm">
                                        		</div>
                                                
                                                <div class="form-group" id="insurance" style=" display:none;">
                                            		<label for="exampleInputEmail1">Insurance Company</label>
                                            		<select name="insurance_company" id="insurance_company" class="form-control input-sm">
                                                    	<option value="">- Insurance Company -</option>
                                                        <?php foreach($insurance_company as $insurance_company){?>
                                                        <option value="<?php echo $insurance_company->in_com_id;?>"><?php echo $insurance_company->company_name;?></option>
                                                        <?php }?>
                                                    </select>
                                        		</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onClick="return addItem()">Save</button>
                                        </div>
                                       
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                           
                            <!-- / payment modal -->   
        
        
        
        
        
        
         <!-- Modal -->
                           
                          
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Item</h4>
                                        </div>

<script language="javascript">

function showDrugList(category_id)
{
if (window.XMLHttpRequest)
  {
  xmlhttp3=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp3.onreadystatechange=function()
  {
  if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
    {
	
    document.getElementById("showDrugListItem").innerHTML=xmlhttp3.responseText;
    }
  }
  var supp;
xmlhttp3.open("GET","<?php echo base_url();?>app/billing/drug_list/"+category_id,true);
xmlhttp3.send();

}

function getDrugRate(category_id)
{
if (window.XMLHttpRequest)
  {
  xmlhttp5=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp5=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp5.onreadystatechange=function()
  {
  if (xmlhttp5.readyState==4 && xmlhttp5.status==200)
    {
	
    document.getElementById("showDrugRate").innerHTML=xmlhttp5.responseText;
    }
  }

xmlhttp5.open("GET","<?php echo base_url();?>app/billing/getDrugRate/"+category_id,true);
xmlhttp5.send();

}


function showDrugName(category_id)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
    document.getElementById("showCategories").innerHTML=xmlhttp.responseText;
    }
  }
  var supp;

xmlhttp.open("GET","<?php echo base_url();?>app/billing/getItem/"+category_id,true);
xmlhttp.send();

}

function getItemRate(category_id)
{
if (window.XMLHttpRequest)
  {
  xmlhttp2=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
	
    document.getElementById("showRate").innerHTML=xmlhttp2.responseText;
    }
  }

xmlhttp2.open("GET","<?php echo base_url();?>app/billing/getRate/"+category_id,true);
xmlhttp2.send();

}



												function showBills(val){
													if(val == "particular"){
														document.getElementById("particular").style.display = "inline";
														document.getElementById("particular_item").style.display = "inline";
														document.getElementById("category").style.display = "inline";
														document.getElementById("showCategories").style.display = "inline";
														document.getElementById("showRate").style.display = "inline";
														document.getElementById("medicine").style.display = "none";
														document.getElementById("drug_name").style.display = "none";
														document.getElementById("medicine_cat").style.display = "none";
														document.getElementById("showDrugListItem").style.display = "none";
														document.getElementById("showDrugRate").style.display = "none";
														document.getElementById("buttonMedication").style.display = "none";
													}else if(val == "medicine"){
														document.getElementById("particular").style.display = "none";
														document.getElementById("particular_item").style.display = "none";
														document.getElementById("category").style.display = "none";
														document.getElementById("showCategories").style.display = "none";
														document.getElementById("showRate").style.display = "none";
														document.getElementById("medicine").style.display = "inline";
														document.getElementById("drug_name").style.display = "inline";
														document.getElementById("medicine_cat").style.display = "inline";
														document.getElementById("showDrugListItem").style.display = "inline";
														document.getElementById("showDrugRate").style.display = "inline";
														document.getElementById("buttonMedication").style.display = "inline";
													}
												}
</script>
                                        <div class="modal-body">
                                        <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                        	<td>Type</td>
                                        	<td>
                                            <select name="bill_category" onChange="showBills(this.value);" id="bill_category" class="form-control input-sm" style="width: 100%;">
                                            	<option value="particular">Particular Bills</option>
                                                <option value="medicine">Medicine Bills</option>
                                            </select>	
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                            <span id="particular">Paricular Category</span>
                                            <span id="medicine" style="display: none">Medicine Category</span>
                                            </td>
                                            <td>
                                            				<select name="category" onChange="showDrugName(this.value);" id="category" class="form-control input-sm" style="width: 100%;" required>
                                                            	<option value="">- Paricular Category -</option>
																<?php 
																foreach($particular_cat as $particular_cat){?>
                                                            	<option value="<?php echo $particular_cat->group_id;?>"><?php echo $particular_cat->group_name;?></option>
                                                                <?php }?>
                                                            </select>
                                                            
                                                            <select name="medicine_cat" onChange="showDrugList(this.value);" id="medicine_cat" class="form-control input-sm" style="width: 100%; display: none;" required>
                                                            	<option value="">- Medicine Category -</option>
																<?php 
																foreach($medicine_cat as $medicine_cat){?>
                                                            	<option value="<?php echo $medicine_cat->cat_id;?>"><?php echo $medicine_cat->med_category_name;?></option>
                                                                <?php }?>
                                                            </select>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                            <span id="particular_item">Paricular Item</span>
                                            <span id="drug_name" style="display: none">Drug Name</span>
                                            </td>
                                            <td>
                                            <span id="showCategories">
                        					<select name="item" id="item" class="form-control input-sm" style="width: 100%;" required>
                        						<option value="">- Paricular Item -</option>
                        					</select>
                                            </span>
                                            
                                            <span id="showDrugListItem" style="display: none;">
                        					<select name="item2" id="item2" class="form-control input-sm" style="width: 100%;" required>
                        						<option value="">- Drug Name List -</option>
                        					</select>
                                            </span>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Qty</td>
                                            <td><input type="text" onkeypress="return isNumberKey(event)" name="qty" id="qty" value="1" placeholder="Qty" class="form-control input-sm" style="width: 100%;" required></td>
                                        </tr>
                                        <tr>
                                        	<td>Rate</td>
                                            <td>
                                            <label id="showRate">
                                            <input type="text" onkeypress="return isNumberKey(event)" name="rate" id="rate" placeholder="rate" class="form-control input-sm" style="width: 100%;" required>
                                            </label>
                                            
                                            <label id="showDrugRate" style="display:none">
                                            <input type="text" onkeypress="return isNumberKey(event)" name="drugrate" id="drugrate" placeholder="rate" class="form-control input-sm" style="width: 100%;" required>
                                            </label>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>Note</td>
                                            <td><textarea name="note" id="note" placeholder="note" class="form-control input-sm" style="width: 100%;"></textarea></td>
                                        </tr>
                                        <script language="javascript">
                                        function getPatientMedication(){
                  											if(!confirm('Are you sure you want to get the Bills?')){
                  												return false;
                  											}else{
                  												
                  												var patientNo,iopNo;
                  												patientNo = document.getElementById("patient_no").value;
                  												iopNo = document.getElementById("opd_no").value;
                  											
                  												var left = (screen.width/2)-(500/2);
                      											var top = (screen.height/2)-(400/2);
                  												var sFeatures="dialogHeight: 420px;  dialogWidth: 600px; dialogTop: " + top + "px; dialogLeft: " + left + "px;";
                  		
                  												window.open("<?php echo base_url()?>app/pos/getPatientMedication/"+patientNo+"/"+iopNo, sFeatures);
                  												return true;
                  											}
                  										}
                                        </script>
                                        <tr>
                                        	<td></td>
                                        	<td>
                                            <!--<span id="buttonMedication" style="display: none;">
                                            <a href="#" class="btn btn-danger" onClick="getPatientMedication()" style="width: 250px;">Get Patient Medication</a>
                                            </span>-->
                                            </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onClick="return addItem()">Add</button>
                                        </div>
                                       
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                           
                            <!-- /.modal -->   
        			<script language="javascript">
					function isNumberKey(evt)
       				{
          				var charCode = (evt.which) ? evt.which : event.keyCode;
         				 if (charCode != 46 && charCode > 31 
            				&& (charCode < 48 || charCode > 57))
             				return false;

          				return true;
       				}
	   
                    function addItem(){
						
						
						if(document.getElementById("bill_category").value == "particular"){
							if(document.getElementById("particular_name").value == ""){
								alert("Please select Paricular Category");
								return false;
							}else if(document.getElementById("bill_name").value == ""){
								alert("Please select Paricular Item");
								return false;
							}else if(document.getElementById("qty").value == ""){
								alert("Please enter a valid Qty");
								return false;
							}else if(document.getElementById("rate").value == ""){
								alert("Please enter a valid Rate");
								return false;
							}
						}else if(document.getElementById("bill_category").value == "medicine"){
							if(document.getElementById("medicine_name").value == ""){
								alert("Please select Medicine Category");
								return false;
							}else if(document.getElementById("drug_name_a").value == ""){
								alert("Please select Drug Name");
								return false;
							}else if(document.getElementById("qty").value == ""){
								alert("Please enter a valid Qty");
								return false;
							}else if(document.getElementById("drug_rate").value == ""){
								alert("Please enter a valid Rate");
								return false;
							}
						}
						
						
						
							
						
						
						var tbl = document.getElementById('myTable').getElementsByTagName('tr');
						var lastRow = tbl.length;	
						
						var category,particular,qty,rate,note,amount;
						
						qty = document.getElementById("qty").value;
						note = document.getElementById("note").value;
						
						if(document.getElementById("bill_category").value == "particular"){
							category = document.getElementById("particular_name").value;
							particular = document.getElementById("bill_name").value;
							rate = document.getElementById("rate").value;
						}else if(document.getElementById("bill_category").value == "medicine"){
							category = document.getElementById("medicine_name").value;
							particular = document.getElementById("drug_name_a").value;
							rate = document.getElementById("drug_rate").value;
						}
						
						amount = eval(qty) * eval(rate);
						amount = amount.toFixed(2); 
			
						
						var a=document.getElementById('myTable').insertRow(-1);
						var b=a.insertCell(0);
						var c=a.insertCell(1);
						var d=a.insertCell(2);
						var e=a.insertCell(3);
						var f=a.insertCell(4);
						var g=a.insertCell(5);
						var h=a.insertCell(6);
						
						b.innerHTML = "<input type=\"hidden\" name=\"isPackage" + lastRow + "\" id=\"isPackage" + lastRow + "\" value=\"0\"><input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc; text-align:right\" name=\"id" + lastRow + "\" id=\"id" + lastRow + "\" value=\""+ lastRow + ". \" readonly=\"true\">";
						c.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc;\" name=\"bill_name" + lastRow + "\" id=\"bill_name" + lastRow + "\" value=\""+ particular + "\" readonly=\"true\">";
						d.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; text-align:right\" name=\"qty" + lastRow + "\" id=\"qty" + lastRow + "\" class=\"" + lastRow + "\" value=\""+ qty + "\" onBlur=\"return validate_input(this.className,'qty')\" onkeyup=\"validate_gross(this.className,'qty')\" onkeypress=\"return isNumberKey(event)\" >";
						e.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; text-align:right\" name=\"rate" + lastRow + "\" id=\"rate" + lastRow + "\" class=\"" + lastRow + "\" value=\""+ rate + "\" onBlur=\"return validate_input(this.className,'rate')\" onkeyup=\"validate_gross(this.className,'rate')\" onkeypress=\"return isNumberKey(event)\">";
						f.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%; background-color:#F9F9f9; border:1px solid #ccc; text-align:right\" name=\"amount" + lastRow + "\" id=\"amount" + lastRow + "\" value=\""+ amount + "\" readonly=\"true\">";
						g.innerHTML = "<input type=\"text\" size = \"7\" style=\"width:98%;\" name=\"note" + lastRow + "\" id=\"note" + lastRow + "\" value=\""+ note + "\">";
						h.innerHTML = "<img src=\"<?php echo base_url()?>public/img/b_drop.png\" onclick=\"deleteRow(this)\" style=\"cursor:pointer;\">";
						
						document.getElementById("hdnrowcnt").value = lastRow;
						
						getGross();
						
						$('#myModal').modal('hide');
						return true;	
					
						
					}
					
					function closeModal(){
						$('#myModal').modal('hide');	
					}
					
					function deleteRow(r){
						var tbl = document.getElementById('myTable').getElementsByTagName('tr');
						var lastRow = tbl.length;	
						
						var i=r.parentNode.parentNode.rowIndex;
						if (lastRow > 2) {
							document.getElementById('myTable').deleteRow(i);
 							document.getElementById('hdnrowcnt').value = lastRow - 2;
 							var lastRow = tbl.length;
							var z;
							for (z=i+1; z<=lastRow; z++){
								
								var id = document.getElementById('id' + z);
								var isPackage = document.getElementById('isPackage' + z);
								var bill_name = document.getElementById('bill_name' + z);
								var qty = document.getElementById('qty' + z);
								var rate = document.getElementById('rate' + z);
								var amount = document.getElementById('amount' + z);
								var note = document.getElementById('note' + z);
								
								var x = z-1;
								
								id.value = x;
								id.id = "id" + x;
								id.name = "id" + x;	
								
								isPackage.id = "isPackage" + x;
								isPackage.name = "isPackage" + x;	
								
								bill_name.id = "bill_name" + x;
								bill_name.name = "bill_name" + x;	
								
								qty.id = "qty" + x;
								qty.name = "qty" + x;	
								qty.className = x;
								
								rate.id = "rate" + x;
								rate.name = "rate" + x;	
								rate.className = x;
								
								amount.id = "amount" + x;
								amount.name = "amount" + x;	
								
								note.id = "note" + x;
								note.name = "note" + x;	
								
								//alert(bill_name.name + " - " + rate.value);
							}
							getGross();
						}else{
 							alert("Minimum of one row per transaction.");
 						}
					}
					
					function getGross()
					{
						var len;
						var nGross = 0;
						var nTotal = 0;
						len = document.getElementById("hdnrowcnt").value;
							for (i=1; i<=len; i++) {
								nGross += parseFloat(document.getElementById("amount" + i).value-0);
							}
						nGross = nGross.toFixed(2); 
						document.getElementById("nGross").value = nGross;
						nTotal = eval(nGross) - eval(document.getElementById("discount").value);
						nTotal = nTotal.toFixed(2); 
						document.getElementById("total_amount").value = nTotal;
					}
					
					function validate_gross(id,nName){
						var qty,rate,amount;
						qty = document.getElementById("qty"+id).value;	
						rate = document.getElementById("rate"+id).value;
						
						amount = eval(qty) * eval(rate);
						amount = amount.toFixed(2); 
						
						document.getElementById("amount"+id).value = amount;
						
						getGross();			
					}
					
					function validate_input(id,name){
						//alert(document.getElementById(name+""+id).value);
						if(document.getElementById(name+""+id).value == "" || eval(document.getElementById(name+""+id).value) <= 0){
							alert("Please enter a valid "+name+".");
							document.getElementById(name+""+id).value = "0";
							validate_gross(id,name)
							getGross();	
							return false;		
						}else{
							validate_gross(id,name)
							getGross();	
						}
					}
					
					function validate_form(){
						
						
						if(document.getElementById("hdnrowcnt").value == "0"){
							alert('Minimum of one row per transaction.');
							return false;
						}else if(document.getElementById("patient").value == ""){
							alert('Please select Patient.');
							return false;
						}else{
							var len;
							len = document.getElementById("hdnrowcnt").value;	
							for (i=1; i<=len; i++) {
							if(eval(document.getElementById("amount"+i).value) <= 0){
								alert("Transaction cannot be saved. There are still some items without amount.");
								return false;
							}else{
								if(confirm('Are you sure you want to save?')){
									return true;
								}else{
									return false;	
								}
							}
						}
						}
						
						
					}
					
					function stopEnterKey(evt) {
        				var evt = (evt) ? evt : ((event) ? event : null);
        				var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        				if ((evt.keyCode == 13) && (node.type == "text")) { return false; }
    				}
    				document.onkeypress = stopEnterKey;
					 </script>
    </body>
</html>