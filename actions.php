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
  <td style="border-right:1px solid #DCDCDC">ID akcijskog proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Naziv proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Opis proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Cijena proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Slika proizvoda:</td>
  <td style="border-right:1px solid #DCDCDC">Uredi:</td>
  <td>Izbriši:</td>
  </tr>
<?php
$action_query = mysqli_query($connection, "SELECT * FROM akcije");
while($action_row = mysqli_fetch_array($action_query))
{
  $action_id = $action_row['id_akcije'];
  $action_name = $action_row['ime_akcije'];
  $action_image = $action_row['slika_akcije'];
  $action_desc = $action_row['opis_akcije'];
  $action_price = $action_row['cijena_akcije'];
?>
  <tr class="border">
    <td><?php echo $action_id; ?></td>
    <td><?php echo $action_name; ?></td>
    <td><?php echo $action_desc; ?></td>
    <td><?php echo $action_price; ?></td>
    <td><img src="proizvodi/<?php echo $action_image; ?>" width="100" height="75" /></td>
    <td>
    <form method="post">
    <a href="updateaction.php?aid=<?php echo $action_id; ?>"><img class="cursor" src="images/update.png" width="30" height="30" /></a>
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
    <input type="hidden" name="action-id" value="<?php echo $action_id; ?>" /></td>
    </form>
<?php
    if(isset($_POST['delete-btn_x']))
    {
      $act_id = $_POST['action-id'];
      mysqli_query($connection, "DELETE FROM akcije WHERE id_akcije = '$act_id'");
      header("Location:actions.php");
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