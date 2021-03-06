<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Parcial II - Proyectos</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
  </head>
    
  <body> 
    <div class="alert alert-secondary text-center">
        <h2>Proyectos de programación - abner del cid</h2>
        <p>Carné: 201409954</p>
    </div>
     <header>
     <h3 class='text-center'></h3>
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
            </div>    
        </div>    
    </div>    
    <br>  

    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>Usuario id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dpi</th>                                
                            <th>Teléfono</th>  
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Cargo</th>
                            <th>Usuario</th>
                            <th>Password</th>
                            <th>Password2</th>
                            <th>Fecha ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Nombres:</label>
                            <input type="text" class="form-control" id="nombres">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos">
                        </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Dpi</label>
                            <input type="text" class="form-control" id="dpi">
                        </div>               
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>               
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Correo</label>
                            <input type="email" class="form-control" id="correo">
                        </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="" class="col-form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion">
                        </div>               
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="" class="col-form-label">Cargo</label>
                            <input type="number" class="form-control" id="cargo">
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Usuario</label>
                            <input type="text" class="form-control" id="user">
                        </div>
                    </div>    
                    <div class="col-lg-4">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                        </div>            
                    </div>  
                    <div class="col-lg-4">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Password 2</label>
                        <input type="password" class="form-control" id="password2">
                        </div>            
                    </div>    
                </div>  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Fecha ingreso</label>
                            <input type="date" class="form-control" id="fecha_ingreso">
                        </div>
                    </div>    
                    <div class="col-lg-6">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Estado</label>
                        <input type="number" class="form-control" id="estado">
                        </div>            
                    </div>  
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
