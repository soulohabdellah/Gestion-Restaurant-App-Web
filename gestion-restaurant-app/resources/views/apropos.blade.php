<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-RcJf1QaFNJ60xLj+O+aG0m0ZdwidWbJ8dXzG+jLefc1MDzQxW8NhGgmC+1YnYnGX" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>


      .custom-img-size {
   height: 200px;
}
.navbar {
  background-color: #1ac074;
}
footer {
  background-color: #1ac074;
}
footer a {
  color: #fff;
}
        </style>
  </head>
  <body>
  @include('components\navbar')

  <header class="bg-light  text-center py-5">
    <h1 class="display-4">Toha Food</h1>
    <p class="lead">Découvrez notre passion pour la cuisine</p>
</header>
<section class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="https://res.cloudinary.com/souloh-services/image/upload/v1681993797/wvzj3k7si3sh1lvadkto.png" alt="Restaurant Image" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Notre Histoire</h2>
            <p>
                Toha Food est un restaurant familial situé au cœur de la ville depuis plus de 20 ans. Notre passion pour la cuisine nous a poussés à créer un lieu où les gens peuvent profiter de délicieux repas faits maison dans une ambiance chaleureuse et conviviale.
            </p>
            <p>
                Nous mettons l'accent sur l'utilisation d'ingrédients frais et de qualité pour créer des plats savoureux qui vous feront revenir pour plus. Notre menu est composé de plats traditionnels et de spécialités uniques inspirées des cuisines du monde entier.
            </p>
            <p>
                Notre équipe de chefs talentueux et de personnel attentif s'efforce de vous offrir une expérience culinaire exceptionnelle à chaque visite. Nous sommes fiers de notre service amical et attentionné, et nous nous efforçons de vous offrir un moment agréable à chaque repas.
            </p>
        </div>
    </div>
</section>
</div>
<section class="bg-light py-5">
    <div class="container">
       
        <h2 class="mb-4">Notre Mission</h2>
        
        <p>Notre mission est de vous offrir une expérience culinaire exceptionnelle en utilisant les ingrédients les plus frais et de qualité supérieure que nous pouvons trouver. Nous croyons que chaque repas doit être une expérience unique et mémorable, et c'est pourquoi nous travaillons dur pour créer des plats délicieux et créatifs qui éveilleront vos papilles gustatives.</p>
        
        <p>Nous sommes également déterminés à soutenir notre communauté en utilisant des ingrédients locaux et en travaillant avec des fournisseurs locaux pour aider à renforcer notre économie locale. Nous croyons que la nourriture devrait être accessible à tous, donc nous offrons des options saines et savoureuses pour tous les goûts et tous les régimes alimentaires.</p>
        
        <p>Enfin, nous nous engageons à offrir un service exceptionnel à chaque visite, en fournissant un environnement accueillant et convivial pour tous nos clients. Nous sommes fiers de notre personnel amical et compétent qui travaille dur pour vous offrir une expérience culinaire inoubliable à chaque fois que vous nous rendez visite.</p>
           
    </div>
    
</section>
<section class=" py-5">
    <div class="container">
        
        <h2 class="mb-4">À propos de Toha Food</h2>
        <p>
            Toha Food est un restaurant familial fondé en 2003, avec pour mission de servir les meilleurs plats à nos clients et de contribuer positivement à notre communauté. Nous sommes fiers de soutenir des fournisseurs locaux et d'offrir des emplois stables à nos employés.
        </p>
        <p>
            Nous sommes également soucieux de notre impact sur l'environnement et travaillons dur pour minimiser notre empreinte écologique. Nous avons adopté des pratiques durables telles que le compostage, le recyclage et l'utilisation de produits biologiques chaque fois que cela est possible.
        </p>
        <p>
            Chez Toha Food, nous croyons en l'importance de donner en retour à la communauté. Nous organisons régulièrement des événements caritatifs et nous sommes fiers de soutenir diverses organisations locales à but non lucratif.
        </p>
        <p>
            Nous sommes reconnaissants envers nos clients fidèles et nous nous engageons à continuer à leur offrir des plats délicieux et un service exceptionnel. Nous sommes impatients de vous accueillir dans notre restaurant familial et de partager notre passion pour la cuisine avec vous.
        </p>
   

</div>

</section>


  @include('components\footer')
  <script>
  //Affichege de nombre de produit
  let panier = localStorage.getItem('panier');
  function modifierPanier() {
    let nbItems = 0;
    if (panier) {
      nbItems = JSON.parse(panier).length;
    }
    document.getElementById('nombreProduit').textContent = nbItems;
  }

    modifierPanier();
  
 
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
