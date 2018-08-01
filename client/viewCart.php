<?php
include 'layout/head.php';
include 'layout/nav.php';
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<div class="container">
    <h1>The Choosen tickets</h1>
    <p><?php echo date('l jS \of F Y h:i:s A'); ?></p>
    <table class="table">
    <thead>
        <tr>
            <th>Route</th>
            <th>Price</th>
            <th>Company</th>
            <th>Number of tickets</th>
            <th>E.T.D</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["route_name"]; ?></td>
            <td><?php echo $item["price"].' kshs'; ?></td>
            <td><?php echo $item["company"]; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo $item['time']; ?></td>
            <td><?php echo $item["subtotal"].' Kshs'; ?></td>
            <td></td>
            <td>
                <!--<a href="cartAction.php?action=updateCartItem&id=" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i></a>-->
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>East or west home is best but were not encouraging you to stay home</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Booking</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo $cart->total().' Kshs'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <!-- JS STARTS HERE -->

    <!-- JS ENDS HERE -->
</div>
</body>
<?php ?>
</html>
