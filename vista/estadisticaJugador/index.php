<?php
require_once('../../Negocio/ClassDatoPartido.php');
require_once('../../Negocio/ClassJugador.php');
require_once('../../Negocio/ClassPartido.php');
require_once('../../Negocio/ClassEstadisticaJugador.php');
$datoPartido=new DatoPartido();
$part=new Partido();
$partido=$part->select($_GET['partido']);
$npartido= json_encode($partido);
$dato=$datoPartido->select(-1);
$jugadorC=new Jugador();
$jugadoresL=$jugadorC->selectPartido($_GET['partido']);
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
     <input type="hidden" name="mensaje" id="mensaje" value="">
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
                   <h3 class="card-title ">Alineacion y estadísticas</h3>
                   <p class="card-category"> Información de estadísticas por jugador</p>
                 </div>
                 <div class="col-md-1 text-right">
                <a href="../../vista/alineacion/insert_alineacion.php?id=<?php echo $_GET['partido']; ?>" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg" role="button" aria-disabled="true" rel="tooltip" title="Agregar jugador">
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
                           <?php
                           foreach ($dato as $key => $dt) {
                             $row=$estadistica->buscarDato($dt['id_dato_partido'], $_GET['partido'], $val['id_jugador']);
                             $result=$row['valor'];
                             ?>
                             <td style="text-align:center;"  <?php
                             ?>
                             <?php if ($result!=''): ?>
                               rel="tooltip" title="Min:<?php echo $row['minuto']; ?>"
                             <?php endif; ?>
                             <?php
                              ?>><?php
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
                   <a href="edit.php?partido=<?php echo $_GET['partido']; ?>"> <button type="button" class="btn btn-info pull-right btn-round"><i class="material-icons">edit</i> Editar</button></a>
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
            title:'Estadisticas por jugador',
          },
          {
            extend:'csv',
            title:'Estadisticas por jugador',

          },
          {
            extend:'excel',
            title:'Estadisticas por jugador',

          },
          {
            extend:'pdf',
            title:'Estadisticas por jugador',

          },
          {
            extend:'print',
            title:'Estadisticas por jugador',

          }
        ],
    }) ;
 });
     </script>
   </body>
 </html>
