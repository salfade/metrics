# Tailwind UI metrics in Nova style

## WARNING: This package is under development. 

You can publish and run the migrations with:


You can publish the config file with:
```bash
php artisan vendor:publish --provider="Salfade\Metric\MetricServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
php artisan metric:value UserCount


namespace App\Metrics;

use App\User;
use Salfade\Metric\Metrics\Value;

class UserCount extends Value
{
    public $title = 'Total Users';
    public $icon = 'Users';

    public function url():string
    {
        return route('user.index');
    }

    public function value()
    {
        //@TODO return the value for the value metric
        return User::count();
    }
}
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email admin@salfade.com instead of using the issue tracker.

## Credits

- [Mohamed Fawzan](https://github.com/fawzanm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
