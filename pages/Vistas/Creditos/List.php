    <!-- Content Header (Page header) -->
    
    <section class="content-header col-md-11">
      <h1>
        Créditos
        <small>Tabla de créditos</small>
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
              <h3 class="box-title">Crédito</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No. crédito</th>
                  <th>Estatus</th>
                  <th>Monto</th>
                  <th>Subcuenta</th>
                  <th>Cliente</th>
                  <th>% de interes</th>     
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
  
                    foreach($Creditos as $_C){
                      ?>
                      <tr>
                        <td><?= $_C["nocredito"] ?></td>
                        <td><?= ($_C["estatus"]=="1")? "Activo" : "Inactivo" ?></td>
                        
                        <td><?= $_C["monto"] ?></td>
                        <td><?= $_C["NameCuenta"] ?></td>                          
                        <td><?= $_C["NameCliente"] ?></td>
                        <td><?= $_C["porcentaje_interes"] ?></td>                          
                        <td>
                          <div class="btn-group">
                          <!--<a href="?v=user&v2=UserUpdate&v3=<?= $_C["nocredito"] ?>" class="btn btn-warning">Editar</a>-->
                          <?php if(in_array("update", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a type="button" onclick="goUpdate(<?= $_C["nocredito"] ?>, 'Credito')" class="btn btn-warning">Editar</a>
                          <a type="button" class="btn btn-danger" onclick="Pagar(<?= $_C["nocredito"] ?>)">Pagar</a>
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