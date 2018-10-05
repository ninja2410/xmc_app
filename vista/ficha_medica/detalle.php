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
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(1);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill1(1)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill2">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(2);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill2(2)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill3">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(3);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill3(3)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill4">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(4);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill4(4)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill5">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(5);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill5(5)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill6">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(6);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill6(6)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill7">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(7);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill7(7)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill8">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(8);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill8(8)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill9">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(9);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill9(9)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill10">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(11);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill11(11)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill11">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(12);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill12(12)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill12">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(13);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill13(13)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tab-pane" id="pill13">
            <div class="row text-left">
                <?php include_once('..\..\Negocio/ClassCampo.php');
                $campo=new Campo();
                $data=$campo->listCampos(10);
                while ($row = mysqli_fetch_array($data)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" onblur="registrarValorPill10(10)" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
