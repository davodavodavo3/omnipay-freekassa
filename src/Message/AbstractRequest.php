<?php

namespace Omnipay\FreeKassa\Message;

/**
 * FreeKassa Abstract Request.
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $zeroAmountAllowed = false;

    /**
     * Get the merchant id.
     * @return string merchant id
     */
    public function getMerchantId()
    {
        return $this->getParameter('merchant_id');
    }

    /**
     * Set the merchant id.
     * @param string $merchant_id
     * @return self
     */
    public function setMerchantId($value)
    {
        return $this->setParameter('merchant_id', $value);
    }

    /**
     * Get the secret key.
     * @return string secret key
     */
    public function getSecretKey()
    {
        return $this->getParameter('secret_key');
    }

    /**
     * Set the secret key.
     * @param string $key secret key
     * @return self
     */
    public function setSecretKey($value)
    {
        return $this->setParameter('secret_key', $value);
    }
}
