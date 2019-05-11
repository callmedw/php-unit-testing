<?php
use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase {

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

}
