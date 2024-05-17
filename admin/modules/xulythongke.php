<?php
    include('../config/config.php');
    include('../helper/helper.php');

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['thongke'])) {
        $day_ago = 1;
        $day = $_POST['day'];
        $current_date = date("Y-m-d");
        // $ngay_truoc = date("Y-m-d", strtotime("-7 days", strtotime($ngay_hien_tai))); 
        if ($day == 2) {
            $day_ago = 28;
        } else if ($day == 3) {
            $day_ago = 90;
        } else if ($day == 4) {
            $day_ago = 365;
        } else {
            $day_ago = 7;
        }

        // $sql = "SELECT COUNT(id_dh) AS so_luong_ban, FORMAT(SUM(tong_tien), 0) AS tong_tien 
        // FROM orders WHERE created_at BETWEEN DATE_SUB('$current_date', INTERVAL $day_ago DAY) AND '$current_date' AND status = 3";
        // $data = executeSelect($connect, $sql);
        // $dataChart = [];
        // $sql = "SELECT orders.*, SUM(order_detail.soluong) AS so_luong_ban FROM orders, order_detail 
        // WHERE orders.created_at BETWEEN DATE_SUB('$current_date', INTERVAL $day_ago DAY) AND '$current_date'  AND order_detail.ma_dh = orders.ma_dh";
        // $data = executeSelect($connect, $sql);
        // echo json_encode($data);
        // $sql ="SELECT orders.*, COUNT(orders.md_dh) as so_luong_ban,SUM(orders.tong_tien)  AS so_luong_ban 
        // FROM orders
        // INNER JOIN order_detail ON order_detail.ma_dh = orders.ma_dh
        // WHERE orders.created_at BETWEEN DATE_SUB('$current_date', INTERVAL $day_ago DAY) AND '$current_date'
        // GROUP BY orders.created_at
        // ";
        $sql = "SELECT DATE(created_at) AS ngay_dat, COUNT(ma_dh) AS so_luong_ban, SUM(tong_tien) AS tong_doanh_thu
        FROM orders
        WHERE DATE(created_at) BETWEEN DATE_SUB(CURDATE(), INTERVAL $day_ago DAY) AND CURDATE()
        GROUP BY DATE(created_at)
        ORDER BY ngay_dat DESC";
        $data = executeSelect($connect, $sql);
        $dataChart = [];
        if ($data) {
            foreach($data as $item) {
                $dataChart[] = [
                    'so_luong' => $item['so_luong_ban'],
                    'tong_tien' => $item['tong_doanh_thu'],
                    'ngay_dat' => date("Y-m-d", strtotime($item['ngay_dat']))
                ];
            }
        }
        echo json_encode($dataChart);
    }
?>