<?php
//require_once('..\PJ_XJMC\Negocio\ClassBeneficio.php');
// $beneficio=new Beneficio();
// $beneficio->select();
require_once('Negocio\ClassBeneficio.php');
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
     $beneficio=new Beneficio();
     $beneficio->select(-1);
      ?>
   </body>
 </html>
