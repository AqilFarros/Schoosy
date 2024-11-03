<?php

namespace Database\Seeders;

use App\Models\Previllage;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => '2',
            'name' => 'zuhair',
            'email' => 'zuhair@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '3',
            'name' => 'dehan',
            'email' => 'dehan@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '4',
            'name' => 'daut',
            'email' => 'daut@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '5',
            'name' => 'aqil farros',
            'email' => 'aqil@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '6',
            'name' => 'aftar',
            'email' => 'aftar@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '7',
            'name' => 'raihan',
            'email' => 'raihan@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '8',
            'name' => 'zidane',
            'email' => 'zidane@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '9',
            'name' => 'jahran',
            'email' => 'jahran@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '10',
            'name' => 'gilang',
            'email' => 'gilang@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '11',
            'name' => 'hanifiz',
            'email' => 'hanifiz@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '12',
            'name' => 'nathan',
            'email' => 'nathan@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '13',
            'name' => 'hilman',
            'email' => 'hilman@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '14',
            'name' => 'qolbi',
            'email' => 'qolbi@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '15',
            'name' => 'eko',
            'email' => 'eko@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '16',
            'name' => 'ilham',
            'email' => 'ilham@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '17',
            'name' => 'haziq',
            'email' => 'haziq@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '18',
            'name' => 'zava',
            'email' => 'zava@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '19',
            'name' => 'abdullah',
            'email' => 'abdullah@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '20',
            'name' => 'fadel',
            'email' => 'fadel@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '21',
            'name' => 'fadlan',
            'email' => 'fadlan@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '22',
            'name' => 'himi',
            'email' => 'hilmi@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '23',
            'name' => 'tanker',
            'email' => 'tanker@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '24',
            'name' => 'akrom',
            'email' => 'akrom@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '25',
            'name' => 'fatir',
            'email' => 'fatir@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '26',
            'name' => 'satria',
            'email' => 'satria@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '27',
            'name' => 'tio',
            'email' => 'tio@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '28',
            'name' => 'debs',
            'email' => 'debs@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '29',
            'name' => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        User::factory()->create([
            'id' => '30',
            'name' => 'salman',
            'email' => 'salman@gmail.com',
            'password' => '12345678',
            'role' => 'user',
        ]);

        DB::table('schools')->insert([
            'id' => '1',
            'user_id' => 28,
            'name' => 'IDN Backpacker School Sentul',
            'slug' => 'idn-backpacker-school-sentul',
            'description' => 'Backpacking ASEAN, Edurace, Entrepreneur, Public Speaking, Berkuda, Beladiri, Character Building, Leadership Camp, Memanah, Susur Sungai, Panjat Tebing, Pecinta Alam, Berenang, Business Survival.',
            'image' => 'idn.jpg',
            'address' => 'CW7J+83H, Karang Tengah, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810',
            'email' => 'idns@gmail.com',
            'phone' => '08123456789',
            'website' => 'www.idn.com',
            'code' => 'IR8DF',
            'approve' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '1',
            'user_id' => '2',
            'name' => 'zuhair',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '2',
            'user_id' => '3',
            'name' => 'dehan',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '3',
            'user_id' => '4',
            'name' => 'daut',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '4',
            'user_id' => '5',
            'name' => 'aqil farros',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '5',
            'user_id' => '6',
            'name' => 'aftar',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '6',
            'user_id' => '7',
            'name' => 'raihan',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '7',
            'user_id' => '8',
            'name' => 'zidane',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '8',
            'user_id' => '9',
            'name' => 'jahran',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '9',
            'user_id' => '10',
            'name' => 'gilang',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '10',
            'user_id' => '11',
            'name' => 'hanifiz',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '11',
            'user_id' => '12',
            'name' => 'nathan',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '12',
            'user_id' => '13',
            'name' => 'hilma',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '13',
            'user_id' => '14',
            'name' => 'qolbi',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '14',
            'user_id' => '15',
            'name' => 'eko',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '15',
            'user_id' => '16',
            'name' => 'ilham',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '16',
            'user_id' => '17',
            'name' => 'haziq',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '17',
            'user_id' => '18',
            'name' => 'zava',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '18',
            'user_id' => '19',
            'name' => 'abdullah',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '19',
            'user_id' => '20',
            'name' => 'fadel',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '20',
            'user_id' => '21',
            'name' => 'fadlan',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '21',
            'user_id' => '22',
            'name' => 'hilmi',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '22',
            'user_id' => '23',
            'name' => 'tanker',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '23',
            'user_id' => '24',
            'name' => 'akrom',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '24',
            'user_id' => '25',
            'name' => 'fatir',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '25',
            'user_id' => '26',
            'name' => 'satria',
            'school_id' => '1',
            'role' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '26',
            'user_id' => '27',
            'name' => 'tio',
            'school_id' => '1',
            'role' => 'teacher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '27',
            'user_id' => '28',
            'name' => 'debs',
            'school_id' => '1',
            'role' => 'owner',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '28',
            'user_id' => '29',
            'name' => 'wahyu',
            'school_id' => '1',
            'role' => 'operator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('previllages')->insert([
            'id' => '29',
            'user_id' => '30',
            'name' => 'salman',
            'school_id' => '1',
            'role' => 'teacher',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
