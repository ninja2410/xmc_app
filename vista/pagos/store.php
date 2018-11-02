<?php
session_start();
require_once('../../Negocio/ClassPago.php');
require_once('../../Negocio/ClassSocio.php');
require_once('../../Negocio/ClassBitacora.php');
session_start();
$bit=new Bitacora();

$pago=new Pago();
$soc=new Socio();
$soc->select($_POST['socio']);
$operation=$_POST['operation'];
$socio=$_POST['socio'];
$monto=$_POST['amount'];
$meses=$_POST['mounts'];
$membresia=$_POST['member'];
if ($operation==1) {

  if($pago->insert($monto, $socio, $meses, $membresia)){
    $bit->insert('Realizo cobro', $_SESSION['id']);
    $_SESSION['mensaje']="El pago se ha almacenado con éxito!";
  }

}



//
// $destinatario = $soc['email'];
// $asunto = "Confirmación de pago";
// $cuerpo = '
// <!doctype html>
// <html>
// <head>
// <title>Confirmación de Pago</title>
// <meta charset="utf-8">
// </head>
//
// <body style="margin: 0; padding: 0;" background="../assets/img/home.png"></p>
// <table border="0" cellpadding="0" cellspacing="0" width="100%">
// <tr>
// <td style="padding: 10px 0 30px 0;">
// <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
// <tr>
// <td align="center" bgcolor="#294482" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
//       <img src="..\assets/img/logo.png" alt="Xelaju MC" width="100px" style="display: block;" />
//   </td>
// </tr>
// <tr>
// <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
// <table border="0" cellpadding="0" cellspacing="0" width="100%">
// <tr>
// <center><h2 style="color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;">Confirmación de Pago</h2></center>
//
// </tr>
// <tr>
// <tr>
// <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 10px;">
//     <p style="font-weight: bold;">Nombre de Socio:</p>
//     <p> '.$soc['nombre'].' '.$soc['apellido'].'</p>
//
// </td>
// </tr>
// <tr>
//   <td style="padding: 20px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 5px;">
//     <p style="font-weight: bold;">Monto Pago:</p>
//     <p>Q'.$monto.'</p>
//   </td>
//   <td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 10px;">
//     <p style="font-weight: bold;">Meses cancelados:</p>
//     <p>'.$meses.'</p>
//   </td>
// </tr>
// <tr>
//   <td style="padding: 10px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 10px;">
// <p style="font-weight: bold;">Fecha de pago:</p>
//     <p>Registrado: '.strftime("%A, %d de %B de %Y %H:%M").'</p>
//
// </td>
// </tr>
//
// </tr>
//
//
//
// </table>
//
//
//
// </td>
// </tr>
//
// <tr>
// <td bgcolor="#df3d3d" style="padding: 30px 30px 30px 30px; text-align: center;">
//
// <table border="0" cellpadding="0" cellspacing="0" width="100%">
// <tr>
// <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 18px; text-align: center;" width="75%" >
//         <strong>Gracias por colaborar con los Super Chivos.<br /> <br /></strong><br />
//         <a href="#" style="color: #ffffff;"><font color="#ffffff">XELAJU MC</font></a><br />
//         <br /><a href="http://104.131.190.54/arquisa/"></a>
//     </td>
// </tr>
// </table>
//
// </td>
// </tr>
// </table>
// </td>
// </tr>
// </table>
// </body>
// </html>
//
// ';
//
// //para el envío en formato HTML
// $headers = "MIME-Version: 1.0\r\n";
// $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//
// //dirección del remitente
// $headers .= "From: Miguel Angel Alvarez <pablo.felg@mesoamericana.edu.gt>\r\n";
//
// //dirección de respuesta, si queremos que sea distinta que la del remitente
// $headers .= "Reply-To: profe.pablo24@gmail.com\r\n";
//
// //ruta del mensaje desde origen a destino
// $headers .= "Return-path: pablo.felg1996@gmail.com\r\n";
//
// //direcciones que recibián copia
// //$headers .= "Cc: maria@desarrolloweb.com\r\n";
//
// $bool=mail($destinatario,$asunto,$cuerpo,$headers);
// if($bool){
//     echo "Mensaje enviado";
// }else{
//     echo "Mensaje no enviado";
// }
header('Location:pagos.php?id='.$socio);
 ?>
