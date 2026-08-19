<?php
$blogs = App\Models\Blog::all();
$found = false;
foreach ($blogs as $blog) {
    if (strpos($blog->content, 'vs-compare-table') !== false) {
        $found = true;
        echo "Found in blog: " . $blog->title . "\n";
        
        $contentArray = json_decode($blog->content, true);
        if (isset($contentArray['blocks'])) {
            foreach ($contentArray['blocks'] as &$block) {
                if ($block['type'] === 'code' && strpos($block['data']['code'], 'vs-compare-table') !== false) {
                    echo "Converting code block to raw HTML block...\n";
                    $cssCode = $block['data']['code'];
                    
                    // Wrap the CSS in <style> if not already
                    if (strpos($cssCode, '<style>') === false) {
                        $cssCode = "<style>\n" . $cssCode . "\n</style>";
                    }
                    
                    $block['type'] = 'raw';
                    unset($block['data']['code']);
                    $block['data']['html'] = $cssCode;
                }
            }
            $blog->content = json_encode($contentArray, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $blog->save();
            echo "Successfully updated the blog post!\n";
        }
    }
}
if (!$found) echo "Not found anywhere.\n";
