<?php

namespace Database\Seeders;

use App\Models\JobPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $job_posts = collect(
            [
            [
                'company_id' =>  1,
                'title' => 'PHP LARAVEL DEVELOPER',
    'slug' => 'php-laravel-developer-karachi-shaharyar-corporation-1744153121',
                'description' => 'Job Overview:

We are seeking a skilled PHP Laravel Developer to join our dynamic team. The ideal candidate will be responsible for developing and maintaining high-quality web applications using the Laravel framework. This role requires collaboration with cross-functional teams to design, develop, and implement solutions that meet our business needs.​
Manatal

Key Responsibilities:

Develop, test, and maintain cutting-edge web-based applications using Laravel.​
Betterteam
+8
iMocha
+8
Talentlyft
+8

Collaborate with front-end developers to integrate user-facing elements with server-side logic.​
Manatal
+1
Expert Talent Connection
+1

Design and implement efficient, reusable, and reliable PHP code.​
Cutshort
+3
Adaface
+3
Betterteam
+3

Ensure the performance, quality, and responsiveness of applications.​
Vervoe

Identify and correct bottlenecks and fix bugs.​
Cutshort

Help maintain code quality, organization, and automation.​

Stay up-to-date with all recent developments in the framework and PHP as a whole.​

Collaborate with other team members and stakeholders.​

Qualifications:

Proven experience as a PHP Laravel Developer or similar role.​

Strong knowledge of PHP and the Laravel framework.​
iMocha
+1
Manatal
+1

Familiarity with front-end technologies such as HTML, CSS, JavaScript, and AJAX.​

Experience with SQL databases and query optimization.​

Understanding of MVC design patterns.​

Proficient understanding of code versioning tools, such as Git.​
Manatal

Strong problem-solving skills and critical thinking.​
Betterteam

Excellent communication and teamwork skills.​
Vervoe
+3
Expert Talent Connection
+3
Job Search | Indeed
+3

Preferred Qualifications:

Experience with RESTful APIs and third-party libraries.​

Knowledge of cloud platforms and services.​
Manatal
+1
Talentlyft
+1

Familiarity with Agile development methodologies.​

Working Conditions:

[Describe the work environment, e.g., remote work options, office setting, etc.]​

[Mention any travel requirements, if applicable.]​
Adaface
+4
Manatal
+4
Job Search | Indeed
+4

Application Instructions:

To apply, please submit your resume along with a cover letter detailing your experience and qualifications. Include any relevant portfolio or GitHub links showcasing your work.',

        'job_setting' => 'onsite',
        'city_id' => 1,
        'city_area_id' => 2,
        'address' => 'St 52, Area #7-D ,South Boulveyard Ln',
        'industry_id' => 1,
        'sub_industry_id' => 6,
        'job_type_id' => 1,
        'job_experience_id' => 3,
        'min_salary' => 30000,
        'max_salary' => 60000,
        'job_post_duration' => 7,
        'urgently_hiring' => 1,
        'apply_before' => '2025-04-10',
        'visibility' => 1,
],
[
    'company_id' => 2,
    'title' => 'FRONT-END REACT DEVELOPER',
    'slug' => 'front-end-react-developer-islamabad-novatech-solutions-1744153334',
    'description' => 'Job Overview:

We are looking for a talented Front-End React Developer to build dynamic, responsive web applications. The role involves working closely with back-end developers and designers to create seamless user experiences.

Key Responsibilities:
- Develop, optimize, and maintain React-based applications.
- Collaborate with UX/UI designers to create visually appealing components.
- Ensure applications are mobile-friendly and meet accessibility standards.
- Debug and optimize performance bottlenecks.
- Stay updated with modern JavaScript and React best practices.

Qualifications:
- Experience with React.js, JavaScript, and TypeScript.
- Strong knowledge of HTML, CSS, and responsive design principles.
- Familiarity with state management (Redux, Context API).
- Experience with RESTful APIs and back-end integration.
- Version control proficiency (Git, GitHub).

Preferred Qualifications:
- Experience with Next.js or other SSR frameworks.
- Knowledge of cloud platforms and CI/CD pipelines.

Application Instructions:
Submit your resume, portfolio, or GitHub link.',

    'job_setting' => 'remote',
    'city_id' => 3,
    'city_area_id' => 5,
    'address' => 'Tech Street 22, Silicon Valley, CA',
    'industry_id' => 2,
    'sub_industry_id' => 8,
    'job_type_id' => 2,
    'job_experience_id' => 2,
    'min_salary' => 40000,
    'max_salary' => 80000,
    'custom_educations' => ['myedu','matr','inter'],
    'custom_skills' => ['skills','skills2','skills4'],
    'job_post_duration' => 14,
    'urgently_hiring' => 0,
    'apply_before' => '2025-04-15',
    'visibility' => 1,
]

        ]);

        $job_posts->each(function($job_post){
            JobPost::create($job_post);
        });

    }
}
