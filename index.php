<?php
    require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--boostrap viet san cac class ho tro giao dien-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title> Thuc Hanh </title>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'danhsach':
                    require_once 'sanpham/danhsach.php';
                    break;
                case 'them':
                    require_once 'sanpham/them.php';
                    break;
                case 'sua':
                    require_once 'sanpham/sua.php';
                    break;
                case 'xoa':
                    require_once 'sanpham/xoa.php';
                    break;                   
                default: 
                    require_once 'sanpham/danhsach.php';
                    break;
            }
        }
        else{
            require_once 'sanpham/danhsach.php';
        }
    ?>
</body>
</html>