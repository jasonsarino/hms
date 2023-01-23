<select name="drug_name" id="drug_name" class="form-control input-sm" style="width: 250px;" required>
                                                            	<option value="">- Drug Name -</option>
																<?php 
																foreach($drug_name_lists as $drug_name_lists){?>
                                                            	<option value="<?php echo $drug_name_lists->drug_id;?>"><?php echo $drug_name_lists->drug_name;?></option>
                                                                <?php }?>
                                                            </select>