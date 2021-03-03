<?php
class ShowBanglaDateTime{
//Base function
    public function bangla_date_time($str){
$eng = array('January','February','March','April','May','June','July','August','September','October','November','December',
'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',
'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday',
'Sat','Sun','Mon','Tue','Wed','Thu','Fri',
'1','2','3','4','5','6','7','8','9','0',
'am','pm');
$bng = array('জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',
'জানু','ফেব্রু','মার্চ','এপ্রি','মে','জুন','জুলা','আগ','সেপ্টে','অক্টো','নভে','ডিসে',
'শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার',
'শনি','রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র',
'১','২','৩','৪','৫','৬','৭','৮','৯','০',
'পূর্বাহ্ণ','অপরাহ্ণ');
return str_ireplace($eng, $bng, $str);
}
}
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>বাংলাতে সময় ও তারিখ</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Dhaka');
$BanglaDate=new ShowBanglaDateTime();
echo $BanglaDate->bangla_date_time(date('d M Y h:i A'));
?>

<a href="http://onlinetunes24.blogspot.com/2013/08/show-bangla-date-time.html">বাংলাতে সময় ও তারিখ</a>

</body>
</html>