
 <?php
      include('const.php');
      $connect = mysqli_connect(HOST, USER_NAME, PASS, DATABASE);

      mysqli_set_charset($connect, 'UTF8');

      if (mysqli_connect_errno()) {
         echo "Không thể kết nối đến MySQL: " . mysqli_connect_error();
      }
       
  ?>
