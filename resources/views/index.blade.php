<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>なりきりチャット</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/DTD5pfzj" crossorigin="anonymous">
  <link href="../css/style.css" rel="stylesheet">
  <style>
  .login-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    color: white;
    background-color: grey;
  }

  .shadow {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }



  .stylish-btn {
    background-color: pink;
    border: none;
    color: white;
    padding: 20px 50px;
    font-size: 24px;
    border-radius: 50px;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 500px;
  }

  .stylish-btn:hover {
    background-color: pink;
    transform: scale(1.05);
  }

  .stylish-btn:active {
    background-color: pink;
    transform: scale(0.95);
  }

  .custom-alert {
  background-color: #00d1b2;
  border-radius: 5px;
  color: #ffffff;
  font-weight: bold;
  padding: 10px 20px;
  position: fixed;
  top: 20px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1050;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
  display: inline-flex;
  align-items: center;
  gap: 10px;
}

  </style>
</head>
<body>
  <header>
    <h1>★なりきりチャットルーム☆</h1>
    <a href="/login" class="btn btn-primary login-btn">ログイン/新規登録</a>
  </header>

  @if (session('success'))
<div class="custom-alert alert-dismissible" role="alert">
  <span>{{ session('success') }}</span>
</div>
@endif


<!-- ルール & 説明 -->
<div class="row mt-5">
  <div class="col-md-8 offset-md-2">
    <div class="rules-container bg-light p-5 rounded shadow">
      <h2 class="rules-title text-center mb-4 display-5">なりきりチャットルール＆説明</h2>
      <p class="rule fs-4"><span class="rule-number fw-bold">1.</span> 参加するにはログインしてください。</p>
      <p class="rule fs-4"><span class="rule-number fw-bold">2.</span> 荒らし行為をした場合アカウントが削除されます。</p>
      <p class="rule fs-4"><span class="rule-number fw-bold">3.</span> ログイン後、チャットルームへ行きキャラクターを選んだら、なりきっておしゃべりを楽しんでね！</p>
    </div>
  </div>
</div>
<div class="like-container text-center mt-4">
    <p>▼面白かったらいいね押してね！</p>
    <button id="like-button" class="btn btn-primary">いいね <span id="like-count">0</span></button>
  </div>

<div class="button_solid006">
  <a href="chatroom">チャットルームへ</a>
</div>

</div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const likeButton = document.getElementById('like-button');
      const likeCount = document.getElementById('like-count');
      let count = 0;

      likeButton.addEventListener('click', () => {
        count++;
        likeCount.textContent = count;
      });
    });
  </script>
</body>
</html>


<img src="https://i.postimg.cc/QBZ8M4Jf/image.png" alt="吹き出し1" style="width: 320px; margin-left: 80px;" >
<img src="https://i.postimg.cc/QFLT1rgD/image.png" alt="吹き出し2" style="width: 300px; margin-left: 630px; margin-bottom: 30px;" >