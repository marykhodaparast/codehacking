This project is about a test project of laravel by Edwin Diaz, I write what I learned below:

1. to update composer run => composer self-update
http error 500 is sometimes for permissions in macbook so run => sudo chmod -R o+w storage

2. 27-195:(it means folder 27 part 195)
php artisan --version => gives you version of laravel framework you have
if it is 5.2 you can run => npm install --global gulp but in version 5.4 instead of
gulp.js we have webpack.mix.js

3. 27-201
write in the terminal => composer require "laravelcollective/html":"^5.2"

4. 27-205:
if we set required with empty fields of create user request it refreshes the page

5. 28-239:
helper functions in laravel (arrays,strings,...)

6. 30-250:
search dropzone js for footer script in admin.media.create => Upload Media

7. 31-253:
if you have post_id->unsigned()->index and foregin key constraint for it in a migration you should have all of the foreign
keys in your migrations to be unsigned()->index() so that you do not see the error "Foreign key constraints" in laravel

8. 32-273:
first follow the link => https://github.com/cviebrock/eloquent-sluggable

9. 32-274:
search in google "str_slug in laravel"

10. 33-277:
for change version of laravel from 5.2 to 5.3 you should see laravel-news and see what changed in laravel 5.3 so that you can change the version of
your laravel to 5.3

11. 33-279:
first install version 5.3 of laravel to see the changes
first go to composer.json in your laravel 5.2 app and change the version of laravel to 5.3 like below
    "require": {
            "php": ">=5.5.9",
            "laravel/framework": "5.2.*",
            "laravelcollective/html": "^5.2",
            "cviebrock/eloquent-sluggable": "^4.1.0"
    },
    change to:
    "require": {
            "php": ">=5.5.9",
            "laravel/framework": "5.3.*",
            "laravelcollective/html": "^5.2",
            "cviebrock/eloquent-sluggable": "^4.1.0"
    },
and then run "composer update" to see which errors you will see
and you should solve error and then run "composer update" and do
this so that you don't have any error when running composer update
run php artisan --version to see the version of your laravel

12. 33-280:
After doing php artisan route:list we get the error bleow
Trait 'Illuminate\Foundation\Auth\Access\AuthorizesResources' not found
and then we go to app/http/controllers/controller.php and remove the "AuthorizeResources" from there

13. 33-281:
copy and paste php files in Auth folder of laravel 5.3 to our project(5.2) and continur changes

https://laravel.com/docs/5.3/upgrade#upgrade-5.3.0

sequel pro  => database for macbook