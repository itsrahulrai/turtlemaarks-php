/**
 * TURTLE MAARKS — CORE FRONTEND CONTROLLER
 * Vanilla JavaScript & Bootstrap 5 Interaction Engine
 */

document.addEventListener('DOMContentLoaded', () => {
  initStickyHeader();
  initSearchAutocomplete();
  initGlobalTooltips();
  updateGlobalBadges();
});

// 1. STICKY HEADER & SCROLL BEHAVIOR
function initStickyHeader() {
  const header = document.querySelector('.tm-header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
}

// 2. TOAST NOTIFICATION SYSTEM
function showToast(title, message, type = 'success') {
  let container = document.querySelector('.tm-toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'tm-toast-container';
    document.body.appendChild(container);
  }

  const icons = {
    success: 'bi-check-circle-fill text-success',
    info: 'bi-info-circle-fill text-primary',
    warning: 'bi-exclamation-triangle-fill text-warning',
    danger: 'bi-x-circle-fill text-danger'
  };

  const toast = document.createElement('div');
  toast.className = 'tm-toast';
  toast.innerHTML = `
    <i class="bi ${icons[type] || icons.info} fs-4"></i>
    <div class="flex-grow-1">
      <div class="fw-bold fs-6">${title}</div>
      <div class="text-secondary small">${message}</div>
    </div>
    <button type="button" class="btn-close btn-close-sm" aria-label="Close"></button>
  `;

  toast.querySelector('.btn-close').addEventListener('click', () => {
    toast.remove();
  });

  container.appendChild(toast);

  setTimeout(() => {
    if (toast.parentNode) {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(40px)';
      toast.style.transition = 'all 0.3s ease';
      setTimeout(() => toast.remove(), 300);
    }
  }, 4000);
}

// 3. SEARCH AUTOCOMPLETE & MODAL
function initSearchAutocomplete() {
  const searchInput = document.getElementById('tmGlobalSearchInput');
  const resultsContainer = document.getElementById('tmSearchResultsContainer');
  if (!searchInput || !resultsContainer) return;

  const mockDatabase = [
    { title: 'Phonak Audéo Infinio Ultra 90', type: 'Hearing Aid', price: '₹2,85,000', link: 'product-detail.php' },
    { title: 'Oticon Real 1 Mini RITE', type: 'Hearing Aid', price: '₹3,75,000', link: 'product-detail.php' },
    { title: 'ReSound Vivia 9 MicroRIE', type: 'Hearing Aid', price: '₹4,24,995', link: 'product-detail.php' },
    { title: 'Unitron Moxi S-R Rechargeable', type: 'Hearing Aid', price: '₹2,12,000', link: 'product-detail.php' },
    { title: 'PTA (Pure Tone Audiometry)', type: 'Diagnostic Test', price: '₹1,200', link: 'diagnostic-services.php' },
    { title: 'BERA (Brainstem Evoked Response)', type: 'Diagnostic Test', price: '₹3,500', link: 'diagnostic-services.php' },
    { title: 'Tympanometry (Tymp)', type: 'Diagnostic Test', price: '₹800', link: 'diagnostic-services.php' },
    { title: 'OAE (Otoacoustic Emission)', type: 'Diagnostic Test', price: '₹1,500', link: 'diagnostic-services.php' },
    { title: 'Hearing Aid Batteries (Size 312)', type: 'Accessory', price: '₹350', link: 'products.php' },
    { title: 'Hearing Aid Repair & Servicing', type: 'Service', price: '₹1,500', link: 'repair.php' }
  ];

  searchInput.addEventListener('input', (e) => {
    const query = e.target.value.trim().toLowerCase();
    if (query.length < 2) {
      resultsContainer.innerHTML = '<div class="p-3 text-muted text-center small">Type at least 2 characters to search...</div>';
      return;
    }

    const matches = mockDatabase.filter(item => 
      item.title.toLowerCase().includes(query) || 
      item.type.toLowerCase().includes(query)
    );

    if (matches.length === 0) {
      resultsContainer.innerHTML = `<div class="p-4 text-center text-muted">No matching products or diagnostic services found for "<strong>${query}</strong>"</div>`;
      return;
    }

    resultsContainer.innerHTML = `
      <div class="list-group list-group-flush">
        ${matches.map(item => `
          <a href="${item.link}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2 px-3">
            <div>
              <div class="fw-semibold text-navy">${item.title}</div>
              <span class="badge bg-light text-muted border">${item.type}</span>
            </div>
            <div class="fw-bold text-orange">${item.price}</div>
          </a>
        `).join('')}
      </div>
    `;
  });
}

// 4. GLOBAL BADGES (CART, WISHLIST, COMPARE)
function updateGlobalBadges() {
  const cart = JSON.parse(localStorage.getItem('turtle_cart') || '[]');
  const wishlist = JSON.parse(localStorage.getItem('turtle_wishlist') || '[]');

  const cartBadges = document.querySelectorAll('.tm-cart-badge-count');
  const wishlistBadges = document.querySelectorAll('.tm-wishlist-badge-count');

  const totalCartQty = cart.reduce((sum, item) => sum + (item.qty || 1), 0);

  cartBadges.forEach(b => {
    b.textContent = totalCartQty;
    b.style.display = totalCartQty > 0 ? 'inline-block' : 'none';
  });

  wishlistBadges.forEach(b => {
    b.textContent = wishlist.length;
    b.style.display = wishlist.length > 0 ? 'inline-block' : 'none';
  });
}

// 5. TOOLTIPS
function initGlobalTooltips() {
  if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
  }
}

// 6. OFFICIAL YOUTUBE PATIENT STORIES DATABASE & MODAL CONTROLLER
const YOUTUBE_PATIENT_VIDEOS = {
  'vrF2ciqFfrg': {
    id: 'vrF2ciqFfrg',
    title: 'Wg Cdr SK Bhatia Shaurya Chakra — Hearing Transformation',
    badge: 'Patient Testimonial',
    tagline: 'Clear Speech & Natural Sound Restored for Veteran',
    speaker: 'Wg Cdr S.K. Bhatia (Shaurya Chakra)',
    location: 'Noida Clinic',
    desc: 'Watch Wing Commander S.K. Bhatia (Shaurya Chakra) share his inspiring journey of digital hearing restoration with Turtle Maarks Hearing Health.',
    model: 'Digital High-Precision Hearing Aid'
  },
  'juOmFzxFBMg': {
    id: 'juOmFzxFBMg',
    title: 'Better Hearing for Better Social Life',
    badge: 'Life Transformation',
    tagline: 'Reconnecting with Family, Friends & Active Social Conversations',
    speaker: 'Patient Consultation & Journey',
    location: 'Greater Noida West',
    desc: 'How advanced digital speech clarity eliminates social isolation and brings confidence back to family gatherings and social outings.',
    model: 'Oticon Real / Phonak Infinio'
  },
  'vkNae-Vqu0U': {
    id: 'vkNae-Vqu0U',
    title: 'Do you feel People have started speaking with slow voice?',
    badge: 'Doctor Consultation',
    tagline: 'Recognizing Early Hearing Loss & Frequency Drop',
    speaker: 'Audiology Clinical Team',
    location: 'Gaur City 2 Clinic',
    desc: 'Clinical explanation on why voices start sounding muffled or low, and how timely Pure Tone Audiometry (PTA) testing prevents irreversible hearing loss.',
    model: 'Comprehensive Audiology Diagnostic'
  },
  'gL8awpcAedw': {
    id: 'gL8awpcAedw',
    title: '1 Out of 5 People in India Has Hearing Loss',
    badge: 'Audiologist Guide',
    tagline: 'Modern Digital Technology & Early Intervention in India',
    speaker: 'Turtle Maarks Hearing Health Team',
    location: 'Greater Noida West & Noida',
    desc: 'Important statistics and medical insights on hearing health in India, highlighting invisible hearing aids, AI noise reduction, and free home trials.',
    model: 'Signia Silk 7IX & Widex PureSound'
  },
  '4yAlwfAl_i8': {
    id: '4yAlwfAl_i8',
    title: 'Tere Kaano Ki Awaaz | Official Theme Song',
    badge: 'Official Anthem',
    tagline: 'Celebrating the Joy and Beauty of Clear Sound',
    speaker: 'Turtle Maarks Hearing Health',
    location: 'Official Studio Release',
    desc: 'The official brand anthem celebrating the joy of listening and restoring sound to every life.',
    model: 'Turtle Maarks Hearing Health'
  },
  'aH7jAW4jz58': {
    id: 'aH7jAW4jz58',
    title: 'Gratification Ceremony @TurtleMaarksHearingHealth',
    badge: 'Celebration Event',
    tagline: 'Recognizing Excellence in Patient Hearing Restoration',
    speaker: 'Audiology Team & Patients',
    location: 'Turtle Maarks Clinic',
    desc: 'Special gratification and patient care celebration ceremony at Turtle Maarks Hearing Health.',
    model: 'Excellence in Hearing Care'
  }
};

function openYouTubePatientVideo(videoId) {
  const video = YOUTUBE_PATIENT_VIDEOS[videoId] || YOUTUBE_PATIENT_VIDEOS['vrF2ciqFfrg'];
  
  let modalEl = document.getElementById('tmYouTubeModal');
  if (!modalEl) {
    console.error('YouTube modal not found in DOM');
    return;
  }

  // Populate modal data
  const iframe = document.getElementById('tmYouTubeIframe');
  const titleEl = document.getElementById('tmYouTubeTitle');
  const badgeEl = document.getElementById('tmYouTubeBadge');
  const speakerEl = document.getElementById('tmYouTubeSpeaker');
  const descEl = document.getElementById('tmYouTubeDesc');
  const waBtn = document.getElementById('tmYouTubeWaBtn');

  if (iframe) {
    iframe.src = `https://www.youtube.com/embed/${video.id}?autoplay=1&rel=0&modestbranding=1`;
  }
  if (titleEl) titleEl.textContent = video.title;
  if (badgeEl) badgeEl.textContent = video.badge;
  if (speakerEl) speakerEl.innerHTML = `<i class="bi bi-person-check-fill text-success me-1"></i> ${video.speaker} • <span class="text-muted">${video.location}</span>`;
  if (descEl) descEl.textContent = video.desc;

  if (waBtn) {
    const waText = encodeURIComponent(`Hi Turtle Maarks, I watched your video "${video.title}" and would like to book a 7-day free trial / consultation.`);
    waBtn.href = `https://wa.me/918130495476?text=${waText}`;
  }

  // Show Bootstrap modal
  if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
    const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
    bsModal.show();
  }
}

// Stop YouTube video playback when modal is closed
document.addEventListener('DOMContentLoaded', () => {
  const modalEl = document.getElementById('tmYouTubeModal');
  if (modalEl) {
    modalEl.addEventListener('hidden.bs.modal', () => {
      const iframe = document.getElementById('tmYouTubeIframe');
      if (iframe) {
        iframe.src = '';
      }
    });
  }

  // Initialize dynamic clinic open/closed status in footer
  updateFooterClinicStatus();
});

// 4. FOOTER E-COMMERCE INTERACTIONS
function handleNewsletterSubmit(e) {
  e.preventDefault();
  const input = document.getElementById('tmNewsletterEmail');
  if (!input) return false;

  const email = input.value.trim();
  if (!email || !email.includes('@')) {
    if (typeof showToast === 'function') {
      showToast('Invalid Email', 'Please enter a valid email address.', 'warning');
    }
    return false;
  }

  // Simulate successful subscription with persistent feedback
  if (typeof showToast === 'function') {
    showToast('Subscribed Successfully!', 'Thank you for joining Turtle Maarks VIP Hearing Club! Welcome perks and hearing health guides are on their way.', 'success');
  }

  input.value = '';
  return false;
}

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

function updateFooterClinicStatus() {
  const statusBadge = document.querySelector('.tm-footer-clinic-card .badge');
  if (!statusBadge) return;

  const now = new Date();
  const day = now.getDay(); // 0 is Sunday, 1-6 is Mon-Sat
  const hours = now.getHours();
  const minutes = now.getMinutes();
  const currentTime = hours * 60 + minutes;

  // Mon-Sat: 10:00 AM (600 mins) to 7:30 PM (1170 mins)
  const openTime = 10 * 60;
  const closeTime = 19 * 60 + 30;

  if (day === 0) {
    statusBadge.innerHTML = '<i class="bi bi-calendar-event me-1"></i> Sunday: Appt Only';
    statusBadge.className = 'badge bg-warning-subtle text-warning border border-warning-subtle d-inline-flex align-items-center gap-1 small py-1 px-2';
  } else if (currentTime >= openTime && currentTime < closeTime) {
    statusBadge.innerHTML = '<span class="tm-pulse-dot"></span> Open Today • Closes 7:30 PM';
    statusBadge.className = 'badge bg-success-subtle text-success border border-success-subtle d-inline-flex align-items-center gap-1 small py-1 px-2';
  } else {
    statusBadge.innerHTML = '<i class="bi bi-clock-history me-1"></i> Opens 10:00 AM';
    statusBadge.className = 'badge bg-secondary-subtle text-secondary border border-secondary-subtle d-inline-flex align-items-center gap-1 small py-1 px-2';
  }
}



