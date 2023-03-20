<?php

namespace Keycloak\Admin\Classes;

use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\Guzzle\Parameter;
use GuzzleHttp\Psr7;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Command\Guzzle\RequestLocation\AbstractLocation;

use Psr\Http\Message\StreamInterface;

/**
 * Adds a raw text body to a request
 */
class FullTextLocation extends AbstractLocation
{
    /**
     * @var string Whether or not to add Content-Type header
     */
    private $contentType;

    /**
     * @param string $locationName Name of the location
     * @param string $contentType Content-Type header to add to the request.
     *     Pass an empty string to omit.
     */
    public function __construct($locationName = 'fulltext', $contentType = 'text/plain')
    {
        parent::__construct($locationName);
        $this->contentType = $contentType;
    }

    /**
     * @param CommandInterface $command
     * @param RequestInterface $request
     * @param Parameter        $param
     *
     * @return MessageInterface
     */
    public function visit(
        CommandInterface $command,
        RequestInterface $request,
        Parameter $param
    ) {
        $oldValue = $request->getBody()->getContents();

        $value = $command[$param->getName()];
        $value = $param->filter($value);

        if ($oldValue !== '') {
            $value = $oldValue.$vaule;
        }

        if ($this->contentType && !$request->hasHeader('Content-Type')) {
            $request = $request->withHeader('Content-Type', $this->contentType);
        }

        return $request->withBody(Psr7\Utils::streamFor($value));
    }
}
