<?php
    session_start();
    include("../../admin/config/config.php");
    include("../../admin/helper/helper.php");

    $data = json_decode(file_get_contents("php://input"), true);

    $cartId = $data['cartId'];

    $cartInfo = array();

    foreach ($cartId as $item) {
        $id = $item['id'];
        $sql = "SELECT * FROM cart WHERE id = $id LIMIT 1";
        $result = executeSelect($connect, $sql, false);
        if ($result) {
            $cartInfo[] = $result;
        }
    }
    $_SESSION['carts'] = $cartInfo;
?>