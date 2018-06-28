<?php


require_once "../modelos/rutas.php";
require_once "../modelos/carrito.modelo.php";

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class Paypal {

    static public function mdlPagoPaypal($datos) {
        require __DIR__ . '/bootstrap.php';
        $tituloArray = explode(",", $datos["tituloArray"]);
        $cantidadArray = explode(",", $datos["cantidadArray"]);
        $valorItemArray = explode(",", $datos["valorItemArray"]);
        $idProductos = str_replace(",", "-", $datos["idProductoArray"]);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item = array();
        $variosItem = array();

        for ($i = 0; $i < count($tituloArray); $i++) {
            $item[$i] = new Item();
            $item[$i]->setName($tituloArray[$i])
                    ->setCurrency($datos["divisa"])
                    ->setQuantity($cantidadArray[$i])
                    ->setPrice($valorItemArray[$i] / $cantidadArray[$i]);

            array_push($variosItem, $item[$i]);
        }
        $itemList = new ItemList();
        $itemList->setItems($variosItem);

        $details = new Details();
        $details->setShipping($datos["envio"])
                ->setTax($datos["impuesto"])
                ->setSubtotal($datos["subtotal"]);

        $amount = new Amount();
        $amount->setCurrency($datos["divisa"])
                ->setTotal($datos["total"])
                ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());

        //$baseUrl = getBaseUrl();
        //$baseUrl = "";
        $url = ruta::ctrRuta();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$url/index.php?ruta=finalizar-compra&paypal=true&productos=".$idProductos)
                ->setCancelUrl("$url/carrito-de-compras");
        //$redirectUrls->setReturnUrl($url."index.php?ruta=finalizar-compra&paypal=true&productos=".$idProductos)
         //       ->setCancelUrl($url."carrito-de-compras");

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        
        try{
            $payment->create($apiContext);
            //var_dump($payment);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
            return "$url/error";
            //return $url."error";

        }
        
        foreach ($payment->getLinks() as $link){
            if($link->getRel() == "approval_url"){
                $redirectUrl = $link->getHref();
            }
        }
        return $redirectUrl;
    }

}
