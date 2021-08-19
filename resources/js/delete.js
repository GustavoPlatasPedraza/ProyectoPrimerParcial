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
        window.location.href = base_url+"adminDocumentos";
      }, 1000);
      
    }
  });
}

if(message == "borrarTrabajador"){
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
                        window.location.href = base_url+"trabajadores";
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
      setTimeout(function () {
        window.location.href = base_url+"trabajadores";
      }, 1000);
      
    }
  });
}

if(message == "borrarDepartamento"){
  Swal.fire({
    title: 'Desea borrar?',
    showDenyButton: true,
    confirmButtonText: `Si`,
    denyButtonText: `No`,
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "POST",
            url: base_url + 'confirmDeleteDepartamento',
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
                        window.location.href = base_url+"departamentos";
                      })
                }else{
                    Swal.fire(
                        'Lo sentimos',
                        data,
                        'error'
                      ).then(function(){
                        window.location.href = base_url+"departamentos";
                      })
                }
            }
        });
    } else if (result.isDenied) {
      Swal.fire('No se ha borrado', '', 'info');
      setTimeout(function () {
        window.location.href = base_url+"departamentos";
      }, 1000);
      
    }
  });
}

if(message == "borrarUsuario"){
  Swal.fire({
      title: 'Desea borrar?',
      showDenyButton: true,
      confirmButtonText: `Si`,
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "POST",
              url: base_url + 'confirmDeleteUsuario',
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
                          window.location.href = base_url+"adminUsuarios";
                        })
                  }else{
                      Swal.fire(
                          'Lo sentimos',
                          data,
                          'error'
                        ).then(function(){
                          window.location.href = base_url+"adminUsuarios";
                        })
                  }
              }
          });
      } else if (result.isDenied) {
          Swal.fire('No se ha borrado', '', 'info');
          setTimeout(function () {
            window.location.href = base_url+"adminUsuarios";
          }, 1000);
      }
    });
}

if(message == "borrarDocumentoComun"){
  Swal.fire({
      title: 'Desea borrar?',
      showDenyButton: true,
      confirmButtonText: `Si`,
      denyButtonText: `No`,
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "POST",
              url: base_url + 'deleteDocumentoComun',
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
                          window.location.href = base_url+"userDocumentos";
                        })
                  }else{
                      Swal.fire(
                          'Lo sentimos',
                          data,
                          'error'
                        ).then(function(){
                          window.location.href = base_url+"deleteDocumentoComun";
                        })
                  }
              }
          });
      } else if (result.isDenied) {
          Swal.fire('No se ha borrado', '', 'info');
          setTimeout(function () {
            window.location.href = base_url+"userDocumentos";
          }, 1000);
      }
    });
}
