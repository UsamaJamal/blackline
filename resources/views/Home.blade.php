<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Black Line Marketing | Leading Digital Marketing & Branding Agency' }}</title>
<meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Black Line Marketing builds identity systems, campaigns, and digital experiences for brands ready to lead their category, not blend into it.' }}">
<meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'digital marketing agency, branding, social media strategy, web development, SEO, Black Line Marketing' }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta name="robots" content="index, follow">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Black Line Marketing | Leading Digital Marketing & Branding Agency' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Black Line Marketing builds identity systems, campaigns, and digital experiences for brands ready to lead their category, not blend into it.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Black Line Marketing | Leading Digital Marketing & Branding Agency' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Black Line Marketing builds identity systems, campaigns, and digital experiences for brands ready to lead their category, not blend into it.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>
/* =========================================================
   Black Line Marketing — Home Page
   Design reference: Figma "Black Line Marketing" (node 1:281)
   ========================================================= */

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

*,
*::before,
*::after {
    box-sizing: border-box
}

html {
    scroll-behavior: smooth
}

body {
    margin: 0;
    background: var(--bg);
    color: var(--text);
    font-family: 'Neue Montreal', 'Helvetica Now', Canela, 'PP Editorial', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    font-size: 16px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
}

img {
    max-width: 100%;
    display: block
}

a {
    color: inherit;
    text-decoration: none
}

ul {
    list-style: none;
    margin: 0;
    padding: 0
}

button {
    font-family: inherit;
    border: 0;
    background: none;
    cursor: pointer;
    color: inherit
}

.container {
    width: 100%;
    max-width: var(--container);
    margin-inline: auto;
    padding-inline: 24px;
}

/* ---------- Typography helpers ---------- */
.h2 {
    font-size: clamp(28px, 3.1vw, 44px);
    line-height: 1.24;
    font-weight: 800;
    letter-spacing: -.01em;
    margin: 0 0 14px;
}

.center {
    text-align: center
}

.gold {
    background: var(--grad-gold-text);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.section-title {
    margin-bottom: 6px
}

.section-sub {
    margin: 0 0 44px;
    color: var(--muted);
    font-size: 15.5px;
    font-weight: 300;
    text-align: justify;
}

.lead {
    color: var(--text);
    font-weight: 300;
    font-size: 15.5px;
    line-height: 1.85;
    margin: 0 0 22px;
}

/* ---------- Buttons ---------- */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-weight: 700;
    font-size: 15px;
    border-radius: 8px;
    padding: 14px 26px;
    transition: transform .25s var(--ease), box-shadow .25s var(--ease), background .25s var(--ease), color .25s var(--ease);
    white-space: nowrap;
}

.btn svg {
    width: 18px;
    height: 18px;
    flex: none;
    transition: transform .25s var(--ease)
}

.btn-gold {
    background: var(--grad-gold);
    background-size: 180% 100%;
    color: #24201A;
    box-shadow: 0 6px 18px rgba(0, 0, 0, .28);
}

.btn-gold:hover {
    background-position: 100% 0;
    transform: translateY(-2px);
    box-shadow: 0 12px 26px rgba(196, 155, 84, .32);
}

.btn-gold:hover svg {
    transform: translateX(4px)
}

.btn-ghost {
    border: 1.5px solid rgba(250, 249, 246, .85);
    color: #fff;
    background: rgba(255, 255, 255, .04);
    backdrop-filter: blur(2px);
}

.btn-ghost:hover {
    background: #fff;
    color: #24201A;
    transform: translateY(-2px);
}

.btn-lg {
    padding: 16px 30px;
    font-size: 16px
}

.btn-sm {
    padding: 11px 20px;
    font-size: 14px
}

/* =========================================================
   HEADER
   ========================================================= */
.site-header {
  
    top: 0;
    z-index: 60;
    background: var(--bg);
    border-bottom: 1px solid rgba(255, 255, 255, .05);
}

.header-inner {
    height: 80px;
    display: flex;
    align-items: center;
    gap: 28px;
}

.logo img {
    width: 217px;
    height: 54px;
}

.nav {
    margin-inline: auto
}

.nav-list {
    display: flex;
    align-items: center;
    gap: 40px
}

.nav-list>li {
    position: relative
}

.nav-list a {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 15.5px;
    font-weight: 600;
    padding: 8px 0;
    position: relative;
    transition: color .22s var(--ease);
}

.nav-list>li>a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    width: 0;
    background: var(--grad-gold);
    transition: width .28s var(--ease);
}

.nav-list>li>a:hover {
    color: var(--gold)
}

.nav-list>li>a:hover::after {
    width: 100%
}

.chev {
    width: 15px;
    height: 15px;
    transition: transform .25s var(--ease)
}

.has-drop:hover .chev {
    transform: rotate(180deg)
}

.drop {
    position: absolute;
    top: calc(100% + 14px);
    left: -18px;
    min-width: 236px;
    background: #1F1F22;
    border: 1px solid var(--gold-line);
    border-radius: 14px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: .28s var(--ease);
    box-shadow: 0 22px 44px rgba(0, 0, 0, .45);
}

.has-drop:hover .drop {
    opacity: 1;
    visibility: visible;
    transform: translateY(0)
}

.drop a {
    font-size: 14.5px;
    font-weight: 500;
    padding: 9px 14px;
    border-radius: 9px;
    color: var(--muted);
}

.drop a:hover {
    background: rgba(229, 202, 131, .1);
    color: var(--gold)
}

.burger {
    display: none;
    width: 30px;
    height: 22px;
    flex-direction: column;
    justify-content: space-between
}

.burger span {
    display: block;
    height: 2px;
    background: var(--gold);
    border-radius: 2px;
    transition: .3s var(--ease)
}

.burger.is-open span:nth-child(1) {
    transform: translateY(10px) rotate(45deg)
}

.burger.is-open span:nth-child(2) {
    opacity: 0
}

.burger.is-open span:nth-child(3) {
    transform: translateY(-10px) rotate(-45deg)
}

/* =========================================================
   HERO
   ========================================================= */
.hero {
    position: relative;
    min-height: 500px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(60% 70% at 50% 45%, rgba(10, 12, 18, .30) 0%, rgba(10, 12, 18, .55) 100%),
        linear-gradient(180deg, rgba(20, 22, 28, .35) 0%, rgba(20, 22, 28, .18) 45%, rgba(40, 40, 43, .55) 100%);
}

.hero-inner {
    position: relative;
    text-align: center;
    padding-block: 40px
}

.hero-title {
    font-size: clamp(38px, 5.6vw, 80px);
    line-height: 1.08;
    font-weight: 800;
    letter-spacing: -.02em;
    margin: 0 0 22px;
    text-shadow: 0 6px 30px rgba(0, 0, 0, .35);
}

.hero-sub {
    margin: 0 auto 34px;
    max-width: 640px;
    font-size: 17px;
    font-weight: 300;
    color: #F1F0EE;
    line-height: 1.65;
}

.hero-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap
}

/* =========================================================
   ABOUT
   ========================================================= */
.about {
    padding-block: 25px
}

.about-grid {
    display: grid;
    grid-template-columns: 529px 1fr;
    gap: 56px;
    align-items: center;
}

.about-media img {
    width: 100%;
    border-radius: var(--radius-lg);
    aspect-ratio: 529/489;
    object-fit: cover;
}

.about-copy .h2 {
    max-width: 660px;
    margin-bottom: 22px
}

.about-copy .lead {
    text-align: justify;
    max-width: 660px
}

.pull-quote {
    margin: 26px 0 0;
    position: relative;
    padding-left: 22px;
    font-size: 18px;
    font-weight: 400;
    line-height: 1.55;
    color: #fff;
}

.pull-quote .q {
    position: absolute;
    font-size: 30px;
    line-height: 1;
    color: var(--gold);
    font-weight: 700;
}

.q-open {
    left: 0;
    top: -2px
}

.q-close {
    position: static;
    margin-left: 6px
}

/* =========================================================
   SERVICES
   ========================================================= */
.services {
    padding-block: 10px;
}

@media (min-width: 992px) {
    .services {
        z-index: 10;
    }
}

.work-pin-wrapper, .stats, .testi, .process, .cta, .newsletter, .site-footer {
    position: relative;
    z-index: 20;
    background: var(--bg);
}

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 26px;
}

.card {
    position: relative;
    z-index: 1;
    border: 1px solid var(--gold-line);
    border-radius: var(--radius);
    padding: 28px 22px 26px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(180deg, rgba(255, 255, 255, .012), rgba(255, 255, 255, 0));
    transition: transform .35s var(--ease), border-color .35s var(--ease), box-shadow .35s var(--ease);
}

/* Hover bridge to prevent flickering when translating up */
.card::after {
    content: "";
    position: absolute;
    inset: -15px -15px -35px -15px;
    z-index: -2;
}

.card::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: var(--gold);
    clip-path: inset(0 100% 0 0);
    transition: clip-path .45s var(--ease);
    z-index: -1;
}

@media (min-width: 992px) {
    .card:hover::before {
        clip-path: inset(0 0 0 0);
    }

    .card:hover {
        transform: translateY(-8px);
        border-color: var(--gold-line-hover);
        box-shadow: 0 20px 40px rgba(0, 0, 0, .35);
        color: #111;
    }
}

.card-icon {
    width: 66px;
    height: 66px;
    border: 1px solid var(--gold-line);
    border-radius: 14px;
    display: grid;
    place-items: center;
    color: var(--gold);
    margin-bottom: 26px;
    transition: .35s var(--ease);
}

.card-icon svg,
.card-icon img {
    width: 28px;
    height: 28px
}

@media (min-width: 992px) {
    .card:hover .card-icon {
        border-color: #111;
        background: var(--bg);
        color: var(--gold);
        transform: translateY(-2px);
    }
}

.card h3 {
    margin: 0 0 14px;
    font-size: 20px;
    font-weight: 500;
    line-height: 1.3;
}

.card p {
    margin: 0 0 30px;
    font-size: 14.5px;
    font-weight: 500;
    color: var(--muted);
    line-height: 1.8;
}

@media (min-width: 992px) {
    .card:hover h3,
    .card:hover p {
        color: #111;
    }
}

.pill-arrow {
    margin-top: auto;
    height: 74px;
    border: 1px solid var(--gold-line-hover);
    border-radius: 999px;
    display: flex;
    align-items: center;
    gap: 0;
    padding-inline: 22px;
    color: var(--gold-line-hover);
    transition: 1.4s var(--ease);
}

.pill-arrow .circle {
    width: 42px;
    height: 42px;
    border: 1px solid currentColor;
    border-radius: 50%;
    display: grid;
    place-items: center;
    flex: none;
    transition: 1.4s var(--ease);
}

.pill-arrow .circle svg {
    width: 17px;
    height: 17px
}

.pill-arrow .line {
    height: 1px;
    flex: 1;
    background: currentColor;
    margin-left: 14px;
    transform-origin: left;
    transition: 1.4s var(--ease);
}

@media (min-width: 992px) {
    .pill-arrow:hover {
        background: rgba(229, 202, 131, .08);
        color: var(--gold);
        border-color: #000;
    }

    .pill-arrow:hover .circle {
        background: var(--grad-gold);
        border-color: transparent;
        color: #24201A;
        transform: translateX(6px);
    }

    .pill-arrow:hover .line {
        transform: scaleX(.88)
    }

    /* Card Hover -> Pill Arrow changes */
    .card:hover .pill-arrow {
        border-color: #000;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80') center/cover;
        color: #fff;
        padding-inline: 30px;
        justify-content: space-between;
    }
}

.pill-arrow::before {
    content: 'Learn More';
    font-size: 22px;
    font-weight: 600;
    color: #fff;
    opacity: 0;
    width: 0;
    overflow: hidden;
    white-space: nowrap;
    transition: opacity 1.4s var(--ease), width 1.4s var(--ease), margin 1.4s var(--ease);
}

@media (min-width: 992px) {
    .card:hover .pill-arrow::before {
        opacity: 1;
        width: auto;
        margin-right: auto;
    }

    .card:hover .pill-arrow .line {
        opacity: 0;
        flex: 0;
        margin: 0;
    }

    .card:hover .pill-arrow .circle {
        border-color: #fff;
        color: #fff; /* Ensure arrow is white */
    }
}

/* =========================================================
   WORK / PORTFOLIO
   ========================================================= */
.work-pin-wrapper {
    position: relative;
    width: 100%;
    z-index: 20;
    background: var(--bg);
}

.work {
    padding-top: clamp(40px, 8vh, 100px);
    padding-bottom: 40px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    overflow: hidden;
    z-index: 50;
}

@media (min-width: 821px) and (max-height: 800px) {
    .work {
        padding-top: 7px !important;
    }
    .work-strip {
        height: calc(100vh - 160px) !important;
    }
    .work-body {
        padding: 0 0 25px 50px !important;
    }
    .work-body h3 {
        font-size: 28px !important;
    }
}

.slide-up-anim {
    opacity: 0;
    transform: translateY(60px);
    transition: opacity 0.8s cubic-bezier(.22, .61, .36, 1), transform 0.8s cubic-bezier(.22, .61, .36, 1);
}

.slide-up-anim.is-visible {
    opacity: 1;
    transform: translateY(0);
}

.work-strip {
    position: relative;
    display: flex;
    gap: 16px;
    height: clamp(450px, calc(100vh - 160px), 800px);
}

.work-panel {
    position: relative;
    border-radius: var(--radius);
    overflow: hidden;
    flex: 0 0 92px;
    transition: flex-basis .6s var(--ease);
    background: #1c1c1f;
}

.work-panel.is-open {
    flex: 1 1 auto
}

.work-panel>img,
.work-panel>video {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.work-panel::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(12, 14, 18, .78) 0%, rgba(12, 14, 18, .42) 45%, rgba(12, 14, 18, .2) 100%);
    opacity: 0;
    transition: opacity .5s var(--ease);
}

.work-panel.is-open::after {
    opacity: 1
}

.work-vtitle {
    position: absolute;
    left: 50%;
    top: 150px;
    transform: translateX(-50%) rotate(90deg);
    transform-origin: center;
    white-space: nowrap;
    font-weight: 700;
    font-size: 17px;
    letter-spacing: .01em;
    z-index: 3;
    text-shadow: 0 2px 12px rgba(0, 0, 0, .6);
    transition: opacity .35s var(--ease);
}

.work-panel.is-open .work-vtitle {
    opacity: 0;
    pointer-events: none
}

.play {
    position: absolute;
    left: 50%;
    top: 38%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #F5D45C;
    color: #28282B;
    display: grid;
    place-items: center;
    z-index: 4;
    opacity: 0;
    transition: .4s var(--ease);
    box-shadow: 0 10px 30px rgba(0, 0, 0, .35);
}

.play svg {
    width: 40px;
    height: 40px;
    margin-left: 4px;
}

.work-panel:not(.is-open) .play {
    pointer-events: none
}

.work-panel.is-open .play {
    opacity: 1;
    left: 50%;
}

.play:hover {
    transform: translate(-50%, -50%) scale(1.08);
    background: #FBE49E
}

.work-body {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    padding: 0 0 46px 84px;
    max-width: 100%;
    opacity: 0;
    transform: translateY(16px);
    transition: opacity .45s var(--ease) .15s, transform .45s var(--ease) .15s;
    pointer-events: none;
}

.work-body h3,
.work-body .work-metric,
.work-body .work-desc {
    max-width: 480px;
}

.work-panel.is-open .work-body {
    opacity: 1;
    transform: none;
    pointer-events: auto
}

.work-panel.is-playing-video .work-body,
.work-panel.is-playing-video .play,
.work-panel.is-playing-video::after {
    opacity: 0 !important;
    pointer-events: none !important;
}

.work-panel.is-playing-video {
    flex: 1 1 100% !important;
}

.work-nav-arrows {
    position: absolute;
    bottom: 28px;
    right: 28px;
    display: flex;
    gap: 10px;
    z-index: 10;
    opacity: 0;
    pointer-events: none;
    transition: opacity .45s var(--ease) .15s;
}

.work-panel.is-open .work-nav-arrows {
    opacity: 1;
    pointer-events: auto;
}

.work-panel.is-playing-video .work-nav-arrows {
    opacity: 0 !important;
    pointer-events: none !important;
}

.work-action-row {
    display: flex;
    align-items: center;
    gap: 16px;
}

.mobile-nav-arrows {
    display: none;
}


.work-arrow {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.85);
    background: transparent;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.work-arrow:hover {
    border-color: #F5D45C;
    color: #F5D45C;
    transform: scale(1.05);
}

.work-arrow svg {
    width: 17px;
    height: 17px;
}

.work-body h3 {
    margin: 0 0 8px;
    font-size: 38px;
    font-weight: 800;
    letter-spacing: -.01em;
}

.work-metric {
    margin: 0 0 14px;
    font-size: 17px;
    font-weight: 700;
    color: var(--gold);
}

.work-desc {
    margin: 0 0 22px;
    font-size: 15px;
    font-weight: 300;
    line-height: 1.6;
    color: #EDECEA;
}

.work-plus {
    position: absolute;
    left: 50%;
    bottom: 28px;
    transform: translateX(-50%);
    width: 38px;
    height: 38px;
    border: 1px solid rgba(255, 255, 255, .85);
    border-radius: 50%;
    display: grid;
    place-items: center;
    color: #fff;
    z-index: 4;
    transition: .3s var(--ease);
}

.work-plus svg {
    width: 17px;
    height: 17px;
}

.work-plus:hover {
    background: var(--grad-gold);
    border-color: transparent;
    color: #24201A
}

.work-panel.is-open .work-plus {
    opacity: 0;
    pointer-events: none
}

.work-nav {
    position: absolute;
    bottom: 36px;
    right: calc(3 * (92px + 16px) + 32px);
    display: flex;
    gap: 14px;
    z-index: 6;
}

.round-btn {
    width: 44px;
    height: 44px;
    border: 1px solid rgba(255, 255, 255, .8);
    border-radius: 50%;
    display: grid;
    place-items: center;
    color: #fff;
    transition: .3s var(--ease);
}

.round-btn svg {
    width: 18px;
    height: 18px
}

.round-btn:hover {
    background: var(--grad-gold);
    border-color: transparent;
    color: #24201A
}

/* =========================================================
   STATS
   ========================================================= */
.stats {
    /* padding-block: 50px */
}

.stats-grid {
    display: grid;
    grid-template-columns: minmax(0, 470px) 1fr;
    gap: 70px;
    align-items: center;
}

.stats-emoji {
    width: 56px;
    height: auto;
    margin-bottom: 6px
}

.stats-copy .h2 {
    font-size: clamp(28px, 2.9vw, 40px);
    line-height: 1.28;
    margin-bottom: 16px
}

.stats-copy .lead {
    font-size: 14.5px;
    line-height: 1.7;
    margin: 0
}

.stats-nums {
    display: grid;
    grid-template-columns: 1fr 1fr;
    text-align: center;
}

.stat {
    padding: 44px 20px
}

.stat:nth-child(1) {
    border-right: 1px solid rgba(255, 255, 255, .16);
    border-bottom: 1px solid rgba(255, 255, 255, .16)
}

.stat:nth-child(2) {
    border-bottom: 1px solid rgba(255, 255, 255, .16)
}

.stat:nth-child(3) {
    border-right: 1px solid rgba(255, 255, 255, .16)
}

.stat-num {
    display: block;
    font-size: clamp(32px, 3.6vw, 46px);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 8px;
}

.stat-label {
    font-size: 15px;
    font-weight: 400;
    color: var(--text)
}

/* =========================================================
   TESTIMONIALS
   ========================================================= */
.testi {
    padding-block: 40px
}

.testi .h2 {
    margin-bottom: 44px
}

.testi-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
}

.testi-arrow {
    width: 40px;
    height: 40px;
    display: grid;
    place-items: center;
    color: var(--gold);
    flex: none;
    transition: .25s var(--ease);
}

.testi-arrow svg {
    width: 22px;
    height: 22px
}

.testi-arrow:hover {
    transform: scale(1.2)
}

.testi-viewport {
    overflow: hidden;
    flex: 1;
    border-radius: var(--radius-lg)
}

.testi-track {
    display: flex;
    transition: transform .6s var(--ease);
}

.testi-card {
    flex: 0 0 100%;
    margin: 0;
    display: grid;
    grid-template-columns: 465px 1fr;
    background: #FAF9F6;
    border-radius: var(--radius-lg);
    overflow: hidden;
    min-height: 380px;
}

.testi-media {
    position: relative;
    background: #D9D6D0
}

.testi-media img,
.testi-media video {
    width: 100%;
    height: 100%;
    object-fit: cover
}

.testi-media .play {
    opacity: 1;
    width: 88px;
    height: 88px;
    top: 50%;
}

.testi-media.is-playing-video .play {
    opacity: 0 !important;
    pointer-events: none !important;
}

.testi-media.is-playing-video {
    cursor: pointer;
}

.testi-body {
    margin: 0;
    padding: 40px 62px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #1B1B1D;
}

.testi-logo {
    height: 36px;
    width: auto;
    align-self: flex-start;
    margin-bottom: 26px
}

.testi-body p {
    margin: 0 0 30px;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.9;
    color: #26262A;
    text-align: justify;
}

.testi-body figcaption {
    display: flex;
    flex-direction: column;
    gap: 4px
}

.t-name {
    font-size: 18px;
    font-weight: 700;
    color: var(--gold-deep)
}

.t-role {
    font-size: 15px;
    color: #3A3A3E
}

.dots {
    display: flex;
    gap: 15px;
    justify-content: center;
    align-items: center;
    margin-top: 26px
}

.dot {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    border: 2px solid var(--gold);
    transition: .25s var(--ease);
    cursor: pointer;
    padding: 0;
    margin: 0;
    flex-shrink: 0;
}

/* .dot.is-active,
.dot:hover {
    background: var(--gold);
    transform: scale(1.5);
} */

/* =========================================================
   PROCESS
   ========================================================= */
.process {
    /* padding-block: 15px */
}

.ring-wrap {
    position: relative;
    width: 100%;
    margin: 34px auto 0;
    aspect-ratio: 1242/460;
}

.ring {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    overflow: visible;
}

.arc {
    transition: filter 0.3s var(--ease);
}

.arc:hover,
.arc.is-hovered {
    filter: drop-shadow(0 0 12px rgba(244, 210, 102, 0.6));
}

.tri {
    fill: #000000;
}

.step-txt {
    font-family: 'Neue Montreal', 'Helvetica Now', Canela, 'PP Editorial', sans-serif;
    font-size: 19px;
    font-weight: 800;
    fill: #000000;
    letter-spacing: .01em;
    dominant-baseline: central;
    alignment-baseline: central;
    pointer-events: none;
}

.conn {
    fill: none;
    stroke: #FAF9F6;
    stroke-width: 1.6
}

.conn-1 { d: path("M 312 206 L 364 206 C 374 206, 382 200, 385.5 192 A 240 240 0 0 1 467 46"); }
.conn-2 { d: path("M 930 206 L 878 206 C 868 206, 860 200, 856.5 192 A 240 240 0 0 0 775 46"); }
.conn-3 { d: path("M 312 254 L 364 254 C 374 254, 382 260, 385.5 268 A 240 240 0 0 0 467 414"); }
.conn-4 { d: path("M 930 254 L 878 254 C 868 254, 860 260, 856.5 268 A 240 240 0 0 1 775 414"); }

.node {
    fill: #FAF9F6
}

.ring-core {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 19.76%;
    aspect-ratio: 1;
    border-radius: 50%;
    background: #FAF9F6;
    color: #28282B;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-align: center;
    padding: 10px;
}

.ring-core strong {
    font-size: clamp(16px, 1.85vw, 24px);
    font-weight: 800;
    line-height: 1.2;
}

.ring-core span {
    font-size: clamp(12px, 1.35vw, 18px);
    font-weight: 600;
    line-height: 1.2;
}

.ring-core .gold {
    background: linear-gradient(90deg, #BC9554, #D9A94E);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.ring-label {
    position: absolute;
    font-size: clamp(15px, 1.75vw, 23px);
    font-weight: 800;
    white-space: nowrap;
    transform: translateY(-50%);
}

/* Base text alignments */
.lbl-strategy,
.lbl-results {
    right: 76%;
    text-align: right;
}

.lbl-story,
.lbl-exec {
    left: 76%;
    text-align: left;
}

/* Hover Outwards (translate) */
.lbl-strategy:hover,
.lbl-strategy.is-hovered,
.lbl-results:hover,
.lbl-results.is-hovered {
    transform: translate(-12px, -50%);
}

.lbl-story:hover,
.lbl-story.is-hovered,
.lbl-exec:hover,
.lbl-exec.is-hovered {
    transform: translate(12px, -50%);
}

.ring-label p {
    width: max-content;
    max-width: 280px;
    text-align: center;
    font-size: 17px;
    line-height: 1.4;
}

/* Positioning the descriptions absolutely */
.lbl-strategy p,
.lbl-story p {
    bottom: 100%;
    margin-bottom: 6px;
}

.lbl-results p,
.lbl-exec p {
    top: 100%;
    margin-top: 6px;
}

.lbl-strategy p,
.lbl-results p {
    right: -60px;
}

.lbl-story p,
.lbl-exec p {
    left: -60px;
}

/* Description Hover Animations */
.lbl-strategy p,
.lbl-story p {
    transform: translateY(10px);
}

.lbl-results p,
.lbl-exec p {
    transform: translateY(-10px);
}

.ring-label:hover p,
.ring-label.is-hovered p {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.lbl-strategy,
.lbl-story {
    top: 44.8%;
}

.lbl-results,
.lbl-exec {
    top: 55.2%;
}

/* compact step list (small screens) */
.process-steps {
    display: none;
    margin: 26px 0 0;
    padding: 0;
    gap: 14px
}

.process-steps li {
    list-style: none;
    border: 1px solid var(--gold-line);
    border-radius: 14px;
    padding: 18px 20px;
}

.ps-num {
    display: inline-block;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 6px;
}

.process-steps h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 700
}

.ps-desc {
    margin: 8px 0 0;
    font-size: 14px;
    line-height: 1.5;
    color: rgba(255, 255, 255, 0.75);
}

.ps-core {
    background: #FAF9F6;
    color: #28282B;
    border-color: transparent;
    text-align: center;
}

.ps-core strong {
    display: block;
    font-size: 19px;
    font-weight: 800
}

.ps-core span {
    font-size: 14px;
    font-weight: 600
}

.ps-core .gold {
    background: linear-gradient(90deg, #BC9554, #D9A94E);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

/* =========================================================
   CTA
   ========================================================= */
.cta {
    padding-block: 40px
}

.cta-box {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    min-height: 446px;
    display: grid;
    place-items: center;
}

.cta-bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1.1s var(--ease);
}

.cta-box:hover .cta-bg {
    transform: scale(1.05)
}

.cta-box::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(10, 14, 24, .30), rgba(10, 14, 24, .52));
}

.cta-inner {
    position: relative;
    z-index: 2;
    text-align: center;
    padding: 40px 24px
}

.cta-inner h2 {
    margin: 0 0 14px;
    font-size: clamp(28px, 3.6vw, 44px);
    font-weight: 800;
    letter-spacing: -.01em;
}

.cta-inner p {
    margin: 0 auto 30px;
    font-size: 16.5px;
    font-weight: 300;
    color: #F2F1EF;
    max-width: 560px;
}

/* =========================================================
   NEWSLETTER
   ========================================================= */
.newsletter {
    padding-block: 32px;
    border-bottom: 1px solid rgba(255, 255, 255, .12)
}

.news-grid {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: nowrap;
    width: 100%;
}

.newsletter h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 800;
    white-space: nowrap;
    flex-shrink: 1;
}

.news-form {
    display: flex;
    gap: 12px;
    align-items: stretch;
    justify-content: flex-end;
    flex: 1 1 auto;
}

.news-form input {
    width: 100%;
    max-width: 449px;
    height: 60px;
    min-width: 0;
    background: transparent;
    border: 1px solid rgba(255, 255, 255, .55);
    border-radius: 8px;
    padding: 0 22px;
    color: #fff;
    font-size: 16px;
    font-family: inherit;
    outline: none;
    transition: border-color .25s var(--ease);
}

.news-form input::placeholder {
    color: #B6B6B7
}

.news-form input:focus {
    border-color: var(--gold)
}

.news-form .btn {
    border-radius: 8px;
    height: 62px;
    padding-inline: 32px;
    font-size: 16px;
}

/* =========================================================
   FOOTER
   ========================================================= */
.site-footer {
    padding-top: 0px
}

.foot-grid {
    display: grid;
    grid-template-columns: 1.55fr 1fr 1.15fr 1.1fr;
    gap: 44px;
    padding-bottom: 52px;
}

.foot-logo {
    width: 217px;
    height: 54px;
    margin-bottom: 20px
}

.foot-brand p {
    margin: 0 0 26px;
    max-width: 360px;
    font-size: 15px;
    font-weight: 300;
    line-height: 1.75;
    color: var(--text);
}

.socials {
    display: flex;
    gap: 12px
}

.socials a {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--grad-gold);
    color: #28282B;
    display: grid;
    place-items: center;
    transition: .28s var(--ease);
}

.socials svg {
    width: 17px;
    height: 17px
}

.socials a:hover {
    transform: translateY(-3px)
}

.foot-col h4 {
    margin: 0 0 24px;
    font-size: 18px;
    font-weight: 800;
    letter-spacing: .03em;
    background: var(--grad-gold-text);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.foot-col li {
    margin-bottom: 14px
}

.foot-col a {
    font-size: 15px;
    font-weight: 400;
    color: var(--text);
    transition: color .22s var(--ease), padding-left .22s var(--ease);
}

.foot-col a:hover {
    color: var(--gold);
    padding-left: 5px
}

.contact-list li {
    display: flex;
    gap: 14px;
    align-items: flex-start;
    margin-bottom: 18px;
    font-size: 15px
}

.ci {
    width: 22px;
    height: 22px;
    flex: none;
    color: var(--gold);
    display: grid;
    place-items: center;
    margin-top: 1px;
}

.ci svg {
    width: 19px;
    height: 19px
}

.foot-bottom {
    border-top: 1px solid rgba(255, 255, 255, .12);
    padding-block: 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
}

.foot-bottom p {
    margin: 0;
    font-size: 15px;
    color: var(--text)
}

.pay {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap
}

.pay img {
    height: 30px;
    width: auto;
    border-radius: 4px
}

/* =========================================================
   RESPONSIVE
   ========================================================= */
@media (max-width:1180px) {
    .cards {
        grid-template-columns: repeat(2, 1fr)
    }

    .foot-grid {
        grid-template-columns: 1fr 1fr;
        gap: 40px
    }

    .work-body {
        padding-left: 52px
    }

    .work-body h3 {
        font-size: 32px
    }
}

.no-scroll {
    overflow: hidden;
}

@media (max-width:980px) {
    .burger {
        display: flex
    }

    .nav {
        position: fixed;
        inset: 80px 0 auto 0; /* Auto bottom so it only grows as tall as its content */
        max-height: calc(100vh - 80px); /* Prevent it from exceeding screen height */
        background: #1F1F22;
        border-bottom: 1px solid var(--gold-line);
        padding: 40px 24px 40px; /* Reduced bottom padding */
        margin: 0;
        transform: translateY(-120%);
        transition: transform .4s var(--ease), visibility .4s var(--ease);
        z-index: 55;
        overflow-y: auto; /* Allow scrolling inside the menu if content exceeds screen */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        visibility: hidden;
        pointer-events: none;
    }

    .nav.is-open {
        transform: none;
        visibility: visible;
        pointer-events: auto;
    }

    .nav-list {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px
    }

    .nav-list>li {
        width: 100%
    }

    .nav-list a {
        width: 100%;
        padding: 12px 0
    }

    .drop {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        box-shadow: none;
        background: transparent;
        border: 0;
        padding: 0 0 8px 12px;
        display: none;
    }

    .has-drop:hover .drop,
    .has-drop.is-open .drop {
        display: flex
    }

    .header-cta {
        margin-left: auto;
        width: 176px;
        height: 54px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        font-size: 14px
    }

    .about-grid {
        grid-template-columns: 1fr;
        gap: 34px
    }

    .stats-grid {
        grid-template-columns: 1fr;
        gap: 40px
    }

    .testi-card {
        grid-template-columns: 1fr
    }

    .testi-media {
        height: 300px
    }

    .testi-body {
        padding: 38px 30px
    }

    .ring-label {
        font-size: 15px
    }
}

@media (max-width:820px) {
    .work-strip {
        display: block;
        height: 550px;
        padding-bottom: 0;
    }

    .work-nav {
        right: auto;
        left: 50%;
        transform: translateX(-50%);
        bottom: 8px
    }

    .work-panel.is-open .play {
        top: 110px; /* Vertically center on the video which sits at the top */
        width: 64px;
        height: 64px
    }

    .ring-wrap {
        display: none
    }

    .process-steps {
        display: grid;
        grid-template-columns: 1fr 1fr
    }

    .ps-core {
        grid-column: 1/-1
    }

    .work-panel {
        position: absolute;
        inset: 0;
        height: 100%;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.6s var(--ease);
    }

    .work-panel.is-open {
        opacity: 1;
        pointer-events: auto;
        height: 100%;
    }

    .work-action-row {
        justify-content: space-between;
        width: 100%;
    }

    .work-panel>img,
    .work-panel>video {
        object-fit: contain;
        object-position: center top;
    }

    .work-vtitle {
        display: none;
    }

    .work-body {
        padding: 0 26px 30px;
        max-width: none;
        bottom: 30px;
    }

    .news-grid {
        flex-direction: column;
        align-items: stretch
    }

    .news-form {
        flex: 1 1 auto
    }

    .work-panel.is-playing-video .work-body,
    .work-panel.is-playing-video .work-nav-arrows {
        opacity: 1 !important;
        pointer-events: auto !important;
    }

    .desktop-nav-arrows {
        display: none !important;
    }

    .mobile-nav-arrows {
        display: flex !important;
        flex-direction: row !important;
        gap: 8px !important;
        z-index: 20;
    }

    .work-arrow {
        width: 38px !important;
        height: 38px !important;
        border-color: rgba(245, 212, 92, 0.7) !important;
        color: #F5D45C !important;
        position: relative !important;
        left: auto !important;
        right: auto !important;
        transform: none !important;
    }
}

@media (max-width:640px) {
    .container {
        padding-inline: 18px
    }

    .header-inner {
        gap: 12px;
        justify-content: space-between; /* Gap between logo and burger */
    }

    .logo img {
        width: 180px; /* slightly smaller on mobile to fit nicely */
        height: auto;
    }

    .header-cta {
        display: none !important; /* Hide Book a Call button on mobile */
    }

    .process-steps {
        grid-template-columns: 1fr
    }

    .hero {
        min-height: 520px
    }

    .hero-inner {
        padding-block: 40px
    }

    .hero-actions .btn {
        width: 100%;
        justify-content: center
    }

    .cards {
        grid-template-columns: 1fr
    }

    .stats-nums {
        grid-template-columns: 1fr 1fr;
    }

    .stat {
        padding: 20px 5px;
    }

    .foot-grid {
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .foot-brand, .foot-bottom {
        grid-column: 1 / -1;
    }
    
    .foot-brand {
        text-align: center;
    }
    
    .foot-brand .foot-logo {
        margin: 0 auto 20px auto;
    }
    
    .socials {
        justify-content: center;
    }

    .foot-bottom {
        flex-direction: column;
        text-align: center
    }

    .pay {
        justify-content: center;
        margin-top: 10px;
    }

    .newsletter h2 {
        white-space: normal;
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
    }

    .news-form {
        flex-direction: row;
        align-items: stretch;
        padding: 0;
        gap: 0;
    }

    .news-form input {
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-right: none;
        border-radius: 8px 0 0 8px;
        height: 54px;
        margin: 0;
        background: transparent;
        flex: 1 1 auto;
    }

    .news-form .btn {
        border-radius: 0 8px 8px 0;
        border: 1px solid transparent;
        justify-content: center;
        height: 54px;
        margin: 0;
        padding-inline: 18px;
        box-shadow: none !important;
    }

    .news-form .btn:hover {
        transform: none;
    }

    .testi-arrow {
        display: none
    }

    .work-body h3 {
        font-size: 26px
    }
}
@media (max-width: 980px) {
    .contact-list {
        display: inline-block;
        text-align: left;
    }
    .contact-list li {
        justify-content: flex-start !important;
    }
    .pill-arrow {
        flex-direction: row-reverse !important;
    }
    .pill-arrow .line {
        margin-left: 0 !important;
        margin-right: 14px !important;
        transform-origin: right !important;
    }
    .work-action-row {
        justify-content: space-between !important;
        width: 100% !important;
    }
}
@media (max-width: 640px) {
    .testi-media .play {
        width: 54px !important;
        height: 54px !important;
    }
    .testi-media .play svg {
        width: 22px !important;
        height: 22px !important;
        margin-left: 2px !important;
    }
    .section-sub {
        text-align: justify !important;
    }
}
</style>
    @hasSection('schema')
        @yield('schema')
    @else
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Blackline Marketing",
            "url": "{{ url('/') }}"
        }
        </script>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Blackline Marketing",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.png') }}"
        }
        </script>
    @endif
</head>
<body>

<!-- ============ HEADER ============ -->
@include('components.header')

<!-- ============ HERO ============ -->
<section class="hero">
  <video class="hero-bg" autoplay loop muted playsinline>
    <source src="{{ asset($heroSettings['video'] ?? 'videos/blackline-marketing-video.mp4') }}" type="video/mp4">
  </video>
  <div class="hero-overlay"></div>
  <div class="container hero-inner">
    @php
        $heading = $heroSettings['heading'] ?? 'Where Brands<br>Become Icons';
        $primaryWord = $heroSettings['primary_word'] ?? 'Icons';
        if ($primaryWord) {
            if (stripos($heading, $primaryWord) !== false) {
                $heading = preg_replace('/(' . preg_quote($primaryWord, '/') . ')/i', '<span class="gold">$1</span>', $heading, 1);
            } else {
                $heading .= ' <span class="gold">' . htmlspecialchars($primaryWord) . '</span>';
            }
        }
    @endphp
    <h1 class="hero-title">{!! $heading !!}</h1>
    <p class="hero-sub">{{ $heroSettings['description'] ?? 'We build identity systems, campaigns, and digital experiences for labels ready to lead their category not blend into it.' }}</p>
    <div class="hero-actions">
      <a href="{{ route('book-now') }}" class="btn btn-gold btn-lg">Book a Discovery Call
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
      <a href="{{ route('portfolio') }}" class="btn btn-ghost btn-lg">View Our Work</a>
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section class="about">
  <div class="container about-grid">
    <div class="about-media">
      <img src="{{ asset('images/home-about-section.webp') }}" alt="home about section" title="Home About Section">
    </div>
    <div class="about-copy">
      <h2 class="h2">The <span class="gold">world's</span> most iconic brands have one thing in common they're impossible to ignore.</h2>
      <p class="lead">We transform ambitious brands into cultural conversations. Through the fusion of psychology, design, and strategy, we craft identities that command attention and build lasting legacies.</p>
      <blockquote class="pull-quote">
        <span class="q q-open">&ldquo;</span>
        Attention is temporary.<br>Influence is permanent.
        <span class="q q-close">&rdquo;</span>
      </blockquote>
    </div>
  </div>
</section>

<!-- ============ SERVICES ============ -->
<section class="services" id="services">
  <div class="container">
    <h2 class="h2 section-title"><span class="gold">Services</span> Tailored for Distinction</h2>
    <p class="section-sub">Every service ladders up to the same goal: a brand people recognize before they read the name.</p>

    <div class="cards">
      <!-- 1 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
        </span>
        <h3>Photography & Videography</h3>
        <p>High-end visual production that captures the essence of your brand through stunning photography and cinematic videography.</p>
        <a href="{{ route('services.show', 'photography-videography') }}" class="pill-arrow" aria-label="Read more about Photography & Videography">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 2 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
        </span>
        <h3>Website Development</h3>
        <p>Custom-coded, high-performance websites engineered for seamless user experiences and exceptional conversion rates.</p>
        <a href="{{ route('services.show', 'website-development') }}" class="pill-arrow" aria-label="Read more about Website Development">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 3 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 13L2 9Z"/><path d="M11 3 8 9l4 13"/><path d="M13 3l3 6-4 13"/></svg>
        </span>
        <h3>Fashion Marketing</h3>
        <p>Tailored strategies that elevate fashion brands, driving desire, exclusivity, and measurable sales through compelling campaigns.</p>
        <a href="{{ route('services.show', 'fashion-marketing') }}" class="pill-arrow" aria-label="Read more about Fashion Marketing">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 4 -->
      <article class="card">
        <span class="card-icon">
          <img src="{{ asset('images/media-advertising.svg') }}" alt="media advertising" title="Media Advertising">
        </span>
        <h3>Paid Advertising</h3>
        <p>Data-driven performance marketing campaigns across Meta, Google, and TikTok engineered for maximum ROI.</p>
        <a href="{{ route('services.show', 'paid-advertising') }}" class="pill-arrow" aria-label="Read more about Paid Advertising">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 5 -->
      <article class="card">
        <span class="card-icon">
          <img src="{{ asset('images/influencer-marketing.svg') }}" alt="influencer marketing" title="Influencer Marketing">
        </span>
        <h3>Influencer Marketing</h3>
        <p>Curated creator partnerships and authentic endorsements that build brand trust and drive high-converting traffic.</p>
        <a href="{{ route('services.show', 'influencer-marketing') }}" class="pill-arrow" aria-label="Read more about Influencer Marketing">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 6 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
        </span>
        <h3>Social Media Management</h3>
        <p>End-to-end community building, content planning, and daily engagement strategies that amplify your brand's presence.</p>
        <a href="{{ route('services.show', 'social-media-management') }}" class="pill-arrow" aria-label="Read more about Social Media Management">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 7 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </span>
        <h3>Restaurant Marketing</h3>
        <p>Targeted hyper-local campaigns, appetizing visuals, and influencer events designed to pack your tables every night.</p>
        <a href="{{ route('services.show', 'restaurant-marketing') }}" class="pill-arrow" aria-label="Read more about Restaurant Marketing">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
      <!-- 8 -->
      <article class="card">
        <span class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </span>
        <h3>Events Marketing</h3>
        <p>Strategic hype, hyper-local ads, and VIP influencer outreach that guarantees a packed house and viral buzz.</p>
        <a href="{{ route('services.show', 'events-marketing') }}" class="pill-arrow" aria-label="Read more about Events Marketing">
          <span class="circle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
          <span class="line"></span>
        </a>
      </article>
    </div>
  </div>
</section>

<!-- ============ WORK ============ -->
<div class="work-pin-wrapper" id="workPinWrapper">
<section class="work slide-up-anim" id="work">
  <div class="container">
    <h2 class="h2 section-title" id="work-title" style="min-height: 40px; margin-bottom: 0;"></h2>
    <p class="section-sub" id="work-desc" style="margin-top: 10px; min-height: 24px;"></p>

    <div style="margin-top: 30px;">
        <div class="work-strip" id="workStrip">
      @php
        // Keep the homepage light: full videos are fetched only when visitors press play.
        $workPosters = [
            'images/video-posters/automotive.jpg',
            'images/video-posters/content-creation.jpg',
            'images/video-posters/ecommerce.jpg',
            'images/video-posters/retail.jpg',
        ];
      @endphp
      @foreach($caseStudies as $index => $study)
      <article class="work-panel {{ $index === 0 ? 'is-open' : '' }}" data-title="{{ $study['title'] }}">
        <video class="deferred-video" data-src="{{ asset($study['video'] ?? 'videos/work-first-video.mp4') }}" poster="{{ asset($workPosters[$index] ?? 'images/hero.jpg') }}" preload="none" muted playsinline></video>
        <span class="work-vtitle">{{ $study['title'] }}</span>
        <button class="play" aria-label="Play showreel">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z"/></svg>
        </button>
        <div class="work-body">
          <h3>{{ $study['title'] }}</h3>
          <p class="work-metric">{{ $study['metric'] }}</p>
          <p class="work-desc">{{ $study['description'] }}</p>
          <div class="work-action-row">
            <a href="{{ $study['btn_link'] ?? '#' }}" class="btn btn-gold btn-sm">{{ $study['btn_text'] ?? 'View Case Study' }}
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <div class="work-nav-arrows mobile-nav-arrows" style="position: relative; right: auto; bottom: auto; opacity: 1; pointer-events: auto;">
              <button class="work-arrow work-prev" aria-label="Previous" {!! $index === 0 ? 'style="display:none;"' : '' !!}><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
              <button class="work-arrow work-next" aria-label="Next" {!! $index === count($caseStudies) - 1 ? 'style="display:none;"' : '' !!}><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg></button>
            </div>
          </div>
        </div>

        <div class="work-nav-arrows desktop-nav-arrows">
          <button class="work-arrow work-prev" aria-label="Previous" {!! $index === 0 ? 'style="display:none;"' : '' !!}><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
          <button class="work-arrow work-next" aria-label="Next" {!! $index === count($caseStudies) - 1 ? 'style="display:none;"' : '' !!}><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg></button>
        </div>

        <button class="work-plus" aria-label="Open"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg></button>
      </article>
      @endforeach

    </div>
    </div>
  </div>
</section>
</div>

<!-- ============ STATS ============ -->
<section class="stats">
  <div class="container stats-grid">
    <div class="stats-copy">
      <img class="stats-emoji" src="{{ asset('images/trophy.png') }}" alt="trophy" title="Trophy">
      <h2 class="h2">We deliver results that speak louder than words.</h2>
      <p class="lead">From strategy to execution, we create digital solutions that drive growth, build trust, and make a lasting impact.</p>
    </div>
    <div class="stats-nums" id="statsContainer">
      <div class="stat"><span class="stat-num gold" data-target="500" data-suffix="K+">0</span><span class="stat-label">Total followers generated</span></div>
      <div class="stat"><span class="stat-num gold" data-target="50" data-prefix="$" data-suffix="M+">0</span><span class="stat-label">Revenue generated for clients</span></div>
      <div class="stat"><span class="stat-num gold" data-target="150" data-suffix="+">0</span><span class="stat-label">Team members</span></div>
      <div class="stat"><span class="stat-num gold" data-target="98" data-suffix="%">0</span><span class="stat-label">Company growth</span></div>
    </div>
  </div>
</section>

@include('components.testimonials')

<!-- ============ PROCESS ============ -->
<section class="process">
  <div class="container">
    <h2 class="h2 section-title">Our Proven <span class="gold">Process</span></h2>
    <p class="section-sub">A clear, strategic process that turns bold ideas into meaningful digital experiences.<br>From strategy to execution, every step is designed to deliver measurable results.</p>

    <div class="ring-wrap">
      <div class="ring-label lbl-strategy">
        <p>Deep research and<br>audience psychology to<br>map your brand's unique<br>position in the market.</p>
        <strong>Strategy</strong>
      </div>
      <div class="ring-label lbl-story">
        <p>Crafting compelling narratives<br>that resonate with your<br>audience and bring your<br>vision to life.</p>
        <strong>Storytelling</strong>
      </div>
      <div class="ring-label lbl-results">
        <strong>Results</strong>
        <p>Data-driven optimization<br>and analytics to ensure<br>maximum return on<br>your investment.</p>
      </div>
      <div class="ring-label lbl-exec">
        <strong>Execution</strong>
        <p>Flawless technical delivery<br>and deployment to turn<br>your strategic roadmap<br>into reality.</p>
      </div>

      <svg class="ring" viewBox="0 0 1242 460" role="img" aria-label="Four step process">
        <defs>
          <linearGradient id="g1" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="#F4D266"/><stop offset="1" stop-color="#F7DC84"/></linearGradient>
          <linearGradient id="g2" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#F4D266"/><stop offset="1" stop-color="#EBC04C"/></linearGradient>
          <linearGradient id="g3" x1="1" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#F4D266"/><stop offset="1" stop-color="#EBC04C"/></linearGradient>
          <linearGradient id="g4" x1="1" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#D9A22E"/><stop offset="1" stop-color="#E5B842"/></linearGradient>

          <!-- Text guide tracks -->
          <path id="t1" d="M 433.2 200.9 A 190 190 0 0 1 591.9 42.2"/>
          <path id="t2" d="M 650.1 42.2 A 190 190 0 0 1 808.8 200.9"/>
          <path id="t3" d="M 650.1 417.8 A 190 190 0 0 0 808.8 259.1"/>
          <path id="t4" d="M 433.2 259.1 A 190 190 0 0 0 591.9 417.8"/>

          <!-- Figma-style sector shapes with softer rounded corners -->
          <path id="p1" d="M 459.6 207.4 A 163 163 0 0 1 598.4 68.6 Q 615.3 67.1 614.7 50.1 L 614 30.1 Q 613.4 13.1 596.5 14.4 A 217 217 0 0 0 405.4 205.5 Q 404.1 222.4 421.1 223 L 441.1 223.7 Q 458.1 224.3 459.6 207.4 Z"/>
          <path id="p2" d="M 643.6 68.6 A 163 163 0 0 1 782.4 207.4 Q 783.9 224.3 800.9 223.7 L 820.9 223 Q 837.9 222.4 836.6 205.5 A 217 217 0 0 0 645.5 14.4 Q 628.6 13.1 628 30.1 L 627.3 50.1 Q 626.7 67.1 643.6 68.6 Z"/>
          <path id="p3" d="M 782.4 252.6 A 163 163 0 0 1 643.6 391.4 Q 626.7 392.9 627.3 409.9 L 628 429.9 Q 628.6 446.9 645.5 445.6 A 217 217 0 0 0 836.6 254.5 Q 837.9 237.6 820.9 237 L 800.9 236.3 Q 783.9 235.7 782.4 252.6 Z"/>
          <path id="p4" d="M 598.4 391.4 A 163 163 0 0 1 459.6 252.6 Q 458.1 235.7 441.1 236.3 L 421.1 237 Q 404.1 237.6 405.4 254.5 A 217 217 0 0 0 596.5 445.6 Q 613.4 446.9 614 429.9 L 614.7 409.9 Q 615.3 392.9 598.4 391.4 Z"/>
        </defs>

        <use href="#p1" class="arc" fill="url(#g1)"/>
        <use href="#p2" class="arc" fill="url(#g2)"/>
        <use href="#p3" class="arc" fill="url(#g3)"/>
        <use href="#p4" class="arc" fill="url(#g4)"/>

        <!-- flow arrows placed at the end of each step pointing clockwise to next step -->
        <polygon class="tri" points="-7,-7.5 7,0 -7,7.5" transform="translate(601, 40) rotate(0)"/>
        <polygon class="tri" points="-7,-7.5 7,0 -7,7.5" transform="translate(811, 210) rotate(90)"/>
        <polygon class="tri" points="-7,-7.5 7,0 -7,7.5" transform="translate(641, 420) rotate(180)"/>
        <polygon class="tri" points="-7,-7.5 7,0 -7,7.5" transform="translate(431, 250) rotate(270)"/>

        <text class="step-txt" dominant-baseline="central"><textPath href="#t1" startOffset="50%" text-anchor="middle" dominant-baseline="central">Step 1</textPath></text>
        <text class="step-txt" dominant-baseline="central"><textPath href="#t2" startOffset="50%" text-anchor="middle" dominant-baseline="central">Step 2</textPath></text>
        <text class="step-txt" dominant-baseline="central"><textPath href="#t3" startOffset="50%" text-anchor="middle" dominant-baseline="central">Step 3</textPath></text>
        <text class="step-txt" dominant-baseline="central"><textPath href="#t4" startOffset="50%" text-anchor="middle" dominant-baseline="central">Step 4</textPath></text>

        <!-- connectors -->
        <path class="conn conn-1" d="M 312 206 L 364 206 C 374 206, 382 200, 385.5 192 A 240 240 0 0 1 467 46"/>
        <path class="conn conn-2" d="M 930 206 L 878 206 C 868 206, 860 200, 856.5 192 A 240 240 0 0 0 775 46"/>
        <path class="conn conn-3" d="M 312 254 L 364 254 C 374 254, 382 260, 385.5 268 A 240 240 0 0 0 467 414"/>
        <path class="conn conn-4" d="M 930 254 L 878 254 C 868 254, 860 260, 856.5 268 A 240 240 0 0 1 775 414"/>
        <circle class="node" cx="467" cy="46" r="5.5"/>
        <circle class="node" cx="775" cy="46" r="5.5"/>
        <circle class="node" cx="467" cy="414" r="5.5"/>
        <circle class="node" cx="775" cy="414" r="5.5"/>
      </svg>

      <div class="ring-core">
        <strong>Revenue Engine</strong>
        <span><b class="gold">15%</b> Higher Lead Growth</span>
      </div>
    </div>

    <!-- compact version of the same 4 steps, shown on small screens -->
    <ol class="process-steps">
      <li><span class="ps-num">Step 1</span><h3>Strategy</h3><p class="ps-desc">Deep research and audience psychology to map your brand's unique position in the market.</p></li>
      <li><span class="ps-num">Step 2</span><h3>Storytelling</h3><p class="ps-desc">Crafting compelling narratives that resonate with your audience and bring your vision to life.</p></li>
      <li><span class="ps-num">Step 3</span><h3>Execution</h3><p class="ps-desc">Flawless technical delivery and deployment to turn your strategic roadmap into reality.</p></li>
      <li><span class="ps-num">Step 4</span><h3>Results</h3><p class="ps-desc">Data-driven optimization and analytics to ensure maximum return on your investment.</p></li>
      <li class="ps-core"><strong>Revenue Engine</strong><span><b class="gold">15%</b> Higher Lead Growth</span></li>
    </ol>
  </div>
</section>

@include('components.cta')


<script>
/* Black Line Marketing — home page interactions */
(function () {
    'use strict';

    /* Mobile nav logic is now handled in components/header.blade.php */

    /* ---------- Work accordion (Click Instead of Scroll) ---------- */
    var strip = document.getElementById('workStrip');
    var pinWrapper = document.getElementById('workPinWrapper');
    if (strip && pinWrapper) {
        var panels = Array.prototype.slice.call(strip.querySelectorAll('.work-panel'));
        var totalPanels = panels.length;

        function loadVideo(video) {
            if (video && video.dataset.src && !video.src) {
                video.src = video.dataset.src;
                video.load();
            }
            return video;
        }

        function openPanel(i) {
            i = (i + totalPanels) % totalPanels;
            panels.forEach(function (p, n) { 
                var isOpening = (n === i);
                p.classList.toggle('is-open', isOpening); 
                
                // Stop video if the panel is closing
                if (!isOpening && p.classList.contains('is-playing-video')) {
                    p.classList.remove('is-playing-video');
                    var vid = p.querySelector('video');
                    if (vid) {
                        vid.pause();
                        vid.currentTime = 0;
                    }
                }

                var prevs = p.querySelectorAll('.work-prev');
                var nexts = p.querySelectorAll('.work-next');
                prevs.forEach(function(btn) { btn.style.display = (n === 0) ? 'none' : 'flex'; });
                nexts.forEach(function(btn) { btn.style.display = (n === totalPanels - 1) ? 'none' : 'flex'; });
            });
        }

        panels.forEach(function (panel, i) {
            panel.addEventListener('click', function (e) {
                // If the panel is currently playing a video and it's clicked, pause it.
                if (panel.classList.contains('is-playing-video')) {
                    var video = loadVideo(panel.querySelector('video'));
                    if (video) {
                        panel.classList.remove('is-playing-video');
                        video.pause();
                    }
                    return;
                }

                var playBtn = e.target.closest('.play');
                if (playBtn) {
                    var video = loadVideo(panel.querySelector('video'));
                    if (video) {
                        panel.classList.add('is-playing-video');
                        video.muted = false;
                        video.loop = false;
                        video.currentTime = 0;
                        video.play();
                        
                        video.onended = function() {
                            panel.classList.remove('is-playing-video');
                            video.currentTime = 0;
                        };
                    }
                    return;
                }

                openPanel(i);
            });
            
            // Allow arrow clicks for all prev/next buttons (desktop and mobile sets)
            var prevBtns = panel.querySelectorAll('.work-prev');
            var nextBtns = panel.querySelectorAll('.work-next');
            prevBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) { e.stopPropagation(); openPanel(i - 1); });
            });
            nextBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) { e.stopPropagation(); openPanel(i + 1); });
            });
        });
    }

    /* ---------- Testimonial slider ---------- */
    var track = document.getElementById('tTrack');
    if (track) {
        var slides = track.children.length;
        var dots = Array.prototype.slice.call(document.querySelectorAll('#tDots .dot'));
        var index = 0;

        function goTo(i) {
            index = (i + slides) % slides;
            track.style.transform = 'translateX(' + (-index * 100) + '%)';
            dots.forEach(function (d, n) { d.classList.toggle('is-active', n === index); });
        }

        dots.forEach(function (d, i) { d.addEventListener('click', function () { goTo(i); }); });

        var tPrev = document.getElementById('tPrev');
        var tNext = document.getElementById('tNext');
        if (tPrev) tPrev.addEventListener('click', function () { goTo(index - 1); });
        if (tNext) tNext.addEventListener('click', function () { goTo(index + 1); });

        /* swipe on touch devices */
        var startX = null;
        track.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var dx = e.changedTouches[0].clientX - startX;
            if (Math.abs(dx) > 50) goTo(index + (dx < 0 ? 1 : -1));
            startX = null;
        });

        goTo(0);
    }

    /* ---------- Newsletter (demo only) ---------- */
    var form = document.querySelector('.news-form');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = form.querySelector('input');
            if (input && input.value) {
                input.value = '';
                input.placeholder = 'Thanks — you are subscribed!';
                setTimeout(function () { input.placeholder = 'Email'; }, 3500);
            }
        });
    }
})();
</script>

@include('components.footer')



<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Dynamic sticky for services section to handle layout heights
        const servicesSec = document.querySelector('.services');
        if (servicesSec) {
            const updateSticky = () => {
                if (window.innerWidth >= 992) {
                    const originalPosition = servicesSec.style.position;
                    servicesSec.style.position = 'relative';
                    const h = servicesSec.offsetHeight;
                    servicesSec.style.position = originalPosition;
                    
                    const vh = window.innerHeight;
                    if (h > vh) {
                        // Taller than viewport: stick so the bottom is visible with a 150px gap/offset
                        servicesSec.style.position = 'sticky';
                        servicesSec.style.top = `${vh - h - 150}px`;
                    } else {
                        // Shorter than viewport: stick to top (with header offset)
                        servicesSec.style.position = 'sticky';
                        servicesSec.style.top = '80px';
                    }
                } else {
                    servicesSec.style.position = '';
                    servicesSec.style.top = '';
                }
            };
            window.addEventListener('resize', updateSticky);
            updateSticky();
            window.addEventListener('load', updateSticky);
            setTimeout(updateSticky, 500);
        }



        // Typing and slide-up animation for work section
        const workSection = document.getElementById('work');
        const workTitle = document.getElementById('work-title');
        const workDesc = document.getElementById('work-desc');
        let typeTimers = [];

        function clearTypeTimers() {
            typeTimers.forEach(t => clearTimeout(t));
            typeTimers = [];
        }

        if (workSection && workTitle && workDesc) {
            const observer = new IntersectionObserver((entries) => {
                const entry = entries[0];
                if (entry.isIntersecting) {
                    workSection.classList.add('is-visible');
                    startTypingWorkTitle();
                    observer.disconnect(); // Stop observing to prevent layout shift loops
                }
            }, { threshold: 0.05 });
            
            observer.observe(workSection);
            
            function startTypingWorkTitle() {
                clearTypeTimers();
                workTitle.innerHTML = '';
                workDesc.innerHTML = ''; // clear desc initially
                const span = document.createElement('span');
                span.className = 'gold';
                workTitle.appendChild(span);
                
                const text1 = 'Work';
                const text2 = ' That Speaks Louder Than Words';
                const text3 = 'Four brands, four categories, one shared outcome: attention that turned into revenue.';
                
                let i = 0;
                let j = 0;
                let k = 0;
                
                function type1() {
                    if (i < text1.length) {
                        span.innerHTML += text1.charAt(i);
                        i++;
                        typeTimers.push(setTimeout(type1, 10));
                    } else {
                        type2();
                    }
                }
                
                function type2() {
                    if (j < text2.length) {
                        workTitle.appendChild(document.createTextNode(text2.charAt(j)));
                        j++;
                        typeTimers.push(setTimeout(type2, 10));
                    }
                }
                
                function type3() {
                    if (k < text3.length) {
                        workDesc.innerHTML += text3.charAt(k);
                        k++;
                        typeTimers.push(setTimeout(type3, 5)); // slightly faster
                    }
                }
                
                // Start both simultaneously
                type1();
                type3();
            }
        }

        // Stats counter animation
        const statsContainer = document.getElementById('statsContainer');
        if (statsContainer) {
            const statsObserver = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    const counters = document.querySelectorAll('.stat-num[data-target]');
                    counters.forEach(counter => {
                        const target = +counter.getAttribute('data-target');
                        const prefix = counter.getAttribute('data-prefix') || '';
                        const suffix = counter.getAttribute('data-suffix') || '';
                        const duration = 2000;
                        
                        let startTime = null;
                        const updateCounter = (currentTime) => {
                            if (!startTime) startTime = currentTime;
                            const progress = Math.min((currentTime - startTime) / duration, 1);
                            const easeProgress = 1 - Math.pow(1 - progress, 4); // easeOutQuart
                            const current = Math.floor(easeProgress * target);
                            
                            counter.innerText = prefix + current + suffix;
                            if (progress < 1) {
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.innerText = prefix + target + suffix;
                            }
                        };
                        requestAnimationFrame(updateCounter);
                    });
                    statsObserver.disconnect();
                }
            }, { threshold: 0.5 });
            
            statsObserver.observe(statsContainer);
        }
    });
</script>
<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>


