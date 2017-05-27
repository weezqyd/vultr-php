Vultr API PHP Client
======================
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/weezqyd/vultr-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/weezqyd/vultr-php/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/weezqyd/vultr-php/v/stable.svg)](https://packagist.org/packages/weezqyd/vultr-php) [![Total Downloads](https://poser.pugx.org/weezqyd/vultr-php/d/total)](https://packagist.org/packages/weezqyd/vultr-php) [![Latest Unstable Version](https://poser.pugx.org/weezqyd/vultr-php/v/unstable.svg)](https://packagist.org/packages/weezqyd/vultr-php) [![License](https://poser.pugx.org/weezqyd/vultr-php/license.svg)](https://packagist.org/packages/weezqyd/vultr-php)


Installation
------------

This library can be found on [Packagist](https://packagist.org/packages/weezqyd/vultr-php).
The recommended way to install this is through [composer](http://getcomposer.org).

Run these commands to install composer, the library and its dependencies:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar require weezqyd/vultr-php
```

You then need to install **one** of the following:
```bash
$ php composer.phar require kriswallsmith/buzz:~0.10
$ php composer.phar require guzzlehttp/guzzle:~5.0
$ php composer.phar require guzzlehttp/guzzle:~6.0
```

Adapter
-------

We provide a simple `BuzzAdapter`  which (at the moment) can be tweaked by injecting your own `Browser`
and `ListenerInterface`. By default a `Curl` client will be injected in `Browser` and the `BuzzOAuthListener`
will be used.

If you use Guzzle, you can inject your own client to our `GuzzleAdapter`.

You can also build your own adapter by extending `AbstractAdapter` and implementing `AdapterInterface`.

Example
-------

```php
<?php

require 'vendor/autoload.php';

use Vultr\Adapter\BuzzAdapter;
use Vultr\Vultr;

// create an adapter with your access token which can be
$adapter = new BuzzAdapter('your_access_token');

// create a vultr object with the previous adapter
$vultr = new Vultr($adapter);

// ...
```

Account
-------

```php
// ...
// return the account api
$account = $vultr->account;

// return the Account entity
$userInformation = $account->getUserInformation();
````

API Key
------

```php
// ..
// Retrieve information about the current API key.
$auth  = $vultr->auth->getKeyInformation();

```
