
<div class="alt2" dir="ltr" style="
											margin: 0px;
											padding: 0px;
											border: 0px solid #919b9c;
											width: 100%;
											height: 390px;
											text-align: left;
											overflow: auto">
<table class="table table-striped table-hover">
<thead>
	<tr>
    	<th>Type</th>
    	<th>Patient No.</th>
        <th>IOP No.</th>
        <th>Name</th>
        <th></th>
    </tr>
</thead>
<tbody>
	<?php foreach($showPatients as $showPatients){?>
    <tr>
    	<td><?php echo $showPatients->patient_type?></td>
    	<td><?php echo $showPatients->patient_no?></td>
        <td><?php echo $showPatients->IO_ID?></td>
        <td><?php echo $showPatients->patient?></td>
        <td><a href="#" onClick="addPatient('<?php echo $showPatients->IO_ID?>','<?php echo $showPatients->patient_no?>')">SELECT</a></td>
    </tr>
    <?php }?>
</tbody>
</table>
</div>