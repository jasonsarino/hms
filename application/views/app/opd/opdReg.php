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
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>OPD Registration</h1>
                   <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Patient Management</a></li>
                        <li><a href="<?php echo base_url()?>app/opd/index">OPD</a></li>
                        <li class="active">OPD Registration</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
                 
                 <div class="row">
                    <div class="col-md-12">
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
									<img src="<?php echo base_url();?>public/patient_picture/<?php echo $picture;?>" class="img-rounded" width="110" height="110">
                                    </td>
                                    <td width="85%">
                                    	<table width="100%">
                                        <tr>
                                        	<td><u>Patient No.</u></td>
                                            <td width="13%"><u>Age</u></td>
                                            <td width="63%"><u>Address</u></td>
                                        </tr>
                                        <tr>
                                        	<td><?php echo $patientInfo->patient_no?></td>
                                            <td><?php echo $patientInfo->age?></td>
                                            <td><?php echo $patientInfo->address?></td>
                                        </tr>
                                        <tr>
                                			<td width="24%"><u>Patient Name</u></td>
                                            <td><u>Gender</u></td>
                                            <td><u>Civil Status</u></td>
                                		</tr>
                                        <tr>
                                        	<td width="24%"><?php echo $patientInfo->name?></td>
                                            <td><?php echo $patientInfo->gender?></td>
                                            <td><?php echo $patientInfo->civil_status?></td>
                                        </tr>
                                        </table>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="box-footer clearfix">
                                	
                            </div>
                        </div>
                    </div>
                 </div>
                 
                 
                 <form method="post" action="<?php echo base_url();?>app/opd/save_opd" onSubmit="return confirm('Are you sure you want to save?');">
                 <input type="hidden" name="patient_no" value="<?php echo $patientInfo->patient_no?>">
                 <div class="row">
                 	
                     <div class="col-md-12">
                    	 <div class="box">
                         	 <div class="box-header">
                             	<div class="box-footer clearfix">
                            	
                                            <a href="<?php echo base_url();?>app/patient" class="btn btn-default">Cancel</a>
                                            <button class="btn btn-primary" name="btnSubmit" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                 
                            	</div>
                             </div>
                        	<div class="box-body table-responsive">
                            		
                                    
                            						<?php
													$userID = $lastOPDNo->opdNo;
													$userID2 = $lastOPDNo->opdNo;
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
													?>
                                 <?php echo validation_errors();?>                  
                                <div class="nav-tabs-custom">
                                	<ul class="nav nav-tabs">
                                		<li class="active"><a href="#tab_1" data-toggle="tab">General Information</a></li>
                                    	<li><a href="#tab_3" data-toggle="tab">Vital Parameters</a></li>
                                        <li><a href="#tab_2" data-toggle="tab">Patient History</a></li>
                                        
                                	</ul>
                                    <input type="hidden" name="userID2" value="<?php echo $userID2?>">
                                    <div class="tab-content">
                                    	<div class="tab-pane active" id="tab_1">
                                        	<table width="100%" cellpadding="3" cellspacing="3">
                                <tr>
                                	<td width="21%">OPD No.</td>
                                    <td width="79%"><input class="form-control input-sm" name="opdNo" id="opdNo" type="text" style="width: 100px;" required readonly value="<?php echo "OP-".$userID;?>"></td>
                                </tr>
                                <tr>
                                	<td>Referal Doctor</td>
                                    <td>
                                    						<select name="refdoctor" id="refdoctor" class="form-control input-sm" style="width: 200px;">
                                                            	<option value="">- Referal Doctor -</option>
                                                            	<?php 
																foreach($doctorList as $doctorList){
																if($_POST['refdoctor'] == $doctorList->user_id){
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
                                	<td>Department</td>
                                    <td>
                          						<select name="department" id="department" class="form-control input-sm" style="width: 200px;" required>
                                      	<option value="">- Department -</option>
                                      	<?php 
        																foreach($departmentList as $departmentList){
        																if($_POST['department'] == $departmentList->department_id){
        																	$selected = "selected='selected'";
        																}else{
        																	$selected = "";
        																}
        																?>
                                      	<option value="<?php echo $departmentList->department_id;?>" <?php echo $selected;?>><?php echo $departmentList->dept_name;?></option>
                                          <?php }?>
                                      </select>
                                    </td>
                                </tr>
                                <tr>
                                	<td>Consultant Doctor</td>
                                    <td>
                          						<select name="doctor" id="doctor" class="form-control input-sm" style="width: 200px;" required>
                                      	<option value="">- Consultant Doctor -</option>
                                      	<?php 
        																foreach($doctorList2 as $doctorList2){
        																if($_POST['doctor'] == $doctorList2->user_id){
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
                                <input type="hidden" name="diagnosis">
                                <input type="hidden" name="complaints">
                                <!--<tr>
                                	<td valign="top">Provisional Diagnosis</td>
                                	<td><textarea name="diagnosis" id="diagnosis" class="form-control input-sm" style="width: 60%;" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Complaints</td>
                                	<td><textarea name="complaints" id="complaints" class="form-control input-sm" style="width: 60%;" rows="3"></textarea></td>
                                </tr>-->
                                
                                </table>
                                        </div>
                                        <div class="tab-pane" id="tab_2">
                                        <table width="100%" cellpadding="3" cellspacing="3">
                                        <tr>
                                	<td width="21%" valign="top">Allergies</td>
                                	<td width="79%"><textarea name="allergies" id="allergies" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->allergies : "";?></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Warnings</td>
                                	<td><textarea name="warnings" id="warnings" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->warnings : "";?></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Social History</td>
                                	<td><textarea name="social_history" id="social_history" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->social_history : "";?></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Family History</td>
                                	<td><textarea name="family_history" id="family_history" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->family_history : "";?></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Personal History</td>
                                	<td><textarea name="personal_history" id="personal_history" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->personal_history : "";?></textarea></td>
                                </tr>
                                <tr>
                                	<td valign="top">Past Medical History</td>
                                	<td><textarea name="past_medical_history" id="past_medical_history" class="form-control input-sm" style="width: 60%;" rows="3"><?php echo ($patientHistory) ? $patientHistory->past_medical_history : "";?></textarea></td>
                                </tr>
                                        </table>
                                        </div>
                                        <div class="tab-pane" id="tab_3">
                                        <table width="100%" cellpadding="3" cellspacing="3">
                                        <tr>
                                        	<td width="12%">Pulse rate</td>
                                            <Td width="28%"><input type="text" name="pulse_rate" id="pulse_rate" style="width: 100px;">&nbsp;&nbsp;/min</Td>
                                        	<td width="12%">BP</td>
                                            <Td width="48%"><input type="text" name="bp" id="bp"  style="width: 100px;">&nbsp;&nbsp;mm of Hg</Td>
                                        </tr>
                                        <tr>
                                        	<td>Temperature</td>
                                            <Td><input type="text" name="temperature" id="temperature" style="width: 100px;">&nbsp;&nbsp;C</Td>
                                        	<td>Respiration</td>
                                            <Td><input type="text" name="respiration" id="respiration"  style="width: 100px;">&nbsp;&nbsp;/min</Td>
                                        </tr>
                                        <tr>
                                        	<td>Height</td>
                                            <Td><input type="text" name="height" id="height"  style="width: 100px;">&nbsp;&nbsp;Cm</Td>
                                        	<td>Weight</td>
                                            <Td><input type="text" name="weight" id="weight"  style="width: 100px;">&nbsp;&nbsp;Kg</Td>
                                        </tr>
                                        
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            	
                                 <input type="hidden" name="userID2" value="<?php echo $userID2;?>">
                                 
                                     
                                
                           </div>
                            <div class="box-footer clearfix">
                                	
                            </div>
                        </div>
                    </div>
                 </div>
                 </form>
                 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
  
        
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
        
        
    </body>
</html>