<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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

  <main class="container my-5">


    @if(isset($message))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill me-2"></i>{{$message}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 text-center">
          <h1>Contactez Toha food</h1>
        </div>
      </div>
      <br/>
    <form enctype="multipart/form-data" class="row g-3 was-validated" action="/creer-message" method="POST" novalidate>
      @csrf

      <div class="col-md-6">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="Nom" name="Nom" required>

      </div>

      <div class="col-md-6">
        <label for="Email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Entrez votre email" required>
        <div class="invalid-feedback">
            Veuillez entrer email valide.
          </div>
      </div>

      <div class="col-md-12">
        <label for="Message" class="form-label">Message</label>
        <textarea class="form-control" id="Message" name="Message" required></textarea>
      </div>
      <div class="col-md-12">
        <label for="Fichier" class="form-label">Fichier</label>
        <input type="file" class="form-control" id="Fichier" name="Fichier">
      </div>

      <div class="col-12">
        <button type="submit" id="ajouter-btn" class="btn btn-primary" disabled>Envoyer</button>
      </div>
    </form>
  </main>
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
    function checkchamps(){
    
      const Nom = document.getElementById("Nom");
      const Email= document.getElementById("Email");
      const Message= document.getElementById("Message");
      const Btn = document.getElementById("ajouter-btn");
      if ( Nom.value != "" && Email.value != ""&& Message.value != "" ) {
        Btn.disabled = false;
      } else {
        Btn.disabled = true;
      }
    }
     
     document.getElementById("ajouter-btn").disabled = true;
    const inputs = document.querySelectorAll('input,textarea');
    for (let i = 0; i < inputs.length; i++) {
      inputs[i].addEventListener('change', checkchamps);
    }
    
      checkpassword();

    </script>
  @include('components\footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
