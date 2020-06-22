<?php
include 'connection.php';

if(isset($_GET['cid'])){
$cid = (int)$_GET['cid'];
}
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Domgrad-Trgovina građevinskog materijala</title>
     <link rel="stylesheet" href="domstyle.css" type="text/css" />
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="DOMGRAD d.o.o., Trnovec je tvrtka koja se bavi trgovinom građevinskog materijala na malo i veliko te uslugama prijevoza a djeluje od 1989. godine."/>
       <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<script src="carousel.js"></script>
		<script src="serviceanimation.js"></script>
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
           <li class="active"><a href="index.php">POČETNA</a></li>
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
      <div class="header">
      	
      </div>
      <div class="about">
       <div class="about-text">
        <h2>O nama</h2><br>
        <p>DOMGRAD d.o.o., Trnovec je tvrtka koja se bavi trgovinom građevinskog materijala na malo i veliko te uslugama prijevoza a
		   djeluje od 1989. godine. <br>
		   Glavni cilj tvrtke je "zadovoljan kupac" te stoga u ponudi tvrtke po najpovoljnijim cijenama nalazi se sve od krovnih pokrova i opreme, 
		   rezane građe, građevinskog materijala, fasadnih sistema, sistema suhe gradnje, pločastih materijala, izolacija, boje, lakova i alata.</p>
       </div>
      
      </div>
      <div class="special">
      </div>
      <div class="services">
        <div class="service-wrapper">
          <div class="service trans0">
             <img src="images/krovnipokrovi.png" alt="Krovni pokrovi"/>
          	 <div class="service-text">
          	 	 <h2>KROVNI POKROVI</h2>
          	 	 <p>Sitnice mogu prouzročiti teškoće. A krov je pouzdan koliko su pouzdani svi elementi koji se na njemu postavljaju.</p>
          	 </div>
          </div>
          <div class="service trans">
              <img src="images/izolacija.png" alt="Toplinska izolacija, Stiropor" />
          	  <div class="service-text">
          	 	 <h2>TOPLINSKA IZOLACIJA, STIROPOR</h2>
          	 	 <p>Knauf gips kartonske ploče su suvremeni standard gradnje poslovnih i stambenih prostora koje svojim osobinama i kvalitetom omogućuju kreativno oblikovanje prostora.</p>
          	 </div>
          </div>
          <div class="service trans2">
              <img src="images/akril.jpg" alt="Fasadne završne žbuke" />
          	  <div class="service-text">
          	 	 <h2>FASADNE ZAVRŠNE ŽBUKE</h2>
          	 	 <p>Akrilna fasadna boja
                 Najčešće upotrebljavana, jako vodoodbojna i s vodom rijedljiva fasadna boja. Primjerena je za bojanje gladkih fino ožbukanih i betonskih fasadnih površina, starih tek nekoliko mjeseci.</p>
          	 </div>
          </div>
      </div>
       </div>
     <div class="partners">
		<div class="container">
		 <h2 style="color:white">/</h2>
		   <section class="customer-logos slider">
		      <div class="slide"><img src="partneri/partner.png"></div>
		      <div class="slide"><img src="partneri/partner2.gif"></div>
		      <div class="slide"><img src="partneri/partner3.png"></div>
		      <div class="slide"><img src="partneri/partner4.jpg"></div>
		      <div class="slide"><img src="partneri/partner4.png"></div>
		      <div class="slide"><img src="partneri/partner5.png"></div>
		      <div class="slide"><img src="partneri/partner6.jpg"></div>
		      <div class="slide"><img src="partneri/partner7.jpg"></div>
		      <div class="slide"><img src="partneri/partner8.jpg"></div>

		   </section>
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