<div class="sidebar bg-success">
  <ul class="nav flex-column mb-auto">
    <li class="nav-item">
      <a class="nav-link text-white" href="/dashboard-client" onclick="setActiveLink('home-link')" id="home-link">
        <i class="bi bi-house-door-fill me-2"></i>Home
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="/client-historique" onclick="setActiveLink('historique-link')" id="historique-link">
        <i class="bi bi-list-ul me-2"></i>Historique
      </a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link text-white" href="/setting-client" onclick="setActiveLink('setting-link')" id="setting-link">
        <i class="bi bi-gear-fill me-2"></i>Setting
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/menu" onclick="setActiveLink('menu-link')" id="menu-link">
        <i class="bi bi-cart-fill me-2"></i>Market
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="/deconnexion-client" onclick="setActiveLink('deconnexion-link')" id="deconnexion-link" >
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