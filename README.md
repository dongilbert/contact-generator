# Contact CSV Generator

This is a PHP based CSV generator that will output a CSV of contact records.

## Usage

| Argument | Default | Description |
|----------|---------|-------------|
| amount | 10000 | The number of contacts you want to generate. |
| fields | firstName lastName email city stateAbbr postcode country streetAddress | The fields to generate. They should be fields that can be generated using [Faker](https://github.com/fzaninotto/Faker#formatters) |

```
php generate.php amount ...fields
```
