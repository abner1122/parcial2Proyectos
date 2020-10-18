$(document).ready(function() {
var user_id, opcion;
opcion = 4;


tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url": "bd/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "id_usuario"},
        {"data": "nombres"},
        {"data": "apellidos"},
        {"data": "dpi"},
        {"data": "telefono"},
        {"data": "correo"},
        {"data": "direccion"},
        {"data": "cargo"},
        {"data": "usuario"},
        {"data": "password"},
        {"data": "password2"},
        {"data": "fecha_ingreso"},
        {"data": "estado"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    
    nombres = $.trim($('#nombres').val()); 
    apellidos = $.trim($('#apellidos').val());
    dpi = $.trim($('#dpi').val());    
    telefono = $.trim($('#telefono').val());    
    correo = $.trim($('#correo').val());    
    direccion = $.trim($('#direccion').val());    
    cargo = $.trim($('#cargo').val());    
    usuario = $.trim($('#user').val());    
    password = $.trim($('#password').val());    
    password2 = $.trim($('#password2').val());
    fecha_ingreso = $.trim($('#fecha_ingreso').val());    
    estado = $.trim($('#estado').val());
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, nombres:nombres, apellidos:apellidos, dpi:dpi, telefono:telefono, correo:correo, direccion:direccion, cargo:cargo, usuario:usuario, password:password, password2:password2, fecha_ingreso:fecha_ingreso, estado:estado, opcion: opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    user_id=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	

    user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el id
    nombres = fila.find('td:eq(1)').text();
    apellidos = fila.find('td:eq(2)').text();
    dpi = fila.find('td:eq(3)').text();
    telefono = fila.find('td:eq(4)').text();
    correo = fila.find('td:eq(5)').text();
    direccion = fila.find('td:eq(6)').text();
    cargo = fila.find('td:eq(7)').text();
    usuario = fila.find('td:eq(8)').text();
    password = fila.find('td:eq(9)').text();
    password2 = fila.find('td:eq(10)').text();
    fecha_ingreso = fila.find('td:eq(11)').text();
    estado = fila.find('td:eq(12)').text();
    $("#nombres").val(nombres);
    $("#apellidos").val(apellidos);
    $("#dpi").val(dpi);
    $("#telefono").val(telefono);
    $("#correo").val(correo);
    $("#direccion").val(direccion);
    $("#cargo").val(cargo);
    $("#user").val(usuario);
    $("#password").val(password);
    $("#password2").val(password2);
    $("#estado").val(estado);

    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "bd/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, user_id:user_id},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    