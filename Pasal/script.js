


document.getElementById('search-input').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    let products = document.querySelectorAll('.product');
    
    products.forEach(function(product) {
        let brand = product.getAttribute('data-brand').toLowerCase();
        let name = product.getAttribute('data-name').toLowerCase();
        
        if (brand.includes(filter) || name.includes(filter)) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const cartCounter = document.getElementById('cart-counter');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    let cartCount = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            cartCount++;
            cartCounter.textContent = cartCount;
        });
    });
});




function filterProducts() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const products = document.getElementsByClassName("product");

    for (let i = 0; i < products.length; i++) {
        const productName = products[i].getElementsByTagName("p")[0].innerText.toLowerCase();
        if (productName.includes(searchInput)) {
            products[i].style.display = "";
        } else {
            products[i].style.display = "none";
        }
    }
}