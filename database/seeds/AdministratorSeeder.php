<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User;
        $administrator->username = "administrator";
        $administrator->name = "Site Administrator";
        $administrator->email = "administrator@bimashop.id";
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->password = Hash::make("admintest");
        $administrator->phone = "08123456789";
        $administrator->avatar = "image.jpg";
        $administrator->address = "Siantan, Pontianak Utara";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
