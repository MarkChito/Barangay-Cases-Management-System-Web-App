<?php
require 'system/third_party/phpqrcode/qrlib.php';

function generate_qrcode($data)
{
    $size = 10;
    $filename = "dist/img/qr_codes/" . $data . ".png";

    QRcode::png($data, $filename, QR_ECLEVEL_L, $size);

    return $filename;
}
