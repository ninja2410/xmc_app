<div class="container">
    <ul class="nav nav-pills nav-pills-info justify-content-center">
        <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Signos vitales</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Criometría/Antropometria</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Evaluación Rodilla</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill4" data-toggle="tab">Evaluación Tobillo</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill5" data-toggle="tab">Meniscos</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill6" data-toggle="tab">Músculos</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill7" data-toggle="tab">Alineamiento Postular</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill8" data-toggle="tab">Cuello</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill9" data-toggle="tab">Pecho</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill10" data-toggle="tab">Subescapular</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill11" data-toggle="tab">Supraespinal</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill12" data-toggle="tab">Abdominal</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill13" data-toggle="tab">Otra</a></li>
    </ul>
    <div class="tab-content tab-space">
        <div class="tab-pane active" id="pill1">
            <?php include_once('..\..\Negocio/ClassCampo.php');
            $campo=new Campo();
            $data=$campo->listCampos(1);
            while ($row = mysqli_fetch_array($data)){
              ?>
              <div class="form-group col-md-4">
                  <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                  <input type="text" class="form-control" onblur="registrarValor(1)" name="<?php echo $row['CAMPO']; ?>">
              </div>
              <?php
            }
            ?>
        </div>
        <div class="tab-pane" id="pill2">
           2
        </div>
        <div class="tab-pane" id="pill3">
           3
        </div>
        <div class="tab-pane" id="pill4">
           4
        </div>
        <div class="tab-pane" id="pill5">
            5
        </div>
        <div class="tab-pane" id="pill6">
            6
        </div>
        <div class="tab-pane" id="pill7">
            7
        </div>
        <div class="tab-pane" id="pill8">
            8
        </div>
        <div class="tab-pane" id="pill9">
            9
        </div>
        <div class="tab-pane" id="pill10">
            10
        </div>
        <div class="tab-pane" id="pill11">
            11
        </div>
        <div class="tab-pane" id="pill12">
            12
        </div>
        <div class="tab-pane" id="pill13">
            13
        </div>
    </div>
</div>
