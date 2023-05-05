let tblUsuarios;

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
                    window.location = base_url + "Usuarios";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML = res;
                }
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

function btnEditarUser(id){
    document.getElementById("title").innerHTML = "Modificar Usuario";
    
    document.getElementById("btnAccion").innerHTML = "Modificar";
   
        const url = base_url + "Usuarios/editar/"+id;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              
              usuario = document.getElementById("id").value = res.id;
              usuario = document.getElementById("usuario").value = res.nom_usuario;
              nombre = document.getElementById("nombre").value = res.nombres;
              apellido = document.getElementById("apellido").value = res.apellido;
              correo= document.getElementById("correo").value = res.correo;
             rol = document.getElementById("rol").value = res.Rol;
              estado = document.getElementById("estado").value = res.Estado;
              estado = document.getElementById("claves").classList.add("d-none");
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
    