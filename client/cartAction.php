<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'dbConfig.php';
//add to cart action
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get route details
        $query = $db->query("SELECT * FROM route WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'route_name' => $row['route_name'],
            'price' => $row['price'],
            'company' => $row['company'],
            'qty' => 1,
            'time' => $row['travel_time']
        );

        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    }
    elseif ($_REQUEST['action'] == 'addreturntocart' && !empty($_REQUEST['id'])) {
      //echo "return imeanza sasa hivi";
      $productID = $_REQUEST['id'];
      // get route details
      $query = $db->query("SELECT * FROM route WHERE id = ".$productID);
      $row = $query->fetch_assoc();
      $itemData = array(
          'id' => $row['id'],
          'route_name' => $row['route_name'],
          'price' => $_SESSION['returntrip'],
          'company' => $row['company'],
          'qty' => 1,
          'time' => $row['travel_time']

      );

      $insertItem = $cart->insert($itemData);
      $redirectLoc = $insertItem?'viewCart.php':'index.php';
      header("Location: ".$redirectLoc);
    }
    elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['userid'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO booking (customer_id, total_price, created, modified,status) VALUES ('".$_SESSION['userid']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '', '0')");
        //insert ticket details for return trip
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, route_id, quantity,company_name) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."','".$item["company"]."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            //send mail
            require '../assets/libs/PHPMailer/vendor/autoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "busreservationkenya@gmail.com";
            $mail->Password = "nelly123456";
            $mail->setFrom(' busreservationkenya@gmail.com', 'Bus Reservation System');
            $mail->addAddress('gathoninelly5@gmail.com');//person message is being sent to
            $mail->Subject = 'BUS RESERVATION SYSTEM';
            $mail->Body    = <<<EOT
            Here is your ticket, please show it to a company manager before boarding the bus
            Order id: {$orderID}
            Route id: {$item['id']}
            Number of Tickets: {$item['qty']}
            Company {$item["company"]}
EOT;
            $mail->AltBody = <<<EOT
            Here is your ticket, please show it to a company manager before boarding the bus
            Order id: {$orderID}
            Route id: {$item['id']}
            Number of Tickets: {$item['qty']}
            Company {$item["company"]}
EOT;
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }

            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}
