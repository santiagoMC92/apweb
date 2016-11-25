    <!-- Content Header (Page header) -->
    <section class="content-header col-md-11">
      <h1>
        Fondeador
        <small>Tabla de Fondeador</small>
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
              <h3 class="box-title">Fondeador</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Fondeador</th>
                  <th>Codigo</th>
                  <th>Inversion</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($Fondeador as $_F){
                      ?>
                      <tr>
                        <td><?= $_F["idfondeador"] ?></td>
                        <td><?= $_F["nombre"] ?></td>
                        <td><?= $_F["codigo"] ?></td>
                        <td><?= $_F["cantinvert"] ?></td>
                        <td>
                          <div class="btn-group">
                          <!--<a href="?v=user&v2=UserUpdate&v3=<?= $_U["idusuario"] ?>" class="btn btn-warning">Editar</a>-->
                          <?php if(in_array("update", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a type="button" onclick="goUpdate(<?= $_F["idfondeador"] ?>, 'Fondeador')" class="btn btn-warning">Editar</a>
                          <?php } ?>
                          <?php if($_SESSION['rol']=="Administrador"){ ?>
                          <a type="button" class="btn btn-danger" onclick="Delete(<?= $_F["idfondeador"] ?>, 'Fondeador')">Eliminar</a>
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