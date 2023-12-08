document.addEventListener('DOMContentLoaded', function () {
    function renderWishlist(wishlist){
        const container = document.getElementById('wl-container');

        container.innerHTML = '';
        wishlist.forEach(item => {
            const squareFootage = parseFloat(item.SqaureFootage);
            const formattedSquareFootage = squareFootage.toLocaleString('en-US');
            const formattedPropertyValue = parseFloat(item.price).toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
            });

            container.innerHTML += ` <li> 
            <div class="property-wl-card">
                <button onclick="removeFromWL(${item.id})" class="rem-wl">Remove From WL</button>
                <img src=${item.image} class="wl-pic">
                <p class="info-wl">Square Footage: ${formattedSquareFootage} </p> 
                <p class="info-wl">House Name: ${item.HouseName} </p>
                <p class="info-wl">Price: ${formattedPropertyValue} </p>
                <p class="info-wl">Location: ${item.location}</p>
                <p class="info-wl">Walkability: ${item.Walkability}</p>
            </div>
        </li> `;

});
    }
    const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    renderWishlist(wishlist);

});

function removeFromWL(property_id) {
    const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    // Find the index of the item with the specified propertyId
    const itemIndex = wishlist.findIndex(item => item.id === property_id);

    if (itemIndex !== -1) {
        // Remove the item from the wishlist array
        wishlist.splice(itemIndex, 1);

        localStorage.setItem('wishlist', JSON.stringify(wishlist));

        console.log('Property removed from wishlist');
    } else {
        console.log('Property not found in the wishlist');
    }
}
