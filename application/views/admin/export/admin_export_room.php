<?php
    require 'vendor/autoload.php';

    // reference to Dompdf namespace
    use Dompdf\Dompdf;
    ob_start();
?>

<?php
    $html = ob_get_clean();
    function download() {
        global $html;
        $dompdf = new DOMPDF();

        //load stored html string
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("danh sách sinh viên.pdf");
    }
?>