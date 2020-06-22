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
  <td style="border-right:1px solid #DCDCDC">ID kategorije:</td>
  <td style="border-right:1px solid #DCDCDC">Ime kategorije:</td>
  <td style="border-right:1px solid #DCDCDC">Opis kategorije:</td>
  <td style="border-right:1px solid #DCDCDC">Objavljeno:</td>
  <td style="border-right:1px solid #DCDCDC">Uredi:</td>
  <td>Izbriši:</td>
  </tr>
<?php
$cat_query = mysqli_query($connection, "SELECT * FROM kategorija");
while($cat_row = mysqli_fetch_array($cat_query))
{
  $cat_id = $cat_row['id_kategorije'];
  $cat_name = $cat_row['ime_kategorije'];
  $cat_desc = $cat_row['opis_kategorije'];
  $cat_show = $cat_row['prikaz_kategorije'];
?>
  <tr class="border">
    <td><?php echo $cat_id; ?></td>
    <td><?php echo $cat_name; ?></td>
    <td><?php echo $cat_desc; ?></td>
    <?php
    if($cat_show == 1)
    {
      echo '<td><img src="images/checkmark.png" width="20" height="20" /></td>';
    }
    else
    {
      echo '<td><img src="images/x.png" width="20" height="20" /></td>';
    }
    ?>
    <td>
    <form method="post">
    <a href="updatecategory.php?cid=<?php echo $cat_id; ?>"><img class="cursor" src="images/update.png" width="30" height="30" /></a>
    </form>
    </td>
    <script>
 var el = document.getElementById('form');

el.addEventListener('submit', function(){
    return confirm('Jeste li sigurni da želite obrisati kategoriju?');
}, false);
</script>
    <form method="post" onsubmit="return confirm('Jeste li sigurni da želite obrisati kategoriju?');">
    <td><input type="image" name="delete-btn"  class="cursor" src="images/delete.png" width="30" height="30" />
    <input type="hidden" name="cat-id" value="<?php echo $cat_id; ?>" /></td>
    </form>
<?php
    if(isset($_POST['delete-btn_x']))
    {
      $category_id = $_POST['cat-id'];
      mysqli_query($connection, "DELETE FROM kategorija WHERE id_kategorije = '$category_id'");
      header("Location:category.php");
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