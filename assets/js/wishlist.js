/**
 * TURTLE MAARKS — WISHLIST ENGINE
 * LocalStorage sync + UI state toggles + Wishlist Page View
 * Integrates with centralized TurtleProducts canonical renderer
 */

const Wishlist = {
  getList() {
    return JSON.parse(localStorage.getItem('turtle_wishlist') || '[]');
  },

  toggle(item) {
    let list = this.getList();
    const index = list.findIndex(i => i.id === item.id);

    if (index > -1) {
      const removed = list.splice(index, 1)[0];
      const itemName = item.name || (removed ? removed.name : 'Product');
      if (typeof showToast === 'function') {
        showToast('Removed from Wishlist', `${itemName} removed from your saved items.`, 'info');
      }
    } else {
      const fullProduct = (typeof TurtleProducts !== 'undefined') ? TurtleProducts.getById(item.id) : null;
      const itemName = item.name || (fullProduct ? fullProduct.name : 'Product');
      list.push({
        id: item.id,
        name: itemName,
        brand: item.brand || (fullProduct ? fullProduct.brand : 'Turtle Maarks'),
        brandOrigin: item.brandOrigin || (fullProduct ? fullProduct.brandOrigin : 'Global'),
        style: item.style || (fullProduct ? fullProduct.style : 'RIC'),
        price: Number(item.price || (fullProduct ? fullProduct.price : 0)),
        mrp: Number(item.mrp || (fullProduct ? fullProduct.mrp : (item.price || 0) * 1.2)),
        image: item.image || (fullProduct ? fullProduct.image : 'assets/images/hearing-aid/ric.webp'),
        rating: item.rating || (fullProduct ? fullProduct.rating : 4.9),
        reviews: item.reviews || (fullProduct ? fullProduct.reviews : 25),
        channels: item.channels || (fullProduct ? fullProduct.channels : 20),
        rechargeable: item.rechargeable !== undefined ? item.rechargeable : (fullProduct ? fullProduct.rechargeable : true),
        bluetooth: item.bluetooth !== undefined ? item.bluetooth : (fullProduct ? fullProduct.bluetooth : true),
        inStock: true
      });
      if (typeof showToast === 'function') {
        showToast('Added to Wishlist', `${itemName} saved to your wishlist.`, 'success');
      }
    }

    localStorage.setItem('turtle_wishlist', JSON.stringify(list));
    if (typeof updateGlobalBadges === 'function') updateGlobalBadges();
    this.updateIcons();
    this.renderPage();
  },

  clear() {
    if (!confirm('Are you sure you want to remove all items from your wishlist?')) return;
    localStorage.removeItem('turtle_wishlist');
    if (typeof updateGlobalBadges === 'function') updateGlobalBadges();
    this.updateIcons();
    this.renderPage();
    if (typeof showToast === 'function') {
      showToast('Wishlist Cleared', 'All saved items have been removed.', 'info');
    }
  },

  updateIcons() {
    const list = this.getList();
    document.querySelectorAll('[data-wishlist-id]').forEach(btn => {
      const id = btn.getAttribute('data-wishlist-id');
      const isSaved = list.some(i => i.id === id);
      if (isSaved) {
        btn.classList.add('active');
        btn.setAttribute('title', 'Remove from Wishlist');
        btn.setAttribute('aria-label', 'Remove from Wishlist');
        const icon = btn.querySelector('i');
        if (icon) {
          icon.className = 'bi bi-heart-fill text-danger';
        } else {
          btn.innerHTML = '<i class="bi bi-heart-fill text-danger"></i>';
        }
      } else {
        btn.classList.remove('active');
        btn.setAttribute('title', 'Add to Wishlist');
        btn.setAttribute('aria-label', 'Add to Wishlist');
        const icon = btn.querySelector('i');
        if (icon) {
          icon.className = 'bi bi-heart';
        } else {
          btn.innerHTML = '<i class="bi bi-heart"></i>';
        }
      }
    });

    // Also update any detail page wishlist button if present
    const pdBtn = document.getElementById('pdWishlistBtn');
    if (pdBtn) {
      const pid = pdBtn.getAttribute('data-wishlist-id');
      const isSaved = list.some(i => i.id === pid);
      if (isSaved) {
        pdBtn.classList.add('active', 'btn-outline-danger');
        pdBtn.classList.remove('btn-outline-navy');
        pdBtn.innerHTML = '<i class="bi bi-heart-fill text-danger me-2"></i> <span>Remove from Wishlist</span>';
        pdBtn.setAttribute('title', 'Remove from Wishlist');
      } else {
        pdBtn.classList.remove('active', 'btn-outline-danger');
        pdBtn.classList.add('btn-outline-navy');
        pdBtn.innerHTML = '<i class="bi bi-heart me-2"></i> <span>Add to Wishlist</span>';
        pdBtn.setAttribute('title', 'Add to Wishlist');
      }
    }
  },

  renderPage() {
    const container = document.getElementById('tmWishlistGrid');
    if (!container) return;

    const list = this.getList();
    const headerEl = document.getElementById('tmWishlistHeader');
    const countEl = document.getElementById('tmWishlistCountHeading');

    if (list.length === 0) {
      if (headerEl) headerEl.style.display = 'none';
      container.innerHTML = `
        <div class="col-12 text-center py-5">
          <i class="bi bi-heart text-muted" style="font-size: 4rem;"></i>
          <h3 class="mt-3 fw-bold text-navy">Your Wishlist is Empty</h3>
          <p class="text-secondary">Save your favorite hearing aids, batteries and accessories here.</p>
          <a href="products.php" class="tm-btn tm-btn-primary mt-3">Explore Products</a>
        </div>
      `;
      return;
    }

    if (headerEl) {
      headerEl.style.display = 'flex';
      if (countEl) countEl.textContent = `Saved Products (${list.length})`;
    }

    if (typeof TurtleProducts !== 'undefined') {
      container.innerHTML = list.map(item => {
        const prod = TurtleProducts.getById(item.id) || item;
        return TurtleProducts.renderCard(prod, { 
          colClass: 'col-xl-3 col-lg-4 col-md-6 mb-4',
          isWishlistPage: true 
        });
      }).join('');
    } else {
      container.innerHTML = list.map(item => `
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="tm-product-card">
            <div class="tm-product-media">
              <img src="${item.image}" alt="${item.name}" class="tm-product-img">
              <div class="tm-product-actions-group">
                <button type="button" class="tm-product-action-btn active" data-wishlist-id="${item.id}" onclick="Wishlist.toggle({id: '${item.id}', name: '${item.name}'})" title="Remove from Wishlist">
                  <i class="bi bi-heart-fill text-danger"></i>
                </button>
              </div>
            </div>
            <div class="tm-product-body">
              <span class="tm-product-brand-tag">${item.brand}</span>
              <h6 class="tm-product-title">${item.name}</h6>
              <div class="tm-product-price-row">
                <span class="tm-product-sale-price">₹${item.price.toLocaleString('en-IN')}</span>
                <span class="tm-product-mrp">₹${item.mrp.toLocaleString('en-IN')}</span>
              </div>
              <div class="tm-product-btns">
                <button type="button" class="tm-product-btn-cart w-100 mb-2" onclick="Cart.addItem({id: '${item.id}', name: '${item.name}', brand: '${item.brand}', price: ${item.price}, image: '${item.image}'})">
                  <i class="bi bi-cart-plus-fill"></i> Add to Cart
                </button>
                <button type="button" class="tm-btn tm-btn-sm tm-btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-1" onclick="Wishlist.toggle({id: '${item.id}', name: '${item.name}'})">
                  <i class="bi bi-trash3"></i> Remove from Wishlist
                </button>
              </div>
            </div>
          </div>
        </div>
      `).join('');
    }
  }
};

document.addEventListener('DOMContentLoaded', () => {
  Wishlist.updateIcons();
  Wishlist.renderPage();
});
