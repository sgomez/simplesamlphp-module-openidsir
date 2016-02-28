# SimpleSAMLphp Composer SIR OpenID filter module

This package adds a filter for SIR OpenID attributes through a SimpleSAMLphp module
installable through [Composer](https://getcomposer.org/). Installation can be as
easy as executing:

```
composer.phar require sgomez/simplesamlphp-module-openidsir ~1.0@dev
```

## How to use

Add this to your IdP definition:

```
'authproc' => array(
    10 => 'openidsir:OpenID',
),
```

If your [SIR OpenID](https://www.rediris.es/sir/howto-openid.html) is:

```
http://yo.rediris.es/soy/usuario@institucion.org/
```

You will receive this attributes:

```
"mail" => [
  0 => "usuario@institucion.org"
],
"uid" => [
  0 => "usuario"
],
"sHO" => [
  0 => "institucion.org"
]
```
