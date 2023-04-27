<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="..." crossorigin="anonymous" />

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



  <div class="container">
    <h1>Liste des produits</h1>
    <div class="container mb-3">
      <form>
        <div class="row d-flex">
          <div class="col-md-3">
            <label for="categorie" class="form-label">Categorie</label>
            <select class="form-select" id="categorie" name="categorie">
              <option value="">Tous</option>
              @foreach ($listCategorie as $categorie)
              <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <button onclick="filter()" type="submit" class="btn btn-primary mt-4">Filtrer</button>
          </div>
        </div>
      </form>
    </div>
    
    @if(count($listProduits) > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
          
            @foreach ($listProduits as $produit)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $produit->image }}" class="card-img-top custom-img-size" alt="...">
                        <div class="card-body">
                        <a href="/produit/{{$produit->id}}"><h5 class="card-title">{{ $produit->nom }}</h5></a>
                        <ul class="list-inline">
                          <li class="list-inline-item"><i class="fas fa-french-fries"></i> @if($produit->frite) Oui @else Non @endif</li>
                          <li class="list-inline-item"><i class="fas fa-coffee"></i> @if($produit->boisson) Oui @else Non @endif</li>
                          <li class="list-inline-item"><i class="fas fa-pepper-hot"></i> @if($produit->sauce) Oui @else Non @endif</li>
                          <li class="list-inline-item"><i class="far fa-clock"></i> {{ $produit->temp }} min</li>
                      </ul>
                      
                            <p class="card-text">Prix : <strong>{{ $produit->prix }} DH </strong></p>

                            <button onClick="addToPanier('{{ $produit->id }}','{{ $produit->nom }}','{{ $produit->image }}','{{ $produit->prix }}')" class="btn btn-primary w-100">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun produit disponible pour le moment.</p>
    @endif
</div>



@include('components\footer')

<script>


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
    function filter(){
    var selectElement = document.getElementById("categorie");
    var selectedValue = selectElement.value;
    window.location.href = "/menu?categorie=" + selectedValue;

    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
