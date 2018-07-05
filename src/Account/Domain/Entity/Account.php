<?hh // strict

namespace Example\Account\Domain\Entity;

use function preg_match;

use Example\Account\Domain\ShapeAccount;
use Example\Account\Domain\ValueObject\AccountNumber;
use Example\Account\Domain\ValueObject\Email;
use Example\Account\Domain\ValueObject\Balance;
use Example\Account\Domain\ValueObject\Money;

final class Account {

  public function __construct(
    private AccountNumber $accountNumber,
    private Email $email, 
    private string $name, 
    private Balance $balance
  ) { }

  public function accountNumber(): AccountNumber {
    return $this->accountNumber;
  }

  public function email(): Email {
    return $this->email;
  }

  public function name(): string {
    return $this->name;
  }

  public function balance(): Balance {
    return clone $this->balance;
  }

  public function deposit(Money $money): void {
    $this->balance = $this->balance->deposit($money);
  }

  public function withdraw(Money $money): void {
    $this->balance = $this->balance->withdraw($money);
  }

  public static function ofByShape(ShapeAccount $shape): Account {
    return new self(
      new AccountNumber(Shapes::idx($shape, 'account_number', '')),
      new Email(Shapes::idx($shape, 'email', '')),
      Shapes::idx($shape, 'name', ''),
      new Balance(Shapes::idx($shape, 'balance', 0)),
    );
  }
}
