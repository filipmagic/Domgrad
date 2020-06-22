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
     <span>Ime kategorije:</span>
     <input type="text" name="cat-name" required />
     <br>
     <span>Opis kategorije:</span>
     <textarea name="cat-description" cols="30" rows="10" required></textarea>
     <br>
     <span>Prikaži na izborniku:</span>
     <input type="checkbox" name="show-menu" value="1" />
     <br>
     <input type="submit" name="upload-btn" value="Ažuriraj" />
   </form>
<?php
if(isset($_POST["upload-btn"])) {
$category_name = $_POST['cat-name'];
$category_desc = $_POST['cat-description'];
$show_cat = isset($_POST['show-menu']);

if(!empty($category_name) && !empty($category_desc)){
 mysqli_query($connection, "INSERT INTO kategorija (ime_kategorije, opis_kategorije, prikaz_kategorije) VALUES('$category_name', '$category_desc','$show_cat')");
}
else
{echo "Došlo je do pogreške";}

header("Location:products.php");
}
?>
</div>
  
</div>
</div>
</body>
</html>