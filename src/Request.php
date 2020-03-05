<?php


namespace Src;


class Request
{
    protected $api_key;
    protected $domain;
    protected $password;
    protected $user;
    protected $port = 2087 ;
    protected $type ;


    public function __construct($data = [])
    {
        $this->api_key = @$data['api_key'];
        $this->password = @$data['password'];
        $this->user = $data['username'];
        $this->domain = $data['host'];
        $port = (@$data['port'] == 2086 ) ? 2086 : 2087;
        $type = (empty($data['password'])) ? 'hash' : 'password';
        $this->port = $port;
        $this->type = $type;
    }


    private function createHeader(){
        if($this->type == 'hash')
            return "Authorization: whm {$this->user}:{$this->api_key}";
        else if($this->type == 'password'){
            return 'Authorization: Basic ' . base64_encode($this->user . ':' .$this->api_key);
        }
    }


    protected function SendRequest($query){
        if($this->Auth() == 1) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $header[0] = $this->createHeader();
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_URL, $query);
            return curl_exec($curl);
        } else {
            return $this->Auth();
        }
    }

    protected function Auth()
    {
        if(empty($this->domain)){
            return json_encode(['status' => false, 'error' => 'Host is not set']);
        } else if(empty($this->password) and empty($this->api_key)){
            return json_encode(['status' => false, 'error' => 'Password or API_KEY is not set']);
        } else if(empty($this->user)){
            return json_encode(['status' => false, 'error' => 'Username is not set']);
        }
        return 1;
    }
}