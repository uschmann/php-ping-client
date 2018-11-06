# php-ping-client
PHP class to ping servers on specific ports and return the latency.

# How to use

```php
<?php

require_once('PingClient.php'); 

$client = new PingClient\PingClient('google.com', 80);
echo $client->ping();
```