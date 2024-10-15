# `Laravel API Build`

## `Preloaded dependencies`
- `tymon/jwt-auth`
- `spatie/laravel-permission`
- `spatie/laravel-medialibrary`
- `laravel/horizon`
### `Dev`
- `laravel/telescope`

## `Deploy`

- `cp .env.example .env`
- `Fill gaps in WWWUSER and WWWGROUP`
- `docker compose up -d`
- `docker compose exec app composer app:prepare`
- `alias sail=./vendor/bin/sail`
