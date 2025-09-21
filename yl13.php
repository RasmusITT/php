<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed = ['jpg', 'jpeg'];
        $fileName = $_FILES['image']['name'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $newName = uniqid() . "." . $ext;
            move_uploaded_file($fileTmp, "uploads/" . $newName);
            echo "<p>Pilt laeti edukalt üles!</p>";
        } else {
            echo "<p style='color:red'>lubatud on ainult JPG/JPEG failid</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <style>
        img.thumb {
            width: 150px;
            margin: 10px;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 8px;
        }
        #modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
        }
        #modal img {
            max-width: 90%;
            max-height: 90%;
            border: 4px solid white;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept=".jpg,.jpeg" required>
        <button type="submit">Laadi yles</button>
    </form>

    <h3>yleslaetud pildid:</h3>
    <div>
        <?php
        $files = glob("uploads/*.{jpg,jpeg,JPG,JPEG}", GLOB_BRACE);
        foreach ($files as $file) {
            echo "<img src='$file' class='thumb' onclick='showImage(this.src)'>";
        }
        ?>
    </div>

    <div id="modal" onclick="this.style.display='none'">
        <img id="modalImg">
    </div>

    <script>
        function showImage(src) {
            document.getElementById('modalImg').src = src;
            document.getElementById('modal').style.display = 'flex';
        }
    </script>
</body>
</html>
