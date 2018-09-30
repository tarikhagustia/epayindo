<?php
namespace Epayindo;
class Auth {
    protected $email;
    protected $api_key;

    public function __construct(string $email, string $api_key){
        $this->email = $email;
        $this->api_key = $api_key;
    }

    public function getAccessToken() : Token {
        $response = Api::post('/access_token', [
          'email' => $this->email,
          'api_key' => $this->api_key
        ]);

        $token = new Token();
        $token->setType($response->type);
        $token->setAccess_token($response->access_token);
        $token->setExpired_at($response->expired_at);
        return $token;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return static
     */
    public function setEmail($email)
    {
      $this->email = $email;
      return $this;
    }

    /**
     * @return mixed
     */
    public function getApi_key()
    {
      return $this->api_key;
    }

    /**
     * @param mixed $api_key
     *
     * @return static
     */
    public function setApi_key($api_key)
    {
      $this->api_key = $api_key;
      return $this;
    }
}
