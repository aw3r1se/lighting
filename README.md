# `Laravel API Build`

## `Changelog`
- `Resources removed`
- `Web-routes removed`
- `Dockerfile rewokred`
- `Removed redutant migrations & factories`

## `Preloaded dependencies`
- `tymon/jwt-auth`
- `spatie/laravel-backup`
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
