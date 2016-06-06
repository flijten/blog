<?php
namespace Blog\Domain\Model;
use Ramsey\Uuid\UuidInterface;

/**
 * @author Freek Lijten
 */
class PostId
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @param UuidInterface $uuid
     */
    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }
}