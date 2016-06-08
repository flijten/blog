<?php declare(strict_types=1);
namespace Blog\Domain\Model;
use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * @author Freek Lijten
 */
final class PostIntroduction
{
    /**
     * @var string
     */
    private $description;

    /**
     * @param string $title
     * @throws InvalidArgumentException
     */
    public function __construct(string $title)
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