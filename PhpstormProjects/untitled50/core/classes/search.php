<?php
class search
{
    private $conn;
    private $search;
    private $x1;

    public function __construct($conn, $search)
    {


        $this->conn = $conn;
        $this->search = $search;
        $this->x1 = 0;
        $this->explodeWord();
        $this->searchProduct();
    }
    public function explodeWord()
    {
        $this->search = explode(" ", $this->search);
    }
    public function searchProduct()
    {
        $id='';
        $search='';
        $sum=0;
        $x1 = 'img';
        $price1=0;

        foreach ($this->search as $x ) {
            $sql = "select * from products where product_name LIKE LOWER ('%$x%') or product_name LIKE UPPER ('%$x%')" ;
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    if($id!=$row['id']) {




$price1=$price1+$row['price'];
                        $search = $search . "
                          <div class='col-md-4 col-sm-4'>
    <div class='single-shop-product'>
        <div class='product-upper'>
            <img src='img/".$row['image']."' style='height:250px;width:250px;border:3px solid grey;border-radius:28px;' alt=''>
        </div>

        <div class='product-carousel-price'>




        </div>

        <div class='product-option-shop'>
            <form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">


                <a href='single-product.php?id=".$row['id']."'class=\"add_to_cart_button\" type=\"submit\">Learn more</a>
            </form>

            <br>
            <br>
            <span style='background:whitesmoke;border:0px solid black; font-size:17px;padding:3px;border-radius:28px;'><ins style='color:blue;'>$".$row['price']."</ins> <del>$".$price1."</del></span>
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
                    $id = $row['id'];

                }
                $this->x1=1;

                $this->search = $search;

            } else {
                if($this->x1==0) {
                    $this->search = 'המוצר שאתה מחפש לא נמצא באתר';
                }

            }

        }
    }


    public function getSearch()
    {
        return $this->search;
    }
}
?>