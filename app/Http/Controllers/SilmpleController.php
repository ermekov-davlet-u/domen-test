<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iodev\Whois\Factory;

class SilmpleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $domain = trim($request->get("test"));
        if (!filter_var($domain, FILTER_VALIDATE_DOMAIN))
        {
            return [
                "er" => false,
                "data" => "Некорректный домен!",
                "available" => true
            ];
        }
        if(empty($request->get("test"))){
            return [
                "er" => false,
                "data" => "Пусто",
                "available" => true
            ];
        }
        
        $whois = Factory::get()->createWhois();
        $domen = preg_replace('/\.+/', '.', $request->get("test"));
        $domen = preg_replace('/(http\:\/\/|https\:\/\/|\/\/)/', '', trim($domen));
        
        $domen = str_replace('www.', '', $domen);
        if ($whois->isDomainAvailable($domen)) {
            return [
                "er" => false,
                "data" => $domen,
                "available" => true,
                "date_reg" => date('d-m-y')
            ];
        }
        $info = $whois->loadDomainInfo($domain);
        return [
            "er" => false,
            "data" => $domen,
            "available" => false,
            "date_reg" => date("Y-m-d", $info->expirationDate)
        ];
    }
}
