
    <section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
          <!-- Horizontal Form -->
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">

              <h3 class="box-title">Editar Cliente</h3>
            </div>
            <div id="_AJAX_LOGIN_"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="updateSubcuenta">
                 <!-- text input -->
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" title="Nombre" class="form-control texto" placeholder="Nombres" id="nombre" value="<?= $Subcuenta["nombre"] ?>">
                </div>

                <div class="form-group">
                  <label>Porcentaje de Interes</label>
                  <div class="form-group">                  
                    <input type="text" class="form-control col-md-6 numero" placeholder="Porcentaje de Interes" id="porcentajeint" value="<?= $Subcuenta["porcentajeint"] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label>Fondeador</label>
                  <div class="form-group">
                    <select id="idfondeador" class="combo">
                      <option value="0">Seleccione un Fondeador</option>
                      <?php 
                          foreach($fondedores as $value){
                            ?>
                            <option value='<?= $value["idfondeador"] ?>' <?php if($value["idfondeador"]==$Subcuenta["idfondeador"]){ echo "selected='selected'"; } ?>><?= $value["nombre"] ?></option>
                            <?php
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
                      <button onclick="update('Subcuenta',<?= $Subcuenta["idsubcuenta"] ?>)" class="btn btn-primary">Guardar</button>
                      <button onclick="Cancelar()" class="btn btn-danger">Cancelar</button>
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





