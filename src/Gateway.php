<?php

namespace Omnipay\FreeKassa;

use Omnipay\Common\AbstractGateway;

/**
 * Gateway Class
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'FreeKassa';
    }

    public function getPurse()
    {
        return $this->getParameter('merchant_id');
    }

    public function setPurse($value)
    {
        return $this->setParameter('merchant_id', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secret_key');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secret_key', $value);
    }

	public function getDefaultParameters()
    {
        return [
            'merchant_id'	=> '',
            'secret_key'	=> '',
            'testMode'	=> false,
        ];
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\FreeKassa\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\FreeKassa\Message\CompletePurchaseRequest', $parameters);
    }
}
