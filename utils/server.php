<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("class.server.php");
  

$usocpu = getCPU();
$usoram = getRAM();
$datosram = explode("/",getRAMGB());
$tdisco =HumanSize(getEspacioTotalDisco());
$tlibre = HumanSize(getEspacioLibreDisco());
$tutilizado =HumanSize(getEspacioUtilizadoDisco());
$disk_porcent = round(round(getEspacioUtilizadoDisco()) / round(getEspacioTotalDisco()) * 100);
$iplan = getIpinterna();
$ipmasc = iprango();
$gtw = PuertaEnlace();
$internet =is_connected();
$myObj =array(
              'cpu'=> $usocpu,
              'ram'=>$usoram,
              'mem_used'=>$datosram[0],
              'mem_total'=>$datosram[1],
              'mem_free'=>$datosram[2],
              'tdisco'=>$tdisco,
              'tlibre'=>$tlibre,
              'tutilizado'=>$tutilizado,
              'disk_porcj'=> $disk_porcent,
              'iplan'=> $iplan,
              'masc'=> $ipmasc,
              'gwt'=> $gtw,
              'internet'=> $internet
             );
//header('Content-Type: application/json');
echo json_encode($myObj);



?>
