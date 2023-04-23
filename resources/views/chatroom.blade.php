<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/DTD5pfzj" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>なりきりチャットルーム</title>
    <script src="main.js"></script>
    <style>
        .delete-button {
            background-color: gray;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<style>
  h2 {
    color: navy;
  }
</style>



<body>
  <section class="character-selection">
    <h2>★なりきりチャットルーム☆</h2>
    <div class="characters">
      <button class="character" data-character="ojousama" value="お嬢さま" data-image="https://i.postimg.cc/WDnsrfnY/image.png">
        <img src="https://i.postimg.cc/WDnsrfnY/image.png" alt="お嬢さま" style="width: 50px; margin-right: 10px;">
        <span>お嬢さま</span>
      </button>
      <button class="character" data-character="china-chan" value="チャイナちゃん" data-image="https://i.postimg.cc/680CbC1Q/image.png">
        <img src="https://i.postimg.cc/680CbC1Q/image.png" alt="チャイナちゃん" style="width: 50px; margin-right: 10px;">
        <span>チャイナちゃん</span>
      </button>
      <button class="character" data-character="nekketsu-daze" value="熱血だぜ君" data-image="https://i.postimg.cc/3yvX3W8M/image.png">
        <img src="https://i.postimg.cc/3yvX3W8M/image.png" alt="熱血だぜ君" style="width: 50px; margin-right: 10px;">
        <span>熱血だぜ君</span>
      </button>
      <button class="character" data-character="ponpoko-shi" value="ぽんぽこ氏" data-image="https://i.postimg.cc/qhB2ywcr/image.png">
        <img src="https://i.postimg.cc/qhB2ywcr/image.png" alt="ぽんぽこ氏" style="width: 50px; margin-right: 10px;">
        <span>ぽんぽこ氏</span>
      </button>
    </div>
  </section>
</body>


<section class="chat-room">
    <div class="messages" id="messages">
        <!-- メッセージはここに追加されます -->
        <img src="https://i.postimg.cc/WDnsrfnY/image.png" alt="お嬢さま" style="width: 50px; margin-right: 10px;">
        @foreach ($items as $item) 

        {{$item->character_name}}
        {{$item->message}}
        @endforeach  
    </div>
    <form id="message-form" class="message-form" action="{{ route('chatroom') }}" method="post">
        @csrf
        <input type="text" id="message-input" class="message-input" name="message" placeholder="メッセージを入力してください" required>
        <button type="submit" class="send-message">送信</button> 
    </form>
  </section>

  <template id="message-template">
    <div class="message" data-key="">
        <img src="" alt="" class="message-icon">
        <div class="message-author"></div>
        <div class="message-text"></div>
        <div class="message-time"></div>
        <button class="delete-message" hidden>削除</button>
    </div>
  </template>


<div class="character ojousama">
  <img src="https://i.postimg.cc/WDnsrfnY/image.png" alt="お嬢さま" class="character-image" data-character="お嬢さま">
  <p class="character-name">★お嬢さま</p>
  <p>・一人称「わたくし」</p>
  <p>・口癖「〜ですわ！」</p>
  <p>・みんなの引っ張り者</p>
</div>
<div class="character china-chan">
  <img src="https://i.postimg.cc/680CbC1Q/image.png" alt="チャイナちゃん" class="character-image" data-character="チャイナちゃん">
  <p class="character-name">☆チャイナちゃん</p>
  <p>・一人称「ぼく」</p>
  <p>・口が悪めの語尾「〜アル」</p>
  <p>・態度が大きい</p>
</div>
<div class="character nekketsu-daze">
  <img src="https://i.postimg.cc/3yvX3W8M/image.png" alt="熱血だぜ君" class="character-image" data-character="熱血だぜ君">
  <p class="character-name">★熱血だぜ君</p>
  <p>・一人称「俺」</p>
  <p>・口癖「〜だぜ！」</p>
  <p>・とにかくアツい男</p>
</div>
<div class="character ponpoko-shi">
  <img src="https://i.postimg.cc/qhB2ywcr/image.png" alt="ぽんぽこ氏" class="character-image" data-character="ぽんぽこ氏">
  <p class="character-name">☆ぽんぽこ氏</p>
  <p>・一人称「拙者」</p>
  <p>・喋り方は敬語</p>
  <p>・ちょっと頭がおかしい</p>
</div>


<template id="message-template">
    <div class="message">
        <img src="" alt="" class="message-icon">
        <div class="message-author"></div>
        <div class="message-text"></div>
        <div class="message-time"></div>
    </div>
</template>

 
<script>
// Firebaseの設定と初期化
var firebaseConfig = {
  // ここにFirebaseの設定情報を記入
};
firebase.initializeApp(firebaseConfig);

// Firebaseの参照を定義
const db = firebase.database();
const auth = firebase.auth();
const messagesRef = db.ref("messages");

// DOM要素を取得
const messageForm = document.getElementById("message-form");
const messageInput = document.getElementById("message-input");
const messages = document.getElementById("messages");
const messageTemplate = document.getElementById("message-template").content;

// 現在のユーザー情報
let currentUser = null;
const adminEmail = "admin@example.com";

// メッセージを削除する関数
const deleteMessage = (snapshot) => {
  messagesRef.child(snapshot.key).remove();
};

// メッセージを表示する関数
const showMessage = (snapshot) => {
  const data = snapshot.val();
  const messageElement = messageTemplate.cloneNode(true);
  messageElement.dataset.key = snapshot.key;
  const messageIcon = messageElement.querySelector(".message-icon");
  const messageAuthor = messageElement.querySelector(".message-author");
  const messageTime = messageElement.querySelector(".message-time");
  const messageText = messageElement.querySelector(".message-text");
  const deleteButton = messageElement.querySelector(".delete-message");

  messageIcon.src = data.character.image;
  messageIcon.alt = data.character.name;
  messageAuthor.textContent = data.character.name;
  messageTime.textContent = new Date(data.timestamp).toLocaleString();
  messageText.textContent = data.text;

  // 管理者にのみ削除ボタンを表示
  if (currentUser.email === adminEmail) {
    deleteButton.hidden = false;
    deleteButton.addEventListener("click", () => {
      deleteMessage(snapshot);
    });
  }

  messages.appendChild(messageElement);
  messages.scrollTop = messages.scrollHeight;
};

// メッセージを削除した時に表示を更新する関数
const removeMessage = (snapshot) => {
  const messageElements = messages.querySelectorAll(".message");
  messageElements.forEach((messageElement) => {
    if (messageElement.dataset.key === snapshot.key) {
      messageElement.remove();
    }
  });
};

// メッセージを送信する関数
const sendMessage = () => {
  // メッセージを送信する処理
  const newMessageRef = messagesRef.push();
  newMessageRef.set({
    character: currentUser,
    text: messageInput.value.trim(),
    timestamp: firebase.database.ServerValue.TIMESTAMP,
  });

  // 送信されたメッセージをローカルストレージに保存する
  const messages = JSON.parse(localStorage.getItem("messages") || "[]");
  messages.push({
    character: currentUser,
    text: messageInput.value.trim(),
    timestamp: new Date().getTime(),
  });
  localStorage.setItem("messages", JSON.stringify(messages));

  // メッセージをクリアする
  messageInput.value = "";
};

// ローカルストレージからメッセージを読み込む関数
const loadMessages = () => {
  const messages = JSON.parse(localStorage.getItem("messages") || "[]");
  messages.forEach(message) => {
    const messageElement = messageTemplate.cloneNode(true);
    const messageIcon = messageElement.querySelector(".message-icon");
    const messageAuthor = messageElement.querySelector(".message-author");
    const messageTime = messageElement.querySelector(".message-time");
    const messageText = messageElement.querySelector('.message-text');

messageIcon.src = data.character.image;
messageIcon.alt = data.character.name;
messageAuthor.textContent = data.character.name;
messageTime.textContent = new Date(data.timestamp).toLocaleString();
messageText.textContent = data.text;
  }
};
</script>
<p>
<a href="{{ route('character.index') }}">管理人用ページ</a></p>

</body>
</html>
