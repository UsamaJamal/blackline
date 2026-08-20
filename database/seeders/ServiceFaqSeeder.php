<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Faq;

class ServiceFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all();
        
        foreach ($services as $service) {
            $title = $service->title;
            
            // Generate some generic but relevant FAQs based on the service name
            $faqs = [
                [
                    'question' => "What is included in your $title package?",
                    'answer' => "Our $title services are highly customized to fit your brand's unique needs. Typically, it involves strategy development, execution, performance tracking, and regular optimizations to ensure maximum ROI.",
                ],
                [
                    'question' => "How long does it take to see results from $title?",
                    'answer' => "While some preliminary results can be observed within the first month, $title usually takes 3 to 6 months to establish a strong foundation and deliver scalable, long-term growth.",
                ],
                [
                    'question' => "Do you provide customized strategies for $title?",
                    'answer' => "Yes, absolutely! We don't believe in one-size-fits-all. Every strategy we build for $title is tailored specifically to your industry, target audience, and business goals.",
                ],
                [
                    'question' => "How much does $title cost?",
                    'answer' => "The cost for $title varies depending on the scope of work, timeline, and specific deliverables. We recommend booking a discovery call so we can provide an accurate proposal based on your needs.",
                ],
                [
                    'question' => "Can I combine $title with other marketing services?",
                    'answer' => "Yes! We highly encourage an integrated approach. Combining $title with our other services often yields a much stronger overall marketing ecosystem and better results.",
                ],
            ];
            
            foreach ($faqs as $faq) {
                Faq::create([
                    'question' => $faq['question'],
                    'answer'   => $faq['answer'],
                    'category' => $title,
                    'pages'    => ["services/{$service->slug}"],
                ]);
            }
        }
    }
}
