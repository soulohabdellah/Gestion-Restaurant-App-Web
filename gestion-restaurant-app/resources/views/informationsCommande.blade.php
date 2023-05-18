<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>
        .custom-img-size {
   height: 50px;
}
.navbar {
  background-color: #1ac074;
}
footer {
  height: 100%;
  background-color: #1ac074;
}
footer a {
  color: #fff;
}
footer {

  background-color: #1ac074;
}
.container{
  min-height: 500px;
}
        </style>
  </head>
  <body>
  @include('components\navbar')
<br/><br/>
  <div class="container">
    @if(isset($message))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i>{{$message}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="panierTableBody">
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Informations de commande</h3>
            <div class="row">
                <div class="col-4">
                    <p class="card-text"><strong>Nombre d'elements :</strong></p>
                </div>
                <div class="col">
                    <p id="nombre"class="card-text">0</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="card-text"><strong>Quantite :</strong></p>
                </div>
                <div class="col">
                    <p id="quantite"class="card-text">0</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="card-text"><strong>Prix Total (DH) :</strong></p>
                </div>
                <div class="col">
                    <p id="prix"class="card-text">0</p>
                </div>
            </div>
          </div>
        </div>
        <form action="type-commande" method="POST">
            @csrf
            <div class="form-check">
              <input class="form-check-input" type="radio" name="commande" id="commande-domicile" value="domicile" checked>
              <label class="form-check-label" for="commande-domicile">
                Commande à domicile
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="commande" id="commande-sur-place" value="sur-place">
              <label class="form-check-label" for="commande-sur-place">
                Commande sur place
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
          
          
      </div>
    </div>
  </div>
  
<script>

  let panier = localStorage.getItem('panier');
  panier = JSON.parse(panier);
  function modifierPanier() {

    let nbItems = 0;
    if (panier) {
      nbItems = panier.length;
    }
    document.getElementById('nombreProduit').textContent = nbItems;
  }
  modifierPanier();
  renderElement();
  let tbody = document.getElementById('panierTableBody');
  function renderCart() {
    tbody.innerHTML = '';
    if (panier) {
     
      panier.forEach((element) => {
        let row = tbody.insertRow();
        let cell1 = row.insertCell(0);
        let cell2 = row.insertCell(1);
        let cell3 = row.insertCell(2);
        let cell4 = row.insertCell(3);
        let cell5 = row.insertCell(4);
  
        cell1.innerHTML = `<img src="${element.image}" class="custom-img-size" alt="product image">`;
        cell2.innerHTML = `<a href="/produit/${element.id}"><strong>${element.nom} </strong></a>`;
        cell3.innerHTML = `
          <button type="button" class="btn btn-secondary" onClick="decrementQuantity(${element.id})"><i class="bi bi-dash"></i></button>
          ${element.quantite}
          <button type="button" class="btn btn-secondary" onClick="incrementQuantity(${element.id})"><i class="bi bi-plus"></i></button>
        `;
        cell4.innerHTML = `<strong>${element.prix} DH</strong>`;
        cell5.innerHTML = `
          <button type="button" class="btn btn-danger" onClick="removeProduct(${element.id})"><i class="bi bi-trash"></i></button>
        `;
      });
    }else{
      
    }
  }
  
  renderCart();
  
  function updateCart() {
    localStorage.setItem('panier', JSON.stringify(panier));
    modifierPanier();
    renderCart();
    renderElement();
  }
  function renderElement(){
    var quantite=0;
    var prix=0;
    var length=panier.length;
    panier.forEach(function(objet) {
        quantite+=objet.quantite;
        prix+=(objet.prix*objet.quantite);
    });
    document.getElementById('nombre').textContent=length;
    document.getElementById('quantite').textContent=quantite;
    document.getElementById('prix').textContent=prix;
   

    }

  
  function incrementQuantity(id) {
    var index;
  panier.forEach(function(objet) {
   
    if (objet.id == parseInt(id)) {
      index = panier.indexOf(objet);
    }
  });

    panier[index].quantite++;
    updateCart();
}

function decrementQuantity(id) {
  var index;
  panier.forEach(function(objet) {
   
    if (objet.id == parseInt(id)) {
      index = panier.indexOf(objet);
    }
  });
  if (panier[index].quantite > 1) {
    panier[index].quantite--;
  }
    updateCart();
  
}

function removeProduct(id) {
  var index;
  panier.forEach(function(objet) {
   
    if (objet.id == parseInt(id)) {
      index = panier.indexOf(objet);
    }
  });
  panier.splice(index, 1);
  updateCart();
}

  
  </script>
  

@include('components\footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
