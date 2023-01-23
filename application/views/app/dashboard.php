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
                    <h1>Dashboard</h1>
                    <!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>-->
                </section>

                <section class="content">
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                    
                        <!--Start of Patient Visited-->
                        <div class="box box-primary" id="loading-example">
                            <div class="box-header">
                                <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        
                                 </div>
                                 <i class="fa fa-male"></i>
                                <h3 class="box-title">Today's Patient Appointments</h3>
                            </div>
                            <div class="box-body no-padding">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Patient No.</th>
                                            <th>Patient Name</th>
                                            <th>Appointment Date</th>
                                            <th>Consultant Doctor</th>
                                            <th>Entry Date</th>
                                            <th>Rremarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($getTodayAppointment as $getTodayAppointment){?>
                                        <tr>
                                            <th><a href="patient/view/<?php echo $getTodayAppointment->patient_no?>"><?php echo $getTodayAppointment->patient_no?></a></th>
                                            <th><?php echo $getTodayAppointment->name?></th>
                                            <th><?php echo date("M d, Y", strtotime($getTodayAppointment->appointmentDate))." ".$getTodayAppointment->appHour.":".$getTodayAppointment->appMinutes." ".$getTodayAppointment->appAMPM;?></th>
                                            <th><?php echo $getTodayAppointment->consultantDoctor?></th>
                                            <th><?php echo date("M d, Y", strtotime($getTodayAppointment->dateEntry));?></th>
                                            <th><?php echo $getTodayAppointment->appointmentReason?></th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                             <div class="box-footer">
                            </div>
                        </div>
                        <!--End of Patient Visited-->
                        
                    </section>
                </div>
                </section>

                <!-- Main content -->
                 
                 <div class="row">
                 	<section class="col-lg-6 connectedSortable">
                    
                    	<!--Start of New Patient-->
                    	<div class="box box-primary" id="loading-example">
                        	<div class="box-header">
                            	<div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        
                                 </div>
                                 <i class="fa fa-male"></i>
								<h3 class="box-title">New Patient</h3>
                            </div>
                            <div class="box-body no-padding">
                            	<div class="table-responsive">
                                	<table class="table table-hover">
                                    <thead>
                                    	<tr>
                                        	<th>Patient No.</th>
                                        	<th>Patient Name</th>
                                            <th>Date</th>
                                            <th>Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($latest_patient as $latest_patient){?>
                                        <tr>
                                        	<th><?php echo $latest_patient->patient_no?></th>
                                            <th><?php echo $latest_patient->patient?></th>
                                            <th><?php echo date("M d, Y h:i:s", strtotime($latest_patient->date_entry2));?></th>
                                            <th><?php echo $latest_patient->age?></th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                        <!--End of New Patient-->
                        
                    </section>
                    
                    <section class="col-lg-6 connectedSortable">
                    
                    	<!--Start of Patient Visited-->
                    	<div class="box box-primary" id="loading-example">
                        	<div class="box-header">
                            	<div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        
                                 </div>
                                 <i class="fa fa-male"></i>
								<h3 class="box-title">Visited Patient</h3>
                            </div>
                            <div class="box-body no-padding">
                            	<div class="table-responsive">
                                	<table class="table table-hover">
                                    <thead>
                                    	<tr>
                                        	<th>OPD No.</th>
                                        	<th>Patient Name</th>
                                            <th>Date</th>
                                            <th>Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($latest_visited_patient as $latest_visited_patient){?>
                                        <tr>
                                        	<th><?php echo $latest_visited_patient->IO_ID?></th>
                                            <th><?php echo $latest_visited_patient->patient?></th>
                                            <th><?php echo date("M d, Y", strtotime($latest_visited_patient->date_visit))." ".$latest_visited_patient->time_visit;?></th>
                                            <th><?php echo $latest_visited_patient->dept_name?></th>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                             <div class="box-footer">
                            </div>
                        </div>
                        <!--End of Patient Visited-->
                        
                    </section>
                 </div>
                 
                 




                                <!-- Main content -->
                 <?php if($hasAccesstoDoctorAvail){?>   
                 <div class="row">
                    <section class="col-lg-6 connectedSortable">
                    
                        <!--Start of New Patient-->
                        <div class="box box-primary" id="loading-example">
                            <div class="box-header">
                                <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        
                                 </div>
                                 <i class="fa fa-user-md"></i>
                                 
                                <h3 class="box-title">Doctor's IN</h3>
                            </div>
                            <div class="box-body no-padding">
                                <div class="table-responsive" style="height:350px; overflow-y:scroll;">
                                    <div id="doctorIN"></div>
                                </div>
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                        <!--End of New Patient-->
                        
                    </section>
                    
                    <section class="col-lg-6 connectedSortable">
                    
                        <!--Start of Patient Visited-->
                        <div class="box box-primary" id="loading-example">
                            <div class="box-header">
                                <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        
                                 </div>
                                 <i class="fa fa-user-md"></i>
                                <h3 class="box-title">Doctor's OUT</h3>
                            </div>
                            <div class="box-body no-padding">
                                <div class="table-responsive" style="height:350px; overflow-y:scroll;">
                                    <div id="doctorOUT"></div>
                                </div>
                            </div>
                             <div class="box-footer">
                            </div>
                        </div>
                        <!--End of Patient Visited-->
                        
                    </section>
                 </div>
                 <?php }?>

                 





            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
  
        
         <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
         <script src="<?php echo base_url();?>public/js/bootstrap.min.js" type="text/javascript"></script>     
         <script src="<?php echo base_url();?>public/js/AdminLTE/app.js" type="text/javascript"></script>

         <script type="text/javascript">
         $(document).ready(function(){
            
            doctorOUTF();
            doctorINF();

         });

         function doctorOUTF()
         {
            $.ajax({
                url: "<?php echo base_url()?>general/getDoctorOUT",
                type: "POST",
                success: function(result){
                    $('#doctorOUT').html(result);
                },beforeSend: function(){
                    $('#doctorOUT').html("<center><img src='../public/img/ajax-loader.gif'></center>");
                }
            });
         }

         function doctorINF()
         {
            $.ajax({
                url: "<?php echo base_url()?>general/getDoctorIN",
                type: "POST",
                success: function(result){
                    $('#doctorIN').html(result);
                },beforeSend: function(){
                    $('#doctorIN').html("<center><img src='../public/img/ajax-loader.gif'></center>");
                }
            });
         }

         function doctorProcess(id,status)
         {
            if(confirm('Are you sure you want the doctor ' + status + '?'))
            {
                $.ajax({
                    url: "<?php echo base_url()?>general/procDocAvail/" + id + "/" + status,
                    type: "POST",
                    success: function()
                    {
                        alert('Doctor is ' + status);
                        doctorINF()
                        doctorOUTF()
                    },
                    beforeSend: function(){
                        $('#doctor' + status).html("<center><img src='../public/img/ajax-loader.gif'></center>");
                    }
                });
                return true;
            }
            else
            {
                return false;
            }

         }
         </script>
         
    </body>
</html>