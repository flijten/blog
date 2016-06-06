<?php
namespace Blog\Domain\Model;
use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * @author Freek Lijten
 */
class PostTitle
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param string $title
     * @throws InvalidArgumentException
     */
    public function __construct($title)
    {
        Assertion::notEmpty($title);
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function asString()
    {
        return $this->title;
    }
}