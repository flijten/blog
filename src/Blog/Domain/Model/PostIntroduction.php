<?php
namespace Blog\Domain\Model;
use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * @author Freek Lijten
 */
class PostIntroduction
{
    /**
     * @var string
     */
    private $description;

    /**
     * @param string $title
     * @throws InvalidArgumentException
     */
    public function __construct($title)
    {
        Assertion::notEmpty($title);
        $this->description = $title;
    }

    /**
     * @return string
     */
    public function asString()
    {
        return $this->description;
    }
}