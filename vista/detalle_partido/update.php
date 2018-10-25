<?php
 require_once('..\..\Negocio/ClassDetallePartido.php');
 $detalle_partido=new Detalle();
 $data=$detalle_partido->selectXela($_GET['id']);
 $dataCn=$detalle_partido->selectContrario($_GET['id'],$_GET['id2']);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ingresar resultados</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php
    include '..\layoults\barnav.php';
    ?>
    <div class="main main-raised">
    <form method="post", action="..\detalle_partido\store.php" id="frm_detalle_partido">
    <input type="hidden" name="operation" value="2">
    <input type="hidden" name="id" value="<?php echo $data['id_detalle_partido']; ?>">
    <input type="hidden" name="id2" value="<?php echo $dataCn['id_detalle_partido']; ?>">
    <input type="hidden" name="equi" value="<?php echo $dataCn['id_equipo']; ?>">
    <input type="hidden" name="partido" value="<?php echo $data['id_partido']; ?>">
    <div class="container">
    <div class="table-responsive">
            <table class="table table-sm text-center" cellspacing="0" width="100%" >
                <thead class=" text-primary">
                      <th>
                        <h2 class="title">Xelajú MC</h2>
                      </th>
                      <th>
                        <h3 class="title"></h3>
                      </th>
                      <th>
                        <h2 class="title"><?php echo $dataCn['equipo']?></h2>
                      </th>
                </thead>
                <tbody>
                    <tr>
                        <td id="falta">
                        <div class="form-group">
                                <input type="text"  id="infalta" class="form-control text-center" name="fal" value="<?php echo $data['faltas']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Faltas </b> </h4>
                        </td>
                        <td>
                                <div class="form-group">
                                        <input type="text" class="form-control text-center" name="fal2" value="<?php echo $dataCn['faltas']; ?>">
                                </div>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                                <div class="form-group">
                                   <input type="text" class="form-control text-center" name="esq" value="<?php echo $data['esquinas']; ?>">
                                </div>
                        </td>
                        <td>
                        <h4><b>Esquinas </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="esq2" value="<?php echo $dataCn['esquinas']; ?>">
                        </div>                    
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="asis" value="<?php echo $data['asistencias']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Asistencias </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="asis2" value="<?php echo $dataCn['asistencias']; ?>">
                        </div>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tiros" value="<?php echo $data['tiros']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Tiros </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tiros2" value="<?php echo $dataCn['tiros']; ?>">
                        </div>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tiros_puerta" value="<?php echo $data['tiros_puerta']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Tiros a puerta</b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tiros_puerta2" value="<?php echo $dataCn['tiros_puerta']; ?>">
                        </div>
                        </td>
                    </tr>  
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="ta" value="<?php echo $data['tarjeta_amarilla']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Tarjetas amarillas </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="ta2" value="<?php echo $dataCn['tarjeta_amarilla']; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tr" value="<?php echo $data['tarjeta_roja']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Tarjetas rojas </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="tr2" value="<?php echo $dataCn['tarjeta_roja']; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="fj" value="<?php echo $data['fuera_juego']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Fueras de juego </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="fj2" value="<?php echo $dataCn['fuera_juego']; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="cam" value="<?php echo $data['cambios']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Cambios </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                                <input type="text" class="form-control text-center" name="cam2" value="<?php echo $dataCn['cambios']; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form-group">

                                <input type="text" class="form-control text-center" name="gol" value="<?php echo $data['goles']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Goles </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">

                                <input type="text" class="form-control text-center" name="gol2" value="<?php echo $dataCn['goles']; ?>">
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="form-group">

                                <input type="text" class="form-control text-center" name="exp" value="<?php echo $data['expulsados']; ?>">
                        </div>
                        </td>
                        <td>
                        <h4><b>Expulsados </b> </h4>
                        </td>
                        <td>
                        <div class="form-group">
                              
                                <input type="text" class="form-control text-center" name="exp2" value="<?php echo $dataCn['expulsados']; ?>">
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i> Aceptar</button>
        <a href="../partido/index.php"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>

        <div class="clearfix"></div>
        </form>
        <br>
    </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#frm_detalle_partido').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: {
          fal:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          fal2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          esq:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          esq2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          asis:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          asis2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tiros:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tiros2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tiros_puerta:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tiros_puerta2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          ta:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          ta2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tr:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          tr2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          fj:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          fj2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          cam:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          cam2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          gol:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          gol2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          exp:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
          exp2:
          {
            validators:
            {
                notEmpty:
                {
                  message: 'Este campo no puede quedar vacio'
                },
                numeric:
                {
                        message:'Solo se aceptan numeros'
                }
            }
          },
        }
      });
    });
    </script>
  </body>
</html>
