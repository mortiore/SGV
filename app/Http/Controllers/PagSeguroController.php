<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Produto;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
require_once('../vendor/autoload.php');
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Http;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;

class PagSeguroController extends Controller
{

    public function autorizacao(Request $req){
    $usuario = Session::get('usuario');
    $cart = Session::get('cart');
    $client = new Client();
    $userName = $usuario[0]["nome"];
    $userEmail = $usuario[0]["email"];
    if($req->session()->exists('usuario')){
    /*$resposta = $client->request('GET',
    'https://api.github.com/users/mortiore'
    );

    $dados = json_decode($resposta->getBody());
    dd($dados);
    echo '<strong>Usuário:</strong>'. $dados->login. '<br />';
    echo '<strong>Usuário:</strong>'. $dados->name. '<br />';
    echo '<strong>Usuário:</strong>'. $dados->bio. '<br />';*/
    //TOKEN SANDBOX = 11A5E76626D4403CB175419E3DBBDCD9
    //TOKEN PRODUCAO = ef12909f-2a98-4a29-82f9-be1bd3b3cca1660d6c4349f48d27817eecb91da1e7118852-0924-4bdb-be36-e77bc2ab73f7
    //URL SANDBOX = https://ws.sandbox.pagseguro.uol.com.br/v2/checkout?
    //URL PRODUCAO = https://ws.pagseguro.uol.com.br/v2/checkout?
    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout?email=fabio_araujo45@hotmail.com&token=11A5E76626D4403CB175419E3DBBDCD9&currency=BRL';

    for($i = 1;$i <= count($cart); $i++){
        $url .= '&itemId'.$i.'='.$i;
        $url .= '&itemDescription'.$i.'='.$cart[$i-1]['nome'];
        $url .= '&itemAmount'.$i.'='.$cart[$i-1]['valor'];
        $url .= '&itemQuantity'.$i.'='.$cart[$i-1]['qtd'];
        $url .= '&itemWeight'.$i.'=1000';
    }

    /*print_r($url);
    die();*/

    $resposta = $client->request('POST', $url.'&reference=REF1234&senderName=""&senderAreaCode=""&senderPhone=""&senderEmail='.$userEmail.'&shippingType=1&shippingAddressStreet=""&shippingAddressNumber=""&shippingAddressComplement=""&shippingAddressDistrict=""&shippingAddressPostalCode=00000000&shippingAddressCity=""&shippingAddressState=""&shippingAddressCountry=BRA', [
        //'body' => '{"currency":"BRL","item: 1":"string","item: description":"string","item: amount":"string","item: quantity":"string"}',
        'headers' => [
            //'Accept' => 'application/xml',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=ISO-8859-1',
        ],
    ]);

    $resposta = $resposta->getBody()->__toString();
    $xml  = simplexml_load_string($resposta);
    //dd($resposta->getBody()->__toString());
    //dd($xml->code);
    //echo $xml->code;
    $code = $xml->code;

    //$code = "https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=$code";

    //URL SANDBOX = https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=$code
    //URL PRODUCAO = https://pagseguro.uol.com.br/v2/checkout/payment.html?code=$code
    /*$redirect = $client->request('GET', "https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=$code", [
        'headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
        ],
      ]);*/

    return redirect("https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=$code");

    //dd($redirect);

    //return view('ecommerce.testepagseguro');
    }else{
    echo"<script language='javascript' type='text/javascript'>
        alert('Faça o login para finalizar sua compra.');window.location
        .href='/login';</script>";
    }

    }
    public function redirect(){
        return view('ecommerce.escolheopcao');
    }

    /*public function autorizacao(){
        $Data["email"]="fabio_araujo45@hotmail.com";
        $Data["token"]="11A5E76626D4403CB175419E3DBBDCD9";
        $Data["currency"]="BRL";
        $Data["itemId1"]="1";
        $Data["itemDescription1"]="Website desenvolvido pela WEF.";
        $Data["itemAmount1"]="1000.00";
        $Data["itemQuantity1"]="1";
        $Data["itemWeight1"]="1000";
        $Data["reference"]="83783783737";
        $Data["senderName"]="João da Silva";
        $Data["senderAreaCode"]="37";
        $Data["senderPhone"]="99999999";
        $Data["senderEmail"]="c51994292615446022931@sandbox.pagseguro.com.br";
        $Data["shippingType"]="1";
        $Data["shippingAddressStreet"]="Rua Antonieta";
        $Data["shippingAddressNumber"]="10";
        $Data["shippingAddressComplement"]="Casa";
        $Data["shippingAddressDistrict"]="Jardim Paulistano";
        $Data["shippingAddressPostalCode"]="30690090";
        $Data["shippingAddressCity"]="Belo Horizonte";
        $Data["shippingAddressState"]="MG";
        $Data["shippingAddressCountry"]="BRA";

        $BuildQuery=http_build_query($Data);
        $Url="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";

        $Curl=curl_init($Url);
        curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl,CURLOPT_POST,true);
        curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
        $Retorno=curl_exec($Curl);
        curl_close($Curl);

        $Xml=simplexml_load_string($Retorno);
        echo $Xml->code;
    }

    public function index() {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
     }*/


}
