<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Expenditure;
use App\Models\Member;
use App\Models\Role;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->generateUserandRole();
        $this->generateAccount();
        $this->generateType();

        Member::factory(20)->create();
         Transaction::factory(30)->create();
        Expenditure::factory(15)->create();
        Task::factory(10)->create();
    }

    public function generateUserandRole()
    {

        $roles = ['Costumer Service', 'Marketing', 'Admin', 'Super Admin'];
        $iteration = 1;
        foreach ($roles as $role) {

            //factory role
            Role::factory()->create([
                'name' => $role,
            ]);
            //end factory role

            //factory user

            User::factory()->create([
                'name' => $role,
                'email' => str_replace(' ','',$role).'@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => $iteration,
            ]);

            $iteration = $iteration + 1;
        }
    }

    public function generateAccount()
    {
        $accounts = ['BCA', 'BRI', 'Mandiri', 'Sinarmas', 'BNI'];

        foreach ($accounts as $account) {
            Account::factory()->create([

                'name' => $account,

            ]);
        }
    }

    public function generateType()
    {
        $types = ['Withdraw', 'Deposit', 'Pengeluaran', 'Pemasukan'];

        foreach ($types as $type) {
            Type::factory()->create([
                'name' => $type,
            ]);
        }
    }
}
