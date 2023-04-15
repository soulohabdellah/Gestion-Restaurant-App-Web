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

<form>
<div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" value="<?php echo $client->email; ?>">
</div>
<div class="mb-3">
    <label  class="form-label">Nom</label>
    <input type="text" class="form-control" id="Nom" aria-describedby="emailHelp" value="<?php echo $client->nom; ?>">
</div>
<div class="mb-3">
    <label  class="form-label">Prenom</label>
    <input type="text" class="form-control" id="Prenom" aria-describedby="emailHelp" value="<?php echo $client->prenom; ?>">
</div>
<div class="mb-3">
    <label  class="form-label">Adresse</label>
    <input type="text" class="form-control" id="Adresse" aria-describedby="emailHelp" value="<?php echo $client->adresse; ?>">
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@include('components\footer')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
