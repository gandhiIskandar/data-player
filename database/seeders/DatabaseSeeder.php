<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Account;
use App\Models\Currency;
use App\Models\Expenditure;
use App\Models\Member;
use App\Models\Privilege;
use App\Models\PrivilegeType;
use App\Models\Role;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use App\Models\Website;
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
        $this->generatePrivileges();
        $this->generateWebsite();
        $this->generateUserandRole();
        $this->generateAccount();
        $this->generateType();
        $this->generateCurrencies();

        // Member::factory(20)->create();
        // Transaction::factory(30)->create();
        // Expenditure::factory(15)->create();
        // Task::factory(25)->create();
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

         $user =   User::factory()->create([
                'name' => $role,
                'email' => str_replace(' ', '', $role) . '@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => $iteration,
                
            ]);

            $user->privileges()->sync([2,3,4]);

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

    public function generateCurrencies(){
        $currencies = ['BTC', 'USD', 'USDT', 'IDR'];

        foreach ($currencies as $currency) {
            Currency::create([
                'name' => $currency
            ]);
        }


    }

    public function generateWebsite(){
        $websites = ['GPS TOTO','JAPRI SLOT', 'JPHK88', 'HKS188'];

        foreach($websites as $website){
            Website::create([
                'name' => $website
            ]);
        }
    }

    public function generatePrivileges()
    {

        $p_types = ["Account", "Service", "Member", "Pembukuan Kas", "Pengeluaran"];

        //type = 1 id 1-3
        $privilegeAccount = ["Ganti Password", "Edit User Data", "Lihat Dashboard"];
        //end type 1



        //type = 2 id 4-12
        $privilegeService = ["Lihat Deposit", "Catat Deposit", "Edit Deposit", "Hapus Deposit", "Lihat Withdraw", "Catat Withdraw", "Edit Withdraw", "Hapus Withdraw", "Live Chat"];
        //end type 2

        //ketika catat deposit atau wd sudah bisa tambah user

        //type = 3 id 13-15
        $privilegeMember = ["Lihat Member", "Update Data Member", "Hapus Member"];
        //end type 3

        //type = 4 id 16-19
        $privilegePembukuanKas = ["Lihat Kas", "Catat Kas", "Edit Kas", "Hapus Kas"];
        //end type 4

        //type = 5 id 20-23
        $privilegePengeluaran = ["Lihat Pengeluaran", "Catat Pengeluaran", "Edit Pegeluaran", "Hapus Pengeluaran"];
        //end type 5

        $iteration = 1;

        foreach ($p_types as $type) {
            PrivilegeType::create([
                "name" => $type
            ]);

            $x = null;


            switch ($iteration) {
                case 1:
                    $x = $privilegeAccount;
                    break;
                case 2:
                    $x = $privilegeService;
                    break;
                case 3:
                    $x = $privilegeMember;
                    break;
                case 4:
                    $x = $privilegePembukuanKas;
                    break;
                case 5:
                    $x = $privilegePengeluaran;
                    break;
            }


            foreach ($x as $item) {
                Privilege::create([
                    "name" => $item,
                    "privilege_type_id" => $iteration
                ]);
            }

            $iteration++;
        }
    }
}
