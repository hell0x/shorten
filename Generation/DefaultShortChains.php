<?php
namespace Hell0x\Shorten\Generation;

use Hell0x\Shorten\Contracts\ShortUrl;

class DefaultShortChains implements ShortUrl
{

    public function __construct($config)
    {
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->domain = $config['domain'];
    }

    public function BatchShortChains(array $urls)
    {
        $domain = $this->domain;
        $info['username'] = $this->username;
        $info['password'] = $this->password;
        $info['urls'] = $urls;
        $ret = $this->GetJsonData($domain, $info);
        echo json_encode($ret);
    }

    /**
     * @param $urls
     * @param array $info
     * @param array $header
     * @return mixed
     */
    private function GetJsonData($domain, $info = array(), $header = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $domain);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 设置请求方式为post
        curl_setopt($ch, CURLOPT_POST, true);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($info));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $output = json_decode(curl_exec($ch));
        curl_close($ch);

        return $output;
    }
}