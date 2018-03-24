<?php
class PaymenthandlerController extends Controller {
    function view() {

    }

    function process($args = null) {
        $guid = $args;
        $sess = new Session();

        $model = $this->Paymenthandler;
        $model->selectAll('tbl_paypal')
              ->where('guid = :guid')
              ->_end();
        $model->prepare();
        $model->bindParam(':guid', $guid);

        $results = null;
        if($model->execute()) {
            $results = $model->getAll();
            $txn = $results[0];

            if(!$txn['txn_ok'] && empty($txn['txn_id'])) {
                // payment needs to be made
                $this->set('showpaypal', true);
                $this->set('guid', $guid);
            }

            if(!empty($txn['txn_id']) && $txn['txn_ok']) {
                $this->set('transactionprogress', true);
            }
        }
    }
}
