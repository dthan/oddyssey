<?php

/**
 * change date format from dd/mm/yyyy become yyyy-mm-dd
 * @param <type> $date
 * @return string
 */
function encode_date($date) {
    list($day, $month, $year) = explode('/', $date);
    $new_date = $year . "-" . $month . "-" . $day;
    return $new_date;
}

/**
 * change date format from yyyy-mm-dd become dd/mm/yyyy
 * @param <type> $date
 * @return string
 */
function decode_date($date) {
    list($year, $month, $day) = explode('-', $date);
    $new_date = $day . "/" . $month . "/" . $year;
    return $new_date;
}

/**
 * create money value in Rupiah
 * @param <type> $uang
 * @return <type>
 */
function format_rupiah($uang) {
    return "Rp. ". number_format($uang, 0, ",", ".");
}

function format_dana($uang) {
    return number_format($uang, 0, ".", "");
}
        
function indonesian_month($month) {
    switch ($month) {
        case "01" : $imonth = "Januari"; break;
        case "02" : $imonth = "Februari"; break;
        case "03" : $imonth = "Maret"; break;
        case "04" : $imonth = "April"; break;
        case "05" : $imonth = "Mei"; break;
        case "06" : $imonth = "Juni"; break;
        case "07" : $imonth = "Juli"; break;
        case "08" : $imonth = "Agustus"; break;
        case "09" : $imonth = "September"; break;
        case "10" : $imonth = "Oktober"; break;
        case "11" : $imonth = "November"; break;
        case "12" : $imonth = "Desember"; break;
        default  : $imonth = "-"; break;
    }
    return $imonth;
}

/**
 * change date format to indonesia
 * @param <type> $month
 * @return string
 */
function indonesian_date($date) {
    list($year, $month, $day) = explode('-', $date);
    $new_date = $day ." ". indonesian_month($month) . " ". $year;
    return $new_date;
}

function indonesian_yearmonth($yearmonth) {
    list($month,$year) = explode(' ', $yearmonth);
    $new_yearmonth =  indonesian_month($month) . " ". $year;
    return $new_yearmonth;
}

function bulan_hari($day) {
    $tahun = floor($day/365);
    $bulan=floor(($day - ($tahun * 365))/30);
    $hari=$day - $bulan * 30;
    if($day=="30"){return $bulan." Bulan ";}
    elseif($day >= "30"){return $bulan." Bulan, ".$hari." Hari";}
    else{return $hari." Hari";}

}
function ganti($search,$replace,$subject)
{
    return str_replace($search,$replace, $subject);
}
?>