<?php
// تأكد من أن النموذج تم تقديمه باستخدام طريقة POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // التحقق من أن البيانات ليست فارغة
    if (!empty($name) && !empty($email) && !empty($message)) {
        // إعداد البريد الإلكتروني
        $to = "rekabrayen@gmail.com"; // استبدل بعنوان بريدك الإلكتروني
        $subject = "رسالة جديدة من موقعك";
        $body = "اسم المرسل: $name\nالبريد الإلكتروني: $email\n\nالرسالة:\n$message";
        $headers = "From: $email";

        // إرسال البريد الإلكتروني
        if (mail($to, $subject, $body, $headers)) {
            echo "<p>تم إرسال رسالتك بنجاح. سنرد عليك قريباً.</p>";
        } else {
            echo "<p>عذرًا، هناك مشكلة في إرسال رسالتك. يرجى المحاولة لاحقًا.</p>";
        }
    } else {
        echo "<p>يرجى ملء جميع الحقول المطلوبة.</p>";
    }
} else {
    // إذا لم يتم تقديم النموذج، اعادة توجيه المستخدم
    header("Location: index.html");
    exit;
}
?>
