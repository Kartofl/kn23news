

<?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["submit"])) {
            header("Location: index.php");
            exit();
        }



        $fileName = $_FILES["fileToUpload"]["name"];
        $fileSize = $_FILES["fileToUpload"]["size"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileExtensions = ['txt', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png', 'gif'];
        $CorrectFile = true;

        $target_loc = "";
        if (in_array($fileExtension, ['txt', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'])) {
            $target_loc = "uploads/docs/";
        } elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
            $target_loc = "uploads/images/";
        }




        if (file_exists($target_loc . $fileName)) {
            echo "Файл з ім'ям $fileName вже існує.";
            $CorrectFile = false;
        }

        elseif (!in_array($fileExtension, $fileExtensions)) {
            echo "Цей тип файлів не підтримується.";
            $CorrectFile = false;
        }

        elseif ($fileSize > 10000000) {
            echo "Файл занадто великий. Максимальний розмір файлу - 10MB.";
            $CorrectFile = false;
        }

        $userFileName = isset($_POST["fileName"]) ? trim($_POST["fileName"]) : '';

        if ($CorrectFile && empty($userFileName)) {
            $Time = date('Y-m-d_H-i-s');
            $fileName = "file_" . $Time . "." . $fileExtension;
        } else {

            $sanitizedFileName = preg_replace('/[^A-Za-z0-9_-]/', '', $userFileName);
            $userFileName = ($sanitizedFileName !== '') ? $sanitizedFileName : "file";
            $Time = date('Y-m-d_H-i-s');
            $fileName = $userFileName . "_" . $Time . "." . $fileExtension;
        }

        if ($CorrectFile && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_loc . $fileName)) {
            echo "Файл $fileName успішно завантажено.";
        }
        echo '<p><a href="index.php">Go home</a></p>';


    }












