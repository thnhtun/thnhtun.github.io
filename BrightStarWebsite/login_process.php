<?php
    // Kết nối đến cơ sở dữ liệu
    include "connect.php";

    // Lấy thông tin đăng nhập từ biến POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem có dòng dữ liệu nào trả về hay không
    if(mysqli_num_rows($result) > 0) {
        // Nếu có, đăng nhập thành công
        header("Location: home.php");
        exit();
    } else {
        // Nếu không, hiển thị thông báo lỗi
        echo "<script>
                alert('Sai tên tài khoản hoặc mật khẩu!');
                window.location.href = 'login.php'; // Chuyển hướng người dùng trở lại trang đăng nhập
            </script>";
        exit();
    }
?>
