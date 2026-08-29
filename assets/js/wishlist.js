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
      list.splice(index, 1);
      if (typeof showToast === 'function') {
        showToast('Removed from Wishlist', `${item.name} removed from your saved items.`, 'info');
      }
    } else {
      const fullProduct = (typeof TurtleProducts !== 'undefined') ? TurtleProducts.getById(item.id) : null;
      list.push({
        id: item.id,
        name: item.name,
        brand: item.brand || (fullProduct ? fullProduct.brand : 'Turtle Maarks'),
        brandOrigin: item.brandOrigin || (fullProduct ? fullProduct.brandOrigin : 'Global'),
        style: item.style || (fullProduct ? fullProduct.style : 'RIC'),
        price: Number(item.price),
        mrp: Number(item.mrp || (fullProduct ? fullProduct.mrp : item.price * 1.2)),
        image: item.image || (fullProduct ? fullProduct.image : 'assets/images/hearing-aid/ric.webp'),
        rating: item.rating || (fullProduct ? fullProduct.rating : 4.9),
        reviews: item.reviews || (fullProduct ? fullProduct.reviews : 25),
        channels: item.channels || (fullProduct ? fullProduct.channels : 20),
        rechargeable: item.rechargeable !== undefined ? item.rechargeable : (fullProduct ? fullProduct.rechargeable : true),
        bluetooth: item.bluetooth !== undefined ? item.bluetooth : (fullProduct ? fullProduct.bluetooth : true),
        inStock: true
      });
      if (typeof showToast === 'function') {
        showToast('Added to Wishlist', `${item.name} saved to your wishlist.`, 'success');
      }
    }

    localStorage.setItem('turtle_wishlist', JSON.stringify(list));
    if (typeof updateGlobalBadges === 'function') updateGlobalBadges();
    this.updateIcons();
    this.renderPage();
  },

  updateIcons() {
    const list = this.getList();
    document.querySelectorAll('[data-wishlist-id]').forEach(btn => {
      const id = btn.getAttribute('data-wishlist-id');
      const isSaved = list.some(i => i.id === id);
      if (isSaved) {
        btn.classList.add('active');
        btn.innerHTML = '<i class="bi bi-heart-fill text-danger"></i>';
      } else {
        btn.classList.remove('active');
        btn.innerHTML = '<i class="bi bi-heart"></i>';
      }
    });
  },

  renderPage() {
    const container = document.getElementById('tmWishlistGrid');
    if (!container) return;

    const list = this.getList();
    if (list.length === 0) {
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

    if (typeof TurtleProducts !== 'undefined') {
      container.innerHTML = list.map(item => {
        const prod = TurtleProducts.getById(item.id) || item;
        return TurtleProducts.renderCard(prod, { colClass: 'col-xl-3 col-lg-4 col-md-6 mb-4' });
      }).join('');
    } else {
      container.innerHTML = list.map(item => `
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="tm-product-card">
            <div class="tm-product-media">
              <img src="${item.image}" alt="${item.name}" class="tm-product-img">
              <div class="tm-product-actions-group">
                <button class="tm-product-action-btn active" onclick="Wishlist.toggle({id: '${item.id}', name: '${item.name}'})">
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
                <button class="tm-product-btn-cart" onclick="Cart.addItem({id: '${item.id}', name: '${item.name}', brand: '${item.brand}', price: ${item.price}, image: '${item.image}'})">
                  <i class="bi bi-cart-plus-fill"></i> Add to Cart
                </button>
                <button class="tm-product-btn-trial" onclick="Wishlist.toggle({id: '${item.id}'})">
                  Remove
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
