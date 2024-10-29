
<style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            transition: all 0.3s ease;
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
            align-items: center;
        }

        .custom-nav {
            display: flex;
            gap: 20px;
        }

        .custom-nav > li {
            position: relative;
            list-style: none;
        }

    
        .custom-nav a {
    position: relative;
    display: inline-block;
    text-decoration: none;
    color: #454b5c !important;
    padding: 10px 15px;
    font-weight: 500;
    transition: color 0.3s ease;
         }

    .custom-nav a::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 0;
    height: 2px;
    background-color: #28a745; /* Change color as needed */
    transition: width 0.5s ease;
        }

    .custom-nav a:hover::after {
    width: 100%;
       }

        

        .custom-nav a:hover {
            color: #28a745;
        }

        /* Dropdown Menu Styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            padding: 10px 0;
            margin: 0;
            border-radius: 4px;
            z-index: 999;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s, transform 0.3s;
        }

        .custom-nav li:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .custom-nav li ul li {
            width: 200px;
        }

        .custom-nav li ul a {
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #004080;
            font-size: 14px;
            white-space: nowrap;
        }

        .custom-nav li ul a:hover {
            background-color: #f0f0f0;
            color: #28a745;
        }

        /* Arrow Icons */
        .arrow-icon {
            font-size: 12px;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .dropdown-open .arrow-icon {
            transform: rotate(180deg);
        }

        .custom-search-cart-container {
            display: flex;
            align-items: center;
        }

        .custom-search-input {
            border: 1px solid #ccc;
            padding: 8px 15px;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .custom-search-button {
            border-radius: 0 4px 4px 0;
            padding: 8px 15px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-search-button:hover {
            background-color: #1f7a36;
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
            transition: 0.4s ease;
            padding-top: 60px;
            z-index: 1100;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar a {
            padding: 2px 27px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #575757;
            padding-left: 30px;
        }

        .sidebar-close {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 30px;
            cursor: pointer;
            color: white;
        }

        .sidebar-search {
            padding: 10px 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .sidebar-search input {
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .sidebar-search button {
            padding: 10px;
            border: none;
            background-color: green;
            color: white;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sidebar-search button:hover {
            background-color: #1f7a36;
        }

        /* Sidebar Dropdown for Mobile/Tablet */
        .sidebar .dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar .dropdown-toggle.active .arrow-icon {
            transform: rotate(180deg);
        }

        .sidebar .dropdown-menu {
            display: none;
            padding-left: 20px;
            flex-direction: column;
            background-color: #003060;
        }

        .sidebar .dropdown-toggle.active + .dropdown-menu {
            display: flex;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 20px 25px;
            color: white;
            font-size: 14px;
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .social-icons a {
            color: white;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.2);
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
            .custom-nav,
            .custom-search-cart-container {
                display: none;
            }

            .hamburger {
                display: block;
            }
        }
</style>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="sidebar-close" onclick="closeNav()">&times;</a>
    <div class="sidebar-search">
        <input type="text" placeholder="Search..." id="sidebarSearchInput">
        <button onclick="sidebarSearch()">Search</button>
    </div>
    <a href="{{ route('frontend.home') }}">Home</a>

    <a href="{{ route('frontend.about') }}">About US </a>
    <div class="dropdown-toggle" onclick="toggleSidebarDropdown(this)">
        <a href="#">Products <span class="ml-5 fas fa-arrow-icon">&darr;</span></a>
    </div>
    <div class="dropdown-menu">
        @foreach ($newProducts as $product)
        <a href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->name }}</a>
        @endforeach
    </div>
    <a href="{{ route('frontend.services') }}">Services</a>

    <a href="{{ route('frontend.contract_us') }}">Contact US</a>

    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        ANKOM Technology empowers food and feed analytical testing worldwide with the power of automation.
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            
        </div>
    </div>
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
                                <a href="{{ url('/') }}" class="navbar-brand">
                                    @if ($siteLogo)
                                    <img src="{{ asset($siteLogo) }}" alt="Site Logo" class="img-fluid logo"
                                         style="height: 4.5rem; width: 10rem;">
                                    @else
                                    <span class="navbar-brand">Site Name</span>
                                    @endif
                                </a>
                            </div>
                            <!-- Navigation Links -->
                            <ul class="custom-nav custom-fixed-nav">
                                <li class="main"><a href="{{ route('frontend.home') }}">Home</a></li>
                                <li class="main"><a href="{{ route('frontend.about') }}">Who we are</a></li>
                                <li><a href="{{ route('frontend.services') }}">Services</a></li>
                                <li class="main">
                                    <a href="{{ route('frontend.product.index') }}">Products <span class="fas fa-arrow-icon">&darr;</span></a>
                                    <ul class="dropdown-menu">
                                        @foreach ($newProducts as $product)
                                        <li>
                                            <a href="{{ route('frontend.product.details', $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="main"><a href="{{ route('frontend.contract_us') }}">Contact Us</a></li>
                            </ul>
                            <!-- Search Bar & Cart -->
                            <div class="custom-search-cart-container custom-search-parallax">
                                <input type="text" class="custom-search-input" placeholder="Search...">
                                <button class="custom-search-button">Search</button>                             
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
        document.getElementById("mySidebar").style.width = "280px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }

    // Toggle sidebar dropdown in mobile view
    function toggleSidebarDropdown(element) {
        element.classList.toggle("active");
        element.nextElementSibling.classList.toggle("active");
    }

    // Search function in sidebar
    function sidebarSearch() {
        const searchInput = document.getElementById("sidebarSearchInput").value;
        alert("Searching for: " + searchInput); // Example action
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
