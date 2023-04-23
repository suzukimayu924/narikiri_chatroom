<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
    <title>キャラクター管理画面</title>
    <!-- CSSフレームワーク（Bootstrap）の読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>


<body>
<div class="container mt-5">
    <h1>キャラクター管理画面</h1>
    @if(Auth::check() && Auth::user()->name == 'admin')
    <a href="#" class="btn btn-primary">管理人用ページ</a>
    @endif
    <a href="#" class="btn btn-primary">キャラクター追加</a>
    <div class="row mt-4">
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card" id="card-1">
                <img src="https://i.postimg.cc/WDnsrfnY/image.png" class="card-img-top" alt="お嬢さま">
                <div class="card-body">
                    <h5 class="card-title">お嬢さま</h5>
                    <p class="card-text">  <p>・一人称「わたくし」</p>
  <p>・口癖「〜ですわ！」</p>
  <p>・みんなの引っ張り者</p>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#commentModal1">編集</a>
                    <button type="button" class="btn btn-danger" data-character-id="1">削除</button>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card" id="card-2">
                <img src="https://i.postimg.cc/680CbC1Q/image.png" class="card-img-top" alt="チャイナちゃん">
                <div class="card-body">
                    <h5 class="card-title">チャイナちゃん</h5>
                    <p class="card-text"> ・一人称「ぼく」</p>
  <p>・口が悪めの語尾「〜アル」</p>
  <p>・態度が大きい</p>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#commentModal2">編集</a>
                    <button type="button" class="btn btn-danger" data-character-id="2">削除</button>
                    </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card" id="card-3">
            <img src="https://i.postimg.cc/3yvX3W8M/image.png" class="card-img-top" alt="熱血だぜ君">
            <div class="card-body">
                <h5 class="card-title">熱血だぜ君</h5>
                <p class="card-text">・一人称「俺」</p>
  <p>・口癖「〜だぜ！」</p>
  <p>・とにかくアツい男</p>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#commentModal3">編集</a>
                <button type="button" class="btn btn-danger" data-character-id="3">削除</button>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card" id="card-4">
            <img src="https://i.postimg.cc/qhB2ywcr/image.png" class="card-img-top" alt="ぽんぽこ氏">
            <div class="card-body">
                <h5 class="card-title">ぽんぽこ氏</h5>
                <p class="card-text">・一人称「拙者」</p>
  <p>・喋り方は敬語</p>
  <p>・ちょっと頭がおかしい</p>
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#commentModal4">編集</a>
                <button type="button" class="btn btn-danger" data-character-id="4">削除</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
let targetCard;

document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".btn-danger");

  deleteButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
      const characterId = this.getAttribute("data-character-id");
      targetCard = document.getElementById(`card-${characterId}`);

      targetCard.addEventListener("transitionend", function () {
        targetCard.remove();
      });

      targetCard.classList.add("card-fade-out");
    });
  });
});
</script>

<a href="{{ route('index') }}" class="btn btn-primary">トップページに戻る</a>


</body>
</html>
