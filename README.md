# SimplyConfig

A verify simple configuration component using Yaml files

## Usage

**Your YAML file: settings.yaml**

```yaml
app:
  name: It works
  timezone: UTC

otherConfig: this thing works too
```


**In your app**:

```php

// init the class and pass the path to yaml file
$config = new \SimplyDi\SimplyConfig\Config("/path/to/settings.yaml");

// can use dot notation
$appName = $config->get('app.name');

echo $appName; // prints "It works"

echo $config->get('otherConfig'); // prints "this thing works too"

```
