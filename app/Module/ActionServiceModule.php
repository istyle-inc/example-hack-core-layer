<?hh // strict

/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 *
 * Copyright (c) 2017-2018 Yuuki Takezawa
 */
namespace App\Module;

use App\Action\AccountAction;
use App\Responder\AccountResponder;
use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;

final class ActionServiceModule extends ServiceModule {
  <<__Override>>
  public function provide(FactoryContainer $container): void {
    $container->set(
      AccountAction::class,
      $container ==> new AccountAction(new AccountResponder()),
      Scope::PROTOTYPE,
    );
  }
}
