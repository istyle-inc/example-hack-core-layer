<?hh // strict

namespace App\Storage;

use Example\Account\Domain\Entity\Account;

use function strval;
use function intval;

final class AccountStorage {
  
  private ImmVector<Map<string, mixed>> $store = ImmVector {
    Map{
      'id' => 1,
      'account_number' => 'A00001',
      'email'          => 'a@example.com',
      'name'           => 'Mike'
    },
    Map{
      'id' => 2,
      'account_number' => 'B00001',
      'email'          => 'b@example.com',
      'name'           => 'John'
    },
  };

  public function retrieveAccount(string $accountNumber): Account {
    $v = $this->store->filter(
      $row ==> $row->get('account_number') == $accountNumber
    )->get(0);
    if($v instanceof Map) {
      return Account::ofByShape(
        shape(
          'account_number' => strval($v->get('account_number')),
          'email' => strval($v->get('email')),
          'name' => strval($v->get('name')),
        )
      );
    }
    throw new \Exception();
  }
}
