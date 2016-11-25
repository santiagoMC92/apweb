    <!-- Content Header (Page header) -->
    <section class="content-header col-md-11">
      <h1>
        Roles
        <small>Tabla de Roles</small>
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
              <h3 class="box-title">Rol</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Rol</th>
                  <th>Descripcion</th>
                  <th>Estatus</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($roles as $_R){
                      ?>
                      <tr>
                        <td><?= $_R["idrol"] ?></td>
                        <td><?= $_R["rol"] ?></td>
                        <td><?= $_R["descripcion"] ?></td>
                        <td><?= $_R["estatus"] ?></td>
                        <td>
                          <div class="btn-group">
                          
                          <?php if(in_array("update", $_SESSION['permiso'][$_GET["v"]]) && $_R["idrol"]!=1){ ?>
                          <a type="button" onclick="goUpdate(<?= $_R["idrol"] ?>, 'Rol')" class="btn btn-warning">Editar</a>
                          <?php } ?>
                          <?php if($_SESSION['rol']=="Administrador" && $_R["idrol"]!=1){ ?>
                          <a type="button" class="btn btn-danger" onclick="Delete(<?= $_R["idrol"] ?>, 'Rol')">Eliminar</a>
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
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>