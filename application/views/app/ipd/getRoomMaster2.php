 													<div class="alt2" dir="ltr" style="
														margin: 0px;
														padding: 0px;
														border: 0px solid #919b9c;
														width: 100%;
														height: 450px;
														text-align: left;
														overflow: auto">
                                                      <table class="table table-hover table-striped" id="myTable" width="100%" cellpadding="2" cellspacing="2">
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
                                                      <tbody>
                                                      	<?php 
														foreach($getRoomMaster as $getRoomMaster){
														//occupied bed	
														$occu_bed = & get_instance();
														$occu_bed->load->model('app/general_model');
														$occu_bed_rs = $occu_bed->general_model->numberofOccuBeds($getRoomMaster->room_master_id);
														
														//unoccupied bed	
														$unoccu_bed = & get_instance();
														$unoccu_bed->load->model('app/general_model');
														$unoccu_bed_rs = $unoccu_bed->general_model->numberofUnOccuBeds($getRoomMaster->room_master_id);
														
														
														?>
                                                        <tr align="center">
                                                        	<td><a href="#" onClick="getBed2('<?php echo $getRoomMaster->room_master_id;?>','<?php echo $getRoomMaster->room_name?>')">Status</a></td>
                                                            <td><?php echo $getRoomMaster->floor_name?></td>
                                                            <td><?php echo $getRoomMaster->room_name?></td>
                                                            <td><?php echo $getRoomMaster->category_name?></td>
                                                            <td><?php echo ($occu_bed_rs->numberofOccuBeds + $unoccu_bed_rs->numberofOccuBeds)?></td>
                                                            <td><?php echo $occu_bed_rs->numberofOccuBeds?></td>
                                                            <td><?php echo $unoccu_bed_rs->numberofOccuBeds?></td>
                                                        </tr>
                                                        <?php }?>
                                                      </tbody>
                                                      </table>  
                                                      </div>