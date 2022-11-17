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
        if(parse_url('https://'.$domen)) {
            $domen_ar = parse_url('http://'.$domen); 
            $domen = $domen_ar['host']; 
        }
        $domen = str_replace('www.', '', $domen);
        if ($whois->isDomainAvailable($domen)) {
            return [
                "er" => false,
                "data" => $domen,
                "available" => true
            ];
        }
        return [
            "er" => false,
            "data" => $domen,
            "available" => false
        ];
    }
}
