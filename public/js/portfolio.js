document.addEventListener('DOMContentLoaded', () => {
  const section = document.querySelector('.portfolio-work');
  if (!section) return;

  const categoryLinks = [...document.querySelectorAll('[data-go]')];
  const backBtn = document.querySelector('[data-back]');
  const detailTitle = document.querySelector('[data-detail-title]');
  const projects = [...document.querySelectorAll('.project')];
  const emptyEl = document.querySelector('.portfolio-empty');

  // Filter sidebar elements
  const toggle = document.querySelector('.filter-button');
  const sidebar = document.querySelector('.filter-sidebar');
  const overlay = document.querySelector('.filter-sidebar-overlay');
  const closeBtn = document.querySelector('.close-filter-btn');
  const applyBtn = document.querySelector('.apply-filter-btn');

  // slug -> label map (read from the rendered cards)
  const labelMap = {};
  categoryLinks.forEach(link => {
    const heading = link.querySelector('.category-card__body h3');
    labelMap[link.dataset.go] = heading ? heading.textContent.trim() : '';
  });

  function restart(el) {
    if (!el) return;
    el.style.animation = 'none';
    void el.offsetWidth;
    el.style.animation = '';
  }

  function selectedIndustries() {
    if (!sidebar) return [];
    return [...sidebar.querySelectorAll('input[type="checkbox"]:checked')].map(cb => cb.value);
  }

  // Show/hide project cards based on the active category + industry filter,
  // and re-apply the staggered "raised" layout to the visible cards only.
  function applyVisibility(active) {
    const industries = selectedIndustries();
    const visible = [];

    projects.forEach(project => {
      const inCategory = project.dataset.category === active;
      const inIndustry = industries.length === 0 || industries.includes(project.dataset.industry);
      const show = inCategory && inIndustry;
      project.hidden = !show;
      project.classList.remove('is-raised');
      if (show) visible.push(project);
    });

    visible.forEach((project, i) => {
      if (i % 2 === 0) project.classList.add('is-raised');
    });

    if (emptyEl) emptyEl.hidden = visible.length !== 0;
  }

  // Switch between the chooser and a category detail view.
  function setState(active, push) {
    if (active) {
      section.classList.remove('is-chooser');
      section.classList.add('is-detail');
      section.dataset.active = active;
      if (detailTitle && labelMap[active]) detailTitle.textContent = labelMap[active];
      applyVisibility(active);
      restart(document.querySelector('.portfolio-detail'));
    } else {
      section.classList.add('is-chooser');
      section.classList.remove('is-detail');
      section.dataset.active = '';
      restart(document.querySelector('.portfolio-categories'));
    }

    if (push) {
      const url = new URL(window.location.href);
      if (active) {
        url.searchParams.set('category', active);
      } else {
        url.searchParams.delete('category');
      }
      url.hash = 'portfolio-grid';
      history.pushState({ category: active || null }, '', url);
    }
  }

  function scrollToSection() {
    const top = section.getBoundingClientRect().top + window.pageYOffset - 90;
    window.scrollTo({ top: Math.max(top, 0), behavior: 'smooth' });
  }

  // Card click -> open that category (let modifier-clicks open a new tab normally)
  categoryLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
      e.preventDefault();
      setState(link.dataset.go, true);
      scrollToSection();
    });
  });

  // Back -> return to the chooser
  if (backBtn) {
    backBtn.addEventListener('click', (e) => {
      e.preventDefault();
      setState(null, true);
      scrollToSection();
    });
  }

  // Browser back/forward
  window.addEventListener('popstate', () => {
    const param = new URL(window.location.href).searchParams.get('category');
    setState(labelMap[param] ? param : null, false);
  });

  // ---- Filter sidebar ----
  if (toggle && sidebar && overlay) {
    const openSidebar = () => { sidebar.hidden = false; overlay.hidden = false; };
    const closeSidebar = () => { sidebar.hidden = true; overlay.hidden = true; };

    toggle.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    if (applyBtn) {
      applyBtn.addEventListener('click', () => {
        applyVisibility(section.dataset.active);
        closeSidebar();
      });
    }
  }

  // Set the correct initial layout (stagger) for whatever the server rendered.
  if (section.classList.contains('is-detail') && section.dataset.active) {
    applyVisibility(section.dataset.active);
  }
});
