<td><?php echo $item["price"].' kshs'; ?></td>
<td><?php echo $item["company"]; ?></td>
<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
<td><?php echo $item["subtotal"].' Kshs'; ?></td>


<!--<h3>Route Details</h3>
<p><?php echo $item["route_name"]; ?></p>
<h3>Price</h3>
<p><?php echo $item["price"].' kshs'; ?></p>
<h3>Company</h3>
<p><?php echo $item["company"]; ?></p> -->
