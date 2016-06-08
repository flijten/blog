<?php declare(strict_types=1);
namespace Tests\Unit\Blog\Domain\Model;
use Blog\Domain\Model\Post;
use Blog\Domain\Model\PostContent;
use Blog\Domain\Model\PostIntroduction;
use Blog\Domain\Model\PostTitle;
use DateTimeImmutable;

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

    /**
     * @test
     */
    public function a_draft_is_not_published()
    {
        $draft = Post::draft(
            new PostTitle('The answer to life, the universe and everything.'),
            new PostIntroduction('intro to 42'),
            new PostContent('42')
        );

        $this->assertFalse($draft->isPublished());
    }

    /**
     * @test
     */
    public function it_can_publish_a_draft_with_a_date()
    {
        $draft = Post::draft(
            new PostTitle('The answer to life, the universe and everything.'),
            new PostIntroduction('intro to 42'),
            new PostContent('42')
        );

        $this->assertFalse($draft->isPublished());

        $postDateTime = new DateTimeImmutable('2016-01-13');
        $draft->publish($postDateTime);

        $this->assertTrue($draft->isPublished());
        $this->assertEquals($postDateTime, $draft->getPostDateTime());
    }

    /**
     * @test
     */
    public function it_can_retract_a_post()
    {
        $draft = Post::draft(
            new PostTitle('The answer to life, the universe and everything.'),
            new PostIntroduction('intro to 42'),
            new PostContent('42')
        );

        $postDateTime = new DateTimeImmutable('2016-01-13');
        $draft->publish($postDateTime);

        $draft->retract();

        $this->assertFalse($draft->isPublished());
        $this->assertEquals(null, $draft->getPostDateTime());
    }
}