<?php
include 'connection.php';
session_start();
$admin_id = $_SESSION['user'];
if(isset($admin_id)!="")
{
  echo "";
}
else{
  header("Location:adminlogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="dombackstyle.css" type="text/css" />
</head>
<body>
 <div class="wrapper">
 <div class="menu">
 <div class="cms-logo">Domgrad <span>CMS 1.0</span></div>
  <ul>
       <li><a href="adminpanel.php">Dashboard</a></li>
       <li><a href="products.php">Proizvodi</a></li>
       <li><a href="partners.php">Partneri</a></li>
       <li><a href="category.php">Kategorije</a></li>
       <li><a href="actions.php">Akcije</a></li>
       <li><a href="logout.php">Odjava</a></li>
    </ul>
 </div>
<div class="right-side">
<div class="update-container">
   <form  method="post" enctype="multipart/form-data" class="form-align">
     <span>Link partnera:</span>
     <input type="text" name="partner-link" />
     <br>
     <span>Slika partnera:</span>
     <input type="file" name="partner-img" id="prod-img"  />
     <br>
     <input type="submit" name="upload-btn" value="Ažuriraj" />
   </form>
<?php
$name = isset($_FILES["partner-img"]["name"]) ? $_FILES["partner-img"]["name"] : '';
$size = isset($_FILES["partner-img"]["size"]) ? $_FILES["partner-img"]["size"] : '';
$target_dir = "partneri/";
$target_file = $target_dir . basename($name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["upload-btn"])) {
$partner_link = $_POST['partner-link'];
 if($size == 0) {
  echo "";
}
else{
    $check = getimagesize($_FILES["partner-img"]["tmp_name"]);
    if($check !== false) {
        echo "Datoteka je fotografija - " . $check["mime"] . "." . '<br>';
        $uploadOk = 1;
    } else {
        echo "Datoteka nije fotografija" . '<br>';
        $uploadOk = 0;
    }
  if (file_exists($target_file)) {
    echo "Datoteka već postoji." . '<br>';
    $uploadOk = 0;
}
if ($size > 500000) {
    echo "Datoteka je prevelika." . '<br>';
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Podražani su samo formati:JPG,JPEG,PNG,GIF." . '<br>';
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Datoteka nije prenesena.";
} else {
    if (move_uploaded_file($_FILES["partner-img"]["tmp_name"], $target_file)) {
        echo "Datoteka ". basename($name). " je uspješno prenesena." . '<br>';
    } else {
        echo "Dogodila se pogreška tijekom prijenosa" . '<br>';
    }
 }
}
if(!empty($partner_link) && !empty($name)){
 mysqli_query($connection, "INSERT INTO partneri (slika_partner, link_partner) VALUES('$name', '$partner_link')");
}
else
{echo "Došlo je do pogreške";}
}
?>
</div>
  
</div>
</div>
</body>
</html>