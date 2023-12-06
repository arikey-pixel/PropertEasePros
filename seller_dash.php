<!DOCTYPE html>
<html>
    <head>
        <title>Seller Dashboard</title>
        <link href="seller-dashboard.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div class="company-logo">
            <a href="home.html"><img id ="logo" src="logo.png" alt="company-logo"></a> 
            <h3>PropertEase Pros</h3>  
        </div>
        <button class="logout-button">Logout</button>
        <div class="user-logo">
            <img src="user.png" alt="user-icon">
        </div>
        <div class="link-container">
            <a class="wishlist-link" href="wishlist.html">WishList</a>
        </div>
        <div class="container">
            <div class="search-container">
                <input class="search-box" type="text" placeholder="Enter Keyword...">
                <button class="search-button" type="submit">Search</button>
            </div>
            <div class="search-container">
                <label for="sort-home" style="color: aliceblue;" style="margin-right: 10px;"> |||  FILTER BY:</label>
                <select class="search-button" id="sort-home" name="sort-home">
                    <option value="price" onchange="sortHomes(this.value)">Price</option>
                    <option value="walkability" onchange="sortHomes(this.value)">Walkability Score</option>
                    <option value="sqFt" onchange="sortHomes(this.value)">Square Footage</option>
                  </select>
            </div>
        </div>
        <div class="property-container">
            <div class="property-card">
                <img src="house_1.jpg">
                <h3>Cool House</h3>
                <div class="house-info">
                    <h4>$570,000</h4>
                    <button onclick="AddToWishlist">+</button>
                </div>
            </div>
            <div class="property-card">
                <img src="house_2.jpg">
                <h3>Cool House2</h3>
                <div class="house-info">
                    <h4>$570,000</h4>
                    <button onclick="AddToWishlist">+</button>
                </div>
            </div>
            <div class="property-card">
                <img src="house_3.jpg">
                <h3>Cool House3</h3>
                <div class="house-info">
                    <h4>$570,000</h4>
                    <button onclick="AddToWishlist">+</button>
                </div>
            </div>
        </div>
    </body>
</html>
