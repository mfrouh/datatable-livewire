<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center" >Package DataTable Livewire </p>

<<<<<<< HEAD

> composer require mfrouh/datatable-livewire

This package was built using 
[Laravel](https://laravel.com)
and [livewire](https://laravel-livewire.com)
and [tailwind](https://tailwindcss.com)
and [alpinejs](https://github.com/alpinejs/alpine)

create livewire datatable
>php artisan make:datatable user
> 
> or
> 
>php artisan make:datatable backend.user
> 
> or
>
>php artisan make:datatable backend\user

will be save in the folder App\Http\livewire\DataTables

>backend\user  will be App\Http\livewire\DataTables\Backend\User.php
>
>backend.user  will be App\Http\livewire\DataTables\Backend\User.php
> 
>user  will be App\Http\livewire\DataTables\User.php

code datatable 

><?php

namespace App\Http\Livewire\Datatables;

use MFrouh\DataTable\Datatables\Datatables;

class User extends Datatables
{

     /**
     * add model
     * ex public $model = 'App\Models\User';
     * ex public $model = User::class,
     */
    public $model = '';

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
     * columns available
     * ['TextColumn','NumberColumn','ImageColumn','PriceColumn',
     * 'DateTimeColumn','LabelColumn','LangColumn','MinuteColumn',
     * 'PercentageColumn']
     *
     *  TextColumn::name('name')->label('label')->sortable()->searchable(),
     *  NumberColumn::name('name')->label('label')->sortable()->searchable(),
     *  MinuteColumn::name('name')->label('label')->sortable()->searchable(),
     *  PercentageColumn::name('name')->label('label')->sortable()->searchable(),
     *  LangColumn::name('name')->filename('filename')->label('label'),
     *  DateTimeColumn::name('name')->format(format')->label('label')->sortable()->searchable(),
     *
     */
    public function columns(): array
    {
        return [];
    }

    /**
     * add actions in array
     *  Action::header()->events(['action'  => 'label']),
     *  Action::header()->urls(['action'  => 'label']),
     *  Action::action()->events(['action'  => 'label']),
     *  Action::action()->urls(['action' => 'label'])
     */
    public function actions(): array
    {
        return [];
    }
}
=======
composer require mfrouh/datatable-livewire 
>>>>>>> eb13753cba442604fcc56d5e2c519127e238e02b
