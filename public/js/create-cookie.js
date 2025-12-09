/**
 * Create Cookie Page JavaScript
 * Handles ingredient management and form validation
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize ingredients functionality
    const ingredientInput = document.getElementById('ingredientInput');
    const addBtn = document.getElementById('addIngredientBtn');
    const ingredientsList = document.getElementById('ingredientsList');
    const ingredientsHidden = document.getElementById('ingredientsHidden');
    const cookieForm = document.getElementById('cookieForm');
    
    let ingredients = [];
    
    /**
     * Update the visual display of ingredients
     */
    function updateIngredientsDisplay() {
        if (ingredients.length === 0) {
            ingredientsList.innerHTML = '<span class="ingredients-placeholder">Add ingredients to your recipe...</span>';
        } else {
            ingredientsList.innerHTML = ingredients.map(ingredient => 
                `<span class="ingredient-tag">
                    ${escapeHtml(ingredient)}
                    <button type="button" class="ingredient-remove" data-ingredient="${escapeHtml(ingredient)}">
                        ×
                    </button>
                </span>`
            ).join('');
            
            // Add event listeners to remove buttons
            addRemoveButtonListeners();
        }
        
        // Update hidden input for form submission
        ingredientsHidden.value = JSON.stringify(ingredients);
    }
    
    /**
     * Add ingredient to the list
     */
    function addIngredient() {
        const value = ingredientInput.value.trim();
        
        if (!value) {
            showMessage('Please enter an ingredient name.', 'warning');
            return;
        }
        
        if (ingredients.includes(value)) {
            showMessage('This ingredient is already added!', 'warning');
            ingredientInput.focus();
            return;
        }
        
        if (ingredients.length >= 20) {
            showMessage('Maximum 20 ingredients allowed.', 'warning');
            return;
        }
        
        ingredients.push(value);
        ingredientInput.value = '';
        updateIngredientsDisplay();
        ingredientInput.focus();
        
        showMessage(`Added "${value}" to ingredients.`, 'success');
    }
    
    /**
     * Remove ingredient from the list
     */
    function removeIngredient(ingredient) {
        ingredients = ingredients.filter(item => item !== ingredient);
        updateIngredientsDisplay();
        showMessage(`Removed "${ingredient}" from ingredients.`, 'info');
    }
    
    /**
     * Add event listeners to remove buttons
     */
    function addRemoveButtonListeners() {
        const removeButtons = document.querySelectorAll('.ingredient-remove');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const ingredient = this.getAttribute('data-ingredient');
                removeIngredient(ingredient);
            });
        });
    }
    
    /**
     * Escape HTML to prevent XSS attacks
     */
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }
    
    /**
     * Show temporary message to user
     */
    function showMessage(message, type = 'info') {
        // Remove existing messages
        const existingMessage = document.querySelector('.temp-message');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        // Create new message
        const messageDiv = document.createElement('div');
        messageDiv.className = `temp-message temp-message-${type}`;
        messageDiv.textContent = message;
        
        // Insert message
        const container = document.querySelector('.form-container');
        container.insertBefore(messageDiv, container.firstChild);
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 3000);
    }
    
    /**
     * Validate form before submission
     */
    function validateForm(e) {
        let isValid = true;
        const errors = [];
        
        // Check if ingredients are added
        if (ingredients.length === 0) {
            errors.push('Please add at least one ingredient.');
            isValid = false;
        }
        
        // Check cookie name
        const nameInput = document.getElementById('name');
        if (!nameInput.value.trim()) {
            errors.push('Cookie name is required.');
            isValid = false;
        }
        
        // Check type selection
        const typeSelect = document.getElementById('type');
        if (!typeSelect.value) {
            errors.push('Please select a cookie type.');
            isValid = false;
        }
        
        // Check price
        const priceInput = document.getElementById('price');
        if (!priceInput.value || parseFloat(priceInput.value) <= 0) {
            errors.push('Please enter a valid price.');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            showMessage(errors.join(' '), 'error');
            
            // Focus on first empty required field
            if (!nameInput.value.trim()) {
                nameInput.focus();
            } else if (!typeSelect.value) {
                typeSelect.focus();
            } else if (!priceInput.value) {
                priceInput.focus();
            } else if (ingredients.length === 0) {
                ingredientInput.focus();
            }
        }
        
        return isValid;
    }
    
    /**
     * Initialize event listeners
     */
    function initializeEventListeners() {
        // Add ingredient button
        if (addBtn) {
            addBtn.addEventListener('click', addIngredient);
        }
        
        // Enter key in ingredient input
        if (ingredientInput) {
            ingredientInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addIngredient();
                }
            });
            
            // Clear any error styling when user starts typing
            ingredientInput.addEventListener('input', function() {
                this.classList.remove('error');
            });
        }
        
        // Form submission validation
        if (cookieForm) {
            cookieForm.addEventListener('submit', validateForm);
        }
        
        // Clear error styling on other inputs
        const inputs = document.querySelectorAll('.form-input, .form-select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
            });
        });
    }
    
    /**
     * Initialize the page
     */
    function init() {
        initializeEventListeners();
        updateIngredientsDisplay();
        
        // Focus on name input when page loads
        const nameInput = document.getElementById('name');
        if (nameInput) {
            nameInput.focus();
        }
        
        console.log('Create Cookie page initialized successfully.');
    }
    
    // Start the application
    init();
});




