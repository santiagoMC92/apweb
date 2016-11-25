
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
                  <input type="text" title="Nombre" class="form-control texto" placeholder="Rol" value="<?= $rol["rol"] ?>" id="rol">
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <div class="form-group">                  
                    <textarea class="form-control texto" placeholder="Descripcion" id="descripcion"> <?= $rol["descripcion"] ?> </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label>Estatus</label>
                  <div class="form-group">                   
                    <label>
                        <input type="radio" name="estatus" <?= ($rol["estatus"]=="1")? "checked" : "" ?> id="optionsRadios1" value="1" checked>
                        Activo
                    </label>
                    <label>
                        <input type="radio" name="estatus" <?= ($rol["estatus"]=="0")? "checked" : "" ?> id="optionsRadios2" value="0">
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
                            <label><input type="checkbox" onchange="setPermiso('User','user', <?= $rol["idrol"] ?>)" name="Permiso" value="User-user" id="User-user" <?= (in_array("user", $permisos))? "checked='' class='activo'" : "" ?>> Usuario</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" name="Permiso" onchange="setPermiso('User','propio', <?= $rol["idrol"] ?>)" value="User-propio" id="User-propio" <?= (in_array("propio", $permisos["user"]))? "checked='' class='activo'" : "" ?> > Propio(s)</label>

                          <div class="form-group">
                          <div class="col-md-12">
                            <div class="col-md-6">                   
                              <input type="checkbox" onchange="setPermiso('User','add', <?= $rol["idrol"] ?>)" name="Permiso" value="User-add" id="User-add" <?= (in_array("add", $permisos["user"]))? "checked='' class='activo'" : "" ?>> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" onchange="setPermiso('User','update', <?= $rol["idrol"] ?>)" name="Permiso" value="User-update" id="User-update" <?= (in_array("update", $permisos["user"]))? "checked='' class='activo'" : "" ?> > Editar
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label><input type="checkbox" onchange="setPermiso('Clientes','clientes', <?= $rol["idrol"] ?>)" name="Permiso" value="Clientes-clientes" id="Clientes-clientes" <?= (in_array("clientes", $permisos))? "checked='' class='activo'" : "" ?>>  Clientes</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" onchange="setPermiso('Clientes','propio', <?= $rol["idrol"] ?>)" name="Permiso" value="Clientes-propio" id="Clientes-propio" <?= (in_array("propio", $permisos["clientes"]))? "checked='' class='activo'" : "" ?> > Propio(s)</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" onchange="setPermiso('Clientes','add', <?= $rol["idrol"] ?>)" name="Permiso" value="Clientes-add" id="Clientes-add" <?= (in_array("add", $permisos["clientes"]))? "checked='' class='activo'" : "" ?> > Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" onchange="setPermiso('Clientes','update', <?= $rol["idrol"] ?>)" name="Permiso" value="Clientes-update" id="Clientes-update" <?= (in_array("update", $permisos["clientes"]))? "checked='' class='activo'" : "" ?> > Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" style="background:whitesmoke"> 
                        <div class="form-group">
                          <label><input type="checkbox" onchange="setPermiso('Credito','credito', <?= $rol["idrol"] ?>)" name="Permiso" value="Credito-credito" id="Credito-credito" <?= (in_array("credito", $permisos))? "checked='' class='activo'" : "" ?>>  Creditos</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="checkbox" onchange="setPermiso('Credito','propio', <?= $rol["idrol"] ?>)" name="Permiso" value="Credito-propio" id="Credito-propio" <?= (in_array("propio", $permisos["credito"]))? "checked='' class='activo'" : "" ?> > Propio(s)</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" onchange="setPermiso('Credito','add', <?= $rol["idrol"] ?>)" name="Permiso" value="Credito-add" id="Credito-add" <?= (in_array("add", $permisos["credito"]))? "checked='' class='activo'" : "" ?> > Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" onchange="setPermiso('Credito','update', <?= $rol["idrol"] ?>)" name="Permiso" value="Credito-update" id="Credito-update" <?= (in_array("update", $permisos["credito"]))? "checked='' class='activo'" : "" ?> > Editar
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
                          <label> <input type="checkbox" onchange="setPermiso('Fondeador','fondeador', <?= $rol["idrol"] ?>)" name="Permiso" value="Fondeador-fondeador" id="Fondeador-fondeador" <?= (in_array("fondeador", $permisos))? "checked='' class='activo'" : "" ?>>  Fondeador</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" onchange="setPermiso('Fondeador','add', <?= $rol["idrol"] ?>)" name="Permiso" value="Fondeador-add" id="Fondeador-add" <?= (in_array("add", $permisos["fondeador"]))? "checked='' class='activo'" : "" ?> > Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" onchange="setPermiso('Fondeador','update', <?= $rol["idrol"] ?>)" name="Permiso" value="Fondeador-update" id="Fondeador-update" <?= (in_array("update", $permisos["fondeador"]))? "checked='' class='activo'" : "" ?> > Editar
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4" style="background:whitesmoke"> 
                        <div class="form-group">
                          <label><input type="checkbox" onchange="setPermiso('Subcuenta','subcuenta', <?= $rol["idrol"] ?>)" name="Permiso" value="Subcuenta-subcuenta" id="Subcuenta-subcuenta" <?= (in_array("subcuenta", $permisos))? "checked='' class='activo'" : "" ?>>  Subcuenta</label>
                          <div class="form-group">
                            <div class="col-md-6">                   
                              <input type="checkbox" onchange="setPermiso('Subcuenta','add', <?= $rol["idrol"] ?>)" name="Permiso" value="Subcuenta-add" id="Subcuenta-add" <?= (in_array("add", $permisos["subcuenta"]))? "checked='' class='activo'" : "" ?>> Agregar
                            </div>
                            <div class="col-md-6">
                              <input type="checkbox" onchange="setPermiso('Subcuenta','update', <?= $rol["idrol"] ?>)" name="Permiso" value="Subcuenta-update" id="Subcuenta-update" <?= (in_array("update", $permisos["subcuenta"]))? "checked='' class='activo'" : "" ?> > Editar
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


