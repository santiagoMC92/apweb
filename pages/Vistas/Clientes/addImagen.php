<section class="content">
      <div class="row">
       
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">

        <form id="subida">
        <div class="form-group">
        <label>Nombre</label>
                  <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Enter ...">
          <label>Imagen</label>
          <input type="file" id="foto" name="foto" class="form-control" rows="3" placeholder="Enter ...">
          <label>Descripcion</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Enter ..."></textarea>
          <input type="hidden" id="idcliente" value="<?= $_POST["idcliente"] ?>" name="idcliente" class="form-control" rows="3" placeholder="Enter ...">
          <button type="button" onclick="adImagen()" class="btn btn-primary">Submit</button>
        </div>
        </form>

       
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix" id="fotos">
                    <?php foreach($imagenes as $_IMG){ ?>
                    <li id="<?= $_IMG["idimagenes"] ?>">
                      <img src="<?= $_IMG["ruta"] ?>" width="128px" height="128px"  alt="User Image">
                      <a class="users-list-name" href="#"><?= $_IMG["nombre"] ?></a>
                      <span class="users-list-date"><?= $_IMG["fecha"] ?></span>
                      <button type="button" onclick="deleteImagen(<?= $_IMG["idimagenes"] ?>)" class="btn btn-block btn-danger btn-xs">Eliminar</button>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
              </div>
              </div>
          </section>
      <script type="text/javascript">
        


      </script>