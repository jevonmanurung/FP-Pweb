<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS App</title>
  
  <title>{{ config('app.name', 'POS App') }}</title>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

   <!-- Scripts -->
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f2f5;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #3c3f47;
      position: fixed;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      color: #fff;
    }

    .sidebar h1 {
      font-size: 28px;
      text-align: center;
      padding: 20px 0;
      background-color: #24272b;
      margin: 0;
    }

    .nav {
      padding: 0;
    }

    .nav-link {
      display: block;
      font-size: 18px;
      padding: 15px 20px;
      margin: 10px 0;
      color: #d1d1d1;
      background-color: #3c3f47;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s;
    }

    .nav-link:hover {
      background-color: #555;
      transform: translateX(10px);
    }

    .profile {
      display: flex;
      align-items: center;
      padding: 20px;
      background-color: #3c3f47;
      border-radius: 0 0 8px 8px;
      margin-top: auto;
    }

    .profile-circle {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background-color: #fff;
      margin-right: 15px;
    }

    .logout-btn {
      margin-top: 20px;
      background-color: #f44336;
      padding: 12px;
      text-align: center;
      font-size: 18px;
      border-radius: 8px;
      color: white;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.2s ease-in-out;
    }

    .logout-btn:hover {
      background-color: #e53935;
      transform: translateY(-3px);
    }

    .logout-btn:active {
      transform: translateY(0);
    }

    .main-content {
      margin-left: 250px;
      padding: 30px;
      background-color: #f5f5f5;
      min-height: 100vh;
    }

  </style>
</head>
<body>
  <div class="sidebar d-flex flex-column">
    <h1>POS App</h1>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="/transactions" class="nav-link">Transactions</a>
      </li>
      <li class="nav-item">
        <a href="/view_product" class="nav-link">Products</a>
      </li>
    </ul>
    <div class="profile">
      <div class="profile-circle"></div>
      <a href="{{route('profile')}}" class="nav-link" style="font-size: 18px;">Profile</a>
    </div>
    <!-- Logout Button -->
    <a href="{{ route('logout') }}" method= "POST" class="logout-btn">Logout</a>
  </div>

  <div class="main-content">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
