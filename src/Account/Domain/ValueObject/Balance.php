<?hh // strict

namespace Example\Account\Domain\ValueObject;

final class Balance extends AbstractValue<int> {
  
  public function deposit(Money $money): Balance {
    return new self($this->value + $money->getValue());
  }

  public function withdraw(Money $money): Balance {
    return new self($this->value - $money->getValue());
  }

  public function lessThan(Money $money): bool {
    return $this->value < $money->getValue();
  }

  protected function validate(int $t): void {
    invariant($t < 0, 'balance_should_not_be_less_than_zero');
  }
}
