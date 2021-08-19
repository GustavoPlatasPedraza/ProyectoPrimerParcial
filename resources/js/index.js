if(message == "verify"){
    Swal.fire(
        'Lo sentimos',
        'Correo o contraseña incorrectos',
        'error'
      );
}

let google_login = () => {
  fetch('generar_url',{mode:'no-cors'})
  .then(
      function(response){

        return response.text();
      }
  ).then(
      function(texto){
          //abrimos le irl generado por el cliente de google
          //console.log(texto);
          openurl(texto);
      }
  )
  .catch(function(err){
      console.log('Fetch error', err);
  });
}

let openurl = (url) => {
    const ventana = window.open(url,"Google Login", "width=1000, height=900");
    const intervalo = setInterval(function(){
        if(ventana.closed !== false){
            window.clearInterval(intervalo);
            window.location.href = "http://localhost/ProyectoPrimerParcial/inicio";
        }else{

        }
    },1000);
}