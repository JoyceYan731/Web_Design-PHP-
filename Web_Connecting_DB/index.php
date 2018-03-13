
<?php
include("includes/init.php");
$current_page_id="index";


$category=array(
  "name",
  "singer"
);


//insert records to db
function insert_record($db, $sql, $params) {
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    //if insert successfully, $query will not be null
    return $query;
  }
  return NULL;
}

//check if the record has already in db
function check_duplicate($db,$field1,$field2,$category){

  $sql = "SELECT * FROM songs WHERE ". $category[0] ." LIKE '%'|| :content1||'%' AND ".$category[1]." LIKE '%'|| :content2||'%' ";
  $params = array(
     ':content1' => $field1,
     ':content2' => $field2
   );
  $result = get_records_fromdb($db, $sql, $params);
  if(count($result)!=0){
    return true;
  }else{
    return false;
  }
}

$different_language=array(
      "English",
      "Chinese",
      "Indonesian",
      "Norwegian",
      "Swedish",
      "Dutch",
      "Greek",
      "Portuguese",
      "Thai",
      "Hindi",
);


//insert data to db
//if the form has been submitted
$present_form = false;//must predefined in mac
$invalid = false;
if(isset($_POST["submit_insert"])){
  $present_form = false;
  //filter input
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $singer = filter_input(INPUT_POST, 'singer', FILTER_SANITIZE_STRING);
  $album = filter_input(INPUT_POST, 'album', FILTER_SANITIZE_STRING);
  $language1 = filter_input(INPUT_POST, 'language1', FILTER_SANITIZE_STRING);
  $language2 = filter_input(INPUT_POST, 'language2', FILTER_SANITIZE_STRING);

  //name and singer cannot be null
  if(empty($name)){$invalid=true;}
  if(empty($singer)){$invalid=true;}


  $language1 = trim($language1);
  $language2 = trim($language2);

  //determine the final language
  //if the user has choosen a language
  if(empty($language1)){
    $language = $language2;
  }else{
    //if the user has written a language
    $language = $language1;
  }
  //language can only be string
  if(!preg_match("/^[a-zA-Z\s]/",$language)){$invalid=true;}

  //infomation is correct or incorrect
  if($invalid){
    //print the message later
    $message = "Failed to add song. <br>Invalid Language or Name/Singer is null.";
  }else{
    //ready to insert data into db

    $name = trim($name);
    $singer = trim($singer);
    $album = trim($album);


        //check duplicates
        $duplicate = check_duplicate($db,$name,$singer,$category);

        //if duplicate
        if($duplicate){

                $message = "Failed to add song. <br>This song has been added.";

        }else{//insert this record into db
                $sql = "INSERT INTO songs (name,singer,album,language) VALUES (:name, :singer,
                :album, :language)";
                $params = array(
                ':name'=>$name,
                ':singer' => $singer,
                ':album'=>$album,
                ':language'=>$language
                );

                $result = insert_record($db, $sql, $params);

                //if this operation is done
                if($result){
                $message = "Your operation has been done successfully. Thank you!";
                }else{
                $message = "Failed to add song.Please try again.";
                }
        }



  }

}else{
  //the insert form will appear
  $present_form = true;

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

<body id="indexpage">

<div class = "searchform">

    <form  action="info.php" method="get">
          <fieldset>
            <legend><strong>Searched By:</strong></legend>
            <br>
          <input type="radio" name="fields"  value="name">Name<br>
          <input type="radio" name="fields"  value="singer">Singer<br>
          <input type="radio" name="fields"  value="album">Album<br>
          <input type="radio" name="fields"  value="language">Language<br>
          <br><br>
          <input type="text" placeholder="Key Words" maxlength="20" name="content" />
          <button type ="reset">Reset</button>
          <button type="submit">Search</button>
        </fieldset>
    </form>
</div>

<?php
//if the user tries to add songs
if(!$present_form){
      ?>
      <div id ="wrongforinsert">
      <?php
          echo "<strong><h1>".$message."</h1></strong>";
    ?>
    <div>

<?php
}else{
  //if not
  //show the table
 ?>
<div class="insertform">
  <form action="index.php" method="post">
    <fieldset>
    <legend><strong>Add Songs</strong></legend>

    <ul>
      <li>
        <label>Song Name:</label>
        <input type="text" maxlength="20" name="name"/>
      </li>
      <li>
        <label>Singer:</label>
        <input type="text" maxlength="20" name="singer"/>
      </li>
      <li>
        <label>Album:</label>
        <input type="text" maxlength="20" name="album"/>
      </li>

      <li>
        <label>Language:</label>
        <select name="language1">
          <option value="" selected disabled>Choose Language</option>
          <?php
          foreach($different_language as $language) {
            echo "<option value=\"" . $language . "\">" . $language . "</option>";
          }
          ?>
        </select>
      </li>
      <li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <input type="text" name="language2" maxlength="20" placeholder="other language"/>
      </li>
      <li>
        <button name="submit_insert" type="submit">Submit</button>
      </li>

    </ul>
    </fieldset>
  </form>


</div>
<?php
}
?>
<br><br>
<?php
include("includes/header.php");
?>

<div id="link">
<footer>

<?php
function ImageLink($name,$url){
  echo "<p>  Image: ".$name."-- Link is: <a href=".$url.">here</a></p> <p>    </p>" ;
}
ImageLink("background-image","http://img.zcool.cn/community/01bfbe58b4f432a801219c77f30477.png@2o.png");
 ?>

</footer>
</div>

</body>
</html>
