<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>パスワード再設定</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/DTD5pfzj" crossorigin="anonymous">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
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
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5">
        <h2 class="text-center mb-4">パスワード再設定</h2>


        <form action="{{ route('password.reset') }}" method="POST">
          <!-- フラッシュメッセージ -->
          @if (session('success') || $errors->any())
    <div class="alert {{ $errors->any() ? 'alert-danger' : 'alert-success' }}" role="alert">
      @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif
    </div>
  @endif
  @csrf
          <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">新しいパスワード</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">新しいパスワード（再入力）</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">登録</button>
        </form>
        <div class="text-center">
          <a href="login" class="btn btn-link">ログイン画面へ</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
