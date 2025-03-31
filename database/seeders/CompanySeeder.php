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
        //
        $companies = collect([
            [
                'name' => 'Shaharyar Corporation',
                'email' => 'shery.codes@gmail.com',
                'industry_id' => 1,
                'company_size' => '1-50',
                'valuation' => '999000000000',
                'address' => 'SILICON VALLEY',
                'city_id' => 1,
                'city_area_id' => 3,
                'website' => 'https://test.com',
                'description' => 'About Us
Shaharyar Corporation is a leading technology innovator, shaping the future of web development, AI, and cloud computing. Founded with a passion for digital transformation, we empower businesses with cutting-edge software solutions, scalable infrastructures, and next-gen applications.

What We Do
🔹 Full-Stack Web Solutions – Expertise in Laravel, Livewire, and modern frameworks.
🔹 AI-Powered Applications – Leveraging artificial intelligence for automation & analytics.
🔹 Cloud & DevOps – Scalable solutions for enterprises worldwide.
🔹 Enterprise SaaS Development – Custom software tailored for global businesses.

Why Choose Us?
✅ Expert Laravel & Livewire Development – Building dynamic, real-time web apps.
✅ Agile & Scalable Solutions – We adapt to industry trends and business needs.
✅ Innovative Tech Culture – Driven by a passion for coding and problem-solving.
✅ Global Impact – Helping startups and enterprises scale their operations.

At Shaharyar Corporation, we don’t just build software—we shape the future of digital experiences. 🚀'
            ],
            [
                'name' => 'NovaTech Solutions',
                'email' => 'contact@novatech.com',
                'industry_id' => 3,
                'company_size' => '51-500',
                'valuation' => '850000000000',
                'address' => 'NEW YORK, USA',
                'city_id' => 2,
                'city_area_id' => 4,
                'website' => 'https://novatech.com',
                'description' => 'About Us
            NovaTech Solutions is a pioneer in artificial intelligence, machine learning, and enterprise automation. We develop intelligent software solutions that revolutionize businesses by enhancing efficiency, security, and scalability.
            
            What We Do
            🔹 AI & Machine Learning – Smart solutions for data-driven insights.
            🔹 Blockchain & Cybersecurity – Advanced security solutions for businesses.
            🔹 Enterprise Automation – Automating workflows for maximum productivity.
            🔹 Cloud Computing & DevOps – Scalable cloud solutions for modern businesses.
            
            Why Choose Us?
            ✅ AI-Driven Innovations – Pushing the boundaries of artificial intelligence.
            ✅ Secure & Scalable Solutions – Trusted by Fortune 500 companies.
            ✅ Data-Driven Approach – Leveraging big data for better decision-making.
            ✅ Global Presence – Serving enterprises across multiple continents.
            
            At NovaTech Solutions, we build intelligent systems that power the future. 🚀'
            ],
            [
                'name' => 'Vertex Innovations',
                'email' => 'info@vertexinnovations.com',
                'industry_id' => 2,
                'company_size' => '500+',
                'valuation' => '780000000000',
                'address' => 'LONDON, UK',
                'city_id' => 3,
                'city_area_id' => 6,
                'website' => 'https://vertexinnovations.com',
                'description' => 'About Us
            Vertex Innovations specializes in cutting-edge software development, fintech solutions, and AI-powered analytics. We help businesses scale efficiently, automate processes, and optimize financial services through technology.
            
            What We Do
            🔹 FinTech Solutions – Revolutionizing financial services with AI-driven platforms.
            🔹 Custom Web & App Development – Tailored solutions for startups & enterprises.
            🔹 Big Data & Business Intelligence – Transforming raw data into actionable insights.
            🔹 Cloud & SaaS Development – Scalable and secure cloud applications.
            
            Why Choose Us?
            ✅ Specialized in FinTech – Powering the future of digital banking & payments.
            ✅ Robust & Scalable Software – Built to handle enterprise-level demands.
            ✅ Innovative & Data-Driven – Using AI & ML to optimize business efficiency.
            ✅ Trusted by Global Clients – Delivering success to businesses worldwide.
            
            At Vertex Innovations, we turn technology into business growth. 🚀'
            ]
            
        ]);

        $companies->each(function($company){
            Company::create($company);
        });
    }
}
