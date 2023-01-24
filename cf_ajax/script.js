function cargaSendMail(){

$("#c_enviar").attr("disabled", true);

$(".c_error").remove();

var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;
var s_email = $(‘#c_mail’).val();
var s_name = $(‘#c_name’).val();
var s_msg = $(‘#c_msg’).val();

if (filter.test(s_email)){
sendMail = "true";
} else{
$(‘#c_mail’).after("<span class=’c_error’ id=’c_error_mail’>Ingrese e-mail valido.</span>");
//aplicamos color de borde si el se encontro algun error en el envio
$(‘#contactform’).css("border-color","#e74c3c");
sendMail = "false";
}
if (s_name.length == 0 ){
$(‘#c_name’).after( "<span class=’c_error’ id=’c_error_name’>Ingrese su nombre.</span>" );
var sendMail = "false";
}
if (s_msg.length == 0 ){
$(‘#c_msg’).after( "<span class=’c_error’ id=’c_error_msg’>Ingrese mensaje.</span>" );
var sendMail = "false";
}

if(sendMail == "true"){

var datos = {

"nombre" : $(‘#c_name’).val(),

"email" : $(‘#c_mail’).val(),

"mensaje" : $(‘#c_msg’).val()

};

$.ajax({

data: datos,
// hacemos referencia al archivo contacto.php
url: ‘contacto.php’,

type: ‘post’,

beforeSend: function () {
//aplicamos color de borde si el envio es exitoso
$(‘#contactform’).css("border-color","#25A25A");

$("#c_enviar").val("Enviando…");

},

success: function (response) {

$(‘form’)[0].reset();
$("#c_enviar").val("Enviar");
$("#c_information p").html(response);
$("#c_information").fadeIn(‘slow’);
$("#c_enviar").removeAttr("disabled");

}

});

} else{
$("#c_enviar").removeAttr("disabled");
}

}