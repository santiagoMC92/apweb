
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
              <form id="updateClientes">
                <!-- text input -->
                <div class="form-group">
                  <label>Nombres</label>
                  <input type="text" title="Nombre" class="form-control texto" placeholder="Nombres" id="nombre" value="<?= $Cliente["nombre"] ?>">
                </div>

                <div class="form-group">
                  <label>Apellidos</label>
                  <div class="form-group">
                    <div class="col-md-6">
                      <label>Paterno</label>                    
                      <input type="text" class="form-control col-md-6 texto" placeholder="Paterno" id="apellido_pat" value="<?= $Cliente["apellido_pat"] ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Materno</label>
                      <input type="text" class="form-control col-md-6 texto" placeholder="Materno" id="apellido_mat" value="<?= $Cliente["apellido_mat"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>RFC/CURP</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                      <label>CURP</label>                  
                      <input type="text" class="form-control col-md-6 curp" placeholder="CURP" id="curp" value="<?= $Cliente["curp"] ?>">
                    </div>
                    <div class="col-md-6">
                      <label>RFC</label>
                      <input type="text" class="form-control col-md-6 texto" placeholder="RFC" id="rfc" value="<?= $Cliente["rfc"] ?>">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Direccion</label>
                    <textarea class="form-control" placeholder="Direccion" id="direccion"><?= $Cliente["direccion"] ?></textarea>
                  
                </div>
                
                <div class="form-group">
                  <label>Contacto</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                      <label>Celular</label>                  
                      <input type="text" class="form-control col-md-6 telefono" placeholder="Celular" id="celular" value="<?= $Cliente["celular"] ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Telefono</label>
                      <input type="text" class="form-control col-md-6" data-inputmask=""mask": "(999) 999-9999"" data-mask placeholder="Telefono" id="telefono" value="<?= $Cliente["telefono"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label></label> 
                  <div class="form-group">  
                    <div class="col-md-6"> 
                      <label>Correo</label>                   
                      <input type="text" class="form-control col-md-6 email" placeholder="Correo" id="correo" value="<?= $Cliente["correo"] ?>">
                    </div>
                    <div class="col-md-6">     
                      <label>Otro</label>               
                      <input type="text" class="form-control col-md-6" placeholder="Otro" id="otro" value="<?= $Cliente["otro"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Datos Laborales</label>
                  <div class="form-group">
                    <div class="col-md-6">  
                      <label>Empresa</label>                  
                      <input type="text" class="form-control col-md-6 texto" placeholder="Empresa" id="empresa" value="<?= $Cliente["empresa"] ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Puesto</label>
                      <input type="text" class="form-control col-md-6 texto" data-mask placeholder="Puesto" id="puesto" value="<?= $Cliente["puesto"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label></label>
                  <div class="form-group">
                    <div class="col-md-6"> 
                      <label>Tel. Oficina</label>                   
                      <input type="text" class="form-control col-md-6 telefono" placeholder="Telefono Oficina" id="teloficina" value="<?= $Cliente["teloficina"] ?>">
                    </div>
                    <div class="col-md-6">
                      <label>Extencion</label>
                      <input type="text" class="form-control col-md-6" data-mask placeholder="Extencion" id="extencion" value="<?= $Cliente["extencion"] ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Datos del Sistema</label>
                  <div class="form-group">
                    <div class="col-md-6">      
                    <label>Gestor</label>
                      <select class="form-control combo" id="gestor">
                        <option>Seleccione Un Gestor</option>
                        <?php 
                          foreach($Gestores as $value){
                            ?>
                              <option value="<?= $value["idempleado"] ?>" <?php if($value["idempleado"]==$Cliente["gestor"]){ echo "selected='selected'"; } ?> ><?=$value["nombre"]?></option>
                              <?php
                          }
                         ?>
                      </select>

                    </div>
                    <div class="col-md-6">

                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios1" value="1" <?php if($Cliente["estatus"]=="1"){ echo "checked"; } ?>>
                          Activo
                        </label>
                      </div>
                      <div class="col-md-3">
                        <label>
                          <input type="radio" name="estatus" id="optionsRadios2" value="0" <?php if($Cliente["estatus"]=="0"){ echo "checked"; } ?>>
                          Inactivo
                        </label>
                      </div>

                    </div>
                  </div>
                </div>

                
                </form>
                <div class="form-group">  
                  <div class="col-md-12">
                    <div class="box-footer">
                      <button onclick="update('Clientes',<?= $Cliente["idcliente"] ?>)" class="btn btn-primary">Guardar</button>
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


