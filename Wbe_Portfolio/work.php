<?php
include("includes/init.php");

$current_page_id = "work";
//the id is file name

//user-defined function
//to draw circles
function drawcircle($url,$imgurl,$css_id,$text){
  echo "<div class =".$css_id.">";
  echo "<a href = ".$url."><img src = ".$imgurl." alt=\" \"></a>";
  echo "<br><strong>".$text."</strong>";
  echo "</div>";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title> <?php echo $title;?></title>
</head>

<body id = workpage>
  <br><br>

  <?php

  include("includes/header.php");

 drawcircle("http://www.eeb.cornell.edu/winkler/wordpress/?page_id".urlencode("=")."335","/images/birdtag.jpg","box1","Small Bird Geolocating Radio Tag <br>and Receiver System");
 drawcircle("https://courses.cit.cornell.edu/ece5990/ECE5725_Fall2017_projects/pl557_rx65_xy363_final/",
 "/images/cool.png","box2","Cool-Tapping Instrument");
// the picture of Cool-Tapping Instrument is taken by our team
?>

<!-- just to change the position -->
<br><br><br><br><br><br><br><br>

<div class = workpage>
  <img src="/images/back.jpg"  alt ="background">
</div>


<div class="footerlink">
<?php
include("includes/footer.php");
ImageLink("BirdTag","'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2300107357,3981078969&fm=27&gp=0.jpg'");

?>
</div>

</body>
</html>
