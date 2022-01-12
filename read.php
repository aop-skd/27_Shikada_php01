<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"
    integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg=="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/styleread.css"> 
    <title>アンケート結果を表示する</title>
</head>
<body>

<!-- 以下PHPの記載 -->
    <?php
        //<できていないこと> オブジェクトをJSONで保存するが、出してくるときにオブジェクトに戻す方法
        // ファイルを開く 読み込むときはr
        $file = fopen('./data/data.txt', 'r');

        // 各項目ごとの配列を準備しておく（大配列）
        $ary_sex =[];
        $ary_age =[];
        $ary_member =[];

        // ファイル内容を1行ずつ読み込んで出力
        // While文はfor文みたいなもの。fgetsして取得できれば一行ずつ処理する。なくなったら終了する。
        while ($str = fgets($file)) {
            $str_base = nl2br($str);
            $ary_base = explode("/", $str_base);
            // 文字列を配列にする関数である。explode

            $ary_sex[]=$ary_base[1];
            $ary_age[]=$ary_base[2];
            $ary_member[]=$ary_base[3];
            $ary_member[]=$ary_base[4];
            $ary_member[]=$ary_base[5];
            // 大配列にpushして情報をまとめなおす
        };

        // 表示用のデータ
            // 男女の割合
            $count_sex = array_count_values($ary_sex);
            $all_sex = count($ary_sex)/100;
            $man_sex =$count_sex["man"]/$all_sex;
            $woman_sex =$count_sex["woman"]/$all_sex;

            // 年齢の割合
            $count_age = array_count_values($ary_age);
            $all_age = count($ary_age)/100;
            $ten_age =$count_age["ten"]/$all_age;
            $twenty_age =$count_age["twenty"]/$all_age;
            $thirty_age =$count_age["thirty"]/$all_age;
            $forty_age =$count_age["forty"]/$all_age;
            $fifty_age =$count_age["fifty"]/$all_age;
            $sixty_age =$count_age["sixty"]/$all_age;


            // メンバーの投票数の割合
            $count_member = array_count_values($ary_member);
            $all_member = count($ary_member)/100;
            $akimoto = $count_member["akimoto"]/$all_member;
            $ikuta = $count_member["ikuta"]/$all_member;
            $iwamoto = $count_member["iwamoto"]/$all_member;
            $umezawa = $count_member["umezawa"]/$all_member;
            $endo = $count_member["endo"]/$all_member;
            $kaki =$count_member["kaki"]/$all_member;
            $kakehashi = $count_member["kakehashi"]/$all_member;
            $kitano = $count_member["kitano"]/$all_member;
            $kubo = $count_member["kubo"]/$all_member;
            $saito = $count_member["saito"]/$all_member;
            $shinuchi = $count_member["shinuchi"]/$all_member;
            $suzuki = $count_member["suzuki"]/$all_member;
            $seimiya = $count_member["seimiya"]/$all_member;
            $takayama = $count_member["takayama"]/$all_member;
            $tamura = $count_member["tamura"]/$all_member;
            $tsutsui = $count_member["tsutsui"]/$all_member;
            $hayakawa = $count_member["hayakawa"]/$all_member;
            $higuchi = $count_member["higuchi"]/$all_member;
            $hoshino = $count_member["hoshino"]/$all_member;
            $yamashita = $count_member["yamashita"]/$all_member;
            $yoda = $count_member["yoda"]/$all_member;


            // var_dump($ary_ninki);

        
        // ファイルを閉じる
        fclose($file);
    ?>

    <div class="maintable">
        <h1>アンケート結果</h1>

        <!-- データの表示 -->
        <h2>性別データ</h2>
        <canvas id="myDoughnutChart1" width="2400" height="2400" style="display: block; box-sizing: border-box; height: 600px; width: 600px;"></canvas>
        <h2>年齢データ</h2>
        <canvas id="myDoughnutChart2" width="2400" height="2400" style="display: block; box-sizing: border-box; height: 600px; width: 600px;"></canvas>
        <h2>メンバー別投票割合（％）</h2>
        <canvas id="myBarChart"></canvas>

      <div class="back">
        <a href="http://localhost/27_shikada_php01/post.php">投票画面に戻る</a>
      </div>
      </div>

<script>
// 男女の割合を表示するグラフ
  const ctx = document.getElementById("myDoughnutChart1");
  ctx.setAttribute( "width", 600);
  const myDoughnutChart= new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["男性", "女性"], //データ項目のラベル
      datasets: [{
          backgroundColor:[
              "#bbbcde",
              "#c97586"],
          data: [<?= $man_sex ?>,
          <?= $woman_sex ?>] //グラフのデータ
      }]
    },
    options: {
      title: {
        display: true,
        //グラフタイトル
        text: '男女別投票率'
      }
    }
  });

// 年齢の割合を表示するグラフ
    const ctx2 = document.getElementById("myDoughnutChart2");
    ctx2.setAttribute( "width", 600 );
    const myDoughnutChart2= new Chart(ctx2, {
        type: 'doughnut',
        data: {
        labels: ["10代", "20代","30代","40代","50代","60代以上",], //データ項目のラベル
        datasets: [{
            backgroundColor: [
                "#FFA69E",
                "#FAF3DD",
                "#B8F2E6",
                "#AED9E0",
                "#5E6472",
                "#424B54"
            ],

            data: [<?= $ten_age ?>,
            <?= $twenty_age ?>,
            <?= $thirty_age ?>,
            <?= $forty_age ?>,
            <?= $fifty_age ?>,
            <?= $sixty_age ?>]
            //グラフのデータ
        }]
        },
        options: {
        title: {
            display: true,
            //グラフタイトル
            text: '年齢別投票率'
        }
        }
    });

// 人気度合いを表示するグラフ
  const ctx3 = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx3, {
    type: 'bar',
    data: {
     //凡例のラベル
      labels: ['akimoto', 'ikuta', 'iwamoto', 'umezawa', 'endo',
      'kaki', 'kakehashi', 'kitano', 'kubo',
      'saito', 'shinuchi', 'suzuki', 'seimiya',
      'takayama', 'tamura', 'tsutsui', 'hayakawa',
      'higuchi', 'hoshino', 'yamashita', 'yoda'],
      datasets: [{
            label:"投票割合",
            backgroundColor: [
                "#B7A8CC"
            ],

            data: 
            [<?= $akimoto ?>, <?= $ikuta ?>, <?= $iwamoto ?>, <?= $umezawa ?>,
            <?= $endo ?>, <?= $kaki ?>, <?= $kakehashi?>, <?= $kitano ?>,
            <?= $kubo?>,<?= $saito ?>,<?= $shinuchi ?>,<?= $suzuki ?>,
            <?= $seimiya ?>, <?= $takayama ?>, <?= $tamura ?>,<?= $tsutsui ?>,
            <?= $hayakawa ?>,<?= $higuchi ?>,<?= $hoshino ?>,<?= $yamashita ?>,<?= $yoda ?>]
            //グラフのデータ
        }]
    },
    options: {
      title: {
        display: true,
        //グラフタイトル
        text: '人気ランキング'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 250, //最大値
            suggestedMin: 0, //最小値
            stepSize: 50, //縦ラベルの数値単位
            }
        }]
      },
    }
  });

</script>
    
</body>
</html>