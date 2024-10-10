<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page with Image Lightbox</title>
    <style>
        /* Basic Page Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

            color: #333;
        }

        .logo {
            width: 150px;
            height: 40px;
            top: 0;
            left: 0;
        }

        .sec1 {
            background-color: #d8d1bc;

        }

        .product-container {

            display: flex;
            justify-content: space-between;
            padding: 10px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .carousel-container {
            flex: 1;
            max-width: 500px;
            margin-right: 50px;
        }

        .details-container {
            flex: 1;
            padding: 20px;
        }

        .carousel {
            width: 100%;
            position: relative;
        }

        .carousel img {
            width: 100%;
            height: auto;
            display: block;
            cursor: pointer;
        }

        .nav-buttons {
            text-align: center;
            margin-top: 10px;
        }

        .nav-buttons button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
            border-radius: 5px;
        }

        .details-container h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .details-container p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 30px;
        }

        .details-container .buttons {
            display: flex;
            gap: 20px;
        }

        .details-container .buy-now-button,
        .details-container .live-demo-button {
            background-color: #ff4500;
            color: white;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .details-container .buy-now-button:hover {
            background-color: #ff6633;
        }

        .details-container .live-demo-button {
            background-color: #555;
        }

        .details-container .live-demo-button:hover {
            background-color: #777;
        }

        /* Lightbox Styling */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .lightbox img {
            max-width: 80%;
            max-height: 80%;
        }

        .lightbox .close,
        .lightbox .prev,
        .lightbox .next {
            position: absolute;
            color: white;
            font-size: 36px;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }

        .lightbox .close {
            top: 20px;
            right: 30px;
        }

        .lightbox .prev {
            left: 30px;
        }

        .lightbox .next {
            right: 30px;
        }


        /* Basic Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            background-color: #333;
            color: white;
        }

        /* Logo Styling */
        .navbar .logo a {
            font-size: 24px;
            color: white;
            text-decoration: none;
        }

        /* Navigation Links */
        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 15px;
            transition: background-color 0.3s;
        }

        .nav-links li a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Burger Menu */
        .burger {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .burger div {
            width: 25px;
            height: 3px;
            background-color: white;
        }

        /* Responsive Design for Mobile */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 0;
                background-color: #333;
                width: 100%;
                padding: 20px 0;
                text-align: center;
            }

            .nav-links li {
                padding: 10px 0;
            }

            .burger {
                display: flex;
            }

            .navbar.active .nav-links {
                display: flex;
            }
        }

        /* Additional Information List */
        .additional-info {
            list-style: none;
            /* Remove default list styles */
            padding: 0;
            /* Remove default padding */
            margin-top: 15px;
            /* Gap between button and list */
        }

        .additional-info li {
            display: flex;
            /* Use flexbox to align items in a row */
            justify-content: space-between;
            /* Space between labels and details */
            padding: 5px 0;
            /* Vertical padding for each item */
            border-bottom: 1px solid #ddd;
            /* Optional: bottom border for separation */
        }

        .additional-info li:last-child {
            border-bottom: none;
            /* Remove border from the last item */
        }

        .additional-info strong {
            flex: 1;
            /* Label will take up space */
            color: #333;
            /* Label color */
        }

        .additional-info span {
            flex: 2;
            /* Details will take up more space */
            text-align: right;
            /* Align text to the right */
            color: #666;
            /* Details color */
        }

        .img2 {
            max-width: 100%;
        }

        .theme-layout-sec {
            padding: 70px 0;
            background-color: #F5F5F5;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
        }

        .layout-cards {
            display: flex;
            justify-content: space-between;
        }

        .layout-card {
            flex: 1;
            margin: 0 10px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .layout-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .layout-card-inner {
            position: relative;
        }

        .layout-inner-content {
            text-align: center;
            padding: 20px;
        }

        .layout-inner-content h3 {
            font-size: 1.5rem;
            margin: 10px 0;
        }

        .layout-btn {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .layout-card:hover {
            transform: translateY(-10px);
        }

        /* White smoke effect */
        .layout-card:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0));
            z-index: 1;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .layout-cards {
                flex-direction: column;
            }

            .layout-card {
                margin: 10px 0;
            }
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            width: 30%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .box h3 {
            font-size: 1.5em;
            margin-top: 20px;
            margin-bottom: 15px;
            color: #333;
        }

        .box p {
            font-size: 1em;
            color: #666;
        }

        .box svg {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        @media (max-width: 992px) {
            .box {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .box {
                width: 90%;
            }
        }

        .sec3 {
            background-color: #d8d1bc;
        }

        .shopify-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 50px;
            background-color: #eeebeb;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
        }

        .shopify-section h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        .shopify-section p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
        }

        .shopify-gif {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
        }

        .live-demo-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .live-demo-btn:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .shopify-section h2 {
                font-size: 1.8em;
            }

            .shopify-section p {
                font-size: 1.1em;
            }

            .shopify-gif {
                max-width: 100%;
            }
        }

        .slider-container {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 400px;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .slide-title {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            font-size: 1.5em;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .arrow.left {
            left: 10px;
        }

        .arrow.right {
            right: 10px;
        }

        @media (max-width: 768px) {
            .slide-title {
                font-size: 1.2em;
            }

            .arrow {
                padding: 8px;
            }
        }

        .sec5 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Adjust as needed */
            width: 100%;
            background-color: #f5f5f5;
        }

        .container {
            width: 85%;
            margin: 0 auto;
            padding: 20px 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 40px;
            color: #555;
        }

        /* Grid for feature cards in a staircase layout */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 5 equal columns */
            gap: 20px;
        }

        /* Feature card design */
        .feature-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            height: 150px;
            /* Set a fixed height for uniformity */
            display: flex;
            flex-direction: column;
            /* Stack icon and text vertically */
            align-items: center;
            /* Center horizontally */
            justify-content: center;
            /* Center vertically */
        }

        .feature-icon {
            max-width: 100%;
            /* Allow the image to resize */
            max-height: 50px;
            /* Limit the height to maintain uniformity */
            width: auto;
            /* Maintain aspect ratio */
            height: auto;
            /* Maintain aspect ratio */
            margin-bottom: 10px;
            /* Space between icon and text */
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Responsive Design */
        @media screen and (max-width: 992px) {
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
                /* 2 columns in one row */
            }
        }

        @media screen and (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
                /* 1 column per row on mobile */
            }
        }

        .separator {
            width: 80%;
            /* Set width of the separator line */
            border: none;
            /* Remove default border */
            height: 1px;
            /* Set height of the line */
            background-color: #8a8484;
            /* Color of the line */
            margin: 10px 0;
            /* Margin above and below the line */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #479e4a;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .tick {
            color: green;
            font-weight: bold;
            text-align: center;
        }

        .buy-now {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
        }

        .buy-now:hover {
            background-color: #45a049;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            /* Keep this for row separation */
            border-right: 2px solid #acabab;
            /* Add this line for column separation */
        }

        /* Remove the right border from the last column */
        td:last-child,
        th:last-child {
            border-right: none;
            /* Prevent the last column from having a right border */
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
            /* Light shade for odd rows */
        }

        tr:nth-child(even) {
            background-color: #e0e0e0;
            /* Darker shade for even rows */
        }

        .cross {
            color: red;
            /* Color for the cross sign */
            font-size: 18px;
            /* Size of the cross sign */
            display: inline-block;
            /* Align the cross with the checkbox */
            margin-left: 5px;
            /* Space between the checkbox and the cross */
        }

        /* Hide disabled checkboxes */
        input[type="checkbox"]:disabled {
            display: none;
            /* Hide disabled checkboxes */
        }

        /* Optional: Style for the buttons */
        button {
            padding: 10px 20px;
            background-color: #28a745;
            /* Green background */
            color: white;
            /* White text */
            border: none;
            /* No border */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor on hover */
        }

        button:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        /* Optional: Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {

            background-color: #479e4a;
            color: white;

        }

        td {
            border-bottom: 1px solid #ddd;
            /* Horizontal line for rows */
        }

        /* Make enabled checkboxes non-editable */
        input[type="checkbox"]:not(:disabled) {
            pointer-events: none;
            /* Disable interaction */
            opacity: 1;
            /* Keep the checkbox visible */
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            /* Keep this for row separation */
            border-right: 2px solid #acabab;
        }

        td:last-child,
        th:last-child {
            border-right: none;
            /* Prevent the last column from having a right border */
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
            /* Light shade for odd rows */
        }

        tr:nth-child(even) {
            background-color: #e0e0e0;
            /* Darker shade for even rows */
        }

        .timer {
            color: red;
        }

        .paym {
            
            margin-left: 230px;
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <img class="logo" src="16.png">

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <section class="sec1">
        <div class="product-container">
            <!-- Image Carousel Section -->
            <div class="carousel-container">
                <div class="carousel">
                    <img src="1.png" alt="Image 1">
                    <img src="2.png" alt="Image 2" style="display:none;">
                    <img src="3.png" alt="Image 3" style="display:none;">
                    <img src="4.png" alt="Image 4" style="display:none;">
                    <img src="5.png" alt="Image 5" style="display:none;">
                    <img src="6.png" alt="Image 6" style="display:none;">
                    <img src="7.png" alt="Image 7" style="display:none;">
                    <img src="8.png" alt="Image 8" style="display:none;">
                    <img src="9.png" alt="Image 9" style="display:none;">
                    <img src="10.png" alt="Image 10" style="display:none;">
                    <img src="11.png" alt="Image 11" style="display:none;">
                    <img src="12.png" alt="Image 12" style="display:none;">
                    <img src="13.png" alt="Image 13" style="display:none;">
                    <img src="14.png" alt="Image 14" style="display:none;">
                    <img src="15.png" alt="Image 15" style="display:none;">
                </div>
                <div class="nav-buttons">
                    <button class="prev-button">Prev.</button>
                    <button class="next-button">Next</button>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="details-container">
                <h1>Cadence Shopify Theme</h1>
                <ul>
                    <li>Free Theme Installation</li>
                    <li>Free 6 Months of Support</li>
                    <li>Free Lifetime Updates</li>
                    <li>Full Source Code</li>
                </ul>
                <p>Price: <strong>$99.99</strong></p>
                <ul class="additional-info">
                    <li><strong>Last Update:</strong> 25 June 2024</li>
                    <li><strong>Published:</strong> 24 June 2024</li>
                    <li><strong>Resolution:</strong> High</li>
                    <li><strong>Software Version:</strong> Shopify 2.0</li>
                    <li><strong>Files Included:</strong> Liquid Files, CSS Files, JS Files, Shopify Theme Zip files</li>
                    <li><strong>Documentation:</strong> Well Documented</li>
                    <li><strong>Layout:</strong> Responsive</li>
                    <li><strong>Compatible Browsers:</strong> Chrome, IE11, Firefox, Safari, Opera</li>
                </ul>

                <div class="buttons">
                    <button class="buy-now-button" onclick="scrollToBuyNow()">Buy Now</button>
                    <button class="live-demo-button" onclick="window.open('https://cadence-workdo.myshopify.com/')">Live
                        Demo</button>

                </div>
            </div>
        </div>

        <!-- Lightbox for Enlarged Image -->
        <div class="lightbox">
            <span class="close">&times;</span>
            <span class="prev">&#10094;</span>
            <span class="next">&#10095;</span>
            <img src="" alt="Enlarged Image">
        </div>
    </section>
    <section class="sec2" class="theme-layout-sec">
        <div class="container">
            <div class="section-title">
                <h2>Predefined Homepage and More Pages</h2>
                <p>Explore our various pages to discover valuable resources, insightful articles, and engaging content.
                </p>
            </div>

            <div class="layout-cards">
                <div class="layout-card">
                    <div class="layout-card-inner">
                        <a href="javascript:;" class="layout-card-image">
                            <img src="../17.png" alt="Home Page">
                        </a>
                        <div class="layout-inner-content">
                            <h3>
                                <a href="javascript:;" class="layout-btn">Home Page</a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="layout-card">
                    <div class="layout-card-inner">
                        <a href="javascript:;" class="layout-card-image">
                            <img src="../18.png" alt="Product Page">
                        </a>
                        <div class="layout-inner-content">
                            <h3>
                                <a href="javascript:;" class="layout-btn">Product Page</a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="layout-card">
                    <div class="layout-card-inner">
                        <a href="javascript:;" class="layout-card-image">
                            <img src="../19.png" alt="Category Page">
                        </a>
                        <div class="layout-inner-content">
                            <h3>
                                <a href="javascript:;" class="layout-btn">Category Page</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec3">
        <div class="container">
            <div class="box">
                <!-- Add SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <path
                        d="M38.5752 47.6978H31.3773C30.067 47.6978 30.067 45.7178 31.3773 45.7178H38.5752C39.8856 45.7178 39.8856 47.6978 38.5752 47.6978Z"
                        fill="white"></path>
                    <path
                        d="M43.78 51.6616H26.1712C24.8609 51.6616 24.8609 49.6816 26.1712 49.6816H43.78C45.0903 49.6816 45.0903 51.6616 43.78 51.6616Z"
                        fill="white"></path>
                    <path
                        d="M33.9867 18.3389C29.6228 18.5751 25.6932 20.3391 22.6699 23.0636L26.4429 26.8366C28.4533 25.0889 31.0286 23.9044 33.9867 23.6853V18.3389Z"
                        fill="white"></path>
                    <path
                        d="M21.8953 35.7804C22.1056 32.8962 23.2422 30.3407 25.044 28.2383L21.2622 24.4565C18.5192 27.5031 16.775 31.3469 16.5449 35.7804H21.8953Z"
                        fill="white"></path>
                    <path
                        d="M21.8865 37.7603H16.5449C16.7517 41.6534 18.1421 45.2323 20.3914 48.1205C20.735 48.5614 21.3889 48.6093 21.8152 48.2477L24.3708 46.0829C24.7861 45.7309 24.827 45.1245 24.4984 44.6903C23.0186 42.7353 22.0797 40.3519 21.8865 37.7603Z"
                        fill="white"></path>
                    <path
                        d="M50.7854 27.2168C49.8922 28.3137 48.5665 29.9404 47.0846 31.7554C47.7309 33.3024 48.1098 34.9881 48.1098 36.7701C48.1098 39.7643 47.1079 42.5244 45.4209 44.7336C45.1024 45.1508 45.1926 45.7514 45.5939 46.0893L48.1379 48.2308C48.5696 48.5942 49.2305 48.5445 49.5767 48.0988C52.0082 44.9699 53.4558 41.039 53.4558 36.7696C53.4562 33.218 52.4618 29.973 50.7854 27.2168Z"
                        fill="white"></path>
                    <path
                        d="M49.6069 25.5259C46.3707 21.3499 41.4215 18.6342 35.966 18.3398V23.6898C39.3588 23.9485 42.8441 25.5299 45.3186 28.6944C45.3186 28.6944 33.531 37.4442 33.1117 37.864C32.1477 38.828 32.1477 40.3913 33.1117 41.3554C34.0757 42.3194 35.6391 42.3194 36.6031 41.3554C37.2279 40.7301 49.6069 25.5259 49.6069 25.5259ZM49.5576 25.5866C49.558 25.5866 49.558 25.5862 49.558 25.5862L49.5576 25.5866Z"
                        fill="white"></path>

                </svg>
                <h3>Top Speed Guaranteed</h3>
                <p>Experience unmatched speed with our optimized theme performance design.</p>
            </div>

            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M43.3236 50.9833H25.379C25.1351 50.9833 24.9011 51.0803 24.7286 51.2528C24.5561 51.4253 24.4592 51.6592 24.4592 51.9032C24.4592 52.1471 24.5561 52.3811 24.7286 52.5536C24.9011 52.7261 25.1351 52.823 25.379 52.823H43.3236C43.5675 52.823 43.8015 52.7261 43.974 52.5536C44.1465 52.3811 44.2434 52.1471 44.2434 51.9032C44.2434 51.6592 44.1465 51.4253 43.974 51.2528C43.8015 51.0803 43.5675 50.9833 43.3236 50.9833ZM17.9021 45.685C17.7494 45.685 17.603 45.6244 17.495 45.5164C17.387 45.4084 17.3264 45.262 17.3264 45.1093C17.3264 44.9566 17.387 44.8101 17.495 44.7021C17.603 44.5941 17.7494 44.5335 17.9021 44.5335H18.031C18.1067 44.5335 18.1815 44.5484 18.2514 44.5773C18.3212 44.6062 18.3847 44.6487 18.4382 44.7021C18.4917 44.7556 18.5341 44.8191 18.563 44.8889C18.5919 44.9588 18.6068 45.0336 18.6068 45.1093C18.6068 45.1849 18.5919 45.2597 18.563 45.3296C18.5341 45.3995 18.4917 45.4629 18.4382 45.5164C18.3847 45.5699 18.3212 45.6123 18.2514 45.6412C18.1815 45.6701 18.1067 45.685 18.031 45.685H17.9021ZM37.0898 49.8323V47.701H31.6127V49.8323H37.0898ZM31.0685 33.259C31.1895 33.3497 31.2698 33.4845 31.292 33.6341C31.3143 33.7836 31.2766 33.9359 31.1872 34.0579C31.0978 34.1798 30.9639 34.2616 30.8146 34.2855C30.6653 34.3093 30.5126 34.2733 30.3896 34.1852L26.0138 30.9712C25.9402 30.9172 25.8805 30.8465 25.8397 30.7648C25.7989 30.6832 25.7782 30.593 25.7791 30.5018C25.7801 30.4105 25.8028 30.3208 25.8454 30.2401C25.8879 30.1594 25.9491 30.0899 26.0238 30.0375L30.3895 26.8305C30.5124 26.7425 30.6651 26.7064 30.8144 26.7303C30.9637 26.7541 31.0976 26.8359 31.187 26.9579C31.2764 27.0798 31.3141 27.2321 31.2919 27.3817C31.2697 27.5313 31.1893 27.666 31.0684 27.7568L27.323 30.508L31.0685 33.2592L31.0685 33.259ZM38.3131 34.1852C38.2523 34.2308 38.1831 34.2638 38.1095 34.2825C38.0359 34.3011 37.9593 34.305 37.8842 34.2938C37.8091 34.2827 37.7369 34.2567 37.6719 34.2175C37.6069 34.1783 37.5503 34.1265 37.5054 34.0653C37.4605 34.004 37.4282 33.9345 37.4104 33.8607C37.3926 33.7869 37.3895 33.7103 37.4015 33.6353C37.4135 33.5603 37.4402 33.4884 37.4802 33.4238C37.5201 33.3592 37.5724 33.3032 37.6342 33.259L41.3797 30.5078L37.6344 27.7565C37.5727 27.7123 37.5203 27.6563 37.4804 27.5917C37.4405 27.5271 37.4137 27.4552 37.4018 27.3802C37.3898 27.3052 37.3928 27.2286 37.4107 27.1548C37.4285 27.081 37.4608 27.0115 37.5057 26.9502C37.5506 26.889 37.6072 26.8372 37.6722 26.798C37.7372 26.7588 37.8094 26.7328 37.8845 26.7217C37.9596 26.7105 38.0362 26.7144 38.1098 26.733C38.1834 26.7517 38.2526 26.7847 38.3133 26.8303L42.679 30.0373C42.7537 30.0897 42.8148 30.1591 42.8574 30.2398C42.9 30.3206 42.9227 30.4103 42.9236 30.5015C42.9246 30.5928 42.9039 30.6829 42.8631 30.7646C42.8222 30.8462 42.7626 30.9169 42.689 30.9709L38.3132 34.185L38.3131 34.1852ZM32.5944 36.0748C32.5648 36.1442 32.5219 36.2071 32.4681 36.26C32.4143 36.3128 32.3505 36.3545 32.2806 36.3827C32.2106 36.4109 32.1358 36.425 32.0604 36.4243C31.985 36.4236 31.9104 36.408 31.841 36.3785C31.7716 36.349 31.7087 36.3061 31.6559 36.2523C31.6031 36.1984 31.5614 36.1347 31.5332 36.0648C31.505 35.9948 31.4908 35.92 31.4915 35.8446C31.4922 35.7691 31.5078 35.6946 31.5373 35.6252L36.1077 24.9407C36.1673 24.8005 36.2801 24.6898 36.4214 24.6328C36.5627 24.5758 36.7208 24.5773 36.861 24.637C37.0012 24.6966 37.1119 24.8095 37.1689 24.9507C37.2258 25.092 37.2243 25.2501 37.1647 25.3903L32.5944 36.0748ZM49.5854 34.4444H48.1351C48.0882 34.4449 48.0433 34.4638 48.0101 34.497C47.9769 34.5302 47.958 34.5751 47.9574 34.622V35.3945H47.9553C47.9552 35.5251 47.9107 35.6518 47.8289 35.7536C47.7471 35.8553 47.633 35.9262 47.5055 35.9543C46.8112 36.1082 46.1483 36.3798 45.5455 36.7572C45.4347 36.8422 45.2968 36.8841 45.1574 36.8749C45.0181 36.8658 44.8868 36.8064 44.788 36.7077L44.2416 36.1612C44.208 36.1285 44.1629 36.1102 44.116 36.1102C44.069 36.1102 44.0239 36.1285 43.9903 36.1612L42.9647 37.1867C42.932 37.2204 42.9137 37.2655 42.9137 37.3124C42.9137 37.3594 42.932 37.4045 42.9647 37.4381L43.511 37.985L43.5094 37.9867C43.6016 38.0789 43.6596 38.1999 43.6738 38.3296C43.688 38.4593 43.6575 38.5899 43.5874 38.7C43.3921 39.0069 43.2241 39.3303 43.0852 39.6666H43.0843C42.9517 39.9866 42.8461 40.3172 42.7685 40.6549C42.7501 40.7932 42.6821 40.9201 42.5772 41.0121C42.4722 41.104 42.3374 41.1547 42.1979 41.1548H41.4254C41.3784 41.1553 41.3335 41.1742 41.3003 41.2074C41.2671 41.2406 41.2482 41.2854 41.2477 41.3324V42.7827C41.2482 42.8296 41.2671 42.8745 41.3003 42.9077C41.3335 42.941 41.3784 42.9599 41.4254 42.9604H42.1979V42.9626C42.3284 42.9627 42.4551 43.0072 42.5569 43.089C42.6587 43.1708 42.7295 43.2848 42.7577 43.4123C42.834 43.7571 42.9396 44.0947 43.0732 44.4216C43.0774 44.4302 43.0818 44.4395 43.0853 44.4487C43.2177 44.7693 43.3767 45.0783 43.5606 45.3725C43.6456 45.4833 43.6874 45.6212 43.6782 45.7605C43.6691 45.8998 43.6097 46.0311 43.511 46.1299L42.9645 46.6763C42.9481 46.6928 42.9351 46.7124 42.9262 46.734C42.9174 46.7556 42.9129 46.7787 42.913 46.802C42.9129 46.8278 42.9184 46.8534 42.929 46.877L42.9299 46.879C42.9385 46.897 42.9501 46.9134 42.9643 46.9274L43.9898 47.9529C44.0234 47.9857 44.0685 48.0041 44.1154 48.0041C44.1624 48.0041 44.2075 47.9857 44.2411 47.9529L44.7876 47.4065L44.7891 47.4081C44.8814 47.3159 45.0024 47.2579 45.1321 47.2437C45.2618 47.2295 45.3924 47.26 45.5024 47.3301C45.8093 47.5254 46.1328 47.6935 46.4691 47.8324V47.8331C46.7891 47.9657 47.1197 48.0714 47.4573 48.149C47.5956 48.1674 47.7225 48.2354 47.8145 48.3404C47.9064 48.4453 47.9571 48.5801 47.9571 48.7196V49.4921C47.9577 49.539 47.9766 49.5839 48.0098 49.6171C48.043 49.6504 48.0879 49.6693 48.1349 49.6698H49.5851C49.6322 49.6693 49.6771 49.6505 49.7104 49.6172C49.7437 49.584 49.7626 49.5391 49.7631 49.4921V48.7196H49.7654C49.7654 48.589 49.81 48.4624 49.8918 48.3606C49.9735 48.2588 50.0876 48.188 50.2151 48.1598C50.9095 48.0059 51.5724 47.7344 52.1752 47.3569C52.286 47.2719 52.4239 47.2301 52.5632 47.2392C52.7026 47.2484 52.8338 47.3078 52.9326 47.4065L53.4791 47.9529C53.5127 47.9857 53.5578 48.0041 53.6047 48.0041C53.6517 48.0041 53.6968 47.9857 53.7304 47.9529L54.7559 46.9274C54.7887 46.8938 54.8071 46.8487 54.8071 46.8018C54.8071 46.7548 54.7887 46.7097 54.7559 46.6761L54.2095 46.1296L54.2111 46.128C54.1189 46.0358 54.0609 45.9148 54.0467 45.7851C54.0325 45.6554 54.063 45.5248 54.133 45.4148C54.5155 44.8147 54.7925 44.1536 54.9519 43.4601C54.9703 43.3218 55.0383 43.1949 55.1433 43.1029C55.2482 43.011 55.383 42.9603 55.5226 42.9602H56.2951C56.342 42.9597 56.3869 42.9408 56.4201 42.9076C56.4534 42.8744 56.4722 42.8295 56.4728 42.7825V41.3317C56.4722 41.2848 56.4533 41.2399 56.4201 41.2067C56.3869 41.1735 56.342 41.1546 56.2951 41.1541H55.5226V41.1518C55.392 41.1518 55.2654 41.1072 55.1636 41.0254C55.0618 40.9437 54.9909 40.8296 54.9628 40.7021C54.8088 40.0078 54.5373 39.3449 54.1599 38.7421C54.0749 38.6313 54.033 38.4934 54.0422 38.354C54.0513 38.2147 54.1107 38.0834 54.2094 37.9846L54.7559 37.4382C54.7886 37.4045 54.8069 37.3594 54.8069 37.3125C54.8069 37.2655 54.7886 37.2204 54.7559 37.1868L53.7304 36.1613C53.7065 36.1375 53.6762 36.1211 53.6432 36.1143H53.6411L53.6362 36.1133C53.6258 36.1115 53.6152 36.1106 53.6047 36.1107C53.5814 36.1105 53.5584 36.1149 53.5368 36.1237C53.5152 36.1324 53.4956 36.1453 53.4791 36.1617L52.9326 36.7082L52.931 36.7065C52.8387 36.7988 52.7177 36.8568 52.588 36.871C52.4583 36.8851 52.3277 36.8547 52.2177 36.7846C51.6176 36.4022 50.9565 36.1252 50.263 35.9657C50.1247 35.9473 49.9978 35.8793 49.9058 35.7743C49.8139 35.6694 49.7632 35.5346 49.7631 35.3951V34.6226C49.7626 34.5756 49.7437 34.5307 49.7104 34.4975C49.6772 34.4643 49.6324 34.4455 49.5854 34.4449V34.4444ZM41.7862 46.5503C41.8358 46.2893 41.9629 46.0494 42.1509 45.8617L42.3825 45.6301C42.2492 45.3899 42.1296 45.1424 42.0243 44.8887C42.0201 44.8784 42.0162 44.8682 42.0126 44.858C41.9127 44.6138 41.8261 44.3644 41.7531 44.1108H41.4256C41.2511 44.1109 41.0784 44.0764 40.9172 44.0095C40.7561 43.9426 40.6098 43.8445 40.4867 43.7209C40.4089 43.6432 40.341 43.5561 40.2845 43.4618H15.5273V46.5503H41.7862ZM48.1351 33.2934H49.5854C49.9376 33.294 50.2753 33.4342 50.5243 33.6832C50.7734 33.9323 50.9136 34.2699 50.9143 34.6221V34.9497C51.4427 35.1018 51.9522 35.313 52.4333 35.5793L52.6653 35.3473C52.8086 35.2036 52.9831 35.095 53.1753 35.0297V19.1768H15.5273V42.3106H40.0969V41.3317C40.0975 40.9795 40.2377 40.6419 40.4868 40.3928C40.7358 40.1438 41.0734 40.0036 41.4256 40.0029H41.7531C41.8289 39.7397 41.9194 39.4809 42.0243 39.2278L42.0251 39.2259H42.0243C42.1296 38.972 42.2492 38.7244 42.3826 38.4841L42.1506 38.252C41.9019 38.0026 41.7623 37.6647 41.7623 37.3125C41.7623 36.9603 41.9019 36.6224 42.1506 36.3729L43.1761 35.3474C43.4255 35.0988 43.7634 34.9591 44.1157 34.9591C44.4679 34.9591 44.8058 35.0988 45.0552 35.3474L45.2872 35.5795C45.7683 35.3131 46.2778 35.1019 46.8063 34.9499V34.6223C46.8069 34.2701 46.9471 33.9325 47.1962 33.6834C47.4452 33.4344 47.7828 33.2942 48.135 33.2935L48.1351 33.2934ZM45.6029 43.4618H52.1177C51.843 44.0976 51.3882 44.6392 50.8093 45.0196C50.2305 45.4001 49.553 45.6028 48.8603 45.6028C48.1676 45.6028 47.4901 45.4001 46.9113 45.0196C46.3324 44.6392 45.8776 44.0976 45.6029 43.4618ZM51.3681 39.5491C51.6979 39.8781 51.9595 40.269 52.1377 40.6994C52.316 41.1297 52.4074 41.5911 52.4068 42.0569C52.4068 42.1422 52.4038 42.2268 52.3978 42.3106H45.3227C45.317 42.2268 45.3141 42.1422 45.3141 42.0569C45.3141 41.3555 45.5221 40.6698 45.9118 40.0866C46.3015 39.5034 46.8554 39.0488 47.5035 38.7804C48.1515 38.5119 48.8646 38.4417 49.5525 38.5785C50.2405 38.7154 50.8724 39.0531 51.3684 39.5491H51.3681ZM48.8603 37.3592C49.9471 37.3592 51.0004 37.736 51.8406 38.4255C52.6807 39.115 53.2559 40.0744 53.4679 41.1404C53.68 42.2064 53.5159 43.3129 53.0036 44.2714C52.4912 45.23 51.6624 45.9812 50.6583 46.3972C49.6542 46.8131 48.5369 46.868 47.4968 46.5525C46.4567 46.237 45.5582 45.5707 44.9544 44.667C44.3506 43.7633 44.0788 42.6782 44.1853 41.5966C44.2918 40.5149 44.7701 39.5037 45.5386 38.7352C45.9743 38.2983 46.4921 37.9519 47.0621 37.7158C47.6322 37.4796 48.2433 37.3585 48.8603 37.3592Z"
                        fill="white"></path>

                </svg>
                <h3>Optimized Code</h3>
                <p>Navigate effortlessly with high-performance, speed-optimized theme.</p>
            </div>

            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <path d="M29.7549 48.7676H40.2454V51.3902H29.7549V48.7676Z" fill="white"></path>
                    <path
                        d="M23.8542 35.6546C23.8542 33.4851 22.0898 31.7207 19.9203 31.7207C17.7507 31.7207 15.9863 33.4851 15.9863 35.6546C15.9863 37.8242 17.7507 39.5886 19.9203 39.5886C22.0898 39.5886 23.8542 37.8242 23.8542 35.6546ZM17.9533 35.6546C17.9533 34.5682 18.8338 33.6877 19.9203 33.6877C21.0067 33.6877 21.8872 34.5682 21.8872 35.6546C21.8872 36.7411 21.0067 37.6216 19.9203 37.6216C18.8338 37.6216 17.9533 36.7411 17.9533 35.6546Z"
                        fill="white"></path>
                    <path
                        d="M42.2129 52.7017H27.7884C26.9335 52.7017 26.2044 53.2498 25.9336 54.013H44.0677C43.7969 53.2498 43.0678 52.7017 42.2129 52.7017Z"
                        fill="white"></path>
                    <path
                        d="M40.2455 22.5565H41.5568C41.9187 22.5565 42.2125 22.2621 42.2125 21.9008V19.2782C42.2125 18.9169 41.9187 18.6226 41.5568 18.6226H40.2455C39.8836 18.6226 39.5898 18.9169 39.5898 19.2782V21.9008C39.5898 22.2621 39.8836 22.5565 40.2455 22.5565Z"
                        fill="white"></path>
                    <path
                        d="M25.8217 25.1792H33.0339V27.4346C33.0339 27.6982 33.3617 27.8752 33.58 27.7284L37.4255 25.1792H44.18C44.542 25.1792 44.8357 24.8848 44.8357 24.5235V16.6557C44.8357 16.2944 44.542 16 44.18 16H25.8217C25.4597 16 25.166 16.2944 25.166 16.6557V24.5235C25.166 24.8848 25.4597 25.1792 25.8217 25.1792ZM38.2791 19.2783C38.2791 18.1938 39.1616 17.3113 40.2461 17.3113H41.5574C42.6419 17.3113 43.5244 18.1938 43.5244 19.2783V21.9009C43.5244 22.9854 42.6419 23.8679 41.5574 23.8679H40.2461C39.1616 23.8679 38.2791 22.9854 38.2791 21.9009V19.2783ZM33.0339 19.2783C33.0339 18.1938 33.9164 17.3113 35.0008 17.3113H36.9678V18.6226H35.0008C34.6389 18.6226 34.3452 18.917 34.3452 19.2783V19.9339H36.9678V21.2452H34.3452V21.9009C34.3452 22.2622 34.6389 22.5566 35.0008 22.5566H36.9678V23.8679H35.0008C33.9164 23.8679 33.0339 22.9854 33.0339 21.9009V19.2783ZM29.7556 21.2452H28.4443C27.3598 21.2452 26.4773 20.3627 26.4773 19.2783C26.4773 18.1938 27.3598 17.3113 28.4443 17.3113H29.7556C30.8401 17.3113 31.7226 18.1938 31.7226 19.2783H30.4113C30.4113 18.917 30.1175 18.6226 29.7556 18.6226H28.4443C28.0824 18.6226 27.7886 18.917 27.7886 19.2783C27.7886 19.6395 28.0824 19.9339 28.4443 19.9339H29.7556C30.8401 19.9339 31.7226 20.8164 31.7226 21.9009C31.7226 22.9854 30.8401 23.8679 29.7556 23.8679H28.4443C27.3598 23.8679 26.4773 22.9854 26.4773 21.9009H27.7886C27.7886 22.2622 28.0824 22.5566 28.4443 22.5566H29.7556C30.1175 22.5566 30.4113 22.2622 30.4113 21.9009C30.4113 21.5396 30.1175 21.2452 29.7556 21.2452Z"
                        fill="white"></path>
                    <path
                        d="M25.1207 34.9991H28.4442V33.6878H31.0668V39.5887H33.6895V31.0652H36.3121V39.5887H38.9347V32.3765H41.5573V34.9991H46.1469V29.0982H51.3922V27.1313C51.3922 26.0468 50.5096 25.1643 49.4252 25.1643H46.0309C45.7634 25.9334 45.0389 26.4907 44.1799 26.4907H37.8214L34.3051 28.8216C34.0311 29.0025 33.7137 29.0982 33.3859 29.0982C32.4686 29.0982 31.7225 28.3521 31.7225 27.4348V26.4907H25.8216C24.9627 26.4907 24.2382 25.9334 23.9707 25.1643H20.5763C19.4919 25.1643 18.6094 26.0468 18.6094 27.1313V30.582C19.0297 30.4732 19.467 30.4096 19.9207 30.4096C22.5905 30.4096 24.7961 32.4159 25.1207 34.9991Z"
                        fill="white"></path>
                    <path
                        d="M46.1469 36.3103H41.5573V39.5886H43.5243V40.8999H26.4772V39.5886H28.4442V36.3103H25.1207C24.7961 38.8936 22.5905 40.8999 19.9207 40.8999C19.467 40.8999 19.0297 40.8363 18.6094 40.7275V42.2112H51.3922V40.8999H46.1469V36.3103Z"
                        fill="white"></path>
                    <path
                        d="M47.458 30.4092V39.5884H54.0146V30.4092H47.458ZM52.7033 38.277H48.7693V36.9657H52.7033V38.277ZM52.7033 35.6544H48.7693V34.3431H52.7033V35.6544ZM52.7033 33.0318H48.7693V31.7205H52.7033V33.0318Z"
                        fill="white"></path>
                    <path
                        d="M18.6094 45.4894C18.6094 46.5739 19.4919 47.4564 20.5763 47.4564H49.4252C50.5096 47.4564 51.3922 46.5739 51.3922 45.4894V43.5225H18.6094V45.4894ZM37.6234 44.8338C37.9853 44.8338 38.279 45.1275 38.279 45.4894C38.279 45.8513 37.9853 46.1451 37.6234 46.1451C37.2615 46.1451 36.9677 45.8513 36.9677 45.4894C36.9677 45.1275 37.2615 44.8338 37.6234 44.8338ZM35.0008 44.8338C35.3627 44.8338 35.6564 45.1275 35.6564 45.4894C35.6564 45.8513 35.3627 46.1451 35.0008 46.1451C34.6388 46.1451 34.3451 45.8513 34.3451 45.4894C34.3451 45.1275 34.6388 44.8338 35.0008 44.8338ZM32.3781 44.8338C32.7401 44.8338 33.0338 45.1275 33.0338 45.4894C33.0338 45.8513 32.7401 46.1451 32.3781 46.1451C32.0162 46.1451 31.7225 45.8513 31.7225 45.4894C31.7225 45.1275 32.0162 44.8338 32.3781 44.8338Z"
                        fill="white"></path>

                </svg>
                <h3>SEO Optimized</h3>
                <p>Unlock unparalleled speed with our SEO-optimized theme design.</p>
            </div>

            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <path
                        d="M50.4375 45.6875H34.8314C34.3003 43.6447 32.4573 42.125 30.25 42.125C28.0427 42.125 26.1997 43.6447 25.6686 45.6875H19.5625C18.9061 45.6875 18.375 46.2192 18.375 46.875C18.375 47.5308 18.9061 48.0625 19.5625 48.0625H25.6686C26.1997 50.1053 28.0427 51.625 30.25 51.625C32.4573 51.625 34.3003 50.1053 34.8314 48.0625H50.4375C51.0939 48.0625 51.625 47.5308 51.625 46.875C51.625 46.2192 51.0939 45.6875 50.4375 45.6875ZM30.25 49.25C28.9408 49.25 27.875 48.1848 27.875 46.875C27.875 45.5652 28.9408 44.5 30.25 44.5C31.5592 44.5 32.625 45.5652 32.625 46.875C32.625 48.1848 31.5592 49.25 30.25 49.25ZM50.4375 33.8125H44.3314C43.8003 31.7697 41.9573 30.25 39.75 30.25C37.5427 30.25 35.6997 31.7697 35.1686 33.8125H19.5625C18.9061 33.8125 18.375 34.3442 18.375 35C18.375 35.6558 18.9061 36.1875 19.5625 36.1875H35.1686C35.6997 38.2303 37.5427 39.75 39.75 39.75C41.9573 39.75 43.8003 38.2303 44.3314 36.1875H50.4375C51.0939 36.1875 51.625 35.6558 51.625 35C51.625 34.3442 51.0939 33.8125 50.4375 33.8125ZM39.75 37.375C38.4408 37.375 37.375 36.3098 37.375 35C37.375 33.6902 38.4408 32.625 39.75 32.625C41.0592 32.625 42.125 33.6902 42.125 35C42.125 36.3098 41.0592 37.375 39.75 37.375ZM19.5625 24.3125H25.6686C26.1997 26.3553 28.0427 27.875 30.25 27.875C32.4573 27.875 34.3003 26.3553 34.8314 24.3125H50.4375C51.0939 24.3125 51.625 23.7808 51.625 23.125C51.625 22.4692 51.0939 21.9375 50.4375 21.9375H34.8314C34.3003 19.8947 32.4573 18.375 30.25 18.375C28.0427 18.375 26.1997 19.8947 25.6686 21.9375H19.5625C18.9061 21.9375 18.375 22.4692 18.375 23.125C18.375 23.7808 18.9061 24.3125 19.5625 24.3125ZM30.25 20.75C31.5592 20.75 32.625 21.8152 32.625 23.125C32.625 24.4348 31.5592 25.5 30.25 25.5C28.9408 25.5 27.875 24.4348 27.875 23.125C27.875 21.8152 28.9408 20.75 30.25 20.75Z"
                        fill="white"></path>
                </svg>
                <h3>Easy to Use & Customize</h3>
                <p>Effortlessly personalize with our high-performance theme navigation.</p>
            </div>

            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <path
                        d="M40.7143 17.3571C40.7121 16.6085 40.1057 16.0022 39.3571 16H20.3571C19.6085 16.0022 19.0022 16.6085 19 17.3571V20.0714H40.7143V17.3571ZM29.8571 18.7143H26.4643C26.0895 18.7143 25.7857 18.4105 25.7857 18.0357C25.7857 17.6609 26.0895 17.3571 26.4643 17.3571H29.8571C30.2319 17.3571 30.5357 17.6609 30.5357 18.0357C30.5357 18.4105 30.2319 18.7143 29.8571 18.7143ZM33.25 18.7143H32.5714C32.1967 18.7143 31.8929 18.4105 31.8929 18.0357C31.8929 17.6609 32.1967 17.3571 32.5714 17.3571H33.25C33.6248 17.3571 33.9286 17.6609 33.9286 18.0357C33.9286 18.4105 33.6248 18.7143 33.25 18.7143Z"
                        fill="white"></path>
                    <path
                        d="M29.8569 24.8215C25.7345 24.8215 22.3926 28.1634 22.3926 32.2858C22.3926 36.4082 25.7345 39.7501 29.8569 39.7501C33.9793 39.7501 37.3211 36.4082 37.3211 32.2858C37.3185 28.1645 33.9782 24.8242 29.8569 24.8215ZM31.8926 28.893C31.8926 28.5182 32.1964 28.2144 32.5711 28.2144C32.9459 28.2144 33.2497 28.5182 33.2497 28.893V30.2501C33.2497 30.6249 32.9459 30.9287 32.5711 30.9287C32.1964 30.9287 31.8926 30.6249 31.8926 30.2501V28.893ZM26.464 28.893C26.464 28.5182 26.7678 28.2144 27.1426 28.2144C27.5173 28.2144 27.8211 28.5182 27.8211 28.893V30.2501C27.8211 30.6249 27.5173 30.9287 27.1426 30.9287C26.7678 30.9287 26.464 30.6249 26.464 30.2501V28.893ZM33.8944 34.5387C33.8604 34.6405 33.0258 37.0358 29.8569 37.0358C26.6879 37.0358 25.8533 34.6405 25.8194 34.5387C25.6994 34.1826 25.8908 33.7968 26.2469 33.6769C26.6029 33.557 26.9887 33.7484 27.1086 34.1044C27.129 34.1655 27.6922 35.6787 29.8569 35.6787C32.0554 35.6787 32.5983 34.1247 32.6051 34.1044C32.6827 33.8741 32.8772 33.7027 33.1155 33.6547C33.3537 33.6067 33.5994 33.6895 33.7601 33.8718C33.9208 34.0542 33.9719 34.3084 33.8944 34.5387Z"
                        fill="white"></path>
                    <path
                        d="M48.8567 37.7144C44.3595 37.7144 40.7139 41.36 40.7139 45.8572C40.7139 50.3544 44.3595 54.0001 48.8567 54.0001C53.3539 54.0001 56.9996 50.3544 56.9996 45.8572C56.9958 41.3616 53.3524 37.7181 48.8567 37.7144ZM52.8332 42.1251L48.0832 50.2679C47.9805 50.4514 47.7965 50.5749 47.5878 50.6004C47.5587 50.6061 47.5291 50.6083 47.4996 50.6072C47.3193 50.6077 47.1461 50.537 47.0178 50.4104L44.9821 48.3747C44.716 48.1086 44.716 47.6772 44.9821 47.4111C45.2482 47.1451 45.6796 47.1451 45.9457 47.4111L47.3571 48.8294L51.666 41.4465C51.7845 41.2326 52.0094 41.0995 52.254 41.0985C52.4985 41.0976 52.7245 41.2289 52.8447 41.4419C52.9648 41.6549 52.9604 41.9162 52.8332 42.1251Z"
                        fill="white"></path>
                    <path
                        d="M40.7143 21.4285H19V43.1428H39.7575C39.9855 42.3886 40.3069 41.666 40.7143 40.9917V21.4285ZM29.8571 41.107C24.9852 41.107 21.0357 37.1576 21.0357 32.2856C21.0357 27.4137 24.9852 23.4642 29.8571 23.4642C34.7291 23.4642 38.6786 27.4137 38.6786 32.2856C38.6741 37.1557 34.7272 41.1026 29.8571 41.107Z"
                        fill="white"></path>
                    <path
                        d="M39.4657 44.5H19V47.2143C19.0022 47.9629 19.6085 48.5692 20.3571 48.5714H39.3571C39.4882 48.5677 39.6181 48.5472 39.7439 48.5104C39.4869 47.6494 39.3566 46.7556 39.3571 45.8571C39.3624 45.4028 39.3987 44.9494 39.4657 44.5ZM31.2143 47.2143H28.5C28.1252 47.2143 27.8214 46.9105 27.8214 46.5357C27.8214 46.1609 28.1252 45.8571 28.5 45.8571H31.2143C31.5891 45.8571 31.8929 46.1609 31.8929 46.5357C31.8929 46.9105 31.5891 47.2143 31.2143 47.2143Z"
                        fill="white"></path>
                </svg>
                <h3>Mobile Friendly</h3>
                <p>Optimized design ensures performance, surpassing other themes in speed.</p>
            </div>

            <div class="box">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none">
                    <rect width="70" height="70" rx="10" fill="#6FD943"></rect>
                    <path
                        d="M0 10C0 4.47715 4.47715 0 10 0H45C58.8071 0 70 11.1929 70 25V60C70 65.5229 65.5229 70 60 70H10C4.47715 70 0 65.5229 0 60V10Z"
                        fill="#013D29"></path>
                    <g clip-path="url(#clip0_44_4128)">
                        <path
                            d="M41.7079 41.0277C41.7079 42.946 40.1525 44.5017 38.234 44.5017C36.3152 44.5017 34.7598 42.946 34.7598 41.0277C34.7598 39.1092 36.3152 37.5537 38.234 37.5537C40.1525 37.5537 41.7079 39.1092 41.7079 41.0277Z"
                            fill="white"></path>
                        <path
                            d="M49.3505 21.573V18.7938C49.3505 18.0263 48.7285 17.4043 47.961 17.4043H17.3895C16.622 17.4043 16 18.0263 16 18.7938V46.5861C16 47.3534 16.622 47.9756 17.3895 47.9756H20.1687V24.3523C20.1687 22.8176 21.4133 21.573 22.948 21.573H49.3505ZM22.948 18.7938H24.3377V20.1835H22.948V18.7938ZM18.7792 20.1835H17.3895V18.7938H18.7792V20.1835ZM21.5585 20.1835H20.1687V18.7938H21.5585V20.1835Z"
                            fill="white"></path>
                        <path
                            d="M45.6256 39.117C45.4479 38.4271 45.1744 37.7658 44.8125 37.1521C44.6517 36.8792 44.6958 36.5318 44.9196 36.3081L46.0944 35.1323L44.1294 33.1667L42.9539 34.3422C42.7297 34.5664 42.3823 34.6105 42.1093 34.4493C41.496 34.0874 40.8345 33.8136 40.1449 33.6361C39.8382 33.5573 39.6237 33.2807 39.6237 32.9638V31.3005H36.8445V32.9638C36.8445 33.2807 36.6301 33.5573 36.3233 33.6361C35.6338 33.8136 34.9723 34.0874 34.359 34.4493C34.0859 34.6105 33.7386 34.5664 33.5144 34.3422L32.3388 33.1667L30.3738 35.1323L31.5489 36.3081C31.7723 36.5318 31.8164 36.8785 31.6558 37.1512C31.5235 37.3765 31.4032 37.6085 31.2945 37.8459C31.1064 38.2561 30.955 38.6828 30.8427 39.1197C30.7636 39.4264 30.487 39.6408 30.1703 39.6408H28.5068V42.4201H30.1703C30.487 42.4201 30.7636 42.6345 30.8427 42.9412C31.0204 43.631 31.2939 44.2923 31.6558 44.9062C31.8168 45.1789 31.7725 45.5262 31.5489 45.7502L30.3738 46.9257L32.3388 48.8912L33.5144 47.7159C33.7386 47.4917 34.0859 47.4473 34.359 47.6088C34.9723 47.9707 35.6338 48.2444 36.3233 48.4217C36.6301 48.501 36.8445 48.7778 36.8445 49.0943V50.7549H39.6237V49.0915C39.6237 48.7745 39.8382 48.4982 40.1449 48.4191C40.8345 48.2418 41.496 47.9679 42.1093 47.6059C42.3823 47.4447 42.7297 47.4888 42.9539 47.713L44.1294 48.8886L46.0944 46.9229L44.9196 45.7476C44.6958 45.5236 44.6517 45.1763 44.8125 44.9034C45.1744 44.2895 45.4479 43.6282 45.6256 42.9384C45.7047 42.6319 45.9812 42.4174 46.298 42.4174H47.9614V39.6382H46.298C45.9812 39.6382 45.7047 39.4238 45.6256 39.117ZM38.2342 45.8914C35.5478 45.8914 33.3705 43.714 33.3705 41.0277C33.3705 38.3413 35.5478 36.164 38.2342 36.164C40.9205 36.164 43.0977 38.3413 43.0977 41.0277C43.0949 43.7125 40.919 45.8882 38.2342 45.8914Z"
                            fill="white"></path>
                        <path
                            d="M54.8173 24.2423C54.8119 23.4752 54.1858 22.8574 53.4187 22.8626L22.8474 23.0633C22.0799 23.0685 21.4618 23.6944 21.4668 24.4622L21.6493 52.2544C21.6547 53.0213 22.2811 53.6392 23.0482 53.634L53.6197 53.4332C54.3874 53.4282 55.0055 52.8015 55 52.0337L54.8173 24.2423ZM28.5065 24.3522H29.8962V25.742H28.5065V24.3522ZM25.7272 24.3522H27.117V25.742H25.7272V24.3522ZM22.948 24.3522H24.3377V25.742H22.948V24.3522ZM22.948 30.6057H28.5065V31.9952H22.948V30.6057ZM22.948 34.7744V33.3847H27.117V34.7744H22.948ZM48.6558 43.8068H46.8194C46.6724 44.2633 46.489 44.7071 46.2698 45.134L47.5685 46.4316C47.8394 46.7029 47.8394 47.1426 47.5685 47.4142L44.6203 50.3622C44.3489 50.6334 43.9092 50.6334 43.6379 50.3622L42.3403 49.0642C41.9129 49.2825 41.4693 49.4659 41.0131 49.6132V51.4498C41.0131 51.8332 40.702 52.1445 40.3181 52.1445H36.1494C35.7655 52.1445 35.4546 51.8332 35.4546 51.4498V49.6132C34.9984 49.4659 34.5546 49.2825 34.1275 49.0642L32.8299 50.3622C32.5583 50.6334 32.1186 50.6334 31.8473 50.3622L28.899 47.4142C28.6281 47.1426 28.6281 46.7029 28.899 46.4316L30.1977 45.134C29.9787 44.7071 29.7952 44.2633 29.6481 43.8068H27.8117C27.4281 43.8068 27.117 43.4955 27.117 43.1121V38.9431C27.117 38.5595 27.4281 38.2484 27.8117 38.2484H29.6481C29.7561 37.9132 29.8836 37.5849 30.0302 37.2645C30.0832 37.1491 30.1389 37.0353 30.1971 36.9212L28.899 35.6234C28.6281 35.3518 28.6281 34.9123 28.899 34.6408L31.8473 31.6928C32.1186 31.4216 32.5583 31.4216 32.8299 31.6928L34.1275 32.9906C34.5546 32.7727 34.9984 32.5889 35.4546 32.4418V30.6057C35.4546 30.2218 35.7655 29.9107 36.1494 29.9107H40.3181C40.702 29.9107 41.0131 30.2218 41.0131 30.6057V32.4418C41.4693 32.5889 41.9129 32.7727 42.3403 32.9906L43.6379 31.6928C43.9092 31.4216 44.3489 31.4216 44.6203 31.6928L47.5685 34.6408C47.8394 34.9123 47.8394 35.3518 47.5685 35.6234L46.2698 36.9212C46.489 37.3479 46.6724 37.7917 46.8194 38.2484H48.6558C49.0397 38.2484 49.3506 38.5595 49.3506 38.9431V43.1121C49.3506 43.4955 49.0397 43.8068 48.6558 43.8068ZM53.5195 52.1445H49.3506V50.7548H53.5195V52.1445ZM53.5195 28.5212H22.948V27.1315H53.5195V28.5212Z"
                            fill="white"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_44_4128">
                            <rect width="39" height="39" fill="white" transform="translate(16 16)"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <h3>Premium Features</h3>
                <p>Unlock premium functionality alongside lightning-fast speed with design.</p>
            </div>
        </div>
    </section>
    <section class="shopify-section">
        <!-- Text Above the GIF -->
        <h2>Shopify's Intuitive Drag & Drop Interface</h2>
        <p>The premier Shopify drag-and-drop theme requires no coding. Instantly reveal all elements for effortless
            navigation, perfect for showcasing options and site pages.</p>

        <!-- GIF Section -->
        <img src="20.gif" alt="" class="shopify-gif">

        <!-- Live Demo Button -->
        <a href="https://cadence-workdo.myshopify.com/" class="live-demo-btn">Live Demo</a>
    </section>
    <section class="sec5">
        <div class="slider-container">
            <!-- Left Arrow -->
            <button class="arrow left" onclick="moveSlide(-1)">&#10094;</button>

            <div class="slider-wrapper" id="sliderWrapper">
                <!-- Slide 1: Blog Page -->
                <div class="slide">
                    <img src="22.png" alt="Blog Page">
                    <div class="slide-title">Blog Page</div>
                </div>

                <!-- Slide 2: Article Page -->
                <div class="slide">
                    <img src="24.png" alt="Article Page">
                    <div class="slide-title">Article Page</div>
                </div>

                <!-- Slide 3: Wishlist Page -->
                <div class="slide">
                    <img src="21.png" alt="Wishlist Page">
                    <div class="slide-title">Wishlist Page</div>
                </div>

                <!-- Slide 4: FAQ Page -->
                <div class="slide">
                    <img src="23.png" alt="FAQ Page">
                    <div class="slide-title">FAQ Page</div>
                </div>

                <!-- Slide 5: Compare Page -->
                <div class="slide">
                    <img src="21.png" alt="Compare Page">
                    <div class="slide-title">Compare Page</div>
                </div>
            </div>

            <!-- Right Arrow -->
            <button class="arrow right" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </section>
    <section class="features-section">
        <div class="container">
            <h2>More Outstanding Features</h2>
            <p>Choose from a great number of design elements, pre-built layouts, and advanced theme options, or easily
                customize layouts that fit your needs.</p>

            <div class="features-grid">
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-01.png"
                        alt="Ge's SEO Icon" class="feature-icon">
                    <hr class="separator">
                    Google's SEO
                    <p>Seamlessly adapts for smooth browsing.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-02.png"
                        alt="Mobile Optimized Icon" class="feature-icon">
                    <hr class="separator">Mobile Optimized
                    <p>Adapts to all devices for easy browsing.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-03.png"
                        alt="Shopify's Font Picker Icon" class="feature-icon">
                    <hr class="separator">Shopify's Font Picker
                    <p>Customize fonts to match brand.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-04.png"
                        alt="Lazy Loading Images Icon" class="feature-icon">
                    <hr class="separator"> Lazy Loading Images
                    <p>Faster loading, images load dynamically.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-05.png"
                        alt="Custom Product Tabs Icon" class="feature-icon">
                    <hr class="separator">Custom Product Tabs
                    <p>Organize product details for better clarity.</p>


                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-06.png"
                        alt="GDPR Cookie Popup Icon" class="feature-icon">
                    <hr class="separator">GDPR Cookie Popup
                    <p>Stay compliant, user-friendly cookie popup.</p>

                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-07.png"
                        alt="Builder Sections Home Icon" class="feature-icon">
                    <hr class="separator"> Builder Sections Home
                    <p>Effortlessly create unique homepage layout.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-08.png"
                        alt="Sticky Add to Cart Icon" class="feature-icon">
                    <hr class="separator"> Sticky Add to Cart
                    <p>Keep 'Add to Cart' accessible.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-09.png"
                        alt="Ajax Cart Popup Icon" class="feature-icon">
                    <hr class="separator">Ajax Cart Popup
                    <p>Most convenient cart preview.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-10.png"
                        alt="Custom Logo Icon" class="feature-icon">
                    <hr class="separator"> Custom Logo
                    <p>Showcase brand identity, personalized logo.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-11.png"
                        alt="Newsletter Signup Icon" class="feature-icon">
                    <hr class="separator">Newsletter Signup
                    <p>Grow audience, easy-to-use signup form.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-12.png"
                        alt="free banner image" class="feature-icon">
                    <hr class="separator">HTML5 And CSS3 Tableless
                    <p>Modern code structure, good performance.</p>

                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-13.png"
                        alt="Multiple Currencies Icon" class="feature-icon">
                    <hr class="separator">Multiple Currencies
                    <p>Cater to global shoppers, currency options.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-14.png"
                        alt="Stock Countdown Icon" class="feature-icon">
                    <hr class="separator">Stock Countdown
                    <p>Drive urgency, countdown for limited items.</p>

                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-15.png"
                        alt="Product Reviews Icon" class="feature-icon">
                    <hr class="separator">Product Reviews
                    <p>Build trust, customer feedback ratings.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-16.png"
                        alt="Compare Product Icon" class="feature-icon">
                    <hr class="separator">Compare Product
                    <p>Simplify, compare products with ease.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-17.png"
                        alt="Wishlist Product Icon" class="feature-icon">
                    <hr class="separator">Wishlist Product
                    <p>Allow customers save items purchase.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-18.png"
                        alt="Quick View Product Icon" class="feature-icon">
                    <hr class="separator"> Quick View Product
                    <p>Enable fast product previews browsing.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-19.png"
                        alt="Powerful Filters Icon" class="feature-icon">
                    <hr class="separator">
                    Powerful Filters
                    <p> Enhance navigation, robust filtering options.</p>
                </div>
                <div class="feature-card">
                    <img src="https://workdo.io/wp-content/themes/storefront-child/assets/images/themes/shopify/shopify-common/sp-feature-20.png"
                        alt="Fully Customizable Icon" class="feature-icon">
                    <hr class="separator"> Fully Customizable
                    <p>Tailor store exact specifications.</p>
                </div>
            </div>

        </div>
    </section>
    <section class="shopify-section">
        <h2> One-Time Charge No More Monthly Fee</h2>
        Save over $2,000/year on a long list of apps(that you should be using anyway)
        <table>
            <thead>
                <tr>
                    <th>Features</th>
                    <th>Shopify App Cost</th>
                    <th>Conversion Rate</th>
                    <th>Our Rate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Countdown Timer</td>
                    <td>$144.00</td>
                    <td>0.5%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Size Chart</td>
                    <td>$48.00</td>
                    <td>0.1%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Newsletter PopUp</td>
                    <td>$180.00</td>
                    <td>0.45%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Ajax Block Search</td>
                    <td>$144.00</td>
                    <td>0.35%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Google Map</td>
                    <td>$240.00</td>
                    <td>0.2%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Mega Menu</td>
                    <td>$60.00</td>
                    <td>0.12%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Cookie Bar</td>
                    <td>$36.00</td>
                    <td>0.08%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Wishlist Products</td>
                    <td>$144.00</td>
                    <td>0.5%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Products Tabs</td>
                    <td>$60.00</td>
                    <td>0.2%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Recently Viewed Products</td>
                    <td>$36.00</td>
                    <td>0.2%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Color Swatches</td>
                    <td>$240.00</td>
                    <td>0.2%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Cart Drawer</td>
                    <td>$108.00</td>
                    <td>0.4%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Product Filter</td>
                    <td>$240.00</td>
                    <td>0.8%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Lookbook</td>
                    <td>$290.00</td>
                    <td>0.6%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Product Recommendation</td>
                    <td>$144.00</td>
                    <td>0.5%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Product Quick View</td>
                    <td>$79.00</td>
                    <td>0.8%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Products Comparison</td>
                    <td>$60.00</td>
                    <td>0.5%</td>
                    <td class="tick">✔ FREE</td>
                </tr>
                <tr>
                    <td>Total:</td>
                    <td>+$2000.00/year
                        Standalone cost</td>
                    <td>+7.50% *
                        Expected CR Increase</td>
                    <td><button class="buy-now" onclick="scrollToBuyNow()">Buy Now</button></td>
                </tr>
            </tbody>
        </table>
    </section>
    <section id="buy-now" class="shopify-section">
        <h2>Grab Your Deal Now!</h2>
        <table>
            <thead>
                <tr>
                    <th>Features</th>
                    <th>Basic Plan </th>
                    <th>Medium Plan </th>
                    <th>Professional Plan </th>
                </tr>
            </thead>
            <tr>
                <td>Blog Pages</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Newsletter Signup Page</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Product Gallery</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>User Account Dashboard</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Wishlist Functionality</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Product Quick View</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Mobile Responsiveness</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>SEO Optimization Tools</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Advanced Analytics</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Social Media Integration</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Customizable Checkout</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Live Chat Support</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Discount Coupons</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Product Comparison Feature</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Payment Gateway Options</td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Customer Reviews</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>Secure SSL Certification</td>
                <td><input type="checkbox" disabled><span class="cross">✖</span></td>
                <td><input type="checkbox" checked></td>
                <td><input type="checkbox" checked></td>
            </tr>
            <tr>
                <td>
                    <h3>Total</h3>
                </td>
                <td>
                    ₹12000<br>
                    <small style="color: red; text-decoration: line-through;">Price Drop: ₹15000</small><br>
                    <small style="color: green;">Limited Time Offer!</small><br>
                    <span class="timer" data-time="3:00:00">03:00:00</span><!-- Timer for Basic Plan -->

                </td>
                <td>
                    ₹18000<br>
                    <small style="color: red; text-decoration: line-through;">Price Drop: ₹20000</small><br>
                    <small style="color: green;">Limited Time Offer!</small><br>
                    <span class="timer" data-time="3:00:00">03:00:00</span><!-- Timer for Medium Plan -->

                </td>
                <td>
                    ₹23000<br>
                    <small style="color: red; text-decoration: line-through; ">Price Drop: ₹30000</small><br>
                    <small style="color: green;">Limited Time Offer!</small><br>
                    <span class="timer" data-time="3:00:00">03:00:00</span> <!-- Timer for Professional Plan -->



                </td>
            </tr>

        </table>
        <div style="display: flex; gap: 50px;"class="paym">
            <a href="checkout1.php">
                <button type="button">Buy Basic</button>
            </a>
            <a href="checkout2.php">
                <button type="button">Buy Medium</button>
            </a>
            <a href="checkout3.php">
                <button type="button">Buy Professional</button>
            </a>
        </div>
    </section>
    <script>
        const images = document.querySelectorAll('.carousel img');
        let currentImageIndex = 0;

        document.querySelector('.next-button').addEventListener('click', () => {
            images[currentImageIndex].style.display = 'none';
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].style.display = 'block';
        });

        document.querySelector('.prev-button').addEventListener('click', () => {
            images[currentImageIndex].style.display = 'none';
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            images[currentImageIndex].style.display = 'block';
        });

        // Lightbox Functionality
        const lightbox = document.querySelector('.lightbox');
        const lightboxImage = lightbox.querySelector('img');
        const closeLightbox = document.querySelector('.lightbox .close');
        const prevLightbox = document.querySelector('.lightbox .prev');
        const nextLightbox = document.querySelector('.lightbox .next');

        images.forEach((img, index) => {
            img.addEventListener('click', () => {
                lightbox.style.display = 'flex';
                lightboxImage.src = img.src;
                currentImageIndex = index;
            });
        });

        closeLightbox.addEventListener('click', () => {
            lightbox.style.display = 'none';
        });

        prevLightbox.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            lightboxImage.src = images[currentImageIndex].src;
        });

        nextLightbox.addEventListener('click', () => {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            lightboxImage.src = images[currentImageIndex].src;
        });

        // Burger menu toggle
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav-links');

        burger.addEventListener('click', () => {
            nav.classList.toggle('active');
        });

        const sliderWrapper = document.getElementById('sliderWrapper');
        let currentSlide = 0;

        function moveSlide(direction) {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;
            currentSlide += direction;

            if (currentSlide >= totalSlides) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            }

            const slideWidth = slides[0].clientWidth;
            sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }
        function startTimer(element) {
            let timeRemaining = element.getAttribute('data-time').split(':');
            let hours = parseInt(timeRemaining[0]);
            let minutes = parseInt(timeRemaining[1]);
            let seconds = parseInt(timeRemaining[2]);

            const interval = setInterval(() => {
                // Decrease time
                if (seconds === 0) {
                    if (minutes === 0) {
                        if (hours === 0) {
                            clearInterval(interval);
                            element.innerHTML = "Time's up!";
                            return;
                        }
                        hours--;
                        minutes = 59;
                        seconds = 59;
                    } else {
                        minutes--;
                        seconds = 59;
                    }
                } else {
                    seconds--;
                }

                // Format time with leading zeros
                element.innerHTML =
                    (hours < 10 ? "0" + hours : hours) + ":" +
                    (minutes < 10 ? "0" + minutes : minutes) + ":" +
                    (seconds < 10 ? "0" + seconds : seconds);
            }, 1000);
        }

        // Start the countdown timers
        document.querySelectorAll('.timer').forEach(timer => {
            startTimer(timer);
        });
        function scrollToBuyNow() {
            const element = document.getElementById("buy-now");
            element.scrollIntoView({ behavior: 'smooth' });
        }

    </script>

</body>

</html>
