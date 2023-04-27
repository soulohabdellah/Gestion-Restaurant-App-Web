<div class="sidebar bg-success">
  <ul class="nav flex-column mb-auto">
    <li class="nav-item">
      <a id="home-link" class="nav-link text-white" href="/dashboard-livreur" onclick="setActiveLink('home-link')">
        <i class="bi bi-house-door-fill me-2"></i>Home
      </a>
    </li>

    <li class="nav-item">
      <a id="commande-link" class="nav-link text-white"  href="/commande-livreur" onclick="setActiveLink('commande-link')">
        <i class="bi bi-cart-fill me-2"></i>Commande à livrer
      </a>
    </li>
  
    <li class="nav-item">
      <a id="setting-link" class="nav-link text-white" href="/setting-livreur" onclick="setActiveLink('setting-link')">
        <i class="bi bi-gear-fill me-2"></i>Setting
      </a>
    </li>
    <li class="nav-item">
      <a id="deconnexion-link" class="nav-link text-white" href="/deconnexion-livreur" onclick="setActiveLink('deconnexion-link')">
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