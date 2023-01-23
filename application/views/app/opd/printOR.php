 <style>
    body{
		font-family:Verdana, Geneva, sans-serif;
		font-size:13px;
	}
    </style>
<title>RECEIPT</title>
<div class="row">
                 	<div class="col-md-12">

            <!-- Right side column. Contains the navbar and content of the page -->
                    

               	<section class="content invoice">
                	
                     				
                    <center>
                    <?php
											if(!$companyInfo->logo){
												$picture = "sample.jpg";	
											}else{
												$picture = $companyInfo->logo;
											}
										?>
										
                    <font size="+1"><strong><?php echo $companyInfo->company_name;?></strong></font><br>
                    <?php echo $companyInfo->company_address;?><br>
                    Contact No.: <?php echo $companyInfo->company_contactNo;?><br>
                   	TIN: <?php echo $companyInfo->TIN;?><br>
                    <strong>RECEIPT</strong></center><br><Br>
                     <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <strong>Customer</strong>
                            <address>
                                <?php echo $patientInfo->name?> <strong><i>DOB</i> </strong><?php echo date("M d, Y", strtotime($patientInfo->birthday));?><Br>
                                <?php echo $patientInfo->street?><br>
                                <?php echo $patientInfo->subd_brgy?><br>
                                <?php echo $patientInfo->province?><br>
                                <?php echo $patientInfo->phone_no?><br>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            
                            
                        </div><!-- /.col -->
                         <div class="col-sm-4 invoice-col">
                         	<b>Receipt No.:</b> <?php echo $getOR->receipt_no?><br/>
                            <b>Invoice No.:</b> <?php echo $headerInv->invoice_no?><br/>
                            <b>Date:</b> <?php echo date("M d, Y", strtotime($headerInv->dDate));?>
                        </div><!-- /.col -->
                        
                    </div><!-- /.row -->
                    
                    
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table width="100%" cellpadding="2" cellspacing="2" border="1" style="border:1px; border-collapse:collapse;">
                                <thead>
                                    <tr>
                                        <th>Particular Name</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Note</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                <?php foreach($detailsInv as $detailsInv){?>
                                <tr>
                                <td><?php echo $detailsInv->bill_name?></td>
                                <td><?php echo $detailsInv->qty?></td>
                                <td><?php echo $detailsInv->rate?></td>
                                <td><?php echo $detailsInv->amount?></td>
                                <td><?php echo $detailsInv->note?></td>
                                </tr>
                                <?php }?>
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
                    <div class="row">
                        <div class="col-xs-6">
                            <p class="lead">Amount Details</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td><?php echo number_format($headerInv->sub_total,2)?></td>
                                    </tr>
                                    <tr>
                                        <th style="width:50%">Discount:</th>
                                        <td><?php echo number_format($headerInv->discount,2)?></td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td><?php echo number_format($headerInv->total_amount,2)?></td>
                                    </tr>
                              <tr>
                                        <th>Amount Paid:</th>
                                        <td><?php echo number_format($getOR->amountPaid,2)?></td>
                                    </tr>
                                    <tr>
                                        <th>Change:</th>
                                        <td><?php echo number_format($getOR->change,2)?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    
                    
                    
                    
                </section>
               
                </div>
                 </div>
       

  
        <!-- END BDAY -->