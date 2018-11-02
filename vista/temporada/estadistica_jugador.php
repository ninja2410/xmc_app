<?php
require_once('../../Negocio/ClassDatoPartido.php');
require_once('../../Negocio/ClassJugador.php');
require_once('../../Negocio/ClassEstadisticaJugador.php');
$datoPartido=new DatoPartido();
$dato=$datoPartido->select(-1);
$jugadorC=new Jugador();
$jugadoresL=$jugadorC->selectTemporada();
$estadistica=new EstadisticaJugador();
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Estadísticas por jugador - Listar</title>
     <?php include '../layoults/headers2.php'; ?>
   </head>
   <body class="profile-page sidebar-collapse">
     <?php
     include '../layoults/barnavLogged.php';
     ?>
     <div class="main main-raised">
     <div class="content">
       <div class="container-fluid">

           <div class="col-md-12">
             <div class="card">
               <div class="card-header card-header-danger row">
                 <div class="col-lg-10" style="float:left;">
                   <h3 class="card-title ">Estadísticas</h3>
                   <p class="card-category"> Información de estadísticas por jugador</p>
                 </div>
                 <div class="col-md-1 text-right">
                <a href="../../vista/estadisticaJugador/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar estadísticas">
                    <i class="material-icons">add</i>
                  </a>
                </div>
               </div>
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table" id="table1">
                     <thead>
                       <th>
                         ID
                       </th>
                       <th>
                         Nombre
                       </th>
                       <th>
                         Categoría
                       </th>
                       <?php
                       foreach ($dato as $key => $value) {
                         ?>
                         <th style="text-align:center;"> <?php echo $value['nombre']; ?> </th>
                         <?php
                       }
                        ?>
                     </thead>
                     <tbody>
                       <?php
                       foreach ($jugadoresL as $key => $val) {
                         ?>
                         <tr>
                           <td><?php echo $val['id_jugador']; ?></td>
                           <td><?php echo $val['nombre']; ?></td>
                           <td><?php echo $val['CAT']; ?></td>
                           <?php
                           foreach ($dato as $key => $dt) {
                             $row=$estadistica->buscarDatoTemporada($dt['id_dato_partido'], $_GET['temporada'], $val['id_jugador']);
                             $result=$row['D'];
                             ?>
                             <td style="text-align:center;">
                               <?php
                             if ($result=='') {
                               echo "0";
                             }
                             else{
                               echo $result;
                             }
                             ?></td>
                             <?php
                           }
                            ?>
                         </tr>
                         <?php
                       }
                        ?>
                     </tbody>
                   </table>
                   <a href="javascript:history.back(-1);"> <button type="button" class="btn btn-danger pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>
                 </div>
               </div>
             </div>
           </div>
       </div>
     </div>
     </div>
     <?php include '../layoults/footer.php'; ?>
     <?php include '../layoults/scripts2.php'; ?>
     <script type="text/javascript">
     $(document).ready(function(){
       if ($('#mensaje').val()!="") {
         alertify.success($('#mensaje').val());
       }
    $('#table1').DataTable({
        dom: 'Bfrtip',
 "language": {
   "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
  },
        buttons: [
          {
            extend:'copy',
            title:'Listado de socios',
          },
          {
            extend:'csv',
            title:'Listado de socios',

          },
          {
            extend:'excel',
            title:'Listado de socios',

          },
          {
            extend:'pdf',
            title:'Listado de socios',

          },
          {
            extend:'print',
            title:'Listado de socios',

          }
        ],
    }) ;
 });
     </script>
   </body>
 </html>
