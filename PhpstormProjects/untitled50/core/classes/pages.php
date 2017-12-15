<?php
class pages{

    private $pages;

    public function pageNum($conn, $pageId,$category)
    {
        if($category>0){
            $selectCom = "SELECT * FROM products WHERE product_id = '$category'";

        }
        else{
            $selectCom = "SELECT * FROM products";

        }
        $active = $pageId-10;

        $page = "";

        $selectCom1 = $conn->query($selectCom);
        $f = $selectCom1->num_rows / 10;
        $x = intval($f);
        $y = $selectCom1->num_rows / 10;


        if($pageId>=0&&$pageId<=1) {


            if ($x == $y) {
                $active=0;

                for ($t = 1; $t <= $pageId+2; $t++) {
                    if ($t <=$y+1&&$t<=$x+1) {

                        $active++;
                        if ($active == $pageId) {

                            $page = $page . " <li><a class='active' href='?id=$t'>$t</a></li>";
                        } else {
                            $page = $page . " <li><a href='?id=$t'>$t</a></li>";
                        }
                    }
                }
            } else {

                $active = 0;
                for ($t = 1; $t <= $pageId + 2; $t++) {
                    if ($t <=$y+1&&$t<=$x+1) {
                        $active++;
                        if ($active == $pageId) {

                            $page = $page . " <li><a class='active' href='?id=$t'>$t</a></li>";
                        } else {
                            $page = $page . " <li><a href='?id=$t'>$t</a></li>";
                        }
                    }

                }
            }
        }
        else{
            if ($x == $y) {

                for ($t = $pageId - 2; $t <= $pageId + 2; $t++) {
                    $active++;
                    if ($t <= $y + 1 && $t <= $x + 1) {
                        if ($active == $pageId) {

                            $page = $page . " <li><a class='active' href='?id=$t'>$t</a></li>";
                        } else {
                            $page = $page . " <li><a href='?id=$t'>$t</a></li>";
                        }
                    }
                }
            }else {
                for ($t = $pageId - 2; $t <= $pageId + 2; $t++) {
                    if ($t <=$y+1&&$t<=$x+1) {
                        $active++;
                        if ($active == $pageId) {

                            $page = $page . " <li><a class='active' href='?id=$t'>$t</a></li>";
                        } else {
                            $page = $page . " <li><a href='?id=$t'>$t</a></li>";
                        }
                    }
                }


            }

        }
        return $page;
    }
    public function page($page)
    {

        $x = 10;
        $page = $page * $x;
        $pageStart = $page;
        $pageStart = $pageStart - 10;
        $pages = array("pageStart" => $pageStart, "pageEnd" => $page);
        $this->pages = $pages;

    }
    public function selectCommentNum($conn,$id)
    {
        $x = "SELECT * FROM comments WHERE post_id = '$id'";
        $num = $conn->query($x);
        if(isset($num->num_rows))
        {
            $x = array('num'=> $num->num_rows);
            return $x;
        }
        else
        {
            return 0;
        }
    }


    function products($conn,$product)
    {
        $x = 0;
        $price1=0;
        $page = $this->pages;
        $pageStart = $page['pageStart'];
        $pageEnd = $page['pageEnd'];
        $display="";
        if($product>0) {
            $query = "SELECT id,product_name,image,price FROM products WHERE product_id = '$product'  order by id desc ";
        }
        else{
            $query = "SELECT id,product_name,image,price FROM products";
        }
        $result = $conn->query($query);
        while($row=$result->fetch_assoc()) {
            $x++;
            $price1=$price1+$row['price'];

            if ($x > $pageStart && $x <= $pageEnd) {
                $display = $display . "
                          <div class='col-md-4 col-sm-4'>
    <div class='single-shop-product'>
        <div class='product-upper'>
            <img src='img/".$row['image']."' style='height:250px;width:250px;border:3px solid grey;border-radius:28px;' alt=''>
        </div>

        <div class='product-carousel-price'>




        </div>

        <div class='product-option-shop'>
            <form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">


                <a href='single-product.php?id=".$row['id']."'class=\"add_to_cart_button\" type=\"submit\">מידע נוסף</a>
            </form>

            <br>
            <br>
            <span style='background:whitesmoke;border:0px solid black; font-size:17px;padding:3px;border-radius:28px;'><ins style='color:blue;'>₪".$row['price']."</ins> <del>₪".$price1."</del></span>
            <div class=\"product-wid-rating\">
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
                <i class=\"fa fa-star\"></i>
            </div>
            <h2><a href='single-product.php?id=".$row['id']."'>".$row['product_name']."</a></h2>

        </div>
    </div>
</div>
";
            }
        }

        return $display;
    }
}


