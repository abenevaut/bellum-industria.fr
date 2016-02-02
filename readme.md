## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)







```php
//        $admin = new \App\Role();
//        $admin->name         = 'admin';
//        $admin->display_name = 'User Administrator'; // optional
//        $admin->description  = 'User is allowed to manage and edit other users'; // optional
//        $admin->save();


//        $admin = new \App\Role();
//        $admin->name         = 'client';
//        $admin->display_name = 'User Customer'; // optional
//        $admin->description  = 'User is allowed to manage and edit projects'; // optional
//        $admin->save();



        $user = \App\User::where('id', '=', '1')->first();
        $admin = \App\Role::where('id', '=', '1')->first();
//
//        // role attach alias
//        $user->attachRole($admin);






//        $createPost = new \App\Permission();
//        $createPost->name         = 'create-team';
//        $createPost->display_name = 'Create Team'; // optional
//        // Allow a user to...
//        $createPost->description  = 'create new team'; // optional
//        $createPost->save();
//
//        $editUser = new \App\Permission();
//        $editUser->name         = 'edit-team';
//        $editUser->display_name = 'Edit Team'; // optional
//        // Allow a user to...
//        $editUser->description  = 'edit existing team'; // optional
//        $editUser->save();
//
//        $admin->attachPermission($createPost);







//        dd($user->hasRole('admin'));
//        dd($user->hasPermission('create-team'));

//        $u = \Auth::user();

//        dd( $u->id );
```

```php
//        try {
//            $geocode = \Geocoder::geocode('10 rue Gambetta, Paris, France');
//            // The GoogleMapsProvider will return a result
//            var_dump($geocode); exit;
//        } catch (\Exception $e) {
//            // No exception will be thrown here
//            echo $e->getMessage(); exit;
//        }
```