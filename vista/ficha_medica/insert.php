<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fichas médicas - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <body class="profile-page sidebar-collapse">
    <?php include '..\layoults\barnav.php'; ?>
    <div class="content main main-raised">
      <div class="container-fluid">
      <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                    <h3 class="card-title">Ficha médica</h3>
                    <p class="category">Nueva ficha médica.</p>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills nav-pills-success justify-content-center">
                    <li class="nav-item"><a class="nav-link active" href="#encabezado" data-toggle="tab">Encabezado</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detalle" data-toggle="tab">Detalle</a></li>
                </ul>
                <form method="post", action="..\ficha_medica\store.php" id="frm_fichaMedica">
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="encabezado">
                        <input type="hidden" name="operation" value="1">
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
                                <input name="fecha" type="date" class="form-control"  value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d");?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Jugador</label>
                                <select class="form-control" name="jugador">
                                    <option selected>Elija un jugador...</option>
                                    <?php
                                        include_once('..\..\Negocio/ClassJugador.php');
                                        $jugador=new Jugador();
                                        $data=$jugador->select(-1);
                                        while ($row = mysqli_fetch_array($data))
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
                                <input type="number" class="form-control" name="grasa">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="peso">Peso</label>
                                <input type="number" class="form-control" name="peso">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="talla">Talla</label>
                                <input type="number" class="form-control" name="talla">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php include '..\layoults\botones.php'; ?>
                <div class="clearfix"></div>
                </form>
                <div class="tab-pane" id="detalle">
                        <?php include 'detalle.php'?>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <!-- Script con las funciones para convertir los campos en un JSON -->
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
        datos1.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#signosVitales').val(JSON.stringify(datos1));
    }

    function registrarValorPill2(id){
        datos2=[];
        var inputs=document.getElementById('pill2').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos2.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#criometria').val(JSON.stringify(datos2));
    }
    function registrarValorPill3(id){
        datos3=[];
        var inputs=document.getElementById('pill3').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos3.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#rodilla').val(JSON.stringify(datos3));
    }
    function registrarValorPill4(id){
        datos4=[];
        var inputs=document.getElementById('pill4').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos4.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#tobillo').val(JSON.stringify(datos4));
    }
    function registrarValorPill5(id){
        datos5=[];
        var inputs=document.getElementById('pill5').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos5.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#meniscos').val(JSON.stringify(datos5));
    }
    function registrarValorPill6(id){
        datos6=[];
        var inputs=document.getElementById('pill6').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos6.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#musculos').val(JSON.stringify(datos6));
    }
    function registrarValorPill7(id){
        datos7=[];
        var inputs=document.getElementById('pill7').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos7.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#alineamiento').val(JSON.stringify(datos7));
    }
    function registrarValorPill8(id){
        datos8=[];
        var inputs=document.getElementById('pill8').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos8.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#cuello').val(JSON.stringify(datos8));
    }
    function registrarValorPill9(id){
        datos9=[];
        var inputs=document.getElementById('pill9').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos9.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#pecho').val(JSON.stringify(datos9));
    }
    function registrarValorPill10(id){
        datos10=[];
        var inputs=document.getElementById('pill10').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos10.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#otra').val(JSON.stringify(datos10));
    }
    function registrarValorPill11(id){
        datos11=[];
        var inputs=document.getElementById('pill11').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos11.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#subescapular').val(JSON.stringify(datos11));
    }
    function registrarValorPill12(id){
        datos12=[];
        var inputs=document.getElementById('pill12').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos12.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#supraespinal').val(JSON.stringify(datos12));
    }
    function registrarValorPill13(id){
        datos13=[];
        var inputs=document.getElementById('pill13').getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
        datos13.push({"campo": inputs[i].name, "valor":inputs[i].value});
        }
        $('#abdominal').val(JSON.stringify(datos13));
    }
</script>
    <!-- Fin script con funciones -->
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
                    message:'Ingrese una fecha valida'
                }
            }
        },

        grasa:{
        validators:{
            notEmpty:{
                message:'Ingrese el valor de la grasa del jugador'
            },
            regexp:{
                regexp: /^[0-9]*$/,
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
                regexp: /^[0-9]*$/,
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
