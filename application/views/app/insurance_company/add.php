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
                    <h1>Add Insurance Company</h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>app/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Admin</a></li>
                        <li><a href="<?php echo base_url()?>app/insurance_company">Insurance Company Master</a></li>
                        <li class="active">Add Insurance Company</li>
                    </ol>
                </section>
				
                <!-- Main content -->
                <section class="content">
                 
                 
                 <div class="row">
                 	<div class="col-md-12">
                    
                    	<form role="form" method="post" action="<?php echo base_url()?>app/insurance_company/save" onSubmit="return confirm('Are you sure you want to save?');">
                    	 <div class="box">
                         		
                         		<div class="box-header">
                                    <h3 class="box-title">
                                    <a href="<?php echo base_url();?>app/insurance_company" class="btn btn-default">Cancel</a>
                                            <button class="btn btn-primary" name="btnSubmit" id="btnSubmit" type="submit"><i class="fa fa-save"></i> Save</button>
                                    </h3>
                                    
                                </div>
                        	<div class="box-body table-responsive">
                            	
                                
                                		<?php echo validation_errors(); ?>   
                                
                                		<table width="100%" cellpadding="5" cellspacing="5">
                                        <tr>
                                                    	<td colspan="2">Required fields = <font color="#FF0000">*</font></td>
                                                    </tr>
                                        <tr>
                                        	<td width="16%">Company Name <font color="#FF0000">*</font></td>
                                            <td width="84%"><?php echo form_input('company_name',set_value('company_name'),'id="company_name" class="form-control input-sm" placeholder="Company Name" style="width: 250px;" required');?></td>
                                        </tr>
                                        <tr>
                                        	<td>Email Address <font color="#FF0000">*</font></td>
                                            <td><?php echo form_input('email_address',set_value('email_address'),'id="email_address" class="form-control input-sm" placeholder="Email Address" style="width: 250px;" required');?></td>
                                        </tr>
                                        <tr>
                                        	<td>Phone No. <font color="#FF0000">*</font></td>
                                            <td><?php echo form_input('phone_no',set_value('phone_no'),'id="phone_no" class="form-control input-sm" placeholder="Phone No." style="width: 250px;" required');?></td>
                                        </tr>
                                        <tr>
                                        	<td>Fax No.</td>
                                            <td><?php echo form_input('fax_no',set_value('fax_no'),'id="fax_no" class="form-control input-sm" placeholder="Fax No." style="width: 250px;"');?></td>
                                        </tr>
                                        <tr>
                                        	<td valign="top">Company Address <font color="#FF0000">*</font></td>
                                            <td><?php echo form_textarea('address', set_value('address'), 'id="address" class="form-control input-sm" placeholder="Company Address" style="width: 250px; height:80px;" required');?></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2"><hr>CONTACT PERSON DETAILS</td>
                                        </tr>
                                        <tr>
                                        	<td>Contact Person <font color="#FF0000">*</font></td>
                                            <td><?php echo form_input('contact_person',set_value('contact_person'),'required id="contact_person" class="form-control input-sm" placeholder="Contact Person" style="width: 250px;"');?></td>
                                        </tr>
                                        <tr>
                                        	<td>Contact No. <font color="#FF0000">*</font></td>
                                            <td><?php echo form_input('contact_no_person',set_value('contact_no_person'),' required id="contact_no_person" class="form-control input-sm" placeholder="Contact No." style="width: 250px;"');?></td>
                                        </tr>
                                        <tr>
                                        	<td>Email Address <font color="#FF0000">*</font></td>
                                            <td><?php echo form_input('contact_email',set_value('contact_email'),'required id="contact_email" class="form-control input-sm" placeholder="Email Address" style="width: 250px;"');?></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2"><hr></td>
                                        </tr>
                                        <tr>
                                        	<td valign="top">Remarks</td>
                                            <td><?php echo form_textarea('remarks', set_value('remarks'), 'id="remarks" class="form-control input-sm" placeholder="Remarks" style="width: 250px; height:80px;"');?></td>
                                        </tr>
                                        </table>
                                        
                                
                                
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
        
    </body>
</html>