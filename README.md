## Package DataTable Livewire

```
composer require mfrouh/datatable-livewire
```

This package was built using
[Laravel](https://laravel.com)
and [livewire](https://laravel-livewire.com)
and [tailwind](https://tailwindcss.com)
and [alpinejs](https://github.com/alpinejs/alpine)

## Create Livewire DataTable

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

## Add In Blade

```blade
@livewire('datatable.backend.user') for backend.user
@livewire('datatable.admin.backend.user') for admin/backend/user
```

> backend\user will be App\Http\livewire\DataTables\Backend\User.php
>
> backend.user will be App\Http\livewire\DataTables\Backend\User.php
>
> user will be App\Http\livewire\DataTables\User.php

## Code DataTable

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

## Actions

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

## Columns

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
