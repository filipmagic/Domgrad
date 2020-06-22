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
if(isset($_GET['pid'])){
$pid = (int)$_GET['pid'];
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
$prod_query = mysqli_query($connection, "SELECT * FROM proizvod WHERE proizvod_id = '$pid'");
while($prod_row = mysqli_fetch_array($prod_query))
{
  $prod_name = $prod_row['opis_proizvod'];
  $prod_img = $prod_row['slika_proizvod'];
  $prod_cat = $prod_row['id_kategorije'];
  $prod_id = $prod_row['id_kategorije'];

?>
   <form  method="post" enctype="multipart/form-data" class="form-align">
     <span>Ime proizvoda:</span>
     <input type="text" name="prod-name" value="<?php echo $prod_name; ?>"/>
     <br>
     <span>Slika proizvoda</span>
     <input type="file" name="prod-img" id="prod-img"  />
     <br>
     <span>Kategorija:</span>
     <select name="prod-cat">
     <?php 
      $default_cat = mysqli_query($connection, "SELECT ime_kategorije FROM kategorija WHERE id_kategorije = '$prod_id'");
     while($scat_row = mysqli_fetch_array($default_cat))
     {
       $scat_name = $scat_row['ime_kategorije'];
     ?>
        <option selected="selected" value="<?php echo $prod_id; ?>">
          <?php echo $scat_name; ?>
        </option>

    <?php
  }
  ?>
    <?php 
     $cat_query = mysqli_query($connection, "SELECT id_kategorije, ime_kategorije FROM kategorija");
     while($cat_row = mysqli_fetch_array($cat_query))
     {
       $cat_id = $cat_row['id_kategorije'];
       $cat_name = $cat_row['ime_kategorije'];
    ?>
        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
    <?php
  }
  ?>
     </select>
     <br>
     <input type="submit" name="upload-btn" value="Ažuriraj" />
   </form>
<?php
}
?>
<?php
$name = isset($_FILES["prod-img"]["name"]) ? $_FILES["prod-img"]["name"] : '';
$size = isset($_FILES["prod-img"]["size"]) ? $_FILES["prod-img"]["size"] : '';
$target_dir = "proizvodi/";
$target_file = $target_dir . basename($name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["upload-btn"])) {
$product_name = $_POST['prod-name'];
$product_cat = $_POST['prod-cat'];
 if($size == 0) {
  echo "";
}
else{
    $check = getimagesize($_FILES["prod-img"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["prod-img"]["tmp_name"], $target_file)) {
        echo "Datoteka ". basename($name). " je uspješno prenesena." . '<br>';
    } else {
        echo "Dogodila se pogreška tijekom prijenosa" . '<br>';
    }
 }
}
if(!empty($product_name) && !empty($product_cat)){
 mysqli_query($connection, "UPDATE proizvod SET opis_proizvod = '$product_name', id_kategorije = '$product_cat' WHERE proizvod_id = '$pid'");
}
else
{echo "";}
if(!empty($name)){
 mysqli_query($connection, "UPDATE proizvod SET slika_proizvod = '$name' WHERE proizvod_id = '$pid'");
}
else
{echo "";}
header("Location:products.php?='$pid'");
}
?>
</div>
  
</div>
</div>
</body>
</html>