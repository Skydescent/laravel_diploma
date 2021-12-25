#!/bin/bash

bash ./vendor/bin/sail up &
bash ./vendor/bin/sail composer install
bash ./vendor/bin/sail npm install
bash ./vendor/bin/sail npm run dev