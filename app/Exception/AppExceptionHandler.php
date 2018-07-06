<?hh

namespace App\Exception;

use Throwable;
use HH\InvariantException;
use Nazg\Http\StatusCode;
use Nazg\Types\ExceptionImmMap;
use Nazg\Foundation\Exception\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Example\Account\Domain\Exception\NotFoundException;
use Zend\Diactoros\Response\JsonResponse;

class AppExceptionHandler extends ExceptionHandler {

  <<__Override>>
  protected function render(
    ExceptionImmMap $em,
    Throwable $e
  ): ResponseInterface {
    if($e instanceof NotFoundException) {
      return new JsonResponse(
        $em->toArray(),
        StatusCode::NotFound,
      );
    }
    if($e instanceof InvariantException) {
      return new JsonResponse(
        $em->toArray(),
        StatusCode::BadRequest,
      );
    }
    return parent::render($em, $e);
  }

  <<__Override>>
  protected function toImmMap(\Throwable $e): ExceptionImmMap {
    return new ImmMap(['message' => $e->getMessage()]);
  }
}
