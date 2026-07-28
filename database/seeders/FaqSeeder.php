<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services does Idea Architect Limited provide?',
                'answer' => 'We offer end-to-end architectural design, interior design, building construction, RAJUK approval support, and custom door & furniture solutions for residential, commercial, and public projects across Dhaka.',
                'sort_order' => 1,
            ],
            [
                'question' => 'How long does a typical interior project take?',
                'answer' => 'A standard 1,500–2,500 sft apartment interior usually takes 45–75 working days after design approval. Larger villas or office fit-outs may require 3–5 months depending on scope, material lead times, and site readiness.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you help with RAJUK / DNCC building approval?',
                'answer' => 'Yes. We prepare architectural and supporting drawings, compile required documents, submit the file, and follow up with reviewers until approval is obtained. We also advise on FAR, set-back, and height restrictions during early design stages.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Is the first consultation free?',
                'answer' => 'Yes — the initial consultation at our Mirpur office (or via video call) is free. We discuss your requirements, budget range, timeline, and share a high-level approach before any formal proposal.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Can you work with my existing contractor?',
                'answer' => 'Absolutely. We frequently collaborate with client-appointed contractors by providing detailed drawings, BOQ, material specifications, and periodic site supervision to ensure the design intent is executed correctly.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Which areas in Dhaka do you serve?',
                'answer' => 'We actively serve Gulshan, Banani, Dhanmondi, Uttara, Bashundhara, Mirpur, Mohammadpur, and surrounding areas. Projects outside Dhaka can be discussed on a case-by-case basis.',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                array_merge($faq, ['status' => 1])
            );
        }
    }
}
