<?php

class SignIn extends PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Setup
     */
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        $this->setBrowserUrl('https://barako.liveauctioneers.com/');
    }
    
    /** 
     * Method testSignIn 
     * @test 
     */ 
    public function testSignIn()
    {
        // Sign-In Login Process
        $this->url("/");
        // Login Button
        // ERROR: Caught exception [TypeError: WDAPI.Utils.isElementPresent is not a function]
        $this->byCssSelector("div.header-content > button:contains(Login)")->click();
        // Sign Up Modal Window
        // ERROR: Caught exception [TypeError: WDAPI.Utils.isElementPresent is not a function]
        try {
            $result = $this->byCssSelector("p.subtitle")->text();
        $this->assertEquals("Sign in to LiveAuctioneers", $result);
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            array_push($this->verificationErrors, $e->__toString());
        }
        // Login Credentials
        // ERROR: Caught exception [TypeError: statement is not a function]
        // ERROR: Caught exception [TypeError: statement is not a function]
        // ERROR: Caught exception [TypeError: statement is not a function]
        // Verify Logged in status
        try {
            $this->assertNotEquals("", $this->byCssSelector("div.header-content > button:contain(Login)")->text());
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            array_push($this->verificationErrors, $e->__toString());
        }
        // ERROR: Caught exception [TypeError: WDAPI.Utils.isElementPresent is not a function]
    }

}
