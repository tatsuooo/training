<!DOCTYPE HTML>
<html>
  <head>
    <div class="box5">
    <title>足トレ画面</title>
</div>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('js/app.js') }}" defer></script>
  <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <title>@yield('title') -足トレ画面</title>
   <meta name="description" content="@yield('description')">
   <link rel="dns-prefetch" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/ashimenu.css') }}" rel="stylesheet">

  </head>
  <body>
<header>
      <h5>タイマー</h5>
  <form>
			<input id="counter" name="counter" type="text" value="00:00:00:00">
			<input id="btnStart" name="btnStart" type="button" value="start">
			<input id="btnReset" name="btnReset" type="button" value="reset">
		</form>
<script>
//タイマー
$(function(){
	reset_timer();

	var timer;
	var timerID;
	var timerFlag = 0;	// 0:停止 1:動作

	// スタート(ストップ)ボタンのクリックイベント
	$("#btnStart").on("click", function(){
		if(timerFlag === 0){
			start_count();
		}else{
			stop_count();
		}
	});

	// リセットボタンのクリックイベント
	$("#btnReset").on("click", function(){
		reset_timer();
	});

	// リセット
	function reset_timer() {
		if(timerFlag === 1){
			stop_count();
		}
		timer = 0;
		$("#counter").val("00:00:00:00");
	}

	// スタート
	function start_count() {
		$("#btnStart").val("stop");
		timerFlag = 1;
		timerID = setInterval(count_up, 10);
	}

	// ストップ
	function stop_count() {
		$("#btnStart").val("start");
		timerFlag = 0;
		clearInterval(timerID);
	}

	// 10ミリ秒単位でカウントアップする
	function count_up() {
		++timer;
		var formatTimer = counter_format(timer);
		$("#counter").val(formatTimer);
	}

	// 時間の経過を時：分：秒：10ミリ秒で表す
	function counter_format(num) {
		var numZan = num;	// 残りの時間(10ミリ秒単位)
		// 時を計算：100で割って秒、60秒で割り分に、さらに60分で割り残りを切り捨てで時に
		var hh = Math.floor(numZan / (100 * 60 * 60));
		// numの残り：取得した時の部分を10ミリ秒単位にして除く、
		numZan = numZan - (hh * 100 * 60 * 60);
		// 分を計算：残り時間を100で割って秒、60秒で割り残りを切り捨てて分に
		var mm = Math.floor(numZan / (100 * 60));
		// numの残り：取得した分の部分を10ミリ秒単位にして除く、
		numZan = numZan -(mm * 100 * 60);
		// 秒を計算：残り時間を100で割り残りを切り捨てて秒に
		var ss = Math.floor(numZan / 100);
		// 最後の残りが10ミリ秒部分
		numZan = numZan - (ss * 100);
		var ms = numZan;

		// 見やすいように二桁表示に
		if(hh < 10){hh = "0" + hh;}
		if(mm < 10){mm = "0" + mm;}
		if(ss < 10){ss = "0" + ss;}
		if(ms < 10){ms = "0" + ms;}
		return hh + ":" + mm + ":" + ss + ":" + ms;
	}
});
</script>
</header>
@yield('content')
<table class="menu" align="center" border="5" bordercolor="red">
<h4 align="center">足トレ画面</h4>
  <tr class="option" align="center">
    <th width="220">種目名</th>
    <th width="100"> 回数</th>
    <th width="180">重量</th>
    <th width="180">休憩時間</th>
    <th width="100" align="center">option</th>
    </tr>
    <tr class="menu1">
      <td>自重スクワット</td>
      <td>20回</td>
      <td>自重</td>
      <td>1分</td>
      <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
      </tr>
      <tr class="menu2">
        <td>ランジ</td>
        <td>15回</td>
        <td>自重</td>
        <td>1分</td>
        <td> <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
        </tr>
        <tr class="menu3">
          <td>バックキック</td>
          <td>15回</td>
          <td>自重</td>
          <td>1分</td>
          <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
          </tr>
          <tr class="menu3">
            <td>ヒップリフト</td>
            <td>15回</td>
            <td>自重</td>
            <td>1分</td>
            <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>

          </table>
          <br>
              <br>
                  <br>
                    <div class="box21">
      <h5><li>
足トレをするメリットは体全体のバランスが良くなり、痩せやすい体をつくることができます。
しかし、足トレはやったからと言ってあからさまに変化すると言うわけではないのでつい
サボりがちになる部位だと思います。足の筋肉は体全体の70％もの筋肉量があるので放っておく
のはもったいなく感じます。下半身がしっかりしていると上半身のトレーニングをする時も
扱える重量が上がり、体全体の筋肥大も期待できます。
</li></h5>
                      <br>
                      <br>
                          <br>
                              <br>
                                  <br>
<footer>

    <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success">ホーム画面に戻る</button></a>
    <br>
        <br>
          <br>

  </footer>
  </body>
</html>
