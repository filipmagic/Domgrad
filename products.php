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
  <div class="products-display">
  <table>
  <tr style="border-bottom:1px solid #DCDCDC">
  <td style="border-right:1px solid #DCDCDC">ID proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Ime proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Slika proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Kategorija:</td>
  <td style="border-right:1px solid #DCDCDC">Uredi:</td>
  <td>Izbriši:</td>
  </tr>
<?php
$product_query = mysqli_query($connection, "SELECT * FROM proizvod");
while($product_row = mysqli_fetch_array($product_query))
{
  $product_id = $product_row['proizvod_id'];
  $product_name = $product_row['opis_proizvod'];
  $product_image = $product_row['slika_proizvod'];
  $cat_id = $product_row['id_kategorije'];
?>
  <tr class="border">
    <td><?php echo $product_id; ?></td>
    <td><?php echo $product_name; ?></td>
    <td><img src="proizvodi/<?php echo $product_image; ?>" width="100" height="75" /></td>
  <?php
  $cat_join = mysqli_query($connection, "SELECT ime_kategorije FROM kategorija WHERE id_kategorije = '$cat_id'");
  while($cat_row = mysqli_fetch_array($cat_join))
    { $cat_name = $cat_row['ime_kategorije'];
  ?>
    <td><?php echo $cat_name; ?></td>
  <?php
}
?>
    <td>
    <form method="post" id="form">
    <a href="updateproduct.php?pid=<?php echo $product_id; ?>"><img class="cursor" src="images/update.png" width="30" height="30" /></a>
    </form>
    </td>
    <script>
 var el = document.getElementById('form');

el.addEventListener('submit', function(){
    return confirm('Jeste li sigurni da želite obrisati proizvod?');
}, false);
</script>
    <form method="post" onsubmit="return confirm('Jeste li sigurni da želite obrisati proizvod?');">
    <td><input type="image" name="delete-btn"  class="cursor" src="images/delete.png" width="30" height="30" />
    <input type="hidden" name="prod-id" value="<?php echo $product_id; ?>" /></td>
    </form>
    <?php
    if(isset($_POST['delete-btn_x']))
    {
      $prod_id = $_POST['prod-id'];
      mysqli_query($connection, "DELETE FROM proizvod WHERE proizvod_id = '$prod_id'");
      header("Location:products.php");
    }
   ?>

  </tr>
<?php
}
?>

  </div>
</div>
</div>
 </div>
</body>
</html>