<div class="col-md-12" align="center">
        <h1>  Inventario </h1>
        
    </div>
   
<div class="col-mo-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      
    </div>
    <div class="x_content">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Almacen</th>
          <th>Ubicacion</th>
          
          <th>Mostrar </th>
          
        </tr>
        </thead>
        <tbody>
          <?php
            $vistaPuesto = new Controller();
            $vistaPuesto -> vistaAlmacenController2();
          ?>
        </tbody>
      </table>
      
        
    

    </div>

  </div>

</div>

