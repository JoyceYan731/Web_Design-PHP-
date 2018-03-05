<?php
include("includes/init.php");

$current_page_id = "index";
//the id is file name
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title>Home - <?php echo $title;?></title>
  <!-- output the title which defined in the header, however, I cancel the title -->
</head>

<body id = "mainpage">
  <br><br>
  <?php include("includes/header.php");?>

      <section >
        <h2 class="name"><strong><br>Front End Developer</strong></h2>
      </section>

      <div class = text>

      <p class = "introduction"><strong>Hi, I am Xiaoxing Yan.<br>I am a student , majored in Electrical and Computer Engineering in Cornell University now.
      I am very enthusiastic and passionate about User Experience and User Interface Design.
      And these days I am working hard to be an excellent Front End Developer.<br>Want to know more about me? You can find my full resume </strong><a href="/XiaoxingYan.pdf">here</a>.</p>




      <p class = "introtwo"><strong>This portfolio is UI focused, but if you are interested in my work, feel free to contact me.</strong></p>

     </div>
     <br><br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

     <div class="footerlink">
     <?php
     include("includes/footer.php");
     ImageLink("Background-image", "'https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=2384823907,2082537251&fm=27&gp=0.jpg'");
     ?>
   </div>
   
  </body>

</html>
