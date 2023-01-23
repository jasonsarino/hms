<select name="particular" id="particular" class="form-control input-sm" style="width: 100%;" required onChange="getItemRate(this.value);">
	<option value="">- Particular Item -</option>
	<?php 
	foreach($itemList as $itemList){?>
	<option value="<?php echo $itemList->particular_id;?>"><?php echo $itemList->particular_name;?></option>
	<?php }?>
</select>
<input type="hidden" name="particular_name" id="particular_name" value="<?php echo $particularName->group_name?>">
