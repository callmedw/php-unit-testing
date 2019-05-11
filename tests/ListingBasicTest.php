<?php
use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase {

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
      "title" => "Title"
    ];
    $listing = new ListingBasic($data);
  }

}
