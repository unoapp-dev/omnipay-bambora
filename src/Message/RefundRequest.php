<?php

namespace Omnipay\Bambora\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class RefundRequest extends AbstractRequest
{
    public function getEndpoint()
    {
        $this->endpoint = $this->getTestMode() ? $this->getSandboxEndPoint() : $this->getProductionEndPoint();
    
        try {
            $transactionReference = json_decode($this->getTransactionReference());
        }
        catch (\Exception $e) {
            throw new InvalidRequestException('Invalid transaction reference');
        }
        
        return $this->endpoint . '/payments/' . $transactionReference->id . '/returns';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getData()
    {
        $this->validate('amount', 'transactionReference');
    
        try {
            $transactionReference = json_decode($this->getTransactionReference());
        }
        catch (\Exception $e) {
            throw new InvalidRequestException('Invalid transaction reference');
        }

        $data = [
            'amount' => $this->getAmount(),
            'order_number' => $transactionReference->order_number
        ];

        return json_encode($data);
    }
}
