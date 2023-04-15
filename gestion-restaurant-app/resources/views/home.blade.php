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
              <a href="#" class="btn btn-primary">Ajouter au panier</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
<img src="https://www.cortesecompany.com/wp-content/uploads/2019/01/Pasticcio-Viande-480x380.jpeg" class="card-img-top custom-img-size" alt="...">
            <div class="card-body">
              <h5 class="card-title">Pasticcio Jambon</h5>
              <p class="card-text">Le pastítsio est un plat de la cuisine grecque, chypriote et méditerranéenne, composé de pâtes, de viande hachée, le tout étant nappé de sauce béchamel. Ce plat est cuit au four. Il s'agit d'une variante du plat italien, le pasticcio di pasta</p>
              <a href="#" class="btn btn-primary">Ajouter au panier</a>
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
        <img src="https://res.cloudinary.com/souloh-services/image/upload/v1681391289/Capture_d_%C3%A9cran_2023-04-13_130614_oacopt.png" alt="food image" class="img-fluid">
      </div>
      <div class="col-md-6 order-md-1">
        <h2 class="mb-3">Commander maintenenant</h2>
        <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <form>
          <div class="mb-3">
            <label for="food-item" class="form-label">Produit</label>
            <input type="text" class="form-control" id="food-item" placeholder="Enter food item">
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantite</label>
            <input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
          </div>
          <div class="mb-3">
            <label for="delivery-date" class="form-label">Date de livraison</label>
            <input type="date" class="form-control" id="delivery-date">
          </div>
          <button type="submit" class="btn btn-primary">Commander</button>
        </form>
      </div>
    </div>
  </div>
</section>


 
  @include('components\footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </body>
</html>
<html>
