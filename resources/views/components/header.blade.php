<style>
.site-header {
    transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1), background-color 0.3s ease !important;
}
.site-header.header-hidden {
    transform: translateY(-100%) !important;
}
.site-header.header-scrolled {
    background-color: rgba(40, 40, 43, 0.95) !important;
    backdrop-filter: blur(10px) !important;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15) !important;
}
</style>

<header class="site-header" id="top">
  <div class="container header-inner">
    <a class="logo" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" title="Logo"></a>

    <nav class="nav" id="nav">
      <ul class="nav-list">
        <li class="has-drop">
          <a href="javascript:void(0)">Services
            <svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </a>
          <div class="drop">
            @if(isset($servicesList) && count($servicesList) > 0)
              @foreach($servicesList as $serviceItem)
                <a href="{{ route('services.show', $serviceItem['slug']) }}">{{ $serviceItem['title'] }}</a>
              @endforeach
            @else
              <a href="{{ route('services') }}">Social Media Management</a>
            @endif
          </div>
        </li>
        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
        <!-- <li><a href="{{ route('case-study') }}">Case Study</a></li> -->
        <li><a href="{{ route('blogs') }}">Blogs</a></li>
        <li><a href="{{ route('faqs') }}">FAQs</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
      </ul>
    </nav>

    <a href="{{ route('book-now') }}" class="btn btn-gold header-cta">Book a Discovery Call</a>

    <button class="burger" id="burger" aria-label="Menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<script>
(function() {
    var initBurger = function() {
        var burger = document.getElementById('burger');
        var nav = document.getElementById('nav');

        if (burger && nav) {
            // Remove any existing listeners
            var newBurger = burger.cloneNode(true);
            if (burger.parentNode) {
                burger.parentNode.replaceChild(newBurger, burger);
            }
            burger = newBurger;

            burger.addEventListener('click', function (e) {
                e.preventDefault();
                var open = nav.classList.toggle('is-open');
                burger.classList.toggle('is-open', open);
                burger.setAttribute('aria-expanded', String(open));
                document.body.classList.toggle('no-scroll', open);
            });

            nav.addEventListener('click', function (e) {
                var drop = e.target.closest('.has-drop > a');
                if (drop && window.matchMedia('(max-width:980px)').matches) {
                    e.preventDefault();
                    drop.parentElement.classList.toggle('is-open');
                    return;
                }
                if (e.target.closest('a')) {
                    nav.classList.remove('is-open');
                    burger.classList.remove('is-open');
                    burger.setAttribute('aria-expanded', 'false');
                    document.body.classList.remove('no-scroll');
                }
            });
        }
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initBurger);
    } else {
        initBurger();
    }

    // Scroll Hide / Show logic
    var header = document.querySelector('.site-header');
    if (header) {
        var lastScrollTop = 0;
        var scrollThreshold = 10;
        
        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop < 0) return;
            
            // Background color change when scrolled down past a bit
            if (scrollTop > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
            
            // Don't hide if menu is open
            var nav = document.getElementById('nav');
            if (nav && nav.classList.contains('is-open')) return;
            
            if (Math.abs(lastScrollTop - scrollTop) <= scrollThreshold) {
                return;
            }
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            lastScrollTop = scrollTop;
        });
    }
})();
</script>
