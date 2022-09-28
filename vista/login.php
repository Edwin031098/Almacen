


    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;" align="center">
          
       
            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="controlador/CtrlLogin.php" method="POST">


                <h2>LOGIN
              </h2>
              <h2 class="fw-bold mb-2 text-uppercase">

              <img src="vista/imagenes/dulce.jpg" width="150px;" height="auto">
              </h2>
             

              <div class="form-outline form-white mb-4">
                <input type="email" id="usu" name="usu" class="form-control form-control-lg" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="checkbox" class="form-check-input" id="checkmostrar" name="checkmostrar" onclick="mostrar()">
          <label class="form-check-label" for="checkmostrar" style="color: white;"> Mostrar contraseña
          </label>
              </div>

              

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              

            </div>
          </form>

          </div>
      
      </div>
    </div>
    <script type="text/javascript">
        function mostrar(){
        var x = document.getElementById("pass");
          if (x.type == "password"){
              x.type = "text";
          } 
          else{
              x.type = "password";
          }
        } 
      </script>
  
