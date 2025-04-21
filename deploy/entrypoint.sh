#!/usr/bin/env bash

composer app:post-root-package-install
composer app:prepare

exec "$@"
