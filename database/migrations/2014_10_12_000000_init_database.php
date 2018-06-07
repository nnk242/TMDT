<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        // Create Role table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->on('roles');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('roles')->insert([[
            'name' => 'administrator'],[
            'name' => 'customer'],

        ]);

        DB::table('users')->insert([[
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]]);

        Schema::create('car_manufacturer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_seo');
        });


        DB::table('car_manufacturer')->insert([[
            'name' => 'Honda',
            'name_seo' => 'honda',
        ],
            [
                'name' => 'BMW',
                'name_seo' => 'bmw',

            ],[
                'name' => 'KIA',
                'name_seo' => 'kia',

            ],[
                'name' => 'Hyundai',
                'name_seo' => 'hyundai',
            ]
        ]);


        Schema::create('status_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_seo');
        });

        DB::table('status_car')->insert([[
                'name' => 'Chưa thuê',
                'name_seo' => 'chua-thue',
            ],[
                'name' => 'Đã thuê',
            'name_seo' => 'da-thue',
            ],[
                'name' => 'Đã đặt',
                'name_seo' => 'da-đặt',
            ],

        ]);

        Schema::create('types_car', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_seo');
            $table->string('number');
        });

        DB::table('types_car')->insert([[
            'name' => 'Xe 4 chỗ',
            'name_seo' => 'xe-4-cho',
            'number' => '4',
        ],[
            'name' => 'Xe 7 chỗ',
            'name_seo' => 'xe-7-cho',
            'number' => '7',
        ],[
            'name' => 'Xe 9 chỗ',
            'name_seo' => 'xe-9-cho',
            'number' => '9',
        ],[
            'name' => 'Xe 16 chỗ',
            'name_seo' => 'xe-16-cho',
            'number' => '16',
        ],[
            'name' => 'Xe 19 chỗ',
            'name_seo' => 'xe-19-cho',
            'number' => '19',
        ],[
            'name' => 'Xe 29 chỗ',
            'name_seo' => 'xe-29-cho',
            'number' => '29',
        ],[
            'name' => 'Xe 35 chỗ',
            'name_seo' => 'xe-35-cho',
            'number' => '35',
        ],[
            'name' => 'Xe 45 chỗ',
            'name_seo' => 'xe-45-cho',
            'number' => '45',
        ],

        ]);

        Schema::create('car', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_manufacturer_id')->on('car_manufacturer');
            $table->string('image');
            $table->string('name');
            $table->text('title');
            $table->string('price');
            $table->integer('status')->on('status_car');
            $table->integer('types')->on('type_car');
            $table->string('local');
            $table->integer('time_max')->default(0);
            $table->integer('user_id')->default(1);
            $table->timestamps();
        });

        DB::table('car')->insert([[
            'car_manufacturer_id' => 1,
            'image' => 'cars/Honda_City_1_5_CVT_2017.jpg',
            'name' => 'Honda City 1.5 CVT 2017',
            'title' => 'Honda City 1.5 CVT 2017 là phiên bản cao cấp nhất trong dòng sedan ăn khách hàng đầu của hãng xe Nhật Bản. So với phiên bản thường CVT, Honda City 1.5 TOP được trang bị thêm nhiều tiện nghi hiện đại.',
            'price' => 50000,
            'status' => 1,
            'types' => 1,
            'local' => 'Hà Nội'
        ],[
            'car_manufacturer_id' => 4,
            'image' => 'cars/hyundai-grand-i10-ra-mat.png',
            'name' => 'HYUNDAI GRAND I10 HATCHBACK 2018',
            'title' => 'HYUNDAI GRAND I10 HATCHBACK 2018 Mẫu xe Hyundai Grand I10 hatchback khá nổi tiếng tại Việt nam với kích thước nhỏ gọn.',
            'price' => 50000,
            'status' => 1,
            'types' => 1,
            'local' => 'Hà Nội'

        ],[
            'car_manufacturer_id' => 2,
            'image' => 'cars/bmw320i.jpg',
            'name' => 'BMW 320i',
            'title' => 'Cabin là thiết kế hỗ trợ người lái với màn hình trung tâm mới hướng về phía người điều khiển. Vô-lăng bọc da, hệ thống điều hòa tự động hai vùng. Ngoài ra là hai lựa chọn trang bị Sport và Modern.',
            'price' => 150000,
            'status' => 1,
            'types' => 1,
            'local' => 'Hà Nội'

        ],[
            'car_manufacturer_id' => 3,
            'image' => 'cars/Optima_2_0_ATH.jpg',
            'name' => 'Optima 2.0 ATH',
            'title' => 'Một mẫu xe nữa của Kia được nhập khẩu nguyên chiếc từ Hàn Quốc. Mẫu xe hạng D này là đối thủ của Toyota Camry, Honda Accord, Hyundai Sonata trong phân khúc sedan hạng D. Xe sử dụng động cơ 2.0l, hộp số tự động 6 cấp.',
            'price' => 40000,
            'status' => 1,
            'types' => 1,
            'local' => 'Hà Nội'

        ],
        ]);

        Schema::create('log_car', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->on('users');
            $table->string('name');
            $table->string('number_phone')->default(1);
            $table->string('address')->default(1);
            $table->time('time_start')->default(1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
