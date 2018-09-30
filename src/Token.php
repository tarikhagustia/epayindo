<?php

namespace Epayindo;

class Token {
    protected $type;
    protected $access_token;
    protected $expired_at;

    public function __construct(){
      if (session_status() == PHP_SESSION_NONE) {
          session_start();
      }        
    }
    /**
     * @return mixed
     */
    public function getType()
    {
      return ($_SESSION['token_type']) ? $this->type : null;
    }

    /**
     * @param mixed $type
     *
     * @return static
     */
    public function setType($type)
    {
      $this->type = $type;
      $_SESSION['token_type'] = $type;
      return $this;
    }

    /**
     * @return mixed
     */
    public function getAccess_token()
    {
      return ($_SESSION['access_token']) ? $this->access_token : null;
    }

    /**
     * @param mixed $access_token
     *
     * @return static
     */
    public function setAccess_token($access_token)
    {
      $this->access_token = $access_token;
      $_SESSION['access_token'] = $access_token;
      return $this;
    }

    /**
     * @return mixed
     */
    public function getExpired_at()
    {
      return ($_SESSION['expired_at']) ? $this->expired_at : null;
    }

    /**
     * @param mixed $expired_at
     *
     * @return static
     */
    public function setExpired_at($expired_at)
    {
      $this->expired_at = $expired_at;
      $_SESSION['access_token'] = $expired_at;
      return $this;
    }

}
