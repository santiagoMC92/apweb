
    <section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
          <!-- Horizontal Form -->
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">

              <h3 class="box-title">Agregar Fondeador</h3>
            </div>
            <div id="_AJAX_LOGIN_"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="add">
                <!-- text input -->
                <div class="form-group">
                  <label>ROl</label>
                  <input type="text" title="Nombre" class="form-control texto" placeholder="Rol" id="rol">
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <div class="form-group">                  
                    <textarea class="form-control texto" placeholder="Descripcion" id="descripcion"> </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label>Estatus</label>
                  <div class="form-group">                   
                    <label>
                        <input type="radio" name="estatus" id="optionsRadios1" value="1" checked>
                        Activo
                    </label>
                    <label>
                        <input type="radio" name="estatus" id="optionsRadios2" value="0">
                        Inactivo
                    </label>
                  </div>
                </div>

                </form>

                <div id="Permiso">
                  <div class="form-group">
                    <label>Permisos</label>
                    <div class="form-group">

                      <div class="col-md-4" style="background:whitesmoke"> 
                        <div class="form-group">
                            <label><input type="checkbox" name="Permiso" value="User-user"> Usuario</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" name="Permiso" value="User-propio"> Propio(s)</label>

                          <div class="form-group">
                          <div class="col-md-12">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="User-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="User-update"> Editar
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label><input type="checkbox" name="Permiso" value="Clientes-clientes">  Clientes</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" name="Permiso" value="Clientes-propio"> Propio(s)</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="Clientes-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="Clientes-update"> Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" style="background:whitesmoke"> 
                        <div class="form-group">
                          <label><input type="checkbox" name="Permiso" value="Credito-credito">  Creditos</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" name="Permiso" value="Credito-propio"> Propio(s)</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="Credito-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="Credito-update"> Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      

                    </div>
                  </div>

                  <div class="form-group">

                    <label></label>
                    <div class="form-group">

                    <div class="col-md-4"> 
                        <div class="form-group">
                          <label> <input type="checkbox" name="Permiso" value="Fondeador-fondeador">  Fondeador</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="Fondeador-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="Fondeador-update"> Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" style="background:whitesmoke"> 
                        <div class="form-group">
                          <label><input type="checkbox" name="Permiso" value="Subcuenta-subcuenta">  Subcuenta</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="Subcuenta-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="Subcuenta-update"> Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label><input type="checkbox" name="Permiso" value="Reporte-reporte">  Reportes</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" name="Permiso" value="Reporte-propio"> Propio(s)</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" name="Permiso" value="Reporte-add"> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" name="Permiso" value="Reporte-update"> Editar
                            </div>
                          </div>
                        </div>
                      </div>

                     

                    </div>
                  </div>
                </div>

                <div class="form-group">  
                  <div class="col-md-12">
                    <div class="box-footer">
                      <button onclick="add('Rol')" class="btn btn-primary">Guardar</button>
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


