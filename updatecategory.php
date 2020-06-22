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
if(isset($_GET['cid'])){
$cid = (int)$_GET['cid'];
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
$cat_query = mysqli_query($connection, "SELECT * FROM kategorija WHERE id_kategorije = '$cid'");
while($cat_row = mysqli_fetch_array($cat_query))
{
  $cat_name = $cat_row['ime_kategorije'];
  $cat_desc = $cat_row['opis_kategorije'];
  $cat_show = $cat_row['prikaz_kategorije'];

?>
   <form  method="post" enctype="multipart/form-data" class="form-align">
     <span>Ime proizvoda:</span>
     <input type="text" name="cat-name" value="<?php echo $cat_name; ?>"/>
     <br>
     <span>Opis kategorije:</span>
     <textarea name="cat-desc" cols="30" rows="10"><?php echo $cat_desc; ?></textarea>
     <br>
     <span>Prikaži na izborniku:</span>
     <?php
     if($cat_show == 1)
     {
       echo '<input type="checkbox" name="show-menu" value="1" checked/>';
    }
    else{
       echo '<input type="checkbox" name="show-menu" value="1" />';
    }
     ?>
     <br>
     <input type="submit" name="upload-btn" value="Ažuriraj" />
   </form>
<?php
}
?>
<?php
if(isset($_POST["upload-btn"])) {
$category_name = $_POST['cat-name'];
$category_desc = $_POST['cat-desc'];
$category_show = isset($_POST['show-menu']);
 
if(!empty($category_name) && !empty($category_desc)){
 mysqli_query($connection, "UPDATE kategorija SET ime_kategorije = '$category_name', opis_kategorije = '$category_desc', prikaz_kategorije = '$category_show' WHERE id_kategorije = '$cid'");
}
else
{echo "";}
header("Location:category.php");
}
?>
</div>
  
</div>
</div>
</body>
</html>