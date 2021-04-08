<form action="index.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="upfile" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submitupload">
</form>
<br>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["upfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submitupload"])) {
  
  $check = getimagesize($_FILES["upfile"]["tmp_name"]);
  
  if($check !== false) {
    echo ("File is an image - " . $check["mime"] . ".");
    $uploadOk = 1;
  } else {
    echo ("-X- File is not an image. ");
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
  echo ("-X- Sorry, file already exists.");
  $uploadOk = 0;
} else {
  echo ("New file OK ");
}

// Check file size
/* if ($_FILES["upfile"]["size"] > 500000) {
  echo ("-X- Filen är för stor ");
  $uploadOk = 0;
} else {
  echo ("Filen är en bra storlek ");
} */

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo ("-X- Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  $uploadOk = 0;
} else {
  echo ("Rätt sorts format! ");
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo ("Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
    echo ("The file ". htmlspecialchars( basename( $_FILES["upfile"]["name"])). " has been uploaded.");
} else {
    echo (" Something went wrong.");
}
} else {
  echo("<p>Känn dig fri att uploada en bild fil</p>");
}
?>
<div class="imagediv">
<?php
$dir          = './uploads/';
$file_display = array(
    'jpg',
    'jpeg',
    'png',
    'gif'
);

if (file_exists($dir) == false) {
    echo 'Directory \''. $dir. '\' not found!';
} else {
    $dir_contents = scandir($dir);

    foreach ($dir_contents as $file) {
        $file_type = strtolower(end(explode('.', $file)));

        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
            echo '<img src="'. $dir. '/', $file. '"width="150px" alt="'. $file. '" />';
        }
    }
}
?>
</div>