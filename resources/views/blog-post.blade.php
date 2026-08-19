<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->meta_title ?? $blog->title }} | BlackLine Marketing</title>
    <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="keywords" content="{{ $blog->meta_keywords ?? 'blog, marketing, branding' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog-post.css') }}">
</head>
<body>
    @include('components.header')
    
    <main class="blog-post-page">
        <div class="container">
            <div class="post-grid-container">
                <!-- Left Column: Main Post Content -->
                <div class="post-main-content">
                    <div class="post-cover">
                        <img src="{{ $blog->image ? asset($blog->image) : 'https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=1200&auto=format&fit=crop' }}" alt="{{ $blog->title }}">
                        <div class="post-cover-overlay">
                            <h1 style="color: #fff; font-size: 42px; font-weight: 700; max-width: 800px;">{{ $blog->title }}</h1>
                            <span class="post-meta" style="color: rgba(255,255,255,0.8); margin-top: 15px; display: inline-block;">{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="post-body">
                        @php
                            $contentBlocks = [];
                            $isHtml = false;
                            $contentVal = trim($blog->content);
                            
                            if(\Illuminate\Support\Str::startsWith($contentVal, '{')) {
                                $parsed = json_decode($contentVal, true);
                                if(isset($parsed['blocks'])) {
                                    $contentBlocks = $parsed['blocks'];
                                }
                            } else {
                                $isHtml = true;
                            }
                        @endphp

                        @if($isHtml)
                            {!! $blog->content !!}
                        @else
                            @foreach($contentBlocks as $block)
                                @if($block['type'] === 'paragraph')
                                    <p>{!! $block['data']['text'] !!}</p>
                                @elseif($block['type'] === 'header')
                                    <h{{ $block['data']['level'] }}>{!! $block['data']['text'] !!}</h{{ $block['data']['level'] }}>
                                @elseif($block['type'] === 'list')
                                    @if(isset($block['data']['style']) && $block['data']['style'] === 'ordered')
                                        <ol>
                                            @foreach($block['data']['items'] as $item)
                                                <li>{!! is_array($item) ? ($item['content'] ?? '') : $item !!}</li>
                                            @endforeach
                                        </ol>
                                    @else
                                        <ul>
                                            @foreach($block['data']['items'] as $item)
                                                <li>{!! is_array($item) ? ($item['content'] ?? '') : $item !!}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @elseif($block['type'] === 'image')
                                    <img src="{{ $block['data']['url'] }}" alt="{{ $block['data']['caption'] ?? '' }}" style="max-width: 100%; border-radius: 8px; margin: 20px 0;">
                                    @if(isset($block['data']['caption']) && $block['data']['caption'])
                                        <p style="text-align: center; color: #888; font-size: 14px;">{{ $block['data']['caption'] }}</p>
                                    @endif
                                @elseif($block['type'] === 'quote')
                                    <blockquote style="border-left: 4px solid var(--gold); padding-left: 20px; margin: 20px 0; font-style: italic;">
                                        {!! $block['data']['text'] !!}
                                        @if(isset($block['data']['caption']) && $block['data']['caption'])
                                            <br><cite style="font-size: 14px; color: #888;">- {!! $block['data']['caption'] !!}</cite>
                                        @endif
                                    </blockquote>
                                @elseif($block['type'] === 'delimiter')
                                    <hr style="border: 0; border-top: 1px solid #eee; margin: 40px 0;">
                                @elseif($block['type'] === 'raw')
                                    {!! $block['data']['html'] !!}
                                @elseif($block['type'] === 'code')
                                    <pre style="background: #111; color: #fff; padding: 20px; border-radius: 8px; overflow-x: auto;"><code>{{ $block['data']['code'] }}</code></pre>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    
                    <div class="post-share-bottom">
                        <span>Like what you see? Share with a friend.</span>
                        <div class="social-share-links">
                            <a href="#" class="social-share-btn" aria-label="Share on Facebook">
                                <svg viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                            </a>
                            <a href="#" class="social-share-btn" aria-label="Share on X">
                                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="social-share-btn" aria-label="Share on LinkedIn">
                                <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: Sidebar Widgets -->
                <div class="post-sidebar">
                    <!-- Author Card -->
                    @if($blog->author)
                    <div class="sidebar-card">
                        <div class="author-info">
                            <div class="author-image">
                                @if($blog->author->picture)
                                    <img src="{{ asset($blog->author->picture) }}" alt="{{ $blog->author->name }}">
                                @else
                                    <div style="width: 100%; height: 100%; background: #333; display: flex; align-items: center; justify-content: center; font-size: 24px; color: var(--gold); border-radius: 50%;">
                                        {{ strtoupper(substr($blog->author->name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="author-details">
                                <h3 class="author-name">{{ $blog->author->name }}</h3>
                                
                                @if($blog->author->linkedin_url)
                                <a href="{{ $blog->author->linkedin_url }}" target="_blank" class="linkedin-badge" aria-label="LinkedIn Profile" style="display: inline-flex; align-items: center; justify-content: center; width: 24px; height: 24px; background: #0077b5; border-radius: 4px; color: white; margin-right: 5px;">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                                @endif
                                
                                @if($blog->author->twitter_url)
                                <a href="{{ $blog->author->twitter_url }}" target="_blank" class="twitter-badge" aria-label="Twitter Profile" style="display: inline-flex; align-items: center; justify-content: center; width: 24px; height: 24px; background: #1da1f2; border-radius: 4px; color: white;">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                                @endif
                            </div>
                        </div>
                        @if($blog->author->description)
                            <p class="author-bio">{{ $blog->author->description }}</p>
                        @endif
                    </div>
                    @endif
                    
                    <!-- Share Community Card -->
                    <div class="sidebar-card">
                        <h3 class="sidebar-card-title">Share with your community!</h3>
                        <div class="social-share-links">
                            <a href="#" class="social-share-btn" aria-label="Share on Facebook">
                                <svg viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                            </a>
                            <a href="#" class="social-share-btn" aria-label="Share on X">
                                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="social-share-btn" aria-label="Share on LinkedIn">
                                <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Article Outline Card -->
                    <div class="sidebar-card" id="toc-card" style="display: none;">
                        <h3 class="sidebar-card-title">In this Article :</h3>
                        <ul class="outline-list" id="dynamic-toc">
                            <!-- Populated dynamically by JavaScript -->
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Related Articles -->
            @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <section class="related-articles-section">
                <h2 class="related-title">Related Articles</h2>
                <div class="blog-grid">
                    @foreach ($relatedBlogs as $relatedBlog)
                    <a href="{{ route('blog-post', ['slug' => $relatedBlog->slug]) }}" class="blog-card">
                        <div class="blog-card-image">
                            <img src="{{ $relatedBlog->image ? asset($relatedBlog->image) : 'https://images.unsplash.com/photo-1620641788421-7a1c342ea42e?q=80&w=800&auto=format&fit=crop' }}" alt="{{ $relatedBlog->title }}">
                        </div>
                        <div class="blog-card-content">
                            <h3 class="blog-card-title">{{ $relatedBlog->title }}</h3>
                            <p class="blog-card-excerpt">{{ Str::limit(strip_tags($relatedBlog->content), 100) }}</p>
                            <p class="blog-card-meta">{{ $relatedBlog->created_at->format('M d') }} &bull; {{ ceil(str_word_count(strip_tags($relatedBlog->content)) / 200) }} min read</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
            @endif
            
        </div>
    </main>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const postBody = document.querySelector('.post-body');
            const tocList = document.getElementById('dynamic-toc');
            const tocCard = document.getElementById('toc-card');
            
            if(postBody && tocList) {
                // Get all main headings inside the post body
                const headings = postBody.querySelectorAll('h1, h2, h3');
                
                if(headings.length > 0) {
                    tocCard.style.display = 'block'; // Show TOC card if headings exist
                    
                    headings.forEach((heading, index) => {
                        // Create an ID for the heading if it doesn't have one
                        if(!heading.id) {
                            let textId = heading.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
                            heading.id = textId || 'heading-' + index;
                        }
                        
                        const li = document.createElement('li');
                        li.className = 'outline-item';
                        if(index === 0) li.classList.add('active'); // Make first item active initially
                        
                        const a = document.createElement('a');
                        a.href = '#' + heading.id;
                        a.textContent = heading.textContent.trim();
                        
                        // Add some indentation for smaller headings
                        if(heading.tagName.toLowerCase() === 'h3') {
                            a.style.paddingLeft = '15px';
                            a.style.fontSize = '0.9em';
                        }
                        
                        li.appendChild(a);
                        tocList.appendChild(li);
                    });
                    
                    // Smooth scroll and active state update
                    window.addEventListener('scroll', () => {
                        let current = '';
                        headings.forEach(heading => {
                            // Adjust offset for fixed headers if any
                            const headingTop = heading.getBoundingClientRect().top + window.scrollY;
                            if (window.scrollY >= headingTop - 150) {
                                current = heading.getAttribute('id');
                            }
                        });

                        document.querySelectorAll('.outline-list li').forEach(li => {
                            li.classList.remove('active');
                            const link = li.querySelector('a');
                            if (current && link.getAttribute('href') === '#' + current) {
                                li.classList.add('active');
                            }
                        });
                    });
                }
            }
        });
    </script>
</body>
</html>
