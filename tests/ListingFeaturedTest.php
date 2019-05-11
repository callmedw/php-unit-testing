<?php
use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase {

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
    $this->listing = new ListingFeatured($data);
  }

  public function testGetStatusReturnsFeatured() {
    $this->assertEquals("featured", $this->listing->getStatus());
  }

}
