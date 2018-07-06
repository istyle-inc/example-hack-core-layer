<?hh // strict

namespace App\Payload;

use Example\Account\Domain\Entity\Account;
use Example\Account\Domain\ValueObject\AbstractValue;

type AccountMap = ImmMap<string, mixed>;

final class AccountPayload {

  private Map<string, mixed> $values = Map {};

  public function __construct(
    private Account $account
  ) {}

  public function getOutput(): AccountMap {
    return $this->values->addAll([
      Pair {'account_number', $this->account->accountNumber()->getValue()},
      Pair {'name', $this->account->name()},      
    ])->toImmMap();
  }

  public function getStatus(): int {
    return 200;
  }
}
