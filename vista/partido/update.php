<?php
require_once('../../Negocio/ClassPartido.php');
$partido=new Partido();
$data=$partido->select($_GET['id']);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Partido - Actualizar</title>
     <?php include '../layoults/headers2.php'; ?>
   </head>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
   <body class="profile-page sidebar-collapse">
  <?php include '../layoults/barnavLogged.php'; ?>
    <div class="main main-raised">
   <script type="text/javascript">
   $(function() 
   {
     $( "#autoequipo" ).autocomplete(
     {
       source: 'searchEquipo.php',
       minLength: 0,
       autoFocus: true,
       select: function(event, ui) 
       { 
         $("#equipo").val(ui.item.id);
       },
     }).focus(function () {
         $(this).autocomplete('search', $(this).val())
       });
     
       $( "#autoCategoria" ).autocomplete(
     {
       source: 'searchCategoria.php',
       minLength: 0,
       select: function(event, ui) 
       { 
         $("#cat").val(ui.item.id);
       },
     }).focus(function () {
         $(this).autocomplete('search', $(this).val())
       });
 
     $( "#autoestadio" ).autocomplete({
       source: 'searchEstadio.php',
       minLength: 0,
       select: function(event, ui) { 
         $("#estadio").val(ui.item.id);
     },
     }).focus(function () {
         $(this).autocomplete('search', $(this).val())
       });
 
     $( "#autotemp" ).autocomplete({
       source: 'searchTemporada.php',
       minLength: 0,
       select: function(event, ui) { 
         $("#temp").val(ui.item.id);
     },
     }).focus(function () {
         $(this).autocomplete('search', $(this).val())
       });
   });
   </script>
     <div class="content">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header card-header-primary">
             <h3 class="card-title">Actualizar partido</h3>
             <p class="card-category">Complete los campos siguientes</p>
           </div>
           <div class="card-body">
             <form method="post", action="../partido/store.php" id="frm_partido">
               <input type="hidden" name="operation" value="2">
               <input type="hidden" name="id" value="<?php echo $data['id_partido']; ?>">
               <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="">Fecha</label>
                     <input type="text" placeholder="YYYY/MM/DD" class="form-control" name="fecha2" value="<?php echo $data['fecha']; ?>">
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="">Categoría</label>
                     <input type="hidden" name="cat" id="cat" value="<?php echo $data['id_categoria']; ?>" >
                     <input type="text" id="autoCategoria" name="autoCategoria"  class="form-control" value="<?php echo $data['categoria']; ?>">
                   </div>
                 </div>

                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="">Estadio</label>
                     <input type="hidden" name="estadio" id="estadio" value="<?php echo $data['id_estadio']; ?>" >
                     <input type="text" id="autoestadio" class="form-control" value="<?php echo $data['estadio']; ?>">
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="">Equipo</label>
                     <input type="hidden" id="equi" name="equi" value="<?php echo $data['id_equipo']; ?>">
                     <input type="text" id="autoequipo" class="form-control" value="<?php echo $data['equipo']; ?>">
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                     <label class="">Temporada</label>
                     <input type="hidden" id="temp" name="temp" value="<?php echo $data['id_temporada']; ?>">
                     <input type="text" id="autotemp" class="form-control" value="<?php echo $data['temporada']; ?>" >
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                   <div class="form-group">
                     <label class="">Observaciones</label>
                     <input type="text" class="form-control" name="obs" value="<?php echo $data['observaciones']; ?>">
                   </div>
                 </div>
               </div>
               <?php include '../layoults/botones.php'; ?>
               <div class="clearfix"></div>
             </form>
           </div>
         </div>
       </div>
     </div>
     </div>
     <?php include '../layoults/footer.php'; ?>
     <?php include '../layoults/scripts2.php'; ?>
     <script type="text/javascript">
       var f = new Date();
 $(document).ready(function() {
     $('#frm_partido').bootstrapValidator({
         feedbackIcons: {
             valid: 'glyphicon glyphicon-ok',
             invalid: 'glyphicon glyphicon-remove',
             validating: 'glyphicon glyphicon-refresh'
         },
         fields: {
           fecha: 
           {
                 validators: 
                 {
                     notEmpty: 
                     {
                       message: 'La fecha del partido es necesario'
                     }
                  }
                 }
           },
           h1: 
           {
                 validators: 
                 {
                     notEmpty: 
                     {
                       message: 'Debe ingresar una hora valida'
                     }
             
                 }
           },
           autoestadio: 
           {
                 validators: 
                 {
                     notEmpty: 
                     {
                       message: 'Debe seleccionar un estadio'
                     }
             
                 }
           },
           autoCategoria: 
           {
                 validators: 
                 {
                     notEmpty: 
                     {
                       message: 'debe selecionar una categoria'
                     }
             
                 }
           },
         }
     });
 });
 
 
     </script>
   </body>
 </html>
 