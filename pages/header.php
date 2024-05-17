
<?php
   if(isset($_GET['dangxuat'])&& ($_GET['dangxuat']==1)){
       unset($_SESSION['dangky']);
   }

   $category = executeSelect($connect, "SELECT * FROM category");
?>
<header>
    <div class="px-3 py-2 bg-while">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="index.php?quanly=trangchu" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bootstrap" viewBox="0 0 16 16">
               <path d="M5.062 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23zm0 3.762V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377z"/>
               <path d="M0 4a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4zm4-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3z"/>
            </svg>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="index.php?quanly=trangchu" class="nav-link text-dark">
                Trang chủ
              </a>
            </li>
            <li>
              <a href="#" id="category" class="category nav-link text-dark">
                Danh mục
              </a>
                <ul id="dropdown-category" class="dropdown-menu px-4" aria-labelledby="dropdownMenuLink">
                  <?php
                    if ($category) {
                      foreach($category as $row) {
                  ?>
                  <li><a class="dropdown-item fs-6" href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>"><?php echo $row['tendanhmuc']?></a></li>
                  <?php
                      }
                    }
                  ?>
                 
                </ul>
            </li>
            <!-- <li>
              <a href="#" id="category" class="category nav-link text-dark">
                Danh mục
              </a>
                <ul id="dropdown-category" class="dropdown-menu px-4" aria-labelledby="dropdownMenuLink">
                  <?php
                    if ($category) {
                      foreach($category as $row) {
                  ?>
                  <li><a class="dropdown-item fs-6" href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>"><?php echo $row['tendanhmuc']?></a></li>
                  <?php
                      }
                    }
                  ?>
                 
                </ul>
            </li> -->
            <li>
              <a href="index.php?quanly=giohang" class="nav-link text-dark">
                Giỏ hàng
              </a>
            </li>
            <?php
              if (isset($_SESSION['dangky'])) {
             ?>
              <li>
                <div class="dropdown mt-2 ms-2">
                  <span style="cursor: pointer;" onclick="show()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle d-block mx-auto mb-1" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                  </span>

                  <ul id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="index.php?quanly=taikhoannguoidung">Tài khoản</a></li>
                    <li><a class="dropdown-item" href="index.php?quanly=donmua">Đơn mua</a></li>
                    <li><a class="dropdown-item" href="index.php?dangxuat=1">Đăng xuất</a></li>
                  </ul>
                </div>
              </li>
              <?php
                } else {
              ?>
                <a href="index.php?quanly=dangnhap" type="button" class="btn btn-light text-dark me-2">Đăng nhập</a>
                <a href="index.php?quanly=dangky" type="button" class="btn btn-primary">Đăng ký</a>
              <?php
                }
              ?>
          </ul>
        </div>
      </div>
    </div>
</header>
<script>
  function show() {
    // if ($('#dropdown-menu').hasClass('d-block')) {
    //   $('#dropdown-menu').removeClass('d-block');
    // } else {
    //   $('#dropdown-menu').addClass('d-block');
    // }
    $("#dropdown-menu").slideToggle();
 
  }
</script>
