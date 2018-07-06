# hack-core-layer

Independent core layer pattern with HHVM/Hack 

[独立したコアレイヤパターン](https://blog.shin1x1.com/entry/independent-core-layer-pattern)

## install

```bash
$ hhvm -d xdebug.enable=0 -d hhvm.jit=0 -d hhvm.php7.all=1\
 -d hhvm.hack.lang.auto_typecheck=0 $(which composer) install
```

## for vagrant

```bash
$ vagrant up
```

## usage

### get account

```bash
$ curl -H 'Content-Type: application/json' http://192.168.10.10/accounts/A00001 | jq .
{
  "account_number": "A00001",
  "balance": 3000
}
``
