<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'شركة الإبداع للتسويق',
                'description' => 'شركة رائدة في مجال التسويق الرقمي والإعلانات، نقدم حلول تسويقية مبتكرة للشركات والمؤسسات. نتميز بخبرة أكثر من 10 سنوات في السوق السعودي.',
                'industry' => 'التسويق والإعلان',
                'location' => 'الدمام',
                'website' => 'https://alibdaa-marketing.com',
                'email' => 'info@alibdaa-marketing.com',
                'phone' => '+966-13-123-4567',
                'employee_count' => 150,
                'logo' => 'fas fa-palette',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'بنك الأمانة',
                'description' => 'أحد أكبر البنوك السعودية، نقدم خدمات مصرفية شاملة للأفراد والشركات. نتميز بوجودنا في جميع أنحاء المملكة مع أكثر من 200 فرع.',
                'industry' => 'الخدمات المالية',
                'location' => 'جدة',
                'website' => 'https://al-amanah-bank.com',
                'email' => 'careers@al-amanah-bank.com',
                'phone' => '+966-12-987-6543',
                'employee_count' => 2000,
                'logo' => 'fas fa-university',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة التقنية المتقدمة',
                'description' => 'شركة تقنية متخصصة في تطوير البرمجيات والحلول الرقمية. نعمل مع كبرى الشركات لتطوير تطبيقات مخصصة وحلول تقنية مبتكرة.',
                'industry' => 'تكنولوجيا المعلومات',
                'location' => 'الرياض',
                'website' => 'https://advanced-tech.com',
                'email' => 'hr@advanced-tech.com',
                'phone' => '+966-11-456-7890',
                'employee_count' => 500,
                'logo' => 'fas fa-building',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة النفط السعودية',
                'description' => 'أكبر شركة نفط في العالم، نعمل في مجال استكشاف وإنتاج وتكرير وتسويق النفط والغاز الطبيعي. نقدم فرص عمل مميزة في مختلف التخصصات.',
                'industry' => 'النفط والغاز',
                'location' => 'الظهران',
                'website' => 'https://saudi-aramco.com',
                'email' => 'careers@saudi-aramco.com',
                'phone' => '+966-13-872-0000',
                'employee_count' => 70000,
                'logo' => 'fas fa-industry',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة الاتصالات السعودية',
                'description' => 'الشركة الرائدة في مجال الاتصالات وتكنولوجيا المعلومات في المملكة. نقدم خدمات الاتصالات والإنترنت والحلول الرقمية المتقدمة.',
                'industry' => 'الاتصالات',
                'location' => 'الرياض',
                'website' => 'https://stc.com.sa',
                'email' => 'jobs@stc.com.sa',
                'phone' => '+966-11-888-8888',
                'employee_count' => 15000,
                'logo' => 'fas fa-broadcast-tower',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة الرعاية الصحية المتقدمة',
                'description' => 'مجموعة طبية رائدة تقدم خدمات صحية متكاملة في مختلف التخصصات الطبية. نتميز بأحدث التقنيات الطبية وأفضل الكوادر الطبية.',
                'industry' => 'الرعاية الصحية',
                'location' => 'جدة',
                'website' => 'https://advanced-healthcare.com',
                'email' => 'careers@advanced-healthcare.com',
                'phone' => '+966-12-345-6789',
                'employee_count' => 800,
                'logo' => 'fas fa-heartbeat',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة التعليم الذكي',
                'description' => 'شركة متخصصة في تطوير حلول التعليم الإلكتروني والمنصات التعليمية. نعمل مع المؤسسات التعليمية لتطوير تجربة تعليمية مبتكرة.',
                'industry' => 'التعليم',
                'location' => 'الرياض',
                'website' => 'https://smart-education.com',
                'email' => 'info@smart-education.com',
                'phone' => '+966-11-234-5678',
                'employee_count' => 120,
                'logo' => 'fas fa-graduation-cap',
                'is_verified' => true,
                'is_active' => true
            ],
            [
                'name' => 'شركة النقل والخدمات اللوجستية',
                'description' => 'شركة متخصصة في خدمات النقل والشحن والخدمات اللوجستية. نقدم حلول نقل متكاملة للشركات والأفراد في جميع أنحاء المملكة.',
                'industry' => 'النقل والخدمات اللوجستية',
                'location' => 'الدمام',
                'website' => 'https://logistics-sa.com',
                'email' => 'careers@logistics-sa.com',
                'phone' => '+966-13-456-7890',
                'employee_count' => 300,
                'logo' => 'fas fa-truck',
                'is_verified' => true,
                'is_active' => true
            ]
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }

        $this->command->info('✅ تم إضافة الشركات بنجاح!');
    }
}
