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
        
          <!----------BOOTSTRAP DATEPICKER----------------------------->
    	<link rel="stylesheet" href="<?php echo base_url();?>public/datepicker/css/datepicker.css">
		<!---------------------------------------------------------->
        
        <!------------ bootstrap timepicker ---------------------------------->
    	<link href="<?php echo base_url();?>public/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    	<!-------------------------------------------------------------------->
        
        
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
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php if($this->session->userdata('emr_viewing') == "opd_emr_viewing"){?>	
                   <h1>OPD Patient Information</h1>
                   <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">EMR sheet</a></li>
                        <li><a href="<?php echo base_url()?>app/emr/opd">Out-Patient Master</a></li>
                    </ol>
                    <?php }else{?>
                    <h1>IPD Patient Information</h1>
                   <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Doctor Module</a></li>
                        <li><a href="<?php echo base_url()?>app/doctor/opd">Out-Patient Master</a></li>
                        <li class="active">OPD Patient Information</li>
                    </ol>
                    <?php }?>
                </section>

                <!-- Main content -->
                <section class="content">
                 
        
                 
                 
               
                 <div class="row">
                 	
                     <div class="col-md-3">
                    	 <div class="box">
                         	 <div class="box-header"></div>
                        	<div class="box-body table-responsive no-padding">
                            	<table width="100%" cellpadding="3" cellspacing="3">
                                <tr>
                                	<td width="15%" valign="top" align="center">
                                    <?php
									if(!$patientInfo->picture){
										$picture = "avatar.png";	
									}else{
										$picture = $patientInfo->picture;
									}
									?>
									<img src="<?php echo base_url();?>public/patient_picture/<?php echo $picture;?>" class="img-rounded" width="86" height="81">
                                    </td>
                                    <td>
                                    	<table width="100%">
                                        <tr>
                                        	<td><u>Patient No.</u></td>
                                        </tr>
                                        <tr>
                                			<td><?php echo $patientInfo->patient_no?></td>
                                		</tr>
                                        <tr>
                                        	<td><u>Patient Name</u></td>
                                        </tr>
                                        <tr>
                                			<td><?php echo $patientInfo->name?></td>
                                		</tr>
                                        </table>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="box-footer clearfix">
                            	<div style="margin-top: 15px;">
                                 <ul class="nav nav-pills nav-stacked">
                                 	<li><a href="<?php echo base_url()?>app/ipd/view/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> General Information</a></li>
                                
                                 	<li><a href="<?php echo base_url()?>app/ipd/diagnosis/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Diagnosis</a></li>
                                 	
                                 	<li><a href="<?php echo base_url()?>app/ipd/medication/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Medication</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/complain/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Complain</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/progress_note/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Progress Note</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/intake_output/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Intake/Output Record</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/nurse_progress_note/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Nurse Progress Note</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/vitalSign/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Vital Sign</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/room_transfer/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> IP Room Transfer</a></li>
                                    
                                    <li><a href="<?php echo base_url()?>app/ipd/bed_side_procedure/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Bed Side Procedure</a></li>
                                    <li class="active"><a href="<?php echo base_url()?>app/ipd/operation_theater/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Operation Theater</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/patientHistory/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Patient History</a></li>
                                 	<li><a href="<?php echo base_url()?>app/ipd/laboratory/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Laboratory</a></li>
                                    <li><a href="<?php echo base_url()?>app/ipd/discharge_summary/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Discharge Summary</a></li>
                                    <!--<li><a href="<?php echo base_url()?>app/opd/billing/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>"> Admission Billing</a></li>-->
                                 </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                     <div class="col-md-9"> 
                                <div class="nav-tabs-custom">
                                	<ul class="nav nav-tabs">
                                		<li class="active"><a href="#tab_1" data-toggle="tab">Operation Theater</a></li>
                                        
                                	</ul>
                                    <div class="tab-content">
                                    	<div class="tab-pane active" id="tab_1">
                                        	<?php
											if(is_object($getOperationTheater)){
												$dDate_from = $getOperationTheater->dDate_from;
												$dTime_from = $getOperationTheater->dTime_from;
												$dDate_to = $getOperationTheater->dDate_to;
												$dTime_to = $getOperationTheater->dTime_to;
												$operation_name = $getOperationTheater->operation_name;
												$diagnosis = $getOperationTheater->diagnosis;
												$name_of_surgeon = $getOperationTheater->name_of_surgeon;
												$name_of_anesthesia = $getOperationTheater->name_of_anesthesia;
												$assistant_name1 = $getOperationTheater->assistant_name1;
												$assistant_name2 = $getOperationTheater->assistant_name2;
												$assistant_name3 = $getOperationTheater->assistant_name3;
												$assistant_name4 = $getOperationTheater->assistant_name4;
												$operation_procedure = $getOperationTheater->operation_procedure;
												$notes = $getOperationTheater->notes;
											}else{
												$dDate_from = "";
												$dTime_from = "";
												$dDate_to = "";
												$dTime_to = "";
												$operation_name = "";
												$diagnosis = "";
												$name_of_surgeon = "";
												$name_of_anesthesia = "";
												$assistant_name1 = "";
												$assistant_name2 = "";
												$assistant_name3 = "";
												$assistant_name4 = "";
												$operation_procedure = "";
												$notes = "";
											}
											?>
                                            <form method="post" action="<?php echo base_url()?>app/ipd/operation_theater" onSubmit="return confirm('Are you sure you want to save?');">
                                            <input type="hidden" name="opd_no" value="<?php echo $getOPDPatient->IO_ID?>">
                                            <input type="hidden" name="patient_no" value="<?php echo $getOPDPatient->patient_no?>">
                                           
                                           
                                            
<script language="javascript">
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

function getData(category_id)
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
	
    document.getElementById("showroom_name").innerHTML=xmlhttp2.responseText;
    }
  }
  var supp;

xmlhttp2.open("GET","<?php echo base_url();?>general/getRoomName/"+category_id,true);
xmlhttp2.send();

}

function showBedLists(category_id){
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
  if (xmlhttp3.readyState==4 && xmlhttp2.status==200)
    {
	
    document.getElementById("bedname").innerHTML=xmlhttp3.responseText;
    }
  }
  var supp;

xmlhttp3.open("GET","<?php echo base_url();?>general/getBedList/"+category_id,true);
xmlhttp3.send();
}
</script>

                                            <?php echo $message;?>
                                           <table class="table table-hover">
                                           <tbody>
                                           	<tr>
                                            	<td>From Date & Time</td>
                                                <td><input type="text" value="<?php echo $dDate_from;?>" name="dDate_from" id="dDate_from" placeholder="Date" class="form-control input-sm" style="width: 100%;" required>
                                                <div class="bootstrap-timepicker">
                                        	<div class="form-group">
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control timepicker" value="<?php echo $dTime_from;?>"  name="dTime_from" id="dTime_from"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        	</div><!-- /.form group -->
                                    		</div>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>To Date & Time</td>
                                                <td><input type="text" name="dDate_to" id="dDate_to" value="<?php echo $dDate_to;?>" placeholder="Date" class="form-control input-sm" style="width: 100%;" required>
                                                <div class="bootstrap-timepicker">
                                        	<div class="form-group">
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control timepicker" name="dTime_to" id="dTime_to" value="<?php echo $dTime_to;?>"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        	</div><!-- /.form group -->
                                    		</div>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>Operation Name</td>
                                                <td>
                                                <select name="operation_name" id="operation_name" class="form-control input-sm" style="width: 250px;" required>
                                                            	<option value="">-Operation Name -</option>
                                                            	<?php 
																foreach($surgery_list as $surgery_list){
																if($operation_name == $surgery_list->surgery_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $surgery_list->surgery_id;?>" <?php echo $selected;?>><?php echo $surgery_list->surgery_name;?></option>
                                                                <?php }?>
                                                            </select></td>
                                            </tr>
                                           
                                			<tr>
                                            	<td>Name of Surgeon</td>
                                                <td>
                                                <select name="surgeon" id="surgeon" class="form-control input-sm" style="width: 250px;" required>
                                                            	<option value="">- Name of Surgeon -</option>
                                                            	<?php 
																foreach($doctorList as $doctorList){
																if($name_of_surgeon == $doctorList->user_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $doctorList->user_id;?>" <?php echo $selected;?>><?php echo $doctorList->name;?></option>
                                                                <?php }?>
                                                            </select>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>Name of Anesthesia</td>
                                                <td>
                                                <select name="anesthesia" id="anesthesia" class="form-control input-sm" style="width: 250px;" required>
                                                            	<option value="">- Name of Anesthesia -</option>
                                                            	<?php 
																foreach($doctorList2 as $doctorList2){
																if($name_of_anesthesia == $doctorList2->user_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $doctorList2->user_id;?>" <?php echo $selected;?>><?php echo $doctorList2->name;?></option>
                                                                <?php }?>
                                                            </select>
                                                </td>
                                            </tr>
                                            <!--<tr>
                                            	<td>Room Type</td>
                                                <td>
                                                <select name="roomType" id="roomType" class="form-control input-sm" style="width: 250px;" onChange="getData(this.value)">
                                                    	<option value="">All Room Type</option>
                                                        <?php foreach($room_category as $room_category){?>
                                                        <option value="<?php echo $room_category->category_id?>"><?php echo $room_category->category_name?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                				<td width="28%" valign="top">Room Name</td>
                                				<td width="72%">
                                                			<span id="showroom_name">
                        									<select name="room_name2" id="room_name2" class="form-control input-sm" style="width: 250px;" required>
                        										<option value="">- Room Name -</option>
                        									</select>
                                            				</span>
                                                </td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Bed No./Name</td>
                                				<td width="72%">
                                                			<span id="bedname">
                        									<select name="bed2" id="bed2" class="form-control input-sm" style="width: 250px;" required>
                        										<option value="">- Bed No./Name -</option>
                        									</select>
                                            				</span>
                                                </td>
                                			</tr>-->
                                            <tr>
                                				<td width="28%" valign="top">Assistant Name 1</td>
                                				<td width="72%"><input type="text" name="assistant1" id="assistant1" placeholder="Assistant Name 1" value="<?php echo $assistant_name1;?>" class="form-control input-sm" style="width: 250px;"> </td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Assistant Name 2</td>
                                				<td width="72%"><input type="text" name="assistant2" id="assistant2" placeholder="Assistant Name 2" value="<?php echo $assistant_name2;?>" class="form-control input-sm" style="width: 250px;"> </td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Assistant Name 3</td>
                                				<td width="72%"><input type="text" name="assistant3" id="assistant3" placeholder="Assistant Name 3" value="<?php echo $assistant_name3;?>" class="form-control input-sm" style="width: 250px;"> </td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Assistant Name 4</td>
                                				<td width="72%"><input type="text" name="assistant4" id="assistant4" placeholder="Assistant Name 4" value="<?php echo $assistant_name4;?>" class="form-control input-sm" style="width: 250px;"> </td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Diagnosis</td>
                                				<td width="72%"><textarea name="diagnosis" placeholder="Diagnosis" id="diagnosis" class="form-control input-sm" style="width: 100%;" rows="4"><?php echo $diagnosis;?></textarea></td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Operation Procedure</td>
                                				<td width="72%"><textarea name="operation_procedure" value="<?php echo $operation_procedure;?>" placeholder="Operation Procedure" id="operation_procedure" class="form-control input-sm" style="width: 100%;" rows="4"><?php echo $operation_procedure?></textarea></td>
                                			</tr>
                                            <tr>
                                				<td width="28%" valign="top">Notes</td>
                                				<td width="72%"><textarea name="notes" placeholder="Notes" id="notes" class="form-control input-sm" style="width: 100%;" rows="4"><?php echo $notes;?></textarea></td>
                                			</tr>
                                			<tr>
                                           		<td colspan="2">
                                                <?php if($this->session->userdata('emr_viewing') == ""){?>		
                                                <?php if($getOPDPatient->nStatus == "Pending"){?>
                                                <button class="btn btn-primary" name="btnSave" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                                <?php }}?>
                                                <a href="<?php echo base_url()?>app/ipd_print/print_operation_theater/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>" class="btn btn-default" target="_blank"><i class="fa fa-print"></i> Print</a>
                                                <a href="<?php echo base_url()?>app/ipd_print/pdf_operation_theater/<?php echo $getOPDPatient->IO_ID;?>/<?php echo $getOPDPatient->patient_no;?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> PDF</a>
                                                </td>
                                           </tr>
                                           </tbody>
                                           </table>
                                           </form>
                                            
                                            <br><br><br><br><br><br><br>
                                            <br><br><br><br><br><br><br>
                                            <br><br><br><br><br><br><br>
                                        </div>
                           			</div>
                            <div class="box-footer clearfix">
                                	
                            </div>
                        </div>
                    </div>
                 </div>
                 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
  
        
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>public/timepicker/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- bootstrap time picker -->
        <script src="<?php echo base_url();?>public/timepicker/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>public/timepicker/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(function() {

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        
         <!-- DATE -->
         <script src="<?php echo base_url();?>public/datepicker/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url();?>public/datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#dDate_from').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  
				$('#dDate_to').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  
            
            });
        </script>
        <!-- END DATE -->
        
        
    </body>
</html>