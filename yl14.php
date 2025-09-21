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
$dir = "uploads/";

$images = glob($dir . "*.{jpg,jpeg,JPG,JPEG}", GLOB_BRACE);

$randomImage = null;
if (!empty($images)) {
    $randomImage = $images[array_rand($images)];
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>ylesanne 14</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 20px;
        }
        .gallery img {
            width: 100%;
            cursor: pointer;
            border-radius: 8px;
            border: 2px solid #ddd;
            transition: transform 0.2s;
        }
        .gallery img:hover {
            transform: scale(1.05);
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
            border: 5px solid white;
            border-radius: 10px;
        }
    </style>
</head>


    <h2>ylesanne 14</h2>

    
    <h3>Suvaline pilt:</h3>
    <?php if ($randomImage): ?>
        <img src="<?php echo $randomImage; ?>" alt="suvaline pilt" style="max-width:300px; border:2px solid #333; border-radius:8px;">
    <?php else: ?>
        <p>pilte ei leitud</p>
    <?php endif; ?>

    
    <h3>Pisipildid veergudes:</h3>
    <div class="gallery">
        <?php foreach ($images as $img): ?>
            <img src="<?php echo $img; ?>" onclick="showImage(this.src)">
        <?php endforeach; ?>
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
