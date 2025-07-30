<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobPost;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            // شركة التقنية المتقدمة
            [
                'title' => 'مطور ويب',
                'description' => 'مطلوب مطور ويب ذو خبرة في تطوير المواقع والتطبيقات',
                'company_name' => 'شركة التقنية المتقدمة',
                'location' => 'الرياض',
                'salary_range' => '8000-12000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'it',
                'qualification' => 'bachelor',
                'experience_years' => 3,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            [
                'title' => 'مطور تطبيقات موبايل',
                'description' => 'مطلوب مطور تطبيقات موبايل ذو خبرة في React Native',
                'company_name' => 'شركة التقنية المتقدمة',
                'location' => 'الرياض',
                'salary_range' => '10000-15000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'it',
                'qualification' => 'bachelor',
                'experience_years' => 4,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            
            // بنك الأمانة
            [
                'title' => 'محلل مالي',
                'description' => 'مطلوب محلل مالي ذو خبرة في التحليل المالي والتقارير',
                'company_name' => 'بنك الأمانة',
                'location' => 'جدة',
                'salary_range' => '12000-18000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'finance',
                'qualification' => 'bachelor',
                'experience_years' => 5,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            [
                'title' => 'مدير فرع',
                'description' => 'مطلوب مدير فرع ذو خبرة في إدارة الفروع المصرفية',
                'company_name' => 'بنك الأمانة',
                'location' => 'جدة',
                'salary_range' => '15000-25000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'finance',
                'qualification' => 'bachelor',
                'experience_years' => 8,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            
            // شركة الإبداع للتسويق
            [
                'title' => 'مدير تسويق رقمي',
                'description' => 'مطلوب مدير تسويق رقمي ذو خبرة في التسويق الإلكتروني',
                'company_name' => 'شركة الإبداع للتسويق',
                'location' => 'الدمام',
                'salary_range' => '9000-14000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'marketing',
                'qualification' => 'bachelor',
                'experience_years' => 4,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            [
                'title' => 'مصمم جرافيك',
                'description' => 'مطلوب مصمم جرافيك ذو خبرة في التصميم الإعلاني',
                'company_name' => 'شركة الإبداع للتسويق',
                'location' => 'الدمام',
                'salary_range' => '6000-10000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'marketing',
                'qualification' => 'bachelor',
                'experience_years' => 3,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            
            // شركة الاتصالات السعودية
            [
                'title' => 'مهندس شبكات',
                'description' => 'مطلوب مهندس شبكات ذو خبرة في إدارة الشبكات',
                'company_name' => 'شركة الاتصالات السعودية',
                'location' => 'الرياض',
                'salary_range' => '15000-22000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'it',
                'qualification' => 'bachelor',
                'experience_years' => 6,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ],
            [
                'title' => 'مطور برمجيات',
                'description' => 'مطلوب مطور برمجيات ذو خبرة في تطوير البرمجيات',
                'company_name' => 'شركة الاتصالات السعودية',
                'location' => 'الرياض',
                'salary_range' => '12000-18000 ريال',
                'job_type' => 'full_time',
                'work_field' => 'it',
                'qualification' => 'bachelor',
                'experience_years' => 5,
                'gender' => 'both',
                'language' => 'arabic',
                'ad_type' => 'job',
                'country_graduation' => 'السعودية',
                'country_residence' => 'السعودية',
                'is_active' => true,
                'published_at' => now()
            ]
        ];

        foreach ($jobs as $job) {
            JobPost::create($job);
        }

        $this->command->info('✅ تم إضافة الوظائف بنجاح!');
    }
} 