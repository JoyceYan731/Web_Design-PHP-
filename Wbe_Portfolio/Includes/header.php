<header>


  <nav id="menu">
    <ul>

       <?php
            foreach($pages as $page_id => $page_name) {
                    // utilize the current location to style it differently
                    if ($page_id == $current_page_id) {
                      $css_id = "class='current_page'";
                    } else {
                      $css_id = "class='notchoose_page'";
                    }
                    echo "<li><a " . $css_id . " href='" . $page_id. ".php'>$page_name</a></li>";
                  }

            ?>


    </ul>
  </nav>
</header>
