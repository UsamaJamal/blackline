<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blackline Marketing</title>
    <link rel="canonical" href="{{ url()->
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Blackline Marketing">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Black Line Marketing' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Blackline Marketing">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Black Line Marketing' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">current() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        :root {
            --bg: #28282B;
            --bg-soft: #2E2E31;
            --text: #FAF9F6;
            --muted: #DEDEDE;
            --muted-2: #B9B9BA;

            --gold: #E5CA83;
            --gold-deep: #BC9554;
            --gold-line: #4B4430;
            --gold-line-hover: #C9A961;

            --grad-gold: linear-gradient(110deg, rgba(175, 132, 69, 1) 0%, rgba(232, 201, 136, 1) 33%, rgba(229, 202, 131, 1) 66%, rgba(175, 132, 69, 1) 100%);
            --grad-gold-text: linear-gradient(100deg, #BC9554 0%, #E9CE8B 45%, #E5CA83 60%, #C09A5C 100%);

            --container: 1242px;
            --radius: 16px;
            --radius-lg: 22px;

            --ease: cubic-bezier(.22, .61, .36, 1);
        }
        
        body {
            background: var(--bg);
            color: var(--text);
            margin: 0;
            overflow-x: hidden;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>