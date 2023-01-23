<table width="100%" cellpadding="3" cellspacing="3">
<tr>
	<td width="15%" valign="top" align="center">
    <?php
	if(!$patientDetials->picture){
		$picture = "avatar.png";	
	}else{
		$picture = $patientDetials->picture;
	}
	?>
		<img src="<?php echo base_url();?>public/patient_picture/<?php echo $picture;?>" class="img-rounded" width="86" height="81">
	</td>
	<td>
		<table cellpadding="2" width="100%">
        <tr>
        	<td><strong>Patient No.</strong></td>
            <td><?php echo $patientDetials->patient_no?></td>
        </tr>
        <tr>
        	<td><strong>IOP No.</strong></td>
            <td><?php echo $patientDetials->IO_ID?></td>
        </tr>
        <tr>
        	<td colspan="2"><strong>Patient Name.</strong></td>
        </tr>
        <tr>
        	<td colspan="2"><?php echo $patientDetials->patient?></td>
        </tr>
        </table>
	</td>
</tr>
</table>
<input type="hidden" name="opd_no" id="opd_no" value="<?php echo $patientDetials->IO_ID?>">
<input type="hidden" name="patient_no" id="patient_no" value="<?php echo $patientDetials->patient_no?>">