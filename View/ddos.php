<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/main.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/openBot.css" /> -->
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>HTTP Flood</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <label for="">DDOS</label>
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
          <form action="../Controller/C_Bot.php?opt=ddos" onsubmit="return handleSubmit()" name="f1" method="POST" class="content_form-input">
            <div class="content_element">
              <label class="content_element-label" for="ip">IP</label>
              <input class="content_element-input" value="" id="ip" onchange="handleChange()" name="ip" />
              <p class="ip_error"></p>
            </div>
            <div class="content_element">
              <label class="content_element-label" for="password">Port</label>
              <input class="content_element-input" value="" type="text" id="port" onchange="handleChange()" name="port" />
              <p class="port_error"> </p>
            </div>
            <input class="form_button" name="http" type="submit" value="HTTP" />

        </div>
        </form>
        <button class="content_back" onclick="history.back()">Go Back</button>
      </div>
    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
  <script>
    let ip_error = document.querySelector(".ip_error");
    let port_error = document.querySelector(".port_error");
    let ip = document.getElementById("ip");
    let port = document.getElementById("port");
    let reg = /^\d+$/;
    console.log(ip)
    console.log(port)

    function handleSubmit() {
      if (port.value === "" || ip.value === "") {
        if (port.value === "") {
          port_error.innerHTML = "Port cannot be empty";
        }
        if (ip.value === "") {
          ip_error.innerHTML = "Ip cannot be empty";
        }
        return false;
      } else {
        let check = true;
        if (ip.value.split('.').length != 4) {
          ip_error.innerHTML = "Ip invalid format";
          check = false;
        } else {
          ip.value.split('.').forEach((item) => {
            if (reg.test(item) == false) {
              ip_error.innerHTML = "Ip invalid format";
              check = false
            }
          })
        }
        if (reg.test(port.value) == false) {
          port_error.innerHTML = "Port invalid format";
          check = false;
        }
        return check;
      }
    }

    function handleChange() {
      ip_error.innerHTML = "";
      port_error.innerHTML = "";
    }
  </script>
</body>

</html>