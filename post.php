<!-- データをPOSTする画面。 -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/stylepost.css"> 
    <title>アンケートページ</title>
</head>
<body>
<div class="maintable">
    <div class="logo">
        <img src="./image/logo_nogi.png" alt="nogizakalogo">
    </div>

    <h1>すきなメンバーを回答してください（３人まで）</h1>


    <form action="write.php" method="post">
        <div class="question">
            <div class="questiontitle">
                お名前:
            </div>
            <div>
                <input type="text" name="namae" required>
            </div>
        </div>

        <div class="question">
            <div class="questiontitle">
                性別:
            </div>
            <div>
                <input type="radio" name="sex" value="man">男性
                <input type="radio" name="sex" value="woman">女性
            </div>
        </div>

        <div class="question">
            <div class="questiontitle">
                年齢:
            </div>
            <div>
                <input type="radio" name="age" value="ten">10代
                <input type="radio" name="age" value="twenty">20代
                <input type="radio" name="age" value="thirty">30代
                <input type="radio" name="age" value="forty">40代
                <input type="radio" name="age" value="fifty">50代
                <input type="radio" name="age" value="sixty">60代以上
            </div>
        </div>

        <div class="selectAnswer">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="akimoto"><img src="https://www.nogizaka46.com/smph/member/img/akimotomanatsu_list.jpg?v2" alt="akimoto">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="ikuta"><img src="https://www.nogizaka46.com/smph/member/img/ikutaerika_list.jpg?v2" alt="ikuta">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="iwamoto"><img src="https://www.nogizaka46.com/smph/member/img/iwamotorenka_list.jpg?v2" alt="iwamoto">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="umezawa"><img src="https://www.nogizaka46.com/smph/member/img/umezawaminami_list.jpg?v2" alt="umezawa">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="endo"><img src="https://www.nogizaka46.com/smph/member/img/endousakura_list.jpg?v2" alt="endo">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="kaki"><img src="https://www.nogizaka46.com/smph/member/img/kakiharuka_list.jpg?v2" alt="kaki">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="kakehashi"><img src="https://www.nogizaka46.com/smph/member/img/kakehashisayaka_list.jpg?v2" alt="kakehashi">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="kitano"><img src="https://www.nogizaka46.com/smph/member/img/kitanohinako_list.jpg?v2" alt="kitano">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="kubo"><img src="https://www.nogizaka46.com/smph/member/img/kuboshiori_list.jpg?v2" alt="kubo">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="saito"><img src="https://www.nogizaka46.com/smph/member/img/saitouasuka_list.jpg?v2" alt="saito">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="shinuchi"><img src="https://www.nogizaka46.com/smph/member/img/shinuchimai_list.jpg?v2" alt="shinuchi">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="suzuki"><img src="https://www.nogizaka46.com/smph/member/img/suzukiayane_list.jpg?v2" alt="suzuki">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="seimiya"><img src="https://www.nogizaka46.com/smph/member/img/seimiyarei_list.jpg?v2" alt="seimiya">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="takayama"><img src="https://www.nogizaka46.com/smph/member/img/takayamakazumi_list.jpg?v2" alt="takayama">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="tamura"><img src="https://www.nogizaka46.com/smph/member/img/tamuramayu_list.jpg?v2" alt="tamura">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="tsutsui"><img src="https://www.nogizaka46.com/smph/member/img/tsutsuiayame_list.jpg?v2" alt="tsutsui">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="hayakawa"><img src="https://www.nogizaka46.com/smph/member/img/hayakawaseira_list.jpg?v2" alt="hayakawa">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="higuchi"><img src="https://www.nogizaka46.com/smph/member/img/higuchihina_list.jpg?v2" alt="higuchi">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="hoshino"><img src="https://www.nogizaka46.com/smph/member/img/hoshinominami_list.jpg?v2" alt="hoshino">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="yamashita"><img src="https://www.nogizaka46.com/smph/member/img/yamashitamizuki_list.jpg?v2" alt="yamashita">
            <input  class="memberSelect" type = "checkbox" name= "member[]" value="yoda"><img src="https://www.nogizaka46.com/smph/member/img/yodayuuki_list.jpg?v2" alt="yoda">
        </div>
            <input type="submit" value="送信" class="submitbutton">
        
    
        </form>

</div>




    <!-- 以下JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function () {
        $('.memberSelect').click(function() {
            const checked_length = $('.memberSelect:checked').length;

            // 選択上限は3つまで
            if (checked_length >= 3) {
            $('.memberSelect:not(:checked)').prop('disabled', true);
            } else {
            $('memberSelect:not(:checked)').prop('disabled', false);
            }
        });
        });

    </script>


</body>
</html>