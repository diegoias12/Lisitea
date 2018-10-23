<?php
    // Include autoloader
    require_once 'dompdf/autoload.inc.php';
    // Reference the Dompdf namespace
    use Dompdf\Dompdf;
    // Instantiate and use the dompdf class
    $dompdf = new Dompdf();
    // stylesheets and images
    //$dompdf->setBasePath(Estilo.css);
    //$dompdf->setBasePath(Imagenes\GobEdoMex.jpg);
    // Load content from html file
    $dompdf->loadHtml($_POST['plan']);
    //$dompdf->loadHtml();
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');
    //Render the HTML as PDF
    $dompdf->render();
    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream();
    //$dompdf->stream("codexworld", array("Attachment" => 0));
?>
