    <!-- Content Header (Page header) -->

    <section class="content-header col-md-11">
      <h1>
        Usuarios
        <small>Tabla de usuarios</small>
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
              <h3 class="box-title">Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Rol</th>
                    <th>Telefono</th>
                    
                    <th>Estatus</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($Usuarios as $_U){
                      ?>
                      <tr>
                        <td><?= $_U["idempleado"] ?></td>
                        <td><?= $_U["usuario"] ?></td>
                        <td><?= $_U["nombre"] ?></td>
                        <td><?= $_U["rol"] ?></td>
                        <td><?= $_U["telefono"] ?></td>
                        
                        <td><?= $_U["estatus"] ?></td>
                        <td>
                          <div class="btn-group">
                          <!--<a href="?v=user&v2=UserUpdate&v3=<?= $_U["idusuario"] ?>" class="btn btn-warning">Editar</a>-->
                          <?php
                          if(isset($_SESSION['permiso'][$_GET["v"]])) {
                          if(in_array("update", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a type="button" onclick="goUpdate(<?= $_U["idusuario"] ?>, 'User')" class="btn btn-warning">Editar</a>
                          <?php } 
                          }?>
                          <?php if($_SESSION['rol']=="Administrador"){ ?>
                          <a type="button" class="btn btn-danger" onclick="Delete(<?= $_U["idempleado"] ?>,'User')">Eliminar</a>
                          <?php }
                           ?>
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