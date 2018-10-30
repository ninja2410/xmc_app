<div class="container">
    <ul class="nav nav-pills nav-pills-info justify-content-center">
        <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Signos vitales</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Criometría/Antropometría</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill3" data-toggle="tab">Evaluación de rodilla</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill4" data-toggle="tab">Evaluación de tobillo</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill5" data-toggle="tab">Meniscos</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill6" data-toggle="tab">Músculos</a></li>
        <li class="nav-item"><a class="nav-link" href="#pill7" data-toggle="tab">Alineamiento postular</a></li>
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
                $data2=$campo->listCamposEdit(1,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="form-group col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill1(1)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(2,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill2(2)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(3,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill3(3)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(4,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill4(4)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(5,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill5(5)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(6,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill6(6)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(7,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill7(7)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(8,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill8(8)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(9,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill9(9)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(10,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill10(10)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(11,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill11(11)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(12,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill12(12)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
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
                $data2=$campo->listCamposEdit(13,$data['id_ficha']);
                while ($row = mysqli_fetch_array($data2)){
                ?>
                <div class="col-md-4">
                    <label for="peso"><?php echo $row['NOMBRE'] ?></label>
                    <input type="text" class="form-control" value="<?php echo $row['VALOR'];?>"  onblur="registrarValorPill13(13)" id="<?php echo $row['ID']; ?>" name="<?php echo $row['CAMPO']; ?>">
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
