<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $skills = collect([
            // Software Development (ID: 1)
            ['name' => 'PHP', 'industry_id' => 1],
            ['name' => 'Laravel', 'industry_id' => 1],
            ['name' => 'JavaScript', 'industry_id' => 1],
            ['name' => 'React', 'industry_id' => 1],
            ['name' => 'Node.js', 'industry_id' => 1],
            ['name' => 'SQL', 'industry_id' => 1],
            ['name' => 'Python', 'industry_id' => 1],
            ['name' => 'Java', 'industry_id' => 1],
            ['name' => 'C#', 'industry_id' => 1],
            ['name' => 'DevOps', 'industry_id' => 1],
        
            // Marketing (ID: 2)
            ['name' => 'SEO', 'industry_id' => 2],
            ['name' => 'Social Media Marketing', 'industry_id' => 2],
            ['name' => 'Content Writing', 'industry_id' => 2],
            ['name' => 'Email Marketing', 'industry_id' => 2],
            ['name' => 'Google Ads', 'industry_id' => 2],
            ['name' => 'Facebook Ads', 'industry_id' => 2],
            ['name' => 'Affiliate Marketing', 'industry_id' => 2],
            ['name' => 'Market Research', 'industry_id' => 2],
        
            // Finance (ID: 3)
            ['name' => 'Accounting', 'industry_id' => 3],
            ['name' => 'Financial Analysis', 'industry_id' => 3],
            ['name' => 'Investment Management', 'industry_id' => 3],
            ['name' => 'Tax Preparation', 'industry_id' => 3],
            ['name' => 'Bookkeeping', 'industry_id' => 3],
            ['name' => 'Auditing', 'industry_id' => 3],
            ['name' => 'Risk Management', 'industry_id' => 3],
        
            // Design (ID: 4)
            ['name' => 'Graphic Design', 'industry_id' => 4],
            ['name' => 'UI/UX Design', 'industry_id' => 4],
            ['name' => 'Adobe Photoshop', 'industry_id' => 4],
            ['name' => 'Adobe Illustrator', 'industry_id' => 4],
            ['name' => 'Figma', 'industry_id' => 4],
            ['name' => 'Motion Graphics', 'industry_id' => 4],
            ['name' => '3D Modeling', 'industry_id' => 4]
        ]);

        $skills->each(function($skill){
            Skill::create($skill);
        });
     
    }
}
