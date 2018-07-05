<?hh // strict

namespace Example\Account\Usecase\GetAccount;

use Example\Account\Domain\Entity\Account;
use Example\Account\Domain\ValueObject\AccountNumber;

final class GetAccount {

  public function __construct(
    private GetAccountQueryPort $query
  ) {}

  public function execute(AccountNumber $accountNumber): Account {
    return $this->query->findAccount($accountNumber);
  }
}
