function __(id) {
  return document.getElementById(id);
}

function DeleteItem(contenido,url) {
  var action = window.confirm(contenido);
  if (action) {
      window.location = url;
  }
}


function addUser() {
  var bandera=validar();

  if(bandera==0){
    var connect, form, response, result, user, pass, sesion;
      form="1=1";
      $("#addUser").find(":input").each(function(){
          var elemento=this;
          if(elemento.name=="estatus"){
              if($(this).is(":checked")){
                  form += "&" + elemento.name + "=" + elemento.value;
              }
          }else{
              form += "&" + elemento.id + "=" + elemento.value;
          }
          //form += "&" + elemento.id + "=" + elemento.value;
          //alert(elemento.id + elemento.value);
      });
      //alert(form);
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
      if(connect.readyState == 4 && connect.status == 200) {
        if(connect.responseText == 0) {
          result = '<div class="callout callout-danger">';
          result += '<h4>Error!</h4>';
          result += '<p><strong>Verifica tu informacion...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
        } else {
          result = '<div class="alert alert-dismissible alert-success">';
          result += '<h4>Agregado!</h4>';
          result += '<p><strong>Estamos redireccionandote...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
          addPermiso(connect.responseText);
          location.reload();

          
        }
      } else if(connect.readyState != 4) {
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Agregando....</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
      }
    }
     connect.open('POST','ajax.php?mode=addUser',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
  }

  $('#_AJAX_LOGIN_').hide(3500);
  

}

function addPermiso(idrol){
  
      $("#Permiso").find(":input").each(function(){
          var elemento=this;
          var valueElement="";
          if(elemento.name=="Permiso"){
              if($(this).is(":checked")){
                  valueElement=(elemento.value).split("-");
                  setPermiso(valueElement[0], valueElement[1], idrol);
              }
          }
          //form += "&" + elemento.id + "=" + elemento.value;
          //alert(elemento.id + elemento.value);
      });
  //location.reload();
}

function setPermiso(modulo,permiso,idrol){
  //alert(modulo+","+permiso+","+idusuario);
  var archivos = "";
  var nivel="1";
  var action=0;

  if($("#"+modulo+"-"+permiso).hasClass("activo")){
    action=1;
  }
  
  if(modulo.toLowerCase()==permiso){
    nivel="0";
  }
  $.ajax({
    url: 'ajax.php?mode=permiso&modulo=' + modulo.toLowerCase() + '&seccion=' + permiso + '&idrol=' + idrol + '&nivel=' + nivel + '&action='+action,
    type: 'POST',
    contentType: false, 
          data: archivos,
          processData:false,
    beforeSend : function (){
      //$('#cargando').show(300); 
      if($("#"+modulo+"-"+permiso).hasClass("activo")){
        $("#"+modulo+"-"+permiso).removeClass("activo")
      }else{
        $("#"+modulo+"-"+permiso).addClass("activo")
        
      }
    },
    success: function(data){
      
    }
  });
  return false;
}


function add(NomModel) {
  var bandera=validar();

  if(bandera==0){
    var connect, form, response, result, user, pass, sesion;
      form="1=1";
      $("#add").find(":input").each(function(){
          var elemento=this;
          if(elemento.name=="estatus" || elemento.name=="IVA"){
              if($(this).is(":checked")){
                  form += "&" + elemento.name + "=" + elemento.value;
              }
          }else{
              form += "&" + elemento.id + "=" + elemento.value;
          }
          //form += "&" + elemento.id + "=" + elemento.value;
          //alert(elemento.id + elemento.value);
      });
      //alert(form);
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
      if(connect.readyState == 4 && connect.status == 200) {
        if(connect.responseText == 0) {
          result = '<div class="callout callout-danger">';
          result += '<h4>Error!</h4>';
          result += '<p><strong>Verifica tu informacion...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
          //location.reload();
        } else if(connect.responseText == 1){
          result = '<div class="alert alert-dismissible alert-success">';
          result += '<h4>Agregado!</h4>';
          result += '<p><strong>Estamos redireccionandote...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
          if(NomModel=="Rol"){
            addPermiso(connect.responseText);
          }
          location.reload();
          $("form").reset();
        } else {
          if(NomModel=="Rol"){
            result = '<div class="alert alert-dismissible alert-success">';
            result += '<h4>Agregado!</h4>';
            result += '<p><strong>Estamos redireccionandote...</strong></p>';
            result += '</div>';
            __('_AJAX_LOGIN_').innerHTML = result;
            
              addPermiso(connect.responseText);
            
            location.reload();
            $("form").reset();
            
          }else{
            result = '<div class="callout callout-danger">';
          result += '<h4>Error!</h4>';
          result += '<p><strong>Verifica tu informacion...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
          }
          
        }
      } else if(connect.readyState != 4) {
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Agregando....</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
      }
    }
    //alert("mode=add"+NomModel);
    connect.open('POST','ajax.php?mode=add'+NomModel,true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
  }

  $('#_AJAX_LOGIN_').hide(3500);

}

function validar(){
  var bancera=0;
  $("#add").find(".form-group").each(function(){
    var div=this;
        $(this).find(":input").each(function(){
            
            if($(this).hasClass('numero') && this.value<1){
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('combo') && this.value<1){
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('email') && ($(".email").val().indexOf('@', 0) == -1 || $(".email").val().indexOf('.', 0) == -1)){
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('telefono') && $(this).val().length != 10) {
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('texto') && $(this).val().length < 1) {
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('curp') && $(this).val().length != 18) {
              $(this).addClass("errorInpu");
              bancera=1;
            }

            if($(this).hasClass('numero') && this.value>0.1){
              $(this).removeClass("errorInpu");
            }

            if($(this).hasClass('combo') && this.value>0){
              $(this).removeClass("errorInpu");
            }

            if($(this).hasClass('email') && ($(".email").val().indexOf('@', 0) != -1 || $(".email").val().indexOf('.', 0) != -1)){
              $(this).removeClass("errorInpu");
            }

            if($(this).hasClass('telefono') && $(this).val().length == 10) {
              $(this).removeClass("errorInpu");
            }

            if($(this).hasClass('texto') && $(this).val().length > 1) {
              $(this).removeClass("errorInpu")
            }

            if($(this).hasClass('curp') && $(this).val().length == 18) {
              $(this).removeClass("errorInpu")
            }


            
        });

    });


  return bancera;
}

function update(NomModel, id) {
  var bandera=validar();

  if(bandera==0){
    var connect, form, response, result, user, pass, sesion;
      form="1=1";
      form="&id="+id;
      $("#update"+NomModel).find(":input").each(function(){
          var elemento=this;
          if(elemento.name=="estatus"){
              if($(this).is(":checked")){
                  form += "&" + elemento.name + "=" + elemento.value;
              }
          }else{
              form += "&" + elemento.id + "=" + elemento.value;
          }
          //form += "&" + elemento.id + "=" + elemento.value;
          //alert(elemento.id + elemento.value);
      });
      //alert(form);
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
      if(connect.readyState == 4 && connect.status == 200) {
        if(connect.responseText == 2) {
            result = '<div class="callout callout-danger">';
          result += '<h4>Error!</h4>';
          result += '<p><strong>Verifica tu informacion...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;
        } else {
          result = '<div class="alert alert-dismissible alert-success">';
          result += '<h4>Agregado!</h4>';
          result += '<p><strong>Estamos redireccionandote...</strong></p>';
          result += '</div>';
          __('_AJAX_LOGIN_').innerHTML = result;

          location.reload();
          __('add').innerHTML = connect.responseText;
          //__('atab2').innerHTML="Agregar";
           $("input[name='datepicker']").datepicker({
            dateFormat: 'yy-mm-dd'
          });
          //location.reload();
        }
      } else if(connect.readyState != 4) {
        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>Procesando...</h4>';
        result += '<p><strong>Agregando....</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
      }
    }
    //alert("mode=update"+NomModel);
     connect.open('POST','ajax.php?mode=update'+NomModel,true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
  }
  
  $('#_AJAX_LOGIN_').hide(3500);
}


function Delete(id, modulo) {  
  form = 'id=' + id;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Eliminado!</h4>';
        result += '<p><strong>Estamos redireccionandote...</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
        location.reload();
      } else {
      
        result = '<div class="callout callout-danger">';
        result += '<h4>Error!</h4>';
        result += '<p><strong>Error al eliminar Usuario...</strong></p>';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
      }
    } else if(connect.readyState != 4) {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Eliminando....</strong></p>';
      result += '</div>';
      __('_AJAX_LOGIN_').innerHTML = result;
    }
  }
   connect.open('POST','ajax.php?mode=delete'+modulo,true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  
  $('#_AJAX_LOGIN_').hide(3500);
}


function goUpdate(id, modulo) {
  var form;
  form = 'mode=update' + modulo + '&id=' + id;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
        result = '<div class="callout callout-danger">';
        result += '<h4>Error!</h4>';
        result += '<p><strong>Verifica tu informacion...</strong></p>';
        result += '</div>';
        __('add').innerHTML = result;
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
      } else {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Ok...</h4>';
        result += '<p><strong>Estamos redireccionandote...</strong></p>';
        result += '</div>';
        $('#tab1').removeClass("active");
         // id="Ntab1
        $('#tab2').addClass("active");
        __('Ntab2').innerHTML="<a href='#tab2' id='atab2' data-toggle='tab'>Actualizar</a>";
        
        //__('atab2').innerHTML="Actualizar";
        __('add').innerHTML = connect.responseText;
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
        $("input[name='datepicker']").datepicker({
          dateFormat: 'yy-mm-dd'
        });
      }
    } else if(connect.readyState != 4) {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Estamos intentando localizar la informacion....</strong></p>';
      result += '</div>';
      __('add').innerHTML = result;
    }
  }
   connect.open('POST','ajaxModulos.php?mode=update' + modulo,true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}


function goImagen(id){
  var form;
  form = 'idcliente=' + id;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
        result = '<div class="callout callout-danger">';
        result += '<h4>Error!</h4>';
        result += '<p><strong>Verifica tu informacion...</strong></p>';
        result += '</div>';
        __('add').innerHTML = result;
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
      } else {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Ok...</h4>';
        result += '<p><strong>Estamos redireccionandote...</strong></p>';
        result += '</div>';
        $('#tab1').removeClass("active");
         // id="Ntab1
        $('#tab2').addClass("active");
        __('atab2').innerHTML="Agregar Imagen";
        __('add').innerHTML = connect.responseText;
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
        $("input[name='datepicker']").datepicker({
          dateFormat: 'yy-mm-dd'
        });
      }
    } else if(connect.readyState != 4) {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Estamos intentando localizar la informacion....</strong></p>';
      result += '</div>';
      __('add').innerHTML = result;
    }
  }
   connect.open('POST','ajaxModulos.php?mode=Imagen',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}


function Cancelar() {
  
    location.reload();
  

}

function goList(modulo) {
  var form;
  form = 'mode=List' + modulo;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
        result = '<div class="callout callout-danger">';
        result += '<h4>Error!</h4>';
        result += '<p><strong>Verifica tu informacion...</strong></p>';
        result += '</div>';
        __('tab1').innerHTML = result;
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
      } else {
        $('#tab2').removeClass("active");
         // id="Ntab1
        $('#tab1').addClass("active");
        __('tab1').innerHTML = connect.responseText;
        $('#tab2, #Ntab2').removeClass("active");
        $('#tab1, #Ntab1').addClass("active");
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      }
    } else if(connect.readyState != 4) {
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Estamos intentando localizar la informacion....</strong></p>';
      result += '</div>';
      __('tab1').innerHTML = result;
    }
  }
   connect.open('POST','ajaxModulos.php?mode=List' + modulo,true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  

}


function Pagos() {
  var bandera=validar();

  if(bandera==0){
    var connect, form, response, result, user, pass, sesion;
      form="1=1";
      $("#add").find(":input").each(function(){
          var elemento=this;
          if(elemento.name=="estatus" || elemento.name=="IVA"){
              if($(this).is(":checked")){
                  form += "&" + elemento.name + "=" + elemento.value;
              }
          }else{
              form += "&" + elemento.id + "=" + elemento.value;
          }
          //form += "&" + elemento.id + "=" + elemento.value;
          //alert(elemento.id + elemento.value);
      });
      //alert(form);
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
      if(connect.readyState == 4 && connect.status == 200) {
        if(connect.responseText == 2) {
            
        } else {
          __('tablaPagos').innerHTML = connect.responseText;
          
          //location.reload();
        }
      } else if(connect.readyState != 4) {
        
      }
    }
    //alert("mode=update"+NomModel);
     connect.open('POST','ajax.php?mode=pagos',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);
  }
  

}

function Pagar(id) {

  var connect, form, response, result, user, pass, sesion;
    form="id="+id;
    //alert(form);
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 2) {
          
      } else {

        __('add').innerHTML = connect.responseText;
        $('#tab1').removeClass("active");
         // id="Ntab1
        $('#tab2').addClass("active");
        __('atab2').innerHTML="Pagar";
        $('#tab1, #Ntab1').removeClass("active");
        $('#tab2, #Ntab2').addClass("active");
        
        //location.reload();
      }
    } else if(connect.readyState != 4) {
      
    }
  }
  //alert("mode=update"+NomModel);
   connect.open('POST','ajax.php?mode=pagar',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  

}

function RelizarPago(id, valor, idCredito) {

  var connect, form, response, result, user, pass, sesion;
  if(valor=="0"){
    valor="1"
  }else{
    valor="0";
  }
    form="id="+id+"&value="+valor+"&idCredito"+idCredito;
    //alert(form);
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
          __("pago"+id).value=valor;
      } else {

        
        
        //location.reload();
      }
    } else if(connect.readyState != 4) {
      
    }
  }
  //alert("mode=update"+NomModel);
   connect.open('POST','ajax.php?mode=realizarPago',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  

}


function getInteres(id) {

  var connect, form, response, result, user, pass, sesion;
    form="id="+id;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 2) {
          
      } else {
        __('porcentaje_interes').value = connect.responseText;
        getComision($("#acesor").val());
        //location.reload();
      }
    } else if(connect.readyState != 4) {
      
    }
  }
  //alert("mode=update"+NomModel);
   connect.open('POST','ajax.php?mode=getInteres',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
  

}

function getComision(id){
  var connect, form, response, result, monto, interes, sesion;
    monto=__('monto').value;
    tipoPagos=__('tipoPagos').value;
    tiempoPago=__('tiempoPago').value;
    interes=__('porcentaje_interes').value;
    form="id="+id+"&monto="+monto+"&interes="+interes+"&tiempoPago="+tiempoPago+"&tipoPagos="+tipoPagos;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 2) {
          
      } else {
        //__('porcentaje_interes').value = connect.responseText;
        var comision =(connect.responseText).split(" - ");
        //__('id2').value = comision[1];
        __('comision').value = comision[0];
        //alert(s[1]);
        
        //location.reload();
      }
    } else if(connect.readyState != 4) {
      
    }
  }
  //alert("mode=update"+NomModel);
   connect.open('POST','ajax.php?mode=getComision',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}

function pagarC(valor){
  if(valor=="0"){
    __("comisionEstatus").value="1";
  }else{
    __("comisionEstatus").value="0";
  }
}


$(".email").focusout(function () {  
    if($(".email").val().indexOf('@', 0) == -1 || $(".email").val().indexOf('.', 0) == -1) {  
        $(".email").addClass("errorInpu"); 
    }   
});  


$("#curp").focusout(function () {  
    if($("#curp").val().length == 18) {  
        var connect, form, response, result, monto, interes, sesion;
        curp=__('curp').value;
        form="curp="+curp;
          connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
          connect.onreadystatechange = function() {
            if(connect.readyState == 4 && connect.status == 200) {
              if(connect.responseText > 0) {
                  alert("La CURP: " + curp + " se encuentra en los registros con el Numero de cliente "+connect.responseText);
                  $("#curp").addClass("errorInpu"); 
              } else {
                //__('porcentaje_interes').value = connect.responseText;
                $("#curp").removeClass("errorInpu")
                //alert(s[1]);
                
                //location.reload();
              }
            } else if(connect.readyState != 4) {
              
            }
          }
      //alert("mode=update"+NomModel);
       connect.open('POST','ajax.php?mode=curp',true);
      connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      connect.send(form); 
    }   
}); 



$(".numero").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
             return;
    }

    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

$(".campoNumerico").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
             return;
    }

    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});

$(".telefono").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39)) {
             return;
    }

    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});


function adImagen(){

    
    var comprobar = $('#foto').val().length * $('#descripcion').val().length * $('#nombre').val().length;
    
    if(comprobar>0){
      var formulario = $('#subida');
      var datos = formulario.serialize();
      var archivos = new FormData();  
      var url = 'ajax.php';
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) { 
          
                 archivos.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
            }
      $.ajax({
        url: 'ajax.php?mode=Imagen&'+datos,
        type: 'POST',
        contentType: false, 
              data: archivos,
                processData:false,
        beforeSend : function (){
          $('#cargando').show(300); 
        },
        success: function(data){
          $('#cargando').hide(300);
          $('#fotos').append(data);
          $('#subida')[0].reset();
          return false;
        }
      });
      return false;
    }else{
      alert('Selecciona una foto para subir e ingrese su descripcion');
      return false;
    }

}


function deleteImagen(id){
  var archivos = "";
      
  $.ajax({
    url: 'ajax.php?mode=DeleteImagen&id='+id,
    type: 'POST',
    contentType: false, 
          data: archivos,
            processData:false,
    beforeSend : function (){
      $('#cargando').show(300); 
    },
    success: function(data){
      if(data==1){
        $("#"+id).remove();
      }else{
        alert("No se pudo eliminar la imagen");
      }
      return false;
    }
  });
  return false;

}


function cerrar(){
  var archivos = "";
      
  $.ajax({
    url: 'ajax.php?mode=cerrar',
    type: 'POST',
    contentType: false, 
    data: archivos,
    processData:false,
    beforeSend : function (){
      $('#cargando').show(300); 
    },
    success: function(data){
      location.reload();
    }
  });
  return false;

}

$("#idcliente").change(function(){
  $.ajax({
    url: 'ajax.php?mode=acesor&idcliente='+$("#idcliente").val(),
    type: 'POST',
    contentType: false, 
    processData:false,
    beforeSend : function (){
      $('#cargando').show(300); 
    },
    success: function(data){
      $("#idusuario").val(data);
      $("#acesor").val(data);
    }
  });
  return false;
});

$(".comision").change(function(){
  getComision($("#acesor").val());
});

