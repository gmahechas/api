<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Modules\Features\B\Department\Models\Department::truncate();
        \App\Modules\Features\B\Department\Models\Department::flushEventListeners();
        \App\Modules\Features\B\Department\Models\Department::create([
            'department_name' => 'CONTABILIDAD',
            'department_description' => 'DEPARTAMENTO CONTABLE'
        ]);
        \App\Modules\Features\B\Department\Models\Department::create([
            'department_name' => 'COMPRAS',
            'department_description' => 'DEPARTAMENTO DE COMPRAS'
        ]);
        \App\Modules\Features\B\Department\Models\Department::create([
            'department_name' => 'CARTERA',
            'department_description' => 'DEPARTAMENTO DE CARTERA'
        ]);
        \App\Modules\Features\B\Department\Models\Department::create([
            'department_name' => 'COMERCIAL',
            'department_description' => 'DEPARTAMENTO COMERCIAL'
        ]);
    }
}
