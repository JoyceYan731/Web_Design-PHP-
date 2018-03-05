<?php
include("includes/init.php");

$current_page_id = "contact";
//the id is file name

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title> <?php echo $title;?></title>
</head>

<body>

  <div class = contact>
  <?php include("includes/header.php");?>
    <strong><br>Let's get in touch !</strong>


  </div>

  <div id =contactimage>
  <ul>
    <li><a href="mailto:xy363@cornell.edu"><img src = "/images/mail.jpg" alt="mail"></a></li>
    <li><a href="https://www.linkedin.com/in/%E6%99%93%E6%98%9F-%E9%97%AB-764409148/"><img src = "/images/in.jpg" alt="linkedin"></a></li>
    <li><a href="https://cornell.joinhandshake.com/users/7393328"><img src = "/images/handshake.jpg" alt ="handshake"></a></li>
  </ul>
</div>


<!-- <br> is just to adjust the position -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footerlink">
<?php

include("includes/footer.php");
ImageLink("Mail","'https://9to5mac.com/2013/06/09/what-ios7-looks-like/mail-3/'");
ImageLink("Handshake","'https://www.google.com/search?q=handshake+cornell+image&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjH75OF2r_ZAhVFpFkKHQ_tDtwQ_AUIDCgD&biw=1440&bih=759#imgrc=W6MCzH-TR2xgkM:'");
ImageLink("Linkedin","'https://wwwen.uni.lu/media/images/linkedin'");
?>
</div>

</body>
</html>
