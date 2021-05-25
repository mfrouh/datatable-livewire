<?php

namespace MFrouh\DataTable\Console;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class MakeDataTableCommand extends GeneratorCommand
{
    protected $name = 'make:datatable {name} {--model=}';

    protected $description = 'Create a new DataTable';

    protected $type = 'Livewire DataTable';

    protected function getStub()
    {
        return __DIR__ . '/../../stubs/Datatable.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Livewire\Datatables';
    }

    public function handle()
    {
        parent::handle();

        $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);
        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }

    protected function qualifyClass($name)
    {
        $name = ltrim($name, '\\/');

        $name = str_replace('/', '\\', $name);

        $name = str_replace('.', '\\', $name);

        $name = Str::camel($name,'-');

        $name = join('\\', array_map('ucfirst', explode('\\',$name)));

        $rootNamespace = $this->rootNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }

        return $this->qualifyClass(
            $this->getDefaultNamespace(trim($rootNamespace, '\\')) . '\\' . $name
        );
    }
}
