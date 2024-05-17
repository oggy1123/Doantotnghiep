<?php
    include("../../config/config.php");
    include("../../helper/helper.php");
    // include('../../pdf/pdf.php');
    include('../../tfpdf/tfpdf.php');
    $pdf = new tFPDF();

    $ma_dh = $_GET['ma_dh'];
    $order_detail = executeSelect($connect, "SELECT * FROM order_detail WHERE ma_dh = $ma_dh");

    $pdf->AddPage("0");

    // Add a Unicode font (uses UTF-8)
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','', 24);
    $pdf->Cell(270, 10, 'HÓA ĐƠN', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFillColor(193, 229, 152);
    $pdf->SetFont('DejaVu','',16);
    $width_cell = array(10, 180, 30, 30, 30);
    $pdf->SetFontSize(12);
    $pdf->Cell($width_cell[0], 10, 'No', 1, 0, 'C', true);
    $pdf->Cell($width_cell[1], 10, 'Tên sản phẩm', 1, 0, 'C', true);
    $pdf->Cell($width_cell[2], 10, 'Số lượng', 1, 0, 'C', true);
    $pdf->Cell($width_cell[3], 10, 'Đơn giá', 1, 0, 'C', true);
    $pdf->Cell($width_cell[4], 10, 'Thành tiền', 1, 0, 'C', true);
    $pdf->Ln(10);
    $pdf->SetFillColor(235, 236, 236);
    $pdf->SetFontSize(10);
    $fill = false;
    $tong_tien_don_hang = 0;
    if ($order_detail) {
        foreach($order_detail as $key => $row) {
            $pdf->Cell($width_cell[0], 10, $key, 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[1], 10, $row['tensanpham'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[2], 10, $row['soluong'], 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[3], 10, number_format($row['dongia'], 0).'đ', 1, 0, 'C', $fill);
            $pdf->Cell($width_cell[4], 10,  number_format($row['thanh_tien'], 0).'đ', 1, 0, 'C', $fill);
            $fill = !$fill;
            $tong_tien_don_hang += $row['thanh_tien'];
            $pdf->Ln(10);
        }
    }
    $pdf->SetFontSize(18);
    $pdf->Ln(3);
    $pdf->Cell(400, 10, 'Tổng tiền: '.number_format($tong_tien_don_hang, 0).'đ', 0, 1, 'C');
    $pdf->Ln(3);
    $pdf->Cell(300, 10, 'CẢM ƠN QUÝ KHÁCH HẸN GẶP LẠI ', 0, 1, 'C');
    $pdf->Output();
?>