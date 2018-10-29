
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Aritro - Insertar</title>
    <?php include '..\layoults\headers2.php'; ?>
  </head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <body class="profile-page sidebar-collapse">
  <script type="text/javascript">
  $(function() 
  {
    $( "#autoArbitro" ).autocomplete(
    {
      source: 'searchArbitro.php',
      minLength: 0,
      select: function(event, ui) 
      { 
        $("#arbitro").val(ui.item.id);
      },
    }).focus(function () {
        $(this).autocomplete('search', $(this).val())
      });
  
  });
  </script>
    <?php include '..\layoults\barnavLogged.php'; ?>
    <div class="content">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title">Ingresar una nueva alineación</h3>
            <p class="card-category">Complete los campos siguientes</p>
          </div>
          <div class="card-body">
            <form method="post"  id="frm_arbitros">
              <input type="hidden" name="operation" value="1">
              <input type="hidden" name="partido" id="partido"  value="<?php echo $_GET['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="">Árbitro</label>
                    <input type="hidden" id="arbitro" name="arbitro">
                    <input type="text" id="autoArbitro" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <button onclick="submitForm()" type="button" class="btn btn-success pull-right btn-round"><i class="fas fa-check fa-lg"></i> Agregar</button>
                    <a href="../arbitro?id=<?php echo $_GET['id']; ?>"> <button type="button" class="btn btn-info pull-right btn-round"><i class="fas fa-undo-alt fa-lg"></i> Regresar</button></a>

                  </div>
                </div>
                </div>
              </div>
            <div>
              <div class="clearfix"></div>
              </div>
            </form>
            <div class="container" id="guardar">
            <h1>Árbitros</h1>
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
    <?php include '..\layoults\footer.php'; ?>
    <?php include '..\layoults\scripts2.php'; ?>
    <script type="text/javascript">


var arbitros = [ ];
document.getElementById('guardar').style.visibility = 'hidden';
function submitForm(){

    var arbitro = document.getElementById('arbitro').value;
    var partido = document.getElementById('partido').value;   
    var narbitro = document.getElementById('autoArbitro').value;
  
    
    
    var arb =[{id_arb:arbitro,id_par:partido,name:narbitro}]
    
    arbitros.push(arb);
    

    console.log(arbitros);

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

for (var i = 0; i < arbitros.length; i++) {
  var tr = document.createElement('TR');
  tableBody.appendChild(tr);

    var td = document.createElement('TD');
    td.appendChild(document.createTextNode(arbitros[i][0]['name']));
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
    this.arbitros.splice(i,1);

    mostrarDatos();
    
}

function Guardar()
{
  if(arbitros.length>0)
  {
  var pa=<?php echo $_GET['id']; ?>;
  var url = "guardar.php";
        $.ajax({
           type: "POST",
           url: url,
           dataType: "json",
           data: {"arbitros":arbitros},
           success: function(data)
           {             
             console.log(data);
             window.location.replace("http://localhost/PJ_XJMC/vista/arbitro/arbitros.php?id="+pa);
           },
           error: function(data) {
            console.log(data);
            }
      });
  }else
  {
    alert("No se a asignado a ningun arbitro");
  }
}

    </script>
  </body>
</html>
