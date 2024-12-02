document.addEventListener('DOMContentLoaded', function () {
    const cartCountElement = document.querySelector('nav ul li a[href="#cart"]');
    const cartItemsElement = document.querySelector('.cart-items');
    const checkoutButton = document.querySelector('.checkout');
    const cartModal = document.getElementById('cart-modal');
    const closeModal = document.querySelector('.close');
    const sortPriceSelect = document.getElementById('sort-price');
    const filterCategorySelect = document.getElementById('filter-category');
    const searchBar = document.getElementById('search-bar');
    const productGrid = document.getElementById('product-grid');
    const pagination = document.querySelector('.pagination');
    const prevPageButton = document.querySelector('.prev-page');
    const nextPageButton = document.querySelector('.next-page');
    const pageInfo = document.querySelector('.page-info');

    let cart = [];
    let currentPage = 1;
    const itemsPerPage = 3;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const productItem = this.closest('.product-item');
            const productName = productItem.querySelector('h3').textContent;
            const productPrice = productItem.querySelector('.price').textContent;

            const cartItem = {
                name: productName,
                price: productPrice,
            };

            cart.push(cartItem);
            updateCart();
            alert(`${productName} added to cart.`);
        });
    });

    function updateCart() {
        cartCountElement.textContent = `Cart (${cart.length})`;
        cartItemsElement.innerHTML = '';

        if (cart.length === 0) {
            cartItemsElement.innerHTML = '<li>Your cart is currently empty.</li>';
            checkoutButton.style.display = 'none';
        } else {
            cart.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `${item.name} - ${item.price}`;
                cartItemsElement.appendChild(li);
            });
            checkoutButton.style.display = 'block';
        }
    }

    cartCountElement.addEventListener('click', function () {
        cartModal.style.display = 'block';
    });

    closeModal.addEventListener('click', function () {
        cartModal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target == cartModal) {
            cartModal.style.display = 'none';
        }
    });

    // Carousel functionality
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;

    function showNextItem() {
        items[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalItems;
        items[currentIndex].classList.add('active');
    }

    setInterval(showNextItem, 3000); // Change product_image every 3 seconds

    // Price Sorting functionality
    sortPriceSelect.addEventListener('change', function () {
        const selectedOption = this.value;
        const productItems = Array.from(productGrid.querySelectorAll('.product-item'));

        productItems.sort((a, b) => {
            const priceA = parseFloat(a.querySelector('.price').textContent.replace('₹', ''));
            const priceB = parseFloat(b.querySelector('.price').textContent.replace('₹', ''));

            if (selectedOption === 'asc') {
                return priceA - priceB;
            } else if (selectedOption === 'desc') {
                return priceB - priceA;
            } else {
                return 0;
            }
        });

        productItems.forEach(item => productGrid.appendChild(item));
    });

    // Category Filtering functionality
    filterCategorySelect.addEventListener('change', function () {
        const selectedCategory = this.value;
        const productItems = Array.from(productGrid.querySelectorAll('.product-item'));

        productItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            if (selectedCategory === 'all' || itemCategory === selectedCategory) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        currentPage = 1;  // Reset to first page
        showPage(currentPage);
    });

    // Search functionality
    searchBar.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const productItems = Array.from(productGrid.querySelectorAll('.product-item'));

        productItems.forEach(item => {
            const itemName = item.querySelector('h3').textContent.toLowerCase();
            if (itemName.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Pagination functionality
    function showPage(page) {
        const productItems = Array.from(productGrid.querySelectorAll('.product-item'));
        const visibleItems = productItems.filter(item => item.style.display !== 'none');
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        visibleItems.forEach((item, index) => {
            if (index >= start && index < end) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        pageInfo.textContent = `Page ${page} of ${Math.ceil(visibleItems.length / itemsPerPage)}`;
        prevPageButton.disabled = page === 1;
        nextPageButton.disabled = page === Math.ceil(visibleItems.length / itemsPerPage);
    }

    prevPageButton.addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextPageButton.addEventListener('click', function () {
        const totalPages = Math.ceil(Array.from(productGrid.querySelectorAll('.product-item')).filter(item => item.style.display !== 'none').length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);
});
