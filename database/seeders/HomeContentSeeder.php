<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        HomeContent::updateOrCreate(
            ['key' => 'hero_title'],
            [
                'value' => [
                    'en' => 'Bringing health to life for the whole family.',
                    'ar' => 'نقدم الصحة والحياة الصحية لكل أفراد العائلة.',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'hero_subtitle'],
            [
                'value' => [
                    'en' => 'The best medical center',
                    'ar' => 'أفضل مركز طبي',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'welcome_title'],
            [
                'value' => [
                    'en' => 'Welcome To Modern Clinic.',
                    'ar' => 'مرحبًا بكم في العيادة الحديثة.',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'welcome_description'],
            [
                'value' => [
                    'en' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'ar' => 'نقدم لكم أفضل خدمات الرعاية الصحية باستخدام أحدث الأساليب الطبية.',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'welcome_feature_1'],
            [
                'value' => [
                    'en' => 'Lorem ipsum dolor sit amet',
                    'ar' => 'رعاية طبية متميزة',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'welcome_feature_2'],
            [
                'value' => [
                    'en' => 'Consectetur adipisicing elit, sed do',
                    'ar' => 'أطباء متخصصون وذوو خبرة',
                ],
            ]
        );

        HomeContent::updateOrCreate(
            ['key' => 'welcome_feature_3'],
            [
                'value' => [
                    'en' => 'Eiusmod tempor incididunt ut labore',
                    'ar' => 'أحدث التقنيات والخدمات الطبية',
                ],
            ]
        );
        HomeContent::updateOrCreate(
    ['key' => 'nav_home'],
    [
        'value' => [
            'en' => 'Home',
            'ar' => 'الرئيسية',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_about'],
    [
        'value' => [
            'en' => 'About',
            'ar' => 'من نحن',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_blog'],
    [
        'value' => [
            'en' => 'Blog',
            'ar' => 'المدونة',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_pages'],
    [
        'value' => [
            'en' => 'Pages',
            'ar' => 'الصفحات',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_department'],
    [
        'value' => [
            'en' => 'Department',
            'ar' => 'الأقسام',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_elements'],
    [
        'value' => [
            'en' => 'Elements',
            'ar' => 'العناصر',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_contact'],
    [
        'value' => [
            'en' => 'Contact',
            'ar' => 'تواصل معنا',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'nav_book_appointment'],
    [
        'value' => [
            'en' => 'Book Appointment',
            'ar' => 'احجز موعدًا',
        ],
    ]
);
HomeContent::updateOrCreate(
    ['key' => 'discover_more'],
    [
        'value' => [
            'en' => 'Discover More',
            'ar' => 'اكتشف المزيد',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'departments_title'],
    [
        'value' => [
            'en' => 'Departments',
            'ar' => 'الأقسام',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'departments_description'],
    [
        'value' => [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.',
            'ar' => 'نقدم مجموعة متنوعة من التخصصات الطبية لتوفير أفضل رعاية صحية للمرضى.',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'learn_more'],
    [
        'value' => [
            'en' => 'Learn More',
            'ar' => 'اعرف المزيد',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_dentistry'],
    [
        'value' => [
            'en' => 'Dentistry',
            'ar' => 'طب الأسنان',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_cardiology'],
    [
        'value' => [
            'en' => 'Cardiology',
            'ar' => 'أمراض القلب',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_ent'],
    [
        'value' => [
            'en' => 'ENT Specialists',
            'ar' => 'أطباء الأنف والأذن والحنجرة',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_astrology'],
    [
        'value' => [
            'en' => 'Astrology',
            'ar' => 'علم الفلك',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_neuroanatomy'],
    [
        'value' => [
            'en' => 'Neuroanatomy',
            'ar' => 'تشريح الجهاز العصبي',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_blood'],
    [
        'value' => [
            'en' => 'Blood Screening',
            'ar' => 'فحص الدم',
        ],
    ]
);
HomeContent::updateOrCreate(
    ['key' => 'department_content_title'],
    [
        'value' => [
            'en' => 'Dentist with surgical mask holding scaler near patient',
            'ar' => 'طبيب أسنان يرتدي كمامة جراحية أثناء علاج المريض',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'department_content_description'],
    [
        'value' => [
            'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'ar' => 'نقدم خدمات طبية متخصصة باستخدام أحدث التقنيات لضمان أفضل رعاية ممكنة.',
        ],
    ]
);

HomeContent::updateOrCreate(
    ['key' => 'make_appointment'],
    [
        'value' => [
            'en' => 'Make An Appointment',
            'ar' => 'احجز موعدًا',
        ],
    ]
);
    }
}