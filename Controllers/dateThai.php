<?php
  // วันปัจจุบัน
  function currentdate()
  {
      $currentDate = date("Y-m-d");
      return $currentDate;
  }
  function currentdateTime()
{
$currentdateTime = date("Y-m-d H:i:s");
return $currentdateTime;
}

  // นับวัน
  function countDays($start, $end)
  {
      $startDate = new DateTime($start);
      $endDate = new DateTime($end);
      $interval = $startDate->diff($endDate);
      return $interval->days;
  }

  // เช็คค่าที่เลือกว่าคือวันอะไร
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

  function convertYear($x){
      $year = date('Y',strtotime($x));
      $convertYear = $year + 543;
      return $convertYear;
  }

  function convertMonth($englishMonth) {
      $monthMapping = [
          'Jan' => 'ม.ค.',
          'Feb' => 'ก.พ.',
          'Mar' => 'มี.ค.',
          'Apr' => 'เม.ย.',
          'May' => 'พ.ค.',
          'Jun' => 'มิ.ย.',
          'Jul' => 'ก.ค.',
          'Aug' => 'ส.ค.',
          'Sep' => 'ก.ย.',
          'Oct' => 'ต.ค.',
          'Nov' => 'พ.ย.',
          'Dec' => 'ธ.ค.'
      ];
  
      if (array_key_exists($englishMonth, $monthMapping)) {
          return $monthMapping[$englishMonth];
      } else {
          return false;
      }
  }
