<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile App Development',
            'Game Development',
            'AI & Machine Learning',
            'Data Science',
            'Cybersecurity',
            'DevOps',
            'Blockchain',
            'Marketing Strategies',
            'Sales Techniques',
            'E-commerce',
            'Business Analysis',
            'Financial Management',
            'Entrepreneurship',
            'Human Resources',
            'Project Management',
            'Blogging Tips',
            'Content Marketing',
            'SEO',
            'Copywriting',
            'Video Content Creation',
            'Podcasting',
            'Digital Marketing',
            'Social Media Management',
            'Game Streaming',
            'Esports',
            'Movie Reviews',
            'TV Series Discussions',
            'Music Analysis',
            'Anime & Manga',
            'Meme Culture',
            'Online Communities',
            'Job Hunting',
            'Remote Work',
            'Freelancing',
            'Career Development',
            'Interview Preparation',
            'Resume Writing',
            'Work-Life Balance',
            'Networking Tips',
            'Freelance Gigs',
            'Affiliate Marketing',
            'Digital Product Selling',
            'Stock Trading',
            'Cryptocurrency Trading',
            'Real Estate Investment',
            'Dropshipping',
            'Online Courses',
            'Personal Finance',
            'Mental Health',
            'Motivation & Inspiration',
            'Leadership Skills',
            'Public Speaking',
            'Productivity Hacks',
            'Self-Help Techniques',
            'Emotional Intelligence',
            'Tech Gadgets',
            'Software Reviews',
            'App Development',
            'Cloud Computing',
            'Robotics & Automation',
            'Virtual Reality (VR)',
            'Augmented Reality (AR)',
            'Internet of Things (IoT)',
        ];
        $categories = [
            // Software Development
            'Web Development', 'Mobile App Development', 'Game Development', 'AI & Machine Learning',
            'Data Science', 'Cybersecurity', 'DevOps', 'Blockchain', 'Software Testing', 'API Development',

            // Business & Marketing
            'Marketing Strategies', 'Sales Techniques', 'E-commerce', 'Business Analysis',
            'Financial Management', 'Entrepreneurship', 'Human Resources', 'Project Management',
            'Leadership & Management', 'Market Research', 'Branding & Identity',

            // Content Creation & Blogging
            'Blogging Tips', 'Content Marketing', 'SEO', 'Copywriting',
            'Video Content Creation', 'Podcasting', 'Digital Marketing', 'Social Media Management',
            'Vlogging', 'Storytelling Techniques', 'Influencer Marketing',

            // Gaming & Entertainment
            'Game Streaming', 'Esports', 'Movie Reviews', 'TV Series Discussions',
            'Music Analysis', 'Anime & Manga', 'Meme Culture', 'Online Communities',
            'Cosplay & Fan Art', 'Creative Writing', 'Voice Acting',

            // Job & Career
            'Job Hunting', 'Remote Work', 'Freelancing', 'Career Development',
            'Interview Preparation', 'Resume Writing', 'Work-Life Balance', 'Networking Tips',
            'Skill Development', 'Internships', 'Job Market Trends',

            // Marketplace & Money Earning
            'Freelance Gigs', 'Affiliate Marketing', 'Digital Product Selling', 'Stock Trading',
            'Cryptocurrency Trading', 'Real Estate Investment', 'Dropshipping', 'Online Courses',
            'Side Hustles', 'Passive Income', 'Crowdfunding',

            // Self-Development & Personal Growth
            'Personal Finance', 'Mental Health', 'Motivation & Inspiration', 'Leadership Skills',
            'Public Speaking', 'Productivity Hacks', 'Self-Help Techniques', 'Emotional Intelligence',
            'Stress Management', 'Time Management', 'Life Coaching',

            // Technology & Innovations
            'Tech Gadgets', 'Software Reviews', 'App Development', 'Cloud Computing',
            'Robotics & Automation', 'Virtual Reality (VR)', 'Augmented Reality (AR)', 'Internet of Things (IoT)',
            'Quantum Computing', 'Big Data Analytics', 'Digital Transformation',

            // Arts & Creativity
            'Photography', 'Graphic Design', 'Illustration', 'Fashion Design',
            'Interior Design', 'Architecture', 'Fine Arts', 'Creative Writing',
            'Music Production', 'Filmmaking', 'Animation & Visual Effects',

            // Health & Fitness
            'Healthy Living', 'Workout Plans', 'Nutrition & Diet', 'Mental Wellness',
            'Yoga & Meditation', 'Self-Care', 'Physical Therapy', 'Sports Training',
            'Dietary Supplements', 'Holistic Health', 'Stress Relief Techniques',

            // Lifestyle & Travel
            'Travel Tips', 'Solo Traveling', 'Food & Cuisine', 'Fashion & Style',
            'Personal Development', 'Home Improvement', 'Minimalism', 'Sustainable Living',
            'Urban Living', 'Digital Nomad Lifestyle', 'Luxury Lifestyle',

            // Education & Learning
            'Online Learning', 'Study Tips', 'Language Learning', 'Educational Technology',
            'STEM Education', 'Art & Humanities', 'Exam Preparation', 'Research & Writing',
            'Homeschooling', 'Scholarships & Grants', 'Science Communication',
        ];
        foreach ($categories as $name) {
            $data['name'] = $name;
            $data['slug'] = Str::slug($name);
            Category::updateOrCreate(['name' => $name], $data);
        }
    }
}
