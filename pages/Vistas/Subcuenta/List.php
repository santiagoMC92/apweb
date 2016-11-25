    <!-- Content Header (Page header) -->
    <section class="content-header col-md-11">
      <h1>
        Subcuenta
        <small>Tabla de Subcuent</small>
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
              <h3 class="box-title">Subcuenta</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom. Subcuenta</th>
                  <th>% Interes</th>
                  <th>fondeador</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($Subcuenta as $_S){
                      ?>
                      <tr>
                        <td><?= $_S["idsubcuenta"] ?></td>
                        <td><?= $_S["nombre"] ?></td>
                        <td><?= $_S["porcentajeint"] ?></td>
                        <td><?= $_S["fondeador"] ?></td>
                        <td>
                          <div class="btn-group">
                          <!--<a href="?v=user&v2=UserUpdate&v3=<?= $_U["idusuario"] ?>" class="btn btn-warning">Editar</a>-->
                          <?php if(in_array("update", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a type="button" onclick="goUpdate(<?= $_S["idsubcuenta"] ?>, 'Subcuenta')" class="btn btn-warning">Editar</a>
                          <?php } ?>
                          <?php if($_SESSION['rol']=="Administrador"){ ?>
                          <a type="button" class="btn btn-danger" onclick="Delete(<?= $_S["idsubcuenta"] ?>, 'Subcuenta')">Eliminar</a>
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