<?hh // strict

namespace Example\Account\Domain;

type ShapeAccount = shape(
  'account_number' => string,
  'email' => string,
  'name' => string,
);
