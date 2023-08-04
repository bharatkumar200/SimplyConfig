# SimplyConfig

A verify simple configuration component using Yaml files

## Usage

```php

// init the class and pass the path to yaml file
$config = new \SimplyDi\SimplyConfig\Config("/path/to/settings.yaml);

// can use dot notation
$appName = $config->get('app.name');

echo $appName;

```
