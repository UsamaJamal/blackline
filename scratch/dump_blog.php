<?php
$b = App\Models\Blog::latest()->first();
file_put_contents('scratch/blog_dump.json', $b->content);
