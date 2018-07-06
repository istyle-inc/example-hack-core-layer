<?hh // strict

namespace App\AppAdapter;

use App\Storage\AccountStorage;
use Example\Account\Usecase\GetAccount\GetAccount;
use Example\Account\Domain\Entity\Account;
use Example\Account\Domain\ValueObject\AccountNumber;
use Example\Account\Usecase\GetAccount\GetAccountQueryPort;
use Example\Account\Domain\Exception\NotFoundException;

use function sprintf;

final class GetAccountAdapter implements GetAccountQueryPort {
  
  public function __construct(
    private AccountStorage $account
  ) {}

  public function findAccount(AccountNumber $accountNumber): Account {
    $result = $this->account->retrieveAccount($accountNumber->getValue());
    if ($result instanceof Account) {
      return $result;
    }
    throw new NotFoundException(
      sprintf(
        'account_number %s not found', 
        $accountNumber->getValue()
      )
    );
  }
}
