<?php

function deleteDirectory($directoryPath)
{
    try {
        // Kiểm tra xem thư mục tồn tại hay không
        if (is_dir($directoryPath)) {
            // Xóa nội dung của thư mục
            $files = glob($directoryPath . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                } elseif (is_dir($file)) {
                    deleteDirectory($file);
                }
            }
            // Xóa thư mục sau khi nội dung đã được xóa
            rmdir($directoryPath);
            echo "Thư mục đã được xóa thành công!";
        } else {
            echo "Thư mục không tồn tại!";
        }
    } catch (Exception $e) {
        echo "Đã có lỗi xảy ra: " . $e->getMessage();
    }
}

$directoryPath = 'D:\Vku\example-app\public\images'; // Đường dẫn tương đối đến thư mục
echo $directoryPath;
deleteDirectory($directoryPath);
?>
