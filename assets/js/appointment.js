/**
 * TURTLE MAARKS — APPOINTMENT SCHEDULER & HOME 4-STEP BOOKING ENGINE
 * Supports both Homepage 4-Step Booking Wizard and Dedicated Scheduler Page
 */

// 1. HOMEPAGE 4-STEP APPOINTMENT BOOKING CONTROLLER
const HomeBookingWizard = {
  currentStep: 1,
  data: {
    service: 'Hearing Test',
    serviceDesc: 'PTA, Tympanometry & Sound-Booth Diagnostics',
    location: 'Clinic Visit (Gaur City, Greater Noida West)',
    locationType: 'clinic',
    audiologist: 'Any Available Senior Audiologist (Fastest Slot)',
    date: new Date().toISOString().split('T')[0],
    dateFormatted: new Date().toLocaleDateString('en-IN', { weekday: 'short', month: 'short', day: 'numeric' }),
    time: '10:00 AM - 11:00 AM',
    patientName: '',
    patientPhone: '',
    patientNotes: '',
    bookingId: ''
  },

  init() {
    this.generateDatePills();
    this.bindEvents();
    this.updateLiveSummary();
    this.updateStepUI();
  },

  bindEvents() {
    // Service Card Selection
    document.querySelectorAll('.tm-booking-service-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.tm-booking-service-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        this.data.service = card.getAttribute('data-service-title');
        this.data.serviceDesc = card.getAttribute('data-service-desc') || '';
        this.updateLiveSummary();
      });
    });

    // Location Card Selection
    document.querySelectorAll('.tm-booking-location-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.tm-booking-location-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        this.data.location = card.getAttribute('data-location-title');
        this.data.locationType = card.getAttribute('data-location-type') || 'clinic';
        this.updateLiveSummary();
      });
    });

    // Audiologist Card Selection
    document.querySelectorAll('.tm-booking-doctor-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.tm-booking-doctor-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        this.data.audiologist = card.getAttribute('data-doctor-name');
        this.updateLiveSummary();
      });
    });

    // Time Slot Buttons
    document.querySelectorAll('.tm-booking-time-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.tm-booking-time-btn').forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        this.data.time = btn.getAttribute('data-time-slot');
        this.updateLiveSummary();
      });
    });
  },

  generateDatePills() {
    const container = document.getElementById('tmHomeBookingDateStrip');
    if (!container) return;

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    const today = new Date();
    let html = '';

    for (let i = 0; i < 7; i++) {
      const d = new Date();
      d.setDate(today.getDate() + i);
      const isToday = i === 0;
      const isTomorrow = i === 1;
      const dayName = isToday ? 'Today' : (isTomorrow ? 'Tomorrow' : days[d.getDay()]);
      const dateNum = d.getDate();
      const monthName = months[d.getMonth()];
      const isoDate = d.toISOString().split('T')[0];
      const formattedLabel = `${dayName}, ${monthName} ${dateNum}`;

      html += `
        <div class="tm-date-pill-card ${i === 0 ? 'selected' : ''}" 
             data-date="${isoDate}" 
             data-date-formatted="${formattedLabel}"
             onclick="HomeBookingWizard.selectDate('${isoDate}', '${formattedLabel}', this)">
          <span class="small d-block text-muted">${dayName}</span>
          <div class="fs-5 fw-bold my-1">${dateNum}</div>
          <span class="small d-block fw-semibold text-muted">${monthName}</span>
        </div>
      `;
    }

    container.innerHTML = html;
  },

  selectDate(isoDate, formattedLabel, el) {
    document.querySelectorAll('.tm-date-pill-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
    this.data.date = isoDate;
    this.data.dateFormatted = formattedLabel;
    this.updateLiveSummary();
  },

  goToStep(step) {
    if (step < 1 || step > 4) return;

    // If attempting to proceed past step 4 (submission)
    if (step === 4 && this.currentStep === 4) {
      this.confirmAppointment();
      return;
    }

    this.currentStep = step;
    this.updateStepUI();
  },

  nextStep() {
    this.goToStep(this.currentStep + 1);
  },

  prevStep() {
    this.goToStep(Math.max(1, this.currentStep - 1));
  },

  updateStepUI() {
    // Show active step pane
    for (let i = 1; i <= 4; i++) {
      const pane = document.getElementById(`tmBookingStepPane${i}`);
      if (pane) {
        pane.style.display = (i === this.currentStep) ? 'block' : 'none';
      }
    }

    // Update stepper tabs
    document.querySelectorAll('.tm-booking-step-tab').forEach((tab, idx) => {
      const stepNum = idx + 1;
      tab.classList.remove('active', 'completed');
      if (stepNum === this.currentStep) {
        tab.classList.add('active');
      } else if (stepNum < this.currentStep) {
        tab.classList.add('completed');
      }
    });

    this.updateLiveSummary();
  },

  updateLiveSummary() {
    const srvEl = document.getElementById('tmLiveSummaryService');
    const locEl = document.getElementById('tmLiveSummaryLocation');
    const docEl = document.getElementById('tmLiveSummaryDoctor');
    const dtEl = document.getElementById('tmLiveSummaryDateTime');

    if (srvEl) srvEl.textContent = this.data.service;
    if (locEl) locEl.textContent = this.data.location;
    if (docEl) docEl.textContent = this.data.audiologist;
    if (dtEl) dtEl.textContent = `${this.data.dateFormatted} • ${this.data.time}`;
  },

  confirmAppointment() {
    const nameInput = document.getElementById('tmHomePatientName');
    const phoneInput = document.getElementById('tmHomePatientPhone');
    const notesInput = document.getElementById('tmHomePatientNotes');

    const patientName = nameInput ? nameInput.value.trim() : '';
    const patientPhone = phoneInput ? phoneInput.value.trim() : '';
    const patientNotes = notesInput ? notesInput.value.trim() : '';

    if (!patientName) {
      if (typeof showToast === 'function') {
        showToast('Name Required', 'Please enter the patient full name.', 'warning');
      } else {
        alert('Please enter the patient full name.');
      }
      if (nameInput) nameInput.focus();
      return;
    }

    if (!patientPhone || patientPhone.length < 10) {
      if (typeof showToast === 'function') {
        showToast('Valid Mobile Number Required', 'Please enter a valid 10-digit mobile number for appointment SMS confirmation.', 'warning');
      } else {
        alert('Please enter a valid mobile number.');
      }
      if (phoneInput) phoneInput.focus();
      return;
    }

    this.data.patientName = patientName;
    this.data.patientPhone = patientPhone;
    this.data.patientNotes = patientNotes;
    this.data.bookingId = 'TM-APT-' + Math.floor(100000 + Math.random() * 900000);

    // Save to localStorage history
    const pastAppts = JSON.parse(localStorage.getItem('turtle_appointments') || '[]');
    pastAppts.unshift({
      ...this.data,
      bookedAt: new Date().toLocaleDateString('en-IN'),
      status: 'Confirmed'
    });
    localStorage.setItem('turtle_appointments', JSON.stringify(pastAppts));

    // Populate confirmation modal elements
    const refEl = document.getElementById('tmModalBookingRef');
    const nameEl = document.getElementById('tmModalPatientName');
    const srvModalEl = document.getElementById('tmModalService');
    const locModalEl = document.getElementById('tmModalLocation');
    const docModalEl = document.getElementById('tmModalDoctor');
    const timeModalEl = document.getElementById('tmModalDateTime');

    if (refEl) refEl.textContent = this.data.bookingId;
    if (nameEl) nameEl.textContent = this.data.patientName;
    if (srvModalEl) srvModalEl.textContent = this.data.service;
    if (locModalEl) locModalEl.textContent = this.data.location;
    if (docModalEl) docModalEl.textContent = this.data.audiologist;
    if (timeModalEl) timeModalEl.textContent = `${this.data.dateFormatted} at ${this.data.time}`;

    // WhatsApp share link
    const waBtn = document.getElementById('tmModalWhatsAppShareBtn');
    if (waBtn) {
      const waMsg = encodeURIComponent(`Hello Turtle Maarks, I have booked an appointment.\nBooking ID: ${this.data.bookingId}\nPatient: ${this.data.patientName}\nService: ${this.data.service}\nLocation: ${this.data.location}\nAudiologist: ${this.data.audiologist}\nDate/Time: ${this.data.dateFormatted} at ${this.data.time}`);
      waBtn.href = `https://wa.me/918130495476?text=${waMsg}`;
    }

    // Open Bootstrap Modal
    const modalEl = document.getElementById('tmAppointmentSuccessModal');
    if (modalEl && typeof bootstrap !== 'undefined') {
      const bsModal = new bootstrap.Modal(modalEl);
      bsModal.show();
    }

    if (typeof showToast === 'function') {
      showToast('Appointment Confirmed!', `Slot booked with ID ${this.data.bookingId}. Doctor helpline: +91 8130495476`, 'success');
    }

    // Reset fields
    if (nameInput) nameInput.value = '';
    if (phoneInput) phoneInput.value = '';
    if (notesInput) notesInput.value = '';
    this.goToStep(1);
  }
};

// 2. DEDICATED APPOINTMENT PAGE CONTROLLER (book-appointment.php fallback)
const AppointmentWizard = {
  currentStep: 1,
  data: {
    serviceName: 'Hearing Test & Comprehensive Evaluation',
    servicePrice: 1200,
    serviceDuration: '45 Mins',
    date: new Date().toISOString().split('T')[0],
    timeSlot: '10:00 AM - 10:45 AM',
    mode: 'Clinic Visit (Gaur City, Greater Noida West)',
    patientName: '',
    patientPhone: '',
    patientEmail: '',
    patientAge: '',
    notes: '',
    bookingId: ''
  },

  init() {
    this.bindEvents();
    this.updateStepUI();
    this.generateCalendarDays();
  },

  bindEvents() {
    document.querySelectorAll('.tm-service-radio-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.tm-service-radio-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        this.data.serviceName = card.getAttribute('data-service-name');
        this.data.servicePrice = Number(card.getAttribute('data-service-price') || 0);
        this.data.serviceDuration = card.getAttribute('data-service-duration') || '30 Mins';
        this.updateSummaryPreview();
      });
    });

    document.querySelectorAll('.tm-slot-chip').forEach(chip => {
      chip.addEventListener('click', () => {
        if (chip.classList.contains('disabled')) return;
        document.querySelectorAll('.tm-slot-chip').forEach(c => c.classList.remove('selected'));
        chip.classList.add('selected');
        this.data.timeSlot = chip.getAttribute('data-slot');
        this.updateSummaryPreview();
      });
    });
  },

  generateCalendarDays() {
    const calendarContainer = document.getElementById('tmDateCalendarGrid');
    if (!calendarContainer) return;

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const today = new Date();
    let html = '';

    for (let i = 0; i < 14; i++) {
      const d = new Date();
      d.setDate(today.getDate() + i);
      const isSunday = d.getDay() === 0;
      const dateStr = d.toISOString().split('T')[0];
      const dayName = days[d.getDay()];
      const dayNum = d.getDate();
      const monthName = d.toLocaleString('default', { month: 'short' });

      html += `
        <div class="col">
          <div class="card p-2 text-center border cursor-pointer tm-date-card ${i === 0 ? 'border-primary bg-primary text-white' : (isSunday ? 'opacity-50' : 'bg-light')}" 
               data-date="${dateStr}" 
               onclick="AppointmentWizard.selectDate('${dateStr}', this)">
            <span class="small ${i === 0 ? 'text-white-50' : 'text-muted'}">${dayName}</span>
            <div class="fs-4 fw-bold my-1">${dayNum}</div>
            <span class="small fw-semibold">${monthName}</span>
          </div>
        </div>
      `;
    }

    calendarContainer.innerHTML = html;
  },

  selectDate(dateStr, el) {
    document.querySelectorAll('.tm-date-card').forEach(c => {
      c.classList.remove('border-primary', 'bg-primary', 'text-white');
      c.classList.add('bg-light');
    });
    el.classList.remove('bg-light');
    el.classList.add('border-primary', 'bg-primary', 'text-white');
    this.data.date = dateStr;
    this.updateSummaryPreview();
  },

  goToStep(step) {
    this.currentStep = step;
    this.updateStepUI();
  },

  nextStep() {
    this.goToStep(this.currentStep + 1);
  },

  prevStep() {
    this.goToStep(Math.max(1, this.currentStep - 1));
  },

  updateStepUI() {
    document.querySelectorAll('.tm-wizard-step-pane').forEach((pane, idx) => {
      pane.style.display = (idx + 1 === this.currentStep) ? 'block' : 'none';
    });

    document.querySelectorAll('.tm-wizard-step-item').forEach((item, idx) => {
      const stepNum = idx + 1;
      item.classList.remove('active', 'completed');
      if (stepNum === this.currentStep) {
        item.classList.add('active');
      } else if (stepNum < this.currentStep) {
        item.classList.add('completed');
      }
    });

    this.updateSummaryPreview();
  },

  updateSummaryPreview() {
    const sName = document.getElementById('tmSummaryServiceName');
    const sPrice = document.getElementById('tmSummaryServicePrice');
    const sDate = document.getElementById('tmSummaryDate');
    const sTime = document.getElementById('tmSummaryTime');
    const sMode = document.getElementById('tmSummaryMode');

    if (sName) sName.textContent = this.data.serviceName;
    if (sPrice) sPrice.textContent = this.data.servicePrice === 0 ? 'FREE' : `₹${this.data.servicePrice.toLocaleString('en-IN')}`;
    if (sDate) sDate.textContent = this.data.date;
    if (sTime) sTime.textContent = this.data.timeSlot;
    if (sMode) sMode.textContent = this.data.mode;
  }
};

// Initialize controllers on DOM ready
if (typeof document !== 'undefined') {
  document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('tmHomeBookingDateStrip')) {
      HomeBookingWizard.init();
    }
    if (document.getElementById('tmDateCalendarGrid')) {
      AppointmentWizard.init();
    }
  });
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = { HomeBookingWizard, AppointmentWizard };
}
