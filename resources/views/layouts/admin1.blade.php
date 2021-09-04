<!DOCTYPE HTML>
<html lang="app()->getLocale()) }}">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/app.js') }}" defer></script>


  <!--css橋渡し -->


<title>@yield('title') -サイトタイトル</title>
 <meta name="description" content="@yield('description')">
 <link rel="dns-prefetch" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

 <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/calender.css') }}" rel="stylesheet" >
</head>
  <body>
    <header>
    <div class="header-title-area">
      <h1 class="logo">ホーム画面</h1>
        <h4 class="gender">男性用</h4>
        <br>
        <div class="ribbon14-wrapper">
  <span class="ribbon14">★</span>
  <div>
      <h5 class="text-sub">楽しく怪我なくトレーニング！！</h5>
    </div>
  </div>
 </div>

 <div class="box1" >
       <h5>部位別でトレーニング紹介</h5>
       <div style="margin-left:20%;margin-right:20%;">
 <nav>
     <ul class="kata-menu" align="center">
     <li><a href="http://localhost:8000/admin/tra/katamenu"><button type="button" class="btn btn-primary btn-lg">肩 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/munemenu"><button type="button" class="btn btn-success btn-lg">胸 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/haramenu"><button type="button" class="btn btn-info btn-lg">腹筋</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/sirimenu"><button type="button" class="btn btn-warning btn-lg">お尻</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/ashimenu"><button type="button" class="btn btn-danger btn-lg">足 </buttun></a></li>
     </ul>
 </nav>
   </div>
 </div>

</header>


 <div class="box1" >
       <h5>部位別でトレーニング紹介</h5>
       <div style="margin-left:20%;margin-right:20%;">
 <nav>
     <ul class="kata-menu" align="center">
     <li><a href="http://localhost:8000/admin/tra/katamenu"><button type="button" class="btn btn-primary btn-lg">肩 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/munemenu"><button type="button" class="btn btn-success btn-lg">胸 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/haramenu"><button type="button" class="btn btn-info btn-lg">腹筋</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/sirimenu"><button type="button" class="btn btn-warning btn-lg">お尻</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/ashimenu"><button type="button" class="btn btn-danger btn-lg">足 </buttun></a></li>
     </ul>
 </nav>
   </div>
 </div>



@yield('content')
<?php //タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));
//1日の曜日を取得
$first_week = date('w', strtotime($year.$month.'01'));
//月末日の曜日を取得
$last_week = date('w', strtotime($year.$month.$end_month));

$aryCalendar = [];
$j = 0;

//1日開始曜日までの穴埋め
for($i = 0; $i < $first_week; $i++){
    $aryCalendar[$j][] = '';
}

//1日から月末日までループ
for ($i = 1; $i <= $end_month; $i++){
    //日曜日まで進んだら改行
    if(isset($aryCalendar[$j]) && count($aryCalendar[$j]) === 7){
        $j++;
    }
    $aryCalendar[$j][] = $i;
}

//月末曜日の穴埋め
for($i = count($aryCalendar[$j]); $i < 7; $i++){
    $aryCalendar[$j][] = '';
}

$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];

?>
<table class="calendar">
    <!-- 曜日の表示 -->
    <tr>
    <?php foreach($aryWeek as $week){ ?>
        <th><?php echo $week ?></th>
    <?php } ?>
    </tr>
    <!-- 日数の表示 -->
    <?php foreach($aryCalendar as $tr){ ?>
    <tr>
        <?php foreach($tr as $td){ ?>
            <?php if($td != date('j')){ ?>
                <td><?php echo $td ?></td>
            <?php }else{ ?>
                <!-- 今日の日付 -->
                <td class="today"><?php echo $td ?></td>
            <?php } ?>
        <?php } ?>
    </tr>
    <?php } ?>
</table>
<div class="box22">
    <p style="text-align: left">筋トレを初めてなかなか身につかない。
      毎日トレーニングジムに通っているのに思うように重量が上がらず苦戦している。
      という人も多いと思います。なぜそのような現象に陥るのかというとトレーニングの
      「やり方」が間違っているからです。筋トレを初めたがやり方がわからない。という方は
      このようなサイトを活用することをお勧めします。間違ったやり方でトレーニングを
      続けてしまうと、伸びないだけでなく怪我に繋がってしまいます。ベンチプレス100kgなどの
      目標を達成する近道は怪我をしないことです。私も怪我をしてトレーニングが出来ない日が
      あり、伸び悩みました。
    </p>
</div>
<!--カレンダー入れる-->

<br>
<br>
<br>
<footer>
  <p class="keika">前回の筋トレ経過日数</p>
    <p class="after_training">9/2のトレーニング</p>
</footer>

  </body>
</html>
