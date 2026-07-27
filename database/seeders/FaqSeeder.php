<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'Why do I need interior design?', 'answer' => 'Interior design adds functionality, comfort, and aesthetic value to your space. A well-designed interior improves mood, productivity, and creates a positive impression on guests and clients.', 'sort_order' => 1],
            ['question' => 'How long does a typical project take?', 'answer' => 'Project timelines vary based on scope. A residential apartment may take 45-60 days, while larger commercial projects can take 3-6 months. We provide a detailed timeline during consultation.', 'sort_order' => 2],
            ['question' => 'Do you provide RAJUK approval support?', 'answer' => 'Yes, we offer complete RAJUK approval support including drawing preparation, documentation, and follow-up throughout the approval process.', 'sort_order' => 3],
            ['question' => 'What is included in your consultation?', 'answer' => 'Our initial consultation includes understanding your requirements, site assessment, budget discussion, and a preliminary design approach. No payment is required for the first meeting.', 'sort_order' => 4],
            ['question' => 'Do you work on both interior and exterior projects?', 'answer' => 'Yes, Idea Architect Limited provides both interior design and exterior/architectural design services for residential, commercial, and public spaces.', 'sort_order' => 5],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], array_merge($faq, ['status' => 1]));
        }
    }
}
