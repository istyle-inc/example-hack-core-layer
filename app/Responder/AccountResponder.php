<?hh

namespace App\Responder;

use App\Payload\AccountPayload;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;

final class AccountResponder {
  
  public function emit(
    AccountPayload $pl
  ): ResponseInterface {
    return new JsonResponse(
      $pl->getOutput()->toArray()
    );
  }
}
