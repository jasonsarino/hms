<select name="drug_name" id="drug_name" class="form-control input-sm" style="width: 250px;" required onChange="getDrugRate(this.value);">
	<option value="">- Drug Name List -</option>
	<?php 
	foreach($drug_list as $drug_list){?>
	<option value="<?php echo $drug_list->drug_id;?>"><?php echo $drug_list->drug_name;?></option>
	<?php }?>
</select>
<input type="hidden" name="medicine_name" id="medicine_name" value="<?php echo $medicineName->med_category_name?>">
