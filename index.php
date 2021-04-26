<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    
    <input type="file" name="fileToUpLoad" id="fileToUpLoad">
    <input type="submit" value="Upload file" name="submit">
    
    </form>
    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpLoad"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpLoad"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
      
    }
    ?>
</body>
</html>