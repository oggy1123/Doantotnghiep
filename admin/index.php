<?php
    session_start();
    if (!isset( $_SESSION['dangnhap'])) {
        echo "<script>window.location.href = 'login.php';</script>";
    }
    include("config/config.php");
    include("./helper/helper.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <div class="container-fluid">
        <div>
            <div class="loader"></div>
            <div class="position-fixed top-0 start-0 end-0" style="z-index: 1000;">
                <?php
                    include("header/header.php")
                ?>
            </div>
            <div class="d-block">
                <div class="sidebar">
                    <?php
                        include("sidebar/sidebar.php")
                    ?>
                </div>
                <div class="main">
                    <div class="content">
                        <?php
                            if (isset($_GET['action']) && isset($_GET['query'])) {
                                $tam = $_GET['action'];
                                $query = $_GET['query'];
                            } else {
                                $tam = "";
                                $query = "";
                            }
                            if ($tam == "quanlydanhmucsanpham" && $query == "lietke") {
                                // include("modules/Quanlydanhmucsanpham/them.php")
                                include("modules/Quanlydanhmucsanpham/index.php");
                            } else if ($tam == "quanlydanhmucsanpham" && $query == "them") {
                                include("modules/Quanlydanhmucsanpham/them.php");
                            } else if ($tam == "quanlydanhmucsanpham" && $query == "sua") {
                                include("modules/Quanlydanhmucsanpham/sua.php");
                            } else if($tam == "quanlysanpham" && $query == "lietke") {
                                include("modules/Quanlysanpham/index.php");
                            }
                            else if ($tam == "quanlysanpham" && $query == "them") {
                                include("modules/Quanlysanpham/them.php");
                            } else if ($tam == "quanlysanpham" && $query == "sua") {
                                include("modules/Quanlysanpham/sua.php");
                            } else if ($tam == "quanlydonhang" && $query == "lietke") {
                                include("modules/Quanlydonhang/index.php");
                            } else if ($tam == "quanlydonhang" && $query == "chitiet") {
                                include("modules/Quanlydonhang/chitiet.php");
                            } else if ($tam == "quanlydonhang" && $query == "inhoadon") {
                                include("modules/quanlydonhang/inhoadon.php");
                            } else if($tam == 'gallery' && $query == 'lietke') {
                                include("modules/gallery/index.php");
                            } else if($tam == 'gallery' && $query == 'them') {
                                include("modules/gallery/them.php");
                            } elseif($tam === 'quanlynguoidung' && $query == 'lietke') {
                                include("modules/Quanlynguoidung/index.php");
                            } 
                            // elseif($tam === 'bai2' && $query == 'liet') {
                            //     //action=bai2&query=liet
                            //     include("modules/Bai2/index.php");
                            // }
                            else {
                                include("modules/dashbord.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/common.js"></script>
    <script>
        CKEDITOR.replace('mota');
        CKEDITOR.replace('noidung');
    </script>
    <script>
        $(document).ready(function () {
            // showGraph();

            thong_ke();
        });
        
        function thong_ke() {
             let day = $('#thong_ke').val()
            let text = '';
            if (day == 1) {
                text = '7 ngày qua';
            } else if (day == 2) {
                text = '28 ngày qua';
            } else if (day == 3) {
                text = '90 ngày qua';
            } else if (day == 4) {
                text = '365 ngày qua';
            }
            $('#day').text(text);
            const formData = new FormData();
            formData.append('day', day);
            formData.append('thongke', 'thongke');
            $.ajax({                                      
                url: 'modules/xulythongke.php',
                type: "POST",                     
                data: formData,                                                      
                cache : false,
                processData: false,
                contentType: false,    
                success: function(data) {
                    $('#graph').text('');
                    // chart.setData(data);
                   let thong_ke = JSON.parse(data);
                //    console.log(thong_ke);
                    new Morris.Line({
                    element: 'graph',
                    data: thong_ke,
                    xkey: 'ngay_dat',
                    ykeys: ['so_luong', 'tong_tien'],
                    labels: ['so_luong_ban', 'tong_tien']
                    });
                } 
            });  
            
        }
    </script> 
</body>

</html>