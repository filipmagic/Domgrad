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
  <div class="content">
  <div class="left">
  <?php
  $user_query = mysqli_query($connection, "SELECT * FROM admin WHERE admin_id = '$admin_id'");
   while($admin_row = mysqli_fetch_array($user_query))
   { 
    $admin_name = $admin_row['admin_name'];
   ?>
   <div class="greeting">Dobrodošao <?php echo $admin_name; ?></div>
   <?php
 }
   ?>
  </div>
  <div class="right">
   <div class="design-elements">
      <ul>
         <h4>Proizvodi</h4>
         <li class="add-product"><a href="addproduct.php">Dodaj proizvod</a></li>
         <li class="scdn-item"><a href="products.php">Uredi proizvod</a></li>
      </ul>
     <ul>
       <h4>Partneri</h4>
       <li class="add-product"><a href="addpartner.php">Dodaj partnera</a></li>
       <li class="scdn-item"><a href="partners.php">Uredi partnera</a></li>
     </ul>
      <ul>
       <h4>Kategorije</h4>
       <li class="add-product"><a href="addcategory.php">Dodaj kategoriju</a></li>
       <li class="scdn-item"><a href="category.php">Uredi kategoriju</a></li>
     </ul>
      <ul>
         <h4>Akcije</h4>
         <li class="add-product"><a href="addaction.php">Dodaj akcije</a></li>
         <li class="scdn-item"><a href="actions.php">Uredi akcije</a></li>
      </ul>

   </div> 
  </div>  
  </div>
</div>
 </div>
</body>
</html>