<?php
$blogs = App\Models\Blog::latest()->take(3)->get();
foreach ($blogs as $blog) {
    echo "Title: " . $blog->title . "\n";
    echo "Content: " . substr($blog->content, 0, 500) . "...\n\n";
}
