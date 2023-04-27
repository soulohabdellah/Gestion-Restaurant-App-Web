<!doctype html>
<html lang="en">
  <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="..." crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-RcJf1QaFNJ60xLj+O+aG0m0ZdwidWbJ8dXzG+jLefc1MDzQxW8NhGgmC+1YnYnGX" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>
      .sidebar {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
      }
      
      .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
      }
      
      .sidebar a:hover {
        color: #f1f1f1;
      }
      
      .main {
        margin-left: 200px;
        padding: 0px 10px;
      }
        </style>
  </head>
  <body>
    @include('sideBar/InterfaceAdministrateur')

    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="container">
        <h1>Modifier Produit : {{$produit->nom}}</h1>
   
   
<form  action="modify-produit/{{$produit->id}}" class="was-validated" action="/creer-produit" method="POST">
    @csrf

<div class="mb-3">
    <label  class="form-label">Nom</label>
    <input type="text" class="form-control" name="Nom" id="Nom" aria-describedby="emailHelp" value="{{$produit->nom}}" required>
</div>

<div class="mb-3">
    <label  class="form-label">Description</label>
    <input type="text" class="form-control" name="Description" id="Description" value="{{$produit->description}}"aria-describedby="emailHelp" required>
</div>
<div class="mb-3">
  <label  class="form-label">Prix</label>
  <input type="number" class="form-control" name="Prix" id="Prix" aria-describedby="emailHelp" value="{{$produit->prix}}" required>
</div>
<div class="mb-3">
  <label  class="form-label">Quantite stock</label>
  <input type="number" class="form-control" name="Count" id="Count" aria-describedby="emailHelp" value="{{$produit->count_in_stock}}" required>
</div>
<div class="mb-3">
  <label  class="form-label">Temp</label>
  <input type="number" class="form-control" name="Temp" id="Temp" aria-describedby="emailHelp" value="{{$produit->temp}}" required>
</div>

<div class="mb-3">
  <label for="categorie" class="form-label">Categorie</label>
                <select class="form-select" id="categorie" name="categorie">
                  @foreach ($listCategorie as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
</div>
<div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="Frite" name="Frite" value="1" {{ $produit->frite ? 'checked' : '' }}>
  <label class="form-check-label" for="exampleCheck1">Frite</label>
</div>
<div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="Boisson" name="Boisson" value="1" {{ $produit->boisson ? 'checked' : '' }}>
  <label class="form-check-label" for="exampleCheck1">Boisson</label>
</div>
<div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="Sauce" name="Sauce" value="1" {{ $produit->sauce ? 'checked' : '' }}>
  <label class="form-check-label" for="exampleCheck1">Sauce</label>
</div>

<div class="mb-3">
  <label for="formFileSm" class="form-label">Image</label>
  <input class="form-control form-control-sm" id="Image" name="Image" type="file" value="{{$produit->image}}" >
</div>

  <button type="submit" id="ajouter-btn"class="btn btn-primary">Modifier</button>
</form>
</div>
    </div>
<script>
  function checkchamps(){
  
    const Nom = document.getElementById("Nom");
    const Description= document.getElementById("Description");
    const Categorie = document.getElementById("categorie");
    const Prix = document.getElementById("Prix");
    const Count = document.getElementById("Count");
    const Image = document.getElementById("Image");
    const Temp = document.getElementById("Temp");
    const Btn = document.getElementById("ajouter-btn");
    if ( Nom.value != "" && Description.value != ""&& Categorie.value != ""&& Prix.value != ""&& Count.value != "" && Temp.value != "" ) {
      Btn.disabled = false;
    } else {
      Btn.disabled = true;
    }
  }
   
   document.getElementById("ajouter-btn").disabled = true;
  const inputs = document.querySelectorAll('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', checkchamps);
  }
  
    checkpassword();
  </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
