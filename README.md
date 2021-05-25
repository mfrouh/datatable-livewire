<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center" >Package DataTable Livewire </p>

```
composer require mfrouh/datatable-livewire
```

This package was built using 
[Laravel](https://laravel.com)
and [livewire](https://laravel-livewire.com)
and [tailwind](https://tailwindcss.com)
and [alpinejs](https://github.com/alpinejs/alpine)

Create Livewire DataTable

```
php artisan make:datatable user
```

```
php artisan make:datatable backend.user
```

```
php artisan make:datatable backend/user
```

will be save in the folder App\Http\livewire\DataTables

>backend\user  will be App\Http\livewire\DataTables\Backend\User.php
>
>backend.user  will be App\Http\livewire\DataTables\Backend\User.php
> 
>user  will be App\Http\livewire\DataTables\User.php

code datatable 
```
<?php

namespace App\Http\Livewire\Datatables;

use MFrouh\DataTable\Datatables\Datatables;
use App\Models\User;

class User extends Datatables
{

     /**
     * add model
     */
    public $model = User::class;

    /**
     * query builder
     */
    public function queryBuilder()
    {
        return $this->model::query();
    }

    /**
     * 'method_name or route()' => 'permission',
     *  ex  'create' => 'create post',
     */
    public array $tablePermissions = [];

    /**
     * add columns in array
     *
     */
    public function columns(): array
    {
        return [];
    }

    /**
     * add actions in array
     *
     */
    public function actions(): array
    {
        return [];
    }
}
```
