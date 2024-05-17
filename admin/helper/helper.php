<?php
    function executeSelect($conn, $sql, $isSingle = true) {

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            if (!$isSingle) {
                return $result->fetch_assoc();
            }
            $data = [];

            while($row = $result->fetch_assoc()) {

                $data[] = $row;
            }

            return $data;
        }
        return null;
    }

    function insertData($conn, $tableName = '', $data, $folderName = '', $hinhanh_tmp = null) {
        $keys = implode(", ", array_keys($data));

        $values = implode(", ", array_fill(0, count($data), "?"));

        $query = "INSERT INTO $tableName ($keys) VALUES ($values)";

        $stmt = $conn->prepare($query);

        if(!$stmt) {
            return false;
        }

        $types = str_repeat('s', count($data));

        $stmt->bind_param($types, ...array_values($data));

        // Thực thi câu lệnh SQL
        $result = $stmt->execute();

        if($result) {

            if ($folderName !== '') {

                $folder = $folderName."/".$data['hinhanh'];

                move_uploaded_file($hinhanh_tmp, $folder);
            }
            return true; // Chèn dữ liệu thành công
        } else {
            return false; // Lỗi khi thực thi câu lệnh SQL
        }
    }

    // function updateData($conn, $table = '', $data, $condition) {
    //     // Xây dựng câu truy vấn UPDATE
    //     $query = "UPDATE $table SET ";

    //     foreach($data as $key => $value) {
    //         $query .= "$key = ?, ";
    //     }
    //     $query = rtrim($query, ", ");
    //     $query .= " WHERE $condition";

    //     // Chuẩn bị câu lệnh SQL
    //     $stmt = $conn->prepare($query);

    //     if(!$stmt) {
    //         return false; // Lỗi khi chuẩn bị câu lệnh SQL
    //     }

    //     // Liên kết các giá trị với các tham số
    //     $types = str_repeat('s', count($data)); // Giả sử tất cả giá trị đều là kiểu chuỗi
    //     $stmt->bind_param($types, ...array_values($data));

    //     // Thực thi câu lệnh SQL
    //     $result = $stmt->execute();

    //     // Kiểm tra kết quả
    //     if($result) {
    //         return true; // Cập nhật thành công
    //     } else {
    //         return false; // Lỗi khi thực thi câu lệnh SQL
    //     }
    // }
?>