<?php
use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase {

  protected $listing;
  protected $data = [
    "id" => 1,
    "title" => "Title",
    "website" => "http://www.website.com",
    "email" => "user@test.com",
    "twitter" => "testuser",
    "description" => "description",
    'image' => 'https://www.cascadiaphp.com/images/logo.svg',
  ];

  protected function setUp(): void {
    $this->listing = new ListingPremium($this->data);
  }

  public function testGetStatusReturnsPremium() {
    $this->assertEquals("premium", $this->listing->getStatus());
  }

  public function testGetDescriptionReturnsExpected() {
    $this->assertEquals("description", $this->listing->getDescription());
  }

}
