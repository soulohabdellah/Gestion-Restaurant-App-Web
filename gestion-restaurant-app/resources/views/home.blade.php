<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>

#map {
  width: 100%;
  height: 450px;
  min-height: 200px;
}
@media (max-width: 768px) {
  #map {
    height: 300px;
  }
}

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
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
  <body >
  @include('components\navbar')

<header class="bg-light py-5">
    <div class="container text-center">
      <h1 class="fw-bolder mb-4">Welcome to Toha Food</h1>
      <p class="lead mb-0">For the love of delicious food</p>
    </div>
  </header>

  <!-- Menu -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-bolder mb-4">Nos Menu</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
<img src="https://www.francebleu.fr/s3/cruiser-production/2019/08/71080297-32f4-49b3-8d2b-33ba080d1c30/1200x680_gettyimages-1146906219.jpg" class="card-img-top custom-img-size" alt="...">
            <div class="card-body">
              <h5 class="card-title">Tacos Mexicain</h5>
              <p class="card-text">Un taco est un antojito de la cuisine mexicaine qui se compose d'une tortilla de maïs repliée ou enroulée sur elle-même contenant presque toujours une garniture le plus souvent à base de viande, de sauce, d'oignon et de coriandre fraiche hachée.</p>
              <button class="btn btn-primary" onClick="addToPanier('2','Tacos de canasta','https://www.thespruceeats.com/thmb/Np1HZR-shrA-yj564vkhmAXI55Y=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/tacos-de-canasta-5189700-hero-01-e0dd765ba61c4dde81ddbf97ee3c341a.jpg','28')">Ajouter au panier</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
<img src="https://www.cortesecompany.com/wp-content/uploads/2019/01/Pasticcio-Viande-480x380.jpeg" class="card-img-top custom-img-size" alt="...">
            <div class="card-body">
              <h5 class="card-title">Pasticcio Jambon</h5>
              <p class="card-text">Le pastítsio est un plat de la cuisine grecque, chypriote et méditerranéenne, composé de pâtes, de viande hachée, le tout étant nappé de sauce béchamel. Ce plat est cuit au four. Il s'agit d'une variante du plat italien, le pasticcio di pasta</p>
              <button class="btn btn-primary" onClick="addToPanier('2','Tacos de canasta','https://www.thespruceeats.com/thmb/Np1HZR-shrA-yj564vkhmAXI55Y=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/tacos-de-canasta-5189700-hero-01-e0dd765ba61c4dde81ddbf97ee3c341a.jpg','28')">Ajouter au panier</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="order" id="order">
  <div class="container">
    <div class="row">
      <div class="col-md-6 order-md-2">
        <div id="map"></div>
      </div>
      <div class="col-md-6 order-md-1">
        <h2 class="mb-3">Commander maintenenant</h2>
        <p class="lead mb-4">Pour vos événements spéciaux à domicile, notre restaurant vous offre les services de son chef et de ses équipes pour rendre votre événement le plus agréable possible, une possibilité d’un repas à domicile avec le chef Herve, ou des plats à importernisl eu augue.</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Produits de qualité supérieure</strong></li>
          <li class="list-group-item"><strong>Prix compétitifs</strong></li>
          <li class="list-group-item"><strong>Livraison rapide et fiable</strong></li>
          <li class="list-group-item"><strong>Service client exceptionnel</strong></li>
          <li class="list-group-item"><strong>Menu varié et diversifié</strong></li>
          <li class="list-group-item"><strong>Emballage écologique et durable</strong></li>

        </ul>
        <br/>
        <a class="btn btn-primary" href="/menu">
          Commander
        </a>
      </div>
    </div>
  </div>
</section>


 
  @include('components\footer')
  <script>

  //Affichage de map 
  var map;
      function initMap() {
        var myLatLng = {lat: 31.660166, lng: -8.021305};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: myLatLng
        });

        // Ajoutez un marqueur à la carte
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Toha food'
        });
      }
      function addToPanier(idProduit, nomProduit,imgProduit,prixProduit) {
    let quantite = 1;
    let panier = localStorage.getItem('panier');
    if (!panier) {
      panier = []; 
    } else {
      panier = JSON.parse(panier); 
    }
    let produit = { id: idProduit, quantite: quantite,nom:nomProduit,image:imgProduit ,prix:prixProduit};
    let index = panier.findIndex(p => p.id === idProduit);
    if (index >= 0) { 
     return;
    } else { 
      panier.push(produit); 
    }
    localStorage.setItem('panier', JSON.stringify(panier)); 

    modifierPanier();
}

let panier = localStorage.getItem('panier');
console.log(panier);
  function modifierPanier() {
    let panier = localStorage.getItem('panier');
    let nbItems = 0;
    if (panier) {
      nbItems = JSON.parse(panier).length;
    }
    document.getElementById('nombreProduit').textContent = nbItems;
  }
modifierPanier();

  </script>
  <script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.9/mapsJavaScriptAPI.js"async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
