<?php
// Bien Limit Theo Trang
if (isset($_GET["page"]))
{
    $n =$_GET["page"];
    $n =$n*bienykien-bienykien;
    $sopage= $n;
}
else
{
    $sopage= 0;
}

//Hien Thi Full
$re = danhgia($conn,$sopage);
$rew = danhgia($conn,-1);

// Dem So Trang
$ro = mysqli_num_rows($rew);
$dem=Dem($ro,bienykien);
?>

<div class="body-sp">
    <form action="./ykien.php" method= "post">
        <div class="check">
            <div>
                <button type=submit name="docfull">Đọc hàng loạt</button>
            </div>
        </div>

        <div>
            <table class="table-2" cellspacing= 0>
                <tr>
                    <th><div>Ý Kiến</div></th>
                    <th><div>TTrang</div></th>
                </tr>
                <?php
                    while ($row = mysqli_fetch_array($re))
                    { ?>
                        <tr>
                            <td><?php echo $row["YKien"]  ?></td>
                            <td><div><button type=submit name="doc1" value="<?php echo $row["MaYK"] ;?>">Đã đọc</button></div></td>
                        </tr>  <?php
                    } ?>
            </table>
        </div>
        <?php require "php/clickpage.php"; //Hien thi clickpage; ?>
    </form>
</div>
