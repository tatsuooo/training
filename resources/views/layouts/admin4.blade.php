<!DOCTYPE HTML>
<html>
  <head>
    <title>腹筋画面</title>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="{{ asset('js/app.js') }}" defer></script>
  <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>

  <title>@yield('title') -腹筋画面</title>
   <meta name="description" content="@yield('description')">
   <link rel="dns-prefetch" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/haramenu.css') }}" rel="stylesheet">

  </head>
  <body>
    <div class="gamen1" align="center">腹トレ画面</div><br><br>
  <div class="box5"></div>
<header>
    <h5>タイマー</h5>
  <form>
			<input id="counter" name="counter" type="text" value="00:00:00:00">  <br><br>
			<input id="btnStart" name="btnStart" type="button" value="スタート">
			<input id="btnReset" name="btnReset" type="button" value="リセット">
		</form>
<script>

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
		$("#btnStart").val("ストップ");
		timerFlag = 1;
		timerID = setInterval(count_up, 10);
	}

	// ストップ
	function stop_count() {
		$("#btnStart").val("スタート");
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
<table class="table table-success table-striped table-hover" align="center" border="2" bordercolor="red">
<div class="gamen" align="center">【胸トレメニュー】</div><br><br>
<thead class="thead-dark">
  <tr class="option" align="center">
    <th width="220" scope="col">種目名</th>
    <th width="100" scope="col"> 回数（秒数）</th>
    <th width="180" scope="col">重量</th>
    <th width="180" scope="col">休憩時間</th>
    <th width="100" scope="col">option</th>
    </tr>
      </thead>
    <tr class="menu1">
      <th  scope="row">プランク</td>
      <td>30秒</td>
      <td>自重</td>
      <td>30秒～1分</td>
      <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
      </tr>
      <tr class="menu2">
        <th  scope="row">クランチ</td>
        <td>30回</td>
        <td>自重</td>
        <td>30秒</td>
        <td> <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
        </tr>
        <tr class="menu3">
          <th  scope="row">アブドミナル</td>
          <td>10回</td>
          <td>50kg~</td>
          <td>30秒</td>
          <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
          </tr>
          <tr class="menu3">
            <th  scope="row">ドラゴンフラッグ</td>
            <td>8~10回</td>
            <td>自重</td>
            <td>1分</td>
  <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>

            <tr class="menu3">
              <th  scope="row">足上げ腹筋</td>
              <td>8~10回</td>
              <td>自重</td>
              <td>1分</td>
              <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>
              <tr class="menu3">
                <th  scope="row">足上げ腹筋（キープ）</td>
                <td>1分</td>
                <td>自重</td>
                <td>1分</td>
                <td>  <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success" align="center">詳細</button></a></td>

          </table>
          <br>
              <br>
                  <br>
                    <div class="box21">
      <div class="setu"><li>
      腹筋を鍛えることは「体幹」を鍛えるということなのであらゆる動作が安定して
      行うことができます。それだけ？と思うかもしれませんがスポーツをする人は
      言うまでもなく重要になります。体幹がないとサッカーやバスケのようなフィジカル
      スポーツで不利になってしまいます。また他の部位をトレーニングする時にも体幹が
      ないとフォームが崩れやすいので、腹筋は筋トレの基本になります。

                        </li>
                      </div>
                    </div>
                        <img src="
                        https://4.bp.blogspot.com/-skyuBgZ0hdk/Vkb_BCNX9EI/AAAAAAAA0ZI/4l2wDyD-RP4/s800/fukkin_woman.png" alt="Branding Engineerのロゴ" class="gazou">
                        <br>
                        <br>
                            <br>
                                <br>
                                    <br>
<footer>

    <a href="http://localhost:8000/admin/tra/calender"><button type="button" class="btn btn-success">ホーム画面に戻る</button></a>
    <br>
  </footer>
  <br>
      <br>
  </body>
</html>
