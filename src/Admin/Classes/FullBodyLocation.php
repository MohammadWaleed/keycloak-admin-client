<?php

namespace Keycloak\Admin\Classes;

use \GuzzleHttp\Command\CommandInterface;
use \GuzzleHttp\Command\Guzzle\Operation;
use \GuzzleHttp\Command\Guzzle\Parameter;
use \GuzzleHttp\Psr7;
use \Psr\Http\Message\MessageInterface;
use \Psr\Http\Message\RequestInterface;
use \GuzzleHttp\Command\Guzzle\RequestLocation\JsonLocation;

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
    ) {
        $this->jsonData[] = $this->prepareValue(
            $command[$param->getName()],
            $param
        );

        return $request->withBody(Psr7\stream_for(\GuzzleHttp\json_encode($this->jsonData)));
    }
}
