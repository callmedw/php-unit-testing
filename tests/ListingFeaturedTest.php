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
      "coc" => "no idea what this is...",
      'image' => 'https://www.cascadiaphp.com/images/logo.svg',
    ];
    $this->listing = new ListingFeatured($data);
  }

  public function testGetStatusReturnsFeatured() {
    $this->assertEquals("featured", $this->listing->getStatus());
  }

  public function testGetCocReturnsExpected() {
    $this->assertEquals("no idea what this is...", $this->listing->getCoc());
  }

}
