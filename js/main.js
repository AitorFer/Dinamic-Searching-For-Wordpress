//buscar entre todos los cursos

$(buscar_datos());
///PAGINA PRINCIPAL AJAX
function buscar_datos(consulta){
  $.ajax({
      url: 'buscar.php',
      type: 'POST',
      dataType:'html',
      data: {consulta: consulta}
    })
    .done(function(respuesta){
      $("#datos").html(respuesta);
      console.log("success");
    })
    .fail(function(){
      console.log("error")
    })
}

//funcion dinamica todas las tablas
$(document).on('keyup','#caja_busqueda',function(){
    var valor = $(this).val();
    if(valor != ""){
      buscar_datos(valor);
    }else{
      buscar_datos();
    }
});
////////////DOBLE GRADO AJAX////////////
$('input#doble-grado').click(function(){

  function buscar_doble_grados(consulta){
  $.ajax({
      url: 'doble-grado.php',
      type: 'POST',
      dataType:'html',
      data: {consulta: consulta}
    })
    .done(function(respuesta){
      $("#datos").html(respuesta);
      console.log("success");
      alert(respuesta);
    })
    .fail(function(){
      console.log("error")
    })
}
$(buscar_doble_grados());

});
////////where to study////////

////////FP_SUPERIOR AJAX//////////
$('input#fp-superior').click(function(){

  function buscar_fp_superior(consulta){
  $.ajax({
      url: 'fp-superior.php',
      type: 'POST',
      dataType:'html',
      data: {consulta: consulta}
    })
    .done(function(respuesta){
      $("#datos").html(respuesta);
      console.log("success");
      alert(respuesta);
    })
    .fail(function(){
      console.log("error")
    })
}
$(buscar_fp_superior());

});
////////FP-MEDIO AJAX//////////
$('input#fp-medio').click(function(){

  function buscar_fp_medio(consulta){
  $.ajax({
      url: 'fp-medio.php',
      type: 'POST',
      dataType:'html',
      data: {consulta: consulta}
    })
    .done(function(respuesta){
      $("#datos").html(respuesta);
      console.log("success");
      alert(respuesta);
    })
    .fail(function(){
      console.log("error")
    })
}
$(buscar_fp_medio());

});
$('input#grado-universitario').click(function(){
  console.log('grado');

function buscar_grados_universitarios(consulta){
  $.ajax({
      url: 'grado-universitario.php',
      type: 'POST',
      dataType:'html',
      data: {consulta: consulta
        }
    })
    .done(function(response){
      $("#datos").html(response);
      console.log("success");
      alert(response);
    })
    .fail(function(){
      console.log("error")
    })
}
buscar_grados_universitarios();

});




