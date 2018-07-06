<?hh // strict

namespace App\AppAdapter;

use App\Storage\AccountStorage;
use Example\Account\Usecase\GetAccount\GetAccount;
use Example\Account\Domain\Entity\Account;
use Example\Account\Domain\ValueObject\AccountNumber;
use Example\Account\Usecase\GetAccount\GetAccountQueryPort;

final class GetAccountAdapter implements GetAccountQueryPort {
  
  public function __construct(
    private AccountStorage $account
  ) {}

  public function findAccount(AccountNumber $accountNumber): Account {
    return $this->account->retrieveAccount($accountNumber->getValue());
  }
}
