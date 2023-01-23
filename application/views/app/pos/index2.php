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
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php require_once(APPPATH.'views/include/header.php');?>
        
        		<section class="content">
                 
                 <div class="row">
                 	<div class="col-md-3">
                    	<div class="box box-primary">
                        	
                            <div class="box-header">
                            	
                            </div>
                            
                            <div class="box-content">
                            
                            	
                            	<!--start of accordion-->
                                <div id="content-1" class="content22">
                            	<div class="panel-group" id="accordion">
                               
                                	<?php 
									$num = 0;
									foreach($particular_cat as $particular_cat){
									$num = $num + 1;
									?>
                                	<div class="panel panel-default">
                                    	<div class="panel-heading">
                                             <h4 class="panel-title">
        									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $num;?>">
          									<?php echo $particular_cat->group_name?>
        									</a>
      										</h4>
                                        </div>
                                        <div id="collapseOne<?php echo $num;?>" class="panel-collapse collapse">
                                        	<div class="panel-body">
                                            
                                             	<?php
												$ci_obj = & get_instance();
												$ci_obj->load->model('app/billing_model');
												$billName = $ci_obj->billing_model->itemList($particular_cat->group_id);
												?>
                                                <table class="table">
                                                <tbody>
                                                	<?php foreach($billName as $billName){?>
                                                	<tr>
                                                    	<td><?php echo $billName->particular_name?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                </div>
                                <!--end of accordion-->
                               </div>
                                
                                <div class="box-footer">
                            	
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                    	<div class="nav-tabs-custom">
                        	<ul class="nav nav-tabs">
                               	<li class="active"><a href="#tab_1" data-toggle="tab">Billing List</a></li>
                            	<li><a href="#tab_2" data-toggle="tab">Header Details</a></li>
                            </ul>
                            <div class="tab-content">
                            	<div class="tab-pane active" id="tab_1">
                                
                                <table class="table">
                                <thead>
                                	<tr>
                                    	<th>No.</th>
                                        <th>Particular Name</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Remarks</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                </table>
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                aaa
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                    	<div class="box box-primary">
                        	<div class="box-body">
                            	<a class="btn btn-app"><i class="fa fa-plus"></i> Patient</a>
                                <a class="btn btn-app"><i class="fa fa-save"></i> Save</a>
                                <a class="btn btn-app"><i class="fa fa-credit-card"></i> Payment</a>
                                <a class="btn btn-app"><i class="fa fa-print"></i> Print Invoice</a>
                                <a class="btn btn-app"><i class="fa fa-print"></i> Print Receipt</a>
                                <a class="btn btn-app"><i class="fa fa-download"></i> to PDF</a>
                            </div>
                        </div>
                    </div>
                 </div>
                 
                 
                </section><!-- /.content -->
         
  
        
         <script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
         <script src="<?php echo base_url();?>public/js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url();?>public/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>