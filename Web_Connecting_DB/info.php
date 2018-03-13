<?php
include("includes/init.php");

$current_page_id="info";


//print every record in records
function print_record($records){
        for($i=0;$i<count($records);$i++){
         echo "<tr>";
         $row = $records[$i];
         echo "<td>".htmlspecialchars($row["name"])."</td>";
         echo "<td>".htmlspecialchars($row["singer"])."</td>";
         echo "<td>".htmlspecialchars($row["album"])."</td>";
         echo "<td>".htmlspecialchars($row["language"])."</td>";
         echo "</tr>";
      }
};



//prepare $field and $content before execute it
if(isset($_GET['fields'])){
        //if the user has choosen field
        $print_table = true;
        if(isset($_GET['content'])){
          //if the user has written something in the search box
           $do_search = true;
          //filter input
           $field = filter_input(INPUT_GET, 'fields', FILTER_SANITIZE_STRING);
           $content = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);
           $content = trim($content);
        }else{
          //return all records to user
          $do_search = false;
        }
}else{
  //remind user that your input is not valid
  //the user has to choose at least one field to prepare
  $print_table = false;
  $message ="<br>Invalid category for search.<br>Please return to the Home Page";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
 <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />
  <title>Home</title>
</head>

<body>
  <div id="mainpage">
<img src="/images/song.png"  alt="background-images" />
</div>



<?php
if($print_table){

        if($do_search){

          $sql = "SELECT * FROM songs WHERE ". $field ." LIKE '%'|| :content||'%' ";
          $params = array(
             ':content' => $content);
        }else{
          //print all records
          $sql = "SELECT * FROM songs";
          $params = array();
        }

        //obtain records from database
        $records = get_records_fromdb($db, $sql, $params);
        //if records is not null
        if (isset($records) and !empty($records)) {
          //print table and record
        ?>
        <table>
        <tr>
        <th>Name</th>
        <th>Singer</th>
        <th>Album</th>
        <th>Language</th>
        </tr>
        <?php
        //print every record
        print_record($records);
        ?>
        </table>

        <?php
        }else{
          //if there is no records
          ?>
              <div id =  "wrongmessage">
              <br><br><br>
              <?php
              echo "<h1> No Records<br> Please Return to Home Page.</h1>";
              ?>

              </div>
          <?php
      }

}else{
  ?>
      <div id =  "wrongmessage">

      <?php
      echo "<h1>".$message."</h1>";
      ?>

      </div>
  <?php
}


?>

<?php
include("includes/header.php");
?>

<div id="link">
<footer>

<?php
function ImageLink($name,$url){
  echo "<p>  Image: ".$name."-- Link is: <a href=".$url.">here</a></p> <p> ;   </p>" ;
}
ImageLink("background-image","http://songforyou.nl/");
 ?>

</footer>
</div>


</body>
</html>
