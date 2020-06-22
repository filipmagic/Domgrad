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
if(isset($_GET['aid'])){
$aid = (int)$_GET['aid'];
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
<?php
$act_query = mysqli_query($connection, "SELECT * FROM akcije WHERE id_akcije = '$aid'");
while($act_row = mysqli_fetch_array($act_query))
{
  $act_name = $act_row['ime_akcije'];
  $act_img = $act_row['slika_akcije'];
  $act_price = $act_row['cijena_akcije'];
  $act_desc = $act_row['opis_akcije'];

?>
   <form  method="post" enctype="multipart/form-data" class="form-align">
     <span>Naziv akcijskog proizvoda:</span>
     <input type="text" name="act-name" value="<?php echo $act_name; ?>"/>
     <br>
     <span>Cijena proizvoda:</span>
     <input type="text" name="act-price" value="<?php echo $act_price; ?>"/>
     <br>
     <textarea name="act-desc"><?php echo $act_desc; ?></textarea>
     <br>
     <span>Slika proizvoda</span>
     <input type="file" name="act-img" id="prod-img"  />
     <br>
     <br>
     <input type="submit" name="upload-btn" value="Ažuriraj" />
   </form>
<?php
}
?>
<?php
$name = isset($_FILES["act-img"]["name"]) ? $_FILES["act-img"]["name"] : '';
$size = isset($_FILES["act-img"]["size"]) ? $_FILES["act-img"]["size"] : '';
$target_dir = "proizvodi/";
$target_file = $target_dir . basename($name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["upload-btn"])) {
$action_name = $_POST['act-name'];
$action_price = $_POST['act-price'];
$action_desc = $_POST['act-desc'];
 if($size == 0) {
  echo "";
}
else{
    $check = getimagesize($_FILES["act-img"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["act-img"]["tmp_name"], $target_file)) {
        echo "Datoteka ". basename($name). " je uspješno prenesena." . '<br>';
    } else {
        echo "Dogodila se pogreška tijekom prijenosa" . '<br>';
    }
 }
}
if(!empty($action_name) && !empty($action_price)){
 mysqli_query($connection, "UPDATE akcije SET ime_akcije = '$action_name', cijena_akcije = '$action_price', opis_akcije = '$action_desc' WHERE id_akcije = '$aid'");
}
else
{echo "";}
if(!empty($name)){
 mysqli_query($connection, "UPDATE akcije SET slika_akcije = '$name' WHERE id_akcije = '$aid'");
}
else
{echo "";}
header("Location:actions.php");
}
?>
</div>
  
</div>
</div>
</body>
</html>