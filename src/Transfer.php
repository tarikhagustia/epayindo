<?php
namespace Epayindo;

class Transfer {

    protected $auth;

    protected $token;

    protected $to;

    protected $amount;

    protected $note;

    public function __construct(Auth $auth){
      $this->auth = $auth;
      $this->token = $auth->getAccessToken();
    }

    public function to(string $merchant_username, float $amount, $note = ''){
      $this->to = $merchant_username;
      $this->amount = $amount;
      $this->note = $note;
      return $this;
    }

    public function send(){
      $response = Api::post('/money_transfer', [
          'access_token' => $this->token->getAccess_token(),
          'email' => $this->auth->getEmail(),
          'receiver' => $this->to,
          'amount' => $this->amount,
          'note' => $this->note,
      ]);

      return $response;
    }
}
