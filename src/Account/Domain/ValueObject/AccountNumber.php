<?hh // strict

namespace Example\Account\Domain\ValueObject;

use function preg_match;

final class AccountNumber extends AbstractValue<string> {

  <<__Override>>
  protected function validate(string $t): void {
    invariant(
      \preg_match('/\A[A-Z][0-9]{4,10}\z/', $t) > 0,
      '%s is invalid AccountNumber.',
      $t
    );
  }

  public function lessThan(AccountNumber $accountNumber): bool {
    return $this->value < $accountNumber->value;
  }

  public function equals(AccountNumber $accountNumber): bool {
    return $this->value === $accountNumber->value;
  }
}
