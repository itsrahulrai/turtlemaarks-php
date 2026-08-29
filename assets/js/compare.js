/**
 * TURTLE MAARKS — PRODUCT COMPARISON ENGINE
 * Compare up to 4 hearing aids across 15+ audiological specifications
 */

const Compare = {
  getList() {
    return JSON.parse(localStorage.getItem('turtle_compare') || '[]');
  },

  toggle(item) {
    let list = this.getList();
    const index = list.findIndex(i => i.id === item.id);

    if (index > -1) {
      list.splice(index, 1);
      showToast('Removed from Compare', `${item.name} removed from comparison list.`, 'info');
    } else {
      if (list.length >= 4) {
        showToast('Comparison Full', 'You can compare a maximum of 4 devices at once.', 'warning');
        return;
      }
      list.push(item);
      showToast('Added to Compare', `${item.name} added. Click compare icon to view matrix.`, 'success');
    }

    localStorage.setItem('turtle_compare', JSON.stringify(list));
    updateGlobalBadges();
    this.renderBar();
    this.renderPage();
  },

  renderBar() {
    let bar = document.getElementById('tmCompareFloatingBar');
    const list = this.getList();

    if (list.length === 0) {
      if (bar) bar.style.display = 'none';
      return;
    }

    if (!bar) {
      bar = document.createElement('div');
      bar.id = 'tmCompareFloatingBar';
      bar.className = 'position-fixed bottom-0 start-50 translate-middle-x bg-navy text-white p-3 rounded-top-4 shadow-lg d-flex align-items-center gap-3 z-3';
      bar.style.backgroundColor = '#0B1E36';
      bar.style.zIndex = '1030';
      document.body.appendChild(bar);
    }

    bar.style.display = 'flex';
    bar.innerHTML = `
      <div class="d-flex align-items-center gap-2">
        <span class="badge bg-orange px-2 py-1">${list.length} of 4</span>
        <span class="fw-semibold small">Hearing Aids Selected</span>
      </div>
      <div class="d-flex gap-2">
        ${list.map(i => `
          <div class="bg-white text-navy px-2 py-1 rounded small fw-bold d-flex align-items-center gap-1">
            ${i.name.split(' ').slice(0, 2).join(' ')}
            <i class="bi bi-x cursor-pointer" onclick="Compare.toggle({id: '${i.id}', name: '${i.name}'})"></i>
          </div>
        `).join('')}
      </div>
      <a href="compare.php" class="tm-btn tm-btn-primary tm-btn-sm text-nowrap">Compare Now <i class="bi bi-arrow-right"></i></a>
    `;
  },

  renderPage() {
    const tableWrap = document.getElementById('tmCompareTableWrap');
    if (!tableWrap) return;

    const list = this.getList();
    if (list.length === 0) {
      tableWrap.innerHTML = `
        <div class="text-center py-5">
          <i class="bi bi-arrow-left-right text-muted" style="font-size: 4rem;"></i>
          <h3 class="mt-3 fw-bold text-navy">No Hearing Aids Selected for Comparison</h3>
          <p class="text-secondary">Select up to 4 models from our catalog to compare audiological features, channels, battery type, and pricing.</p>
          <a href="products.php" class="tm-btn tm-btn-primary mt-3">Go to Products Catalog</a>
        </div>
      `;
      return;
    }

    tableWrap.innerHTML = `
      <div class="table-responsive bg-white rounded-4 border p-3 shadow-sm">
        <table class="table table-bordered align-middle text-center mb-0">
          <thead class="table-light">
            <tr>
              <th style="width: 220px;" class="text-start">Feature / Specification</th>
              ${list.map(i => `
                <th style="min-width: 220px;">
                  <div class="p-2">
                    <img src="${i.image || 'assets/images/hearing-aid/ric.webp'}" class="mb-2" style="height: 90px; object-fit: contain;">
                    <div class="text-teal small fw-bold text-uppercase">${i.brand || 'Phonak'}</div>
                    <h6 class="fw-bold text-navy mb-1">${i.name}</h6>
                    <div class="text-orange fw-bold">₹${Number(i.price || 0).toLocaleString('en-IN')}</div>
                    <button class="btn btn-outline-danger btn-sm mt-2" onclick="Compare.toggle({id: '${i.id}', name: '${i.name}'})">Remove</button>
                  </div>
                </th>
              `).join('')}
            </tr>
          </thead>
          <tbody>
            <tr><th class="text-start text-navy bg-light">Device Type / Style</th>${list.map(i => `<td>${i.style || 'RIC (Receiver-in-Canal)'}</td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Processing Channels</th>${list.map(i => `<td><strong>${i.channels || '24 Channels'}</strong></td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Battery Type</th>${list.map(i => `<td>${i.battery || 'Rechargeable Li-ion (30h)'}</td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Bluetooth Streaming</th>${list.map(i => `<td><i class="bi bi-check-circle-fill text-success fs-5"></i> iOS & Android Direct</td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Speech-in-Noise AI</th>${list.map(i => `<td>${i.aiNoise || 'SmartFocus AI Engine'}</td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Water Resistance</th>${list.map(i => `<td><span class="badge bg-info-subtle text-info border">IP68 Waterproof</span></td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Official Warranty</th>${list.map(i => `<td>4 Years Comprehensive</td>`).join('')}</tr>
            <tr><th class="text-start text-navy bg-light">Free Trial Available</th>${list.map(i => `<td><span class="badge bg-success-subtle text-success">Yes (7-Day Trial)</span></td>`).join('')}</tr>
            <tr>
              <th class="text-start text-navy bg-light">Action</th>
              ${list.map(i => `
                <td>
                  <button class="tm-btn tm-btn-primary tm-btn-sm w-100" onclick="Cart.addItem({id: '${i.id}', name: '${i.name}', brand: '${i.brand}', price: ${i.price || 150000}, image: '${i.image || 'assets/images/hearing-aid/ric.webp'}'})">
                    <i class="bi bi-cart-plus"></i> Buy Now
                  </button>
                </td>
              `).join('')}
            </tr>
          </tbody>
        </table>
      </div>
    `;
  }
};

document.addEventListener('DOMContentLoaded', () => {
  Compare.renderBar();
  Compare.renderPage();
});

