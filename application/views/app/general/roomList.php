<select name="room_name" onChange="showBedLists(this.value);" id="room_name" class="form-control input-sm" style="width: 250px;" required>
	<option value="">- Room Name -</option>
	<?php 
	foreach($room as $room){?>
	<option value="<?php echo $room->room_master_id;?>"><?php echo $room->room_name;?></option>
	<?php }?>
</select>