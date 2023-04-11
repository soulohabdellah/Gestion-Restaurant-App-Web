<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
    <a class="navbar-brand" href="/home">Toha food</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/menu">Menu</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Entrées</a></li>
            <li><a class="dropdown-item" href="#">Plats principaux</a></li>
            <li><a class="dropdown-item" href="#">Desserts</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">À propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/panier">Panier<span id="nombreProduit" class="badge rounded-pill bg-primary ms-1">0</span></a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Rechercher un plat ou un ingrédient" aria-label="Search">
        <button class="btn  btn-primary" type="submit">Rechercher</button>
      </form>
      <button class="btn btn-primary ms-3">Commander maintenant</button>
    </div>
  </div>
</nav>
