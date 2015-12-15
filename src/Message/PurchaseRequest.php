<?php
/**
 * Openpay Purchase Request
 */

namespace Omnipay\Openpay\Message;

/**
 * Openpay Purchase Request
 *
 * To charge a credit card, you create a new charge object. If your API key
 * is in test mode, the supplied card won't actually be charged, though
 * everything else will occur as if in live mode. (Openpay assumes that the
 * charge would have completed successfully). 
 *
 * Example:
 *
 * <code>
 *   // Create a gateway for the Openpay Gateway
 *   // (routes to GatewayFactory::create)
 *   $gateway = Omnipay::create('Openpay');
 *
 *   // Initialise the gateway
 *   $gateway->initialize(array(
 *       'apiKey' => 'MyApiKey',
 *   ));
 *
 *   // Create a credit card object
 *   // This card can be used for testing.
 *   $card = new CreditCard(array(
 *               'firstName'    => 'Example',
 *               'lastName'     => 'Customer',
 *               'number'       => '4242424242424242',
 *               'expiryMonth'  => '01',
 *               'expiryYear'   => '2020',
 *               'cvv'          => '123',
 *               'email'                 => 'customer@example.com',
 *               'billingAddress1'       => '1 Scrubby Creek Road',
 *               'billingCountry'        => 'AU',
 *               'billingCity'           => 'Scrubby Creek',
 *               'billingPostcode'       => '4999',
 *               'billingState'          => 'QLD',
 *   ));
 *
 *   // Do a purchase transaction on the gateway
 *   $transaction = $gateway->purchase(array(
 *       'amount'                   => '10.00',
 *       'currency'                 => 'USD',
 *       'description'              => 'This is a test purchase transaction.',
 *       'card'                     => $card,
 *   ));
 *   $response = $transaction->send();
 *   if ($response->isSuccessful()) {
 *       echo "Purchase transaction was successful!\n";
 *       $sale_id = $response->getTransactionReference();
 *       echo "Transaction reference = " . $sale_id . "\n";
 *   }
 * </code>
 *
 * Because a purchase request in Openpay looks similar to an
 * Authorize request, this class simply extends the AuthorizeRequest
 * class and over-rides the getData method setting capture = true.
 *
 * @see \Omnipay\Openpay\Gateway
 * @link http://www.openpay.mx/en/docs/api/#charges
 */
class PurchaseRequest extends AuthorizeRequest
{
    public function getData()
    {
        $data = parent::getData();
        $data['capture'] = 'true';

        return $data;
    }
}
