<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @file
 *
 * Configuration for registered users
 *
 * Designed to be uses with CI-ACL
 * https://github.com/dollardad/CI-ACL
 *
 * This is a very simple ACL no database required login system.
 * The use case for this is small websites with one or two
 * users that require access to update blogs/news etc.
 * It is not designed for fully blown multiple users that can register etc.
 *
 * This has been designed to work with
 * No register function or lost password or remember me.
 *
 * Do you really need to hash the password ! If a hacker has got this far
 * they also have access to your database.php config file, your encryption key
 * in fact everything. You're basically screwed!!!
 *
 * IT IS IMPORTANT THAT THE APPLICATION DIRECTORY IS OUTSIDE OF THE WWW_ROOT or PUBLIC
 * DIRECTORY
 *
 * The password does not need to be hashed if the user has a unique password for this
 * site ie this password is not the same as their bank account password !
 */

$config['hash_password'] = TRUE; // TRUE or FALSE

// If you are going to hash the password do you want to salt it ?
$config['salt'] = 'hytuhyg&65'; // Enter a random string or NULL;

// You can change the login controller name here if you wish
$config['login_controller'] = 'login';

// Set the default landing page for users that successfully login.
// controller/method as a string or NULL, null will be the site main page 
$config['login_landing_page'] = 'dashboard';

// Set the flash message for logging a user out, NULL for no flashdata message
$config['login_message'] = 'Success! You have been logged in.';

// Set the flash message for logging a user out, NULL for no flashdata message
$config['failed_login_message'] = 'Nama dan kata sandi yang anda masukkan salah';

// Set the default landing page for users that logout
// string or NULL, null will be the site main page
$config['logout_landing_page'] = 'login';

// Set the flash message for logging a user out, NULL for no flashdata message
$config['logout_message'] = 'Anda telah berhasil keluar';

// Set the flash message for logging a user out, NULL for no flashdata message
$config['module_auth_message'] = 'Silakan login untuk mengakses halaman ini.';

//
$config['module_list'] = [
    "users" => "Pegawai", 
    "customer" => "Konsumen", 
    "principal" => "Prinsipal", 
    "bank" => "Info Bank",
    "warehouse" => "Gudang",
    "product" => "Produk Gudang", 
    "product_opname" => "Produk Toko Opname", 
    "product_conversion"  => "Konversi Produk", 
    "pricing" => "Penentuan Harga",
    "store" => "Toko", 
    "product_store" => "Produk Toko", 
    "product_opname_store" => "Produk Gudang Opname", 
    "product_distribution"  => "Pindah barang dari gudang ke toko", 
    "product_return" => "Pindah barang dari toko ke gudang",
    "proposal" => "Proposal", 
    "purchase_order" => "Order Beli",  
    "retail" => "Retail", 
    "sales_order" => "Order Jual", 
    "delivery_order" => "Order Kirim", 
    "credit" => "Hutang", 
    "debit" => "Piutang", 
    "extract" => "Pisah Faktur", 
    "join" => "Gabung Faktur"
];
$config['module_router'] =
    [
        [
            'title' => 'Dashboard',
            'icon' => 'icon-home',
            'child' => [
                [
                    'title' => 'Dashboard',
                    'url' => 'dashboard',
                    'module' => ''
                ], [
                    'title' => 'Grafik',
                    'child' => [
                        [
                            'title' => 'Grafik Pembelian',
                            'url' => 'dashboard/buying',
                            'module' => 'purchase_order'
                        ],
                        [
                            'title' => 'Grafik Penjualan',
                            'url' => 'dashboard/selling',
                            'module' => 'sales_order'
                        ],
                        [
                            'title' => 'Grafik Penjualan Retail',
                            'url' => 'dashboard/selling-retail',
                            'module' => 'retail'
                        ]
                    ]
                ], [
                    'title' => 'Hutang',
                    'child' => [
                        [
                            'title' => 'Daftar Hutang',
                            'url' => 'dashboard/credit',
                            'module' => 'credit'
                        ], [
                            'title' => 'Cek BG',
                            'url' => 'dashboard/credit-cek',
                            'module' => 'credit'
                        ]
                    ]
                ], [
                    'title' => 'Piutang',
                    'child' => [
                        [
                            'title' => 'Daftar Piutang',
                            'url' => 'dashboard/debit',
                            'module' => 'credit'
                        ], [
                            'title' => 'Cek BG',
                            'url' => 'dashboard/debit-cek',
                            'module' => 'debit'
                        ]
                    ]
                ],[
                    'title' => 'Barang',
                    'child' => [
                        [
                            'title' => 'Minimum Stok',
                            'url' => 'dashboard/minimumStock',
                            'module' => 'product'
                        ], [
                            'title' => 'Kadaluwarsa',
                            'url' => 'dashboard/expiredProducts',
                            'module' => 'product'
                        ],
                        [
                            'title' => 'Minimum Stok Toko',
                            'url' => 'dashboard/minimumStockStore',
                            'module' => 'product'
                        ], [
                            'title' => 'Kadaluwarsa Produk Toko',
                            'url' => 'dashboard/expiredProductsStore',
                            'module' => 'product'
                        ]
                    ]
                ]
            ]
        ],
        [
            'title' => 'Master',
            'icon' => 'icon-settings',
            'child' => [
                [
                    'title' => 'Pegawai',
                    'child' => [
                        [
                            'title' => 'Daftar Pegawai',
                            'url' => 'users',
                            'module' => 'users'
                        ], [
                            'title' => 'Hak Akses',
                            'url' => 'users/group',
                            'module' => 'users'
                        ]
                    ]
                ], [
                    'title' => 'Toko',
                    'url' => 'store',
                    'module' => 'store'
                ], [
                    'title' => 'Gudang',
                    'child' => [
                        [
                            'title' => 'Gudang',
                            'url' => 'warehouse',
                            'module' => 'warehouse'
                        ], [
                            'title' => 'Rak',
                            'url' => 'warehouse/rack',
                            'module' => 'warehouse'
                        ]
                    ]
                ], [
                    'title' => 'Prinsipal',
                    'child' => [
                        [
                            'title' => 'Daftar Prinsipal',
                            'url' => 'principal',
                            'module' => 'principal'
                        ], [
                            'title' => 'Info Bank',
                            'url' => 'bank',
                            'module' => 'bank'
                        ],
                    ]
                ], [
                    'title' => 'Konsumen',
                    'url' => 'customer',
                    'module' => 'customer'
                ], [
                    'title' => 'Produk',
                    'child' => [
                        [
                            'title' => "Daftar Produk",
                            'url' => 'product',
                            'module' => 'product'
                        ],
                        [
                            'title' => "Produk Toko",
                            'url' => 'product/store',
                            'module' => 'product_store'
                        ], [
                            'title' => "Kategori Produk",
                            'url' => 'product/category',
                            'module' => 'product'
                        ], [
                            'title' => "Satuan Produk",
                            'url' => 'product/unit',
                            'module' => 'product'
                        ]
                    ]
                ]
            ]
        ],
        [
            'title' => 'Produk',
            'icon' => 'icon-barcode',
            'child' => [
                [
                    'title' => "Opname Gudang",
                    'url' => 'stock-opname',
                    'module' => 'product_opname'
                ], [
                    'title' => "Opname Toko",
                    'url' => 'stock-opname/store',
                    'module' => 'product_opname_store'
                ], [
                    'title' => "Pindah ke Toko",
                    'url' => 'product-distribution',
                    'module' => 'product_distribution'
                ], [
                    'title' => "Pindah ke Gudang",
                    'url' => 'product-returns',
                    'module' => 'product_return'
                ], [
                    'title' => "Produk Pricing",
                    'url' => 'pricing',
                    'module' => 'pricing'
                ], [
                    'title' => "Konversi Produk",
                    'url' => 'product-conversion',
                    'module' => 'product_conversion'
                ], [
                    'title' => 'Penempatan Produk',
                    'url' => 'warehouse/placing',
                    'module' => 'warehouse'
                ]
            ]
        ],
        [
            'title' => 'Order Beli',
            'icon' => 'icon-tag',
            'child' => [
                [
                    'title' => 'Order Beli',
                    'url' => 'purchase-order',
                    'module' => 'purchase_order'
                ], 
                [
                    'title' => 'History',
                    'url' => 'purchase-order/history',
                    'module' => 'purchase_order'
                ]
            ]
        ],
        [
            'title' => 'Proposal',
            'icon' => 'icon-cart',
            'child' => [
                [
                    'title' => "Proposal Baru",
                    'url' => 'proposal',
                    'module' => 'proposal'

                ],
                [
                    'title' => 'Daftar Proposal',
                    'child' => [
                        [
                            'title' => "Tender",
                            'url' => 'proposal/list/tender',
                            'module' => 'proposal'

                        ],
                        [
                            'title' => "Pengadaan",
                            'url' => 'proposal/list/pengadaan',
                            'module' => 'proposal'

                        ],
                        [
                            'title' => "Pinjam Bendera",
                            'url' => 'proposal/list/pinjam',
                            'module' => 'proposal'

                        ]
                    ]
                ],
                [
                    'title' => "History",
                    'url' => 'proposal/history',
                    'module' => 'proposal'

                ]
            ]
        ],
        [
            'title' => 'Order Jual',
            'icon' => 'icon-cart',
            'child' => [
                [
                    'title' => 'Transaksi',
                    'child' => [
                        [
                            'title' => "Order Jual",
                            'url' => 'sales-order/search',
                            'module' => 'sales_order'
                        ],
                        [
                            'title' => 'History',
                            'url' => 'sales-order/history',
                            'module' => 'sales_order'
                        ]
                    ]
                ],
                [
                    'title' => 'Retur Jual',
                    'child' => [
                        [
                            'title' => "Retur Jual",
                            'url' => 'sales-order/returns',
                            'module' => 'sales_order'
                        ],
                        [
                            'title' => 'History',
                            'url' => 'sales-order/returns/history',
                            'module' => 'sales_order'
                        ]
                    ]
                ],
                [
                    'title' => 'Faktur',
                    'child' => [
                        [
                            'title' => "Gabung Faktur",
                            'url' => 'join',
                            'module' => 'join'

                        ],
                        [
                            'title' => "Pisah Faktur",
                            'url' => 'extract',
                            'module' => 'extract'

                        ],
                        [
                            'title' => 'History Nota Lama',
                            'url' => 'sales-order/history/old',
                            'module' => 'proposal'
                        ]
                    ]
                ]
            ]
        ],
        [
            'title' => 'Order Kirim',
            'icon' => 'icon-cube2',
            'child' => [
                [
                    'title' => 'Order Kirim',
                    'url' => 'delivery-order',
                    'module' => 'delivery_order'
                ], [
                    'title' => "History",
                    'url' => 'delivery-order/history',
                    'module' => 'delivery_order'

                ]
            ]
        ],
        [
            'title' => 'Hutang',
            'icon' => 'icon-credit',
            'child' => [
                [
                    'title' => "Daftar Hutang",
                    'url' => 'credit',
                    'module' => 'credit'
                ], [
                    'title' => "History",
                    'url' => 'credit/history',
                    'module' => 'credit'

                ]
            ]

        ],
        [
            'title' => 'Piutang',
            'icon' => 'icon-credit',
            'child' => [
                [
                    'title' => "Daftar Piutang",
                    'url' => 'debit',
                    'module' => 'debit'
                ], [
                    'title' => "History",
                    'url' => 'debit/history',
                    'module' => 'debit'

                ]
            ]

        ],
        [
            'title' => "Retail",
            'icon' => 'icon-contract',
            'child' => [
                [
                    'title' => 'Retail',
                    'url' => 'retail',
                    'module' => 'retail'
                ],
                [
                    'title' => 'History',
                    'url' => 'retail/history',
                    'module' => 'retail'
                ]
            ]
        ],
        [
            'title' => "Retur Retail",
            'icon' => 'icon-contract',
            'child' => [
               
                [
                    'title' => "Retur Retail",
                    'url' => 'retail/returns',
                    'module' => 'retail'
                ],
                [
                    'title' => 'History',
                    'url' => 'retail/returns/history',
                    'module' => 'retail'
                ]
            ]
        ],
        [
            'title' => 'Laporan',
            'icon' => 'icon-calendar',
            'child' => [
                [
                    'title' => 'Penjualan',
                    'child' => [
                        [
                            'title' => 'Grafik Penjualan',
                            'url' => 'report/penjualan',
                            'module' => 'sales_order'
                        ],   
                        [
                            'title' => 'Pengadaan Langsung',
                            'child' => [
                                [
                                    'title' => 'Penjualan Per Konsumen (Bulan)',
                                    'url' => 'report/penjualan/pengadaan/month',
                                    'module' => 'sales_order'
                                ],
                                [
                                    'title' => 'Penjualan Per Konsumen (Tahun)',
                                    'url' => 'report/penjualan/pengadaan/year',
                                    'module' => 'sales_order'
                                ]
                            ]
                        ],
                        [
                            'title' => 'Tender',
                            'child' => [
                                [
                                    'title' => 'Penjualan Per Konsumen (Bulan)',
                                    'url' => 'report/penjualan/tender/month',
                                    'module' => 'sales_order'
                                ],
                                [
                                    'title' => 'Penjualan Per Konsumen (Tahun)',
                                    'url' => 'report/penjualan/tender/year',
                                    'module' => 'sales_order'
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'title' => 'Retur Penjualan',
                    'child' => [
                        [
                            'title' => 'Retur Retail',
                            'url' => 'report/retur-penjualan-retail',
                            'module' => 'retail'
                        ],
                        // [
                        //     'title' => 'Penjualan Pengadaan',
                        //     'url' => 'report/retur-penjualan-pengadaan',
                        //     'module' => 'sales_order'
                        // ],
                        [
                            'title' => 'Penjualan',
                            'url' => 'report/retur-penjualan',
                            'module' => 'sales_order'
                        ]
                    ]
                ],
                [
                    'title' => 'Pembelian Produk',
                    'child' => [
                        [
                            'title' => 'Pembelian Per Supplier (Bulan)',
                            'url' => 'report/pembelian/month',
                            'module' => 'sales_order'
                        ],
                        [
                            'title' => 'Pembelian Per Supplier (Tahun)',
                            'url' => 'report/pembelian/year',
                            'module' => 'sales_order'
                        ],
                        [
                            'title' => 'Pembelian Per Supplier (Produk)',
                            'url' => 'report/product',
                            'module' => 'warehouse'
                        ]
                    ]
                ],
                [
                    'title' => 'Detail Transaksi Pinjam Bendera',
                    'url' => 'report/pinjam-bendera',
                    'module' => 'proposal'
                ],
                [
                    'title' => 'Keuangan',
                    'child' => [
                        [
                            'title' => 'Hutang',
                            'url' => 'report/credit',
                            'module' => 'credit'
                        ],
                        [
                            'title' => 'Piutang',
                            'url' => 'report/debit',
                            'module' => 'debit'
                        ]
                    ]
                ],
                [
                    'title' => 'Opname Produk',
                    'child' => [
                        [
                            'title' => 'Opname Produk Gudang',
                            'url' => 'report/opname',
                            'module' => 'product_opname'
                        ],
                        [
                            'title' => 'Opname Produk Toko',
                            'url' => 'report/opname-store',
                            'module' => 'product_opname_store'
                        ]
                    ]
                ],
                [
                    'title' => 'Mutasi',
                    'child' => [
                        [
                            'title' => 'Mutasi Produk Gudang',
                            'url' => 'report/mutasi',
                            'module' => 'product_opname'
                        ],
                        [
                            'title' => 'Mutasi Produk Toko',
                            'url' => 'report/mutasi-store',
                            'module' => 'product_opname_store'
                        ]
                    ]
                ]
            ]
        ]               
    ];
