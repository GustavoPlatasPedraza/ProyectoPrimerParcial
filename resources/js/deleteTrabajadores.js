if(message == "borrar"){
    Swal.fire({
        title: 'Desea borrar?',
        showDenyButton: true,
        confirmButtonText: `Si`,
        denyButtonText: `No`,
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: base_url + 'confirmDeleteTrabaajdores',
                data: {
                    'id': id_delete
                },
                success: function (data) {
                    if(data == "nice"){
                        Swal.fire(
                            'Listo',
                            'Se ha eliminado!',
                            'success'
                          ).then(function(){
                            window.location.href = base_url+"trabajdores";
                          })
                    }else{
                        Swal.fire(
                            'Lo sentimos',
                            data,
                            'error'
                          ).then(function(){
                            window.location.href = base_url+"trabajadores";
                          })
                    }
                }
            });
        } else if (result.isDenied) {
          Swal.fire('No se ha borrado', '', 'info');
          message = "";
          id_datos= "";
          window.location.href = base_url+"trabajadores";
        }
      });
}
