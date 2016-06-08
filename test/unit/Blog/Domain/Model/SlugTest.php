<?php declare(strict_types=1);
namespace Tests\Unit\Blog\Domain\Model;
use Blog\Domain\Model\PostTitle;
use Blog\Domain\Model\Slug;

/**
 * @author Freek Lijten
 */
class SlugTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_wraps_a_date_and_title()
    {
        $date = new \DateTimeImmutable('2016-04-03');
        $title = new PostTitle('Something simple');

        $Slug = new Slug($date, $title);

        $expected = '2016/04/03/Something-simple';

        $this->assertSame($expected, $Slug->asString());
    }

    /**
     * A bit strange, but my old urls where formed like so by software and I'm too lazy to rewrite those
     * so I copied the "algorithm"
     * @test
     */
    public function it_removes_white_space_and_non_word_characters()
    {
        $date = new \DateTimeImmutable('2016-04-03');
        $title = new PostTitle('123 . Something ! , , \+simple!');

        $Slug = new Slug($date, $title);

        $expected = '2016/04/03/123-.-Something----simple';

        $this->assertSame($expected, $Slug->asString());
    }
}