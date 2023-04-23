document.addEventListener('DOMContentLoaded', () => {
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messages = document.getElementById('messages');
    const messageTemplate = document.getElementById('message-template').content;
  
    let selectedCharacter = '';
    let selectedCharacterImage = '';
  
    document.querySelectorAll('.character').forEach((button) => {
      button.addEventListener('click', () => {
        selectedCharacter = button.dataset.character;
        selectedCharacterImage = button.dataset.image;
        document.querySelectorAll('.character').forEach((button) => {
          button.classList.remove('selected');
        });
        button.classList.add('selected');
      });
    });
  
    messageForm.addEventListener('submit', (event) => {
      event.preventDefault();
  
      if (!selectedCharacter) {
        alert('キャラクターを選択してね！');
        return;
      }
  
      const messageText = messageInput.value.trim();
      if (!messageText) {
        return;
      }
  
      const now = new Date();
      const timeString = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0');
  
      const newMessage = messageTemplate.cloneNode(true);
      newMessage.querySelector('.message-author').textContent = selectedCharacter;
      newMessage.querySelector('.message-time').textContent = timeString;
      newMessage.querySelector('.message-text').textContent = messageText;
      newMessage.querySelector('.message-icon').src = selectedCharacterImage;
      messages.appendChild(newMessage);
  
      messageInput.value = '';
    });
  });
// メッセージを送信
messageForm.addEventListener("submit", (e) => {
    e.preventDefault();
    if (messageInput.value.trim() === "") return;

    const newMessageRef = messagesRef.push();
    newMessageRef.set({
        character: {
            name: selectedCharacter,
            image: selectedCharacterImage,
        },
        text: messageInput.value.trim(),
        timestamp: firebase.database.ServerValue.TIMESTAMP,
    });

    // メッセージをクリア
    messageInput.value = "";
});

// メッセージを表示
messagesRef.on("child_added", (snapshot) => {
  const data = snapshot.val();
  const messageElement = messageTemplate.cloneNode(true);
  const messageIcon = messageElement.querySelector(".message-icon");
  const messageAuthor = messageElement.querySelector(".message-author");
  const messageTime = messageElement.querySelector(".message-time");
  const messageText = messageElement.querySelector(".message-text");
  // いいねボタン要素を追加
  const likeButton = messageElement.querySelector(".like-button");

  messageIcon.src = data.character.image;
  messageIcon.alt = data.character.name;
  messageAuthor.textContent = data.character.name;
  messageTime.textContent = new Date(data.timestamp).toLocaleString();
  messageText.textContent = data.text;

  // いいね機能のイベントリスナーを追加
  likeButton.addEventListener('click', function(event) {
    event.preventDefault();
    event.target.classList.toggle('clicked');
    // いいね数を更新
    const likeCount = parseInt(event.target.textContent.split(' ')[1]);
    event.target.textContent = `👍 ${event.target.classList.contains('clicked') ? likeCount + 1 : likeCount - 1}`;
  });

  messages.appendChild(messageElement);
  messages.scrollTop = messages.scrollHeight;
});




function sendMessage() {
  const character = characters.find((c) => c.name === selectedCharacter);
  const text = messageInput.value;

  if (!text.trim()) {
    return;
  }

  // メッセージをデータベースに追加
  messagesRef.push({
    character: character,
    text: text,
    timestamp: Date.now(),
  });

  // メッセージ要素を作成
  const messageElement = messageTemplate.cloneNode(true);
  const messageIcon = messageElement.querySelector(".message-icon");
  const messageAuthor = messageElement.querySelector(".message-author");
  const messageTime = messageElement.querySelector(".message-time");
  const messageText = messageElement.querySelector(".message-text");
  // いいねボタン要素を追加
  const likeButton = messageElement.querySelector(".like-button");

  messageIcon.src = character.image;
  messageIcon.alt = character.name;
  messageAuthor.textContent = character.name;
  messageTime.textContent = new Date().toLocaleString();
  messageText.textContent = text;

  // いいね機能のイベントリスナーを追加
  likeButton.addEventListener('click', function(event) {
    event.preventDefault();
    event.target.classList.toggle('clicked');
    // いいね数を更新
    const likeCount = parseInt(event.target.textContent.split(' ')[1]);
    event.target.textContent = `👍 ${event.target.classList.contains('clicked') ? likeCount + 1 : likeCount - 1}`;
  });

  // メッセージ要素を追加
  messages.appendChild(messageElement);
  messages.scrollTop = messages.scrollHeight;

  // メッセージ入力欄をクリア
  messageInput.value = "";
}



// 登録完了メッセージを表示する関数
function showRegistrationSuccessMessage() {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const registrationSuccess = urlParams.get('registration_success');

  if (registrationSuccess === 'true') {
    const messageContainer = document.createElement('div');
    messageContainer.classList.add('alert', 'alert-success', 'text-center', 'mt-3');
    messageContainer.textContent = '登録完了しました';

    const container = document.querySelector('.container');
    container.insertBefore(messageContainer, container.firstChild);
  }
}

// ページが読み込まれたときに、登録完了メッセージを表示する関数を呼び出す
document.addEventListener('DOMContentLoaded', showRegistrationSuccessMessage);

