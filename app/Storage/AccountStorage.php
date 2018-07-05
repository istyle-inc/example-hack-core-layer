<?hh // strict

namespace App\Storage;

final class AccountStorage {
  
  private ImmVector<Map<string, mixed>> $store = ImmVector{
    Map{
      'id' => 1,
      'account_number' => 'A00001',
      'email'          => 'a@example.com',
      'name'           => 'Mike',
      'balance'        => 3000,
    },
    Map{
      'id' => 2,
      'account_number' => 'B00001',
      'email'          => 'b@example.com',
      'name'           => 'John',
      'balance'        => 1000,
    },
  };

  public function retrieveAccount(string $accountNumber): Map<string, mixed> {
    $this->store->filter(
      $row ==> $row->get('account_number') == $accountNumber
    );
  }
}
