# Hướng dẫn sử dụng Sudo Page #

## Cài đặt để sử dụng ##

## Cấu hình tại Menu ##

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

## Cấu hình tại Module ##
	
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

## Publish ##

## Sử dụng ##
