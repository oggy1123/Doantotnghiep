<?php
      include("../../config/config.php");
      
      include("../../helper/helper.php");

      if (isset($_POST['themsanpham'])) {
      $hinhanh = time().''.$_FILES['hinhanh']['name'];

      $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
      if (isset($_POST['gia']) && $_POST['gia'] < 0) {// Có thể check các điệu kiện khác
        echo '<script>
            alert("Giá tiền nhập không hợp lê! Xin vui lòng nhập lại giá tiền")
            window.location.href = "../../index.php?action=quanlysanpham&query=them";
          </script>';
        
        // header('Location:../../index.php?action=quanlysanpham&query=them');
        return;
      }

      if (!is_int($_POST['gia'])) { // tất cả các điều kiện không phải laf sô nguyên 
        echo '<script>
          alert("Giá tiền nhập không hợp lê! Xin vui lòng nhập lại giá tiền")
          window.location.href = "../../index.php?action=quanlysanpham&query=them";
        </script>';
        // header('Location:../../index.php?action=quanlysanpham&query=them');
        return;
      }
      $data = [
        'ma_sp' => rand(),
        'tensanpham' => $_POST['tensanpham'], // thử check xem tến có nhập tôi đa 100 ký tự nếu lớn hơn 100 ký thông báo lỗi
        'giasp' => $_POST['gia'], 
        'soluong' => $_POST['soluong'], // check so bé hơn 0
        'hinhanh' => $hinhanh,
        'mota' => $_POST['mota'],
        'noidung' => $_POST['noidung'],
        'tinhtrang' => $_POST['tinhtrang'],
        'id_danhmuc' => $_POST['danhmuc'],
        'id_brand' => $_POST['brand'],
        'bao_hanh' => $_POST['baohanh'],
        'id_origin' => $_POST['xuatxu']
      ];

        if (empty($hinhanh)) {
            echo '<script>alert("Không thể thêm sản phẩm")</script>';
            header('Location:../../index.php?action=quanlysanpham&query=them');
            return;
        }

        $product = insertData($connect, 'product', $data, 'uploads', $hinhanh_tmp);

        if ($product) {

          header('Location:../../index.php?action=quanlysanpham&query=them');
        }
         
      } else if (isset($_POST['suasanpham'])) {
         $id = $_GET['id_sp'];
         $tensanpham = $_POST['tensanpham']; //
         $giasp = $_POST['giasp'];
         $soluong = $_POST['soluong'];
         $bao_hanh = $_POST['bao_hanh'];
         $hinhanh = time().''.$_FILES['hinhanh']['name'];
         $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
         $mota = $_POST['mota'];
         $noidung = $_POST['noidung'];
         $tinhtrang = $_POST['tinhtrang'];

          if(!empty($_FILES['hinhanh']['name'])) {
            $sql = "SELECT * FROM product WHERE id_sp = '$id' LIMIT 1";
            $query = mysqli_query($connect,$sql);
            $folder = "uploads/".$hinhanh;
            move_uploaded_file($hinhanh_tmp, $folder);
            // $sql_update = "UPDATE product SET tensanpham='$tensanpham',
            // giasp =' $giasp', soluong = '$soluong', hinhanh = '$hinhanh',
            // mota = '$mota', noidung = '$noidung', tinhtrang = '$tinhtrang', bao_hanh = '$bao_hanh', WHERE id_sp = '$id '";
            $sql_update = "UPDATE product SET tensanpham='$tensanpham',
            giasp='$giasp', soluong='$soluong', hinhanh='$hinhanh',
            mota='$mota', noidung='$noidung', tinhtrang='$tinhtrang', bao_hanh='$bao_hanh' WHERE id_sp='$id'";

          
           
            while($row = mysqli_fetch_array($query)){
              unlink('uploads/'.$row['hinhanh']);
            }

          } else {
            // $sql_update = "UPDATE product SET tensanpham='$tensanpham',
            // giasp =' $giasp', soluong = '$soluong', hinhanh = '$hinhanh',
            // mota = '$mota', noidung = '$noidung', tinhtrang = '$tinhtrang', bao_hanh = '$bao_hanh', WHERE id_sp = '$id '";
            $sql_update = "UPDATE product SET tensanpham='$tensanpham',
            giasp='$giasp', soluong='$soluong',
            mota='$mota', noidung='$noidung', tinhtrang='$tinhtrang', bao_hanh='$bao_hanh' WHERE id_sp='$id'";

          }

            mysqli_query($connect, $sql_update);
            header('Location:../../index.php?action=quanlysanpham&query=lietke');
       }
?>