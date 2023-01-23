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
                    <h1>Patient Registration</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Patient Management</a></li>
                        <li class="active">Patient Registration</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
                 <script language="javascript">
                 function validate(){
						//if(document.getElementById("email").value == ""){
						//	alert('You did not enter a valid Email Address');
						//	return false;
						//}else{
						//	if(confirm('Are you sure you want to save?')){
						//		return true;
						//	}else{
						//		return false;
						//	}
						//}
                        
                            if(confirm('Are you sure you want to save?')){
                                return true;
                            }else{
                                return false;
                            }
				 }
                 </script>
                 <div class="row">
                 	<div class="col-md-12">
                    <form role="form" method="post" action="<?php echo base_url()?>app/patient/save" onSubmit="return validate()">    
                    	 <div class="box">
                         		
                         		 <div class="box-footer clearfix">
                            	
                                            <a href="<?php echo base_url();?>app/patient" class="btn btn-default">Cancel</a>
                                            <button class="btn btn-primary" name="btnSubmit" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                 
                            </div>
                            
                        	<div class="box-body table-responsive">
                            	
                                
                                		<div class="nav-tabs-custom">
                                        	<ul class="nav nav-tabs">
                                				<li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
                                    			<li><a href="#tab_2" data-toggle="tab">Contact Information</a></li>
                                                <li><a href="#tab_3" data-toggle="tab">Other Information</a></li>
                                			</ul>
                                            <div class="tab-content">
                                            	<div class="tab-pane active" id="tab_1">
                                                	<table cellpadding="3" cellspacing="3" width="100%">
                                                    <tr>
                                                    	<td colspan="2">Required fields = <font color="#FF0000">*</font></td>
                                                    </tr>
                                                    <tR>
                                                    	<td colspan="2">
                                                        <?php echo validation_errors(); ?>    
                                                        </td>
                                                    </tR>
                                                    <?php
													$userID = $lastPatientID->patient_no;
													$userID2 = $lastPatientID->patient_no;
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
                                                    <input type="hidden" name="userID2" value="<?php echo $userID2;?>">
                                                    <tr>
                                                    	<td width="12%">Patient ID</td>
                                                        <td width="88%"><input class="form-control input-sm" name="patientID" id="patientID" type="text" style="width: 100px;" required readonly value="<?php echo $userID;?>"></td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Title <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                        	<select name="title" id="title" class="form-control input-sm" style="width: 100px;" required>
                                                            	<option value="">- Title -</option>
																<?php 
																foreach($UserTitles as $UserTitles){
																if($_POST['title'] == $UserTitles->param_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $UserTitles->param_id;?>" <?php echo $selected;?>><?php echo $UserTitles->cValue;?></option>
                                                                <?php }?>
                                                            </select>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%"><?php echo $this->lang->line("lastname")?> <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                        <?php echo form_input('lastname',set_value('lastname'),'id="lastname" class="form-control input-sm" placeholder="Last Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>First Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('firstname',set_value('firstname'),'id="firstname" class="form-control input-sm" placeholder="First Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Middle Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('middlename',set_value('middlename'),'id="middlename" class="form-control input-sm" placeholder="Middle Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Father's Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('fathers_name',set_value('fathers_name'),'id="fathers_name" class="form-control input-sm" placeholder="Fathers Name" style="width: 250px;" required');?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birthday <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('birthday',set_value('birthday'),'id="birthday" class="form-control input-sm" placeholder="Birthday" style="width: 150px;" required');?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birth Place</td>
                                                        <td>
                                                        <?php echo form_input('birthplace',set_value('birthplace'),'id="birthplace" class="form-control input-sm" placeholder="Birth Place" style="width: 380px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Gender</td>
                                                        <td width="88%">
                                                        	<select name="gender" id="gender" class="form-control input-sm" style="width: 100px;">
                                                            	<option value="">- Gender -</option>
                                                                <?php 
																foreach($gender as $gender){
																if($_POST['gender'] == $gender->param_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $gender->param_id;?>" <?php echo $selected;?>><?php echo $gender->cValue;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Civil Status</td>
                                                        <td width="88%">
                                                        	<select name="civil_status" id="civil_status" class="form-control input-sm" style="width: 140px;">
                                                            	<option value="">- Civil Status -</option>
                                                                <?php 
																foreach($civilStatus as $civilStatus){
																if($_POST['civil_status'] == $civilStatus->param_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $civilStatus->param_id;?>" <?php echo $selected;?>><?php echo $civilStatus->cValue;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Religion</td>
                                                        <td width="88%">
                                                        	<select name="religion" id="religion" class="form-control input-sm" style="width: 140px;">
                                                            	<option value="">- Religion -</option>
                                                                <?php 
																foreach($religionList as $religion){
																if($_POST['religion'] == $religion->param_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $religion->param_id;?>" <?php echo $selected;?>><?php echo $religion->cValue;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Blood Group </td>
                                                        <td width="88%">
                                                        	<select name="bloodGroup" id="bloodGroup" class="form-control input-sm" style="width: 125px;">
                                                            	<option value="">- Blood Group -</option>
                                                            	<?php 
																foreach($bloodGroup as $bloodGroup){
																if($_POST['bloodGroup'] == $bloodGroup->param_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $bloodGroup->param_id;?>" <?php echo $selected;?>><?php echo $bloodGroup->cValue;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab_2">
                                                	<table cellpadding="3" cellspacing="3" width="100%">
                                                    <tr>
                                                    	<td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Address1</td>
                                                        <td width="86%">
                                                        <?php echo form_input('noofhouse',set_value('noofhouse'),'id="noofhouse" class="form-control input-sm" placeholder="Address1" style="width: 250px;"');?>
                                                        <?php echo form_hidden('brgy',set_value('brgy'),'id="brgy" class="form-control input-sm" placeholder="Brgy./Subd." style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Address2</td>
                                                        <td width="86%">
                                                        <?php echo form_input('address2',set_value('address2'),'id="address2" class="form-control input-sm" placeholder="Address2" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">City</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('province',set_value('province'),'id="province" class="form-control input-sm" placeholder="City" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No (Office)</td>
                                                        <td width="86%">
                                                        <?php echo form_input('phone_office',set_value('phone_office'),'id="phone_office" class="form-control input-sm" placeholder="Phone No (Office)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No (Home)</td>
                                                        <td width="86%">
                                                        <?php echo form_input('phone',set_value('phone'),'id="phone" class="form-control input-sm" placeholder="Phone No (Work)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No (Mobile)</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('mobile',set_value('mobile'),'id="mobile" class="form-control input-sm" placeholder="Phone No (Mobile)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    	<td width="14%">Email Address</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('email',set_value('email'),'id="email" class="form-control input-sm" placeholder="Email Address" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="tab_3">
                                               		<table cellpadding="3" cellspacing="3" width="100%">
                                                    <tr>
                                                    	<td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%">Insurance Company</td>
                                                        <td width="82%">
                                                        <select name="insurance_comp" id="insurance_comp" class="form-control input-sm" style="width: 250px;">
                                                            	<option value="">- None -</option>
                                                            	<?php 
																foreach($insuranceCompList as $insuranceCompList){
																if($_POST['insurance_comp'] == $insuranceCompList->in_com_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $insuranceCompList->in_com_id;?>" <?php echo $selected;?>><?php echo $insuranceCompList->company_name;?></option>
                                                                <?php }?>
                                                            </select>
                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%">Insurance ID Number</td>
                                                        <td width="82%">
                                                        <?php echo form_input('insurance_id',set_value('insurance_id'),'id="insurance_id" class="form-control input-sm" placeholder="Insurance ID Number" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%" valign="top">Patient's Identifiers</td>
                                                        <td width="82%">
                                                        <textarea class="form-control input-sm" style="width: 250px;" name="patient_iden" id="patient_iden"></textarea>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                               
                                
                            </div>
                            
                        </div>
                    </div>
                     </form>
                 </div>
                 
                 
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
                
                $('#birthday').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  
            
            });
        </script>
        <!-- END BDAY -->
        
    </body>
</html>