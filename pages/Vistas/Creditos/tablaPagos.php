    <!-- Content Header (Page header) -->

    <section class="content-header col-md-11">
    <button onclick="Cancelar()" class="btn btn-danger">Finalizar</button>
      <h1>
        Tabla de Pagos
      </h1>
    </section>
<br />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-11">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Pago</th>
                  <th>Fecha de Pago</th>
                  <?php if(isset($_POST["id"])){ ?>
                  <th>Fecha Pagado</th>
                  <?php } ?>
                  <th>Monto Sin Interes</th>
                  <th>Interes</th>
                  <th>IVA</th>
                  <th>Total pago</th>
                  <?php if(isset($_POST["id"])){ ?>
                        <td>  </td>
                        <?php } 
                      ?>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  echo date('Y-m-d');
                    $TmontoSinIntees=0;
                    $TMontoInteres=0;
                    $TMontoTotal=0;
                    $TMontoIVA=0;
                    foreach($Pagos as $_P){
                      
                      $TmontoSinIntees +=$_P["montoSinInteres"];
                      $TMontoInteres +=$_P["montoInteres"];
                      $TMontoIVA +=$_P["IVA"];
                      $TMontoTotal += $_P["montoTotal"];
                      ?>
                      <tr>
                        <td><?= $_P["NumPago"] ?></td>
                        <td><?= $_P["fechaDePago"] ?></td>
                        <?php if(isset($_P["idpagos"])){ ?>
                        <td><?= $_P["fechaPagado"] ?></td>
                        <?php } ?>
                        <td><?= $_P["montoSinInteres"] ?></td>
                        <td><?= $_P["montoInteres"] ?></td>
                        <td><?= $_P["IVA"] ?></td>
                        <td><?= $_P["montoTotal"] ?></td>
                        <?php if(isset($_P["idpagos"])){ ?>
                        <td> <input type="checkbox" class="minimal" <?= ($_P["estatus"]=="1")? "checked" : "" ?> id="pago<?= $_P["idpagos"] ?>" value="<?= $_P["estatus"] ?>" onchange="RelizarPago(<?= $_P["idpagos"] ?>, this.value, <?= $_P["idcredito"] ?>)"> </td>
                        <?php } ?>
                        </tr>
                      <?php
                    }
                  ?>  
                  <tr>
                    <th></th>
                    <th>Total</th>
                    <th><?= ceil($TmontoSinIntees) ?></th>
                    <th><?= $TMontoInteres ?></th>
                    <th><?= $TMontoIVA ?></th>
                    <th><?= $TMontoTotal ?></th>
                  </tr>            
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