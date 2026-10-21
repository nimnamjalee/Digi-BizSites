<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Site Admin Dashboard | Digi BizSites</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f6f7fb;
            color: #25243a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: #211d3b;
            color: white;
            padding: 26px 18px;
            flex-shrink: 0;
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            margin: 0 0 8px 8px;
        }

        .brand span {
            color: #a99aff;
        }

        .demo-label {
            display: inline-block;
            margin: 8px 8px 30px;
            padding: 6px 10px;
            border-radius: 20px;
            background: #383154;
            color: #d7ceff;
            font-size: 11px;
            font-weight: 700;
        }

        .menu-label {
            margin: 20px 8px 12px;
            color: #9f9ab8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 12px;
            margin-bottom: 5px;
            border-radius: 9px;
            color: #d0cde0;
            font-size: 13px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #7662e8;
            color: white;
        }

        .menu a i {
            width: 18px;
            text-align: center;
        }

        .sidebar-bottom {
            margin-top: 45px;
            padding: 15px 8px;
            border-top: 1px solid #403b59;
        }

        .sidebar-bottom a {
            color: #d0cde0;
            font-size: 13px;
        }

        /* Main content */
        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 78px;
            background: white;
            border-bottom: 1px solid #ececf3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 30px;
        }

        .topbar h1 {
            font-size: 21px;
            margin-bottom: 5px;
        }

        .topbar p {
            font-size: 12px;
            color: #85849a;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #eee9ff;
            color: #6f5ce7;
            font-weight: 800;
        }

        .profile strong {
            display: block;
            font-size: 12px;
        }

        .profile small {
            color: #88869a;
            font-size: 11px;
        }

        .content {
            padding: 28px 30px;
            max-width: 1600px;
            margin: auto;
        }

        .welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 23px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #85849a;
            font-size: 13px;
            line-height: 1.6;
        }

        .demo-notice {
            padding: 10px 13px;
            background: #fff5dc;
            color: #946316;
            border: 1px solid #f6e3ad;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.6;
        }

        /* Statistics */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #eeedf5;
            border-radius: 14px;
            padding: 21px;
            box-shadow: 0 4px 18px rgba(39, 31, 82, 0.025);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stat-title {
            color: #818096;
            font-size: 12px;
            font-weight: 600;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 17px;
        }

        .purple {
            background: #eeeaff;
            color: #755ee8;
        }

        .green {
            background: #e5f8ef;
            color: #1d9b64;
        }

        .orange {
            background: #fff0e3;
            color: #e98a35;
        }

        .blue {
            background: #e5f1ff;
            color: #4288e7;
        }

        .stat-value {
            font-size: 25px;
            font-weight: 800;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        .stat-note {
            color: #85849a;
            font-size: 11px;
        }

        .positive {
            color: #159b64;
            font-weight: 700;
        }

        /* Content grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(280px, 1fr);
            gap: 20px;
            margin-bottom: 22px;
        }

        .panel {
            background: white;
            border: 1px solid #eeedf5;
            border-radius: 14px;
            padding: 22px;
            min-width: 0;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }

        .panel-heading h3 {
            font-size: 15px;
        }

        .panel-heading p {
            color: #89879b;
            font-size: 11px;
            margin-top: 6px;
        }

        .period {
            border: 1px solid #e8e6f0;
            background: white;
            padding: 9px 10px;
            border-radius: 8px;
            font-size: 11px;
            color: #625d7c;
        }

        /* Sales chart */
        .chart-summary {
            margin-bottom: 25px;
        }

        .chart-summary strong {
            font-size: 27px;
        }

        .chart-summary span {
            margin-left: 8px;
            color: #169b63;
            font-size: 11px;
            font-weight: 700;
        }

        .chart {
            height: 180px;
            display: flex;
            align-items: flex-end;
            gap: 14px;
            padding: 10px 4px 0;
            border-bottom: 1px solid #ecebf3;
            background: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 43px,
                #f0eff6 44px,
                transparent 45px
            );
        }

        .chart-column {
            flex: 1;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .chart-bar {
            width: min(34px, 75%);
            min-height: 12px;
            border-radius: 6px 6px 0 0;
            background: #c9c0ff;
            transition: 0.2s;
        }

        .chart-bar:hover {
            background: #7662e8;
        }

        .chart-bar.highlight {
            background: #7662e8;
        }

        .chart-labels {
            display: flex;
            justify-content: space-around;
            color: #9997aa;
            font-size: 10px;
            margin-top: 12px;
        }

        /* Order progress */
        .order-status {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 0;
            border-bottom: 1px solid #f0eff5;
        }

        .order-status:last-child {
            border-bottom: none;
        }

        .status-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .status-info {
            flex: 1;
        }

        .status-info strong {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .status-info small {
            color: #8c8a9e;
            font-size: 11px;
        }

        .status-count {
            font-size: 19px;
            font-weight: 800;
        }

        /* Tables */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 620px;
        }

        th {
            text-align: left;
            color: #88869a;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 13px 12px;
            background: #faf9fd;
            border-bottom: 1px solid #efedf5;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #f0eff5;
            font-size: 12px;
            white-space: nowrap;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-number {
            font-weight: 700;
            color: #6d59dc;
        }

        .customer {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .customer-avatar {
            width: 31px;
            height: 31px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eeeaff;
            color: #6d59dc;
            font-size: 10px;
            font-weight: 800;
        }

        .customer-name {
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .pending {
            background: #fff3d8;
            color: #a66c0c;
        }

        .processing {
            background: #e5efff;
            color: #3677cf;
        }

        .completed {
            background: #e2f7eb;
            color: #198554;
        }

        /* Products */
        .product-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid #f0eff5;
        }

        .product-row:last-child {
            border-bottom: none;
        }

        .product-image {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: #f2efff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7764e8;
            font-size: 19px;
            flex-shrink: 0;
        }

        .product-details {
            flex: 1;
            min-width: 0;
        }

        .product-details strong {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .product-details small {
            color: #8c8a9e;
            font-size: 11px;
        }

        .stock {
            text-align: right;
            font-size: 11px;
            font-weight: 700;
        }

        .stock.low {
            color: #df7831;
        }

        .stock.good {
            color: #17935e;
        }

        /* Completion time */
        .completion-card {
            margin-top: 20px;
            padding: 19px;
            background: linear-gradient(135deg, #7662e8, #9a81f3);
            color: white;
            border-radius: 13px;
        }

        .completion-card .label {
            font-size: 11px;
            opacity: 0.85;
        }

        .completion-card .time {
            font-size: 29px;
            font-weight: 800;
            margin: 10px 0;
        }

        .completion-card p {
            font-size: 11px;
            line-height: 1.7;
            opacity: 0.9;
        }

        .footer {
            text-align: center;
            color: #9997aa;
            font-size: 11px;
            padding: 20px 0 5px;
        }

        .mobile-menu {
            display: none;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .sidebar {
                display: none;
            }

            .topbar {
                padding: 16px;
            }

            .content {
                padding: 20px 15px;
            }

            .topbar h1 {
                font-size: 17px;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome h2 {
                font-size: 20px;
            }

            .profile-info {
                display: none;
            }

            .stats {
                gap: 12px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-value {
                font-size: 21px;
            }

            .stat-top {
                align-items: flex-start;
            }

            .stat-icon {
                width: 35px;
                height: 35px;
            }

            .panel {
                padding: 16px;
            }

            .chart {
                gap: 7px;
            }

            .mobile-menu {
                display: inline-flex;
                margin-right: 10px;
                color: #7662e8;
            }
        }

        @media (max-width: 390px) {
            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="brand">
            Digi <span>BizSites</span>
        </div>

        <div class="demo-label">
            <i class="fa-solid fa-eye"></i>
            DEMO ADMIN VIEW
        </div>

        <div class="menu-label">Workspace</div>

        <nav class="menu">
            <a href="#dashboard" class="active">
                <i class="fa-solid fa-chart-pie"></i>
                Dashboard
            </a>

            <a href="#orders">
                <i class="fa-solid fa-box"></i>
                Orders
            </a>

            <a href="#products">
                <i class="fa-solid fa-cubes"></i>
                Products & Stock
            </a>

            <a href="#customers">
                <i class="fa-solid fa-users"></i>
                Customers
            </a>

            <a href="#sales">
                <i class="fa-solid fa-chart-line"></i>
                Sales Reports
            </a>
        </nav>

        <div class="menu-label">Account</div>

        <nav class="menu">
            <a href="#settings">
                <i class="fa-solid fa-gear"></i>
                Store Settings
            </a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-arrow-left"></i>
                &nbsp; Back to Super Admin
            </a>
        </div>

    </aside>

    <!-- Main -->
    <main class="main">

        <header class="topbar">
            <div>
                <h1>
                    <span class="mobile-menu">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                    Site Admin Dashboard
                </h1>
                <p>Manage your business website in one place.</p>
            </div>

            <div class="profile">
                <div class="avatar">AD</div>
                <div class="profile-info">
                    <strong>Demo Business Owner</strong>
                    <small>Site Administrator</small>
                </div>
            </div>
        </header>

        <div class="content" id="dashboard">

            <!-- Welcome -->
            <section class="welcome">
                <div>
                    <h2>Welcome back, Admin! 👋</h2>
                    <p>Here is what's happening with your online store today.</p>
                </div>

                <div class="demo-notice">
                    <i class="fa-solid fa-circle-info"></i>
                    Sample data only — not connected to a database.
                </div>
            </section>

            <!-- Statistics -->
            <section class="stats">

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Today's Sales</span>
                        <div class="stat-icon purple">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                    </div>
                    <div class="stat-value">Rs. 24,500</div>
                    <div class="stat-note">
                        <span class="positive">+12.5%</span> compared to yesterday
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Total Orders</span>
                        <div class="stat-icon blue">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                    </div>
                    <div class="stat-value">128</div>
                    <div class="stat-note">Orders received this month</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Total Products</span>
                        <div class="stat-icon orange">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>
                    </div>
                    <div class="stat-value">56</div>
                    <div class="stat-note">4 products need restocking</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <span class="stat-title">Customers</span>
                        <div class="stat-icon green">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">342</div>
                    <div class="stat-note">Registered customers</div>
                </div>

            </section>

            <!-- Sales and order summary -->
            <section class="dashboard-grid">

                <div class="panel" id="sales">
                    <div class="panel-heading">
                        <div>
                            <h3>Sales Overview</h3>
                            <p>Example sales performance for the last 7 days</p>
                        </div>

                        <span class="period">Last 7 days</span>
                    </div>

                    <div class="chart-summary">
                        <strong>Rs. 186,750</strong>
                        <span><i class="fa-solid fa-arrow-trend-up"></i> 8.4%</span>
                    </div>

                    <div class="chart">
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 40%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 62%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 49%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar highlight" style="height: 86%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 55%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 72%"></div>
                        </div>
                        <div class="chart-column">
                            <div class="chart-bar" style="height: 95%"></div>
                        </div>
                    </div>

                    <div class="chart-labels">
                        <span>Mon</span>
                        <span>Tue</span>
                        <span>Wed</span>
                        <span>Thu</span>
                        <span>Fri</span>
                        <span>Sat</span>
                        <span>Sun</span>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div>
                            <h3>Order Summary</h3>
                            <p>Current order status</p>
                        </div>
                    </div>

                    <div class="order-status">
                        <div class="status-icon orange">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div class="status-info">
                            <strong>Pending Orders</strong>
                            <small>Waiting for confirmation</small>
                        </div>
                        <div class="status-count">12</div>
                    </div>

                    <div class="order-status">
                        <div class="status-icon blue">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <div class="status-info">
                            <strong>Processing Orders</strong>
                            <small>Currently being prepared</small>
                        </div>
                        <div class="status-count">8</div>
                    </div>

                    <div class="order-status">
                        <div class="status-icon green">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div class="status-info">
                            <strong>Completed Orders</strong>
                            <small>Successfully delivered</small>
                        </div>
                        <div class="status-count">108</div>
                    </div>

                    <div class="completion-card">
                        <div class="label">Average Order Completion Time</div>
                        <div class="time">1.8 Days</div>
                        <p>
                            Average time taken to process and complete an order.
                            This is example dashboard data.
                        </p>
                    </div>
                </div>

            </section>

            <!-- Recent orders -->
            <section class="panel" id="orders" style="margin-bottom: 22px;">

                <div class="panel-heading">
                    <div>
                        <h3>Recent Orders</h3>
                        <p>Review your latest customer orders</p>
                    </div>

                    <span class="period">Sample Orders</span>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Completion Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="order-number">#DBS-1001</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">KS</div>
                                        <span class="customer-name">Kavindi Silva</span>
                                    </div>
                                </td>
                                <td>16 Oct 2026</td>
                                <td>Rs. 4,500</td>
                                <td><span class="badge pending">Pending</span></td>
                                <td>Not completed</td>
                            </tr>

                            <tr>
                                <td class="order-number">#DBS-1002</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">NP</div>
                                        <span class="customer-name">Nuwan Perera</span>
                                    </div>
                                </td>
                                <td>16 Oct 2026</td>
                                <td>Rs. 8,250</td>
                                <td><span class="badge processing">Processing</span></td>
                                <td>In progress</td>
                            </tr>

                            <tr>
                                <td class="order-number">#DBS-1003</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">AM</div>
                                        <span class="customer-name">Anjali Mendis</span>
                                    </div>
                                </td>
                                <td>15 Oct 2026</td>
                                <td>Rs. 2,750</td>
                                <td><span class="badge completed">Completed</span></td>
                                <td>1 day 4 hours</td>
                            </tr>

                            <tr>
                                <td class="order-number">#DBS-1004</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">RD</div>
                                        <span class="customer-name">Ravindu Dias</span>
                                    </div>
                                </td>
                                <td>15 Oct 2026</td>
                                <td>Rs. 6,900</td>
                                <td><span class="badge completed">Completed</span></td>
                                <td>2 days</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>

            <!-- Products and stock -->
            <section class="dashboard-grid">

                <div class="panel" id="products">
                    <div class="panel-heading">
                        <div>
                            <h3>Products & Stock</h3>
                            <p>Monitor available products and stock levels</p>
                        </div>
                    </div>

                    <div class="product-row">
                        <div class="product-image">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <div class="product-details">
                            <strong>Casual T-Shirt</strong>
                            <small>SKU: PRD-001 · Rs. 2,500</small>
                        </div>
                        <div class="stock good">32 in stock</div>
                    </div>

                    <div class="product-row">
                        <div class="product-image">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                        <div class="product-details">
                            <strong>Fashion Handbag</strong>
                            <small>SKU: PRD-002 · Rs. 4,500</small>
                        </div>
                        <div class="stock low">4 in stock</div>
                    </div>

                    <div class="product-row">
                        <div class="product-image">
                            <i class="fa-solid fa-shoe-prints"></i>
                        </div>
                        <div class="product-details">
                            <strong>Casual Shoes</strong>
                            <small>SKU: PRD-003 · Rs. 6,900</small>
                        </div>
                        <div class="stock good">18 in stock</div>
                    </div>

                    <div class="product-row">
                        <div class="product-image">
                            <i class="fa-solid fa-watch"></i>
                        </div>
                        <div class="product-details">
                            <strong>Fashion Watch</strong>
                            <small>SKU: PRD-004 · Rs. 3,250</small>
                        </div>
                        <div class="stock low">2 in stock</div>
                    </div>
                </div>

                <!-- Customers -->
                <div class="panel" id="customers">
                    <div class="panel-heading">
                        <div>
                            <h3>Recent Customers</h3>
                            <p>Recently active customers</p>
                        </div>
                    </div>

                    <div class="product-row">
                        <div class="customer-avatar">KS</div>
                        <div class="product-details">
                            <strong>Kavindi Silva</strong>
                            <small>kavindi@example.com</small>
                        </div>
                    </div>

                    <div class="product-row">
                        <div class="customer-avatar">NP</div>
                        <div class="product-details">
                            <strong>Nuwan Perera</strong>
                            <small>nuwan@example.com</small>
                        </div>
                    </div>

                    <div class="product-row">
                        <div class="customer-avatar">AM</div>
                        <div class="product-details">
                            <strong>Anjali Mendis</strong>
                            <small>anjali@example.com</small>
                        </div>
                    </div>

                    <div class="product-row">
                        <div class="customer-avatar">RD</div>
                        <div class="product-details">
                            <strong>Ravindu Dias</strong>
                            <small>ravindu@example.com</small>
                        </div>
                    </div>
                </div>

            </section>

            <footer class="footer" id="settings">
                © {{ date('Y') }} Digi BizSites · Site Admin Demo Dashboard
            </footer>

        </div>
    </main>

</div>
</body>
</html>
