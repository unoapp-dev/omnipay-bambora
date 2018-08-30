<?php

namespace Omnipay\Bambora\Message;

class RefundRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        $this->endpoint = $this->getTestMode() ? $this->getSandboxEndPoint() : $this->getProductionEndPoint();
        $transactionReference = json_decode($this->getTransactionReference());
        return $this->endpoint . '/payments/' . $transactionReference->id . '/returns';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getData()
    {
        $this->validate('amount', 'transactionReference');
        $transactionReference = json_decode($this->getTransactionReference());

        $data = [
            'amount' => $this->getAmount(),
            'order_number' => $transactionReference->order_number
        ];

        return json_encode($data);
    }
}
