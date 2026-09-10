/**
 * SSSUTMS Modern Admin Panel - Responsive Interactions & Gestures
 * Supports Desktop, Laptop, Tablet, and Mobile touch screens
 */
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.querySelector('.admin-sidebar');
  if (!sidebar) return;

  // 1. Create backdrop overlay element if not present in DOM
  let backdrop = document.querySelector('.sidebar-backdrop');
  if (!backdrop) {
    backdrop = document.createElement('div');
    backdrop.className = 'sidebar-backdrop';
    document.body.appendChild(backdrop);
  }

  // 2. Hamburger menu toggle buttons
  const toggleBtns = document.querySelectorAll('.admin-sidebar-toggle');
  toggleBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      toggleSidebar();
    });
  });

  // 3. Close button inside sidebar header
  const closeBtns = document.querySelectorAll('.sidebar-close-btn');
  closeBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
      closeSidebar();
    });
  });

  // 4. Backdrop tap/click closes sidebar
  backdrop.addEventListener('click', closeSidebar);

  // 5. Close sidebar when clicking any navigation link on mobile
  const navLinks = sidebar.querySelectorAll('.admin-nav .nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', function() {
      if (window.innerWidth < 992) {
        closeSidebar();
      }
    });
  });

  // 6. Escape key closes sidebar
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && sidebar.classList.contains('show')) {
      closeSidebar();
    }
  });

  // 7. Auto close on window resize to desktop breakpoint (>= 992px)
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 992 && sidebar.classList.contains('show')) {
      closeSidebar();
    }
  });

  // 8. Mobile touch swipe gesture: swipe left on sidebar to close
  let touchStartX = 0;
  let touchStartY = 0;

  sidebar.addEventListener('touchstart', function(e) {
    touchStartX = e.changedTouches[0].screenX;
    touchStartY = e.changedTouches[0].screenY;
  }, { passive: true });

  sidebar.addEventListener('touchend', function(e) {
    const touchEndX = e.changedTouches[0].screenX;
    const touchEndY = e.changedTouches[0].screenY;
    const diffX = touchStartX - touchEndX;
    const diffY = Math.abs(touchStartY - touchEndY);

    // If swiped left by more than 50px and not primarily vertical scroll
    if (diffX > 50 && diffY < 100) {
      closeSidebar();
    }
  }, { passive: true });

  function openSidebar() {
    sidebar.classList.add('show');
    backdrop.classList.add('show');
    document.body.classList.add('sidebar-open');
  }

  function closeSidebar() {
    sidebar.classList.remove('show');
    backdrop.classList.remove('show');
    document.body.classList.remove('sidebar-open');
  }

  function toggleSidebar() {
    if (sidebar.classList.contains('show')) {
      closeSidebar();
    } else {
      openSidebar();
    }
  }

  // 9. Ensure smooth touch scrolling on tables
  const tables = document.querySelectorAll('.table-responsive');
  tables.forEach(t => {
    t.style.webkitOverflowScrolling = 'touch';
  });
});
