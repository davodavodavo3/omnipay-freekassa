<?php

namespace Omnipay\FreeKassa\Message;

/**
 * FreeKassa Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    public function getCurrency()
    {
        return $this->getParameter('currency');
    }

    public function setCurrency($value)
    {
        return $this->setParameter('currency', $value);
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getSignature()
    {
        return $this->getParameter('signature');
    }

    public function setSignature($value)
    {
        return $this->setParameter('signature', $value);
    }

    public function getOrderId()
    {
        return $this->getParameter('order_id');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('order_id', $value);
    }

    public function getClient()
    {
        return $this->getParameter('client');
    }

    public function setClient($value)
    {
        return $this->setParameter('client', $value);
    }

    public function getTime()
    {
        return $this->getParameter('time');
    }

    public function setTime($value)
    {
        return $this->setParameter('time', $value);
    }

    public function getData()
    {
        $this->validate(
            'merchant_id',
            'amount',
            'currency',
            'description',
            'returnUrl',
            'cancelUrl',
            'notifyUrl'
        );
        $sign = md5($this->getMerchantId() . ':' . $this->getAmount() . ':' . $this->getSecretKey() . ':' . $this->getOrderId());

        return [
            'm' => $this->getMerchantId(),
            'oa' => $this->getAmount(),
            'o' => $this->getOrderId(),
            'i' => strtolower($this->getCurrency()),
            's' => $sign,
            'lang' => $this->getLanguage(),
            'us_time' => $this->getTime(),
            'us_client' => $this->getClient(),
            'us_system' => 'freekassa',
        ];
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}
