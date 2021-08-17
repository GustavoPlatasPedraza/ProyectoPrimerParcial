 document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')


const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});

if(message == "success"){
    Swal.fire(
        'Exito',
        'registro agregado correctamente',
        'success'
    );
    message = "";
}

if(message == "errorInsert"){
    Swal.fire(
        'Lo sentimos',
        'Ha ocurrido un error intente mas tarde',
        'error'
    );
    message = "";
}

if(message == "PassIncorrectas"){
    Swal.fire(
        'Lo sentimos',
        'Las contraseñas no coinciden',
        'error'
    );
    message = "";
}

if(message == "errorAct"){
    Swal.fire(
        'Lo sentimos',
        'Hubo un error al actualizar',
        'error'
    );
    message = "";
}

if(message == "cambioAct"){
    Swal.fire(
        'Listo¡',
        'El cambio se ha realizado',
        'success'
    );
    message = "";
}