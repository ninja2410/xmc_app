
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prensa - Insertar</title>
    <?php include '../layoults/headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <body class="profile-page sidebar-collapse">
  <script type="text/javascript">
  $(function() 
  {
    $( "#autoprensa" ).autocomplete(
    {
      source: 'searchprensa.php',
      minLength: 0,
      select: function(event, ui) 
      { 
        $("#prensa").val(ui.item.id);
      },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });
  
  });
  </script>
    <?php include '../layoults/barnavLogged.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">INGRESAR UNA NUEVA PRENSA</h4>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post"  id="frm_prensas">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="partido" id="partido"  value="<?php echo $_GET['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">prensa</label>
                    <input type="hidden" id="prensa" name="prensa">
                    <input type="text" id="autoprensa" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button onclick="submitForm()" type="button" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i>Agregar</button>
                    <a href="../prensa?id=<?php echo $_GET['id']; ?>"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>

                  </div>
                </div>
                </div>
              </div>
            <div>
              <div class="clearfix"></div>
              </div>
            </form>
            <div class="container" id="guardar">
            <h1>prensas</h1>
            <div class="content">
                <div id="myDynamicTable">
                </div>
            </div>
            <button onclick="Guardar()"  type="button" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i> Guardar</button>

            <br>
         </div>
         </div>
         </div>


      </div>
    </div>
    <?php include '../layoults/footer.php'; ?>
    <?php include '../layoults/scripts2.php'; ?>
    <script type="text/javascript">


var prensas = [ ];
document.getElementById('guardar').style.visibility = 'hidden';
function submitForm(){

    var prensa = document.getElementById('prensa').value;
    var partido = document.getElementById('partido').value;   
    var nprensa = document.getElementById('autoprensa').value;
  
    
    
    var arb =[{id_pre:prensa,id_par:partido,name:nprensa}]
    
    prensas.push(arb);
    

    console.log(prensas);

    mostrarDatos();

}

function mostrarDatos()
{
    document.getElementById('guardar').style.visibility = 'visible';
   
    var myTableDiv = document.getElementById("myDynamicTable");
    myTableDiv.innerHTML=''; 
    var table = document.createElement('TABLE');
    table.classList.add("table-striped");
    table.classList.add("table-bordered");
    table.classList.add("table");

    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);

for (var i = 0; i < prensas.length; i++) {
  var tr = document.createElement('TR');
  tableBody.appendChild(tr);

    var td = document.createElement('TD');
    td.appendChild(document.createTextNode(prensas[i][0]['name']));
    tr.appendChild(td);


    var td = document.createElement('TD');
    

    var button = document.createElement('input');
    button.setAttribute('type', 'button');
    button.setAttribute('value', 'Retirar');
    button.setAttribute('onclick', 'eliminar('+i+')');
    button.className += 'btn btn-primary btn-link btn-sm';


    td.appendChild(button);
    
    tr.appendChild(td);
  
}

myTableDiv.appendChild(table);

 
}

function eliminar(i) 
{
  document.getElementById('guardar').style.visibility = 'hidden';
    this.prensas.splice(i,1);

    mostrarDatos();
    
}

function Guardar()
{
  if(prensas.length>0)
  {
  var pa=<?php echo $_GET['id']; ?>;
  var url = "guardar.php";
        $.ajax({
           type: "POST",
           url: url,
           dataType: "json",
           data: {"prensas":prensas},
           success: function(data)
           {             
             console.log(data);
             window.location.replace("http://localhost/PJ_XJMC/vista/prensa/prensa.php?id="+pa);
           },
           error: function(data) {
            console.log(data);
            }
      });
  }else
  {
    alert("No se a asignado a ningun prensa");
  }
}

    </script>
  </body>
</html>
