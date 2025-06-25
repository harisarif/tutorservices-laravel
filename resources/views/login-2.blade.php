<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      display: flex;
      height: 100vh;
    }

    .container {
      display: flex;
      width: 100%;
    }

    .left-panel,
    .right-panel {
      flex: 1;
      padding: 60px 250px;
    }

    .left-panel {
      background-color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left-panel h2 {
      font-size: 30px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .left-panel p {
      color: #6c6c6c;
      margin-bottom: 30px;
      font-size: 18px;
    }

    .form-group {
      display: flex;
      align-items: center;
      border: 1px solid #f5f5f5;
      border-radius: 8px;
      padding: 14px 16px;
      margin-bottom: 16px;
      background: #f5f5f5;
    }

    .form-group input {
      border: none;
      outline: none;
      width: 100%;
      background: #f5f5f5;
      font-size: 14px;
      margin-left: 10px;
    }

    .form-group img {
      width: 20px;
      height: 20px;
    }

    .login-button {
      width: 100%;
      padding: 17px;
      background-color: #28b463;
      color: white;
      font-weight: 400;
      border: none;
      border-radius: 8px;
      margin-bottom: 30px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      font-size: 18px;
    }

    .divider {
      text-align: center;
      color: #999;
      margin-bottom: 20px;
    }

    .social-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 12px;
      background-color: #fff;
      font-weight: 400;
      cursor: pointer;
    }

    .social-btn img {
      width: 28px;
      margin-right: 10px;
    }

    .right-panel {
        background-image: url(../images/Rectangle4.png);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: white;
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 30px;
      padding: 36px;
      text-align: center;
      width: 100%;
      position: relative;
      border: 2px solid #ffffff52;
      min-height: 500px;
      position: relative;
      /* overflow: hidden; */
    }

    .card h3 {
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #fff;
      text-align: left;
    }

    .card img {
      width: 64%;
      border-radius: 12px;
      position: absolute;
      bottom: 0;
      right: 16px;
    }

    .icon-badge {
      position: absolute;
      left: -20px;
      top: 75%;
      transform: translateY(-75%);
      /* background-color: white; */
      /* padding: 10px; */
      border-radius: 50%;
      /* box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); */
    }

    .icon-badge img {
      width: 24px;
      position: relative;
      width: 100%;
    }

    .close-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 24px;
      color: white;
      cursor: pointer;
    }

    .close-btn:hover {
      color: #28b463;
    }



    @media(max-width: 1850px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 220px;
      }
    }

    @media(max-width: 1650px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 190px;
      }
    }

    @media(max-width: 1650px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 160px;
      }
    }

    @media(max-width: 1380px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 140px;
      }

      .card {
        min-height: 480px;
      }
    }

    @media(max-width: 1260px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 110px;
      }


      .card {
        min-height: 460px;
      }
    }

    @media(max-width: 1192px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 85px;
      }

    }

    @media(max-width: 1092px) {

      .left-panel,
      .right-panel {
        flex: 1;
        padding: 60px 60px;
      }

      .left-panel h2 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
      }

      .left-panel p {
        color: #6c6c6c;
        margin-bottom: 30px;
        font-size: 16px;
      }

    }

    @media(max-width: 960px) {

      .left-panel {
        padding: 24px;
        max-width: 500px;
        margin: 0 auto;
      }

      .right-panel {
        display: none;
      }

    }

    @media(max-width: 560px) {
      .left-panel h2 {
        font-size: 20px;
      }

      .left-panel p {
        font-size: 14px;
      }

      .login-button {
        padding: 13px;
        font-size: 16px;
      }

      .social-btn {
        padding: 8px;
        font-size: 14px;
      }

      .social-btn img{
        width: 24px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="left-panel">
      <h2>LOGIN YOUR ACCOUNT</h2>
      <p>How to i get started lorem ipsum dolor at?</p>
      <div class="form-group">
        <img src="{{ asset('images/formkit_email.png') }}" alt="email icon" />
        <input type="email" placeholder="Email Address" />
      </div>
      <div class="form-group">
        <img src="{{ asset('images/Frame.png') }}" alt="password icon" />
        <input type="password" placeholder="Password" />
      </div>
      <button class="login-button">Login</button>
      <div class="divider">Login with Others</div>
      <div class="social-btn">
        <img src="https://img.icons8.com/color/48/000000/google-logo.png" />
        Login with <strong style="margin-left: 5px;">google</strong>
      </div>
      <!-- <div class="social-btn">
        <img src="https://img.icons8.com/color/48/000000/facebook.png" />
        Login with <strong style="margin-left: 5px;">Facebook</strong>
      </div> -->
    </div>
    <div class="right-panel">
      <div class="close-btn">×</div>
      <div class="card">
        <div class="icon-badge">
          <img src="{{ asset('images/Group11.png') }}" />
        </div>
        <h3>Online Expert Training</h3>
        <img src="{{ asset('images/user.png') }}" alt="Woman with tablet" />
      </div>
    </div>
  </div>
</body>

</html>