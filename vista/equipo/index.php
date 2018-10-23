<?php
require_once('..\..\Negocio/ClassEquipo.php');
$equipo=new Equipo();
$data=$equipo->select(-1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Equipo - Listar</title>
  <?php include '..\layoults\headers2.php'; ?>
</head>

<body class="profile-page sidebar-collapse">

  <?php
    include '..\layoults\barnav.php';
    ?>
    <input type="hidden" id="mensaje" name="secret" value="<?php if ($_SESSION['mensaje']!="") {
      echo $_SESSION['mensaje'];
      $_SESSION['mensaje']="";
    } ?>">
  <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger row">
              <div class="col-md-11">
                <h3 class="card-title">Equipos</h3>
                <p class="category">Listado de equipos</p>
              </div>
              <div class="col-md-1 text-right">
                <a href="..\..\vista\equipo/insert.php" class="btn btn-success btn-fab btn-fab-mini btn-round btn-lg"
                  role="button" aria-disabled="true" rel="tooltip" title="Agregar equipo">
                  <i class="material-icons">add</i>
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table1">
                  <thead>
                    <th>
                      ID
                    </th>
                    <th>
                      Nombre
                    </th>
                    <th>
                      Procedencia
                    </th>
                    <th>
                      Escudo
                    </th>
                  </thead>
                  <tbody>
                    <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                    <tr>
                      <td>
                        <?php echo $row['id_equipo']; ?>
                      </td>
                      <td>
                        <?php echo $row['nombre']; ?>
                      </td>
                      <td>
                        <?php echo $row['procedencia']; ?>
                      </td>
                      <td>
                        <?php
                         echo '<img style="height:30px;width:30px"  src="../imagenes/'.$row['foto'].'"  alt="Circle Image" class="img-raised rounded-circle img-fluid">';
                        ?>
                      </td>
                      <td class="td-actions text-lefht">
                        <div style="float:left">
                          <a href="..\..\vista\equipo/update.php?id=<?php echo $row['id_equipo']; ?>">
                            <button type="button" rel="tooltip" title="Editar equipo" class="btn btn-primary btn-link btn-sm">
                              <i class="material-icons">edit</i>
                            </button>
                          </a>
                        </div>
                        <div style="float:left">
                          <form class="" action="..\..\vista\equipo/store.php" method="post">
                            <input type="hidden" name="operation" value="3">
                            <input type="hidden" name="id" value="<?php echo $row['id_equipo']; ?>">
                            <button type="submit" rel="tooltip" title="Eliminar equipo" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </button>
                          </form>
                        </div>
                      </td>
                      <?php
                      } ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include '..\layoults\footer.php'; ?>
  <?php include '..\layoults\scripts2.php'; ?>
  <script type="text/javascript">
    $(document).ready(function () {
      if ($('#mensaje').val()!="") {
        alertify.success($('#mensaje').val());
      }
      $('#table1').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'copy',
            title: 'Listado de equipos',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
          },
          {
            extend: 'csv',
            title: 'Listado de equipos',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
          },
          {
            extend: 'excel',
            title: 'Listado de equipos',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
          },
          {
            extend: 'pdf',
            title: 'Listado de equipos',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
          },
          {
            extend: 'print',
            title: 'Listado de equipos',
            exportOptions: {
              columns: [0, 1, 2, 3]
            }
          }
        ],
      });
    });
  </script>
</body>

</html>
