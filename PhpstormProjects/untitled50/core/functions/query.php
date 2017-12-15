<?php
function insertMail($conn,$email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return"<script>alert('כתובת מייל לא תקינה')</script>";
    }
    else {

        $sql = "INSERT INTO emails(emails)VALUES('$email')";
        $conn->query($sql);
        return "<script>alert('תודה שנרשמת לפרסומי האתר במייל');</script>";
    }

}
function isAdmin($conn,$id){
    $sql = "SELECT user_type from users WHERE id = '$id'";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $x = $row['user_type'];
    }
    if($x==1){
        return 1;
    }
    else{
        return 0;
    }
}
function deleteQ($conn){
    $sql = "SELECT quantity1,id from products";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if($row['quantity1']<=0){
            $idq = $row['id'];
            $sql="select product_name,secimage,timage ,image from products where id = $idq";
            $result = $conn->query($sql);
            while($row1=$result->fetch_assoc())
            {
                $empty = $row1['image'];
                $empty1 = $row1['product_name'];
                $empty2 = $row1['secimage'];
                $empty3 = $row1['timage'];

            }
            unlink("img"."/".$empty);
            if($empty2!='') {
                unlink("img/" . $empty1 . "/" . $empty2);
            }
            if($empty3!='') {
                unlink("img/" . $empty1 . "/" . $empty3);
            }
            rmdir("img"."/".$empty1);

            $sql = "DELETE FROM products where id=$idq";
            $conn->query($sql);

        }
    }
}
function citys($conn)
{
    $city = '';
    $sql = "select city_id,city_name from citys";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $city = $city."<option value='".$row['city_id']."'>".$row['city_name']."</option>";
    }
    return $city;
}
function streets($conn,$city1)
{
    $city = '';
    $sql = "select id,street_name from streets WHERE city_id = $city1  ";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $city = $city."<option value='".$row['id']."'>".$row['street_name']."</option>";
    }
    return $city;
}

function exist1($conn,$id){
    $sql = "SELECT id,product_name,image FROM products where id=$id";
    $details=$conn->query($sql);
    if($details->num_rows>0)
    {
        return 1;
    }
    else{
        return 0;
    }

}
function login($conn,$username,$password){
    $sql ="SELECT id,username FROM users WHERE email = '$username' AND password = '$password' AND confirm = 1";
    $details=$conn->query($sql);
    if($details->num_rows>0)
    {
        while($row=$details->fetch_assoc()) {
            return $row['id'];
        }
    }
    else{
        return 0;
    }

}
function username($conn,$id){
    $sql = "SELECT id,name FROM users where id = '$id'";
    $details=$conn->query($sql);
    if($details->num_rows>0)
    {
        while($row=$details->fetch_assoc())
        {
            return $row['name'];
        }
    }
    else{
        return 0;
    }

}
function updateConfrim($conn,$id){
    $sql = "UPDATE users
SET confirm=1
WHERE id = '$id' ";
    $conn->query($sql);

}
function categorys($conn){
    $product ='';
    $sql = "SELECT id,product_type FROM product_type ";
    $details=$conn->query($sql);
    while($row=$details->fetch_assoc())
    {

        $product=$product."<li><a href='control.php?id=".$row['id']."'>".$row['product_type']."</a></li>";
    }
    return $product;

}
function categorys12($conn,$id){
    $product ='';
    $sql = "SELECT id,product_type FROM product_type where id='$id'";
    $details=$conn->query($sql);
    while($row=$details->fetch_assoc())
    {

        $product=$product."<input type='text' name='cat' value='".$row['product_type']."'>";
    }
    return $product."<input type='submit' name='cat1' value='שנה שם'>";


}
function confirm($conn,$code){
    $sql = "SELECT id FROM users where code ='$code'";
    $details=$conn->query($sql);
    if($details->num_rows>0) {
        while ($row = $details->fetch_assoc()) {
            return $row['id'];

        }
    }
    else{
        return 0;
    }

}
function may($conn)
{
    $empty = '';
    $sql = "SELECT * FROM products limit 0,2";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $empty = $empty . "     <li class=\"product\">




                                        <a href=single-product.php?id=".$row['id'].">
                                            <img  alt=\"T_4_front\" class=\"attachment-shop_catalog wp-post-image\" src='img/".$row['image']."' width=\"325\" height=\"325\">
                                            <h3>".$row['product_name']."</h3>
                                            <span class=\"price\"><span class=\"amount\">₪".$row['price'].".00</span></span>
                                        </a>

                                        <a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"22\" rel=\"nofollow\" href=single-product.php?id=".$row['id'].">פרטים נוספים</a>
                                    </li>";
    }
    return $empty;
}
function recent($conn){
    $empty='';
    $sql = "SELECT * FROM products";
    $result= $conn->query($sql);
    $x=$result->num_rows-4;
    $sql ="SELECT * FROM products limit $x,$result->num_rows";
    $result= $conn->query($sql);
    while($row=$result->fetch_assoc()) {
        $price1=$row['price']+5;
        $empty = $empty . " <div class=\"thubmnail-recent\">
                            <img src='img/".$row['image']."' class=\"recent-thumb\" alt=\"\">
                            <h2><a href=single-product.php?id=".$row['id'].">".$row['product_name']."</a></h2>
                            <div class=\"product-sidebar-price\">
                                <ins>₪".$row['price'].".00</ins> <del>₪$price1.00</del>
                            </div>
                        </div>";
    }
    return $empty;
}
function toper($conn){
    $empty='';
    $sql = "SELECT * FROM products";
    $result= $conn->query($sql);
    $x=$result->num_rows-3;
    $sql ="SELECT * FROM products limit $x,$result->num_rows";
    $result= $conn->query($sql);
    while($row=$result->fetch_assoc()) {
        $price1=$row['price']+5;
        $empty = $empty . "<div class=\"single-wid-product\">
                            <a href='single-product.php?id=".$row['id']."'><img src='img/".$row['image']."' alt=\"\" class=\"product-thumb\"></a>
                            <h2><a href='single-product.php?id=".$row['id']."'>".$row['product_name']."</a></h2>
                            <div class=\"product-wid-rating\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                            </div>
                            <div class=\"product-wid-price\">
                                <ins>₪".$row['price'].".00</ins> <del>₪".$price1.".00</del>
                            </div>
                        </div>";
    }
    return $empty;
}
function topSellers($conn)
{
    $empty = '';
    $sql = "SELECT item_number, SUM(quantity) AS TotalQuantity
FROM payments
GROUP BY item_number
ORDER BY SUM(quantity) DESC
LIMIT 3";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $item =$row['item_number'];
        $sql = "SELECT * FROM products where id= $item ";
        $result1=$conn->query($sql);
        while($row1=$result1->fetch_assoc()){
        $price1=$row1['price']+5;
        $empty = $empty . "<div class=\"single-wid-product\">
                            <a href='single-product.php?id=".$row1['id']."'><img src='img/" . $row1['image'] . "' alt=\"\" class=\"product-thumb\"></a>
                            <h2><a href='single-product.php?id=".$row1['id']."'>" . $row1['product_name'] . "</a></h2>
                            <div class=\"product-wid-rating\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                            </div>
                            <div class=\"product-wid-price\">
                                <ins>₪" . $row1['price'] . ".00</ins> <del>₪" . $price1 . ".00</del>
                            </div>
                        </div>";
    }
}
    return $empty;


}

function categorys1($conn){
    $product ='';
    $sql = "SELECT id,product_type FROM product_type where id != 10";
    $details=$conn->query($sql);
    while($row=$details->fetch_assoc())
    {
        if($row['product_type']=='מכרזים'){
            $product=$product."<li><a href='bids.php'>מכרזים</a></li>";
        }
        else {
            $product = $product."<li><a href='shop.php?id=1&product=".$row['id']."'>" . $row['product_type'] . "</a></li>";
        }
    }
    return $product;

}
function icategorys($conn,$name){

    $sql = "insert into product_type(product_type)values('$name')";
    $conn->query($sql);

}
function top($conn)
{
    $x1 = 'img';
    $empty = '';
    $sql = "SELECT id,product_name,image,price FROM products limit 0,4";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $price1=$row['price']+5;
        $empty = $empty .  "<div class='col-md-3 col-sm-6'>
                    <div class='single-shop-product'>
                        <div class='product-upper'>
                            <img src='img/".$row['image']."' style='height:250px;width:250px;border:3px solid grey;border-radius:28px;' alt=''>
                        </div>

                        <div class='product-carousel-price'>




                        </div>

                        <div class='product-option-shop'>
                            <form target=\"paypal\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">


                                            <a href='single-product.php?id=".$row['id']."'class=\"add_to_cart_button\" type=\"submit\">למידע נוסף</a>
                                        </form>

                                              <br>
                                              <br>
                                                 <span style='background:whitesmoke;border:0px solid black; font-size:17px;padding:3px;border-radius:28px;'><ins style='color:blue;'>₪".$row['price'].".00</ins> <del style='color:black'>₪".$price1.".00</del></span>
                                                     <div class=\"product-wid-rating\">
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                                <i class=\"fa fa-star\"></i>
                            </div>
                            <h4 ><a href='single-product.php?id=".$row['id']."'>".$row['product_name']."</a></h4>

                        </div>
                    </div>
                </div>";






    }
    return $empty;


}
function all($conn)
{
    $x1 = 'img';
    $empty = '';
    $sql = "SELECT id,product_name,image,price FROM products";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $price1=$row['price']+5;
        $empty = $empty .  "<div class='col-md-4 col-sm-4'>
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
                                                 <span style='background:whitesmoke;border:0px solid black; font-size:17px;padding:3px;border-radius:28px;'><ins style='color:blue;'>$".$row['price']."</ins> <del>$.".$price1."</del></span>
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
            </div>";






    }
    return $empty;


}
function selectBid($conn)
{

    $empty = '';
    $x1 = 'img';
    $sql = "SELECT products.id,product_name,image,price,desc1 FROM products,product_type WHERE products.product_id = product_type.id and product_type.product_type =  'מכרזים' limit 0,1  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empty = $empty . "        <form action='' method=\"post\">
                <div class=\"panel panel-default\" style='text-align:center;'>
                    <div class=\"panel-heading\">
                        <h4 style=\"text-align: center\">" . $row['product_name'] . "</h4>
                    </div>
                    <div class=\"panel-body\">
                        <img height='300' width='300' src='" . $x1 . "/" . $row['image'] . "'>
                        <br>
                       <h3>".$row['desc1']."</h3>
                    </div>

            </div>
            </form>





";
        }
        return $empty;

    }
}

function deleteProducts($conn, $id)
{
    $sql="select product_name,secimage,timage ,image from products where id = $id";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $empty = $row['image'];
        $empty1 = $row['product_name'];
        $empty2 = $row['secimage'];
        $empty3 = $row['timage'];

    }
    unlink("img"."/".$empty);
    if($empty2!='') {
        unlink("img/" . $empty1 . "/" . $empty2);
    }
    if($empty3!='') {
        unlink("img/" . $empty1 . "/" . $empty3);
    }
    rmdir("img"."/".$empty1);

    $sql = "DELETE FROM products where id=$id";
    $conn->query($sql);

}
function deleteCat($conn,$id){
    $sql = "SELECT * FROM products WHERE product_id= $id and product_id!=1";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){

        $idq = $row['id'];
        $sql="select product_name,secimage,timage ,image from products where id = $idq";
        $result1 = $conn->query($sql);
        while($row1=$result1->fetch_assoc())
        {
            $empty = $row1['image'];
            $empty1 = $row1['product_name'];
            $empty2 = $row1['secimage'];
            $empty3 = $row1['timage'];

        }
        unlink("img"."/".$empty);
        if($empty2!='') {
            unlink("img/" . $empty1 . "/" . $empty2);
        }
        if($empty3!='') {
            unlink("img/" . $empty1 . "/" . $empty3);
        }
        rmdir("img"."/".$empty1);

        $sql = "DELETE FROM products where id=$idq";
        $conn->query($sql);


    }


    $sql = "DELETE FROM product_type where id=$id and id !=1";
    $conn->query($sql);

}
function upadteProduct($conn, $id, $price)
{

    $sql = "UPDATE products
SET price=$price
WHERE id=$id ";
    $conn->query($sql);
}
function updateName($conn,$id,$name)
{

    $sql = "UPDATE product_type
SET product_type='$name'
WHERE id=$id ";
    $conn->query($sql);
}
function upadteProduct2($conn,$id,$name){
    $sql = "UPDATE products
SET desc1='$name'
WHERE id=$id ";
    $conn->query($sql);
}
function upadteProduct3($conn,$id,$name){
    $sql = "UPDATE products
SET product_id='$name'
WHERE id=$id ";
    $conn->query($sql);
}
function upadteProduct1($conn, $id, $name)
{
    $name1='';
    $sql = "select product_name,image from products where id = $id";
    $details = $conn->query($sql);
    while($row=$details->fetch_assoc()) {
        $name2 = $row['image'];
        $name1=$row['product_name'];
        rename("img/".$name2,"img/".$name.".png");
        rename("img/".$name1,"img/".$name);

    }


    $name1= $name.".png";
    $sql = "UPDATE products
SET image='$name1'
WHERE id=$id ";

    $conn->query($sql);
    $sql = "UPDATE products
SET product_name='$name'
WHERE id=$id ";
    $conn->query($sql);
    $name1= $name.".png";
    $sql = "UPDATE payments
SET image='$name1'
WHERE item_number=$id ";

    $conn->query($sql);
    $sql = "UPDATE payments
SET item_name='$name'
WHERE item_number=$id ";
    $conn->query($sql);
}

function top12($conn, $id)
{
    $x1 = 'img';
    $empty = '';
    $empty1='';
    $empty2='';
    $sql1 = $sql = "SELECT * FROM product_type WHERE id!=$id ";
    $sql2 = $sql = "SELECT * FROM product_type WHERE id=$id ";
    $sql = "SELECT id,product_name,image,price,quantity1,desc1 FROM products where product_id=$id ";
    $details = $conn->query($sql);
    $details2=$conn->query($sql1);
    $details3=$conn->query($sql2);
    while ($row = $details3->fetch_assoc()) {
        $empty1 = $empty1."<option value=".$row['id'].">".$row['product_type']."</option>";
    }
    while ($row = $details2->fetch_assoc()) {
       $empty1 = $empty1."<option value=".$row['id'].">".$row['product_type']."</option>";
    }


    while ($row = $details->fetch_assoc()) {
        $empty = $empty . "        <form action='' method=\"post\">    <div class=\"col-md-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                    <select name='cars'>
                    $empty1;

  </select>
                    <span style='float:right'>שינוי קטגורית מוצר</span>

                        <h4 style=\"text-align: right\"><input type='text' style='float:left'size=\"5\" name='price' col='10' value=" . $row['price'] . "><input type ='text' style='text-align:right;direction:rtl;' name='pname' cols='10' value='" . $row['product_name'] . "'></h4>
                    </div>
                    <div class=\"panel-body\">
                        <img class=\"img-responsive img-portfolio img-hover\" style='height: 200px; width: 300px;' src='" . $x1 . "/" . $row['image'] . "'>

                        <input type='hidden' name='id' value=" . $row['id'] . ">
                        <input type='submit' name='submit1' value='עדכן מוצר'>
                        <input type='submit' name='delete' value='מחק מוצר'>
                        <br>
                          <lable style='text-align:right;float:right;'>תיאור מוצר</label>
                         <h4 style='text-align:right;float:right;'><textarea style='text-align:right;direction:rtl' name='pname1' rows='10' cols='30'>".$row['desc1']."</textarea></h4>
                    </div>
                </div>
            </div>

            </form>






";
    }
    return $empty;

}





function lessQuantity($conn, $item_number, $x)
{

    $sql = "UPDATE products
SET quantity1=quantity1-$x
WHERE id=$item_number ";
    $conn->query($sql);
}




function delete($id, $conn)
{
    $sql = "DELETE FROM products WHERE id = $id";
    $conn->query($sql);
}

function selectPhotos($conn)
{


    $empty = '';
    $empty = '';
    $sql = "SELECT id,image,price,desc1,quantity,quantity1 FROM products";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = 'img/' . $row['image'];

        $empty = $empty . " <li> <span style='float: right; font-size: 20px; color:red;'><a class='button1' href='#'>" . $row['quantity'] . "/" . $row['quantity1'] . " כמות </a></span><a href='#slide1'><img  src=' img/" . $row['image'] . "'id='img' style=' font-family: 'Varela Round', sans-serif; float : right;' alt='     " . $row['desc1'] . "' height='370px;'  </a> <span style='float: left; font-size: 20px; color:black;' dir='rtl'>



        <button id='loler1' style='font-size:17px; margin-top:10px;'> " . $row['price'] . " <i class='fa fa-shekel'></i></button></a>

  <form action='delev.php' method='post'>
  <input type='hidden' name = id value=" . $row['id'] . ">
           <input type='hidden' name = 'image' value=" . $row['image'] . " >
            <input type='hidden' name = 'desc1'  value ='" . $row['desc1'] . "'>
            <input type='hidden' name = 'price' value=" . $row['price'] . " >
              <input type='hidden' name = 'x' value='" . $x . "'>
              <input type='hidden' name='a' value = '1'>
                <button type='submit' style='  margin-top:10px; font-size:15px  font-family: 'Varela Round', sans-serif;' class='button' href='#'>    קנה עכשיו </button></form>








</li>";


    }
    return $empty;

}
function selectRegular($conn, $id)
{
    $empty = '';
    $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name  FROM products where product_id='$id'";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = "img/".$row['image'];


        $empty = $empty . "		<li>
					<center>
						  <img src =img/".$row['image']." style=\"height:250px;width:250px;margin-top:30px;\"  alt=\"\">
						  </center>
						<div class=\"caption-group\">
							<h2 class=\"caption title\">

							</h2>

							<a class=\"caption button-radius\" href=\"#\" style=\"margin-top:170px;\"><span class=\"icon\"></span>Shop now</a>
						</div>
					</li> ";
    }
    return $empty;
}




function selectRegular2($conn, $id)
{
    $empty = '';
    $sum = 0;
    $pic = 0;
    $x = 0;
    while ($x < 3) {
        $x++;
        $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name,secimage,timage  FROM products WHERE id=$id ";
        $details = $conn->query($sql);
        while ($row = $details->fetch_assoc()) {

            $sum = $sum + 1;
            if ($sum == 1) {
                $pic = "<img data-u='image' src='img/" . $row['image'] . "'>";
                $empty = $empty . "<div data-p='112.50'>
                       .$pic.

                            <div data-u='thumb' >תמונה מספר $x</div>







                     </div> ";
            }

            if ($sum == 2 && $row['secimage'] != '') {
                $pic = "<img data-u='image' src='img/" . $row['product_name'] . "/" . $row['secimage'] . "'>";
                $empty = $empty . "<div data-p='112.50'>
                       .$pic.

                            <div data-u='thumb' >תמונה מספר $x</div>







                     </div> ";
            }

            if ($sum == 3 && $row['timage'] != '') {
                $pic = "<img data-u='image' src='img/" . $row['product_name'] . "/" . $row['timage'] . "'>";
                $empty = $empty . "<div data-p='112.50'>
                       .$pic.

                            <div data-u='thumb' >תמונה מספר $x</div>







                     </div> ";
            }
        }

    }
    return $empty;
}








function image1($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name,secimage,timage FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['image'];

    }
    return 'img/'.$x;


}
function image2($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name,secimage,timage FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['product_name'];
        $y=$row['secimage'];

    }
    return 'img/'.$x.'/'.$y;


}
function image3($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name,secimage,timage FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['product_name'];
        $y=$row['timage'];

    }
    return 'img/'.$x.'/'.$y;


}
function desc1($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1,product_name FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['product_name'];

    }
    return $x;


}

function descer1($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1 FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['desc1'];

    }
    return $x;


}

function price1($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1 FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['price'];

    }
    return $x;


}



function q1($conn, $id)
{
    $sql = "SELECT id,image,price,desc1,quantity,quantity1 FROM products where id= $id";
    $details = $conn->query($sql);
    while ($row = $details->fetch_assoc()) {
        $x = $row['quantity1'];

    }
    return $x;


}





function maxId($conn)
{
    $sql = "SELECT * FROM products WHERE id = (SELECT MAX(id) FROM products)";

    $max = $conn->query($sql);
    while ($row = $max->fetch_assoc()) {
        return $row['id'];
    }

}

function updateQuantity($id, $quantity, $conn)
{
    $sql = "UPDATE products
SET quantity1=$quantity
WHERE id=$id ";
    $conn->query($sql);
}

function updatePrice($id, $price, $conn)
{
    $sql = "UPDATE products
SET price=$price
WHERE id=$id ";
    $conn->query($sql);
}
function selectItems($conn,$cart)
{
    $sum = 0;
    $x ='';
    $query = "SELECT products.id,product_name,image,price,cart.quantity FROM cart,products where cart.id = '$cart' and cart.product_id = products.id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $x[$sum] = array('id' => $row['id'],'product_name' => $row['product_name'],'quantity' => $row['quantity'],'price' => $row['price']);
                $sum++;

        }
        return $x;

    }
}
function createUrl($url){
    $ur = '';
    for($x=0;$x<count($url);$x++){
        $ur =$ur. "&item".$x."=".$url[$x]['id']."&quantity".$x."=".$url[$x]['quantity']."";

    }
    return $ur;
}
?>