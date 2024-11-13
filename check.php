<?php
// Bắt đầu bộ đệm đầu ra
ob_start();

// Lấy thông tin CPU
$cpuInfo = shell_exec("lscpu");
$cpu = nl2br(htmlspecialchars($cpuInfo));

// Lấy thông tin RAM
$memInfo = shell_exec("free -h");
$memory = nl2br(htmlspecialchars($memInfo));

// Lấy thông tin phiên bản PHP
$phpVersion = phpversion();

// Lấy thông tin hệ điều hành
$os = php_uname();

// Lấy thông tin bộ nhớ
$diskUsage = shell_exec("df -h");
$disk = nl2br(htmlspecialchars($diskUsage));

// Tạo nội dung HTML
$htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hệ thống</title>
    <style>
        body { font-family: Arial, sans-serif; }
        pre { background: #f4f4f4; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Thông tin hệ thống server</h1>
    <h2>CPU</h2>
    <pre>$cpu</pre>
    
    <h2>RAM</h2>
    <pre>$memory</pre>
    
    <h2>Phiên bản PHP</h2>
    <p>$phpVersion</p>
    
    <h2>Mã Linux</h2>
    <pre>$os</pre>
    
    <h2>Bộ nhớ</h2>
    <pre>$disk</pre>
</body>
</html>
HTML;

// Ghi nội dung HTML vào file info.html
file_put_contents('info.html', ob_get_clean());

echo "Thông tin hệ thống đã được ghi vào file info.html.";
?>
