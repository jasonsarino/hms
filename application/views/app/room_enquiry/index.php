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
        
    <link type="text/css" href="<?php echo base_url();?>public/timepicker/bootstrap-timepicker.min.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>public/timepicker/bootstrap-timepicker.min.js"></script>
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
    <body class="skin-blue" onLoad="getData()">
        <!-- header logo: style can be found in header.less -->
        <?php require_once(APPPATH.'views/include/header.php');?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            
            <?php require_once(APPPATH.'views/include/sidebar.php');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Room Enquiry</h1>
                   <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Patient Management</a></li>
                        <li class="active">Room Enquiry</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 

                 
                <?php echo validation_errors();?>
                 
                     
                     <div class="col-md-12"> 
                                <div class="nav-tabs-custom">
                                	<ul class="nav nav-tabs">
                                		<li class="active"><a href="#tab_1" data-toggle="tab">Admission Master</a></li>
                                        
                                	</ul>
                                    <div class="tab-content">
                                    	<div class="tab-pane active" id="tab_1">
                                        	<script language="javascript">
                                            function getData(){
												var roomType,occupied;
												roomType = document.getElementById("roomType").value;
												occupied = document.getElementById("occupied").value;
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
													document.getElementById("master_room").innerHTML=xmlhttp3.responseText;
   									 			}
  												}
  													var supp;
													xmlhttp3.open("GET","<?php echo base_url();?>app/ipd/getRoomMaster2/"+roomType+"/"+occupied,true);
													xmlhttp3.send();
													
													
											}
											
											function getBed2(room_id,room_name){
												
												if (window.XMLHttpRequest)
  												{
 						 							xmlhttp4=new XMLHttpRequest();
  												}
												else
  												{// code for IE6, IE5
  													xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
  												}
													xmlhttp4.onreadystatechange=function()
  												{
  												if (xmlhttp4.readyState==4 && xmlhttp4.status==200)
    											{
													document.getElementById("master_bed").innerHTML=xmlhttp4.responseText;
   									 			}
  												}
  													var supp;
													xmlhttp4.open("GET","<?php echo base_url();?>app/ipd/getBeds2/"+room_id,true);
													xmlhttp4.send();
													
													document.getElementById("room_name").value = room_name;
													document.getElementById("room_idfor").value = room_id;
											}		
											
											function getBedID(room_bed_id,bed_name){
												document.getElementById("bed_no").value = room_bed_id;
												document.getElementById("bed_name").value = bed_name;
											}
                                            </script>
                                            <table cellpadding="4" width="100%">
                                            <tr>
                                            	<td>
                                                	<select name="roomType" id="roomType" class="form-control input-sm" onChange="getData()">
                                                    	<option value="">Select Room Type</option>
                                                        <?php foreach($room_category as $room_category){?>
                                                        <option value="<?php echo $room_category->category_id?>"><?php echo $room_category->category_name?></option>
                                                        <?php }?>
                                                    </select>
                                                </td>
                                                <td align="center">
                                                	<select name="occupied" id="occupied" class="form-control input-sm" onChange="getData()">
                                                    	<option value="all">All</option>
                                                        <option value="occupied">Occupied Bed</option>
                                                        <option value="unoccupied">Unoccupied Bed</option>
                                                    </select>
                                                </td>	
                                            </tr>
                                            <tr>
                                            	<td colspan="2">
                                                <span id="master_room">
                                                	 <div class="alt2" dir="ltr" style="
														margin: 0px;
														padding: 0px;
														border: 0px solid #919b9c;
														width: 100%;
														height: 550px;
														text-align: left;
														overflow: auto">
                                                      <table class="table" id="myTable" width="100%" cellpadding="2" cellspacing="2">
                                                      <thead>
                                                      	<tr style="border-bottom:1px #999 solid; border-collapse:collapse">
                                                        	<th>Status</th>
                                                            <th>Floor</th>
                                                            <th>Room No./Ward No.</th>
                                                            <th>Room Type</th>
                                                            <th>Total Beds</th>
                                                            <th>Occupied Beds</th>
                                                            <th>UnOccupied Beds</th>
                                                        </tr>
                                                      </thead>
                                                      </table>  
                                                      </div>
                                                </span>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td colspan="2">
                                                <hr>
                                                <span id="master_bed">
                                                	 <div class="alt2" dir="ltr" style="
														margin: 0px;
														padding: 0px;
														border: 0px solid #919b9c;
														width: 100%;
														height: 500px;
														text-align: left;
														overflow: auto">
                                                        <table class="table" id="myTable" width="100%" cellpadding="2" cellspacing="2">
                                                      <thead>
                                                      	<tr style="border-bottom:1px #999 solid; border-collapse:collapse">
                                                        	<th>Status</th>
                                                            <th>Bed No.</th>
                                                            <th>Patient No.</th>
                                                            <th>IOP No.</th>
                                                            <th>Patient Name</th>
                                                            <th>Date Admit</th>
                                                        </tr>
                                                      </thead>
                                                      </table>  
                                                      </div>
                                                </span>
                                                </td>
                                            </tr>
                                            </table>
                                            
                                            
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

  
  
        
         <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
         <script src="<?php echo base_url();?>public/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url();?>public/js/AdminLTE/app.js" type="text/javascript"></script>
        
        
        
    </body>
</html>