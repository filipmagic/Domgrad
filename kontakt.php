<?php
include 'connection.php';
if(isset($_GET['cid'])){
$cid = (int)$_GET['cid'];
}
?>
<?php
if(isset($_POST['posalji'])){
    $to = "domgrad@vz.t-com.hr";
    $name = $_POST['ime'];
    $number = $_POST['broj'];
    $from = $_POST['email'];
    $subject = "Upit";
    $subject2 = "Kopija upita";
    $message =  $name . "," . "\r\n" . "Broj telefona:" . $number . "\r\n" . $_POST['upit']; 
    $message2 =  $name . "," . "\r\n" . "Broj telefona:" . $number . "\r\n" . $_POST['upit']; 
  
   
    if(mail($to,$subject,$message,"From: <$from>\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit") && mail($from,$subject2,$message2,"From: <$to>\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit"))
    {
      echo "";
    }
    else
    {
     $errorMessage = "Dogodila se pogreška, pokušajte ponovno";
    }
    }
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Kontakt-Domgrad</title>
     <link rel="stylesheet" href="domstyle.css" type="text/css" />
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="animation.js"></script>
    <script src="mobilemenu.js"></script>
    <script src="mobilemenux.js"></script>

     <script>
      function initMap() {
        var uluru = {lat: 46.3008123, lng: 16.3914515};
        var map = new google.maps.Map(document.getElementById('map-wrapper'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      $("#map-wrapper").css("position","fixed !important");
     </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCRDkkdKgJv1Tg_roHzbIf6lohaS182R8&callback=initMap"></script>
      
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
           <li><a href="partneri.php">PARTNERI</a></li>
           <li class="active"><a href="kontakt.php">KONTAKT</a></li>
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
      <div class="space">&nbsp;</div>
      <div class="contact">
      <div class="contact-info">
         <h4>DOMGRAD trgovina na malo i veliko d.o.o.</h4><br><br>
        <div class="sec-1">
          <div class="location-icon">
              <img src="images/map2.png" class="inner-image" />
          </div>
          <p class="location-txt">Dravska 15 (Ludbreška 116)<br>
          42202 Trnovec Bartolovečki<br><br>
          </p>
        </div>
        <div class="sec-1">
          <div class="info-icon">
            <img src="images/info2.png" class="inner-image" />
          </div>
          <p class="info-txt">
          Trgovački sud u Varaždinu,<br>
           MBS: 070042761<br>
          Temeljni kapital: 20.000,00 kn<br>
          Član uprave: Mario Špoljarić<br>
          Privredna banka Zagreb IBAN:
          <br> HR5423400091100020870
          </p>
         </div>
          <br><br>
         <div class="sec-1">
          <div class="phone-icon">
            <img src="images/phone2.png" class="inner-image" />
          </div>
          <div class="phone-txt">
          <p>
          Telefon : 042 683 824<br>
          Mobitel: 098 379501 Mario<br>
          Fax: 042 683 825 Mario<br>
          eMail: domgrad@vz.t-com.hr<br>
          </p>
          </div>
          </div>
      </div>
      <div class="contact-form">
       <h2>KONTAKTIRAJTE NAS</h2>
       <div class="contact-right">
         <form method="post" accept-charset="UTF-8">
          <?php
        if(!empty($errorMessage))
            {
                echo '<div class="error-area" style="display:block;"><p>' . $errorMessage . '</p></div>';
            }
       ?>
              <input type="text" name="ime" placeholder="Ime i prezime" required />
              <input type="email" name="email" placeholder="E-mail" required />
              <input type="text" name="broj" placeholder="Broj telefona" />
              <textarea rows="4" cols="50" name="upit" placeholder="Vaš upit..." style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" required></textarea>
              <input type="submit" name="posalji" value="POŠALJI" id="send-btn" class="btn" />
            </form>
        </div>
      </div>
      </div>
      <div id="map-wrapper">
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