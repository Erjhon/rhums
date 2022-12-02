<?php

require_once('../config.php');

require_once '../dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM checkup ");
$row = mysqli_fetch_assoc($sql);



// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('pdf_details_CU.php');
$html =ob_get_contents();
ob_get_clean();


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream('Patient-records.pdf',['Attachement'=>false]);
$dompdf->stream("Patient-records.pdf", array("Attachment" => 0));

?>