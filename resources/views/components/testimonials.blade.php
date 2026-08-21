<!-- ============ TESTIMONIALS ============ -->
<section class="testi">
  <div class="container">
    <h2 class="h2 center">Real feedback from brands we've built with</h2>

    <div class="testi-wrap">
      <button class="testi-arrow" id="tPrev" aria-label="Previous">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      </button>

      <div class="testi-viewport">
        <div class="testi-track" id="tTrack">
          @php
            // Match media to the testimonial author, not to the legacy upload filename.
            $testimonialMedia = [
              'james' => ['video' => 'videos/web/testimonial-client.mp4', 'poster' => 'images/video-posters/testimonial-agency.jpg'],
              'amelia stone' => ['video' => 'videos/web/testimonial-agency.mp4', 'poster' => 'images/video-posters/testimonial-client.jpg'],
            ];
          @endphp
          @foreach($feedbacks as $feedback)
          <figure class="testi-card">
            <div class="testi-media">
              @php $media = $testimonialMedia[strtolower(trim($feedback['name']))] ?? ['video' => $feedback['video'], 'poster' => 'images/testimonial.jpg']; @endphp
              <video class="deferred-video" data-src="{{ asset($media['video']) }}" poster="{{ asset($media['poster']) }}" preload="none" muted playsinline></video>
              <button class="play" aria-label="Play video"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5.5v13l11-6.5z"/></svg></button>
            </div>
            <blockquote class="testi-body">
              @php
                $logoName = pathinfo(basename($feedback['logo']), PATHINFO_FILENAME);
                $logoAlt = trim(str_replace(['-', '_'], ' ', $logoName));
                $logoTitle = ucwords($logoAlt);
              @endphp
              <img class="testi-logo" src="{{ asset($feedback['logo']) }}" alt="{{ trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME))) }}" title="{{ ucwords(trim(str_replace(['-', '_'], ' ', pathinfo(basename((string) ($feedback['logo'])), PATHINFO_FILENAME)))) }}">
              <p>{{ $feedback['description'] }}</p>
              <figcaption>
                <span class="t-name">{{ $feedback['name'] }}</span>
                <span class="t-role">{{ $feedback['role'] }}</span>
              </figcaption>
            </blockquote>
          </figure>
          @endforeach
        </div>
      </div>

      <button class="testi-arrow" id="tNext" aria-label="Next">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
      </button>
    </div>

    <div class="dots" id="tDots">
      @foreach($feedbacks as $index => $feedback)
      <button class="dot {{ $index === 0 ? 'is-active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
      @endforeach
    </div>
  </div>
</section>
