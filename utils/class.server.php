<?php

function getIpinterna(){
	return str_replace("\n","",shell_exec("ip route show  | grep src | awk {'print $9'}"));
}

function PuertaEnlace(){
         
	return str_replace("\n","",shell_exec("ip route show | grep 'default via' | awk {'print $3'}"));
}

function iprango(){
	return str_replace("\n","",shell_exec("ip route show  | grep src | awk {'print $1'}"));
}
function is_connected()
{
    $connected = @fsockopen("www.wordpress.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = "Conectado"; //action when connected
        fclose($connected);
    }else{
        $is_conn = "Desconectado"; //action in connection failure
    }
    return $is_conn;

}
function getCPU(){
      //obtener uso de CPU en porcentaje 
     $exec_loads = sys_getloadavg();
     $exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
     $cpu = round($exec_loads[1]/($exec_cores + 1)*100, 0) ;
     return $cpu;
}

function getRAM(){
      // obtener uso Ram en porcentaje 
     $exec_free = explode("\n", trim(shell_exec('free')));
     $get_mem = preg_split("/[\s]+/", $exec_free[1]);
     $mem = round($get_mem[2]/$get_mem[1]*100, 0) ;
     return $mem;
}

function getRAMGB(){
      //obtener uso de ram en gb usados 
      // ademas se puede obtener [0]=>row_title 
      //[1]=>mem_total [2]=>mem_used [3]=>mem_free 
     //[4]=>mem_shared [5]=>mem_buffers [6]=>mem_cached 
     $exec_free = explode("\n", trim(shell_exec('free')));
     $get_mem = preg_split("/[\s]+/", $exec_free[1]);
     $mem_used = number_format(round($get_mem[2]/1024/1024, 2), 3);
     $mem_total = number_format(round($get_mem[1]/1024/1024, 2), 3);
     $mem_free = number_format(round($get_mem[3]/1024/1024, 2), 3);
     $mem2 = $mem_used . ' GB /' . $mem_total . ' GB /' . $mem_free ." GB";
     return $mem2;
   
}



function HumanSize($Bytes){
        $Type=array("", "KL", "MB", "GB", "TB", "peta", "exa", "zetta", "yotta");
        $Index=0;
        while($Bytes>=1024){
        $Bytes/=1024;
        $Index++;
        }
      return("".round($Bytes,2)." ".$Type[$Index]." bytes");
}
     
function getEspacioTotalDisco(){
       return disk_total_space("/");
}
     
function getEspacioLibreDisco(){
        return disk_free_space("/");
}


function getEspacioUtilizadoDisco(){
      return disk_total_space("/") - disk_free_space("/");
}

?>

