// Cart Quantity Management Functions

function increaseQuantity(button) {
    const input = button.parentElement.querySelector('.quantity-input');
    const currentValue = parseInt(input.value) || 1;
    const maxValue = parseInt(input.max) || 99;
    if (currentValue < maxValue) {
        input.value = currentValue + 1;
    }
}

function decreaseQuantity(button) {
    const input = button.parentElement.querySelector('.quantity-input');
    const currentValue = parseInt(input.value) || 1;
    const minValue = parseInt(input.min) || 1;
    if (currentValue > minValue) {
        input.value = currentValue - 1;
    }
}

function validateQuantityInput(input) {
    let value = parseInt(input.value);
    const min = parseInt(input.min) || 1;
    const max = parseInt(input.max) || 99;
    
    if (isNaN(value) || value < min) {
        input.value = min;
    } else if (value > max) {
        input.value = max;
    }
}

function validateQuantity(form) {
    const quantityInput = form.querySelector('.quantity-input');
    const value = parseInt(quantityInput.value);
    const min = parseInt(quantityInput.min) || 1;
    const max = parseInt(quantityInput.max) || 99;
    
    if (isNaN(value) || value < min || value > max) {
        alert('Quantity must be between ' + min + ' and ' + max + '.');
        quantityInput.value = min;
        quantityInput.focus();
        return false;
    }
    
    return true;
}

// Initialize hover effects for quantity buttons
document.addEventListener('DOMContentLoaded', function() {
    const quantityButtons = document.querySelectorAll('.quantity-btn');
    quantityButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.background = '#FF6B6B';
            this.style.color = 'white';
            this.style.borderColor = '#FF6B6B';
        });
        button.addEventListener('mouseleave', function() {
            this.style.background = 'white';
            this.style.color = '#FF6B6B';
            this.style.borderColor = '#E8E4E0';
        });
    });
});

