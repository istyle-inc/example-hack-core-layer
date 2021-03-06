<?hh

namespace AppTest\Exception;

use HH\InvariantException;
use PHPUnit\Framework\TestCase;
use App\Exception\AppExceptionHandler;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;
use Nazg\Response\Emitter;
use Nazg\Exceptions\ExceptionHandleInterface;
use Nazg\Foundation\Exception\ExceptionHandler;
use Nazg\Foundation\Exception\ExceptionRegister;
use Nazg\Foundation\Exception\ExceptionServiceModule;
use function Facebook\FBExpect\expect;
use Psr\Http\Message\ResponseInterface;
use Example\Account\Domain\Exception\NotFoundException;

class AppExceptionHandlerTest extends TestCase {

  public function testShouldThrowException(): void {
    $emitter = new OverrideEmitter();
    $e = new AppExceptionHandler($emitter);
    $register = new ExceptionRegister($e);
    $register->register();
    $e->handleException(new \Exception('Exception for testing'));
    $r = $emitter->getResponse();
    if($r instanceof ResponseInterface) {
      expect($r)->toBeInstanceOf(ResponseInterface::class);
      $d = json_decode($r->getBody()->getContents(), true);
      expect($d['message'])->toBeSame('Exception for testing');
      expect($r->getStatusCode())->toBeSame(500);
    }
  }

  public function testShouldThrowNotFoundException(): void {
    $emitter = new OverrideEmitter();
    $e = new AppExceptionHandler($emitter);
    $register = new ExceptionRegister($e);
    $register->register();
    $e->handleException(new NotFoundException('Exception for testing'));
    $r = $emitter->getResponse();
    if($r instanceof ResponseInterface) {
      expect($r)->toBeInstanceOf(ResponseInterface::class);
      $d = json_decode($r->getBody()->getContents(), true);
      expect($d['message'])->toBeSame('Exception for testing');
      expect($r->getStatusCode())->toBeSame(404);
    }
  }

  public function testShouldThrowInvaridException(): void {
    $emitter = new OverrideEmitter();
    $e = new AppExceptionHandler($emitter);
    $register = new ExceptionRegister($e);
    $register->register();
    $e->handleException(new InvariantException('Exception for testing'));
    $r = $emitter->getResponse();
    if($r instanceof ResponseInterface) {
      expect($r)->toBeInstanceOf(ResponseInterface::class);
      $d = json_decode($r->getBody()->getContents(), true);
      expect($d['message'])->toBeSame('Exception for testing');
      expect($r->getStatusCode())->toBeSame(400);
    }
  }
}

class OverrideEmitter extends Emitter {
  private ?ResponseInterface $response;
  <<__Override>>
  public function emit(ResponseInterface $response): void {
    $this->response = $response;
  }
  public function getResponse(): ?ResponseInterface {
    return $this->response;
  }
}
