<?php
//session_start();
include('include/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border-rounded bg-light my-5">
            <h1>my cart</h1>
        </div>
        <div class="col-lg-8">
            <!-- <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $key => $value) {
                    ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $value['item_name']; ?></td>
                            <td class="price"><?php echo $value['item_price']; ?></td>
                            <td><input type="number"  name="quantity" class="qty"></td>
                            <td class="amount"></td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table> -->
            <form action="#" method="post">
                <table id="myTable" border="1">
                    <thead>
                        <tr>
                            <th>Product name</th>
                            <th>Product Price</th>
                            <th>Qty</th>
                            <th align="center"><span id="amount" class="amount">Amount</span> </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td align="right"><span id="total">TOTAL</span>
                                <input type="text" disabled class="total" id="total" name="total">
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($_SESSION['cart'] as $key => $value) {
                        ?>
                            <tr>
                                <!-- <td class="item"><?php echo $value['item_name']; ?></td> -->
                                <td>
                                    <input type="text" class="item" disabled value="<?php echo $value['item_name']; ?>" name="item[]">
                                </td>
                                <td>
                                    <input type="text" disabled value="<?php echo $value['item_price']; ?>" class="price" name="price[]">
                                </td>
                                <td>
                                    <input type="text" class="qty" name="qty[]" value="1">
                                </td>

                                <td align="center">
                                    <input type="text" disabled class="amount" id="amount" name="amount[]" />
                                </td>
                                <td><button class="btn btn-sm btn-outline-danger del">Remove</button></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-3">
            <div class="border bg-light rounded p-4">
                <span>Total:</span>
                <span id="g_total" disabled class="text-right total"></span>
                <br><br>
                <form action="">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" checked>
                        Cash On Delivery
                    </div><br>
                    <button id="make_purchase" class="btn btn-primary btn-block">Make Purchase</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
include "include/footer.php";
?>

<script>
    $(document).ready(function() {

        update_amounts();
        $('.qty').keyup(function() {
            update_amounts();
        });

        $(document).on('click', '.del', function() {
            var rr = $(this).closest('tr');
            rr.remove();
            update_amounts();
        });

        $('#make_purchase').click(function(e) {
            e.preventDefault();
            var arr_item = [];
            $("input.item").each(function(){
                arr_item.push($(this).val());
            });

            var arr_price = [];
            $("input.price").each(function(){
                arr_price.push($(this).val());
            });

            var arr_qty = [];
            $("input.qty").each(function(){
                arr_qty.push($(this).val());
            });

            var arr_amount = [];
            $("input.amount").each(function(){
                arr_amount.push($(this).val());
            });

            var total = $('.total').val();

            
            if (confirm("Are sure you want purchase this item?")) {
                $.ajax({

                    url: 'cart_action.php',
                    method: 'post',
                    data: {name: arr_item, price: arr_price, qty: arr_qty, amount: arr_amount, total: total},
                    success: function(data) {
                        // alert('Sale Succesfully');
                        // window.location.href = 'manage_sale.php';
                        alert(data);
                        window.location.href="all-item.php";

                    }
                });
            } 

        });
    });


    function update_amounts() {
        var sum = 0.0;

        $('#myTable > tbody  > tr').each(function() {
            var qty = $(this).find('.qty').val();
            qty = qty || 0;
            var price = $(this).find('.price').val();
            var amount = (parseFloat(qty) * parseFloat(price))
            sum += amount;
            $(this).find('.amount').val('' + amount);
        });
        //just update the total to sum  
        $('.total').val(sum);
        $('.total').text(sum);

    }
</script>