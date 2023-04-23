<!DOCTYPE html>
<html lang="ja">
<head>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/DTD5pfzj" crossorigin="anonymous">

  <script src="{{ asset('js/main.js') }}"></script>

  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;YY
      justify-content: center;
    }
    .form-container {
      background: #f8f9fa;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      box-shadow: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5">
        <h2 class="text-center mb-4">新規登録</h2>
        <!-- フラッシュメッセージの表示 -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('register.store') }}" method="post">
          @csrf
          <input type="hidden" name="database" value="narikiri">
          <input type="hidden" name="table" value="register">
          <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">パスワード（再入力）</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">ユーザー種別</label>
            <select class="form-control" id="role" name="role" required>
              <option value="" selected disabled>選択してください</option>
              <option value="admin">管理者</option>
              <option value="general">一般ユーザー</option>
</select>
</div>
<button type="submit" class="btn btn-primary w-100 mb-3" name="register_button">登録</button>
<input type="hidden" name="registration_success" value="true">
</form>
<div class="text-center">
<a href="login" class="btn btn-link">ログイン画面へ</a>
</div>
</div>
</div>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7mqnrzagDzAX7yzlhkJJ3Azy3zD5F5e/cP5e5V5jn5gD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
  <script>


