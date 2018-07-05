<?hh // strict

namespace Example\Account\Domain\ValueObject;

<<__ConsistentConstruct>>
abstract class AbstractValue<T> {

  public function __construct(protected T $value) {
    $this->validate($value);
  }

  public function getValue(): T {
    return $this->value;
  }

  protected function validate(T $t): void {}
}
