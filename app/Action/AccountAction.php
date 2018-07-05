<?hh // strict

namespace App\Action;

use App\Payload\AccountPayload;
use App\Responder\AccountResponder;
use Example\Account\Usecase\GetAccount\GetAccount;
use Example\Account\Domain\ValueObject\AccountNumber;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function strval;

final class AccountAction implements MiddlewareInterface {

  public function __construct(
    private AccountResponder $responder,
    private GetAccount $usecase,
  ) {}

  public function process(
    ServerRequestInterface $request,
    RequestHandlerInterface $handler,
  ): ResponseInterface {
    return $this->responder->emit(
      new AccountPayload(
        $this->usecase->execute(
          new AccountNumber(
            strval($request->getAttribute('accountNumber'))
          )
        )
      )
    );
   
 //   return $this->responder->response();
  }
}
