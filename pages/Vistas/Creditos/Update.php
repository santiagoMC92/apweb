
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
		<link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
		<script type="text/javascript" src="plugins/datepicker/bootstrap-datepicker.js"></script>

<section class="content">
    <div class="row">

        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-11">
            <!-- Horizontal Form -->

            <!-- general form elements disabled -->
            <div class="box box-warning">
                <div class="box-header with-border">

                    <h3 class="box-title">Agregar crédito</h3>
                </div>
                <div id="_AJAX_LOGIN_"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="updateCredito">
                        <!-- text input -->

                        <!--FIREFOX NO SOPORTA EL DATE-->

                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control combo" id="idcliente">
                                <option values="0">Seleccione Un Cliente</option>
                                <?php 
                                foreach($Clientes as $value){
                                    ?>
                                    <option value="<?= $value["idcliente"] ?>" <?php if($value["idcliente"]==$CreditoModel["idcliente"]){ echo "selected='selected'"; } ?> ><?= $value["nombre"] ?></option>
                                    <?php
                                }
                                ?>
                            </select>                    
                        </div> 

                        <!--                  -->
                        <div class="form-group">
                            <div class="form-group">
                                <label>Estatus</label>
                                <br>
                                <label>
                                    <input type="radio" name="estatus" id="optionsRadios1" value="1" <?= ($CreditoModel["estatus"]=="1")? "checked" : "" ?> >
                                    Activo
                                </label>
                                <label>
                                    <input type="radio" name="estatus" id="optionsRadios2" value="0" <?= ($CreditoModel["estatus"]=="0")? "checked" : "" ?> >
                                    Inactivo
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Monto</label>
                            <input type="text" class="form-control col-md-4 numero" placeholder="Monto" id="monto" value="<?= $CreditoModel["monto"] ?>">
                        </div>

                        <div class="form-group">
                            <label>Fechas</label>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Fecha de primer pago</label>
                                    <input type="text" class="form-control col-md-4 texto" name="datepicker" placeholder="Fecha de primer pago" value="<?= date('Y-m-d',strtotime($CreditoModel['fprimerpago'])) ?>" id="fprimerpago">
                                </div>
                                <div class="col-md-4">      
                                    <label>Tiempo de Pago</label>
                                    <input type="text" class="form-control col-md-4 numero" placeholder="Tiempo de Pago" id="tiempoPago" value="<?= $CreditoModel["tiempoPago"] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label>Tipo del tiempo de Pago</label>+
                                    <select class="form-control combo" id="tipoPagos">
                                        <option>Seleccione Una Subcuenta</option>
                                        <option value="1" <?= ($CreditoModel["tipoPagos"]=="1")? "selected='selected'" : "" ?> >Dia</option>
                                        <option value="2" <?= ($CreditoModel["tipoPagos"]=="2")? "selected='selected'" : "" ?>>Semana</option>
                                        <option value="3" <?= ($CreditoModel["tipoPagos"]=="3")? "selected='selected'" : "" ?>>Quinsena</option>
                                        <option value="4" <?= ($CreditoModel["tipoPagos"]=="4")? "selected='selected'" : "" ?>>Mes</option>
                                    </select>
                                </div>                      
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label>Subcuenta</label>
                            <div class="form-group">
                                <div class="col-md-6">
                                <label>Subcuenta</label>
                                    <select class="form-control combo" id="idsubcuenta" onchange="getInteres(this.value)">
                                        <option>Seleccione Una Subcuenta</option>
                                        <?php 
                                        foreach($Subcuentas as $value){
                                            ?>
                                            <option value="<?= $value["idsubcuenta"] ?>" <?php if($value["idsubcuenta"]==$CreditoModel["idsubcuenta"]){ echo "selected='selected'"; } ?> ><?= $value["nombre"] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div> 

                                <div class="col-md-6">
                                <label>%interes de Subcuenta</label>
                                    <input type="text" class="form-control col-md-4 numero" placeholder="Porcentaje" id="porcentaje_interes" value="<?= $CreditoModel["porcentaje_interes"] ?>">
                                </div> 

                            </div>   
                        </div>  

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Empleado</label>
                                <div class="form-group">
                                    <div class="col-md-4">
                                    <label>Asesor</label>
                                        <select class="form-control combo comision" id="idusuario" <?= ($_SESSION['rol']!="Administrador")? "disabled" : "" ?> onchange="getComision(this.value)">
                                            <option value="0">Seleccione Un Acesor</option>
                                            <?php 
                                            foreach($Usuarios as $value){
                                                if($value["idusuario"]==$CreditoModel["idusuario"]){
                                                    echo "<option selected='selected' value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
                                                }else{
                                                    echo "<option value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> 
                                    </div> 

                                    <div class="col-md-4">
                                    <label>Gestor</label>
                                        <select class="form-control combo comision" id="acesor" <?= ($_SESSION['rol']!="Administrador")? "disabled" : "" ?> onchange="getComision(this.value)">
                                            <option value="0">Seleccione Un Gestor</option>
                                            <?php 
                                            foreach($Usuarios as $value){
                                                if($value["idusuario"]==$CreditoModel["acesor"]){
                                                    echo "<option selected='selected' value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
                                                }else{
                                                    echo "<option value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select> 
                                    </div> 
                                     
                                    <div class="col-md-2">
                                        <label>Comision</label>
                                        <input type="text" class="form-control col-md-4 numero" placeholder="Comisionision" id="comision" value="<?= $CreditoModel["comision"] ?>">
                                    </div> 
                                    <div class="col-md-2">
                                        <label>Pagado?</label><br>
                                        <input type="checkbox" class="minimal" id="comisionEstatus" <?= ($CreditoModel["comisionEstatus"]=="1")? "checked" : "" ?> onchange="pagarC(this.value)" value="0">
                                    </div> 

                                </div>   
                            </div>    
                        </div>                

                    </form>
                    <div class="form-group">  
                        <div class="col-md-4">
                            <div class="box-footer">
                                <button onclick="update('Credito', <?= $CreditoModel["nocredito"] ?>)" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-footer">
                                <button onclick="Cancelar()" class="btn btn-primary">Cancelar</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-footer">
                                <button onclick="Pagos()" class="btn btn-primary">Generar Pagos</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="tablaPagos"></div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

<script type="text/javascript"> $("input[name='datepicker']").datepicker({
      dateFormat: 'yy-mm-dd'
    });</script>






