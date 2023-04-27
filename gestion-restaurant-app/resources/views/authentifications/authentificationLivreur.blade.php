<!doctype html>
<html lang="en">
  <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="..." crossorigin="anonymous" />

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
td a i {
  margin-right: 10px;
   
}
td a{

text-decoration: none;
}
        </style>
  </head>
  <body>
  @include('components\navbar')
<main>
    <div class="container py-5">
      @if(isset($message))
      <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <h1 class="text-center mb-5">Connexion livreur</h1>
<form  class="was-validated" action="authentification-livreur/verifier-livreur" method="POST">
    @csrf
<div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Entrez votre email" required>
    <div class="invalid-feedback">
       Veuillez entrer une adresse e-mail valide.
</div>
</div>

<div class="mb-3">
  <label  class="form-label">Password</label>
  <input type="password" class="form-control"name="Password" id="Password" aria-describedby="emailHelp" required>
</div>

  <button type="submit" id="connexion-btn"class="btn btn-primary">Connexion</button>
</form>
    </div>
</main>
@include('components\footer')
<script>
  function checkchamps(){
   
    const password = document.getElementById("Password");
    const email = document.getElementById("Email");
    const Btn = document.getElementById("connexion-btn");
    if (password.value != "" && email.value != ""  ) {
      Btn.disabled = false;
    } else {
      Btn.disabled = true;
    }
  }
   
   document.getElementById("connexion-btn").disabled = true;
  const inputs = document.querySelectorAll('input');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', checkchamps);
  }
  
 
  </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
