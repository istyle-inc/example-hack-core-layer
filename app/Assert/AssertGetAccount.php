<?hh // strict

namespace App\Assert;

use Example\Account\Usecase\GetAccount\GetAccount;

class AssertGetAccount extends AbstractAssert {

  const type T = GetAccount;

  public static function assert<T>(T $t): this::T  {
    invariant($t instanceof GetAccount, "assert error.");
    return $t;
  }
}
