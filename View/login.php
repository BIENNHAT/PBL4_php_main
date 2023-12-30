<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/main.css" />
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <label for="">Login</label>
          </li>
        </ul>
        <ul class="ul_header">
          <li class="li_header li_header_icon">
            <i class="fa-solid fa-minus" style="color: black; text-shadow: none"></i>
          </li>
          <li class="li_header li_header_icon">
            <i class="fa-regular fa-square" style="color: black; text-shadow: none"></i>
          </li>
          <li class="li_header li_header_icon">
            <i class="fa-solid fa-x" style="color: black; text-shadow: none"></i>
          </li>
        </ul>
      </div>
      <div class="content">
        <div class="content_form">
          <form action="../Controller/C_Admin.php?opt=login" onsubmit="return handleSubmit()" name="f1" method="POST" class="content_form-input">
            <div class="content_element">
              <label class="content_element-label" for="username">Username</label>
              <input class="content_element-input" value="" id="username" onchange="handleChange()" name="username" />
              <p class="username_error"></p>
            </div>
            <div class="content_element">
              <label class="content_element-label" for="password">Password</label>
              <input class="content_element-input" value="" type="password" id="password" onchange="handleChange()" name="password" />
              <p class="password_error"></p>
            </div>
            <button class="form_button" type="submit">Login</button>
        </div>
        </form>
        <button class="content_back" onclick="history.back()">Go Back</button>
      </div>
    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
</body>

<script>
  let password_error = document.querySelector(".password_error");
  let username_error = document.querySelector(".username_error");

  function handleSubmit() {
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    if (password.value === "" || username.value === "") {
      if (password.value === "") {
        password_error.innerHTML = "Password cannot be empty"
      }
      if (username.value === "") {
        username_error.innerHTML = "Username cannot be empty"
      }
      return false
    } else {
      return true
      //document.f1.submit();
    }
  }

  function handleChange() {
    password_error.innerHTML = "";
    username_error.innerHTML = "";
  }
</script>

</html>