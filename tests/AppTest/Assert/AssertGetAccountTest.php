<?hh // strict

namespace AppTest\Assert;

use PHPUnit\Framework\TestCase;
use App\Assert\AssertGetAccount;
use App\AppAdapter\GetAccountAdapter;
use App\Storage\AccountStorage;
use Example\Account\Usecase\GetAccount\GetAccount;

final class AssertGetAccountTest extends TestCase {

  public function testShouldBeUsecaseInstance(): void {
    $usecase = new GetAccount(new GetAccountAdapter(new AccountStorage()));
    $this->assertInstanceOf(GetAccount::class, AssertGetAccount::assert($usecase));
  }
}
