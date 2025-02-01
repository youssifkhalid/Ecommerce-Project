document.addEventListener("DOMContentLoaded", function () {
    fetchProducts();
});

function fetchProducts() {
    fetch('api/products.php')
        .then(response => response.json())
        .then(data => {
            const productContainer = document.querySelector('.product-list');
            data.forEach(product => {
                const div = document.createElement('div');
                div.className = 'product-item';
                div.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p>السعر: ${product.price} جنيه</p>
                    <button onclick="addToCart(${product.id})">أضف إلى السلة</button>
                `;
                productContainer.appendChild(div);
            });
        })
        .catch(error => console.error('Error:', error));
}

function addToCart(productId) {
    alert("تم إضافة المنتج إلى السلة!");
}
