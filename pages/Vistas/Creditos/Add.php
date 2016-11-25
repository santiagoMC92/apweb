
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
                    <form id="add">
                        <!-- text input -->

                        <!--FIREFOX NO SOPORTA EL DATE-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control combo" id="idcliente">
                                    <option value="0">Seleccione Un Cliente</option>
                                    <?php 
                                    foreach($Clientes as $value){
                                        echo "<option value='" . $value["idcliente"] . "'>" . $value["nombre"] . "</option>";
                                    }
                                    ?>
                                </select>                    
                            </div> 
                        </div>

                        <!--                  -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Estatus</label>
                                    <br>
                                    <label>
                                        <input type="radio" name="estatus" id="optionsRadios1" value="1" checked>
                                        Activo
                                    </label>
                                    <label>
                                        <input type="radio" name="estatus" id="optionsRadios2" value="0">
                                        Inactivo
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Monto</label>
                                <input type="text" class="form-control col-md-4 numero spinner" placeholder="Monto" id="monto" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fechas</label>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Fecha de primer pago</label>
                                        <input type="text" class="form-control col-md-4 texto comision" name="datepicker" placeholder="Fecha de primer pago" id="fprimerpago">
                                    </div>
                                    <div class="col-md-3">      
                                        <label>Tiempo de Pago</label>
                                        <input type="text" class="form-control col-md-4 numero comision" placeholder="Tiempo de Pago" id="tiempoPago">
                                    </div>
                                    <div class="col-md-4 combo comision">
                                        <label>Tipo del tiempo de Pago</label>+
                                        <select class="form-control combo" id="tipoPagos">
                                            <option value="0">Seleccione tipo</option>
                                            <option value="1">Dia</option>
                                            <option value="2">Semana</option>
                                            <option value="3">Quinsena</option>
                                            <option value="4">Mes</option>
                                        </select>
                                    </div>  
                                    <div class="col-md-1">      
                                        <label>IVA 16%</label><br />
                                        <input type="checkbox" class="minimal" id="IVA" name="IVA" value="1">
                                    </div>                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subcuenta</label>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label>Subcuenta</label>
                                        <select class="form-control combo comision" id="idsubcuenta" onchange="getInteres(this.value)">
                                            <option value="0">Seleccione Una Subcuenta</option>
                                            <?php 
                                            foreach($Subcuentas as $value){
                                                echo "<option value='" . $value["idsubcuenta"] . "'>" . $value["nombre"] . "</option>";
                                            }
                                            ?>
                                        </select> 
                                    </div> 

                                    <div class="col-md-6">
                                    <label>%interes de Subcuenta</label>
                                        <input type="text" class="form-control col-md-4 numero comision" placeholder="Porcentaje" id="porcentaje_interes">
                                    </div> 

                                </div>   
                            </div> 
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Empleado</label>
                                <div class="form-group">
                                    <div class="col-md-4">
                                    <label>Acesor</label>
                                        <select class="form-control combo comision" id="idusuario" <?= ($_SESSION['rol']!="Administrador")? "disabled" : "" ?> onchange="getComision(this.value)">
                                            <option value="0">Seleccione Un Acesor</option>
                                            <?php 
                                            foreach($Usuarios as $value){
                                                echo "<option value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
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
                                                echo "<option value='" . $value["idusuario"] . "'>" . $value["nombre"] . "</option>";
                                            }
                                            ?>
                                        </select> 
                                    </div> 
                                     
                                    <div class="col-md-2">
                                        <label>Comision</label>
                                        <input type="text" class="form-control col-md-4 numero" placeholder="Comisionision" id="comision">
                                    </div> 
                                    <div class="col-md-2">
                                        <label>Pagado?</label><br>
                                        <input type="checkbox" class="minimal" id="comisionEstatus" value="0">
                                    </div> 

                                </div>   
                            </div>    
                        </div>              

                    </form>
                    <div class="form-group">  
                        <div class="col-md-6">
                            <div class="box-footer">
                                <button onclick="add('Credito')" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        <div class="col-md-6">
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


