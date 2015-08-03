<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("https://barako.liveauctioneers.com/");
  }

  public function testMyTestCase()
  {
    // Sign-In Login Process
    $this->open("/");
    // Login Button
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=a.header-logo")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("css=div.header-content > button:contains(Login)");
    // Sign Up Modal Window
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=div.modal-inner")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyText("css=p.subtitle", "Sign in to LiveAuctioneers");
    // Login Credentials
    $this->type("name=username", "ben.fong@liveauctioneers.com");
    $this->type("name=password", "123456");
    $this->click("css=button:contains(Submit)");
    // Verify Logged in status
    try {
        $this->assertNotEquals("", $this->getText("css=div.header-content > button:contain(Login)"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=button > span.icon-person")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

  }
}
?>