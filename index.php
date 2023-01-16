<?php 

include('functions/userfunctions.php'); 
include('includes/header.php'); 
include('includes/slider.php'); 

?>
    
<div class="py-5">
   <div class="container">
       <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
           
                <div class="owl-carousel">
           
                        <?php 

                            $trendingProducts = getAllTrending();
                            if(mysqli_num_rows($trendingProducts) > 0)
                            {
                                foreach($trendingProducts as $item){
                                    ?>
                                    <div class="item">
                                    <a href="product-view.php?product=<?= $item['slug']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                            <h6 class="text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                <?php
                                }
                            }
                        ?>  

                             
                </div>
            </div>
        </div>
   </div>   
</div>



<div class="py-5 bg-f2f2f2">
   <div class="container">
       <div class="row">
            <div class="col-md-12">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <br>
                <p>
                Bine ați venit la Aladin, prima destinație online pentru produsele de înaltă calitate și la prețuri accesibile.
                </p>
                <p>
                Compania noastră a fost înființată în 2022 de către Bogdan si Luca, care au văzut o nevoie pe piață pentru o sursă fiabilă și convenabilă de produse. Încă de la început, misiunea noastră a fost de a oferi clienților noștri cea mai bună selecție de produse la prețuri competitive, oferind în același timp servicii excepționale pentru clienți.
                </p>
                <p>
                De-a lungul anilor, am crescut semnificativ, dar nu am pierdut niciodată din vedere valorile noastre de bază. Ne-am angajat să îmbunătățim continuu experiența de cumpărare a clienților noștri și lucrăm din greu pentru a ne asigura că fiecare achiziție este una pozitivă.
                </p>
                <p>
                În plus față de selecția noastră largă de produse, oferim, de asemenea, transport rapid și gratuit, retururi ușoare și un mediu de cumpărături online securizat. Înțelegem că clienții noștri au vieți ocupate și ne străduim să le facem experiența de cumpărare cât mai ușoară și fără stres posibil.
                </p>
                <p>
                Vă mulțumim că ați ales Aladin ca sursă de aprovizionare pentru produse. Așteptăm cu nerăbdare să vă servim.
                </p>
                             
                </div>
            </div>
        </div>
   </div>   
</div>


<div class="py-5 bg-dark">
   <div class="container">
       <div class="row">
            <div class="col-md-6">
                <h4 class="text-white">Aladin</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i>Home</a><br>
                <a href="#" class="text-white"> <i class="fa fa-angle-right"></i>About Us</a><br>
                <a href="cart.php" class="text-white"> <i class="fa fa-angle-right"></i>Cart</a><br>
                <a href="categories.php" class="text-white"> <i class="fa fa-angle-right"></i>Our Collections</a>
                             
                </div>
                <div class="col-md-3">
                    <h4 class="text-white">Adresa</h4>
                    <p class="text-white">
                    STR. REGIMENTUL 11 SIRET nr. 50 
                    bl. G1 sc. 1 ap. 10, GALAŢI, 
                    800302, Romania
                    </p>
                    <a href="tel:+40 741-136-721" class="text-white"> <i class="fa fa-phone"></i>+40 741-136-721</a><br>
                    <a href="email:aladin@gmail.com" class="text-white"> <i class="fa fa-envelope"></i>aladin@gmail.com</a>
                </div>
                <div class="col-md-6">
                    <iframe class="w-100" height="300" frameborder="0"  src="https://www.bing.com/maps/embed?h=400&w=500&cp=45.425202602526106~28.03487777709961&lvl=16&typ=d&sty=r&src=SHELL&FORM=MBEDV8"  scrolling="no">
                    </iframe>
                    <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
                    <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=45.425202602526106~28.03487777709961&amp;sty=r&amp;lvl=16&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
                     <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=45.425202602526106~28.03487777709961&amp;sty=r&amp;lvl=16&amp;rtp=~pos.45.425202602526106_28.03487777709961____&amp;FORM=MBEDLD">Get Directions</a>
                     </div>
                </div>
            </div>
        </div>
   </div>   
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ Bogdi - <?= date('Y')?></p>
    </div>
</div>


    
    
<?php include('includes/footer.php'); ?>

<script>
    $(document).ready(function (){
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    });
</script>