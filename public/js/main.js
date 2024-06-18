// main.js

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('inventoryForm');

    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        let isValid = true;

        const productName = document.getElementById('productName').value.trim();
        const unitPrice = document.getElementById('unitPrice').value.trim();
        const quantity = document.getElementById('quantity').value.trim();

        const productNameError = document.getElementById('productNameError');
        const unitPriceError = document.getElementById('unitPriceError');
        const quantityError = document.getElementById('quantityError');

        productNameError.textContent = '';
        unitPriceError.textContent = '';
        quantityError.textContent = '';

        if (!productName) {
            productNameError.textContent = 'Por favor, ingrese el nombre del producto';
            isValid = false;
        }

        if (!unitPrice || isNaN(unitPrice)) {
            unitPriceError.textContent = 'Por favor, ingrese un precio válido';
            isValid = false;
        }

        if (!quantity || isNaN(quantity)) {
            quantityError.textContent = 'Por favor, ingrese una cantidad válida';
            isValid = false;
        }

        return isValid;
    }
});
