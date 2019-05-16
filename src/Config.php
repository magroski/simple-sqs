<?php

declare(strict_types=1);

namespace SimpleSqs;

class Config
{
    /** @var string */
    private $awsAccessKey;
    /** @var string */
    private $awsSecretKey;
    /** @var string */
    private $awsRegion;
    /** @var string */
    private $awsSqsQueueUrl;

    public function __construct(string $awsAccessKey, string $awsSecretKey, string $awsRegion, string $awsSqsQueueUrl)
    {
        $this->awsAccessKey   = $awsAccessKey;
        $this->awsSecretKey   = $awsSecretKey;
        $this->awsRegion      = $awsRegion;
        $this->awsSqsQueueUrl = $awsSqsQueueUrl;
    }

    public function getAwsAccessKey() : string
    {
        return $this->awsAccessKey;
    }

    public function getAwsSecretKey() : string
    {
        return $this->awsSecretKey;
    }

    public function getAwsRegion() : string
    {
        return $this->awsRegion;
    }

    public function getAwsSqsQueueUrl() : string
    {
        return $this->awsSqsQueueUrl;
    }
}
