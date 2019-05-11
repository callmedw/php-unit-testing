<?php
use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase {

  protected $listing;

  protected function setUp(): void {
    $data = [
      "id" => 1,
      "title" => "Title",
      "website" => "http://www.website.com",
      "email" => "user@test.com",
      "twitter" => "testuser",
      "description" => "description"
    ];
    $this->listing = new ListingPremium($data);
  }

  public function testGetStatusReturnsPremium() {
    $this->assertEquals("premium", $this->listing->getStatus());
  }

  public function testGetDescriptionReturnsExpected() {
    $this->assertEquals("description", $this->listing->getDescription());
  }

}
