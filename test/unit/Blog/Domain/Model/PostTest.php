<?php declare(strict_types=1);
namespace Tests\Unit\Blog\Domain\Model;
use Blog\Domain\Model\Post;
use Blog\Domain\Model\PostContent;
use Blog\Domain\Model\PostIntroduction;
use Blog\Domain\Model\PostTitle;

/**
 * @author Freek Lijten
 */
class PostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_create_a_draft()
    {
        $draft = Post::draft(
            new PostTitle('The answer to life, the universe and everything.'),
            new PostIntroduction('intro to 42'),
            new PostContent('42')
        );

        $this->assertInstanceOf(Post::class, $draft);
    }
}