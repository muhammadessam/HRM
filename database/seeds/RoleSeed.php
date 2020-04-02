<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['name' => 'مدير النظام'],
            ['name' => 'شؤون الموظفين'],
            ['name' => 'رئيس قسم'],
            ['name' => 'موظف'],

        ];

        foreach ($items as $item)
            Role::create($item);
    }
}
