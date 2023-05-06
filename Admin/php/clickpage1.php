 <div class="click-page">
    <?php
      if ($dem1 > 1) {
      ?>
       <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["page"])) { ?>&page=<?php echo $_GET["page"];
                                                                                       }; ?>&iddh=<?php echo $_GET["iddh"];
                                                                                                                              if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&pagehd=<?php $a = page_before($dem1, "pagehd");
                                                                                                                                                                                                                  echo $a; ?>">
          <div <?php if ((!isset($_GET["pagehd"])) || ($_GET["pagehd"] == 1)) {
                  echo  'class="red"';
               } ?>>
             <?php $a = page_before($dem1, "pagehd");
               echo $a; ?>
          </div>
       </a>
    <?php
      }
      if ($dem1 > 2) {
      ?>
       <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["page"])) { ?>&page=<?php echo $_GET["page"];
                                                                                       }; ?>&iddh=<?php echo $_GET["iddh"];
                                                                                                                              if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&pagehd=<?php $a = page_present($dem1, "pagehd");
                                                                                                                                                                                                                  echo $a ?>">
          <div <?php if (isset($_GET["pagehd"])) {
                  if ((($_GET["pagehd"] < $dem1 - 1) && ($_GET["pagehd"] > 1)) || (($dem1 == 3) && ($_GET["pagehd"] == 2))) {
                     echo  'class="red"';
                  }
               } ?>>
             <?php $a = page_present($dem1, "pagehd");
               echo $a ?>
          </div>
       </a>
    <?php
      }
      if ($dem1 > 3) {
      ?>
       <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["page"])) { ?>&page=<?php echo $_GET["page"];
                                                                                       }; ?>&iddh=<?php echo $_GET["iddh"];
                                                                                                                              if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&pagehd=<?php $a = page_next($dem1, "pagehd");
                                                                                                                                                                                                                  echo $a ?>">
          <div <?php if (isset($_GET["pagehd"])) {
                  if ($_GET["pagehd"] == $dem1 - 1) {
                     echo  'class="red"';
                  }
               } ?>>
             <?php $a = page_next($dem1, "pagehd");
               echo $a ?>
          </div>
       </a>
    <?php
      }
      if (isset($_GET["pagehd"]) && ($_GET["pagehd"] < $dem1 - 2) && ($dem1 > 4)) {
      ?>
       <div> &#8901 &#8901 &#8901</div>
    <?php
      } elseif (!isset($_GET["pagehd"]) && ($dem1 > 4)) {
      ?>
       <div>&#8901 &#8901 &#8901</div>
    <?php
      }
      ?>
    <a href="index.php?url=<?php echo $_GET["url"];
                           if (isset($_GET["page"])) { ?>&page=<?php echo $_GET["page"];
                                                                                    }; ?>&iddh=<?php echo $_GET["iddh"];
                                                                                                                           if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&pagehd=<?php echo $dem1; ?>">
       <div <?php if (isset($_GET["pagehd"])) {
               if ($_GET["pagehd"] == $dem1) {
                  echo  'class="red"';
               }
            } elseif ($dem1 == 1) {
               echo  'class="red"';
            } ?>>
          <?php echo $dem1; ?>
       </div>
    </a>
 </div>