/**
 * TURTLE MAARKS — PRODUCT FILTER & SORT ENGINE
 * Dynamic multi-criteria filter + live count + grid/list toggle
 * Uses centralized TurtleProducts repository and canonical renderCard
 */

const ProductFilter = {
  get products() {
    return (typeof TurtleProducts !== 'undefined') ? TurtleProducts.getAll() : [];
  },

  currentPage: 1,
  perPage: 9,

  activeFilters: {
    categories: [],
    subcategories: [],
    brands: [],
    styles: [],
    minPrice: 0,
    maxPrice: 500000,
    sort: 'featured',
    search: ''
  },

  init() {
    this.parseUrlParams();
    this.bindEvents();
    this.renderProducts();
  },

  parseUrlParams() {
    const params = new URLSearchParams(window.location.search);
    const brand = params.get('brand');
    const style = params.get('style');
    const subcategory = params.get('subcategory');
    const category = params.get('category');
    const page = parseInt(params.get('page'), 10);
    const sort = params.get('sort');

    if (page && page > 0) {
      this.currentPage = page;
    }

    if (sort) {
      this.activeFilters.sort = sort;
      const sortSelect = document.getElementById('tmSortSelect');
      if (sortSelect) sortSelect.value = sort;
    }

    if (category) {
      this.activeFilters.categories.push(category);
      const cb = document.querySelector(`.filter-category-checkbox[value="${category}"]`);
      if (cb) cb.checked = true;
    }

    if (subcategory) {
      this.activeFilters.subcategories.push(subcategory);
      const cb = document.querySelector(`.filter-subcategory-checkbox[value="${subcategory}"]`);
      if (cb) cb.checked = true;
    }

    if (brand) {
      this.activeFilters.brands.push(brand);
      const cb = document.querySelector(`.filter-brand-checkbox[value="${brand}"]`);
      if (cb) cb.checked = true;
    }

    if (style) {
      this.activeFilters.styles.push(style);
      const cb = document.querySelector(`.filter-subcategory-checkbox[value="${style}"], .filter-style-checkbox[value="${style}"]`);
      if (cb) cb.checked = true;
    }
  },

  bindEvents() {
    // Category checkboxes
    document.querySelectorAll('.filter-category-checkbox').forEach(cb => {
      cb.addEventListener('change', (e) => {
        const val = e.target.value;
        if (e.target.checked) {
          this.activeFilters.categories.push(val);
        } else {
          this.activeFilters.categories = this.activeFilters.categories.filter(c => c.toLowerCase() !== val.toLowerCase());
        }
        this.currentPage = 1;
        this.renderProducts();
      });
    });

    // Subcategory checkboxes
    document.querySelectorAll('.filter-subcategory-checkbox, .filter-style-checkbox').forEach(cb => {
      cb.addEventListener('change', (e) => {
        const val = e.target.value;
        if (e.target.checked) {
          this.activeFilters.subcategories.push(val);
        } else {
          this.activeFilters.subcategories = this.activeFilters.subcategories.filter(s => s.toLowerCase() !== val.toLowerCase());
        }
        this.currentPage = 1;
        this.renderProducts();
      });
    });

    // Brand checkboxes
    document.querySelectorAll('.filter-brand-checkbox').forEach(cb => {
      cb.addEventListener('change', (e) => {
        const val = e.target.value;
        if (e.target.checked) {
          this.activeFilters.brands.push(val);
        } else {
          this.activeFilters.brands = this.activeFilters.brands.filter(b => b.toLowerCase() !== val.toLowerCase());
        }
        this.currentPage = 1;
        this.renderProducts();
      });
    });

    // Price range slider
    const priceSlider = document.getElementById('tmPriceRangeInput') || document.getElementById('filterMaxPrice');
    const priceDisplay = document.getElementById('tmPriceRangeDisplay');
    if (priceSlider) {
      priceSlider.addEventListener('input', (e) => {
        const val = Number(e.target.value) || 500000;
        this.activeFilters.maxPrice = val;
        if (priceDisplay) {
          priceDisplay.textContent = '₹' + val.toLocaleString('en-IN');
        }
        this.currentPage = 1;
        this.renderProducts();
      });
    }

    // Sort select
    const sortSelect = document.getElementById('tmSortSelect');
    if (sortSelect) {
      sortSelect.addEventListener('change', (e) => {
        this.activeFilters.sort = e.target.value;
        this.currentPage = 1;
        this.renderProducts();
      });
    }

    // Reset Filters button
    const resetBtn = document.getElementById('tmResetFiltersBtn') || document.getElementById('tmClearFiltersBtn');
    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        document.querySelectorAll('.filter-category-checkbox, .filter-subcategory-checkbox, .filter-style-checkbox, .filter-brand-checkbox').forEach(c => c.checked = false);
        if (priceSlider) {
          priceSlider.value = 500000;
        }
        if (priceDisplay) {
          priceDisplay.textContent = '₹5,00,000';
        }
        this.activeFilters = {
          categories: [],
          subcategories: [],
          brands: [],
          styles: [],
          minPrice: 0,
          maxPrice: 500000,
          sort: 'featured',
          search: ''
        };
        this.currentPage = 1;
        this.renderProducts();
      });
    }
  },

  filterList() {
    let list = [...this.products];

    // Filter Categories
    if (this.activeFilters.categories.length > 0) {
      const activeCats = this.activeFilters.categories.map(c => c.toLowerCase());
      list = list.filter(p => {
        const pCat = (p.category || '').toLowerCase();
        if (activeCats.includes(pCat)) return true;
        if (activeCats.includes('rechargeable') && Boolean(p.rechargeable)) return true;
        if (activeCats.includes('bluetooth') && Boolean(p.bluetooth)) return true;
        if (activeCats.includes('accessories') && (pCat === 'accessories' || pCat === 'batteries' || (p.style || '').toLowerCase() === 'accessory')) return true;
        return false;
      });
    }

    // Filter Subcategories / Form Factor Styles
    const activeSubs = [...this.activeFilters.subcategories, ...this.activeFilters.styles].map(s => s.toLowerCase());
    if (activeSubs.length > 0) {
      list = list.filter(p => {
        const pStyle = (p.style || '').toLowerCase();
        if (activeSubs.includes(pStyle)) return true;
        if (activeSubs.includes('itc') && (pStyle === 'itc' || pStyle === 'ite')) return true;
        if (activeSubs.includes('accessory') && (pStyle === 'accessory' || (p.category || '').toLowerCase() === 'accessories' || (p.category || '').toLowerCase() === 'batteries')) return true;
        return false;
      });
    }

    // Filter Brands
    if (this.activeFilters.brands.length > 0) {
      const activeBrands = this.activeFilters.brands.map(b => b.toLowerCase());
      list = list.filter(p => activeBrands.includes((p.brand || '').toLowerCase()));
    }

    // Filter Price
    list = list.filter(p => p.price >= this.activeFilters.minPrice && p.price <= this.activeFilters.maxPrice);

    // Sorting
    if (this.activeFilters.sort === 'price-low') {
      list.sort((a, b) => a.price - b.price);
    } else if (this.activeFilters.sort === 'price-high') {
      list.sort((a, b) => b.price - a.price);
    } else if (this.activeFilters.sort === 'rating') {
      list.sort((a, b) => b.rating - a.rating);
    }

    return list;
  },

  renderProducts() {
    const grid = document.getElementById('tmProductsGrid');
    const countEl = document.getElementById('tmProductsMatchCount');
    if (!grid) return;

    const filtered = this.filterList();
    const totalItems = filtered.length;
    const totalPages = Math.ceil(totalItems / this.perPage) || 1;

    if (this.currentPage > totalPages) {
      this.currentPage = 1;
    }

    const startIdx = (this.currentPage - 1) * this.perPage;
    const endIdx = Math.min(startIdx + this.perPage, totalItems);

    if (countEl) {
      countEl.innerHTML = `Showing <strong>${totalItems > 0 ? (startIdx + 1) : 0} &ndash; ${endIdx}</strong> of <strong>${totalItems}</strong> models (Page <strong>${this.currentPage}</strong> of <strong>${totalPages}</strong>)`;
    }

    if (totalItems === 0) {
      grid.innerHTML = `
        <div class="col-12 text-center py-5">
          <i class="bi bi-search text-muted" style="font-size: 3.5rem;"></i>
          <h4 class="fw-bold text-navy mt-3">No matching hearing aids found</h4>
          <p class="text-secondary">Try widening your price range or clearing active brand filters.</p>
        </div>
      `;
      this.renderPagination(0);
      return;
    }

    const paged = filtered.slice(startIdx, endIdx);
    grid.innerHTML = paged.map(p => 
      TurtleProducts.renderCard(p, { colClass: 'col-xl-4 col-lg-4 col-md-6' })
    ).join('');

    if (typeof Wishlist !== 'undefined' && Wishlist.updateIcons) {
      Wishlist.updateIcons();
    }

    this.renderPagination(totalItems);
  },

  renderPagination(totalItems) {
    const wrap = document.getElementById('tmProductsPaginationWrap');
    if (!wrap) return;

    const totalPages = Math.ceil(totalItems / this.perPage) || 1;
    if (totalPages <= 1) {
      wrap.innerHTML = '';
      return;
    }

    let html = `
      <nav aria-label="Product pagination" class="d-flex justify-content-center mt-4 mb-4">
        <ul class="tm-pagination shadow-xs rounded-3 p-1 bg-white border">
          <!-- Previous Button -->
          <li class="page-item ${this.currentPage <= 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" data-page="${this.currentPage - 1}" aria-label="Previous">
              <i class="bi bi-chevron-left"></i>
            </a>
          </li>
    `;

    for (let p = 1; p <= totalPages; p++) {
      html += `
        <li class="page-item ${p === this.currentPage ? 'active' : ''}">
          <a class="page-link" href="#" data-page="${p}">${p}</a>
        </li>
      `;
    }

    html += `
          <!-- Next Button -->
          <li class="page-item ${this.currentPage >= totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" data-page="${this.currentPage + 1}" aria-label="Next">
              <i class="bi bi-chevron-right"></i>
            </a>
          </li>
        </ul>
      </nav>
    `;

    wrap.innerHTML = html;

    // Attach click handlers to page links
    wrap.querySelectorAll('.page-link').forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetPage = parseInt(link.getAttribute('data-page'), 10);
        if (targetPage && targetPage >= 1 && targetPage <= totalPages && targetPage !== this.currentPage) {
          this.currentPage = targetPage;
          this.renderProducts();

          // Scroll smoothly to top of products grid
          const grid = document.getElementById('tmProductsGrid');
          if (grid) {
            const topPos = grid.getBoundingClientRect().top + window.pageYOffset - 90;
            window.scrollTo({ top: topPos, behavior: 'smooth' });
          }

          // Update URL ?page= without reload
          try {
            const url = new URL(window.location.href);
            url.searchParams.set('page', targetPage);
            window.history.replaceState({}, '', url.toString());
          } catch (err) {}
        }
      });
    });
  }
};

document.addEventListener('DOMContentLoaded', () => {
  ProductFilter.init();
});
