<?php
/**
 * Openpay Delete Customer Request
 */

namespace Omnipay\Openpay\Message;

/**
 * Openpay Delete Customer Request
 *
 * Permanently deletes a customer. It cannot be undone. Also immediately
 * cancels any active subscriptions on the customer. 
 *
 * @link http://www.openpay.mx/en/docs/api/#delete_customer
 */
class DeleteCustomerRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('customerReference');

        return null;
    }

    public function getHttpMethod()
    {
        return 'DELETE';
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/customers/' . $this->getCustomerReference();
    }
}
