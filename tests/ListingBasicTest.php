<?php
use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase {

  protected $listing;

  protected function setUp(): void {
    $data = [
      "id" => 1,
      "title" => "Title",
      "website" => "http://www.website.com",
      "email" => "user@test.com",
      "twitter" => "testuser",
    ];
    $this->listing = new ListingBasic($data);
  }

  //----- EXCEPTIONS -----\\

  public function testExceptionThrownIfNullData() {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage("Unable to create a listing, data unavailable");

    $data = [ ];
    $listing = new ListingBasic($data);
  }

  public function testExceptionThrownIfNullId() {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage("Unable to create a listing, invalid id");

    $data = [
      "id" => null,
      "title" => "Title",
    ];
    $listing = new ListingBasic($data);
  }

  public function testExceptionThrownIfNullTitle() {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage("Unable to create a listing, invalid title");

    $data = [
      "id" => 1,
      "title" => null,
    ];
    $listing = new ListingBasic($data);
  }

  //----- CREATION -----\\

  public function testCreateListingObject() {
    $data = [
      "id" => 1,
      "title" => "Title",
    ];
    $listing = new ListingBasic($data);

    $this->assertInstanceOf(ListingBasic::class, $listing);
  }

  //----- METHOD RETURNS -----\\

  public function testGetStatusReturnsBasic() {
    $this->assertEquals("basic", $this->listing->getStatus());
  }

  public function testGetMethodsReturnExpected() {
    $this->assertEquals($this->listing->getId(), 1);
    $this->assertEquals($this->listing->getTitle(), "Title");
    $this->assertEquals($this->listing->getWebsite(), "http://www.website.com");
    $this->assertEquals($this->listing->getEmail(), "user@test.com");
    $this->assertEquals($this->listing->getTwitter(), "testuser");
  }

}
