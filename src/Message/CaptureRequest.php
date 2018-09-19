<?php

namespace Omnipay\Bambora\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class CaptureRequest extends AbstractRequest
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
        
        return $this->endpoint . '/payments/' . $transactionReference->id . '/completions';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getData()
    {
        $this->validate('transactionReference');
    
        try {
            $transactionReference = json_decode($this->getTransactionReference());
        }
        catch (\Exception $e) {
            throw new InvalidRequestException('Invalid transaction reference');
        }

        $data = [
            'amount' => $transactionReference->amount
        ];

        return json_encode($data);
    }
}
