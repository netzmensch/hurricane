<?php
namespace redcross\hurricane\tests\classes;

use redcross\hurricane\classes\content;

class contentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \redcross\hurricane\tests\classes\content::setContent
     * @covers \redcross\hurricane\tests\classes\content::getContent
     */
    public function testContentGetterAndSetter()
    {
        $content = new content('');
        $testContent = 'hello world';

        $content->setContent($testContent);

        $this->assertEquals($testContent, $content->getContent());
    }

    /**
     * @covers \redcross\hurricane\tests\classes\content::getParsers
     */
    public function testParseContent()
    {
        $sourceContent = file_get_contents(__DIR__ . '/../fixtures/content.txt');
        $parsedContent = file_get_contents(__DIR__ . '/../fixtures/parsedContent.html');

        $contentObject = new content($sourceContent);

        $contentObject->parseContent();

        $this->assertEquals($parsedContent, $contentObject->getContent());
    }
}