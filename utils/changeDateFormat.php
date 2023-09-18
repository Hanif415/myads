<?php
function changeDateFormat($date)
{
    $orgDate = $date;
    $newDate = date("Ymd", strtotime($orgDate));
    echo date('d F Y', strtotime($newDate));;
}
