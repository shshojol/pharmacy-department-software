<?php 
require_once '../vendor/autoload.php';

  include "../include/db_conn.php";
  $invoice_number = $_GET['id'];
  $sql = "select * from new_purchase where invoice_number = {$invoice_number}";
  $table = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($table);
  //echo $row['supplier_name'];
  $html = '<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Example 1</title>
      <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
      <header class="clearfix">
        
        <h1>PURCHASE INVOICE</h1>
        <div id="company" class="clearfix">
          <div>The Computer Ltd</div>
          <div>455 Scount Bhavan,<br /> AZ 85004, Polton</div>
          <div>+880 1677777777</div>
          <div>xyz@example.com</div>
        </div>';
        $supplier_query = "select * from suppliers where id = {$row['supplier_name']}"; 
        $supplier_detail = mysqli_query($conn, $supplier_query);
        $supplier_row = mysqli_fetch_assoc($supplier_detail);
    //echo $html;
    $html .= "
        <div id=\"project\">
        <div><span>INVOICE </span>".$row['invoice_number']."</div>
        <div><span>SUPPLIER </span>".$supplier_row['NAME']."</div>
        <div><span>ADDRESS</span>".$supplier_row['ADDRESS']."</div>
        <div><span>EMAIL</span>".$supplier_row['EMAIL']."</div>
        <div><span> DATE</span>". $row['purchase_date']."</div>
        <div><span> PAYMENT</span>". $row['payment_type']. "</div>
      </div>
    </header>
    
    ";
    $html .= "
      <main>
      <table>
        <thead>
          <tr>
            <th class=\"service\">SERVICE</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
      ";
            $pro = $row['product'];
            $product = explode(",", $pro);
            $rate = explode(",", $row['rate']);
            $qty = explode(",", $row['qty']);
            $amount = explode(",", $row['amount']);
            $pro_num = count($product);
            for($i = 0; $i < $pro_num; $i++){
    $html .= "
          
          <tr>
            <td class=\"service\">".$product[$i]."</td>
            <td class=\"unit\">". $rate[$i]."</td>
            <td class=\"qty\">". $qty[$i]."</td>
            <td class=\"total\">TK. ". $amount[$i]."</td>
          </tr>
          
    ";
            }

    $html .= '
    <tr>
    <td  class="grand total">TOTAL QUANTITY</td>
    <td class="grand total">'.$row['total_qty'].' PCS.</td>
    <td  class="grand total">GRAND TOTAL</td>
    <td class="grand total">TK. '.$row['total_amt'].'</td>
  </tr>
  
</tbody>
</table>
<div id="notices">
<div>Signature:</div>
<div class="notice">________________________</div>
</div>
</main>

</body>
</html>
    ';

    $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file = time().'.pdf';
$mpdf->Output($file, 'D');
?>


      
    

          
          
          


