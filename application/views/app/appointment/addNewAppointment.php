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
        <link href="<?php echo base_url();?>public/css/timepicker/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        
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
                    <form role="form" method="post" action="<?php echo base_url()?>app/appointment/save" onSubmit="return validate()">    
                    	 <div class="box">
                         		
                         		<div class="box-footer clearfix">
                            	   <button class="btn btn-primary" name="btnSubmit" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                </div>
                            
                        	<div class="box-body table-responsive">
                            	
                                
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

                                                    $readonly = "";
                                                    $title_name = "";
                                                    $lastname_pick = "";
                                                    $firstname_pick = "";
                                                    $middlename_pick = "";
                                                    $gender_pick = "";

                                                    if(isset($this->data['mode']))
                                                    {
                                                        $userID2 =  $patientInfo->patient_no;
                                                        $userID =  $patientInfo->patient_no;
                                                        $readonly = "readonly";
                                                        $mode = "pick";

                                                        $title_name = $patientInfo->title;
                                                        $lastname_pick = $patientInfo->lastname;
                                                        $firstname_pick = $patientInfo->firstname;
                                                        $middlename_pick = $patientInfo->middlename;
                                                        $gender_pick = $patientInfo->gender;
                                                    }
                                                    else
                                                    {
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

                                                        $mode = "new";
                                                    }

                                                    
                                                    ?>
                                                    <input type="hidden" name="userID2" value="<?php echo $userID2;?>">
                                                    <input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>">
                                                    <tr>
                                                        <td width="12%">Patient ID</td>
                                                        <td width="88%"><input class="form-control input-sm" name="patientID" id="patientID" type="text" style="width: 100px;" required readonly value="<?php echo $userID;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="12%">Title <font color="#FF0000">*</font></td>
                                                        <td width="88%">
                                                            <select name="title" id="title" class="form-control input-sm" style="width: 100px;" required <?php echo $readonly;?>>
                                                                <option value="">- Title -</option>
                                                                <?php 
                                                                foreach($UserTitles as $UserTitles){
                                                                if($title_name == $UserTitles->param_id){
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
                                                        <?php echo form_input('lastname',set_value('lastname',$lastname_pick),'id="lastname" '.$readonly.' class="form-control input-sm" placeholder="Last Name" style="width: 250px;" required ');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('firstname',set_value('firstname',$firstname_pick),'id="firstname" '.$readonly.' class="form-control input-sm" placeholder="First Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Middle Name <font color="#FF0000">*</font></td>
                                                        <td>
                                                        <?php echo form_input('middlename',set_value('middlename',$middlename_pick),'id="middlename" '.$readonly.' class="form-control input-sm" placeholder="Middle Name" style="width: 250px;" required');?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="12%">Gender</td>
                                                        <td width="88%">
                                                            <select name="gender" id="gender" class="form-control input-sm" style="width: 100px;" <?php echo $readonly;?>>
                                                                <option value="">- Gender -</option>
                                                                <?php 
                                                                foreach($gender as $gender){
                                                                if($gender_pick == $gender->param_id){
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
                                                    </table>
                                                    <fieldset>
                                                        <legend>
                                                            Appointment Details
                                                        </legend>

                                                        
                                                        <table cellpadding="3" cellspacing="3" width="100%">
                                                        <tr>
                                                            <td width="12%">Date Appointment <font color="#FF0000">*</font></td>
                                                            <td width="88%">
                                                            <?php echo form_input('dateAppointment',set_value('dateAppointment'),'id="dateAppointment" class="form-control input-sm" placeholder="Pick Date" style="width: 200px;" required');?> 
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="12%">Time Appointment <font color="#FF0000">*</font></td>
                                                            <td width="88%">
                                                            <select name="appHour" id="appHour" class="form-controls input-sm" style="width: 100px;">
                                                                <option value="">- HH -</option>
                                                                <?php 
                                                                for($hh=1; $hh<=12; $hh++)
                                                                {
                                                                    if(strlen($hh) == 1)
                                                                    {
                                                                        $hh = "0".$hh;
                                                                    }
                                                                ?>
                                                                <option value="<?php echo $hh;?>"><?php echo $hh;?></option>
                                                                <?php }?>
                                                            </select>

                                                            <select name="appMinutes" id="appMinutes" class="form-controls input-sm" style="width: 100px;">
                                                                <option value="">- MM -</option>
                                                                <?php 
                                                                for($mm=0; $mm<60; $mm++)
                                                                {
                                                                    if(strlen($mm) == 1)
                                                                    {
                                                                        $mm = "0".$mm;
                                                                    }
                                                                ?>
                                                                <option value="<?php echo $mm;?>"><?php echo $mm;?></option>
                                                                <?php }?>
                                                            </select>

                                                            <select name="appAMPM" id="appAMPM" class="form-controls input-sm" style="width: 100px;">
                                                                <option value="">- AM/PM -</option>
                                                                <option value="AM">AM</option>
                                                                <option value="PM">PM</option>
                                                            </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="12%">Consultant Doctor <font color="#FF0000">*</font></td>
                                                            <td width="88%">
                                                            <select name="consultantDoctor" id="consultantDoctor" class="form-control input-sm" style="width: 200px;" required>
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
                                                        <tr>
                                                            <td width="12%">Appointment Reason <font color="#FF0000">*</font></td>
                                                            <td width="88%">
                                                            <textarea name="appointmentReason" id="appointmentReason" placeholder="Appointment Reason" class="form-control input-sm" style="width: 500px;" rows="4"></textarea>
                                                            </td>
                                                        </tr>
                                                        </table>
                                                        
                                                    </fieldset>
<br><br><br><br>
                                        
                                        
                                        
                               
                                
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
        <script src="<?php echo base_url();?>public/timepicker/js/bootstrap-datepicker.js"></script>

        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#dateAppointment').datepicker({
                    //format: "dd/mm/yyyy"
					format: "yyyy-mm-dd"
                });  

                 $(".timepicker").timepicker({
                      showInputs: false
                    });
            
            });
        </script>
             <script type="text/javascript">
                  //Timepicker
                 
                 </script>
        <!-- END BDAY -->
        
    </body>
</html>