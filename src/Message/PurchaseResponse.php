<?php

namespace Omnipay\FreeKassa\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * FreeKassa Purchase Response.
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $redirectUrl = 'https://www.free-kassa.ru/merchant/cash.php';

    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->redirectUrl . '?' . http_build_query($this->getRedirectData());
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return $this->data;
    }
}
