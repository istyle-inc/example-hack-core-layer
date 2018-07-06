<?hh // strict

namespace Example\Account\Domain;

enum TransactionType : string {
  Deposit = 'DEPOSIT';
  Withdrow = 'WITHDRAW';
}
