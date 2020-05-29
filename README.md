
# Additional Symfony Validators

[![PHP requirements](https://img.shields.io/packagist/php-v/chebur/validator-constraints.svg)](https://packagist.org/packages/chebur/validator-constraints "PHP requirements")
[![Latest version](https://img.shields.io/packagist/v/chebur/validator-constraints.svg)](https://packagist.org/packages/chebur/validator-constraints "Last version")
[![Total downloads](https://img.shields.io/packagist/dt/chebur/validator-constraints.svg)](https://packagist.org/packages/chebur/validator-constraints "Total downloads")
[![License](https://img.shields.io/packagist/l/chebur/validator-constraints.svg)](https://packagist.org/packages/chebur/validator-constraints "License")

## Installation
```bash
composer require chebur/validator-constraints
```

## List of constraints

### OrComposite
Validation will be passed if at least one child constraint validation passed  
(Since Symfony 5.1 there is `AtLeastOneOf` constraint)

### KeyExists
Looks into the value if the passed key exists in it.

### AbstractConstraintList
Abstract composite constraint. Helpful to create any constraint combinations.  
(Since Symfony 5.1 there is `Compound` constraint)

### BreakOnFailure
Composite constraint. Validation by child constraints will be stopped after first error.  
(Since Symfony 5.1 there is `Sequentially` constraint)

### AllKey
Composite constraint. Similar to `All` constraint, but this one validates array keys - not values.
