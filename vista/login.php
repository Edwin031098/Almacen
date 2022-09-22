


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

              

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              

            </div>
          </form>

          </div>
      
      </div>
    </div>
  
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>