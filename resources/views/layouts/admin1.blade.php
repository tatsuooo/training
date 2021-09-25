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

        <br>
        <div class="ribbon14-wrapper">
  <span class="ribbon14">★</span>
  <div>
      <h5 class="text-sub">楽しく怪我なくトレーニング！！</h5>
    </div>
  </div>
 </div>



</header>
<div id="box">
 <nav>
 <div class="box1" >
       <h5 class="training">トレーニング</h5>
       <div style="margin-left:-30%;margin-right:50%;">

     <ul class="kata-menu" align="left">
     <li><a href="http://localhost:8000/admin/tra/katamenu"><button type="button" class="btn btn-primary btn-lg" style="width:100px;height:50px">肩 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/munemenu"><button type="button" class="btn btn-success btn-lg" style="width:100px;height:50px">胸 </buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/haramenu"><button type="button" class="btn btn-info btn-lg" style="width:100px;height:50px">腹筋</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/sirimenu"><button type="button" class="btn btn-warning btn-lg" style="width:100px;height:50px">お尻</buttun></a></li>
     <li><a href="http://localhost:8000/admin/tra/ashimenu"><button type="button" class="btn btn-danger btn-lg" style="width:100px;height:50px">足 </buttun></a></li>
     </ul>

   </div>
 </div>

 </nav>


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
<div class="gazou" align="left">
<img src="https://sozai-good.com/uploads/49997/49997_sample.png" alt="Branding Engineerのロゴ" class="gazou">
</div>
<div class="box22">
    <p class="jogen" style="text-align: left"> ※筋トレを初めてなかなか身につかない。
      毎日トレーニングジムに通っているのに思うように重量が上がらず苦戦している。
      という人も多いと思います。なぜそのような現象に陥るのかというとトレーニングの
      「やり方」が間違っているからです。筋トレを初めたがやり方がわからない。という方は
      このようなサイトを活用することをお勧めします。間違ったやり方でトレーニングを
      続けてしまうと、伸びないだけでなく怪我に繋がってしまいます。ベンチプレス100kgなどの
      目標を達成する近道は怪我をしないことです。私も怪我をしてトレーニングが出来ない日が
      あり、伸び悩みました。このwebページでは怪我防止をモットーに作成しております。
      是非ご活用ください！
    </p>
</div>
<!--カレンダー入れる-->

<br>
<br>
<br>
<p class="stretch">【ストレッチについて】<br>あまり知られていませんが、筋トレをする前に関節や筋肉を伸ばすようなストレッチは
筋トレの質を下げてしまいます。すべてのストレッチが悪いかというとそうではありません。
ここで言う悪いストレッチは「静的ストレッチ」のことです。静的ストレッチとは、筋肉を伸ばした状態で数十秒間キープするストレッチ方法です。
一方、動的ストレッチは、体を動かしながら筋肉をほぐしていく方法です。<br>
筋トレ前は静的ストレッチより動的ストレッチをするようにしましょう！！
ランニングでもかまいませんが、あまり長距離を走り過ぎると筋肉にも体にも逆効果になってしまう
ので注意しましょう！！</p>
<br>
<br>
<br>

<p class="protein">【プロテインのタイミングについて】<br>　筋トレをする上でプロテインやプロテインバーなどのタンパク質は欠かせません。
  しかし、プロテインを飲む「タイミング」を考えずにとりあえず飲んでいる人も多いと思います。では、いつ飲むべきかというと、
  運動後の45分以内です。このタイミングで飲むと筋肉に送られるアミノ酸が約3倍アップします。逆に激しい運動の後何も摂取しないと
  筋肉が収縮し分解してしまいます。つまり筋肉が減ってしまう可能性があります。体を大きくしたいと思ってる人は必ず運動後に
  プロテインを飲むようにしましょう！！<br>
  また、運動後に飲むプロテインは吸収が早いホエイプロテインがおすすめです。理由はすぐに筋肉にアミノ酸を送りたいためです。
  ソイプロテインのように吸収速度の遅いプロテインはカロリーが低く、食物繊維が含まれているのでダイエットに最適のプロテインです。
  自分に合ったプロテインを飲まないと筋トレ効率が悪くなってしまいます。
  目的に応じてプロテインを飲みましょう！
</p>


<br>
<br>
<br>
<p class="method">【筋トレの基礎知識】<br>筋トレをする前に押さえておいてほしい知識は負荷、回数、回復の3点についてです。
まず、負荷と回数はどの種目をするに当たっても10～15回を3セットできるくらいの重量にしましょう！最初はどうしても重い
重量を扱いたくなりますが、扱いきれない重量でトレーニングすると当然怪我の元です。筋肉に刺激を与えるために、
重量を変えることはいいことですが、フォームが安定してから負荷量を変える様にしましょう！<br>
次に回復についてです。回復は筋トレをする上でとっても大切です。知ってる人も多いと思いますが説明します。
筋肉は筋トレをすることによって筋細胞が破壊され、それを修復することで筋肉が大きくなります。
つまり、回復していない状態で筋トレをしても修復していない物をまた壊す行動と同じです。では、
どのくらいの休息が必要かというと2～3日です。（※これは部位によるので絶対的な数字ではありません。）
腹筋は1日空ければ十分回復しますが、胸筋や腕は2～3日空けるのが望ましいでしょう。
もっと詳しいサイトもいっぱいあるので、しっかり活用して効率よくトレーニングしましょう！！
</p>
</div>
<footer>
  <!--<p class="keika">前回の筋トレ経過日数</p>
    <p class="after_training">9/2のトレーニング</p>-->

    <br>
    <br>
    <br>
</footer>

  </body>
</html>
