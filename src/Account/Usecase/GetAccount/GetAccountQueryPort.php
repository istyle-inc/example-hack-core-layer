<?hh // strict

namespace Example\Account\Usecase\GetAccount;

use Example\Account\Domain\Entity\Account;
use Example\Account\Domain\ValueObject\AccountNumber;

interface GetAccountQueryPort {

  public function findAccount(AccountNumber $accountNumber): Account;
}
