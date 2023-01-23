<?php
	
	$html = "<html>";
	$filename = "test";
	$stream = true;
	
	require_once("dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
?>