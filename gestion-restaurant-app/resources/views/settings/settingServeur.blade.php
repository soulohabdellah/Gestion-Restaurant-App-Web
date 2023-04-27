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
         width: 250px;
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
         margin-left: 250px;
         padding: 0px 10px;
       }
       
       
                 </style>
  </head>
  <body onload="setActiveLink()">
    @include('sideBar/interfaceServeur')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            @if(isset($message))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
              <i class="bi bi-check-circle-fill me-2"></i>{{$message}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form class="was-validated" method="POST" action="setting-serveur">
              @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $serveur->email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Entrez votre email" required>
                <div class="invalid-feedback">
                   Veuillez entrer une adresse e-mail valide.
            </div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" aria-describedby="emailHelp" value="<?php echo $serveur->nom; ?>" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="Prenom" aria-describedby="emailHelp" value="<?php echo $serveur->prenom; ?>" required>
            </div>
            <div class="mb-3">
              <label  class="form-label">Telephone</label>
              <input type="text" class="form-control" id="Telephone" name="Telephone" aria-describedby="emailHelp" value="<?php echo $serveur->telephone; ?>" required>
            </div>

            <div class="mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" id="Password" name="Password" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label  class="form-label">Confirm</label>
              <input type="password" class="form-control" id="Confirm" name="Confirm" aria-describedby="emailHelp" required>
            </div>
      
              
           
              
              <button type="submit" id="modifier-btn" class="btn btn-primary">Modifier</button>
            </form>
            </div>
    </div>
            <script>
             
                  function checkchamps(){
                    const confirm = document.getElementById("Confirm");
                    const password = document.getElementById("Password");
                    const email = document.getElementById("Email");
                    const Prenom = document.getElementById("Prenom");
                    const Nom = document.getElementById("Nom");
                    const Telephone = document.getElementById("Telephone");
           
                    const Btn = document.getElementById("modifier-btn");
                    if (confirm.value ==password.value &&confirm.value != "" && password.value != "" && email.value != ""  && Prenom.value != "" && Nom.value != "" && Telephone.value != "" ) {
                      Btn.disabled = false;
                    } else {
                      Btn.disabled = true;
                    }
                  }
                    function checkpassword() {
                      const confirm = document.getElementById("Confirm");
                      const password = document.getElementById("Password");
                      confirm.addEventListener("change", function(event) {
                        if (confirm.value != password.value) {
                          alert("Password et confirmation ne sont pas identiques");
                      document.getElementById("ajouter-btn").disabled=true;
                        }else{
                            document.getElementById("ajouter-btn").disabled=false;
                        }
                      });
                    }
                   document.getElementById("modifier-btn").disabled = true;
                  const inputs = document.querySelectorAll('input');
                  for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('change', checkchamps);
                  }
                  
                    checkpassword();
                  </script>

   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
<html>
