<?php
    $user = "SELECT * FROM user ORDER BY id_user DESC";
    $query = executeSelect($connect, $user);
?>
<div class="card">
    <div class="card-body">
        <h3 class="p-2 m-0 fs-5 card-title">Liệt kê người dùng</h3>
    </div>
</div>
<div class="card my-3">
    <div class="card-body">
        <table class="table table-hover">
          <thead class="text-center">
            <tr>
              <th>ID</th>
              <th>Họ tên</th>
              <th>Email</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody class="text-center">
             <?php
                if ($query) {
                        foreach($query as $row ) {
                ?>
                <tr>
                    <td><?php echo $row['id_user']?></td>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                </tr>
                <?php
                    }
                }
                ?>
        </tbody>
        </table>
    </div>
</div>
