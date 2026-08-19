<?php
$blog = App\Models\Blog::where('content', 'LIKE', '%vs-compare-table%')->first();
if ($blog) {
    echo "Found in blog: " . $blog->title . "\n";
    file_put_contents('scratch/blog_dump.txt', json_encode($blog->content, JSON_PRETTY_PRINT));
} else {
    echo "Not found in DB content.\n";
}
