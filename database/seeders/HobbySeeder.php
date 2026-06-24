<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobbies = [
            // Art & Creativity
            ['name' => 'Drawing', 'type' => 'Art & Creativity'],
            ['name' => 'Painting', 'type' => 'Art & Creativity'],
            ['name' => 'Photography', 'type' => 'Art & Creativity'],
            ['name' => 'Crafting', 'type' => 'Art & Creativity'],
            ['name' => 'Origami', 'type' => 'Art & Creativity'],
            ['name' => 'Pottery', 'type' => 'Art & Creativity'],
            ['name' => 'Sketching', 'type' => 'Art & Creativity'],
            ['name' => 'Graphic Design', 'type' => 'Art & Creativity'],
            ['name' => 'Animation', 'type' => 'Art & Creativity'],
            ['name' => 'Tattoo Artistry', 'type' => 'Art & Creativity'],

            // Performance Arts
            ['name' => 'Singing', 'type' => 'Performance Arts'],
            ['name' => 'Dancing', 'type' => 'Performance Arts'],
            ['name' => 'Playing Guitar', 'type' => 'Performance Arts'],
            ['name' => 'Playing Piano', 'type' => 'Performance Arts'],
            ['name' => 'Playing Drums', 'type' => 'Performance Arts'],
            ['name' => 'Acting', 'type' => 'Performance Arts'],
            ['name' => 'Stand-Up Comedy', 'type' => 'Performance Arts'],
            ['name' => 'Voice Acting', 'type' => 'Performance Arts'],
            ['name' => 'Beatboxing', 'type' => 'Performance Arts'],
            ['name' => 'Magic Tricks', 'type' => 'Performance Arts'],

            // Sports & Fitness
            ['name' => 'Running', 'type' => 'Sports & Fitness'],
            ['name' => 'Cycling', 'type' => 'Sports & Fitness'],
            ['name' => 'Swimming', 'type' => 'Sports & Fitness'],
            ['name' => 'Rock Climbing', 'type' => 'Sports & Fitness'],
            ['name' => 'Archery', 'type' => 'Sports & Fitness'],
            ['name' => 'Martial Arts', 'type' => 'Sports & Fitness'],
            ['name' => 'Yoga', 'type' => 'Sports & Fitness'],
            ['name' => 'CrossFit', 'type' => 'Sports & Fitness'],
            ['name' => 'Weightlifting', 'type' => 'Sports & Fitness'],
            ['name' => 'Meditation', 'type' => 'Health & Wellness'],

            // Technology & Gaming
            ['name' => 'Gaming', 'type' => 'Technology & Gaming'],
            ['name' => 'Coding', 'type' => 'Technology & Gaming'],
            ['name' => 'Robotics', 'type' => 'Technology & Gaming'],
            ['name' => 'App Development', 'type' => 'Technology & Gaming'],
            ['name' => 'Virtual Reality Gaming', 'type' => 'Technology & Gaming'],
            ['name' => 'AI & Machine Learning', 'type' => 'Technology & Gaming'],
            ['name' => 'Esports', 'type' => 'Technology & Gaming'],
            ['name' => 'Cryptography', 'type' => 'Technology & Gaming'],

            // Nature & Adventure
            ['name' => 'Hiking', 'type' => 'Nature & Adventure'],
            ['name' => 'Camping', 'type' => 'Nature & Adventure'],
            ['name' => 'Fishing', 'type' => 'Nature & Adventure'],
            ['name' => 'Scuba Diving', 'type' => 'Nature & Adventure'],
            ['name' => 'Skydiving', 'type' => 'Nature & Adventure'],
            ['name' => 'Wildlife Conservation', 'type' => 'Nature & Adventure'],
            ['name' => 'Bird Watching', 'type' => 'Nature & Adventure'],
            ['name' => 'Treasure Hunting', 'type' => 'Nature & Adventure'],

            // Science & Discovery
            ['name' => 'Astronomy', 'type' => 'Science & Discovery'],
            ['name' => 'Geology', 'type' => 'Science & Discovery'],
            ['name' => 'Meteorology', 'type' => 'Science & Discovery'],
            ['name' => 'Marine Biology', 'type' => 'Science & Discovery'],
            ['name' => 'Quantum Physics', 'type' => 'Science & Discovery'],

            // Writing & Literature
            ['name' => 'Poetry', 'type' => 'Writing & Literature'],
            ['name' => 'Creative Writing', 'type' => 'Writing & Literature'],
            ['name' => 'Screenwriting', 'type' => 'Writing & Literature'],
            ['name' => 'Writing Short Stories', 'type' => 'Writing & Literature'],
            ['name' => 'Book Reviewing', 'type' => 'Writing & Literature'],

            // Food & Culinary Arts
            ['name' => 'Baking', 'type' => 'Food & Culinary Arts'],
            ['name' => 'Gourmet Cooking', 'type' => 'Food & Culinary Arts'],
            ['name' => 'Wine Tasting', 'type' => 'Food & Culinary Arts'],
            ['name' => 'Mixology', 'type' => 'Food & Culinary Arts'],
            ['name' => 'Culinary Arts', 'type' => 'Food & Culinary Arts'],

            // Cultural & Historical
            ['name' => 'Genealogy', 'type' => 'Cultural & Historical'],
            ['name' => 'Mythology Studies', 'type' => 'Cultural & Historical'],
            ['name' => 'Historical Reenactments', 'type' => 'Cultural & Historical'],
            ['name' => 'Museum Touring', 'type' => 'Cultural & Historical'],
            ['name' => 'Cultural Anthropology', 'type' => 'Cultural & Historical'],

            // Collection & Memorabilia
            ['name' => 'Stamp Collecting', 'type' => 'Collection & Memorabilia'],
            ['name' => 'Coin Collecting', 'type' => 'Collection & Memorabilia'],
            ['name' => 'Antique Collection', 'type' => 'Collection & Memorabilia'],
            ['name' => 'Action Figure Collection', 'type' => 'Collection & Memorabilia'],
            ['name' => 'Memorabilia Collecting', 'type' => 'Collection & Memorabilia'],

            // DIY & Handicrafts
            ['name' => 'Soap Making', 'type' => 'DIY & Handicrafts'],
            ['name' => 'Jewelry Making', 'type' => 'DIY & Handicrafts'],
            ['name' => 'Crochet', 'type' => 'DIY & Handicrafts'],
            ['name' => 'Embroidery', 'type' => 'DIY & Handicrafts'],
            ['name' => 'Beading', 'type' => 'DIY & Handicrafts'],

            // Mind Games & Strategy
            ['name' => 'Sudoku', 'type' => 'Mind Games & Strategy'],
            ['name' => 'Scrabble', 'type' => 'Mind Games & Strategy'],
            ['name' => 'Bridge (Card Game)', 'type' => 'Mind Games & Strategy'],
            ['name' => 'Strategic Board Games', 'type' => 'Mind Games & Strategy'],
            ['name' => 'Escape Room Puzzles', 'type' => 'Mind Games & Strategy'],

            // Adventure & Extreme Sports
            ['name' => 'Bungee Jumping', 'type' => 'Adventure & Extreme Sports'],
            ['name' => 'Paragliding', 'type' => 'Adventure & Extreme Sports'],
            ['name' => 'Off-Roading', 'type' => 'Adventure & Extreme Sports'],
            ['name' => 'Snowboarding', 'type' => 'Adventure & Extreme Sports'],
            ['name' => 'Parkour', 'type' => 'Adventure & Extreme Sports'],

            // Health & Wellness
            ['name' => 'Meditation', 'type' => 'Health & Wellness'],
            ['name' => 'Yoga', 'type' => 'Health & Wellness'],
            ['name' => 'Mindfulness', 'type' => 'Health & Wellness'],

            // Travel & Exploration
            ['name' => 'Travel Blogging', 'type' => 'Travel & Exploration'],
            ['name' => 'Backpacking', 'type' => 'Travel & Exploration'],
            ['name' => 'Road Tripping', 'type' => 'Travel & Exploration'],

            // Intellectual & Educational
            ['name' => 'Learning Languages', 'type' => 'Intellectual & Educational'],
            ['name' => 'Philosophy', 'type' => 'Intellectual & Educational'],
            ['name' => 'Debating', 'type' => 'Intellectual & Educational'],

            // Musical & Instrumental
            ['name' => 'Playing Violin', 'type' => 'Musical & Instrumental'],
            ['name' => 'Playing Saxophone', 'type' => 'Musical & Instrumental'],
            ['name' => 'Beatboxing', 'type' => 'Musical & Instrumental'],

            // Design & Aesthetics
            ['name' => 'Interior Design', 'type' => 'Design & Aesthetics'],
            ['name' => 'Fashion Design', 'type' => 'Design & Aesthetics'],
            ['name' => 'Graphic Design', 'type' => 'Design & Aesthetics'],

            // Software & Coding
            ['name' => 'Game Development', 'type' => 'Software & Coding'],
            ['name' => 'App Development', 'type' => 'Software & Coding'],
            ['name' => 'Website Development', 'type' => 'Software & Coding'],
            ['name' => 'Open Source Contribution', 'type' => 'Software & Coding'],
            ['name' => 'Blockchain Development', 'type' => 'Software & Coding'],
            ['name' => 'Cybersecurity Analysis', 'type' => 'Software & Coding'],
            ['name' => 'Algorithm Design', 'type' => 'Software & Coding'],
            ['name' => 'Data Science', 'type' => 'Software & Coding'],

            // Digital & Technology
            ['name' => 'UI/UX Design', 'type' => 'Digital & Technology'],
            ['name' => 'Digital Marketing', 'type' => 'Digital & Technology'],
            ['name' => 'SEO (Search Engine Optimization)', 'type' => 'Digital & Technology'],
            ['name' => 'Video Editing', 'type' => 'Digital & Technology'],
            ['name' => 'Podcasting', 'type' => 'Digital & Technology'],
            ['name' => 'Vlogging', 'type' => 'Digital & Technology'],

            // Social Media & Online Content
            ['name' => 'Influencer Marketing', 'type' => 'Social Media & Online Content'],
            ['name' => 'Content Creation', 'type' => 'Social Media & Online Content'],
            ['name' => 'Social Media Management', 'type' => 'Social Media & Online Content'],
            ['name' => 'Livestreaming', 'type' => 'Social Media & Online Content'],
            ['name' => 'Community Building', 'type' => 'Social Media & Online Content'],

            // Creative Writing & Content
            ['name' => 'Copywriting', 'type' => 'Creative Writing & Content'],
            ['name' => 'Technical Writing', 'type' => 'Creative Writing & Content'],
            ['name' => 'Scriptwriting', 'type' => 'Creative Writing & Content'],
            ['name' => 'Editing & Proofreading', 'type' => 'Creative Writing & Content'],
            ['name' => 'Fan Fiction Writing', 'type' => 'Creative Writing & Content'],

            // Photography & Visual Arts
            ['name' => 'Photo Manipulation', 'type' => 'Photography & Visual Arts'],
            ['name' => 'Drone Photography', 'type' => 'Photography & Visual Arts'],
            ['name' => 'Digital Illustration', 'type' => 'Photography & Visual Arts'],
            ['name' => 'Photojournalism', 'type' => 'Photography & Visual Arts'],
            ['name' => 'Cinematography', 'type' => 'Photography & Visual Arts'],

            // Business & Entrepreneurship
            ['name' => 'E-commerce Management', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Freelancing', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Stock Trading', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Affiliate Marketing', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Mentorship', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Market Research', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Finance', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Digital Marketing Strategies', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Marketing Analytics', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Consulting', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Ideas', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Finance', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Marketing', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Growth', 'type' => 'Business & Entrepreneurship'],
            ['name' => 'Startup Business Modeling', 'type' => 'Business & Entrepreneurship'],

            // Marketplace & E-commerce
            ['name' => 'Dropshipping', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Content Marketing', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Product Marketing', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Amazon FBA Selling', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Etsy Craft Selling', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Stock Photography Sales', 'type' => 'Marketplace & E-commerce'],
            ['name' => 'Print on Demand Business', 'type' => 'Marketplace & E-commerce'],

            // Learning & Development
            ['name' => 'Language Learning', 'type' => 'Learning & Development'],
            ['name' => 'Public Speaking', 'type' => 'Learning & Development'],
            ['name' => 'Researching', 'type' => 'Learning & Development'],
            ['name' => 'Self-Improvement', 'type' => 'Learning & Development'],
            ['name' => 'Personal Branding', 'type' => 'Learning & Development'],

            // Health & Wellness
            ['name' => 'Mindfulness & Meditation', 'type' => 'Health & Wellness'],
            ['name' => 'Holistic Health', 'type' => 'Health & Wellness'],
            ['name' => 'Mental Health Advocacy', 'type' => 'Health & Wellness'],
            ['name' => 'Biohacking', 'type' => 'Health & Wellness'],
            ['name' => 'Sound Healing', 'type' => 'Health & Wellness'],

            // Gaming & Esports
            ['name' => 'Competitive Gaming (Esports)', 'type' => 'Gaming & Esports'],
            ['name' => 'Speedrunning', 'type' => 'Gaming & Esports'],
            ['name' => 'Game Streaming', 'type' => 'Gaming & Esports'],
            ['name' => 'Virtual Reality Gaming', 'type' => 'Gaming & Esports'],
            ['name' => 'Game Storyboarding', 'type' => 'Gaming & Esports'],

            // DIY & Innovation
            ['name' => 'Arduino Projects', 'type' => 'DIY & Innovation'],
            ['name' => 'Raspberry Pi Projects', 'type' => 'DIY & Innovation'],
            ['name' => 'IoT (Internet of Things)', 'type' => 'DIY & Innovation'],
            ['name' => 'Home Automation', 'type' => 'DIY & Innovation'],
            ['name' => 'Renewable Energy Projects', 'type' => 'DIY & Innovation'],

            // Travel & Exploration
            ['name' => 'Travel Blogging', 'type' => 'Travel & Exploration'],
            ['name' => 'Cultural Anthropology', 'type' => 'Travel & Exploration'],
            ['name' => 'Backpacking', 'type' => 'Travel & Exploration'],
            ['name' => 'Adventure Vlogging', 'type' => 'Travel & Exploration'],
            ['name' => 'Voluntourism', 'type' => 'Travel & Exploration'],

            // Miscellaneous
            ['name' => 'Virtual Event Hosting', 'type' => 'Miscellaneous'],
            ['name' => 'Cosplay Design', 'type' => 'Miscellaneous'],
            ['name' => 'Metaverse Exploration', 'type' => 'Miscellaneous'],
            ['name' => 'Digital Art NFTs', 'type' => 'Miscellaneous'],
            ['name' => 'ASMR Content Creation', 'type' => 'Miscellaneous'],

            // Real Estate & Property
            ['name' => 'Real Estate Investing', 'type' => 'Real Estate & Property'],
            ['name' => 'Property Flipping', 'type' => 'Real Estate & Property'],
            ['name' => 'Vacation Rental Hosting (Airbnb)', 'type' => 'Real Estate & Property'],
            ['name' => 'Commercial Leasing', 'type' => 'Real Estate & Property'],
            ['name' => 'Real Estate Photography', 'type' => 'Real Estate & Property'],

            // Education & Learning
            ['name' => 'Online Course Creation', 'type' => 'Education & Learning'],
            ['name' => 'Tutoring & Mentorship', 'type' => 'Education & Learning'],
            ['name' => 'Educational Content Creation', 'type' => 'Education & Learning'],
            ['name' => 'Language Learning', 'type' => 'Education & Learning'],
            ['name' => 'Public Speaking & Presentations', 'type' => 'Education & Learning'],
        ];

        foreach ($hobbies as $hobby) {
            $hobby['type'] = Str::slug($hobby['type']);
            Hobby::updateOrCreate(['name' => $hobby['name']], $hobby);
        }
    }
}
