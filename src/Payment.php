<?php
namespace Epayindo;

class Payment {

    protected $auth;

    protected $token;

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
            'email' => $client_email
        ];
        $response = Api::post('/payment', $payload);

        return $response;
    }
}
