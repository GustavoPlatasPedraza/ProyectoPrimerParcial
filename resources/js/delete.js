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
                url: base_url + 'confirmDelete',
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
                            window.location.href = base_url+"adminPersonas";
                          })
                    }else{
                        Swal.fire(
                            'Lo sentimos',
                            data,
                            'error'
                          ).then(function(){
                            window.location.href = base_url+"adminPersonas";
                          })
                    }
                }
            });
        } else if (result.isDenied) {
          setTimeout(function () {
            Swal.fire('No se ha borrado', '', 'info');
            message = "";
            id_datos= "";
            window.location.href = base_url+"adminPersonas";
          }, 2000);
          
        }
      });
}

if(message == "borrarDocumento"){
  Swal.fire({
    title: 'Desea borrar?',
    showDenyButton: true,
    confirmButtonText: `Si`,
    denyButtonText: `No`,
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "POST",
            url: base_url + 'confirmDeleteDocumentos',
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
                        window.location.href = base_url+"adminDocumentos";
                      })
                }else{
                    Swal.fire(
                        'Lo sentimos',
                        data,
                        'error'
                      ).then(function(){
                        window.location.href = base_url+"adminDocumentos";
                      })
                }
            }
        });
    } else if (result.isDenied) {
      Swal.fire('No se ha borrado', '', 'info');
      setTimeout(function () {
        message = "";
        id_datos= "";
        window.location.href = base_url+"adminDocumentos";
      }, 1000);
      
    }
  });
}