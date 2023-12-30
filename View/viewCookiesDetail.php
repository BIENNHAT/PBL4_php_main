<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/viewDetail.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/openBot.css" /> -->
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Cookies Detail</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <label for="">Cookies Detail</label>
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
        <div class="content_element">
          <label class="content_element-label" for="ip">Id</label>
          <input class="content_element-input" value="<?php echo $cookiesDetail->getIdCookies(); ?>" readonly />
        </div>
        <div class="content_element">
          <label class="content_element-label" for="ip">Ip : Port</label>
          <input class="content_element-input" value="<?php echo $bot->getIp() . " : " . $bot->getPort(); ?>" readonly />
        </div>

        <div class="content_element">
          <label class="content_element-label" for="ip">Time</label>
          <input class="content_element-input" value="<?php echo $cookiesDetail->getTime(); ?>" readonly />
        </div>
        <div class="content_element">
          <label class="content_element-label" for="ip">Url</label>
          <textarea class="content_element-input" readonly rows="2"><?php echo $cookiesDetail->getUrl(); ?></textarea>
        </div>
        <div class="content_element">
          <label class="content_element-label" for="ip">Cookies</label>
          <textarea class="content_element-input" readonly rows="8"><?php echo $cookiesDetail->getCookiesResult(); ?></textarea>
        </div>
        <button class="content_back" onclick="history.back()">Go Back</button>
      </div>

    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
</body>

</html>