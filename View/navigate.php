<?php

echo '<style>   
      .navigate {
        margin-left: 16px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        /* justify-content: center; */
        width: 15%;
        height: min-content;
        column-gap: 4px;
        row-gap: 20px !important;
        background: transparent;

      }

      .navigate_btn {
        width: 94px;
        height: 94px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        flex-direction: column;
        /* background: yellow;
        border: 1px solid red; */
      }
      .navigate_btn:hover {
        opacity: 0.6;
        border: 1px dotted #00ff00;
      }
      .navigate_btn-name {
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: #00ff00;
        text-shadow: -1px 0px 0px #000, 1px 0px 0px #000, 0px 1px 0px #000,
          0px -1px 0px #000;
        text-align: center;
      }
      .navigate_btn-icon {
        color: #00ff00;
        margin-bottom: 4px;
        text-shadow: -1px 0px 0px #000, 1px 0px 0px #000, 0px 1px 0px #000,
          0px -1px 0px #000;
      }
      .navigate_btn:hover .navigate_btn-name,
      .navigate_btn:hover .navigate_btn-icon {
        transform: all 0.5s ease;
        color: #62fa62;
      }
</style>';
echo ' <div class="navigate">
        <a href="../Controller/C_Bot.php?opt=view" class="navigate_btn">
          <i
            class="fa-solid fa-list fa-3x navigate_btn-icon"
            style=" text-shadow: none"
          ></i>
          <p class="navigate_btn-name">List Bot</p>
        </a>
        <a href="../Controller/C_Bot.php?opt=active" class="navigate_btn">
          <i
            class="fa-solid fa-laptop fa-3x navigate_btn-icon"
            style=" text-shadow: none"
          ></i>
          <p class="navigate_btn-name">Bot Active</p>
        </a>
        <a href="../Controller/C_Bot.php?opt=passive" class="navigate_btn">
          <i
            class="fa-solid fa-laptop-code fa-3x navigate_btn-icon"
            style=" text-shadow: none"
          ></i>
          <p class="navigate_btn-name">Bot Passive</p>
        </a>
        <a href="../Controller/C_Bot.php?opt=putall" class="navigate_btn">
          <i
            class="fa-solid fa-house-laptop fa-3x navigate_btn-icon"
            style=" text-shadow: none"
          ></i>
          <p class="navigate_btn-name">Control All </p>
        </a>
        <a href="../Controller/C_Bot.php?opt=viewddos" class="navigate_btn">
          <i
            class="fa-solid fa-user-secret fa-3x navigate_btn-icon"
            style=" text-shadow: none"
          ></i>
          <p class="navigate_btn-name">DDOS </p>
        </a>';

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  echo '<a href="../Controller/C_Admin.php?opt=logout" class="navigate_btn">   
          <i style="font-size: 52px;" class="bx bx-log-out navigate_btn-icon"></i>
          <p class="navigate_btn-name">Log Out</p>
        </a>';
} else {
  echo '<a href="../Controller/C_Admin.php?opt=view" class="navigate_btn">
          <i style="font-size: 52px;" class="bx bx-log-in navigate_btn-icon"></i>

          <p class="navigate_btn-name">Log In</p>
        </a>';
}


if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  echo '<div style="width:100%; text-align:center;font-size:24px; border:1px solid #ccc; padding: 8px;">Server: '. $_SESSION['serverStatus'].'</div>';
}
echo '</div>';
