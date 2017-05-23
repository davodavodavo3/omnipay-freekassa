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
        return $this->getParameter('purse');
    }

    public function setPurse($value)
    {
        return $this->setParameter('purse', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

	public function getDefaultParameters()
    {
        return [
            'purse' => '',
            'secretKey'     => '',
            'testMode'      => false,
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
