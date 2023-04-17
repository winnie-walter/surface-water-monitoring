<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $user = User::create([
            'first_name' => 'Group',
            'last_name' => '8',
            'email' => 'g8@gmail.com',
            'phone' =>'0712544816',
            'address' => 'dar',
            'gender'=>'KE',
            'password' => bcrypt('12345'),
            'created_at'=> $date,
            // 'updated_at'=>$date,


        ]);

        $role = Role::where('name','SuperAdmin')->get();



        $user->assignRole([$role]);
        //
    }
}
