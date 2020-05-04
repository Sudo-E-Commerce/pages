## Hướng dẫn sử dụng Sudo Page ##

**Giới thiệu:** Đây là package dùng để quản lý Trang đơn của SudoCms.

Mặc định package sẽ tạo ra giao diện quản lý cho toàn bộ trang đơn được đặt tại `/{admin_dir}/pages`, trong đó admin_dir là đường dẫn admin được đặt tại `config('app.admin_dir')`

### Cài đặt để sử dụng ###

- Package cần phải có base `sudo/core` để có thể hoạt động không gây ra lỗi
- Để có thể sử dụng Package cần require theo lệnh `composer require sudo/page`
- Chạy `php artisan migrate` để tạo các bảng phục vụ cho package

### Cấu hình tại Menu ###

	[
    	'type' 				=> 'multiple',
    	'name' 				=> 'Trang đơn',
		'icon' 				=> 'fas fa-file',
		'childs' => [
			[
				'name' 		=> 'Thêm mới',
				'route' 	=> 'admin.pages.create',
				'role' 		=> 'pages_create'
			],
			[
				'name' 		=> 'Danh sách',
				'route' 	=> 'admin.pages.index',
				'role' 		=> 'pages_index',
				'active' 	=> [ 'admin.pages.show', 'admin.pages.edit' ]
			]
		]
    ],
 
- Vị trí cấu hình được đặt tại `config/SudoMenu.php`
- Để có thể hiển thị tại menu, chúng ta có thể đặt đoạn cấu hình trên tại `config('SudoMenu.menu')`

### Cấu hình tại Module ###
	
	'pages' => [
		'name' 			=> 'Trang đơn',
		'permision' 	=> [
			[ 'type' => 'index', 'name' => 'Truy cập' ],
			[ 'type' => 'create', 'name' => 'Thêm' ],
			[ 'type' => 'edit', 'name' => 'Sửa' ],
			[ 'type' => 'restore', 'name' => 'Lấy lại' ],
			[ 'type' => 'delete', 'name' => 'Xóa' ],
		],
	],

- Vị trí cấu hình được đặt tại `config/SudoModule.php`
- Để có thể phân quyền, chúng ta có thể đặt đoạn cấu hình trên tại `config('SudoModule.modules')`
 