<?php
       $sql_danhmuc = "SELECT * FROM category ORDER BY id_danhmuc ASC";
       $query_danhmuc = mysqli_query($connect,$sql_danhmuc);
?>
<div class="w-100 shadow-sm p-3 mb-5 bg-body rounded">
		<h3 class="px-2"> <span>Danh mục sản phẩm</span></h3>
		<nav class="nav flex-column">
			<?php
				while($row=mysqli_fetch_array($query_danhmuc)){
					$id_danhmuc = $row['id_danhmuc'];
					$tendanhmuc = $row['tendanhmuc'];
			?>
				<a class="nav-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $id_danhmuc?>"><?php echo $tendanhmuc?></a>
			<?php
				}
			?>
	</nav>
</div>