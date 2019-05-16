<?php

declare(strict_types=1);

namespace SimpleSqs;

use Aws\Credentials\Credentials;
use Aws\Result;
use Aws\Sqs\SqsClient;

class Client
{
    /** @var \Aws\Sqs\SqsClient */
    protected $sqsClient;
    /** @var string */
    protected $queueUrl;

    public function __construct(Config $config)
    {
        $credentialsInst = new Credentials($config->getAwsAccessKey(), $config->getAwsSecretKey());
        $this->sqsClient = new SqsClient([
            'credentials' => $credentialsInst,
            'region'      => $config->getAwsRegion(),
            'version'     => 'latest',
        ]);
        $this->queueUrl  = $config->getAwsSqsQueueUrl();
    }

    /**
     * @param string $message The content of the message, must be text or a json_encoded array
     */
    public function sendMessage(string $message) : Result
    {
        return $this->sqsClient->sendMessage([
            'MessageBody' => $message,
            'QueueUrl'    => $this->queueUrl,
        ]);
    }

    /**
     * @param string $message The content of the message, must be text or a json_encoded array
     * @param int    $delay   Delay in seconds. Min: 0 Max: 900 (15 minutes)
     */
    public function sendDelayedMessage(string $message, int $delay = 0) : Result
    {
        $delay = max(0, $delay);
        $delay = min(900, $delay);

        return $this->sqsClient->sendMessage([
            'DelaySeconds' => $delay,
            'MessageBody'  => $message,
            'QueueUrl'     => $this->queueUrl,
        ]);
    }
}
