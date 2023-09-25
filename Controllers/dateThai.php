<?php
function currentdate()
{
    $currentDate = date("Y-m-d");
    return $currentDate;
}

function countDays($start, $end)
{
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);
    $interval = $startDate->diff($endDate);
    return $interval->days;
}
function checkDays($asdf)
{
    $thaiDayOfWeeks = '';
    $dayOfWeek = date("D", $asdf);
    if ($dayOfWeek === "Sun") {
        $thaiDayOfWeeks = "วันอาทิตย์";
    } elseif ($dayOfWeek === "Mon") {
        $thaiDayOfWeeks = "วันจันทร์";
    } elseif ($dayOfWeek === "Tue") {
        $thaiDayOfWeeks = "วันอังคาร";
    } elseif ($dayOfWeek === "Wed") {
        $thaiDayOfWeeks = "วันพุธ";
    } elseif ($dayOfWeek === "Thu") {
        $thaiDayOfWeeks = "วันพฤหัสบดี";
    } elseif ($dayOfWeek === "Fri") {
        $thaiDayOfWeeks = "วันศุกร์";
    } elseif ($dayOfWeek === "Sat") {
        $thaiDayOfWeeks = "วันเสาร์";
    } else {
        $thaiDayOfWeeks = "ไม่สามารถระบุวันในสัปดาห์ได้";
    }
    return $thaiDayOfWeeks;
}
?>