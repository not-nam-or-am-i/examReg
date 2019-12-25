<?php
    require 'vendor/autoload.php';

    // reference to Dompdf namespace
    use Dompdf\Dompdf;
    ob_start();
?>



<?php
    $html = ob_get_clean();
    $this->session->set_userdata('htmlPage', $html);
?>