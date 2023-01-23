<table class="table table-hover">
<thead>
    <tr>
        <th>Doctor Name</th>
        <th>Department</th>
        <th>Date Time <?php echo ($docStatus == "OUT" ? "OUT" : "IN"); ?></th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php foreach($doctor as $doctor){?>
    <tr>
        <th><?php echo $doctor->name?></th>
        <th><?php echo $doctor->dept_name?></th>
        <th><?php echo ($docStatus == "OUT" ? date("M d, Y h:i A", strtotime($doctor->doctorLastOut)) : date("M d, Y h:i A", strtotime($doctor->doctorLastIn))); ?></th>
        <th><a href="javascript:void(0)" class="btn btn-primary btn-flat" onClick="return doctorProcess('<?php echo $doctor->user_id?>','<?php echo ($docStatus == "OUT" ? "IN" : "OUT"); ?>')"><i class="fa fa-sign-<?php echo ($docStatus == "OUT" ? "in" : "out"); ?>"></i> <?php echo ($docStatus == "OUT" ? "IN" : "OUT"); ?></a></th>
    </tr>
    <?php }?>
</tbody>
</table> 
