<?php

// The website's title
$title = "Searching Music";

// associative array mapping page 'id' to page title
$pages = array(
  "index" => "Home",
  "info" => "Infomation",

);


//connect to the database
$db = new PDO('sqlite:songs.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



//function for getting all records from database
function get_records_fromdb($db, $sql, $params) {
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    $records = $query->fetchAll();
    return $records;
  }
  return NULL;
}


?>
