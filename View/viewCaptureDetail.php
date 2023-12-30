<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/captureDetail.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/openBot.css" /> -->
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>Capture Detail</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <label for="">Capture Detail</label>
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
        <?php
        $imageBase64Db = $CaptureDetail->getCaptureResult();
        $imageBase64 = str_replace(" ", "+", $imageBase64Db);
        echo '<div class="content_image"><img class="content_image-img" src="data:image/png;base64,' . $imageBase64 . '" /></div>';
        ?>
        <button class="content_back" onclick="history.back()">Go Back</button>
      </div>
    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
</body>

</html>