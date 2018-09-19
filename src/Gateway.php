<?php

namespace Omnipay\Bambora;

use Omnipay\Common\AbstractGateway;

/**
 * Bambora Gateway
 * @link https://dev.na.bambora.com/docs/guides/merchant_quickstart/calling_APIs
 */

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Bambora';
    }

    public function getDefaultParameters()
    {
        return [
            'productionEndPoint' => '',
            'sandboxEndPoint' => '',
            'merchantId' => '',
            'profilePasscode' => '',
            'transactionPasscode' => ''
        ];
    }

    public function getSandboxEndPoint()
    {
        return $this->getParameter('sandboxEndPoint');
    }

    public function setSandboxEndPoint($value)
    {
        return $this->setParameter('sandboxEndPoint', $value);
    }

    public function getProductionEndPoint()
    {
        return $this->getParameter('productionEndPoint');
    }
    
    public function setProductionEndPoint($value)
    {
        return $this->setParameter('productionEndPoint', $value);
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }

    public function getProfilePasscode()
    {
        return $this->getParameter('profilePasscode');
    }

    public function setProfilePasscode($value)
    {
        return $this->setParameter('profilePasscode', $value);
    }

    public function getTransactionPasscode()
    {
        return $this->getParameter('transactionPasscode');
    }

    public function setTransactionPasscode($value)
    {
        return $this->setParameter('transactionPasscode', $value);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\CreateCardRequest', $parameters);
    }

    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\DeleteCardRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\PurchaseRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\RefundRequest', $parameters);
    }
    
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\AuthorizeRequest', $parameters);
    }
    
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Bambora\Message\CaptureRequest', $parameters);
    }
}

