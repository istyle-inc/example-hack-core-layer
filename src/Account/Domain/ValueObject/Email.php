<?hh // strict

namespace Example\Account\Domain\ValueObject;

use function filter_var;
use const FILTER_VALIDATE_EMAIL;

final class Email extends AbstractValue<string> {

  <<__Override>>
  protected function validate(string $t): void {
    invariant(
      filter_var($t, FILTER_VALIDATE_EMAIL),
      'Invalid email: %s',
      $t
    );
  }
}
