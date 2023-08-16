<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./components/forindex.css">
  <link rel="stylesheet" href="./components/sidebar_com.css">


</head>

<body>
<?php
   include_once "./components/navbar.php";
   include_once "./components/sidebar.php";

?>


  <form method="post">
  <div class="content">
    <div style="width: 100%; height: 100%; position: relative; background: white">

      <div class="form-box" style="left: 260px; top: 100px;"></div>
      <div class="textlabel" style="width: 136px; height: 30px; left:290px; top: 260px;">เหตุผลการลา</div>

      <!-- กล่องคอมเมนต์ -->
      <textarea style="left: 290px; top: 290px; resize: none; border-radius: 5px;
        font-family : 'Anakotmai',sans-serif ;font-size: medium" name="leave_comment"></textarea>

      <!-- ข้อมูลฝั่งขวาของกล่องข้อความการลา -->
      <div class="divider2" style="left: 490px; top: 196px;"></div>
      <div class="divider2" style="left: 950px; top: 195px;"></div>
      <div style="width: 165px; height: 75px; left: 650px; top: 50px; position: absolute; color: black; font-size: 30px; font-family: 'Anakotmai',sans-serif; font-weight: 400; word-wrap: break-word"> บันทึกการลา</div>
      <div class="file-input" style="left: 290px; top: 490px; width: auto;">
        <p style="font-size: 15px; color: red; margin-bottom: 0;">** หมายเหตุ กรณีที่ลาป่วยเกิน 3 วันควรมีใบรับรองแพทย์ในการยืนยัน</p>
        <p class="mb-0">แนบไฟล์ ใบรับรองแพทย์</p>
      </div>
      <div class="file" style="left: 290px; top: 545px;"><input type="file"></div>

      <!-- ปุ่มการเลือกข้อมูล -->
      <div class="file-input" style="left: 900px; top: 260px;">ประเภทการลา</div>
      <div>
        <select style="width: 159px; height: 50px; left: 900px; top: 310px; position: absolute; background: white;
            border-radius: 15px; font-size: 20px; font-family: 'Anakotmai',sans-serif; font-weight: 50;
            word-wrap: break-word" name="leave_type_id">
          <option value="LT01">ลากิจ</option>
          <option value="LT02">ลาป่วย</option>
        </select>
      </div>
      <div class="file-input" style="left: 900px; top: 371px;">วิชาที่ลาได้</div>
      <div>
        <select style="width: 159px; height: 50px; left: 900px; top: 424px; position: absolute; background: white;
            border-radius: 15px;  font-size: 20px; font-family: 'Anakotmai',sans-serif; font-weight: 50;
            word-wrap: break-word" name="Leaving_subjects">
          <option>คณิตศาสตร์</option>
          <option>วิทยาศาสตร์</option>
        </select>
      </div>

      <!-- ส่วนของเวลา -->
      <div class="file-input" style="left: 790px; top: 130px;">ตั้งแต่เวลา</div>
      <div>
        <select style="width: 159px; height: 72px; left: 790px; top: 159px; position: absolute; background: white;
            border-radius: 15px; color: black; font-size: 20px; font-family: 'Anakotmai',sans-serif; font-weight: 400;
            word-wrap: break-word">
          <option>10.00 - 11.00</option>
          <option>11.00 - 12.00</option>
        </select>
      </div>

      <div class="file-input" style="left: 1000px; top: 130px;">ถึงเวลา</div>
      <div>
        <select name="" style="width: 159px; height: 72px; left: 1000px; top: 159px; position: absolute;
            background: white; border-radius: 15px; color: black; font-size: 20px; font-family: 'Anakotmai',sans-serif;
            font-weight: 400; word-wrap: break-word">
          <option value="">11.00 - 12.00</option>
          <option>12.00 - 13.00</option>
        </select>
      </div>
      <div class="file-input" style="left: 290px; top: 130px;">วันที่เริ่มลา</div>
      <div>
        <!-- ปุ่มที่สองเปิดปฏิทิน -->
        <a id="openPopupButton2" style="left: 540px; top: 159px;" name="end_leave_date"  class="currentDateDiv  link-button">เลือกวันที่</a>
      </div>
      <div class="file-input" style="left: 540px; top: 130px;">ถึงวันที่</div>
      <div>

        <!-- ปุ่มแรกเปิดปฏิทิน -->
        <a id="openPopupButton1" style="left: 290px; top: 159px;" name="start_leave_date"  class="currentDateDiv link-button">เลือกวันที่</a>

      </div>
      <div>
        <button class="submit-button" style="left: 900px; top: 530px;">ยืนยันการลา</button>
      </div>



      </div>
     </div>
  </form>
      <!-- ป็อปอัพท์ปฏิทิน 1 -->
      <div class="calendar-popup" style="left:290px; top: 320px;" id="calendarPopup1">
        <h2 id="currentMonthYear1">ปฏิทิน 1</h2>
        <div class="calendar-header">
          <a id="prevMonthButton1"><</a>
          <span id="currentMonthYear1">เดือน ปี</span>
          <a id="nextMonthButton1">></a>
        </div>
        <div class="calendar" id="calendar1">
        </div>
      </div>

      <!-- ป็อปอัพท์ปฏิทิน 2 -->
      <div class="calendar-popup" style="left: 540px; top: 320px;" id="calendarPopup2">
        <h2 id="currentMonthYear2">ปฏิทิน 2</h2>
        <div class="calendar-header">
          <a id="prevMonthButton2"><</a>
          <span id="currentMonthYear2">เดือน ปี</span>
          <a id="nextMonthButton2">></a>
        </div>
        <div class="calendar" id="calendar2">
        </div>
      </div>
</body>

</html>