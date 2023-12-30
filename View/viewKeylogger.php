<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="../css/view.css" />
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <title>View Keylogger</title>
</head>

<body>
  <div class="container">
    <div class="inputCommand">
      <div class="header">
        <ul class="ul_header">
          <li class="li_header label_header">
            <label for="">Keylogger Result IdBot=<?php echo $id; ?></label>
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
              <th class="content_table-th">Id </th>
              <th class="content_table-th">Id Bot</th>
              <th class="content_table-th">Start</th>
              <th class="content_table-th">Stop</th>
              <th class="content_table-th">Result</th>
              <th class="content_table-th">Detail</th>
            </tr>
            <?php
            foreach ($listKeylogger as $index => $keylogger) {
              echo '<tr class="content_table-tr">';
              $detail = '<a class="link_detail" href="../Controller/C_Keylogger.php?opt=detail&IdBot=' . $keylogger->getIdBot() . '&IdKeylogger=' . $keylogger->getIdKeylogger() . '">detail</a>';
              echo '<td class="content_table-td">' . $keylogger->getIdKeylogger() . '</td>
                                <td class="content_table-td">' . $keylogger->getIdBot() . '</td>
                                <td class="content_table-td">' . $keylogger->getTimeStart() . '</td>
                                <td class="content_table-td">' . $keylogger->getTimeStop() . '</td>
                                <td class="content_table-td">' . $keylogger->getKeyloggerResult() . '</td>
                                <td class="content_table-td">' . $detail . '</td>';
              echo '</tr>';
            }
            ?>
          </table>
        </div><button class="content_back" onclick="history.back()">Go Back</button>
      </div>
    </div>
    <?php
    include_once("navigate.php");
    ?>
  </div>
</body>

</html>