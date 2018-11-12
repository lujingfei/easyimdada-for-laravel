<?php
namespace Geoff\EasyImdada\Kernel;

use Geoff\EasyImdada\Data\DadaConstant;

class DataRequestClient{
    private $uri,$params;

    public function __construct($uri, $params)
    {
        $this->uri = $uri;
        $this->params = $params;
    }

    /**
     * 请求调用api
     * @return
     */
    public function makeRequest(){
        $reqParams = $this->bulidRequestParams();
        $response = $this->getHttpRequestWithPost($this->getUri(), json_encode($reqParams));
        return $this->parseResponseData($response);
    }

    /**
     * 构造请求数据
     * data:业务参数，json字符串
     */
    public function bulidRequestParams(){
        $app_key = config('easyimdada.app_key');
        $format = config('easyimdada.format');
        $version = config('easyimdada.v');
        $source_id = config('easyimdada.source_id');

        $requestParams = array();
        $requestParams['app_key'] = $app_key;
        $requestParams['body'] = $this->getParams();
        $requestParams['format'] = $format;
        $requestParams['v'] = $version;
        $requestParams['source_id'] = $source_id;
        $requestParams['timestamp'] = time();
        $requestParams['signature'] = $this->_sign($requestParams);
        return $requestParams;
    }

    /**
     * 签名生成signature
     */
    public function _sign($data){

        $app_secret = config('easyimdada.app_secret');

        //1.升序排序
        ksort($data);

        //2.字符串拼接
        $args = "";
        foreach ($data as $key => $value) {
            $args.=$key.$value;
        }
        $args = $app_secret . $args . $app_secret;
        //3.MD5签名,转为大写
        $sign = strtoupper(md5($args));

        return $sign;
    }

    /**
     * 发送请求,POST
     * @param $url指定URL完整路径地址
     * @param $data请求的数据
     */
    public function getHttpRequestWithPost($uri, $data){

        $url = config('easyimdada.host') . $uri;

        // json
        $headers = array(
            'Content-Type: application/json',
        );
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $resp = curl_exec($curl);
        var_dump( curl_error($curl) );//如果在执行curl的过程中出现异常，可以打开此开关查看异常内容。
        $info = curl_getinfo($curl);
        curl_close($curl);
        if (isset($info['http_code']) && $info['http_code'] == 200) {
            return $resp;
        }
        return '';
    }

    /**
     * 解析响应数据
     * @param $arr返回的数据
     * 响应数据格式：{"status":"success","result":{},"code":0,"msg":"成功"}
     */
    public function parseResponseData($arr){
        $resp = new DataResponse();
        if (empty($arr)) {
            $resp->setStatus(DadaConstant::FAIL);
            $resp->setMsg(DadaConstant::FAIL_MSG);
            $resp->setCode(DadaConstant::FAIL_CODE);
        }else{
            $data = json_decode($arr, true);
            $resp->setStatus($data['status']);
            $resp->setMsg($data['msg']);
            $resp->setCode($data['code']);
            $resp->setResult($data['result']);
        }
        return $resp;
    }

    public function getUri(){
        return $this->uri;
    }

    public function getParams(){
        return $this->params;
    }
}