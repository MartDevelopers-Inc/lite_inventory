<?php
$html .= ' <br><br>';
if ($receipts_header['receipt_show_barcode'] == 'true') {
    /* Generate Barcode */
    $barcode = new \Com\Tecnick\Barcode\Barcode();
    $targetPath = "../storage/cache/";
    if (!is_dir($targetPath)) {
        mkdir($targetPath, 0777, true);
    }
    $productData = "$number";
    $barcode = new \Com\Tecnick\Barcode\Barcode();
    $bobj = $barcode->getBarcodeObj('C128A', "{$productData}", 90, 20, 'black', array(
        0,
        0,
        0,
        0
    ));
    $imageData = $bobj->getPngData();
    $timestamp = $number . '_' . time();
    file_put_contents($targetPath . $timestamp . '.png', $imageData);

    /* Convert PNG To Base 64 */
    $path = '../storage/cache/' . $timestamp . '.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $receipt_barcode = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $html .= '
            <img src="' . $receipt_barcode . '">
        ';
}
