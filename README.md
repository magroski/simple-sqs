# Simple SQS

[![Latest Stable Version](https://img.shields.io/packagist/v/magroski/simple-sqs.svg?style=flat)](https://packagist.org/packages/magroski/simple-sqs)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat)](https://php.net/)
[![CircleCI](https://circleci.com/gh/magroski/simple-sqs.svg?style=shield)](https://circleci.com/gh/magroski/simple-sqs)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://github.com/magroski/simple-sqs/blob/master/LICENSE)

This library provides a quick and simple way to send messages to Amazon SQS.

## Usage examples

```php
$config = new Config('access_key', 'secret_key', 'ue-east-1', 'https://sqs.queue.url');

$client = new Client($config);

$data = json_encode(['book' => 1]);

# Real-time
$client->sendMessage($data);

# With 1 minute delay
$client->sendDelayedMessage($data, 60);
```
