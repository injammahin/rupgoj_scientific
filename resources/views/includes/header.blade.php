<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Header with Sidebar Menu</title>

    <!-- CSS Styles -->
    <style>
        /* General Header Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .custom-transparent-header {
            position: relative;
            background-color: transparent;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .custom-fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .custom-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px;
            transition: padding 0.3s ease;
        }

        .custom-logo-container {
            display: flex;
        }

        .custom-nav {
            display: flex;
            gap: 20px;
        }

        .custom-nav a {
            text-decoration: none;
            color: #004080;
            padding: 10px 15px;
            font-weight: bold;
        }

        .custom-search-cart-container {
            display: flex;
            align-items: center;
        }

        .custom-search-input {
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 4px 0 0 4px;
        }

        .custom-search-button {
            border-radius: 0 4px 4px 0;
            padding: 5px 15px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        .custom-cart-icon,
        .custom-login-link {
            margin-left: 15px;
            color: #004080;
            cursor: pointer;
        }

        .custom-logo-parallax,
        .custom-search-parallax {
            transition: transform 0.3s ease;
        }

        .custom-fixed-nav {
            margin-top: 2.2rem;
            display: flex;
            gap: 20px;
            transition: margin-top 0.3s ease;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #004080;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            z-index: 1100;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .sidebar-close {
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 30px;
            margin-left: 50px;
            cursor: pointer;
            color: white;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            font-size: 24px;
            color: #004080;
            z-index: 1100;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .custom-nav {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .custom-search-cart-container {
                margin-left: auto;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="sidebar-close" onclick="closeNav()">&times;</a>
    <a href="#">Home</a>
    <a href="#">Who we are</a>
    <a href="#">Services</a>
    <a href="#">Products</a>
    <a href="#">Contact Us</a>
</div>

<!-- Header Section -->
<header id="customHeader" class="custom-transparent-header">
    <div class="custom-navbar-default">
        <div class="custom-container-fluid">
            <div class="custom-row align-items-center">
                <div class="col-12">
                    <div class="custom-menu-area">
                        <nav class="custom-navbar">
                            <!-- Hamburger Icon -->
                            <span class="hamburger" onclick="openNav()">&#9776;</span>
                            <!-- Logo Section -->
                            <div class="custom-logo-container">
                                <a href="#" class="custom-logo-parallax">
                                    <img src="YOUR_LOGO_URL" alt="Site Logo" class="img-fluid"
                                         style="height: 3.5rem; width: 10rem;">
                                </a>
                            </div>
                            <!-- Navigation Links -->
                            <ul class="custom-nav custom-fixed-nav">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Who we are</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                            <!-- Search Bar & Cart -->
                            <div class="custom-search-cart-container custom-search-parallax">
                                <input type="text" class="custom-search-input" placeholder="Search...">
                                <button class="custom-search-button">Search</button>
                                <a href="#" class="custom-cart-icon"><i class="fas fa-shopping-cart"></i></a>
                                <a href="#" class="custom-login-link">Log In</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- JavaScript for Sidebar & Fixed Header Effect -->
<script>
    // Sidebar Functions
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }

    // Scroll Functionality for Header
    document.addEventListener("scroll", function () {
        const scrollY = window.scrollY;
        const header = document.getElementById("customHeader");
        const navbar = document.querySelector(".custom-navbar");
        const logo = document.querySelector(".custom-logo-parallax");
        const searchBar = document.querySelector(".custom-search-parallax");

        if (scrollY > 60) {
            header.classList.add("custom-fixed-header");
            navbar.style.padding = "10px 20px"; 
            logo.style.transform = "translateY(0)";
            searchBar.style.transform = "translateY(0)";
        } else {
            header.classList.remove("custom-fixed-header");
            navbar.style.padding = "20px 20px"; 
            logo.style.transform = "translateY(0)";
            searchBar.style.transform = "translateY(0)";
        }
    });
</script>

</body>
</html>
