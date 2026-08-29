/**
 * TURTLE MAARKS — CART & CHECKOUT ENGINE
 * Offcanvas Drawer + Full Cart Page + Promo Discount Calculation
 */

const Cart = {
  getCart() {
    return JSON.parse(localStorage.getItem('turtle_cart') || '[]');
  },

  saveCart(cart) {
    localStorage.setItem('turtle_cart', JSON.stringify(cart));
    updateGlobalBadges();
    this.renderDrawer();
    this.renderCartPage();
  },

  addItem(item) {
    let cart = this.getCart();
    const existingIndex = cart.findIndex(i => i.id === item.id);

    if (existingIndex > -1) {
      cart[existingIndex].qty += (item.qty || 1);
    } else {
      cart.push({
        id: item.id,
        name: item.name,
        brand: item.brand || 'Turtle Maarks',
        price: Number(item.price),
        mrp: Number(item.mrp || item.price * 1.2),
        image: item.image || 'assets/images/hearing-aid/ric.webp',
        type: item.type || 'Product',
        qty: item.qty || 1
      });
    }

    this.saveCart(cart);
    showToast('Added to Cart', `${item.name} has been added to your shopping cart.`, 'success');

    // Open cart drawer
    const drawerEl = document.getElementById('tmCartDrawer');
    if (drawerEl && typeof bootstrap !== 'undefined') {
      const bsOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(drawerEl);
      bsOffcanvas.show();
    }
  },

  removeItem(id) {
    let cart = this.getCart();
    cart = cart.filter(i => i.id !== id);
    this.saveCart(cart);
    showToast('Item Removed', 'Item has been removed from your cart.', 'info');
  },

  updateQty(id, delta) {
    let cart = this.getCart();
    const item = cart.find(i => i.id === id);
    if (!item) return;

    item.qty += delta;
    if (item.qty <= 0) {
      this.removeItem(id);
      return;
    }

    this.saveCart(cart);
  },

  calculateTotals() {
    const cart = this.getCart();
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
    const mrpTotal = cart.reduce((sum, item) => sum + ((item.mrp || item.price) * item.qty), 0);
    
    // Check coupon discount
    const couponCode = (localStorage.getItem('turtle_coupon') || '').toUpperCase();
    let discount = 0;
    if (couponCode === 'HEAR20') {
      discount = Math.round(subtotal * 0.20);
    } else if (couponCode === 'WELCOME10') {
      discount = Math.round(subtotal * 0.10);
    }

    const delivery = (subtotal > 2000 || subtotal === 0) ? 0 : 150;
    const gst = Math.round((subtotal - discount) * 0.18);
    const grandTotal = Math.max(0, subtotal - discount + delivery);

    return {
      subtotal,
      mrpTotal,
      savings: (mrpTotal - subtotal) + discount,
      discount,
      delivery,
      gst,
      grandTotal,
      couponCode
    };
  },

  renderDrawer() {
    const container = document.getElementById('tmCartDrawerItems');
    const subtotalEl = document.getElementById('tmCartDrawerSubtotal');
    const grandTotalEl = document.getElementById('tmCartDrawerGrandTotal');
    const countEl = document.getElementById('tmCartDrawerCount');
    if (!container) return;

    const cart = this.getCart();
    const totals = this.calculateTotals();

    if (countEl) countEl.textContent = cart.reduce((s, i) => s + i.qty, 0);

    if (cart.length === 0) {
      container.innerHTML = `
        <div class="text-center py-5">
          <div class="mb-3">
            <i class="bi bi-cart-x text-muted" style="font-size: 3.5rem;"></i>
          </div>
          <h6 class="fw-bold text-navy mb-1">Your Shopping Cart is Empty</h6>
          <p class="text-secondary small mb-3">Add hearing devices, test packages, or batteries to start.</p>
          <a href="products.php" class="tm-btn tm-btn-primary tm-btn-sm">Browse Products</a>
        </div>
      `;
      if (subtotalEl) subtotalEl.textContent = '₹0';
      if (grandTotalEl) grandTotalEl.textContent = '₹0';
      return;
    }

    container.innerHTML = `
      <div class="tm-cart-free-shipping-box py-2 px-3 mb-3">
        <div class="d-flex align-items-center justify-content-between">
          <span class="small fw-bold text-success"><i class="bi bi-check-circle-fill me-1"></i> Free Doctor Home Fitting</span>
          <span class="badge bg-success-subtle text-success py-1">UNLOCKED</span>
        </div>
      </div>
      ${cart.map(item => `
        <div class="tm-cart-item">
          <img src="${item.image}" alt="${item.name}" class="tm-cart-item-img">
          <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start mb-1">
              <div>
                <span class="badge bg-light text-muted small border mb-1" style="font-size: 0.6875rem;">${item.brand}</span>
                <h6 class="fw-bold text-navy mb-0" style="font-size: 0.875rem; line-height: 1.3;">${item.name}</h6>
              </div>
              <button class="btn btn-link text-danger p-0 ms-2" onclick="Cart.removeItem('${item.id}')" title="Remove">
                <i class="bi bi-trash3"></i>
              </button>
            </div>
            <div class="text-muted small mb-2" style="font-size: 0.75rem;">₹${item.price.toLocaleString('en-IN')} / unit</div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="tm-qty-stepper">
                <button class="tm-qty-btn" onclick="Cart.updateQty('${item.id}', -1)">-</button>
                <input type="text" class="tm-qty-input" value="${item.qty}" readonly>
                <button class="tm-qty-btn" onclick="Cart.updateQty('${item.id}', 1)">+</button>
              </div>
              <div class="fw-bold text-navy fs-6">₹${(item.price * item.qty).toLocaleString('en-IN')}</div>
            </div>
          </div>
        </div>
      `).join('')}
    `;

    if (subtotalEl) subtotalEl.textContent = `₹${totals.subtotal.toLocaleString('en-IN')}`;
    if (grandTotalEl) grandTotalEl.textContent = `₹${totals.grandTotal.toLocaleString('en-IN')}`;
  },

  renderCartPage() {
    const pageTable = document.getElementById('tmCartPageTableBody');
    if (!pageTable) return;

    const cart = this.getCart();
    const totals = this.calculateTotals();

    if (cart.length === 0) {
      document.getElementById('tmCartPageWrap').innerHTML = `
        <div class="text-center py-5 bg-white rounded-3 border p-5 shadow-xs">
          <i class="bi bi-cart-x text-muted" style="font-size: 4rem;"></i>
          <h3 class="mt-3 fw-bold text-navy">Your Shopping Cart is Empty</h3>
          <p class="text-secondary mb-4">You have not added any hearing health devices or diagnostic appointments yet.</p>
          <div class="d-flex justify-content-center gap-3">
            <a href="products.php" class="tm-btn tm-btn-primary"><i class="bi bi-bag"></i> Shop Hearing Aids</a>
            <a href="diagnostic-services.php" class="tm-btn tm-btn-outline-navy"><i class="bi bi-heart-pulse"></i> Diagnostic Tests</a>
          </div>
        </div>
      `;
      return;
    }

    pageTable.innerHTML = cart.map(item => `
      <tr>
        <td class="py-3">
          <div class="d-flex align-items-center gap-3">
            <img src="${item.image}" alt="${item.name}" class="rounded border p-1 bg-light flex-shrink-0" style="width: 75px; height: 75px; object-fit: contain;">
            <div>
              <span class="badge bg-light text-muted small border mb-1">${item.brand}</span>
              <h6 class="fw-bold text-navy mb-1" style="font-size: 0.95rem;">${item.name}</h6>
              <div class="d-flex flex-wrap gap-2 align-items-center">
                <span class="text-muted small">${item.type}</span>
                <span class="text-muted small">•</span>
                <span class="text-success small fw-semibold"><i class="bi bi-patch-check-fill me-1"></i> Lifetime Doctor Tuning</span>
              </div>
            </div>
          </div>
        </td>
        <td class="py-3 align-middle fw-semibold text-secondary">₹${item.price.toLocaleString('en-IN')}</td>
        <td class="py-3 align-middle">
          <div class="tm-qty-stepper">
            <button class="tm-qty-btn" onclick="Cart.updateQty('${item.id}', -1)">-</button>
            <input type="text" class="tm-qty-input" value="${item.qty}" readonly>
            <button class="tm-qty-btn" onclick="Cart.updateQty('${item.id}', 1)">+</button>
          </div>
        </td>
        <td class="py-3 align-middle fw-bold text-navy fs-6">₹${(item.price * item.qty).toLocaleString('en-IN')}</td>
        <td class="py-3 align-middle text-end">
          <button class="btn btn-outline-danger btn-sm" onclick="Cart.removeItem('${item.id}')" title="Remove Item" style="border-radius: 6px;">
            <i class="bi bi-trash3"></i>
          </button>
        </td>
      </tr>
    `).join('');

    // Summary elements
    const subtotalEl = document.getElementById('tmCartSummarySubtotal');
    const discountEl = document.getElementById('tmCartSummaryDiscount');
    const grandTotalEl = document.getElementById('tmCartSummaryGrandTotal');

    if (subtotalEl) subtotalEl.textContent = `₹${totals.subtotal.toLocaleString('en-IN')}`;
    if (discountEl) discountEl.textContent = totals.discount > 0 ? `-₹${totals.discount.toLocaleString('en-IN')}` : '₹0';
    if (grandTotalEl) grandTotalEl.textContent = `₹${totals.grandTotal.toLocaleString('en-IN')}`;
  },

  applyCoupon(code) {
    const clean = code.trim().toUpperCase();
    if (clean === 'HEAR20') {
      localStorage.setItem('turtle_coupon', clean);
      this.saveCart(this.getCart());
      showToast('Coupon Applied!', '20% special clinical discount applied to your order.', 'success');
    } else if (clean === 'WELCOME10') {
      localStorage.setItem('turtle_coupon', clean);
      this.saveCart(this.getCart());
      showToast('Coupon Applied!', '10% welcome discount applied to your order.', 'success');
    } else {
      showToast('Invalid Coupon', 'The entered promo code is invalid or expired. Try "HEAR20".', 'warning');
    }
  }
};

document.addEventListener('DOMContentLoaded', () => {
  Cart.renderDrawer();
  Cart.renderCartPage();
});

