<?php


namespace Src;


class Methods extends Request
{

    public function SendWithArray($module, $function, $username, array $params = []){

        $array = array_merge([
            'cpanel_jsonapi_version' => 2,
            'cpanel_jsonapi_module' => $module,
            'cpanel_jsonapi_func' => $function,
            'cpanel_jsonapi_user' => $username,
        ], $params);

        $parameter = http_build_query($array);
        $protocol = ($this->port == 2086) ? "http" : "https";
        $query = "$protocol://{$this->domain}:{$this->port}/json-api/cpanel?$parameter";
        return $this->SendRequest($query);

    }

    public function SendWithQuery($query){

        $protocol = ($this->port == 2086) ? "http" : "https";
        $query = "$protocol://{$this->domain}:{$this->port}/json-api/cpanel?$query";
        return $this->SendRequest($query);

    }
}