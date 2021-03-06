# [Fnordmetric](https://github.com/paulasmuth/fnordmetric) PHP API REDIS

### Send new events to Fnordmetric directly into Redis

Fnordmetric PHP API REDIS uses [phpredis](https://github.com/nicolasff/phpredis) lib to connect Redis server and put event directly into Redis.
Library [Fnordmetric PHP API](https://github.com/leemachin/fnordmetric-php-api) uses TCP sockets to write new events to Fnordmetric - nice solution,
but if you have on your scripts redis or redis connect and you want use it - use this very simple lib.

## Usage
You can create new connetion on Redis server
```php
require_once 'FnordmetricApiRedis.php';

# Instantiate the class, create new connect to redis server on 127.0.0.1:6379 (default value)
$fnord = new FnordmetricApiRedis('127.0.0.1:6379');

# Send a simple event
$fnord->event('new_registration');

# Send a event with extra data
$data = array('referer' => 'facebook');
$fnord->event('new_registration', $data);

# Send a event with extra data and session token
$sessiontoken = 'rtERydysuTY';
$fnord->event('_set_name', array("name" => "Goodman"), $sessiontoken);
$fnord->event('new_registration', array('referer' => 'twitter'), $sessiontoken);
```

But if you have instant connect - you can use it
```php
require_once 'FnordmetricApiRedis.php';

# External connection to Redis server (use phpredis lib)
$redis = new Redis();
$redis->connect('127.0.0.1:6379');

# Instantiate the class, set connect to redis server
$fnord = new FnordmetricApiRedis($redis);

# Send a simple event
$fnord->event('new_registration');

# ... 
# see above
```

## License

Copyright (C) 2013 Nikolay Votintsev

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the "Software"),
to use, copy and modify copies of the Software,
subject to the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
