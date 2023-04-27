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
        
        <li class="nav-item">
          <a class="nav-link" href="/a-propos">À propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/panier">Panier<span id="nombreProduit" class="badge rounded-pill bg-primary ms-1">0</span></a>
        </li>
      </li>
      @if(session('id_client'))
        <li class="nav-item">
          <a class="nav-link" href="/dashboard-client">Compte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/deconnexion-client">Deconnexion</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/authentification-client">Connexion</a>
        </li>
      @endif
      
    </ul>
    <form action="/search-client" method="POST" class="d-flex me-2">
      @csrf
      <input class="form-control me-2" type="search" name="Search" id="Search" placeholder="Rechercher un plat ou un ingrédient" aria-label="Search">
      <button class="btn  btn-primary" type="submit">Rechercher</button>
    </form>
    <form id="command-form" method="POST" action="/commander-maintenant">
      @csrf
      <input type="hidden" name="panier" id="panier-input">
      <button type="submit" class="btn btn-primary">Commander maintenant</button>
    </form>
  </div>
</div>
</nav>
<script>
  function commanderMaintenant() {
    let panier = localStorage.getItem('panier');
    if (!panier) {
      window.location.href = '/menu';
    }
    let panierInput = document.getElementById('panier-input');
    panierInput.value = panier;
    let commandForm = document.getElementById('command-form');
    commandForm.submit();
  }

  document.getElementById('command-form').addEventListener('submit', function(event) {
    event.preventDefault();
    commanderMaintenant(); 
  });
</script>
