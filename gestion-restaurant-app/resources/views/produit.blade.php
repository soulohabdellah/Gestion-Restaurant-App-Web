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
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ $produit->image }}" alt="Product Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h3 class="mb-4">{{ $produit->nom }}</h3>
        <p class="text-muted mb-4">{{ $produit->description }}</p>
        <div class="mb-4">
          <span class="font-weight-bold mr-2">Prix:</span>
          <span class="text-danger">{{ $produit->prix }} DH</span>
        </div>
        <div class="mb-4">
          <span class="font-weight-bold mr-2">Quantite : {{ $produit->count_in_stock }}</span>
        </div>
                            <button onClick="addToPanier('{{ $produit->id }}','{{ $produit->nom }}','{{ $produit->image }}','{{ $produit->prix }}')" class="btn btn-primary w-100">Ajouter au panier</button>
          <i class="fas fa-shopping-cart mr-2"></i>
    
        </button>
        </br>
        <button onClick="goToPanier()" class="btn btn-outline-primary w-100">
          <i class="far fa-heart mr-2"></i>
          Aller au panier
        </button>
      </div>
    </div>
  </div>




<div id="content"></div>

@include('components\footer')

<script>
  function afficherPanier() {
    let panier = localStorage.getItem('panier');
    let panierTableBody = document.getElementById('panierTableBody');
    panierTableBody.innerHTML = '';
    if (panier) {
      let produits = JSON.parse(panier);
      produits.forEach(function(produit) {
        let row = document.createElement('tr');
        let imgCell = document.createElement('td');
        let img = document.createElement('img');
        img.src = produit.image;
        img.style.width = '100px';
        img.style.height = '100px';
        imgCell.appendChild(img);
        row.appendChild(imgCell);
        let nomCell = document.createElement('td');
        let nom = document.createTextNode(produit.nom);
        nomCell.appendChild(nom);
        row.appendChild(nomCell);
        let quantiteCell = document.createElement('td');
        let quantite = document.createTextNode(produit.quantite);
        quantiteCell.appendChild(quantite);
        row.appendChild(quantiteCell);
        let prixCell = document.createElement('td');
        let prix = document.createTextNode(produit.prix + ' DH');
        prixCell.appendChild(prix);
        row.appendChild(prixCell);
        panierTableBody.appendChild(row);
      });
    } else {
      let row = document.createElement('tr');
      let messageCell = document.createElement('td');
      let message = document.createTextNode('Le panier est vide.');
      messageCell.appendChild(message);
      row.appendChild(messageCell);
      panierTableBody.appendChild(row);
    }
  }
  
  afficherPanier();
</script>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
