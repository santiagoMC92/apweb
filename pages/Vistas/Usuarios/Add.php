
    <section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
          <!-- Horizontal Form -->
         
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">

              <h3 class="box-title">Agregar Usuario</h3>
            </div>
            <div id="_AJAX_LOGIN_"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="addUser">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control texto" placeholder="Nombres" id="nombre">
                </div>

                <div class="form-group">
                  <label>Apellidos</label>
                  <div class="form-group">
                    <div class="col-md-6"> 
                      <label>Paterno</label>                   
                      <input type="text" class="form-control col-md-6 texto" placeholder="Paterno" id="apellido_pat">
                    </div>
                    <div class="col-md-6">
                      <label>Materno</label>
                      <input type="text" class="form-control col-md-6 texto" placeholder="Materno" id="apellido_mat">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Direccion</label>
                    <textarea class="form-control texto" placeholder="Direccion" id="direccion"></textarea>
                  
                </div>
                
                <div class="form-group">
                  <label>Contacto</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                      <label>Celular</label>                  
                      <input type="text" class="form-control col-md-6 telefono" placeholder="Celular" id="celular">
                    </div>
                    <div class="col-md-6">
                      <label>Telefono</label>
                      <input type="text" class="form-control col-md-6" data-inputmask=""mask": "(999) 999-9999"" data-mask placeholder="Telefono" id="telefono">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label></label> 
                  <div class="form-group">  
                    <div class="col-md-6">  
                      <label>Correo</label>                  
                      <input type="text" class="form-control col-md-6 email" placeholder="Correo" id="correo">
                    </div>
                    <div class="col-md-6">  
                      <label>Otro</label>                  
                      <input type="text" class="form-control col-md-6" placeholder="Otro" id="otro">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Usuario del Sistema</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                    <label>Usuario</label>                  
                      <input type="text" class="form-control col-md-6 texto" placeholder="Usuario" id="user">
                    </div>
                    <div class="col-md-6">
                      <label>Contraseña</label>
                      <input type="password" class="form-control col-md-6 texto" placeholder="Contraseña" id="password">
                    </div>
                  </div>
                </div>

                <div class="form-group">  
                <label></label>                
                  <div class="form-group">                  
                    <div class="col-md-6">                  
                      <select class="form-control combo" id="rol">
                        <option value="0">Seleccione Un Rol</option>
                        <?php 
                        foreach($roles as $_R){ ?>
                        <option value="<?= $_R["idrol"] ?>"><?= $_R["rol"] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">                  
                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios1" value="1" checked>
                          Activo
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios2" value="0">
                          Inactivo
                        </label>
                      </div>
                    </div>

                    
                  </div>
                </div>

                </br>
                <div class="form-group">
                <label>Porcenaje de Comision sobre Interes</label>

                  <input type="text" class="form-control campoNumerico" placeholder="Porcenaje de Comision sobre Interes" id="porcentaje_comision">
                  

                </div>

                </form>


                <div class="form-group">  
                  <div class="col-md-12">
                    <div class="box-footer">
                      <button onclick="addUser()" class="btn btn-primary">Guardar</button>
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


