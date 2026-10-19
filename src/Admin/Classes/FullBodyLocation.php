<?php

namespace Keycloak\Admin\Classes;

use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Operation;
use GuzzleHttp\Command\Guzzle\Parameter;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Command\Guzzle\RequestLocation\JsonLocation;

use Psr\Http\Message\StreamInterface;

use function GuzzleHttp\Psr7\stream_for;

/**
 * Creates a JSON document
 */
class FullBodyLocation extends JsonLocation
{
    /** @var string Whether or not to add a Content-Type header when JSON is found */
    private $jsonContentType;

    /** @var array */
    private $jsonData;

    /**
     * @param string $locationName Name of the location
     * @param string $contentType  Content-Type header to add to the request if
     *     JSON is added to the body. Pass an empty string to omit.
     */
    public function __construct($locationName = 'json', $contentType = 'application/json')
    {
        parent::__construct($locationName);
        $this->jsonContentType = $contentType;
    }

    /**
     * @param CommandInterface $command
     * @param RequestInterface $request
     * @param Parameter        $param
     *
     * @return RequestInterface
     */
    public function visit(
        CommandInterface $command,
        RequestInterface $request,
        Parameter $param
    ): RequestInterface {
        $this->jsonData = $this->prepareValue(
            $command[$param->getName()],
            $param
        );

        if ($this->jsonContentType && !$request->hasHeader('Content-Type')) {
            $request = $request->withHeader('Content-Type', $this->jsonContentType);
        }

        $json = json_encode($this->jsonData);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException('json_encode error: ' . json_last_error_msg());
        }

        return $request->withBody($this->getStream($json));
    }

    public function after(CommandInterface $command, RequestInterface $request, Operation $operation): RequestInterface
    {
        return $request;
    }

    /**
     * Create stream from given data
     *
     * @param string $data
     * @return StreamInterface
     */
    final protected function getStream($data)
    {
        if (class_exists(Utils::class)) {
            return Utils::streamFor($data); // guzzlehttp/psr7 >= 2.0
        }

        return stream_for($data); // guzzlehttp/psr7 < 2.0
    }
}
