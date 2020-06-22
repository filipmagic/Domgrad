<?php
include 'connection.php';
if(isset($_GET['cid'])){
$cid = (int)$_GET['cid'];
}
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Partneri-Domgrad</title>
     <link rel="stylesheet" href="domstyle.css" type="text/css" />
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		 <script src="animation.js"></script>
     <script src="mobilemenu.js"></script>
     <script src="mobilemenux.js"></script>
  </head>
  <body>
    <div id="page-wrapper">
     <div class="nav">
        <nav>
          <div class="logo"></div>
          <ul>
           <li><a href="index.php">POČETNA</a></li>
           <div class="drop-down">
            <li><a href="ponuda.php" class="drop-down-link">PONUDA</a></li>
             <div class="drop-down-items">
           <?php
            
             $menu_query = mysqli_query($connection,"SELECT * FROM kategorija WHERE prikaz_kategorije = '1'");
             while($menu_row = mysqli_fetch_array($menu_query))
              {
                 $cat_id = $menu_row['id_kategorije'];
                 $cat_name = $menu_row['ime_kategorije'];
              ?>
             <li class="drop-down-item"><a href='kategorija.php?cid=<?php echo $cat_id; ?>'><?php echo $cat_name; ?></a></li>
          <?php
           }
           ?>
             </div>
           </div>
           <li><a href="akcije.php">AKCIJE</a></li>
           <li class="active"><a href="partneri.php">PARTNERI</a></li>
           <li><a href="kontakt.php">KONTAKT</a></li>
          </ul>
        </nav>
      </div>
      <div class="mobile-header">
      <div class="logo"></div>
       <div class="show-menu">
         <div class="line-1"></div>
         <div class="line-2"></div>
         <div class="line-3"></div>
       </div>
      </div>
       <div class="nav-mobile">
        <ul>
          <li><a href="index.php">POČETNA</a></li>
          <li><a href="ponuda.php" style="margin-left:25px">PONUDA</a>
            <span class="more"><img src="images/arrow.png" width="20" height="20"  style="margin-bottom:5px"/></span>
           </li>
           <div class="more-items">
             <ul>
             <?php
            
             $submenu_query = mysqli_query($connection,"SELECT * FROM kategorija WHERE prikaz_kategorije = '1'");
             while($submenu_row = mysqli_fetch_array($submenu_query))
              {
                 $subcat_id = $submenu_row['id_kategorije'];
                 $subcat_name = $submenu_row['ime_kategorije'];
              ?>
             <li><a href='kategorija.php?cid=<?php echo $subcat_id; ?>'><?php echo $subcat_name; ?></a></li>
          <?php
           }
           ?>
             </ul>
            </div>
          <li><a href="akcije.php">AKCIJE</a></li>
          <li><a href="partneri.php">PARTNERI</a></li>
          <li><a href="kontakt.php">KONTAKT</a></li>
        </ul>
      </div>
      <div class="space"></div>
      <div class="partners-wrapper">
      
      <?php
       $partner_query = mysqli_query($connection, "SELECT * FROM partneri");
       while($partner_row = mysqli_fetch_array($partner_query))
       { 
        $partner_link = $partner_row['link_partner'];
        $partner_img = $partner_row['slika_partner']; 
      ?>
        <a href="<?php echo $partner_link; ?>" target="_blank">
        <div class="partner">
          <div class="partner-image">
           <img src="partneri/<?php echo $partner_img; ?>" />
          </div>
        </div>
        </a>
      <?php
       }
       ?>
      
      </div>
     </div>
     <footer>
        <div class="f-about">
         <h4>O nama</h4>
         <br>
          <p>DOMGRAD d.o.o., Trnovec je tvrtka koja se bavi <br>trgovinom građevinskog materijala na malo i veliko te uslugama prijevoza a
       djeluje od 1989. godine</p>
         </div>
         <div class="f-navigation">
          <h4>Navigacija</h4>
          <br>
          <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="ponuda.php">Ponuda</a></li>
            <li><a href="partneri.php">Partneri</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
          </ul>
         </div>
         <div class="f-contact">
         <h4>Kontakt</h4>
         <br>
          <p>
          Telefon : 042 683 824<br>
          Mobitel: 098 379501 Mario<br>
          Fax: 042 683 825 Mario<br>
          e-mail: domgrad@vz.t-com.hr<br>
          </p>
         </div>
     </footer>
    </div>
  </body>
  </html>