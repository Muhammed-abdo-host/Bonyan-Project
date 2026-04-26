<?php
include 'db_conn.php'; // استدعاء ملف الاتصال

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // تشفير الباسورد للأمان
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    // جملة الإضافة للجدول اللي في الصورة
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_pass')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('تم إنشاء الحساب بنجاح!');
                window.location.href='login.html';
              </script>";
    } else {
        echo "خطأ في التسجيل: " . mysqli_error($conn);
    }
}
?>