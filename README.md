Epayindo
===============


Epayindo :heart: PHP!

This is warapper/Library for epayindo (http://epayindo.com) payment gateway, for more information visit documentation page (https://documenter.getpostman.com/view/263410/RWEnoc52#0eb2f98c-2fb1-49a6-89dd-415626c28c74)

## 1. Installation

### 1. Composer Installation

```
composer require tarikhagustia/epayindo "dev-master"
```

## 2. How to Use

### 2.1 Create Payment

```php
$auth = new Auth('MERCHANT_EMAIL', 'MERCHANT_API_KEY');
$payment = new Payment($auth);
$total_amount = 45000;
$payment_data = $payment->createPayment('MERCHANT_USERNAME', $total_amount, [
  ['name', 45000,1,45000]
]);

print_r($payment_data);
// for third parameter using this scema
// ['product_name', 'product_price', 'qty', 'total_amount']
// $paymetn_data will return this following object
// stdClass Object
// (
//     [status] => 1
//     [url] => https://my.epayindo.com/payment/pay/B972E201809301024
//     [data] => stdClass Object
//         (
//             [transaction] => stdClass Object
//                 (
//                     [pin] => pgcometsnet12345
//                     [merchant_id] => pgcometsnet
//                     [transaction_id] => B972E201809301024
//                     [account_number] => 1
//                     [item_type] => MISC
//
//                     [basket] => name,45000,1,45000;Fee,6500,1,6500
//                     [actype] => pay
//                 )
//
//             [gross_amount] => 51500
//         )
//
// )
```

### 2.1 Transfer to other epayindo accounts

```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use Epayindo\Auth;
use Epayindo\Transfer;
$auth = new Auth('MERCHANT_EMAIL', 'MERCHANT_API_KEY');

$transfer = new Transfer($auth);
$amount = 10;
$res = $transfer->to('MERCHANT_RECEIVER_USERNAME', $amount, 'Note Example')->send();

print_r($res);
// stdClass Object
// (
//     [message] => Maaf, tidak cukup dana untuk melakukan operasi
//     [success] =>
//     [code] => 401
// )
```
