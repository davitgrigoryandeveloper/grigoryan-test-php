PHP SSE: Server-sent Events
======

A simple and efficient library implemented HTML5's server-sent events by PHP, is used to real-time push events from the
server to the client, and is easier than Websocket.

## Requirements

* PHP 5.4 or later

## Installation via Composer([packagist](https://packagist.org/packages/hhxsv5/php-sse))

```BASH
composer require "hhxsv5/php-sse:~2.0" -vvv
```

#### or use this composer.json file and run this command

```BASH
composer update
```

### Run PHP webserver

```Bash
cd examples
php -S localhost:8000 -t .
```

- Open url `http://localhost:8000`