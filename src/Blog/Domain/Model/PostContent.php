<?php
namespace Blog\Domain\Model;
use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * @author Freek Lijten
 */
class PostContent
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param string $title
     * @throws InvalidArgumentException
     */
    public function __construct($title)
    {
        Assertion::notEmpty($title);
        $this->content = $title;
    }

    /**
     * @return string
     */
    public function asString()
    {
        return $this->content;
    }
}