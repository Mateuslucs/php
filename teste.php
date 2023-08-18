<?php

$texto = "SSC Napoli v Dnipro - Quinta-Feira 07/05/2015 16:05 Horas
          SSC Napoli v Dnipro - Quinta-Feira 08-06-2015 17:05 Horas
          SSC Napoli v Dnipro - Quinta-Feira 09.06.2015 18:05 Horas";

preg_match_all('~(\d{2})[-.\/](\d{2})[-.\/]+(\d{4})\s~', $texto, $data);


foreach($data[0] as $d){

    echo $d."\n";
}