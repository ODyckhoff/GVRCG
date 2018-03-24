<div class="w3-content">

<?php
$sess = new Session();

if($sess->sessionIsSet('error')) {
    print_r($sess->sessionGet('error'));
}

if(isset($showpaypal)) {
?>
<h1>Select Membership Type</h1>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="V64MBE2WFKKFN">
        <table>
            <tr>
                <td>
                    <input type="hidden" name="on0" value="Membership Types">Membership Types
                </td>
            </tr>
            <tr>
                <td>
                    <select name="os0">
                        <option value="Adult Membership">Adult Membership £12.50 GBP</option>
                        <option value="Senior Membership">Senior Membership £10.00 GBP</option>
                        <option value="Junior Membership">Junior Membership £5.00 GBP</option>
                        <option value="Family Membership">Family Membership £30.00 GBP</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="hidden" name="currency_code" value="GBP"> 
        <input type="hidden" name="invoice" value="<?php echo $guid; ?>">
        <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
    </form>

<?php
}

if(isset($transactionprogress)) {
    echo "Payment was successful! Thank you for supporting us!";
}
