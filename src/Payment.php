<?php
namespace Epayindo;

class Payment {

    protected $auth;

    protected $token;
    /**
     * Option data for passing into epayindo comment (it will be use as POST data)
     * @var array
     */
    protected $options = [];

    public function __construct(Auth $auth){
        $this->auth = $auth;
        $this->token = $auth->getAccessToken();
    }

    public function createPayment($merchant_username, $client_email, float $amount, array $basket){
        $basket_string = '';
        foreach ($basket as $key => $item) {
            $basket_string .= implode(',', $item).';';
        }
        $payload = [
            'access_token' => $this->token->getAccess_token(),
            'merchant_receiver' => $merchant_username,
            'basket' => $basket_string,
            'amount' => $amount,
            'email' => $this->auth->getEmail(),
            'customer_email' => $client_email,
        ];
        if (count($this->options) > 0) {
            foreach ($this->options as $key => $option) {
              $payload[$key] = $option;
            }
        }
        $response = Api::post('/payment', $payload);

        return $response;
    }

    /**
     * Method to set Options
     * @method setOption
     * @param  array     $opts options array
     */
    public function setOptions(array $opts){
      $this->options = $opts;
      return $this;
    }
}
