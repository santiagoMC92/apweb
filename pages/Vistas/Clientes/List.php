    <!-- Content Header (Page header) -->
    <section class="content-header col-md-11">
      <h1>
        Creditos
        <small>Tabla de Creditos</small>
      </h1>
      
    </section>
<br />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-11">
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom. Cliene</th>
                  <th>Celular</th>
                  <th>Estaus</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($Clientes as $_C){
                      ?>
                      <tr>
                        <td><?= $_C["idcliente"] ?></td>
                        <td><?= $_C["nombre"] ?></td>
                        <td><?= $_C["celular"] ?></td>
                        <td><?= $_C["estatus"] ?></td>
                        <td>
                          <div class="btn-group">
                          <!--<a href="?v=user&v2=UserUpdate&v3=<?= $_U["idusuario"] ?>" class="btn btn-warning">Editar</a>-->
                          <?php if(isset($_SESSION['permiso'][$_GET["v"]])) {
                            if(in_array("update", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a type="button" class="btn btn-success" onclick="goImagen(<?= $_C["idcliente"] ?>)">Imagen</a>
                          <a type="button" onclick="goUpdate(<?= $_C["idcliente"] ?>, 'Clientes')" class="btn btn-warning">Editar</a>
                          <?php }
                          } ?>
                          <?php if($_SESSION['rol']=="Administrador"){ ?>
                          <a type="button" class="btn btn-danger" onclick="Delete(<?= $_C["idcliente"] ?>, 'Clientes')">Eliminar</a>
                          <?php } ?>
                          
                          </div>
                        </td>
                        </tr>
                      <?php
                    }
                  ?>              
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>