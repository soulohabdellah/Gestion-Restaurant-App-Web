<div class="sidebar bg-success">
  <ul class="nav flex-column mb-auto">
    <li class="nav-item">
      <a class="nav-link text-white" href="/dashboard-administrateur" onclick="setActiveLink('dashboard-link')" id="dashboard-link">
        <i class="bi bi-house-door-fill me-2"></i>Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-client" onclick="setActiveLink('gestion-client-link')" id="gestion-client-link">
        <i class="bi bi-people-fill me-2"></i>Client
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/commande-administrateur" onclick="setActiveLink('gestion-commande-link')" id="gestion-commande-link">
        <i class="bi bi-cart-fill me-2"></i>Commande
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-produit" onclick="setActiveLink('gestion-produit-link')" id="gestion-produit-link">
        <i class="bi bi-box-seam me-2"></i>Produit
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-categorie" onclick="setActiveLink('gestion-categorie-link')" id="gestion-categorie-link">
        <i class="bi bi-list-ul me-2"></i>Categorie
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-message" onclick="setActiveLink('gestion-message-link')" id="gestion-message-link">
        <i class="bi bi-envelope-fill me-2"></i>Message
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-serveur" onclick="setActiveLink('gestion-serveur-link')" id="gestion-serveur-link">
        <i class="bi bi-server me-2"></i>Serveur
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/gestion-livreur" onclick="setActiveLink('gestion-livreur-link')" id="gestion-livreur-link">
        <i class="bi bi-truck me-2"></i>Livreur
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/setting-administrateur" onclick="setActiveLink('setting-link')" id="setting-link">
        <i class="bi bi-gear-fill me-2"></i>Setting
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/deconnexion-administrateur" onclick="setActiveLink('deconnexion-link')" id="deconnexion-link">
        <i class="bi bi-box-arrow-right me-2"></i>Deconnexion
      </a>
    </li>
  </ul>
</div>

<script>
  function setActiveLink() {
    var path = window.location.pathname;
    var links = document.querySelectorAll(".nav-link");
  
    links.forEach(function(link) {
      if (link.getAttribute("href") === path) {
        link.classList.add("active");
      } else {
        link.classList.remove("active");
      }
    });
  }
  </script>
  