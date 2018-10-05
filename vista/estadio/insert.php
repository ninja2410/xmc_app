<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Estadio - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="main main-raised">
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">INSERTAR ESTADIO</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post", action="..\estadio\store.php" id="frm_estadio">
              <input type="hidden" name="operation" value="1">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Ciudad</label>
                    <select class="form-control" name="ciudad">
                      <option value="Quetzaltenango">Quetzaltenango</option>
                      <option value="Alta Verapaz">Alta Verapaz</option>
                      <option value="Baja Verapaz">Baja Verapaz</option>
                      <option value="Chimaltenango">Chimaltenango</option>
                      <option value="Chiquimula">Chiquimula</option>
                      <option value="Petén">Petén</option>
                      <option value="El Progreso">El Progreso</option>
                      <option value="Quiché">Quiché</option>
                      <option value="Escuintla">Escuintla</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Huehuetenango">Huehuetenango</option>
                      <option value="Izabal">Izabal</option>
                      <option value="Jalapa">Jalapa</option>
                      <option value="Jutiapa">Jutiapa</option>
                      <option value="Retalhuleu">Retalhuleu</option>
                      <option value="Sacatepéquez">Sacatepéquez</option>
                      <option value="San Marcos">San Marcos</option>
                      <option value="Santa Rosa">Santa Rosa</option>
                      <option value="Sololá">Sololá</option>
                      <option value="Suchitepéquez">Suchitepéquez</option>
                      <option value="Totonicapán">Totonicapán</option>
                      <option value="Zacapa">Zacapa</option>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad">
                  </div>
                </div> -->
              </div>

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Direccion</label>
                    <input type="text" class="form-control" name="direccion">
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono">
                  </div>
                </div>
              </div>
              <?php include '..\layoults\botones.php'; ?>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#frm_estadio').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      message: 'Valor no valido',
      fields: {
          nombre:{
              validators:{
                  notEmpty:{
                      message:'Ingrese el nombre del estadio por ejemplo : Doroteo Guamuch Flores, Mario Camposeco'
                  },
                  regexp:{
                    regexp: /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/,
                      message: 'Solo se aceptan letras y números'
                    }
                }
            },
             
            direccion:{
                validators:{
                    notEmpty:{
                        message:'Ingrese la dirección del estadio'
                    },
                    regexp:{
                      regexp: /^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ_\s]*$/, 
                        message: 'Solo se aceptan letras, números, espacios, guión y guión bajo'
                      }
                  }
              },
              telefono:{
                validators:{
                    notEmpty:{
                        message:'Ingrese un número de teléfono'
                    },
                    regexp:{
                      regexp: /^[0-9]*$/, 
                        message: 'Solo se aceptan números'
                      }
                  }
              },
        }
      })
    });
    </script>
    
  </body>
</html>
