<?php
/*
 * @Author: 一男 minzufeng@vip.qq.com
 * @Date: 2023-10-19 09:08:47
 * @LastEditors: 一男 minzufeng@vip.qq.com
 * @LastEditTime: 2023-10-19 11:16:54
 * @Description: 
 */

namespace Wengg\WebmanApiSign;
use support\exception\BusinessException;
use Webman\Http\Request;
use Webman\Http\Response;

class ApiSignException extends BusinessException
{
    const PARAMS_ERROR = 1000; //参数错误
    const APPKEY_NOT_FOUND = 1001; //appid未找到
    const APPKEY_DISABLE = 1002; //appid已禁用
    const APPKEY_EXPIRED = 1003; //appid已过期
    const SIGN_VERIFY_FAIL = 1004; //签名验证失败
    const SIGN_TIMEOUT = 1005; //签名超时
    const REQUEST_INVALID = 1006; //请求失效
    const APPKEY_ERROR = 1007; //app_key解析错误
    const BODY_ERROR = 1008; //encrypt_body解析错误
    const BODY_EMPTY = 1009; //encrypt_body加密报文不存在
    const JSON_ERROR = 1010; //加密报文必须为JSON字符串
    
    public function render(Request $request): ?Response
    {
        return json(['code' => $this->getCode() ?: 401, 'msg' => $this->getMessage(),'time' => time(),'data'=>[]]);
    }
}
