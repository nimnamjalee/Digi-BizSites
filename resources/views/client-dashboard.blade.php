<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard | Digi BizSites</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fc;
            color: #292c55;
        }

        nav {
            background: white;
            padding: 18px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px #0000000d;
        }

        nav h2 {
            margin: 0;
            color: #5146e5;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-link {
            text-decoration: none;
            color: #5146e5;
            font-weight: bold;
        }

        .logout-button {
            background: #eeedff;
            color: #5146e5;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        aside {
            width: 230px;
            padding: 30px 20px;
            background: white;
            border-right: 1px solid #eeeeF5;
        }

        aside a {
            display: block;
            padding: 13px;
            margin-bottom: 8px;
            color: #555777;
            text-decoration: none;
            border-radius: 8px;
        }

        aside a.active,
        aside a:hover {
            background: #eeedff;
            color: #5146e5;
        }

        main {
            flex: 1;
            padding: 35px;
            min-width: 0;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        p {
            color: #70718b;
            line-height: 1.6;
        }

        button,
        .button {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 7px;
            background: #5146e5;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .secondary {
            background: #eeedff;
            color: #5146e5;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .card,
        .section {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 4px 18px #00000008;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #5146e5;
            margin: 12px 0 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .section h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .website-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 18px;
            margin-top: 20px;
        }

        .website-card {
            border: 1px solid #e8e7f5;
            border-radius: 10px;
            padding: 20px;
        }

        .website-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: #eeedff;
            color: #5146e5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 15px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fff2d8;
            color: #8a6200;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 30px 15px;
            border: 1px dashed #d9d7f4;
            border-radius: 10px;
        }

        .empty h3 {
            margin-bottom: 5px;
        }

        .limit-note {
            background: #f2f0ff;
            padding: 18px;
            border-radius: 9px;
            margin-top: 18px;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #8889a0;
            font-size: 13px;
        }

        @media (max-width: 800px) {
            .layout {
                display: block;
            }

            aside {
                width: 100%;
                display: flex;
                gap: 5px;
                overflow-x: auto;
                padding: 12px;
            }

            aside a {
                white-space: nowrap;
                margin: 0;
            }

            main {
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<nav>
    <h2>Digi BizSites</h2>

    <div class="nav-right">
        <a class="profile-link" href="{{ route('client.profile') }}">
            My Profile
        </a>

        <form action="{{ route('client.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</nav>

<div class="layout">

    <aside>
        <a href="{{ route('client.dashboard') }}" class="active">
            Dashboard
        </a>

        <a href="{{ route('client.profile') }}">
            My Profile
        </a>

        <a href="#my-websites">
            My Websites
        </a>

        <a href="{{ route('client.create-site') }}">
            Create My Own Site
        </a>
    </aside>

    <main>

        <div class="welcome">
            <div>
                <h1>Welcome to Your Dashboard!</h1>
                <p>Manage your business websites in one place.</p>
            </div>

            <a href="{{ route('client.create-site') }}" class="button">
                + Create My Own Site
            </a>
        </div>

        <div class="stats">

            <div class="card">
                <p>Total Websites</p>
                <div class="stat-number">0 / 3</div>
                <p>Your standard website limit</p>
            </div>

            <div class="card">
                <p>Published Websites</p>
                <div class="stat-number">0</div>
                <p>Websites available online</p>
            </div>

            <div class="card">
                <p>Pending Approvals</p>
                <div class="stat-number">0</div>
                <p>Requests awaiting review</p>
            </div>

        </div>

        <section class="section" id="my-websites">

            <div class="section-heading">
                <h2>My Websites</h2>
                <a href="{{ route('client.create-site') }}" class="button">
                    + Create Website
                </a>
            </div>

            <div class="empty">
                <div style="font-size: 42px;">🌐</div>

                <h3>You haven't created a website yet</h3>

                <p>
                    Start building your business website by choosing
                    the features you need.
                </p>

                <a href="{{ route('client.create-site') }}" class="button">
                    Create My Own Site
                </a>
            </div>

            <div class="limit-note">
                <strong>Website creation limit</strong>
                <p>
                    You can create up to 3 websites. To create additional
                    websites, you must request approval from the Super Admin.
                </p>
            </div>

        </section>

        <section class="section">
            <h2>How It Works</h2>

            <p>1. Create your business website.</p>
            <p>2. Select the features you need.</p>
            <p>3. Save your website and preview it.</p>
            <p>4. Publish it and access it using its URL.</p>
            <p>5. Return anytime to edit your website features.</p>
        </section>

    </main>

</div>

<footer>
    © 2026 Digi BizSites. All rights reserved.
</footer>

</body>
</html>
