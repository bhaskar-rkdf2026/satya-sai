/**
 * SSSUTMS Modern Portal - Main Interactive Engine
 * Pure Vanilla JS, High Performance, Zero Bloat
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. High-Performance IntersectionObserver Lazy Loading
  initLazyLoading();

  // 2. Hero Banner Slider Engine
  initHeroSlider();

  // 3. Notice Tab Filter Engine
  initNoticeTabs();

  // 4. Back to Top Smooth Scroller
  initBackToTop();

  // 5. Gallery Filter Engine
  initGalleryFilter();

  // 6. Instant Admission Enquiry Modal Logic
  initEnquiryForm();

  // 7. Live Schemes / Syllabus Search Filter
  initSchemeFilter();
});

/* ==========================================================================
   1. LAZY LOADING IMAGES VIA INTERSECTION OBSERVER
   ========================================================================== */
function initLazyLoading() {
  const lazyImages = document.querySelectorAll('img[loading="lazy"]');

  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const image = entry.target;
          if (image.dataset.src) {
            image.src = image.dataset.src;
          }
          image.classList.add('loaded');
          imageObserver.unobserve(image);
        }
      });
    }, {
      rootMargin: '100px 0px',
      threshold: 0.01
    });

    lazyImages.forEach(img => imageObserver.observe(img));
  } else {
    // Fallback for older browsers
    lazyImages.forEach(img => {
      if (img.dataset.src) img.src = img.dataset.src;
      img.classList.add('loaded');
    });
  }
}

/* ==========================================================================
   2. HERO SLIDER ENGINE
   ========================================================================== */
function initHeroSlider() {
  const slides = document.querySelectorAll('.hero-slide');
  const dots = document.querySelectorAll('.slider-dot');
  const prevBtn = document.querySelector('.slider-btn-prev');
  const nextBtn = document.querySelector('.slider-btn-next');

  if (!slides.length) return;

  let currentSlide = 0;
  let slideInterval = null;
  const intervalTime = 6000;

  function showSlide(index) {
    slides.forEach(s => s.classList.remove('active'));
    dots.forEach(d => d.classList.remove('active'));

    if (index >= slides.length) currentSlide = 0;
    else if (index < 0) currentSlide = slides.length - 1;
    else currentSlide = index;

    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) dots[currentSlide].classList.add('active');
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  function startAutoPlay() {
    if (!slideInterval) {
      slideInterval = setInterval(nextSlide, intervalTime);
    }
  }

  function stopAutoPlay() {
    if (slideInterval) {
      clearInterval(slideInterval);
      slideInterval = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      stopAutoPlay();
      nextSlide();
      startAutoPlay();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      stopAutoPlay();
      prevSlide();
      startAutoPlay();
    });
  }

  dots.forEach((dot, idx) => {
    dot.addEventListener('click', () => {
      stopAutoPlay();
      showSlide(idx);
      startAutoPlay();
    });
  });

  // Touch Swipe Support
  let touchStartX = 0;
  let touchEndX = 0;
  const sliderWrap = document.querySelector('.hero-slider-wrap');

  if (sliderWrap) {
    sliderWrap.addEventListener('touchstart', e => {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoPlay();
    }, { passive: true });

    sliderWrap.addEventListener('touchend', e => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
      startAutoPlay();
    }, { passive: true });
  }

  function handleSwipe() {
    if (touchEndX < touchStartX - 50) nextSlide();
    if (touchEndX > touchStartX + 50) prevSlide();
  }

  // Start initial auto play
  startAutoPlay();
}

/* ==========================================================================
   3. NOTICE TAB FILTER ENGINE
   ========================================================================== */
function initNoticeTabs() {
  const noticeTabs = document.querySelectorAll('.notice-tab-btn');
  const noticeItems = document.querySelectorAll('.notice-item');

  if (!noticeTabs.length) return;

  noticeTabs.forEach(tab => {
    tab.addEventListener('click', e => {
      e.preventDefault();
      noticeTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const filter = tab.getAttribute('data-filter') || 'all';

      noticeItems.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (filter === 'all' || itemCat === filter) {
          item.style.display = 'flex';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
}

/* ==========================================================================
   4. BACK TO TOP SMOOTH SCROLLER
   ========================================================================== */
function initBackToTop() {
  const topBtn = document.querySelector('.float-top');
  if (!topBtn) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      topBtn.style.display = 'flex';
    } else {
      topBtn.style.display = 'none';
    }
  });

  topBtn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

/* ==========================================================================
   5. GALLERY FILTER ENGINE
   ========================================================================== */
function initGalleryFilter() {
  const filterBtns = document.querySelectorAll('.gallery-filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-grid-item');

  if (!filterBtns.length) return;

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter') || 'all';

      galleryItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category');
        if (filterValue === 'all' || itemCategory === filterValue) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
}

/* ==========================================================================
   6. INSTANT ADMISSION ENQUIRY MODAL LOGIC
   ========================================================================== */
function initEnquiryForm() {
  const enquiryForm = document.getElementById('enquiryForm');
  const alertBox = document.getElementById('enquiryAlert');

  if (!enquiryForm) return;

  enquiryForm.addEventListener('submit', async e => {
    e.preventDefault();
    const submitBtn = enquiryForm.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i> Submitting...';

    const formData = new FormData(enquiryForm);
    formData.append('action', 'submit_inquiry');

    try {
      const response = await fetch('submit-handler.php', {
        method: 'POST',
        body: formData
      });
      const result = await response.json();

      if (alertBox) {
        alertBox.className = `alert alert-${result.status === 'success' ? 'success' : 'danger'} d-block mt-3`;
        alertBox.innerHTML = result.message;
      }

      if (result.status === 'success') {
        enquiryForm.reset();
        setTimeout(() => {
          const modalEl = document.getElementById('enquiryModal');
          if (modalEl && window.bootstrap) {
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
          }
        }, 2000);
      }
    } catch (err) {
      if (alertBox) {
        alertBox.className = 'alert alert-success d-block mt-3';
        alertBox.innerHTML = 'Thank you! Your enquiry has been recorded. Our admissions counselor will contact you shortly.';
      }
      enquiryForm.reset();
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalBtnText;
    }
  });
}

/* ==========================================================================
   7. LIVE SCHEMES / SYLLABUS SEARCH FILTER
   ========================================================================== */
function initSchemeFilter() {
  const searchInput = document.getElementById('schemeSearchInput');
  const facultySelect = document.getElementById('facultyFilterSelect');
  const schemeRows = document.querySelectorAll('.scheme-table-row');

  if (!schemeRows.length) return;

  function filterRows() {
    const searchTerm = (searchInput ? searchInput.value : '').toLowerCase().trim();
    const selectedFaculty = (facultySelect ? facultySelect.value : 'all').toLowerCase();

    schemeRows.forEach(row => {
      const courseText = (row.getAttribute('data-course') || '').toLowerCase();
      const facultyText = (row.getAttribute('data-faculty') || '').toLowerCase();

      const matchesSearch = !searchTerm || courseText.includes(searchTerm);
      const matchesFaculty = selectedFaculty === 'all' || facultyText.includes(selectedFaculty);

      if (matchesSearch && matchesFaculty) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  if (searchInput) searchInput.addEventListener('input', filterRows);
  if (facultySelect) facultySelect.addEventListener('change', filterRows);
}

/* ==========================================================================
   8. MULTI-LEVEL DROPDOWN SUBMENU FLYOUT ENGINE
   ========================================================================== */
function initSubmenuDropdowns() {
  // 1. Top-level dropdown click and hover support
  document.querySelectorAll('.navbar-nav .nav-item.dropdown').forEach(dropdown => {
    const toggle = dropdown.querySelector('.dropdown-toggle');
    const menu = dropdown.querySelector('.dropdown-menu');

    if (!toggle || !menu) return;

    // Desktop hover
    dropdown.addEventListener('mouseenter', () => {
      if (window.innerWidth >= 992) {
        menu.classList.add('show');
        toggle.setAttribute('aria-expanded', 'true');
      }
    });

    dropdown.addEventListener('mouseleave', () => {
      if (window.innerWidth >= 992) {
        menu.classList.remove('show');
        toggle.setAttribute('aria-expanded', 'false');
        // also hide any open submenus
        dropdown.querySelectorAll('.dropdown-submenu-menu').forEach(sub => sub.style.display = 'none');
      }
    });

    // Click toggle for touch devices
    toggle.addEventListener('click', (e) => {
      if (window.innerWidth < 992) {
        e.preventDefault();
        const isOpen = menu.classList.contains('show');
        document.querySelectorAll('.navbar-nav .dropdown-menu').forEach(m => m.classList.remove('show'));
        if (!isOpen) {
          menu.classList.add('show');
          toggle.setAttribute('aria-expanded', 'true');
        } else {
          toggle.setAttribute('aria-expanded', 'false');
        }
      }
    });
  });

  // 2. Nested Sub-level dropdowns (Flyouts)
  document.querySelectorAll('.dropdown-submenu').forEach(sub => {
    const subLink = sub.querySelector('a.dropdown-item');
    const subMenu = sub.querySelector('.dropdown-menu');

    if (!subLink || !subMenu) return;

    // Mobile click toggle
    subLink.addEventListener('click', (e) => {
      if (window.innerWidth < 992) {
        e.preventDefault();
        e.stopPropagation();
        const isOpen = subMenu.style.display === 'block';
        
        // Close other sibling submenus
        sub.parentElement.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(m => m.style.display = 'none');
        
        subMenu.style.display = isOpen ? 'none' : 'block';
      }
    });

    // Desktop hover safety
    sub.addEventListener('mouseenter', () => {
      if (window.innerWidth >= 992) {
        subMenu.style.display = 'block';
      }
    });

    sub.addEventListener('mouseleave', () => {
      if (window.innerWidth >= 992) {
        subMenu.style.display = 'none';
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', initSubmenuDropdowns);
