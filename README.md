# `Laravel API Build`

## `Changelog`
- `Resources removed`
- `Web-routes removed`
- `Dockerfile rewokred`
- `Removed redutant migrations & factories`

## `Preloaded dependencies`
- `tymon/jwt-auth`
- `laravel/horizon`
- `spatie/laravel-backup`
- `spatie/laravel-activitylog`
- `spatie/laravel-permission`
- `spatie/laravel-medialibrary`
- `darkaonline/l5-swagger`
### `Dev`
- `laravel/telescope`
- `barryvdh/laravel-ide-helper`
- `larastan/larastan`

## `Deploy`

- `cp .env.example .env`
- `Fill gaps in WWWUSER and WWWGROUP`
- `docker compose up -d`
- `docker compose exec app composer app:prepare`
- `alias sail=./vendor/bin/sail`
