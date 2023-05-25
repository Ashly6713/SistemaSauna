let tblUsuarios, tblCuartos, tblCategorias, tblClientes;

document.addEventListener("DOMContentLoaded", function(){
    tblUsuarios = $('#tblUsuarios').DataTable( {
    ajax: {
        url: base_url + "Usuarios/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'nom_usuario'
      },
    {
        'data' : 'nombres'
    },
    {
        'data' : 'apellido'
    },
    {
        'data' : 'correo'
    },
    {
        'data' : 'Rol'
    },
    {
        'data' : 'Estado'
    },
    {
        'data' : 'acciones'
    }
    ]
   });
   //fin de Usuarios
   tblCategorias = $('#tblCategorias').DataTable( {
    ajax: {
        url: base_url + "Categorias/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      
      {
        'data' : 'nombre'
      },
    {
        'data' : 'capacidad'
    },
    {
        'data' : 'precio_hora'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'acciones'
    }
    ]
   });
   //fin cuartos
   tblCuartos = $('#tblCuartos').DataTable( {
    ajax: {
        url: base_url + "Cuartos/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'numero'
      },
    {
        'data' : 'disponibilidad'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'nombre'
    },
    {
        'data' : 'acciones'
    }
    ]
   });
   //fin categoria cuartos
   tblClientes = $('#tblClientes').DataTable( {
    ajax: {
        url: base_url + "Clientes/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'ci'
      },
      {
        'data' : 'nombre'
      },
    {
        'data' : 'apellido'
    },
    {
        'data' : 'telefono'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'acciones'
    }
    ]
   });
})
function frmLogin(e) {
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if (usuario.value == "") {
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    } else if(clave.value == ""){
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    } else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res= JSON.parse(this.responseText);
                if(res == "ok") {
                    window.location = base_url + "Administracion/home";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
            }
        }
    }

}
function frmCambiarPass(e){
  e.preventDefault();
  const actual = document.getElementById('clave_actual').value;
  const nueva = document.getElementById('clave_nueva').value;
  const confirmar = document.getElementById('confirmar_clave').value;
  if(actual == '' || nueva == '' || confirmar == ''){
    Swal.fire({
      position: 'top-end',
      icon: 'warning',
      title: 'Todos los campos son obligatorios',
      showConfirmButton: false,
      timer: 3000
    })
  } else {
    const url = base_url + "Usuarios/cambiarPass";
    const frm = document.getElementById("frmCambiarPass");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res= JSON.parse(this.responseText);
              $("#cambiarPass").modal("hide");
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: res,
                showConfirmButton: false,
                timer: 3000
              })
         }
  }
 }
}

function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuarios").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}
function registrarUser(e) {
    e.preventDefault();
    document.getElementById("alertaU").classList.add("d-none");
  document.getElementById("alertaC").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const correo= document.getElementById("correo");
    const clave = document.getElementById("clave");
    const confirmar= document.getElementById("confirmar");
    const rol = document.getElementById("rol");
    const estado = document.getElementById("estado");
    if (usuario.value == "" || nombre.value == ""|| apellido.value == "" || correo.value == ""  || rol.value == "" || estado.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    } else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuarios");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res= JSON.parse(this.responseText);
               if(res == "si"){
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario registrado con éxito',
                    showConfirmButton: false,
                    timer: 3000
                  })
                  frm.reset();
                  $("#nuevo_usuario").modal("hide");
                  tblUsuarios.ajax.reload();
                }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_usuario").modal("hide");
                      tblUsuarios.ajax.reload();
                }else{
                  if(res == "usuario"){
                    document.getElementById("alertaU").classList.remove("d-none");
                  } else if(res == "letras"){
                    document.getElementById("alertaL").classList.remove("d-none");
                  } else if(res == "correo"){
                    document.getElementById("alertaC").classList.remove("d-none");
                  }else {
                    Swal.fire({
                      position: 'top-end',
                      icon: 'error',
                      title: res,
                      showConfirmButton: false,
                      timer: 3000
                    })
                  }
               }
            }
        }
    }

}

function btnEditarUser(id){
  document.getElementById("alertaU").classList.add("d-none");
  document.getElementById("alertaC").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
    document.getElementById("title").innerHTML = "Modificar Usuario";  
    document.getElementById("btnAccion").innerHTML = "Modificar";
   
        const url = base_url + "Usuarios/editar/"+id;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              
              document.getElementById("id").value = res.id;
              document.getElementById("usuario").value = res.nom_usuario;
               document.getElementById("nombre").value = res.nombres;
              document.getElementById("apellido").value = res.apellido;
              document.getElementById("correo").value = res.correo;
              document.getElementById("rol").value = res.Rol;
              document.getElementById("estado").value = res.Estado;
              document.getElementById("claves").classList.add("d-none");
              $("#nuevo_usuario").modal("show");
            }
        }
    

}

function btnEliminarUser(id){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El usuario se eliminará de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
              if (res == "ok"){
                Swal.fire(
                    'Mensaje!',
                    'Usuario eliminado con éxito.',
                    'success'
                  )
                  
                  tblUsuarios.ajax.reload();
              }else{
                Swal.fire(
                    'Mensaje!',
                    res,
                    'error'
                  )
              }
            }
          }
         
        }
      })

}
function btnDeshabilitarUser(id){
        Swal.fire({
            title: 'Esta seguro de eliminar?',
            text: "El usuario no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!'
          }).then((result) => {
            if (result.isConfirmed) {
                const url = base_url + "Usuarios/deshabilitar/"+id;
                const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                  if (res == "ok"){
                    Swal.fire(
                        'Mensaje!',
                        'Usuario eliminado con éxito.',
                        'success'
                      )
                      
                      tblUsuarios.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                      )
                  }
                }
              }
             
            }
          })
    
}
function btnReingresarUser(id){
        Swal.fire({
            title: 'Esta seguro de reingresar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!'
          }).then((result) => {
            if (result.isConfirmed) {
                const url = base_url + "Usuarios/reingresar/"+id;
                const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                  if (res == "ok"){
                    Swal.fire(
                        'Mensaje!',
                        'Usuario reingresado con éxito.',
                        'success'
                      )
                      
                      tblUsuarios.ajax.reload();
                  }else{
                    Swal.fire(
                        'Mensaje!',
                        res,
                        'error'
                      )
                  }
                }
              }
             
            }
          })
    
}
//fin Usuarios
function frmCuarto() {
  document.getElementById("title").innerHTML = "Nuevo Cuarto";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmCuarto").reset();
  $("#nuevo_cuarto").modal("show");
  document.getElementById("id").value = "";
}
function registrarCuarto(e) {
  e.preventDefault();
  document.getElementById("alertaN").classList.add("d-none");
  const numero = document.getElementById("numero");
  const disponibilidad = document.getElementById("disponibilidad");
  const estado = document.getElementById("estado");
  const categoria = document.getElementById("categoria");
  
  if (numero.value == "" || disponibilidad.value == ""|| estado.value == "" || categoria.value == "" ) {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Cuartos/registrar";
      const frm = document.getElementById("frmCuarto");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Cuarto registrado con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                frm.reset();
                $("#nuevo_cuarto").modal("hide");
                tblCuartos.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Cuarto modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    $("#nuevo_caurto").modal("hide");
                   tblCuartos.ajax.reload();
              }else{
                if(res == "numeros"){
                  document.getElementById("alertaN").classList.remove("d-none");
                }else {
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  })
                }
              
             }
          }
      }
  }

}

function btnEditarCuarto(id){
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("title").innerHTML = "Modificar Cuarto";
  document.getElementById("btnAccion").innerHTML = "Modificar";
 
      const url = base_url + "Cuartos/editar/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
             document.getElementById("id").value = res.id;
             document.getElementById("numero").value = res.numero;
            document.getElementById("disponibilidad").value = res.disponibilidad;
            document.getElementById("estado").value = res.estado;
            document.getElementById("categoria").value = res.categoria_id;
            $("#nuevo_cuarto").modal("show");
          }
      }
  

}

function btnEliminarCuarto(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "El cuarto se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Cuartos/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Cuarto eliminado con éxito.',
                  'success'
                )
                
                tblCuartos.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarCuarto(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "El cuarto no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Cuartos/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cuarto eliminado con éxito.',
                      'success'
                    )
                    
                    tblCuartos.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarCuarto(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Cuartos/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cuarto reingresado con éxito.',
                      'success'
                    )
                    
                    tblCuartos.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}

//fin Cuartos
function frmCategoria() {
  document.getElementById("title").innerHTML = "Nueva Categoria";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmCategorias").reset();
  $("#nuevo_categoria").modal("show");
  document.getElementById("id").value = "";
}
function registrarCategoria(e) {
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  const capacidad = document.getElementById("capacidad");
  const precio_hora= document.getElementById("precio_hora");
  const estado = document.getElementById("estado");
  if (nombre.value == ""|| capacidad.value == "" || precio_hora.value == ""  || estado.value == "") {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Categorias/registrar";
      const frm = document.getElementById("frmCategorias");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Categoria registrada con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                frm.reset();
                $("#nuevo_categoria").modal("hide");
                tblCategorias.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Categoria modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    $("#nuevo_categoria").modal("hide");
                    tblCategorias.ajax.reload();
              }else{
                if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else if(res == "numeros"){
                  document.getElementById("alertaN").classList.remove("d-none");
                }else {
                  document.getElementById("alertaN").classList.add("d-none");
                  document.getElementById("alertaL").classList.add("d-none");
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  })
                }
             
             }
          }
      }
  }

}

function btnEditarCategoria(id){
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
  document.getElementById("title").innerHTML = "Modificar Categoria";
  
  document.getElementById("btnAccion").innerHTML = "Modificar";
 
      const url = base_url + "Categorias/editar/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            
            document.getElementById("id").value = res.id;
             document.getElementById("nombre").value = res.nombre;
            document.getElementById("capacidad").value = res.capacidad;
            document.getElementById("precio_hora").value = res.precio_hora;
            document.getElementById("estado").value = res.estado;
            $("#nuevo_categoria").modal("show");
          }
      }
  

}

function btnEliminarCategoria(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "La categoria se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Categorias/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Categoria eliminada con éxito.',
                  'success'
                )
                
                tblCategorias.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarCategoria(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "La categoria no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Categorias/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Categoria eliminada con éxito.',
                      'success'
                    )
                    
                    tblCategorias.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarCategoria(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Categorias/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Categoria reingresada con éxito.',
                      'success'
                    )
                    
                    tblCategorias.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
 
//fin Categorias
function frmCliente() {
  document.getElementById("title").innerHTML = "Nuevo Cliente";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmClientes").reset();
  $("#nuevo_cliente").modal("show");
  document.getElementById("ci").value = "";
}
function registrarCliente(e) {
  e.preventDefault();
  document.getElementById("alertaCi").classList.add("d-none");
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
  const ci = document.getElementById("ci");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const telefono= document.getElementById("telefono");
  const estado = document.getElementById("estado");
  if (ci.value == ""||nombre.value == ""|| apellido.value == "" || telefono.value == ""  || estado.value == "") {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Clientes/registrar";
      const frm = document.getElementById("frmClientes");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Cliente registrado con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                frm.reset();
                $("#nuevo_cliente").modal("hide");
                tblClientes.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Cliente modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
              }else{
                if(res == "ci"){
                  document.getElementById("alertaCi").classList.remove("d-none");
                } else if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else if(res == "numeros"){
                  document.getElementById("alertaN").classList.remove("d-none");
                }else {
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res,
                showConfirmButton: false,
                timer: 3000
              })
                }
             }
          }
      }
  }

}

function btnEditarCliente(id){
  document.getElementById("title").innerHTML = "Modificar Cliente";
  document.getElementById("btnAccion").innerHTML = "Modificar";
 
  document.getElementById("alertaCi").classList.add("d-none");
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
      const url = base_url + "Clientes/editar/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            
            document.getElementById("id").value = res.id;
            document.getElementById("ci").value = res.ci;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("estado").value = res.estado;
            $("#nuevo_cliente").modal("show");
          }
      }
  

}

function btnEliminarCliente(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "El Cliente se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Clientes/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Cliente eliminada con éxito.',
                  'success'
                )
                
                tblClientes.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarCliente(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "El cliente no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Clientes/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cliente eliminado con éxito.',
                      'success'
                    )
                    
                    tblClientes.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarCliente(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Clientes/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cliente reingresada con éxito.',
                      'success'
                    )
                    
                    tblClientes.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
/* para dettale
if (document.getElementById('tblDetalle')){
  cargarDetalle();
}*/


//Informacion de la empresa
function modificarEmpresa(){
  const frm = document.getElementById("frmEmpresa");
  const url = base_url + "Administracion/modificar";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
        if(res == 'ok'){
          alert('Modificado');
        }
      }
  }   

}
//Fin Informacion de la empresa
function buscarNumero(e){
  e.preventDefault();
  if(e.which == 13){
    const num = document.getElementById("numero").value;
    const url = base_url + "Reservas/buscarNumero/"+num;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if(res){
          document.getElementById("categoria").value = res.nombre;
          document.getElementById("precio_hora").value = res.precio_hora;
          document.getElementById("id").value = res.id;
          document.getElementById("hora_inicio").focus();
        } else {
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'El cuarto no existe',
            showConfirmButton: false,
            timer: 2000
          })
          document.getElementById("numero").value = '';
          document.getElementById("numero").focus();
        }
      }
    }
  }
}
function calcularHoras(e){
  e.preventDefault();
  const hrIn = document.getElementById("hora_inicio").value;
  const cant = document.getElementById("cantidad").value;
  document.getElementById("hora_fin").value =  hrIn;
  document.getElementById("hora_fin").stepUp(cant);  ;
 
}