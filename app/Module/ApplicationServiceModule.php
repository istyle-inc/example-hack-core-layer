<?hh // strict

namespace App\Module;

use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;
use Example\Account\Usecase\GetAccount\GetAccount;

final class ApplicationServiceModule extends ServiceModule {
  <<__Override>>
  public function provide(FactoryContainer $container): void {
    $container->set(
      GetAccount::class,
      $container ==> new GetAccount(new AccountResponder()),
      Scope::PROTOTYPE,
    );
  }
}
