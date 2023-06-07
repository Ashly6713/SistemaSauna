let  tblCuartos, tblCategorias, tblClientes, tblUsuarios ;

document.addEventListener("DOMContentLoaded", function(){
  if (document.getElementById('tblUsuarios')){  
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
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin de Usuarios
   if (document.getElementById('tblCategorias')){ 
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
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin cuartos
   if (document.getElementById('tblCuartos')){ 
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
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin categoria cuartos
   if (document.getElementById('tblClientes')){ 
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
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
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
            console.log(this.responseText);
              const res= JSON.parse(this.responseText);
              
              if(res == "ok") {
                  window.location = base_url + "Home";
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
    const rol = document.getElementById("rol");
    const estado = document.getElementById("estado");
    if (usuario.value == "" || nombre.value == ""|| apellido.value == "" || correo.value == ""  || rol.value == "" || estado.value == "") {
        alertas('Todos los campos son obligatorios', 'warning');
    } else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuarios");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res= JSON.parse(this.responseText);
                tblUsuarios.ajax.reload();
                if(res == "usuario"){
                  document.getElementById("alertaU").classList.remove("d-none");
                } else if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else if(res == "correo"){
                  document.getElementById("alertaC").classList.remove("d-none");
                }else{alertas(res.msg, res.icono);
                  $("#nuevo_usuario").modal("hide");}
                
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
                 alertas(res.msg, res.icono);
                 tblUsuarios.ajax.reload();
            }
          }
         
        }
      })

}
function btnDeshabilitarUser(id){
        Swal.fire({
            title: 'Esta seguro de Desactivar?',
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
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
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
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
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
//Tabla Detalle
if (document.getElementById('tblDetalle')){
  cargarDetalle();
}
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
function saltar(e,id)
{
	(e.keyCode)?k=e.keyCode:k=e.which;
	if(k==13)
	{
		// Si la variable id contiene "submit" enviamos el formulario
		if(id=="submit")
		{
			document.forms[0].submit();
		}else{
			// nos posicionamos en el siguiente input
      document.getElementById(id).removeAttribute('disabled');
			document.getElementById(id).focus();
		}
	}
}

function buscarCi(e){
  e.preventDefault();
  const num = document.getElementById("ci").value;
   if(num != '' ){
    if(e.which == 13){
      const ci = document.getElementById("ci").value;
      const url = base_url + "Reservas/buscarCi/"+ci;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if(res){
            const cant = document.getElementById("cantidad").value;
            if(cant == ''){
            document.getElementById("categoria").removeAttribute('disabled');
            document.getElementById("categoria").focus();
            } else {
            document.getElementById("numero").removeAttribute('disabled');
            document.getElementById("numero").focus();
            }
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("id_cli").value = res.id;
            document.getElementById("telefono").value = res.telefono;
          } else {
            alertas('El cliente no existe', 'warning');
            document.getElementById("ci").value = '';
            document.getElementById("ci").focus();
            document.getElementById("nombre").value = '';
            document.getElementById("apellido").value = '';
            document.getElementById("id_cli").value = '';
            document.getElementById("telefono").value = '';
          }
        }
      }
    }
  } else{
    alertas('Ingrese el C.I.', 'warning');
  }
}
function buscarNumero(e){
  e.preventDefault();
  const num = document.getElementById("numero").value;
   if(num != '' ){
      const num = document.getElementById("numero").value;
      const url = base_url + "Reservas/buscarNumero/"+num;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          console.log(num);
          const res = JSON.parse(this.responseText);
          if(res){
            document.getElementById("precio_hora").value = res.precio_hora;
            document.getElementById("id").value = res.id;
            ingresar();
            var options = document.querySelectorAll('#numero option');
            options.forEach(o => o.remove());
          } else {
            alertas('El cuarto no existe', 'warning');
            document.getElementById("numero").value = '';
            document.getElementById("numero").focus();
          }
        }
      }
  } else{
    alertas('Ingrese el número', 'warning');
  }
}
function calcularHoras(e){
  e.preventDefault();
  const hrIn = document.getElementById("hora_inicio").value;
  const ci = document.getElementById("ci").value;
  const cant = document.getElementById("cantidad").value;
  document.getElementById("hora_fin").value =  hrIn;
  document.getElementById("hora_fin").stepUp(cant); 
  if(e.which == 13){
    if(cant > 0){
      const url = base_url + "Reservas/disponibles";
      const frm = document.getElementById("frmReserva");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          var options = document.querySelectorAll('#numero option');
          options.forEach(o => o.remove());
          if(res){
            var selectElement = document.getElementById('numero');
              option = document.createElement( 'option' );
              option.value = '';
              option.text = 'Seleccione';
              selectElement.add( option );
            res.forEach(row => {
              option = document.createElement( 'option' );
              option.value = row['id'];
              option.text = row['numero'];
              selectElement.add( option );
          });
              document.getElementById("precio_hora").value = res[0]['precio_hora'];
              const precio_hora = document.getElementById("precio_hora").value;
              var preTot =  (cant/60)*precio_hora;
              var rPreTot = preTot.toFixed(2);
              var decimal = rPreTot - Math.trunc(rPreTot);
              if(decimal == 0.0 || decimal == 0.50 ){
                document.getElementById("precio_total").value =  rPreTot;
              }else{
                if(decimal > 0.50 ){
                  document.getElementById("precio_total").value = Math.trunc(rPreTot)+1;
                } else{
                  document.getElementById("precio_total").value = Math.trunc(rPreTot);
                }
              }
              if(decimal == 0.0 || decimal == 0.50 ){
                document.getElementById("precio_total").value =  rPreTot;
              }else{
                if(decimal > 0.50 ){
                  document.getElementById("precio_total").value = Math.trunc(rPreTot)+1;
                } else{
                  document.getElementById("precio_total").value = Math.trunc(rPreTot);
                }
              }
              
          }else {
            alertas('No existen cuartos diponibles', 'warning');
            document.getElementById("hora_inicio").focus();
            document.getElementById("numero").value = '';
          }
          
        }
      }
    document.getElementById("numero").removeAttribute('disabled');
    document.getElementById("numero").focus();
    if(ci =='' ){
      alertas('Ingrese un cliente', 'warning');
      document.getElementById("ci").focus();
    }
  
     }
  }
}
function ingresar(){
  const ci = document.getElementById("ci").value;
  const cant = document.getElementById("cantidad").value;
    if(cant > 0){
      const url = base_url + "Reservas/ingresar";
      const frm = document.getElementById("frmReserva");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            document.getElementById("numero").value = '';
            document.getElementById("categoria").value = '';
            document.getElementById("precio_hora").value = '';
            document.getElementById("id").value = '';
            document.getElementById("hora_inicio").value = '';
            document.getElementById("hora_fin").value = '';
            document.getElementById("cantidad").value = '';
            document.getElementById("precio_total").value = '';
            cargarDetalle();
            document.getElementById('numero').setAttribute('disabled', 'disabled');
            document.getElementById('hora_inicio').setAttribute('disabled', 'disabled');
          document.getElementById('cantidad').setAttribute('disabled', 'disabled');
          document.getElementById('categoria').focus();
          
        }
      }
     }
}
//cargarDetalle();
function cargarDetalle(){
  const url = base_url + "Reservas/listar";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          const res = JSON.parse(this.responseText);
          let html = '';
          res.detalle.forEach(row => {
            html += `<tr>
            <td>${row['cuarto_id']}</td> 
            <td>${row['numero']}</td>
            <td>${row['nombre']}</td>
            <td>${row['precio_hora']}</td>
            <td>${row['hora_inicio']}</td>
            <td>${row['hora_fin']}</td>
            <td>${row['cantidad']}</td>
            <td>${row['sub_total']}</td>
            <td>
            <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['cuarto_id']})">
            <i class="fas fa-trash-alt"></i></button>
            </td>
           </tr>`;
          });
          document.getElementById("tblDetalle").innerHTML = html;
          document.getElementById("total").value = res.total_pagar.total;
         }
      }
}
function deleteDetalle(id){
  const url = base_url + "Reservas/delete/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            cargarDetalle();
        }
      }
}
function generarReserva(){
  Swal.fire({
    title: 'Esta seguro de realizar Reserva?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si!',
    cancelButtonText: 'No!'
  }).then((result) => {
    const id_cliente = document.getElementById("id_cli").value ;
    if (result.isConfirmed) {
        const url = base_url + "Reservas/registrarReserva/"+id_cliente;
        const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
            console.log(this.responseText);
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if(res.icono == "success"){
                    Swal.fire(
                      'Mensaje!',
                      'Reserva generada.',
                      'success'
                    )
                    const ruta = base_url + "Reservas/generarPdf/"+ res.id_reserva;
                    window.open(ruta);
                    setTimeout(() =>{
                      window.location.reload();
                    }, 300);
                  } else {
                    Swal.fire(
                      'Mensaje!',
                      res.msg,
                      'error'
                    )
                  }
        }

      }
     
    }
  })

}

function cargarCu(){
  const categoria = document.getElementById("categoria").value;
  const horaIn = document.getElementById("hora_inicio").value;
  if(categoria != ""){
  document.getElementById("hora_inicio").removeAttribute('disabled');
  document.getElementById("hora_inicio").focus();
  }else{
    alertas("Seleccione una categoria", "error");
  }
  const hora_inicio = document.getElementById("hora_inicio").value;
  const hora_fin = document.getElementById("hora_fin").value;
  if(categoria != "" && hora_inicio != "" && hora_fin != ""){
    document.getElementById("cantidad").focus();
  }
}

//fin Reservas

function alertas(mensaje, icono){
  Swal.fire({
    position: 'top-end',
    icon: icono,
    title: mensaje,
    showConfirmButton: false,
    timer: 3000
  })
}

//fin alertas

actualizar();
actualizarNo();
//actualizar No disponibles
function actualizarNo(){
  const url = base_url + "Reservas/actualizarNo";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          console.log(this.responseText);
          //const res = JSON.parse(this.responseText);
         }
      }
}
//actualizar
function actualizar(){
  const url = base_url + "Reservas/actualizar";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          console.log(this.responseText);
          //const res = JSON.parse(this.responseText);
         }
      }
}
//estados
function togglePopup() {
  var popup = document.getElementById("popup");
  if (popup.style.display === "none") {
    popup.style.display = "block";
  } else {
    popup.style.display = "none";
  }
}
//Hora fin
function HoraFin(e, cuarto_id){
  
  e.preventDefault();
  const url = base_url + "Administracion/obtenerHoraFin/"+cuarto_id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          const res = JSON.parse(this.responseText);
         document.getElementById("hora_fin"+cuarto_id).value = res.hora_fin;
         }
      }
}
