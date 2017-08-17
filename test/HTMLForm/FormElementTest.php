<?php

namespace Anax\HTMLForm;

/**
 * HTML Form elements.
 */
class FormElementTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test
     */
    public function testCreateElement()
    {
        $element = new FormElement('test');

        $res = $element['name'];
        $exp = 'test';
        $this->assertEquals($res, $exp, "Created element name missmatch.");

        $res = $element->characterEncoding;
        $exp = 'UTF-8';
        $this->assertEquals($res, $exp, "Character encoding missmatch.");
    }



    /**
     * Test
     *
     * @expectedException \Anax\HTMLForm\Exception
     */
    public function testValidationRuleNotFound()
    {
        $element = new FormElement('test');

        $element->validate(['no-such-rule']);
    }



    /**
     * Test
     */
    public function testGetValue()
    {
        $element = new FormElement('test', ['value' => 42]);

        $res = $element['value'];
        $exp = 42;
        $this->assertEquals($res, $exp, "Form element value missmatch, array syntax.");

        $res = $element->getValue();
        $exp = 42;
        $this->assertEquals($res, $exp, "Form element value missmatch, method.");
    }



    /**
     * Test
     *
     * @return void
     *
     */
    public function testValidateEmail()
    {
        $element = new FormElement('test');

        $element['value'] = 'mos@dbwebb.se';
        $res = $element->validate(['email_adress']);
        $this->assertTrue($res, "Validation email fails.");
    }
}