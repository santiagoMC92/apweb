
    <section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
          <!-- Horizontal Form -->
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">

              <h3 class="box-title">Editar Fondeador</h3>
            </div>
            <div id="_AJAX_LOGIN_"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="updateFondeador">

                <div class="form-group">
                  <div class="col-md-9">
                    <label>Nombre</label>
                    <div class="form-group">                   
                      <input type="text" title="Nombre" class="form-control texto" placeholder="Nombres" id="nombre" value="<?= $Fondeador["nombre"] ?>">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>Codigo</label>
                    <div class="form-group">                   
                      <input type="text" class="form-control texto" placeholder="Codigo" id="codigo" required="required" value="<?= $Fondeador["codigo"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-3">
                    <label>Inversion</label>
                    <div class="form-group">                   
                      <input type="text" class="form-control numero" placeholder="Cantidad Invertida" id="cantinvert" value="<?= $Fondeador["cantinvert"] ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Fecha de entrega</label>
                    <div class="form-group">                   
                      <input type="text" class="form-control numero datepicker" placeholder="Fecha de entrega" id="fechaEntrega" value="<?= $Fondeador["fechaEntrega"] ?>">
                      
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Porcentaje Invesion.</label>
                    <div class="form-group">                   
                      <input type="text" class="form-control numero" placeholder="Porcentaje de Inversion" id="porcentaje_ganancia" value="<?= $Fondeador["porcentaje_ganancia"] ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Meses de inversion.</label>
                    <div class="form-group">                   
                      <input type="text" class="form-control numero" placeholder="Meses" id="tiempo_ganancia" value="<?= $Fondeador["tiempo_ganancia"] ?>">
                    </div>
                  </div>
                </div>

                </form>
                <div class="form-group">  
                  <div class="col-md-12">
                    <div class="box-footer">
                      <button onclick="update('Fondeador',<?= $Fondeador["idfondeador"] ?>)" class="btn btn-primary">Guardar</button>
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


