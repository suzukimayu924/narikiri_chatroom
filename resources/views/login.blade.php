<!DOCTYPE html>
<html lang="ja">
<head>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
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
<body>
  @if (session('success'))
  <div class="custom-alert alert-dismissible" role="alert">
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <!-- 他のコード -->
</body>

  <!-- 他のコード -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto mt-5">
        <div class="form-container">
          <h2 class="text-center mb-4">ログイン</h2>
         
          <form action="{{ route('login.authenticate') }}" method="post">

            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">メールアドレス</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">パスワード</label>

              
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">ログイン</button>
            @if ($errors->any())
              <div class="alert alert-danger">
                {{ $errors->first() }}
              </div>
            @endif
          </form>
          <div class="d-flex justify-content-between">
            <a href="forgot-password" class="btn btn-link">パスワードを忘れた方</a>
            <a href="register" class="btn btn-link">新規登録</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7RmALrLwG7rEEFgnw5W5W8NQl5z7/5ytj2lL7b8Mzab6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>
