<?hh // strict

namespace AppTest\Stroage;

use PHPUnit\Framework\TestCase;
use App\Storage\AccountStorage;
use Example\Account\Domain\Entity\Account;

final class AccountStorageTest extends TestCase {

  public function testShouldRetrieveAccount(): void {
    $storage = new AccountStorage();
    $result = $storage->retrieveAccount('B00001');
    $this->assertInstanceOf(Account::class, $result);
    $this->assertSame('B00001', $result?->accountNumber()?->getValue());
  }
}
