document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.property-container');
    const searchInput = document.getElementById('searchInput');
    const sortSelect = document.getElementById('sort-home');

    fetch('houses.php')
        .then(response => response.json())
        .then(data => {
            const originalData = [...data];

            function updatePropertyDisplay(properties) {
                container.innerHTML = '';
                properties.forEach(item => {
                    const formattedPropertyValue = parseFloat(item.property_value).toLocaleString('en-US', {
                        style: 'currency',
                        currency: 'USD',
                    });
        
                    container.innerHTML += `<div class="property-card">
                        <img src="${item.image_path}">
                        <h3>${item.location}</h3>
                        <div class="house-info">
                            <h4>${formattedPropertyValue}</h4>
                            <button onclick="addToWishlist(${item.property_id}, '${item.image_path}', '${item.location}', ${item.property_value}, '${item.location}', ${item.square_footage}, ${item.walkability_score})">+</button>
                        </div>
                    </div>`;
                });
            }

            updatePropertyDisplay(data);

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredProperties = originalData.filter(item =>
                    item.location.toLowerCase().includes(searchTerm)
                );
                updatePropertyDisplay(filteredProperties);
            });
            sortSelect.addEventListener('change', function () {
                const selectedSort = sortSelect.value;

                switch (selectedSort) {
                    case 'price':
                        data.sort((a, b) => a.property_value - b.property_value);
                        break;
                    case 'walkability':
                        data.sort((a, b) => a.walkability_score - b.walkability_score);
                        break;
                    case 'squareFootage':
                        data.sort((a, b) => a.square_footage - b.square_footage);
                        break;
                    default:
                        data.sort((a, b) => a.property_value - b.property_value);
                        break;
                }
                updatePropertyDisplay(data);
            });
        })
        .catch(error => console.error('Error:', error));
});

function addToWishlist(propertyId, image_path, loc, property_value, name, square_footage, walkability_score) {
    // Retrieve wishlist from localStorage or initialize an empty array
    const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    // Check if the property is already in the wishlist
    const isAlreadyInWishlist = wishlist.some(item => item.id === propertyId);

    if (!isAlreadyInWishlist) {
        wishlist.push({ id: propertyId, 
            image:image_path, 
            location: loc, 
            price: property_value, 
            HouseName: name, 
            SqaureFootage: square_footage,
        Walkability: walkability_score});
        // Save the updated wishlist back to localStorage
        localStorage.setItem('wishlist', JSON.stringify(wishlist));
        // Optionally, you can update the UI to reflect the change
        console.log('Property added to wishlist');
    } else {
        console.log('Property is already in the wishlist');
    }
}
