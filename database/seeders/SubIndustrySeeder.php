<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Industry;
use App\Models\SubIndustry;

class SubIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sub_Industries = [
            'Software Development' => [
                'Application Software',
                'System Software',
                'Open Source',
                'SaaS',
                'Mobile App Development',
                'Web Development',
                'Data Science',
                'Cybersecurity',
                'FinTech',
                'MedTech',
                'EdTech',
                'IoT',
                'Blockchain',
                'AI Services',
                'Cloud Computing Services',
                'Machine Learning Services',
            ],
            'Marketing' => [
                'Digital Marketing',
                'Content Marketing',
                'SEO Services',
                'Social Media Marketing',
                'Email Marketing',
                'Affiliate Marketing',
                'Market Research',
                'Brand Management',
                'Advertising',
                'Public Relations',
                'Event Marketing',
                'Product Marketing',
                'Influencer Marketing',
                'Promotional Marketing',
                'Creative Services',
            ],
            'Finance' => [
                'Investment Banking',
                'Financial Services',
                'Investment Management',
                'FinTech',
                'Accounting',
                'Insurance',
                'Real Estate',
                'Tax Services',
                'Wealth Management',
                'Risk Management',
                'Corporate Finance',
                'Personal Finance',
                'Mortgage Services',
                'Financial Planning',
                'Credit Services',
            ],
            'Design' => [
                'Graphic Design',
                'Web Design',
                'UX/UI Design',
                'Product Design',
                'Interior Design',
                'Fashion Design',
                'Industrial Design',
                'Motion Graphics',
                'Illustration',
                'Animation',
                'Game Design',
                'Exhibition Design',
                'Landscape Design',
                'Architectural Design',
                'Creative Services',
            ],
        ];
        
       foreach($sub_Industries as $industry_name => $sub_industries_names){
        $industry = Industry::where('name', $industry_name)->first();

        foreach($sub_industries_names as $sub_industry_name){
            SubIndustry::create([
                'industry_id' => $industry->id,
                'name' => $sub_industry_name
            ]);
        };


       }
        
    }
}
