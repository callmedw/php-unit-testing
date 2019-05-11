<?php
use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase {

  protected $listing;
  protected $data = [
    "id" => 1,
    "title" => "Title",
    "website" => "http://www.website.com",
    "email" => "user@test.com",
    "twitter" => "testuser",
    'image' => 'https://www.cascadiaphp.com/images/logo.svg',
  ];

  protected function setUp(): void {
    $this->listing = new ListingBasic($this->data);
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
      'image' => 'https://www.cascadiaphp.com/images/logo.svg',
    ];
    $listing = new ListingBasic($data);
  }

  public function testExceptionThrownIfNullTitle() {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage("Unable to create a listing, invalid title");

    $data = [
      "id" => 1,
      "title" => null,
      'image' => 'https://www.cascadiaphp.com/images/logo.svg',
    ];
    $listing = new ListingBasic($data);
  }

  //----- CREATION -----\\

  public function testCreateListingObject() {
    $listing = new ListingBasic($this->data);

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

  public function testToArrayReturnsListingObjArray() {
    $this->assertIsNotArray($this->listing);

    $listingArray = $this->listing->toArray();
    $this->assertIsArray($listingArray);

    $this->assertEquals($this->listing->getId(), $listingArray['id']);
    $this->assertEquals($this->listing->getTitle(), $listingArray['title']);
    $this->assertEquals($this->listing->getWebsite(), $listingArray['website']);
    $this->assertEquals($this->listing->getEmail(), $listingArray['email']);
    $this->assertEquals($this->listing->getTwitter(), $listingArray['twitter']);
  }

}
