<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Cria um novo Controller, Model, Migration e registra suas permissões automáticas';

    public function handle()
    {
        $name = strtolower($this->argument('name'));

        // Criar Model, Migration e Controller
        $this->call('make:model', ['name' => ucfirst($name), '-m' => true, '-c' => true, '--resource' => true]);

        // Ações padrão do CRUD
        $actions = ['visualizar', 'criar', 'editar', 'excluir'];

        foreach ($actions as $action) {
            Permission::firstOrCreate([
                'name' => "{$name}.{$action}",
                'guard_name' => 'web'
            ]);
        }

        $this->info("Módulo '{$name}' e suas 4 permissões foram criados com sucesso!");
    }
}