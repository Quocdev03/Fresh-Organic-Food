<div class="click-page">
   <?php if ($dem > 1) {
   ?>
      <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["tensp"])) { ?>&tensp=<?php echo $_GET["tensp"]; ?>&loaisp=<?php echo $_GET["loaisp"];
                                                         }
                                                         if (isset($_GET["MaKH_sea"])) { ?>&MaKH_sea=<?php echo $_GET["MaKH_sea"]; ?>&TTrang=<?php echo $_GET["TTrang"];
                                                               };
                                                               if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&page=<?php $a = page_before($dem, "page");
                                          echo $a; ?>">
         <div <?php if ((!isset($_GET["page"])) || ($_GET["page"] == 1)) {
                  echo  'class="red"';
               } ?>>
            <?php $a = page_before($dem, "page");
            echo $a; ?>
         </div>
      </a>
   <?php
   }
   if ($dem > 2) {
   ?>
      <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["tensp"])) { ?>&tensp=<?php echo $_GET["tensp"]; ?>&loaisp=<?php echo $_GET["loaisp"];
                                                                                                                           }
                                                                                                                           if (isset($_GET["MaKH_sea"])) { ?>&MaKH_sea=<?php echo $_GET["MaKH_sea"]; ?>&TTrang=<?php echo $_GET["TTrang"];
                                                                                                                                                                                                                                             };
                                                                                                                                                                                                                                             if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&page=<?php $a = page_present($dem, "page");
                                                                                                                                                                                                                                                                                                                                       echo $a ?>">
         <div <?php if (isset($_GET["page"])) {
                  if ((($_GET["page"] < $dem - 1) && ($_GET["page"] > 1)) || (($dem == 3) && ($_GET["page"] == 2))) {
                     echo  'class="red"';
                  }
               } ?>>
            <?php $a = page_present($dem, "page");
            echo $a ?>
         </div>
      </a>
   <?php
   }
   if ($dem > 3) {
   ?>
      <a href="index.php?url=<?php echo $_GET["url"];
                              if (isset($_GET["tensp"])) { ?>&tensp=<?php echo $_GET["tensp"]; ?>&loaisp=<?php echo $_GET["loaisp"];
                                                                                                                           }
                                                                                                                           if (isset($_GET["MaKH_sea"])) { ?>&MaKH_sea=<?php echo $_GET["MaKH_sea"]; ?>&TTrang=<?php echo $_GET["TTrang"];
                                                                                                                                                                                                                                             };
                                                                                                                                                                                                                                             if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&page=<?php $a = page_next($dem, "page");
                                                                                                                                                                                                                                                                                                                                       echo $a ?>">
         <div <?php if (isset($_GET["page"])) {
                  if ($_GET["page"] == $dem - 1) {
                     echo  'class="red"';
                  }
               } ?>>
            <?php $a = page_next($dem, "page");
            echo $a ?>
         </div>
      </a>
   <?php
   }
   if (isset($_GET["page"]) && ($_GET["page"] < $dem - 2) && ($dem > 4)) {
   ?>
      <div> &#8901 &#8901 &#8901</div>
   <?php
   } elseif (!isset($_GET["page"]) && ($dem > 4)) {
   ?>
      <div>&#8901 &#8901 &#8901</div>
   <?php
   }
   ?>
   <a href="index.php?url=<?php echo $_GET["url"];
                           if (isset($_GET["tensp"])) { ?>&tensp=<?php echo $_GET["tensp"]; ?>&loaisp=<?php echo $_GET["loaisp"];
                                                                                                                        }
                                                                                                                        if (isset($_GET["MaKH_sea"])) { ?>&MaKH_sea=<?php echo $_GET["MaKH_sea"]; ?>&TTrang=<?php echo $_GET["TTrang"];
                                                                                                                                                                                                                                          };
                                                                                                                                                                                                                                          if (isset($_GET["donhuy"])) { ?>&donhuy=yes<?php } ?>&page=<?php echo $dem; ?>">
      <div <?php if (isset($_GET["page"])) {
               if ($_GET["page"] == $dem) {
                  echo  'class="red"';
               }
            } elseif ($dem == 1) {
               echo  'class="red"';
            } ?>>
         <?php echo $dem; ?>
      </div>
   </a>
</div>