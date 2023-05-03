<!doctype html>
<html lang="en">
  <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="..." crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-RcJf1QaFNJ60xLj+O+aG0m0ZdwidWbJ8dXzG+jLefc1MDzQxW8NhGgmC+1YnYnGX" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Toha food</title>
    <style>
      .sidebar {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
      }
      
      .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
      }
      
      .sidebar a:hover {
      color: #f1f1f1;
      }

    .sidebar a.active {
    background-color: #18A054;
    }     
      .main {
        margin-left: 200px;
        padding: 0px 10px;
      }
        </style>
  </head>
  <body onload="setActiveLink()">
    @include('sideBar/interfaceClient')

    <div class="main">
        <h1>Historique des commandes</h1>
     

     
       <div class="table-responsive">
        <table class="table table-striped">
           <thead>
              <tr>
                 <th>#</th>
                 <th>Date</th>
                 <th>Statut</th>
                 <th>Type</th>
                 <th>Prix total</th>
                 <th>Actions</th>
                 <th>Payement</th>
              </tr>
           </thead>
           <tbody>
              @foreach ($listCommandes as $commande)
                 <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->created_at }}</td>
                    <td>{{ $commande->statut->nom }}</td>
                    <td>{{ $commande->type->nom }}</td>
                    <td>{{ $commande->prix_total }}DH</td>
                    <td>

                       <a href="/consulte-commande/{{ $commande->id }}">
                          <i class="fas fa-eye"></i> 
                       </a>
                    </td>
                    <td>
                     @if($commande->payee==false)
                       <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                        <input type="hidden" value="soulohAbdellah2020@business.example.com" name="business">
                        <input type="hidden" value="_xclick" name="cmd">
                        <input type="hidden" value="AM Test Item" name="item_name">
          
                          <input type="hidden" value="{{ $commande->prix_total /10 }}" name="amount">
          
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" value="item_number" name="item_number">
                        <input type="hidden" name="return" value="http://127.0.0.1:8000/commande-payer/{{ $commande->id }}">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                      </form>
                      @else
                      <strong>
                     
                      </strong>

                      @endif
                    </td>
                 </tr>
              @endforeach
           </tbody>
        </table>
     </div>
     
<script>
localStorage.removeItem('panier');
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
<html>
