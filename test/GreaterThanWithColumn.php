<?php

namespace Qianlong\Validate\test;

require_once 'BaseTestCase.php';

class GreaterThanWithColumn extends BaseTestCase
{
    function testValidCase()
    {
        $this->freeValidate();
        $this->validate->addColumn('bar')->greaterThanWithColumn('foo');
        $validateResult = $this->validate->validate(['bar' => 11, 'foo' => 10]);
        $this->assertTrue($validateResult);
    }

    function testDefaultErrorMsgCase()
    {
        $this->freeValidate();
        $this->validate->addColumn('bar')->greaterThanWithColumn('foo');
        $validateResult = $this->validate->validate(['bar' => 10, 'foo' => 11]);
        $this->assertFalse($validateResult);
        $this->assertEquals("bar必须大于'foo'的值", $this->validate->getError()->__toString());
    }

    // 自定义错误信息断言
    function testCustomErrorMsgCase()
    {
        $this->freeValidate();
        $this->validate->addColumn('bar')->greaterThanWithColumn('foo', 'foo不能大于bar');
        $validateResult = $this->validate->validate(['bar' => 10, 'foo' => 11]);
        $this->assertFalse($validateResult);
        $this->assertEquals("foo不能大于bar", $this->validate->getError()->__toString());
    }
}
