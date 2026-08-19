<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Book Now — Black Line Marketing' }}</title>
<meta name="description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Book a session with Black Line Marketing.' }}">
<meta name="keywords" content="{{ !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : 'book now, black line marketing, appointment' }}">
<link rel="canonical" href="{{ url()->
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Book Now — Black Line Marketing' }}">
    <meta property="og:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Book a session with Black Line Marketing.' }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ !empty($seo['meta_title']) ? $seo['meta_title'] : 'Book Now — Black Line Marketing' }}">
    <meta name="twitter:description" content="{{ !empty($seo['meta_description']) ? $seo['meta_description'] : 'Book a session with Black Line Marketing.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">current() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<!-- Custom CSS for Book Now page if needed -->
<style>
  .booknow-main { padding: 0px 0 80px; text-align: center; color: #fff; min-height: 80vh; display: flex; align-items: center; justify-content: center; background: #222; }
  .booknow-main h1 { font-size: 2.5rem; margin-bottom: 10px; font-weight: 700; }
  .booknow-main p { font-size: 1rem; color: #ccc; margin-bottom: 40px; }

  .custom-booking-widget {
      max-width: 900px;
      margin: 0 auto;
      background: #333333;
      border-radius: 12px;
      padding: 40px;
      text-align: left;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
  }

  .widget-header { margin-bottom: 40px; padding: 0 20px; }
  .user-name { display: block; font-size: 1rem; color: #ccc; margin-bottom: 8px; font-weight: 600; text-align: center; }
  .widget-header h2 { font-size: 1.8rem; color: #fff; margin-bottom: 20px; font-weight: 700; text-align: center; }
  
  .widget-meta { display: flex; justify-content: center; gap: 30px; color: #ccc; font-size: 0.95rem; align-items: center; flex-wrap: wrap; }
  .widget-meta span { display: flex; align-items: center; gap: 8px; }
  .widget-meta svg { width: 18px; height: 18px; color: var(--gold, #d4af37); }

  .calendar-wrapper { display: flex; gap: 30px; justify-content: center; align-items: flex-start; transition: all 0.3s; }
  
  .widget-calendar-card {
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      color: #333;
      width: 100%;
      max-width: 400px;
      flex-shrink: 0;
  }

  .calendar-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
  .calendar-header h3 { font-size: 1.2rem; font-weight: 700; margin: 0; }
  .calendar-nav { display: flex; gap: 15px; }
  .calendar-nav button { background: none; border: none; cursor: pointer; color: #666; display: flex; align-items: center; justify-content: center; padding: 5px; }
  .calendar-nav button:hover { color: #000; }
  .calendar-nav svg { width: 20px; height: 20px; }

  .calendar-grid .weekdays { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; font-size: 0.8rem; font-weight: 600; color: #000; margin-bottom: 10px; }
  .calendar-grid .days { display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; gap: 5px; }
  
  .day-cell {
      aspect-ratio: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      border-radius: 50%;
      cursor: pointer;
      font-weight: 500;
      color: #333;
      border: 1px solid transparent;
      height: 45px;
  }
  .day-cell:not(.next-month):hover { background: #f0f0f0; border-color: #eee; }
  .day-cell.active { background: var(--gold, #d4af37) !important; color: #fff !important; border-color: var(--gold, #d4af37) !important; }
  .day-cell.next-month { color: #ccc; cursor: default; }

  .time-slots-panel {
      width: 280px;
      padding: 10px 0;
      display: none;
      height: 380px;
      overflow-y: auto;
  }
  .time-slots-panel::-webkit-scrollbar { width: 6px; }
  .time-slots-panel::-webkit-scrollbar-thumb { background: #555; border-radius: 4px; }
  .time-slots-panel h4 { font-size: 1.1rem; font-weight: 400; margin-bottom: 20px; color: #fff; }
  .time-slots-list { display: flex; flex-direction: column; gap: 12px; }
  .time-slots-list button { background: transparent; border: 1px solid var(--gold, #d4af37); color: #fff; padding: 15px; border-radius: 4px; cursor: pointer; font-size: 1rem; font-weight: 600; transition: all 0.2s; }
  .time-slots-list button:hover { background: rgba(212, 175, 55, 0.1); border-width: 2px; padding: 14px; }

  .widget-footer { text-align: left; margin-top: 30px; padding: 0 20px; }
  .widget-footer h4 { font-size: 0.9rem; color: #fff; margin-bottom: 8px; font-weight: 600; }
  .timezone-selector { display: flex; align-items: center; gap: 8px; color: #ccc; font-size: 0.85rem; cursor: pointer; }
  .timezone-selector svg { width: 16px; height: 16px; }

  @media(max-width: 768px) {
      .custom-booking-widget { padding: 30px 20px; }
      .widget-meta { flex-direction: column; gap: 15px; align-items: flex-start; }
      .day-cell { height: 35px; }
      .calendar-wrapper { flex-direction: column; align-items: center; }
      .time-slots-panel { width: 100%; height: auto; max-height: 300px; }
  }

  .discovery-covers { max-width: 800px; margin: 80px auto 40px; text-align: left; }
  .discovery-covers h2 { font-size: 2rem; color: #fff; font-weight: 700; text-align: center; margin-bottom: 40px; }
  .covers-list { display: flex; flex-direction: column; gap: 30px; }
  .cover-item { display: flex; gap: 20px; align-items: flex-start; }
  .cover-number { 
      background: #b58941; 
      color: #fff; 
      min-width: 36px; 
      height: 36px; 
      border-radius: 50%; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      font-weight: 600; 
      font-size: 1rem;
      margin-top: -3px;
      flex-shrink: 0;
  }
  .cover-content h4 { color: #fff; font-size: 1.15rem; margin-bottom: 8px; font-weight: 600; margin-top: 2px; }
  .cover-content p { color: #aaa; font-size: 0.95rem; line-height: 1.6; margin: 0; }
  
  .form-title { font-size: 1.4rem; color: var(--gold, #d4af37); margin-bottom: 25px; font-weight: 700; margin-top: 10px; }
  .booking-form { display: flex; flex-direction: column; gap: 30px; }
  .form-row { display: flex; gap: 30px; }
  .form-group { display: flex; flex-direction: column; flex: 1; text-align: left; }
  .form-group label { font-size: 0.85rem; color: var(--gold, #d4af37); font-weight: 600; margin-bottom: 8px; }
  .form-group input, .form-group textarea {
      background: transparent;
      border: none;
      border-bottom: 1px solid #666;
      color: #ffffff !important;
      -webkit-text-fill-color: #ffffff !important;
      padding: 8px 0;
      font-size: 0.95rem;
      outline: none;
      resize: none;
  }
  .form-group textarea {
      min-height: 60px;
  }
  .form-group input:focus, .form-group textarea:focus { 
      border-bottom-color: var(--gold, #d4af37); 
      color: #ffffff !important;
      -webkit-text-fill-color: #ffffff !important;
  }
  
  .form-group input::placeholder, 
  .form-group textarea::placeholder {
      color: #888888 !important;
      -webkit-text-fill-color: #888888 !important;
      opacity: 1;
  }
  
  /* Fix browser autofill background and text color completely */
  .booking-form input:-webkit-autofill,
  .booking-form input:-webkit-autofill:hover, 
  .booking-form input:-webkit-autofill:focus,
  .booking-form input:-webkit-autofill:active,
  .booking-form input:-internal-autofill-previewed,
  .booking-form input:-internal-autofill-selected,
  input:-webkit-autofill,
  input:-webkit-autofill:hover, 
  input:-webkit-autofill:focus,
  input:-webkit-autofill:active,
  input:-internal-autofill-previewed,
  input:-internal-autofill-selected {
      -webkit-box-shadow: 0 0 0 1000px #333333 inset !important;
      -webkit-text-fill-color: #ffffff !important;
      color: #ffffff !important;
      transition: background-color 5000s ease-in-out 0s !important;
  }

  .terms-text { font-size: 0.8rem; color: #aaa; margin-top: 10px; line-height: 1.5; }
  .terms-text a { color: #4285F4; text-decoration: none; }
  .schedule-btn {
      background: linear-gradient(90deg, rgba(175, 132, 69, 1) 0%, rgba(232, 201, 136, 1) 35%, rgba(229, 202, 131, 1) 65%, rgba(175, 132, 69, 1) 100%) !important;
      color: #000 !important;
      font-weight: 700;
      border: none;
      padding: 15px 30px;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      font-size: 1rem;
      align-self: flex-start;
  }
  .schedule-btn:hover { opacity: 0.9; }
  .schedule-btn:disabled {
      background: #555 !important;
      color: #888 !important;
      cursor: not-allowed !important;
  }
  .time-slots-list button:disabled {
      background: #444 !important;
      border-color: #555 !important;
      color: #777 !important;
      cursor: not-allowed !important;
      opacity: 0.6;
  }

  .success-title { font-size: 2rem; color: #fff; font-weight: 700; margin-bottom: 10px; }
  .success-subtitle { font-size: 1rem; color: #ccc; margin-bottom: 40px; }
  .success-details-card {
      border: 1px solid #555;
      border-radius: 8px;
      padding: 30px;
      text-align: left;
      max-width: 500px;
      margin: 0 auto;
      background: #333;
  }
  .success-details-card h3 { font-size: 1.3rem; color: #fff; font-weight: 700; margin-bottom: 25px; }
  .success-meta-item { display: flex; align-items: center; gap: 15px; color: #fff; margin-bottom: 20px; font-size: 0.95rem; }
  .success-meta-item:last-child { margin-bottom: 0; }
  .success-meta-item svg { width: 22px; height: 22px; color: var(--gold, #d4af37); flex-shrink: 0; }

  @media(max-width: 768px) {
      .form-row { flex-direction: column; gap: 20px; }
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
<body class="booknow-page">

@include('components.header')

<main class="booknow-main">
  <div class="container">
    <h1>Book Your Discovery Call</h1>
    <p>Select a time, enter your details, and we'll handle the rest.</p>
    
    <div class="custom-booking-widget">
        <div class="widget-header">
            <span class="user-name">Dave Heavenridge</span>
            <h2>30 Minute Discovery Call</h2>
            <div class="widget-meta" id="widgetMeta">
                <span id="metaDuration">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    30 min
                </span>
                <span id="metaLocation">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                    Web conferencing details provided upon confirmation.
                </span>
                <span id="metaSelectedTime" style="display:none;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span></span>
                </span>
                <span id="metaSelectedZone" style="display:none;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> 
                    <span class="user-timezone-display">Dubai, United Arab Emirates Time</span>
                </span>
            </div>
        </div>

        <div id="bookingStep1">
            <div class="calendar-wrapper">
                <div class="widget-calendar-card">
                    <div class="calendar-header">
                        <h3>August 2026</h3>
                        <div class="calendar-nav">
                            <button aria-label="Previous Month"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></button>
                            <button aria-label="Next Month"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></button>
                        </div>
                    </div>
                    
                    <div class="calendar-grid">
                        <div class="weekdays">
                            <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
                        </div>
                        <div class="days">
                            <span class="day-cell">1</span>
                            <span class="day-cell">2</span>
                            <span class="day-cell">3</span>
                            <span class="day-cell">4</span>
                            <span class="day-cell">5</span>
                            <span class="day-cell">6</span>
                            <span class="day-cell">7</span>
                            
                            <span class="day-cell">8</span>
                            <span class="day-cell">9</span>
                            <span class="day-cell">10</span>
                            <span class="day-cell">11</span>
                            <span class="day-cell">12</span>
                            <span class="day-cell">13</span>
                            <span class="day-cell">14</span>
                            
                            <span class="day-cell">15</span>
                            <span class="day-cell">16</span>
                            <span class="day-cell">17</span>
                            <span class="day-cell active">18</span>
                            <span class="day-cell">19</span>
                            <span class="day-cell">20</span>
                            <span class="day-cell">21</span>
                            
                            <span class="day-cell">22</span>
                            <span class="day-cell">23</span>
                            <span class="day-cell">24</span>
                            <span class="day-cell">25</span>
                            <span class="day-cell">26</span>
                            <span class="day-cell">27</span>
                            <span class="day-cell">28</span>
                            
                            <span class="day-cell">29</span>
                            <span class="day-cell">30</span>
                            <span class="day-cell">31</span>
                            <span class="day-cell next-month">1</span>
                            <span class="day-cell next-month">2</span>
                            <span class="day-cell next-month">3</span>
                            <span class="day-cell next-month">4</span>
                        </div>
                    </div>
                </div>

                <!-- Time Slots Panel -->
                <div class="time-slots-panel" id="timeSlotsPanel">
                    <h4 id="selectedDateText">Tuesday, August 18</h4>
                    <div class="time-slots-list">
                        <button>12:00am</button>
                        <button>12:30am</button>
                        <button>01:00am</button>
                        <button>01:30am</button>
                        <button>02:00am</button>
                        <button>02:30am</button>
                        <button>03:00am</button>
                        <button>03:30am</button>
                        <button>04:00am</button>
                        <button>04:30am</button>
                        <button>05:00am</button>
                        <button>05:30am</button>
                        <button>06:00am</button>
                        <button>06:30am</button>
                        <button>07:00am</button>
                        <button>07:30am</button>
                        <button>08:00am</button>
                        <button>08:30am</button>
                        <button>09:00am</button>
                        <button>09:30am</button>
                        <button>10:00am</button>
                        <button>10:30am</button>
                        <button>11:00am</button>
                        <button>11:30am</button>
                        <button>12:00pm</button>
                        <button>12:30pm</button>
                        <button>01:00pm</button>
                        <button>01:30pm</button>
                        <button>02:00pm</button>
                        <button>02:30pm</button>
                        <button>03:00pm</button>
                        <button>03:30pm</button>
                        <button>04:00pm</button>
                        <button>04:30pm</button>
                        <button>05:00pm</button>
                        <button>05:30pm</button>
                        <button>06:00pm</button>
                        <button>06:30pm</button>
                        <button>07:00pm</button>
                        <button>07:30pm</button>
                        <button>08:00pm</button>
                        <button>08:30pm</button>
                        <button>09:00pm</button>
                        <button>09:30pm</button>
                        <button>10:00pm</button>
                        <button>10:30pm</button>
                        <button>11:00pm</button>
                        <button>11:30pm</button>
                    </div>
                </div>
            </div>

            <div class="widget-footer">
                <h4>Time Zone</h4>
                <div class="timezone-selector">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> 
                    <span class="user-timezone-display">Dubai, United Arab Emirates Time (GST)</span> 
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 14px; height: 14px;"><polyline points="6 9 12 15 18 9"/></svg>
                </div>
            </div>
        </div>

        <div id="bookingStep2" style="display:none; padding: 20px 20px 0 20px;">
            <h3 class="form-title">Enter Details</h3>
            <form class="booking-form">
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name *</label>
                        <input type="text" name="first_name" required spellcheck="false">
                    </div>
                    <div class="form-group">
                        <label>Last Name *</label>
                        <input type="text" name="last_name" required spellcheck="false">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required spellcheck="false">
                </div>
                <div class="form-group">
                    <label>Business Website URL *</label>
                    <input type="url" name="website" required spellcheck="false">
                </div>
                <div class="form-group">
                    <label>Additional notes</label>
                    <textarea rows="3" name="notes" placeholder="Please share anything that will help prepare for our meeting." spellcheck="false"></textarea>
                </div>
                <p class="terms-text">By proceeding, you confirm that you have read and agree to <a href="#">Calendly's Participant Terms</a> and <a href="#">Privacy Notice</a>.</p>
                <button type="submit" class="schedule-btn">Book a Discovery Call</button>
            </form>
        </div>

        <!-- Success Step 3 -->
        <div id="bookingStep3" style="display:none; text-align: center; padding: 40px 20px;">
            <h2 class="success-title">You are scheduled!</h2>
            <p class="success-subtitle">A calendar invitation has been sent to your email address.</p>
            
            <div class="success-details-card">
                <h3>30 Minute Discovery Call</h3>
                <div class="success-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Dave Heavenridge
                </div>
                <div class="success-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <span id="successTimeDate"></span>
                </div>
                <div class="success-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    <span class="user-timezone-display">Dubai, United Arab Emirates Time (GST)</span>
                </div>
                <div class="success-meta-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                    Web conferencing details to follow.
                </div>
            </div>
        </div>

    </div>

    <!-- Discovery Covers Section -->
    <div class="discovery-covers">
        <h2>What the Discovery Call Covers</h2>
        <div class="covers-list">
            <div class="cover-item">
                <div class="cover-number">1</div>
                <div class="cover-content">
                    <h4>Your business</h4>
                    <p>What you do, how you're growing, what a great month looks like.</p>
                </div>
            </div>
            <div class="cover-item">
                <div class="cover-number">2</div>
                <div class="cover-content">
                    <h4>Your marketing</h4>
                    <p>What you're spending, what channels you're using, what's frustrating you.</p>
                </div>
            </div>
            <div class="cover-item">
                <div class="cover-number">3</div>
                <div class="cover-content">
                    <h4>The gaps</h4>
                    <p>We'll share 2-3 observations about your current setup based on what we can see publicly.</p>
                </div>
            </div>
            <div class="cover-item">
                <div class="cover-number">4</div>
                <div class="cover-content">
                    <h4>The fit</h4>
                    <p>Whether Blackline Marketing can actually help — and if so, which engagement makes sense. If we're not the right fit, we'll tell you.</p>
                </div>
            </div>
        </div>
    </div>

  </div>
</main>

<script>
// Pass booked slots from PHP backend to global JS
window.bookedSlots = @json($bookedSlots);

document.addEventListener('DOMContentLoaded', function() {
    try {
        const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const tzName = new Intl.DateTimeFormat('en-US', { timeZoneName: 'short' }).formatToParts(new Date()).find(p => p.type === 'timeZoneName')?.value || '';
        const displayString = timeZone.replace(/\//g, ', ').replace(/_/g, ' ') + (tzName ? ` (${tzName})` : '');
        
        document.querySelectorAll('.user-timezone-display').forEach(el => {
            el.innerText = displayString;
        });
    } catch (e) {
        console.error("Error setting timezone: ", e);
    }

    const dayCells = document.querySelectorAll('.day-cell:not(.next-month)');
    const timeSlotsPanel = document.getElementById('timeSlotsPanel');
    const selectedDateText = document.getElementById('selectedDateText');
    const timeButtons = document.querySelectorAll('.time-slots-list button');
    
    const widgetHeader = document.querySelector('.widget-header');
    const step1 = document.getElementById('bookingStep1');
    const step2 = document.getElementById('bookingStep2');
    const step3 = document.getElementById('bookingStep3');
    const metaSelectedTime = document.getElementById('metaSelectedTime');
    const metaSelectedZone = document.getElementById('metaSelectedZone');
    const metaSelectedTimeText = metaSelectedTime.querySelector('span');
    const successTimeDate = document.getElementById('successTimeDate');
    const form = document.querySelector('.booking-form');
    
    // Grid starts on Monday in our UI (Mo=0, Tu=1, etc.)
    const dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    let currentSelectedFullDate = '';
    
    function updateAvailableSlots(dayNum) {
        const dayStr = String(dayNum).padStart(2, '0');
        const lookupDate = `2026-08-${dayStr}`;
        const bookedTimes = window.bookedSlots[lookupDate] || [];
        
        timeButtons.forEach(btn => {
            // Restore original time if stored, otherwise store it
            const originalTime = btn.getAttribute('data-original-time') || btn.innerText;
            if (!btn.getAttribute('data-original-time')) {
                btn.setAttribute('data-original-time', originalTime);
            }
            
            // Check if this time slot is booked
            if (bookedTimes.includes(originalTime)) {
                btn.disabled = true;
                btn.innerText = `${originalTime} (Booked)`;
            } else {
                btn.disabled = false;
                btn.innerText = originalTime;
            }
        });
    }

    dayCells.forEach((cell, index) => {
        cell.addEventListener('click', function() {
            // Remove active from all
            document.querySelectorAll('.day-cell').forEach(c => c.classList.remove('active'));
            // Add active to clicked
            this.classList.add('active');
            
            // Show time slots
            timeSlotsPanel.style.display = 'block';
            
            // Calculate Day Name
            const dayOfWeek = dayNames[index % 7];
            selectedDateText.innerText = `${dayOfWeek}, August ${this.innerText}`;
            currentSelectedFullDate = `${dayOfWeek}, August ${this.innerText}, 2026`;
            
            // Update time slots buttons for selected day
            updateAvailableSlots(this.innerText);
        });
    });

    // Default initialization for active day (18th)
    currentSelectedFullDate = 'Tuesday, August 18, 2026';
    timeSlotsPanel.style.display = 'block';
    updateAvailableSlots(18);
    
    timeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const selectedTime = this.getAttribute('data-original-time') || this.innerText;
            
            // Calculate end time (+30 mins) using JS Date
            const timeStringParts = selectedTime.match(/(\d+):(\d+)(am|pm)/);
            if (timeStringParts) {
                let d = new Date(`2026-08-01 ${timeStringParts[1]}:${timeStringParts[2]} ${timeStringParts[3].toUpperCase()}`);
                d.setMinutes(d.getMinutes() + 30);
                let endTime = d.toLocaleTimeString('en-US', { hour: '2-digit', minute:'2-digit' }).toLowerCase().replace(' ', '');
                
                // Update Meta texts
                metaSelectedTimeText.innerText = `${selectedTime} - ${endTime}, ${currentSelectedFullDate}`;
            } else {
                metaSelectedTimeText.innerText = `${selectedTime}, ${currentSelectedFullDate}`;
            }

            // Show selected time and zone, hide step1, show step2
            metaSelectedTime.style.display = 'flex';
            metaSelectedZone.style.display = 'flex';
            
            step1.style.display = 'none';
            step2.style.display = 'block';
            
            // Optional: scroll to top of widget
            document.querySelector('.custom-booking-widget').scrollIntoView({ behavior: 'smooth' });
        });
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = form.querySelector('.schedule-btn');
        submitBtn.disabled = true;
        submitBtn.innerText = 'Booking...';
        
        // Prepare Form Data
        const formData = new FormData(form);
        
        const activeDayCell = document.querySelector('.day-cell.active');
        const dayStr = String(activeDayCell.innerText).padStart(2, '0');
        const formattedDate = `2026-08-${dayStr}`;
        const selectedTimeText = metaSelectedTimeText.innerText.split(' - ')[0]; // E.g. "12:00am"
        
        formData.append('date', formattedDate);
        formData.append('time_slot', selectedTimeText);
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch("{{ route('book-now.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json().then(data => ({ status: response.status, body: data })))
        .then(res => {
            if (res.status === 200 && res.body.success) {
                // Hide previous steps and header, show success step
                widgetHeader.style.display = 'none';
                step1.style.display = 'none';
                step2.style.display = 'none';
                step3.style.display = 'block';
                
                // Set success view time
                successTimeDate.innerText = metaSelectedTimeText.innerText;
            } else {
                alert(res.body.message || 'Something went wrong. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Book a Discovery Call';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Failed to connect to server. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerText = 'Book a Discovery Call';
        });
    });
});
</script>

@include('components.footer')
<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
