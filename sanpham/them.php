<?php
    $sql_brand = " SELECT * FROM brands"; // hanh dong trong database 
    $query_brand = mysqli_query($connect, $sql_brand);// ket noi database, hanh dong minh muon thuc hien trong database 

    if(isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];

        $image = $_FILES['image']['name'];  // chi goi ten file va hinh anh ra 
        /*
            myfile : chỉ số mảng tương ứng với tên phần tử input, upload file.
            name : tên gốc (ban đầu) của file.
            type : kiểu file (tùy phần mở rộng có thể là text/plain, image/jpg, image/png ...)
            tmp_name : nơi lưu tạm file upload lên, nếu muốn di chuyển nó ra khỏi thư mục tạm dùng hàm move_uploaded_file.
            error : mã lỗi, nếu mã này bằng 0 là không lỗi.
            size : cỡ file (byte).
        */
        $image_tmp = $_FILES['image']['tmp_name'];  // $image_tmp nơi lưu tạm file upload lên ,
                                                    // nếu muốn di chuyển nó ra khỏi thư mục tạm dùng hàm move_uploaded_file.
        $price = $_POST['price'];
        $quality = $_POST['quality'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];

        $sql = "INSERT INTO products (prd_name,image,price,quality,description,brand_id)
        VALUES ('$prd_name','$image', $price , $quality ,'$description', $brand_id )";
        $query = mysqli_query($connect, $sql);
        move_uploaded_file($image_tmp, 'img/'.$image);
        header('location: index.php?page_layout=danhsach');  // thẻ header để điều hướng, chuyển hướng trang
    }   // header để khắc phục tình trạng lỗi font khi trả kết quả về không có định dạng thẻ meta utf8 bằng cách:
        // header('Content-Type: text/html; charset=utf-8');

?>


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="prd_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label> <br>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Số lượng sản phẩm</label>
                    <input type="number" name="quality" class="form-control" required>
                </div>    

                <div class="form-group">
                    <label for="">Mô tả sản phẩm</label>
                    <input type="text" name="description" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php                                                        /*mysqli_fetch_assoc() sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp*/ 
                            while($row_brand = mysqli_fetch_assoc($query_brand)) {?> <!-- mysqli_fech_assco luu query_brand duoi dang mang va se cho lap den bao gio het phan tu trong mang-->
                                <option value = "<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div>                
                
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>
        </div>
    </div>

</div>