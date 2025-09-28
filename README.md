# Health

## How to use

### Using facade

```php
use Coleus\Health\Facades\Health;

Health::category()->index();
Health::category()->store($data);
Health::category()->update($category, $data);
Health::category()->destroy($category);

Health::muscleGroup()->index();
Health::muscleGroup()->store($data);
Health::muscleGroup()->update($muscleGroup, $data);
Health::muscleGroup()->destroy($muscleGroup);

Health::exercise()->index();
Health::exercise()->store($data, $categories, $muscleGroups);
Health::exercise()->update($exercise, $data, $categories, $muscleGroups);
Health::exercise()->destroy($exercise);

Health::weight()->index();
Health::weight()->store($data);
Health::weight()->update($weight, $data);
Health::weight()->destroy($weight);
```