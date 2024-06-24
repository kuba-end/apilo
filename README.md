Apilo task
=====
# Overview
This symfony console command application allows to get inpost points for given city. Results are dumped in CLI and contains
such params as count, page, totalPages, name, address_details. App has also POST endpoint `/api/inpost/points` which works with given 
body schema: 
```json
{
    "city": "ZABRZE",
    "postalCode": "41-800"
}
```
parameter `postalCode` is optional. 



# How to use
```bash
composer install
```
Use command
```bash
bin/console app:inpost-points Kozy
```
# How to tests

```bash
vendor/bin/phpspec run
```
# How to run static analyse
```bash
vendor/bin/phpstan analyse
```