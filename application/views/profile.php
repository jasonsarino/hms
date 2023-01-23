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
                    <h1>My Profile</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">My Profile</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
                 
                 <div class="row">
                 	<div class="col-md-12">
                    <form role="form" method="post" action="<?php echo base_url()?>app/user/edit" onSubmit="return confirm('Are you sure you want to save?');">    
                    	 <div class="box">
                         		
                         		 <div class="box-footer clearfix">
                            	
                                            <a href="<?php echo base_url();?>app/user" class="btn btn-default">Back</a>
                                 
                            </div>
                            
                        	<div class="box-body table-responsive">
                            	
                                
                                		<div class="nav-tabs-custom">
                                        	<ul class="nav nav-tabs">
                                				<li class="active"><a href="#tab_1" data-toggle="tab">Personal Information</a></li>
                                    			<li><a href="#tab_2" data-toggle="tab">Contact Information</a></li>
                                			</ul>
                                            <div class="tab-content">
                                            	<div class="tab-pane active" id="tab_1">
                                                	<table cellpadding="3" cellspacing="3" width="100%">
                                                    <tr>
                                                    	<td colspan="2"></td>

                                                    </tr>
                                                    <tR>
                                                    	<td colspan="2">
                                                        <?php echo validation_errors(); ?>    
                                                        </td>
                                                    </tR>
                                                    <tr>
                                                    	<td width="18%">User ID</td>
                                                        <td width="41%"><input class="form-control input-sm" name="userid" id="userid" type="text" style="width: 100px;" required readonly value="<?php echo $user->user_id;?>"></td>
                                                    	 <td width="41%" rowspan="4" valign="top" align="center">
                        <?php
if(!$user->picture){
	$picture = "no_avatar.gif";	
}else{
	$picture = $user->picture;
}
?>
<img src="<?php echo base_url()?>public/user_picture/<?php echo $picture;?>" class="img-rounded" width="150" height="150">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>             
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%">Title</td>
                                                        <td width="41%">
                                                        	<select name="title" id="title" class="form-control input-sm" style="width: 100px;" required readonly>
                                                            	<option value="">- Title -</option>
																<?php 
																foreach($UserTitles as $UserTitles){
																if($_POST['title'] == $UserTitles->param_id || $user->title == $UserTitles->param_id){
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
                                                    	<td width="18%">Last Name</td>
                                                        <td width="41%">
                                                        <?php echo form_input('lastname',set_value('lastname',$user->lastname),'readonly id="lastname" class="form-control input-sm" placeholder="Last Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>First Name</td>
                                                        <td>
                                                        <?php echo form_input('firstname',set_value('firstname',$user->firstname),'readonly id="firstname" class="form-control input-sm" placeholder="First Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Middle Name</td>
                                                        <td>
                                                        <?php echo form_input('middlename',set_value('middlename',$user->middlename),'readonly id="middlename" class="form-control input-sm" placeholder="Middle Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birthday</td>
                                                        <td>
                                                        <?php echo form_input('birthday',set_value('birthday',$user->birthday),'readonly id="birthday" class="form-control input-sm" placeholder="Birthday" style="width: 150px;" required');?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Birth Place</td>
                                                        <td>
                                                        <?php echo form_input('birthplace',set_value('birthplace',$user->birthplace),'readonly id="birthplace" class="form-control input-sm" placeholder="Birth Place" style="width: 380px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%">Gender</td>
                                                        <td width="41%">
                                                        	<select name="gender" id="gender" class="form-control input-sm" style="width: 100px;" readonly>
                                                            	<option value="">- Gender -</option>
                                                                <?php 
																foreach($gender as $gender){
																if($_POST['gender'] == $gender->param_id || $user->gender == $gender->param_id){
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
                                                    	<td width="18%">Civil Status</td>
                                                        <td width="41%">
                                                        	<select name="civil_status" id="civil_status" class="form-control input-sm" style="width: 140px;" readonly>
                                                            	<option value="">- Civil Status -</option>
                                                                <?php 
																foreach($civilStatus as $civilStatus){
																if($_POST['civil_status'] == $civilStatus->param_id || $user->civil_status == $civilStatus->param_id){
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
                                                    	<td width="18%">Department</td>
                                                        <td width="41%">
                                                        	<select name="department" id="department" class="form-control input-sm" style="width: 200px;" required readonly>
                                                            	<option value="">- Department -</option>
                                                            	<?php 
																foreach($departmentList as $departmentList){
																if($_POST['department'] == $departmentList->department_id || $user->department == $departmentList->department_id){
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
                                                    	<td width="18%">Designation</td>
                                                        <td width="41%">
                                                        	<select name="designation" id="designation" class="form-control input-sm" style="width: 200px;" required readonly>
                                                            	<option value="">- Designation -</option>
                                                                <?php 
																foreach($designationList as $designationList){
																if($_POST['designation'] == $designationList->designation_id || $user->designation == $designationList->designation_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $designationList->designation_id;?>" <?php echo $selected;?>><?php echo $designationList->designation;?></option>
                                                                <?php }?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="18%">User Role</td>
                                                        <td width="41%">
                                                        	<select name="user_role" id="user_role" class="form-control input-sm" style="width: 200px;" required readonly>
                                                            	<option value="">- User Role -</option>
                                                                <?php 
																foreach($userRoleList as $userRoleList){
																if($_POST['user_role'] == $userRoleList->role_id || $user->user_role == $userRoleList->role_id){
																	$selected = "selected='selected'";
																}else{
																	$selected = "";
																}
																?>
                                                            	<option value="<?php echo $userRoleList->role_id;?>" <?php echo $selected;?>><?php echo $userRoleList->role_name;?></option>
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
                                                        <?php echo form_input('noofhouse',set_value('noofhouse',$user->street),'readonly id="noofhouse" class="form-control input-sm" placeholder="No. of House" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Brgy./Subd.</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('brgy',set_value('brgy',$user->subd_brgy),'readonly id="brgy" class="form-control input-sm" placeholder="Brgy./Subd." style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">City/Province</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('province',set_value('province',$user->province),'readonly id="province" class="form-control input-sm" placeholder="City/Province" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Mobile No.</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('mobile',set_value('mobile',$user->mobile_no),'readonly id="mobile" class="form-control input-sm" placeholder="Mobile No" style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Phone No.</td>
                                                        <td width="86%">
                                                        <?php echo form_input('phone',set_value('phone',$user->phone_no),'readonly id="phone" class="form-control input-sm" placeholder="Phone No." style="width: 250px;"');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td width="14%">Email Address</td>
                                                        <td width="86%"> 
                                                        <?php echo form_input('email',set_value('email',$user->email_address),'readonly id="email" class="form-control input-sm" placeholder="Email Address" style="width: 250px;" required');?>
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