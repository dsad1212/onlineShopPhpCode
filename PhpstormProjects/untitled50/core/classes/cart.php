<?php
class cart
{
    private $conn;
    private $cart;

    public function __construct($conn, $cart)
    {
        $this->conn = $conn;
        $this->cart = $cart;
    }

    public function setCart($id)
    {


        $sql = "INSERT INTO cart(id,date,product_id,quantity) VALUES ('$this->cart','hello','$id',1)";
        $this->conn->query($sql);
    }

    public function getCart()
    {
        $empty = '';
        $empty1 = "<form method=\"post\" action=\"#\">
                                <table cellspacing=\"0\" class=\"shop_table cart\" style='direction: rtl'>
                                    <thead>
                                        <tr>
                                            <th class=\"product-remove\">&nbsp;</th>
                                            <th class=\"product-thumbnail\">תמונה</th>
                                            <th class=\"product-name\">מוצר</th>
                                            <th class=\"product-price\">מחיר</th>
                                            <th class=\"product-quantity\">כמות</th>
                                            <th class=\"product-subtotal\">סה״כ</th>
                                        </tr>
                                    </thead><tbody></tbody>";
        $empty2 = "<tr>
                                            <td class=\"actions\" colspan=\"6\">
                                                <div class=\"coupon\">
                                                    <label for=\"coupon_code\">קופון:</label>
                                                    <input type=\"text\" placeholder=\"קוד קופון\" value=\"\" id=\"coupon_code\" class=\"input-text\" name=\"coupon_code\">
                                                    <input type=\"submit\" value=\"השתמש בקופון\" name=\"apply_coupon\" class=\"button\">
                                                </div>
                                                <input type=\"submit\" value=\"עדכון סל\" name=\"update_cart\" class=\"button\" style='margin-bottom:30px;'>
                                                <input type=\"submit\" value=\"רכישה\" name=\"proceed\" class=\"checkout-button button alt wc-forward\">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>";
        $query = "SELECT products.id,product_name,image,price,cart.quantity FROM cart,products where cart.id = '$this->cart' and cart.product_id = products.id";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empty = $empty . "

                                        <tr class=\"cart_item\">
                                            <td class=\"product-remove\">
                                                <a title=\"Remove this item\" class=\"remove\" href='cart.php?delete=" . $row['id'] . "'>×</a>
                                            </td>

                                            <td class=\"product-thumbnail\">
                                                <a href=><img width=\"145\" height=\"145\" alt=\"poster_1_up\" class=\"shop_thumbnail\" src='img/" . $row['image'] . "' style='height:50px;'></a>
                                            </td>

                                            <td class=\"product-name\"style='width:35%'>
                                                <a href= >" . $row['product_name'] . "</a>
                                            </td>

                                            <td class=\"product-price\">
                                                <span class=\"amount\">₪" . $row['price'] . ".00</span>
                                            </td>

                                            <td class=\"product-quantity\" >
                                                <div class=\"quantity buttons_added\" >
                                                    <input type=\"button\" id='" . $row['id'] . "' class=\"minus\"  value=\"-\" onclick=\"minus(this.id)\" >
                                                    <input type=\"number\" name='" . $row['id'] . "' id='" . $row['id'] . "&f' size=\"4\" class=\"input-text qty text\" title=\"Qty\" value='" . $row['quantity'] . "' min=\"0\" step=\"1\" id='count'>
                                                    <input  type=\"button\" id='" . $row['id'] . "' class=\"plus\"   value=\"+\" onclick=\"plus(this.id)\">
                                                </div>

                                            </td>

                                            <td class=\"product-subtotal\">
                                                <span class=\"amount\">₪" . $row['price'] * $row['quantity'] . ".00</span>
                                            </td>
                                        </tr>



";

            }
            return $empty1 . $empty . $empty2;
        } else {
            return "<h1 style='color:red'>הסל קניות שלך ריק</h1>";
        }
    }

    public function updateQuantity($key, $post)
    {
        $sql = "UPDATE cart
SET quantity=$post
WHERE id='$this->cart' AND product_id = '$key' ";
        $this->conn->query($sql);


    }

    public function deleteProduct($delete)
    {
        $sql = "DELETE FROM cart where product_id = '$delete' AND id = '$this->cart'";
        $this->conn->query($sql);
    }

    public function setCartTotal()
    {
        $empty = '';
        $sum = 0;
        $query = "SELECT products.id,product_name,image,price,cart.quantity FROM cart,products where cart.id = '$this->cart' and cart.product_id = products.id";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['price'] = $row['price'] * $row['quantity'];
                $sum = $sum + $row['price'];

            }
            return $empty = $empty . "      <div class=\"cart_totals \" style='direction:rtl;'>
                                <h2>סה״כ בסל</h2>

                                <table cellspacing=\"0\">
                                    <tbody>
                                        <tr class=\"cart-subtotal\">
                                            <th>סה״כ בסל</th>
                                            <td><span class=\"amount\">₪" . $sum . ".00</span></td>
                                        </tr>

                                        <tr class=\"shipping\">
                                            <th>משלוחים</th>
                                            <td>משלוח חינם</td>
                                        </tr>

                                        <tr class=\"order-total\">
                                            <th>סה״כ הזמנה</th>
                                            <td><strong><span class=\"amount\">₪" . $sum . ".00</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>";

        }
    }

    public function view()
    {
        $empty = '';
        $sum = 0;
        $sum1 = 0;
        $query = "SELECT products.id,product_name,image,price,cart.quantity FROM cart,products where cart.id = '$this->cart' and cart.product_id = products.id";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['price'] = $row['price'] * $row['quantity'];
                $sum = $sum + $row['price'];
                $sum1++;

            }
            return $empty = "<div class=\"shopping-item\">
                        <a href=\"cart.php\">סל קניות - <span class=\"cart-amunt\">₪" . $sum . "</span> <i class=\"fa fa-shopping-cart\"></i> <span class=\"product-count\">" . $sum1 . "</span></a>
                    </div>";
        }
        return $empty = "<div class=\"shopping-item\"><a href=\"cart.php\">סל קניות - <span class=\"cart-amunt\">₪0</span> <i class=\"fa fa-shopping-cart\"></i> <span class=\"product-count\">0</span></a></div>";

    }

    public function Order()
    {
        $sum = 0;
        $query = "SELECT products.id,product_name,image,price,cart.quantity FROM cart,products where cart.id = '$this->cart' and cart.product_id = products.id";
        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {

            $x[$sum] = array('product_id' => $row['id'], 'product_name' => $row['product_name'], 'quantity' => $row['quantity'], 'price' => $row['price']);
            $sum++;
        }
        return $x;
    }

    public function getOrder()
    {
        if(isset($_SESSION['id'])) {
            $user = $_SESSION['id'];
        }
        else{
            return "<h1>אתה חייב להיות רשום כדי לצפות בהיסטורית רכישה</h1>";
        }
        $empty = '';
        $empty1 = "<form method=\"post\" action=\"#\">
                                <table cellspacing=\"0\" class=\"shop_table cart\">
                                    <thead>
                                        <tr>
                                           <th class=\"product-name\">תאריך</th>
                                            <th class=\"product-name\">מוצר</th>
                                            <th class=\"product-price\">מחיר</th>
                                            <th class=\"product-quantity\">כמות</th>
                                            <th class=\"product-subtotal\">סה״כ</th>
                                        </tr>
                                    </thead><tbody></tbody>";
        $empty2 = "<tr><td colspan='6'><h1>היסטורית רכישה</h1></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>";
        $query = "SELECT payment_gross,item_name,quantity,date FROM payments WHERE user_id='$user'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empty = $empty . "

                                        <tr class=\"cart_item\">
                                            <td class=\"product-remove\">
                                               ".$row['date']."
                                            </td>




                                            <td class=\"product-name\"style='width:40%'>
                                                <a href=\"#\" >" . $row['item_name'] . "</a>
                                            </td>

                                            <td class=\"product-price\">
                                                <span class=\"amount\">₪" . $row['payment_gross'] . ".00</span>
                                            </td>

                                            <td class=\"product-quantity\" >
                                                <div class=\"quantity buttons_added\" >
                                               ".$row['quantity']."
                                                </div>

                                            </td>

                                            <td class=\"product-subtotal\">
                                                <span class=\"amount\">₪" . $row['payment_gross'] * $row['quantity'] . ".00</span>
                                            </td>
                                        </tr>



";

            }
            return $empty1 . $empty . $empty2;
        }
    }
}

