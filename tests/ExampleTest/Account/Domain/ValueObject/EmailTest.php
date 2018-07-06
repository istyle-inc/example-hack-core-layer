<?hh // strict

use PHPUnit\Framework\TestCase;

namespace ExampleTest\Account\Domain\ValueObject;

use Example\Account\Domain\ValueObject\Email;

final class EmailTest extends TestCase {

  public function testShouldBeEmailString(): void {
    $email = new Email('ytake@example.com');
    $this->assertInstanceOf(Email::class, $email);
    $this->assertEquals('ytake@example.com', $email->getValue());
  }

  /**
   * @expectedException \HH\InvariantException
   */
  public function testShouldThrowInvariantException(): void {
    $email = new Email('123456789');
  }
}
