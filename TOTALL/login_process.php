<?php
session_start(); // لبدء جلسة المستخدم بعد الدخول
include 'db_conn.php'; // استدعاء ملف الربط اللي عملناه قبل كدة

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // البحث عن المستخدم بالإيميل في جدول users
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // التأكد من كلمة المرور المشفرة
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['fullname'];
            
            echo "<script>
                    alert('أهلاً بك يا ' + '" . $row['fullname'] . "');
                    window.location.href='index.html'; 
                  </script>";
        } else {
            echo "<script>alert('كلمة المرور غير صحيحة'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('هذا البريد غير مسجل لدينا'); window.history.back();</script>";
    }
}
?>