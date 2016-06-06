<?php
namespace Tests\Unit\Blog\Domain\Model;

use Assert\InvalidArgumentException;
use Blog\Domain\Model\PostTitle;

/**
 * @author Freek Lijten
 */
class PostTitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function it_must_not_be_empty()
    {
        $title = new PostTitle('');
    }
}