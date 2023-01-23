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
    </head>
    <body class="skin-blue" >
        <!-- header logo: style can be found in header.less -->
        <?php require_once(APPPATH.'views/include/header.php');?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            
            <?php require_once(APPPATH.'views/include/sidebar.php');?>
 <script language="javascript">
                 function validate(){
						if(document.getElementById("email").value == ""){
							alert('You did not enter a valid Email Address');
							return false;
						}else{
							if(confirm('Are you sure you want to save?')){
								return true;
							}else{
								return false;
							}
						}
				 }
                 </script>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Modify Patient</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Patient Management</a></li>
                        <li class="active">Modify Patient</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
                 
                 <div class="row">
                 	<div class="col-md-12">
                    <form role="form" method="post" action="<?php echo base_url()?>app/patient/edit" onSubmit="return validate()">    
                    	 <input type="hidden" name="id" value="<?php echo $patientInfo->patient_no;?>">
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
                                                <li><a href="#tab_4" data-toggle="tab">Other Information</a></li>
                                                <li><a href="#tab_3" data-toggle="tab">Profile Picture</a></li>
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
                                                    <tr>
                                                    	<td width="12%">Patient ID</td>
                                                        <td width="88%"><input class="form-control input-sm" name="patientID" id="patientID" type="text" style="width: 100px;" required readonly value="<?php echo $patientInfo->patient_no;?>"></td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Title <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                        	<select name="title" id="title" class="form-control input-sm" style="width: 100px;" required>
                                                            	<option value="">- Title -</option>
																<?php 
																foreach($UserTitles as $UserTitles){
																if($_POST['title'] == $UserTitles->param_id || $patientInfo->title == $UserTitles->param_id){
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
                                                    	<td width="12%">Last Name <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                        <?php echo form_input('lastname',set_value('lastname',$patientInfo->lastname),'id="lastname" class="form-control input-sm" placeholder="Last Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>First Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('firstname',set_value('firstname',$patientInfo->firstname),'id="firstname" class="form-control input-sm" placeholder="First Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Middle Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('middlename',set_value('middlename',$patientInfo->middlename),'id="middlename" class="form-control input-sm" placeholder="Middle Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birthday <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <input class="form-control input-sm" name="birthday" id="birthday" type="text" value="<?php echo $patientInfo->birthday?>" placeholder="From Date" style="width:150px;" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birth Place</td>
                                                        <td>
                                                        <?php echo form_input('birthplace',set_value('birthplace',$patientInfo->birthplace),'id="birthplace" class="form-control input-sm" placeholder="Birth Place" style="width: 380px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="12%">Gender</td>
                                                        <td width="88%">
                                                        	<select name="gender" id="gender" class="form-control input-sm" style="width: 100px;">
                                                            	<option value="">- Gender -</option>
                                                                <?php 
																foreach($gender as $gender){
																if($_POST['gender'] == $gender->param_id || $patientInfo->gender == $gender->param_id){
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
																if($_POST['civil_status'] == $civilStatus->param_id || $patientInfo->civil_status == $civilStatus->param_id){
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
																if($_POST['religion'] == $religion->param_id || $patientInfo->religion == $religion->param_id){
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
                                                    	<td width="12%">Blood Group <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                        	<select name="bloodGroup" id="bloodGroup" class="form-control input-sm" style="width: 125px;" required>
                                                            	<option value="">- Blood Group -</option>
                                                            	<?php 
																foreach($bloodGroup as $bloodGroup){
																if($_POST['bloodGroup'] == $bloodGroup->param_id || $patientInfo->blood_group == $bloodGroup->param_id){
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
                                                    	<td width="14%">No. of House</td>
                                                        <td width="86%">
                                                        <?php echo form_input('noofhouse',set_value('noofhouse',$patientInfo->street),'id="noofhouse" class="form-control input-sm" placeholder="No. of House" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Brgy./Subd.</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('brgy',set_value('brgy',$patientInfo->subd_brgy),'id="brgy" class="form-control input-sm" placeholder="Brgy./Subd." style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">City/Province</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('province',set_value('province',$patientInfo->province),'id="province" class="form-control input-sm" placeholder="City/Province" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No (Office)</td>
                                                        <td width="86%">
                                                        <?php echo form_input('phone_office',set_value('phone_office',$patientInfo->phone_no_office),'id="phone_office" class="form-control input-sm" placeholder="Phone No (Office)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No. (Home)</td>
                                                        <td width="86%">
                                                        <?php echo form_input('phone',set_value('phone',$patientInfo->phone_no),'id="phone" class="form-control input-sm" placeholder="Phone No (Home)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No (Mobile)</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('mobile',set_value('mobile',$patientInfo->mobile_no),'id="mobile" class="form-control input-sm" placeholder="Phone No (Mobile)" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    	<td width="14%">Email Address <font color="#FF0000">*</font></td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('email',set_value('email',$patientInfo->email_address),'id="email" class="form-control input-sm" placeholder="Email Address" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                
                                                <div class="tab-pane" id="tab_4">
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
																if($_POST['insurance_comp'] == $insuranceCompList->in_com_id || $patientInfo->Insurance_comp == $insuranceCompList->in_com_id){
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
                                                        <?php echo form_input('insurance_id',set_value('insurance_id',$patientInfo->insurance_no),'id="insurance_id" class="form-control input-sm" placeholder="Insurance ID Number" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%" valign="top">Patient's Identifiers</td>
                                                        <td width="82%">
                                                        <textarea class="form-control input-sm" style="width: 250px;" name="patient_iden" id="patient_iden"><?php echo $patientInfo->id_identifiers;?></textarea>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                
                                                <div class="tab-pane" id="tab_3">
                                                
                                                	<iframe width="100%" frameborder="0" height="400" src="<?php echo base_url()?>app/patient/upload_picture/<?php echo $patientInfo->patient_no?>"></iframe>
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