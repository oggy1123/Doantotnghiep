<?php
     include("../../config/config.php");

     include("../../helper/helper.php");
 
     $upload_directory = "uploads/";
     if (isset($_POST['them'])) {
        $hinhanh = time() . '_' . $_FILES['hinh_anh_1']['name'];
        
        $list_hinh_anh = [];
        
        for ($i = 1; $i <= 6; $i++) {
            $nameFile = (object) [
                'name' => time() . '_' .$_FILES['hinh_anh_' . $i]['name']
            ];

            $target_file = $upload_directory . $nameFile->name;
            if (move_uploaded_file($_FILES['hinh_anh_' . $i]['tmp_name'], $target_file)) {

                array_push($list_hinh_anh, $nameFile);

            } else {
                echo "Upload failed for file: " . $_FILES['hinh_anh_' . $i]['name'];
            }
           
            
        }
        $data = [
            'id_product' => $_POST['id_sp'],
            'list_image' => json_encode($list_hinh_anh)
        ];
         
        $insert = insertData($connect, 'gallery', $data);
        if ($insert) {
            header('Location:../../index.php?action=gallery&query=lietke');
        }
 
        //  $data = [
        //      'tendanhmuc' => $_POST['tendanhmuc'],
        //      'hinhanh' => $hinhanh
        //  ];
 
        //  if (empty($_FILES['hinhanh'])) {
        //      echo '<script>alert("Không thể thêm danh mục")</script>';
        //      header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
        //      return;
        //  }
 
        //  $product = insertData($connect, 'category', $data, 'uploads', $hinhanh_tmp);
 
        //  if ($product) {
 
        //    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
        //  }
     }
?>