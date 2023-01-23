<select name="bed_name" id="bed_name" class="form-control input-sm" style="width: 250px;" required>
	<option value="">- Bed No./Name -</option>
	<?php 
	foreach($bed as $bed){?>
	<option value="<?php echo $bed->room_bed_id;?>"><?php echo $bed->bed_name;?></option>
	<?php }?>
</select>