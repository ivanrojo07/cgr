function formulario(elemento){
    if (elemento.value == "Prospecto") {
        document.getElementById('lidir').style.display='none';
        document.getElementById('licont').style.display='none';
        document.getElementById('lidat').style.display='none';
        $("label[for='calle']").html("Calle:");
        $('#calle').prop('required',false);
        $("label[for='numext']").html("Número Exterior:");
        $('#numext').prop('required',false);
        $("label[for='numinter']").html("Número Interior:");
        $('#numinter').prop('required',false);
        $("label[for='cp']").html("Código Postal:");
        $('#cp').prop('required',false);
        $("label[for='colonia']").html("Colonia:");
        $('#colonia').prop('required',false);
        $("label[for='municipio']").html("Municipio/Delegación:");
        $('#municipio').prop('required',false);
        $("label[for='ciudad']").html("Ciudad:");
        $('#ciudad').prop('required',false);
        $("label[for='estado']").html("Estado:");
        $('#estado').prop('required',false);

    }
    if (elemento.value == "Cliente") {
        document.getElementById('lidir').style.display='inline';
        document.getElementById('licont').style.display='inline';
        document.getElementById('lidat').style.display='inline';
        $("label[for='calle']").html("<i class='fa fa-asterisk' aria-hidden='true'></i> Calle:");
        $('#calle').prop('required',true);
        $("label[for='numext']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Número Exterior:");
        $('#numext').prop('required',true);
        $("label[for='numinter']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Número Interior:");
        $('#numinter').prop('required',true);
        $("label[for='cp']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Código Postal:");
        $('#cp').prop('required',true);
        $("label[for='colonia']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Colonia:");
        $('#colonia').prop('required',true);
        $("label[for='municipio']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Municipio/Delegación:");
        $('#municipio').prop('required',true);
        $("label[for='ciudad']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Ciudad:");
        $('#ciudad').prop('required',true);
        $("label[for='estado']").html("<i class='fa fa-asterisk' aria-hidden='true'></i>Estado:");
        $('#estado').prop('required',true);
    }
}
function persona(elemento){
  if(elemento.value == "Fisica"){
    document.getElementById('perfisica').style.display='inline';
    document.getElementById('permoral').style.display='none';
    document.getElementById('varrfc').pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
    document.getElementById('varrfc').placeholder="Ingrese 13 caracteres";
    document.getElementById('varrfc').title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
    $('#idnombre').prop('required',true);
    $('#apellidopaterno').prop('required',true);
    $('#razonsocial').prop('required',false);
    
  }
  if(elemento.value =="Moral"){
    document.getElementById('perfisica').style.display='none';
    document.getElementById('permoral').style.display='inline';
    document.getElementById('varrfc').pattern="^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
    document.getElementById('varrfc').placeholder="Ingrese 12 caracteres";
    document.getElementById('varrfc').title="Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
    $('#idnombre').prop('required',false);
    $('#apellidopaterno').prop('required',false);
    $('#razonsocial').prop('required',true);
  }
}

  

$(function(){
  tipopersona = $('#tipopersona').val();
  // var valor = String(tipopersona.value);
  if(tipopersona =="Moral"){
      document.getElementById('perfisica').style.display='none';
      document.getElementById('permoral').style.display='inline';
      document.getElementById('varrfc').pattern="^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
      document.getElementById('varrfc').placeholder="Ingrese 12 caracteres";
      document.getElementById('varrfc').title="Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
      $('#idnombre').prop('required',false);
    $('#apellidopaterno').prop('required',false);
    $('#razonsocial').prop('required',true);
  }
  else{
    document.getElementById('perfisica').style.display='inline';
    document.getElementById('permoral').style.display='none';
    document.getElementById('varrfc').pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
    document.getElementById('varrfc').placeholder="Ingrese 13 caracteres";
    document.getElementById('varrfc').title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
    $('#idnombre').prop('required',true);
    $('#apellidopaterno').prop('required',true);
    $('#razonsocial').prop('required',false);
    
  }
});

// $(function(){
//               $('.dropdown-submenu a.test').on("click", function(e){
//                 $(this).next('ul').toggle();
//                 e.stopPropagation();
//                 e.preventDefault();
//               });
//             });

// $(function() {
//    $("div.panel div ul li").click(function() {
//       // remove classes from all
//       $("li").removeClass("active");
//       // add class to the one we clicked
//       $(this).addClass("active");
//    });
// });
function deleteFunction(etiqueta) {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
swal({
  title: "¿Estas seguro?",
  text: "Si eliminas, no podras recuperar tu información.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "SI",
  cancelButtonText: "¡NO!",
  closeOnConfirm: false,
  closeOnCancel: false
},function(isConfirm){
  if (!isConfirm) {
    
    swal("Cancelado", "", "error");
  } else {
    
    document.getElementById(etiqueta).submit();          // submitting the form when user press yes
  }
});
}
// $('li a').click(function(){
//     $(this.getAttribute('class')).addClass("active");
//     $(this.getAttribute('href')).show();
// });
