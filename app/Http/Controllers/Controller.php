<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Dingo\Api\Routing\Helpers;

class Controller extends BaseController
{
    use Helpers;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showMsg($data = [], $errno = '200', $errmsg = 'SUCCESS')
    {
        $return['errno'] = $errno;
        $return['errmsg'] = $errmsg;
        $return['data'] = $data;
        if ($errno > 500) {
            return $this->response->array($return)->setStatusCode(200);
        }
        return $this->response->array($return)->setStatusCode($errno);
    }
}
