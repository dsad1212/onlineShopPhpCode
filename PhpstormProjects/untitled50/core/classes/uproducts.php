<?php

class products
{
    protected $photo;
    protected $photo1;
    protected $photo2;
    protected $name;
    protected $quantity;
    protected $desc;
    protected $price;
    protected $fix;
    protected $mkdir;

    public function upload($x)
    {
        $target_dir = 'img/';
        $target_file = $target_dir.basename($x["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($x["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";

                $uploadOk = 0;
            }
        }
// Check if file already exists

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 7000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return 0;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($x["tmp_name"], $target_file)) {
                echo "The file " . basename($x["name"]) . " has been uploaded.";
                $this->photo = basename($x["name"]);
                return 1;
            } else {

                echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }
    public function upload1($x,$name)
    {
        $target_dir = 'img/'.$name.'/';
        $target_file = $target_dir.basename($x["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($x["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";

                $uploadOk = 0;
            }
        }
// Check if file already exists

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return 0;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($x["tmp_name"], $target_file)) {
                echo "The file " . basename($x["name"]) . " has been uploaded.";
                $this->photo1 = basename($x["name"]);
                return 1;
            } else {

                echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }
    public function upload2($x,$name)
    {
        $target_dir = 'img/'.$name.'/';
        $target_file = $target_dir.basename($x["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($x["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";

                $uploadOk = 0;
            }
        }
// Check if file already exists

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            return 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return 0;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($x["tmp_name"], $target_file)) {
                echo "The file " . basename($x["name"]) . " has been uploaded.";
                $this->photo2 = basename($x["name"]);
                return 1;
            } else {

                echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }
    public function setmkdir($name)
    {
        mkdir('img/'.$name);

    }
    public function setProductName($name)
    {
        $this->name = $name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function setQuantity($q)
    {
        $this->quantity = $q;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getUpload()
    {
        return $this->photo;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getPhoto1()
    {
        return $this->photo1;
    }
    public function getPhoto2()
    {
        return $this->photo2;
    }


    public function getQuantity()
    {

        return $this->quantity;
    }

    public function insertProduct($name,$quantity,$upload,$desc,$price,$photo1,$photo2,$id,$conn)
    {




        $sql = "INSERT INTO products(rate,price,desc1,quantity,product_name,image,quantity1,secimage,timage,product_id)VALUES(5,'$price','$desc','$quantity','$name','$upload','$quantity','$photo1','$photo2','$id')";
        $conn->query($sql);
    }
}
