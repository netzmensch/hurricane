<?php
namespace redcross\hurricane\tests\classes;

use redcross\hurricane\classes\content;

class contentTest extends \PHPUnit_Framework_TestCase
{
    public function testContentGetterAndSetter()
    {
        $content = new content('');
        $testContent = 'hello world';

        $content->setContent($testContent);

        $this->assertEquals($testContent, $content->getContent());
    }
}