<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>
        .custom-img-size {
   height: 200px;
}

        </style>
  </head>
  <body>
  @include('components\navbar')



<div class="container">
<div class="row">

  <div class="col-sm-6">
   <div class="card" >
   <img src="{{ $produit->image }}" class="card-img-top custom-img-size" alt="...">
  <div class="card-body">
    <a href="produit/{{$produit->id_produit}}"><h5 class="card-title">{{ $produit->nom }}</h5></a>
    <p class="card-text">Prix : <strong>{{ $produit->prix }} DH </strong></p>
      <p class="card-text">Quantite : {{ $produit->count_in_stock }}</p>
      <p class="card-text">Description : {{ $produit->description }}</p>
 <a onClick="addToPanier({{ $produit->id_produit }})" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>
  </div>



</div>


</div>

<div id="content"></div>

@include('components\footer')

<script>
  //localStorage.clear();
  
  function addToPanier(idProduit) {
    let panier = localStorage.getItem('panier');
    if (!panier) {
      panier = []; 
    } else {
      panier = JSON.parse(panier); 
    }
    if (!panier.includes(idProduit)) { 
      panier.push(idProduit); 
      localStorage.setItem('panier', JSON.stringify(panier)); 
    }
    let nbItems = panier.length;
    modifierPanier(nbItems);
  }
  
  function modifierPanier(nbItems) {
    document.getElementById('nombreProduit').textContent = nbItems;
  }
  
  let panier = localStorage.getItem('panier');
  if (panier) {
    let nbItems = JSON.parse(panier).length;
    modifierPanier(nbItems);
  }
</script>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
