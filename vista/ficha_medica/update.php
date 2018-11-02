<?php
require_once('../../Negocio/ClassFichaMedica.php');
$fichamedica=new FichaMedica();
$data=$fichamedica->select($_GET['id']);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ficha médica - Actualizar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="content main main-raised">
    <div class="card">
      <div class="container-fluid">
      <div class="col-md-12">
            
              <div class="card-header card-header-danger">
                  <h3 class="card-title">Actualizar ficha médica</h3>
                  <p class="category">Complete los siguientes campos</p>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills nav-pills-success justify-content-center">
                    <li class="nav-item"><a class="nav-link active" href="#encabezado" data-toggle="tab">Encabezado</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detalle" data-toggle="tab">Detalle</a></li>
                </ul>
                <form method="post", action="../ficha_medica/store.php" id="frm_fichaMedica">
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="encabezado">
                        <input type="hidden" name="operation" value="2">
                        <input type="hidden" name="id" value="<?php echo $data['id_ficha'] ?>">
                        <!-- imput para mandar los campos -->
                        <input type="hidden" name="signosVitales" id="signosVitales" >
                        <input type="hidden" name="criometria" id="criometria" >
                        <input type="hidden" name="rodilla" id="rodilla" >
                        <input type="hidden" name="tobillo" id="tobillo" >
                        <input type="hidden" name="meniscos" id="meniscos" >
                        <input type="hidden" name="musculos" id="musculos" >
                        <input type="hidden" name="alineamiento" id="alineamiento" >
                        <input type="hidden" name="cuello" id="cuello" >
                        <input type="hidden" name="pecho" id="pecho" >
                        <input type="hidden" name="subescapular" id="subescapular" >
                        <input type="hidden" name="supraespinal" id="supraespinal" >
                        <input type="hidden" name="abdominal" id="abdominal" >
                        <input type="hidden" name="otra" id="otra" >
                        <!-- fin imputs -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Fecha</label>
                                <input name="fecha" type="date" class="form-control" value="<?php echo $data['fecha'] ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputState">Jugador</label>
                                <select class="form-control" name="jugador">
                                    <?php
                                        echo '<option selected value="'.$data['id_jugador'].'">'.$data['Nombre'].'</option>';
                                        include_once('../../Negocio/ClassJugador.php');
                                        $jugador=new Jugador();
                                        $data2=$jugador->select(-1);
                                        while ($row = mysqli_fetch_array($data2))
                                        {
                                            $valor = $row['id_jugador'];
                                            $texto2 = $row['Nombre'];
                                            $texto = $texto2.' '.$row['apellido'];
                                            echo '<option value="'.$valor.'">'.$texto.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="grasa">Grasa</label>
                                <input type="text" class="form-control" name="grasa" value="<?php echo $data['grasa'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="peso">Peso</label>
                                <input type="text" class="form-control" name="peso" value="<?php echo $data['peso'] ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="talla">Talla</label>
                                <input type="text" class="form-control" name="talla" value="<?php echo $data['talla'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="detalle">
                        <?php include 'detalleUpdate.php'?>
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
        var datos1=[];
        var datos2=[];
        var datos3=[];
        var datos4=[];
        var datos5=[];
        var datos6=[];
        var datos7=[];
        var datos8=[];
        var datos9=[];
        var datos10=[];
        var datos11=[];
        var datos12=[];
        var datos13=[];
        function registrarValorPill1(id){
            datos1=[];
            var inputs=document.getElementById('pill1').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos1.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#signosVitales').val(JSON.stringify(datos1));
        }

        function registrarValorPill2(id){
            datos2=[];
            var inputs=document.getElementById('pill2').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos2.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#criometria').val(JSON.stringify(datos2));
        }
        function registrarValorPill3(id){
            datos3=[];
            var inputs=document.getElementById('pill3').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos3.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#rodilla').val(JSON.stringify(datos3));
        }
        function registrarValorPill4(id){
            datos4=[];
            var inputs=document.getElementById('pill4').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos4.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#tobillo').val(JSON.stringify(datos4));
        }
        function registrarValorPill5(id){
            datos5=[];
            var inputs=document.getElementById('pill5').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos5.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#meniscos').val(JSON.stringify(datos5));
        }
        function registrarValorPill6(id){
            datos6=[];
            var inputs=document.getElementById('pill6').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos6.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#musculos').val(JSON.stringify(datos6));
        }
        function registrarValorPill7(id){
            datos7=[];
            var inputs=document.getElementById('pill7').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos7.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#alineamiento').val(JSON.stringify(datos7));
        }
        function registrarValorPill8(id){
            datos8=[];
            var inputs=document.getElementById('pill8').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos8.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#cuello').val(JSON.stringify(datos8));
        }
        function registrarValorPill9(id){
            datos9=[];
            var inputs=document.getElementById('pill9').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos9.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#pecho').val(JSON.stringify(datos9));
        }
        function registrarValorPill10(id){
            datos10=[];
            var inputs=document.getElementById('pill10').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos10.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#subescapular').val(JSON.stringify(datos10));
        }
        function registrarValorPill11(id){
            datos11=[];
            var inputs=document.getElementById('pill11').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos11.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#supraespinal').val(JSON.stringify(datos11));
        }
        function registrarValorPill12(id){
            datos12=[];
            var inputs=document.getElementById('pill12').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos12.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#abdominal').val(JSON.stringify(datos12));
        }
        function registrarValorPill13(id){
            datos13=[];
            var inputs=document.getElementById('pill13').getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
            datos13.push({"campo": inputs[i].name, "valor":inputs[i].value, "ID":inputs[i].id});
            }
            $('#otra').val(JSON.stringify(datos13));
        }
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#frm_fichaMedica').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        message: 'Valor no valido',
        fields: {
          fecha:{
              validators:{
                  notEmpty:{
                      message:'Seleccione una fecha'
                  }
                }
            },

            grasa:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor de la grasa del jugador'
                },
                regexp:{
                    regexp: /^[0-9\.]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },
            peso:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor del peso del jugador'
                },
                regexp:{
                    regexp: /^[0-9\.]*$/,
                    message: 'Solo se aceptan números'
                    }
                }
            },
            talla:{
            validators:{
                notEmpty:{
                    message:'Ingrese el valor de la talla del jugador'
                },
                regexp:{
                    regexp: /^[0-9\.]*$/,
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
