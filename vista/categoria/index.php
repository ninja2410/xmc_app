<?php
require_once('..\..\Negocio/ClassCategoria.php');
$categoria=new Categoria();
$data=$categoria->select(-1);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categoría - Listar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>

   <div class="main main-raised">
    <div class="content">
      <div class="container-fluid">
       
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <div class="col-lg-10" style="float:left;">
                  <h2 class="card-title ">Categoría</h4>
                  <p class="card-category"> Listado de categorías</p>
                </div>
                <div class="col-lg-1" style="float:left">
                  <a href="..\..\vista\categoria/insert.php" title="Agregar nueva Categoría" >
                    <div class="card-header card-header-success card-header-icon" style="float:right">
                      <div class="card-icon" >
                        <i class="material-icons" >add</i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-muted">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Descripción
                      </th>
                    </thead>
                    <tbody>
                      <?php
                      while ($row=mysqli_fetch_array($data)) {
                       ?>
                      <tr>
                        <td>
                          <?php echo $row['id_categoria']; ?>
                        </td>
                        <td>
                          <?php echo $row['nombre']; ?>
                        </td>
                        <td>
                          <?php echo $row['descripcion']; ?>
                        </td>
                        <td class="td-actions text-left">
                            <div style="float:left">
                              <a href="..\..\vista\categoria/update.php?id=<?php echo $row['id_categoria']; ?>">
                                <button type="button" rel="tooltip" title="Editar Categoria" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                </button>
                              </a>
                            </div>
                            <div  style="float:left">
                              <form class="" action="..\..\vista\categoria/store.php" method="post">
                                <input type="hidden" name="operation" value="3">
                                <input type="hidden" name="id" value="<?php echo $row['id_categoria']; ?>">
                                <button type="submit" rel="tooltip" title="Eliminar Categoria" class="btn btn-danger btn-link btn-sm">
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
</body>
</html>
