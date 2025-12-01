// Cart Management
class Cart {
    constructor() {
        this.items = this.loadCart();
        this.updateCartBadge();
    }

    loadCart() {
        const cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
        this.updateCartBadge();
        // Dispatch event for other components to listen
        window.dispatchEvent(new CustomEvent('cartUpdated'));
    }

    addItem(productId, name, price, image, quantity = 1) {
        const existingItem = this.items.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            this.items.push({
                id: productId,
                name: name,
                price: price,
                image: image,
                quantity: quantity
            });
        }
        
        this.saveCart();
        this.showNotification('Item added to cart!');
    }

    updateQuantity(productId, quantity) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            if (quantity <= 0) {
                this.removeItem(productId);
            } else {
                item.quantity = quantity;
                this.saveCart();
            }
        }
    }

    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.saveCart();
        this.showNotification('Item removed from cart');
    }

    getTotal() {
        return this.items.reduce((total, item) => {
            return total + (item.price * item.quantity);
        }, 0);
    }

    getItemCount() {
        return this.items.reduce((count, item) => count + item.quantity, 0);
    }

    clear() {
        this.items = [];
        this.saveCart();
    }

    updateCartBadge() {
        const badge = document.getElementById('cart-badge');
        if (badge) {
            const count = this.getItemCount();
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    }

    showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'notification';
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10000;
            animation: slideIn 0.3s ease-out;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
}

// Initialize cart
const cart = new Cart();

// Quantity Selector Functions (for product detail page)
function increaseQuantity(button) {
    const container = button.closest('.quantity-selector');
    const input = container.querySelector('.quantity-input');
    let value = parseInt(input.value) || 1;
    const max = parseInt(input.getAttribute('max')) || 99;
    if (value < max) {
        value++;
        input.value = value;
    }
}

function decreaseQuantity(button) {
    const container = button.closest('.quantity-selector');
    const input = container.querySelector('.quantity-input');
    let value = parseInt(input.value) || 1;
    const min = parseInt(input.getAttribute('min')) || 1;
    if (value > min) {
        value--;
        input.value = value;
    }
}

// Quantity Selector
class QuantitySelector {
    constructor(container, initialValue = 1, min = 1, max = 99) {
        this.value = initialValue;
        this.min = min;
        this.max = max;
        this.container = container;
        this.init();
    }

    init() {
        const decreaseBtn = this.container.querySelector('.quantity-decrease');
        const increaseBtn = this.container.querySelector('.quantity-increase');
        const input = this.container.querySelector('.quantity-input');

        if (decreaseBtn && !decreaseBtn.onclick) {
            decreaseBtn.addEventListener('click', () => this.decrease());
        }
        if (increaseBtn && !increaseBtn.onclick) {
            increaseBtn.addEventListener('click', () => this.increase());
        }
        if (input) {
            input.addEventListener('change', (e) => this.setValue(parseInt(e.target.value)));
            input.addEventListener('blur', () => this.validate());
        }
    }

    decrease() {
        if (this.value > this.min) {
            this.value--;
            this.updateDisplay();
        }
    }

    increase() {
        if (this.value < this.max) {
            this.value++;
            this.updateDisplay();
        }
    }

    setValue(value) {
        if (value >= this.min && value <= this.max) {
            this.value = value;
            this.updateDisplay();
        }
    }

    validate() {
        if (this.value < this.min) this.value = this.min;
        if (this.value > this.max) this.value = this.max;
        this.updateDisplay();
    }

    updateDisplay() {
        const input = this.container.querySelector('.quantity-input');
        if (input) input.value = this.value;
    }

    getValue() {
        return this.value;
    }
}

// Add to Cart Handler
function initAddToCart() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = parseFloat(this.dataset.productPrice);
            const productImage = this.dataset.productImage || '';
            
            // Get quantity if quantity selector exists
            const quantityContainer = this.closest('.product-info')?.querySelector('.quantity-selector');
            let quantity = 1;
            
            if (quantityContainer) {
                const quantityInput = quantityContainer.querySelector('.quantity-input');
                quantity = parseInt(quantityInput.value) || 1;
            }
            
            cart.addItem(productId, productName, productPrice, productImage, quantity);
        });
    });
}

// Cart Page Functions
function renderCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const emptyState = document.getElementById('empty-cart');
    const cartSummary = document.getElementById('cart-summary');
    
    if (!cartItemsContainer) return;
    
    if (cart.items.length === 0) {
        if (emptyState) emptyState.classList.remove('hidden');
        if (cartItemsContainer) cartItemsContainer.innerHTML = '';
        if (cartSummary) cartSummary.classList.add('hidden');
        return;
    }
    
    if (emptyState) emptyState.classList.add('hidden');
    if (cartSummary) cartSummary.classList.remove('hidden');
    
    cartItemsContainer.innerHTML = cart.items.map(item => `
        <div class="cart-item" data-product-id="${item.id}">
            <div class="cart-item-image">
                ${item.image ? `<img src="${item.image}" alt="${item.name}">` : 
                  `<svg class="card-placeholder" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>`}
            </div>
            <div class="cart-item-info">
                <h3 class="cart-item-title">${item.name}</h3>
                <p class="cart-item-price">$${item.price.toFixed(2)}</p>
                <div class="quantity-selector">
                    <button class="quantity-btn quantity-decrease" onclick="updateCartQuantity('${item.id}', -1)">-</button>
                    <input type="number" class="quantity-input" value="${item.quantity}" min="1" max="99" 
                           onchange="updateCartQuantity('${item.id}', parseInt(this.value))">
                    <button class="quantity-btn quantity-increase" onclick="updateCartQuantity('${item.id}', 1)">+</button>
                </div>
                <button class="btn" onclick="removeCartItem('${item.id}')" style="margin-top: 1rem; background: #ef4444; color: white;">
                    Remove
                </button>
            </div>
            <div style="text-align: right;">
                <p style="font-size: 1.5rem; font-weight: bold; color: #d97706;">
                    $${(item.price * item.quantity).toFixed(2)}
                </p>
            </div>
        </div>
    `).join('');
    
    updateCartSummary();
}

function updateCartQuantity(productId, newQuantity) {
    if (typeof newQuantity === 'number') {
        cart.updateQuantity(productId, newQuantity);
    } else {
        const currentItem = cart.items.find(item => item.id === productId);
        if (currentItem) {
            const change = newQuantity;
            cart.updateQuantity(productId, currentItem.quantity + change);
        }
    }
    renderCartItems();
}

function removeCartItem(productId) {
    cart.removeItem(productId);
    renderCartItems();
}

function updateCartSummary() {
    const subtotalElement = document.getElementById('cart-subtotal');
    const totalElement = document.getElementById('cart-total');
    const itemCountElement = document.getElementById('cart-item-count');
    
    const subtotal = cart.getTotal();
    const shipping = 5.99; // Fixed shipping cost
    const total = subtotal + shipping;
    
    if (subtotalElement) subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
    if (totalElement) totalElement.textContent = `$${total.toFixed(2)}`;
    if (itemCountElement) itemCountElement.textContent = cart.getItemCount();
}

// Checkout Form Handler
function initCheckoutForm() {
    const checkoutForm = document.getElementById('checkout-form');
    
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = {
                customerName: document.getElementById('customer-name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                zipCode: document.getElementById('zip-code').value,
                notes: document.getElementById('notes').value,
                cart: cart.items,
                total: cart.getTotal() + 5.99
            };
            
            // Here you would send this to your backend
            console.log('Order data:', formData);
            
            // Generate order number (you'll do this on backend)
            const orderNumber = 'COOKIE-' + Date.now();
            
            // Clear cart
            cart.clear();
            
            // Redirect to confirmation page with order number
            window.location.href = `order-confirmation.html?order=${orderNumber}`;
        });
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Update cart badge
    cart.updateCartBadge();
    
    // Listen for cart updates
    window.addEventListener('cartUpdated', function() {
        cart.updateCartBadge();
    });
    
    // Initialize add to cart buttons
    initAddToCart();
    
    // Render cart if on cart page
    if (document.getElementById('cart-items')) {
        renderCartItems();
    }
    
    // Initialize checkout form
    initCheckoutForm();
    
    // Initialize quantity selectors on product detail page
    const quantitySelectors = document.querySelectorAll('.quantity-selector');
    quantitySelectors.forEach(container => {
        const input = container.querySelector('.quantity-input');
        if (input) {
            new QuantitySelector(container, parseInt(input.value) || 1);
        }
    });
    
    // Get order number from URL for confirmation page
    const urlParams = new URLSearchParams(window.location.search);
    const orderNumber = urlParams.get('order');
    if (orderNumber && document.getElementById('order-number')) {
        document.getElementById('order-number').textContent = orderNumber;
    }
});

// Add CSS animations for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

