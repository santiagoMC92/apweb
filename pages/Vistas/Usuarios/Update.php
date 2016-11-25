
 
    <section class="content-header col-md-11">
      <h1>
        Editar Usuario
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editar Usuario</li>
      </ol>
        <br />
    </section>

    <!-- Main content -->
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
              <form id="updateUser">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" class="form-control texto" placeholder="Nombres" value="<?= $UsuarioU["nombre"] ?>" id="nombre">
                </div>

                <div class="form-group">
                  <label>Apellidos</label>
                  <div class="form-group">
                    <div class="col-md-6"> 
                      <label>Paterno</label>                   
                      <input type="text" class="form-control col-md-6 texto" value="<?= $UsuarioU["apellido_pat"] ?>" placeholder="Paterno" id="apellido_pat">
                    </div>
                    <div class="col-md-6">
                      <label>Materno</label>
                      <input type="text" class="form-control col-md-6 texto" value="<?= $UsuarioU["apellido_mat"] ?>" placeholder="Materno" id="apellido_mat">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Direccion</label>
                    <textarea class="form-control texto" placeholder="Direccion" id="direccion"><?= $UsuarioU["direccion"] ?></textarea>
                  
                </div>

                <div class="form-group">
                  <label>Contacto</label>
                  <div class="form-group">
                    <div class="col-md-6"> 
                      <label>Celular</label>                   
                      <input type="text" class="form-control col-md-6 telefono" value="<?= $UsuarioU["celular"] ?>" placeholder="celular" id="celular">
                    </div>
                    <div class="col-md-6">
                      <label>Telefono</label>
                      <input type="text" class="form-control col-md-6" value="<?= $UsuarioU["telefono"] ?>" data-inputmask=""mask": "(999) 999-9999"" data-mask placeholder="Numero" id="telefono">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label></label> 
                  <div class="form-group">  
                    <div class="col-md-6"> 
                      <label>Correo</label>                   
                      <input type="text" class="form-control col-md-6 email" placeholder="Correo" value="<?= $UsuarioU["correo"] ?>" id="correo">
                    </div>
                    <div class="col-md-6">    
                      <label>Otro</label>                
                      <input type="text" class="form-control col-md-6" placeholder="Otro" value="<?= $UsuarioU["otro"] ?>" id="otro">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Usuario del Sistema</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                      <label>Usuario</label>                  
                      <input type="text" class="form-control col-md-6 texto" value="<?= $UsuarioU["Usuario"] ?>" placeholder="usuario" id="usuario">
                    </div>
                    <div class="col-md-6">
                      <!--<input type="password" class="form-control col-md-6" value="<?= $UsuarioU["Password"] ?>" placeholder="password" id="password">-->
                    </div>
                  </div>
                </div>

                <div class="form-group">  
                <label></label>                
                  <div class="form-group">                  
                    <div class="col-md-6">                  
                      <select class="form-control combo" id="rol">
                        <?php foreach($roles as $_R){ ?>
                        <option value="<?= $_R["idrol"] ?>" <?= ($UsuarioU["rol"]==$_R["idrol"])? "selected='selected'" : "" ?> ><?= $_R["rol"] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-6">                  
                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios1" value="1" <?php if($UsuarioU["estatus"]=="1"){ echo "checked"; } ?> >
                          Activo
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios2" value="0" <?php if($UsuarioU["estatus"]=="0"){ echo "checked"; } ?> >
                          Inactivo
                        </label>
                      </div>
                    </div>

                    
                  </div>
                </div>

                </br>

                <div class="form-group">
                <label>Porcenaje de Comision sobre Interes</label>

                  <input type="text" class="form-control campoNumerico" placeholder="Porcenaje de Comision sobre Interes" id="porcentaje_comision" value="<?= $UsuarioU["porcentaje_comision"] ?>">
                  

                </div>
                  </form>


                <div class="form-group">  
                  <div class="col-md-12">
                      <div class="col-md-2">
                        <div class="box-footer">
                          <button onclick="update('User', '<?= $UsuarioU["idempleado"]  ?>')" class="btn btn-block btn-primary">Guardar</button>
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="box-footer">
                          <button onclick="Cancelar()" class="btn btn-danger">Cancelar</button>
                        </div>
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
 
  
<script type="text/javascript">
   
</script>