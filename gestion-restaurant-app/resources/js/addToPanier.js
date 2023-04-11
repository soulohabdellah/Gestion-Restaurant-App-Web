function addToPanier(idProduit) {
    let panier = localStorage.getItem('panier');
    if (!panier) {
      panier = []; 
    } else {
      panier = JSON.parse(panier); 
    }
    if (!panier.includes(idProduit)) { 
      panier.push(idProduit); 
      localStorage.setItem('panier', JSON.stringify(panier)); 
    }
    let nbItems = panier.length;
    modifierPanier(nbItems);
  }