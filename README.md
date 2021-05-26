<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center" >Package DataTable Livewire </p>

```composer
composer require mfrouh/datatable-livewire
```

This package was built using
[Laravel](https://laravel.com)
and [livewire](https://laravel-livewire.com)
and [tailwind](https://tailwindcss.com)
and [alpinejs](https://github.com/alpinejs/alpine)

Create Livewire DataTable

```php
php artisan make:datatable user
```

```php
php artisan make:datatable backend.user
```

```php
php artisan make:datatable backend/user
```

will be save in the folder App\Http\livewire\DataTables

add in blade

```blade
@livewire('datatable.backend.user') for backend.user
@livewire('datatable.admin.backend.user') for admin/backend/user
```

> backend\user will be App\Http\livewire\DataTables\Backend\User.php
>
> backend.user will be App\Http\livewire\DataTables\Backend\User.php
>
> user will be App\Http\livewire\DataTables\User.php

code datatable

```php
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
     *
     */
    public function queryBuilder()
    {
        return $this->model::query();
    }


    /**
     * 'method_name or route()' => 'permission',
     *  ex  'create' => 'create post',
     *
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

using actions like route or method in your component

```php
  public function actions(): array
  {
        return [
            Action::header()->events(['action'  => 'label']),
            Action::header()->urls(['action'  => 'label']),
            Action::action()->events(['action'  => 'label']),
            Action::action()->urls(['action' => 'label'])
        ];
  }
```

using culomns like route or method in your component

>['TextColumn','NumberColumn','ImageColumn','PriceColumn',
>'DateTimeColumn','LabelColumn','LangColumn','MinuteColumn',
>'PercentageColumn']

```php
  public function columns(): array
    {
        return [
           TextColumn::name('name')->label('label')->sortable()->searchable(),
           NumberColumn::name('name')->label('label')->sortable()->searchable(),
           MinuteColumn::name('name')->label('label')->sortable()->searchable(),
           PercentageColumn::name('name')->label('label')->sortable()->searchable(),
           LangColumn::name('name')->filename('filename')->label('label'),
           DateTimeColumn::name('name')->format(format')->label('label')->sortable()->searchable(),
        ];
    }
```
