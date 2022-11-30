<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-component')
            ->with('sidebars', $this->getSidebar());
    }

    private function getSidebar()
    {
        return  [
            [
                'title' => 'Slider',
                'icon' => 'image',
                'href' => '#',
                'permission' => ['slider-list', 'slider-create'],
                'child' => [
                    [
                        'title' => 'Manage  slider',
                        'icon' => 'insert_drive_file',
                        'permission' => ['slider-list'],
                        'href' => route('slider.index'),
                    ],
                    [
                        'title' => 'Create slider',
                        'icon' => 'create',
                        'permission' => ['slider-create'],
                        'href' => route('slider.create'),
                    ]
                ]
            ],
            [
                'title' => 'City',
                'icon' => 'location_on',
                'href' => '#',
                'permission' => ['city-create', 'city-list'],
                'child' => [
                    [
                        'title' => 'Manage City',
                        'icon' => 'insert_drive_file',
                        'permission' => ['city-list'],
                        'href' => route('city.index'),
                    ],
                    [
                        'title' => 'Add  City',
                        'icon' => 'create',
                        'permission' => ['city-create'],
                        'href' => route('city.create'),
                    ]
                ]
            ],
            [
                'title' => 'Property Details',
                'icon' => 'business',
                'href' => '#',
                'permission' => [
                    'amenity-create',
                    'amenity-list',
                    'purpose-create',
                    'purpose-list',
                    'category-list',
                    'category-create',
                    'road-type-list',
                    'road-type-create',
                    'feature-list'
                ],
                'child' => [
                    [
                        'title' => 'Amenties',
                        'icon' => 'insert_drive_file',
                        'permission' => ['amenity-list'],
                        'href' => route('amenity.index'),
                    ],
                    [
                        'title' => 'Purpose',
                        'icon' => 'insert_drive_file',
                        'permission' => ['purpose-list'],
                        'href' => route('purpose.index'),
                    ],
                    [
                        'title' => 'Property Type',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('type.index'),
                    ],
                    [
                        'title' => 'Property Category',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('property-category.index'),
                    ],
                    [
                        'title' => 'Road Type',
                        'icon' => 'streetview',
                        'permission' => ['property-list'],
                        'href' => route('road-type.index'),
                    ],
                    [
                        'title' => 'Feature',
                        'icon' => 'list',
                        'permission' => ['feature-list'],
                        'href' => route('feature.index'),
                    ],
                    [
                        'title' => 'Facilities',
                        'icon' => 'streetview',
                        'permission' => ['property-list'],
                        'href' => route('facility.index'),
                    ],

                ]
            ],

            [
                'title' => 'Property',
                'icon' => 'business',
                'href' => '#',
                'permission' => ['property-create', 'property-list'],
                'child' => [
                    [
                        'title' => 'Manage property',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('properties.index'),
                    ],
                    [
                        'title' => 'Add  property',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('properties.create'),
                    ]
                ]
            ],
            [
                'title' => 'Blog',
                'icon' => 'library_books',
                'href' => '#',
                'permission' => ['blog-category-list', 'blog-list'],
                'child' => [
                    [
                        'title' => 'Blog Category ',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('blog-category.index'),
                    ],
                    [
                        'title' => 'Blog',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('blog.index'),
                    ]
                ]
            ],
            [
                'title' => 'News',
                'icon' => 'fact_check',
                'href' => '#',
                'permission' => ['news-category-list', 'news-list'],
                'child' => [
                    [
                        'title' => 'News Category ',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('news-category.index'),
                    ],
                    [
                        'title' => 'News',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('news.index'),
                    ]
                ]
            ],
            [
                'title' => 'Service',
                'icon' => 'library_books',
                'href' => '#',
                'permission' => ['service-category-list', 'service-list'],
                'child' => [
                    [
                        'title' => 'Service Category ',
                        'icon' => 'insert_drive_file',
                        'permission' => ['service-list'],
                        'href' => route('serviceCategory.index'),
                    ],
                    [
                        'title' => 'Service',
                        'icon' => 'create',
                        'permission' => ['service-create'],
                        'href' => route('service.index'),
                    ]
                ]
            ],
            [
                'title' => 'Faq',
                'icon' => 'question_answer',
                'href' => '#',
                'permission' => ['faq-list', 'faq-create'],
                'child' => [
                    [
                        'title' => 'Manage  FAQ',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('faq.index'),
                    ],
                    [
                        'title' => 'Create FAQ',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('faq.create'),
                    ]
                ]
            ],
            [
                'title' => 'Testimonial',
                'icon' => 'surround_sound',
                'href' => '#',
                'permission' => ['testimonial-list', 'testimonial-create'],
                'child' => [
                    [
                        'title' => 'Manage  Testimonial',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('testimonial.index'),
                    ],
                    [
                        'title' => 'Create Testimonial',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('testimonial.create'),
                    ]
                ]
            ],
            [
                'title' => 'Advertisement',
                'icon' => 'newspaper',
                'href' => '#',
                'permission' => ['advertisement-list', 'advertisement-create'],
                'child' => [
                    [
                        'title' => 'Manage  advertisement',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('advertisements.index'),
                    ],
                    [
                        'title' => 'Create advertisement',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('advertisements.create'),
                    ]
                ]
            ],
            [
                'title' => 'Pricings',
                'icon' => 'paid',
                'href' => '#',
                'permission' => ['pricing-list', 'pricing-create'],
                'child' => [
                    [
                        'title' => 'Manage  pricing',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('pricings.index'),
                    ],
                    [
                        'title' => 'Create pricing',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('pricings.create'),
                    ]
                ]
            ],
            [
                'title' => 'Team',
                'icon' => 'group',
                'href' => '#',
                'permission' => ['team-list', 'team-create'],
                'child' => [
                    [
                        'title' => 'Manage  Team',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('team.index'),
                    ],
                    [
                        'title' => 'Create Team',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('team.create'),
                    ]
                ]
            ],
            [
                'title' => 'Menu',
                'icon' => 'list',
                'href' => '#',
                'permission' => ['menu-list', 'menu-create'],
                'child' => [
                    [
                        'title' => 'Manage  menu',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('menu.index'),
                    ],
                    [
                        'title' => 'Create menu',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('menu.create'),
                    ]
                ]
            ],
            [
                'title' => 'Agency',
                'icon' => 'list',
                'href' => '#',
                'permission' => ['agency-list', 'agency-create'],
                'child' => [
                    [
                        'title' => 'Manage  agency',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-list'],
                        'href' => route('agency.index'),
                    ],

                    [
                        'title' => 'Create agency',
                        'icon' => 'create',
                        'permission' => ['property-create'],
                        'href' => route('agency.create'),
                    ]
                ]
            ],
            [
                'title' => 'Tradelink',
                'icon' => 'list',
                'href' => '#',
                'permission' => ['tradelink-list', 'tradelink-create'],
                'child' => [
                    [
                        'title' => 'Manage  Tradelink  Category',
                        'icon' => 'insert_drive_file',
                        'permission' => ['tradelink-category-list'],
                        'href' => route('tradelink-category.index'),
                    ],

                    [
                        'title' => 'Mange Tradelink',
                        'icon' => 'insert_drive_file',
                        'permission' => ['tradelink-list'],
                        'href' => route('tradelink.index'),
                    ],
                    [
                        'title' => 'Create Tradelink',
                        'icon' => 'create',
                        'permission' => ['tradelink-create'],
                        'href' => route('tradelink.create'),
                    ]
                ]
            ],
            [
                'title' => 'Customers',
                'icon' => 'group_work',
                'href' => route('customer.index'),
                'permission' => ['customer-list', 'customer-create'],
                'child' => null
            ],
            [
                'title' => 'Pages',
                'icon' => 'book',
                'href' => route('page.index'),
                'permission' => ['page-list', 'page-create'],
                'child' => null
            ],
            [
                'title' => 'Units',
                'icon' => 'book',
                'href' => route('unit.index'),
                'permission' => ['unit-list', 'unit-create'],
                'child' => null
            ],
            [
                'title' => 'Subscriber',
                'icon' => 'supervised_user_circle',
                'href' => route('admin.subscriber'),
                'permission' => ['subscriber-list', 'subscriber-create'],
                'child' => null
            ],
            [
                'title' => 'setting',
                'icon' => 'settings',
                'href' => route('setting'),
                'permission' => ['setting-list', 'setting-create'],
                'child' => null
            ],
            [
                'title' => 'User Management',
                'icon' => 'groups',
                'href' => '#',
                'permission' => ['user-list', 'role-list', 'permission-list'],
                'child' => [
                    [
                        'title' => 'Permissions',
                        'icon' => 'insert_drive_file',
                        'permission' => ['permission-list'],
                        'href' => route('permissions.index'),
                    ],
                    [
                        'title' => 'Roles',
                        'icon' => 'create',
                        'permission' => ['role-create'],
                        'href' => route('roles.index'),
                    ],
                    [
                        'title' => 'Users',
                        'icon' => 'create',
                        'permission' => ['user-list','staff-list'],
                        'href' => route('staffs.index'),
                    ]
                ]
            ],
            [
                'title' => 'Restore',
                'icon' => 'restore_from_trash',
                'href' => '#',
                'permission' => ['blog-restore', 'news-restore', 'agency-restore', 'faq-restore', 'testimonial-restore', 'property-restore'],
                'child' => [
                    [
                        'title' => 'Blog',
                        'icon' => 'insert_drive_file',
                        'permission' => ['blog-restore'],
                        'href' => route('deletedBlogs'),
                    ],
                    [
                        'title' => 'Property',
                        'icon' => 'insert_drive_file',
                        'permission' => ['property-restore'],
                        'href' => route('deletedProperty'),
                    ],
                    [
                        'title' => 'News',
                        'icon' => 'insert_drive_file',
                        'permission' => ['news-restore'],
                        'href' => route('deletedNews'),
                    ],
                    [
                        'title' => 'Agency',
                        'icon' => 'insert_drive_file',
                        'permission' => ['agency-restore'],
                        'href' => route('deletedAgency'),
                    ],
                    [
                        'title' => 'FAQ',
                        'icon' => 'insert_drive_file',
                        'permission' => ['faq-restore'],
                        'href' => route('deletedFaqs'),
                    ],



                ]
            ],


        ];
    }
}
