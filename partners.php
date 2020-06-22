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
  <td style="border-right:1px solid #DCDCDC">ID partnera:</td>
  <td style="border-right:1px solid #DCDCDC">Link partnera:</td>
  <td style="border-right:1px solid #DCDCDC">Slika partnera:</td>
  <td style="border-right:1px solid #DCDCDC">Uredi:</td>
  <td>Izbriši:</td>
  </tr>
<?php
$partner_query = mysqli_query($connection, "SELECT * FROM partneri");
while($partner_row = mysqli_fetch_array($partner_query))
{
  $partner_id = $partner_row['id_partnera'];
  $partner_link = $partner_row['link_partner'];
  $partner_image = $partner_row['slika_partner'];
?>
  <tr class="border">
    <td><?php echo $partner_id; ?></td>
    <td><?php echo $partner_link; ?></td>
    <td><img src="partneri/<?php echo $partner_image; ?>" width="100" height="75" /></td>
    <td>
    <form method="post">
    <a href="updatepartner.php?pid=<?php echo $partner_id; ?>"><img class="cursor" src="images/update.png" width="30" height="30" /></a>
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
    <input type="hidden" name="partner-id" value="<?php echo $partner_id; ?>" /></td>
    </form>
<?php
    if(isset($_POST['delete-btn_x']))
    {
      $part_id = $_POST['partner-id'];
      mysqli_query($connection, "DELETE FROM partneri WHERE id_partnera = '$part_id'");
      header("Location:partners.php");
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