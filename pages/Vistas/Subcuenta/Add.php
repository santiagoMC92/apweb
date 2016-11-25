
    <section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
          <!-- Horizontal Form -->
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">

              <h3 class="box-title">Agregar Subcuenta</h3>
            </div>
            <div id="_AJAX_LOGIN_"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="add">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" title="Nombre" class="form-control texto" placeholder="Nombres" id="nombre">
                </div>

                <div class="form-group">
                  <label>Porcentaje de Interes</label>
                  <div class="form-group">                  
                    <input type="text" class="form-control col-md-6 numero" placeholder="Porcentaje de Interes" id="porcentajeint">
                  </div>
                </div>

                <div class="form-group">
                  <label>Fondeador</label>
                  <div class="form-group">
                    <select id="idfondeador" class="combo">
                      <option value="0">Seleccione un Fondeador</option>
                      <?php 
                          foreach($fondedores as $value){
                            echo "<option value='" . $value["idfondeador"] . "'>" . $value["nombre"] . "</option>";
                          }
                         ?>
                    </select>
                  </div>
                </div>
                
                </div>

                
                </form>
                <div class="form-group">  
                  <div class="col-md-12">
                    <div class="box-footer">
                      <button onclick="add('Subcuenta')" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>


