<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$content = file_get_contents('temp_old_seeder.php');
preg_match('/\$services = (\[.+?\]);\s+foreach/s', $content, $matches);
eval('$servicesArray = ' . $matches[1] . ';');

$standardPricing = App\Models\Service::where('slug', 'photography-videography')->first()->pricing;
$standardPricingHeader = App\Models\Service::where('slug', 'photography-videography')->first()->pricing_header;

$slugsToAdd = ['social-media-management', 'restaurant-marketing'];

foreach ($servicesArray as $s) {
    if (in_array($s['slug'], $slugsToAdd)) {
        // Set standard pricing
        $s['pricing'] = $standardPricing;
        $s['pricing_header'] = $standardPricingHeader;
        
        // Ensure it doesn't already exist
        App\Models\Service::where('slug', $s['slug'])->delete();
        
        App\Models\Service::create($s);
        echo "Inserted " . $s['slug'] . "\n";
    }
}
