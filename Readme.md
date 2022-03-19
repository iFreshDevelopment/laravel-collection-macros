<a href="https://ifresh.nl" target="_blank">
<img src="https://ifresh.nl/app/themes/ifresh/dist/images/logo.svg" width="400">
</a>

# iFresh Laravel Collection helpers
- --

## Description
This package contains a set of (silly) Laravel Collection macros. You probably won't need them. 
Or maybe you do, I don't know, you do you.

<img src="https://preview.redd.it/klb6rlh9lm871.jpg?auto=webp&s=e346e57ccaec7f7b6962b019e63fd1aa0b2d3e65">

## Provided methods

### Numbers
Macro methods that are intended for working with collections that contain only numbers.

#### greaterThan
Returns a set of numbers that are larger than the provided minimum value. Non-inclusive.
```php
// [3, 4]
collect([1, 2, 3, 4])->greaterThan(2); 
```

#### lessThan
Returns a set of numbers that are smaller than the provided maximum value. Non-inclusive.
```php
// [1, 2]
collect([1, 2, 3, 4])->lessThan(3); 
```

#### multiply
Returns the result that is gotten by multiplying all the numbers in the collection together.
```php
// 6 (1 * 2 * 3)
collect([1, 2, 3])->multiply();
```

### Strings
Macro methods that are intended for working with collections that contain only strings.
```php
```