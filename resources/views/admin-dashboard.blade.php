<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Super Admin Dashboard | Digi BizSites</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6fb;
            color: #20243a;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 255px;
            background: #17172e;
            color: white;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            padding: 0 12px 35px;
            letter-spacing: -0.7px;
        }

        .brand span {
            color: #a99aff;
        }

        .menu-label {
            color: #8586a5;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin-bottom: 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            color: #b8b9d1;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #7161e8;
            color: #fff;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
            border-top: 1px solid #30304a;
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            color: #ffb5bc;
            text-align: left;
            cursor: pointer;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 30px 36px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .page-subtitle {
            margin-top: 8px;
            color: #85899e;
            font-size: 13px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            padding: 10px 15px;
            border: 1px solid #ececf4;
            border-radius: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: #eeeaff;
            color: #6755d9;
            font-weight: 800;
        }

        .profile-name {
            font-size: 13px;
            font-weight: 700;
        }

        .profile-role {
            font-size: 11px;
            color: #85899e;
            margin-top: 4px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border: 1px solid #ededf5;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(35, 35, 75, 0.025);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 21px;
        }

        .purple { background: #eeeaff; }
        .blue { background: #e6f2ff; }
        .green { background: #e2f8ee; }
        .orange { background: #fff0df; }

        .stat-number {
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .stat-label {
            font-size: 12px;
            color: #85899e;
            margin-top: 7px;
        }

        .section {
            background: #fff;
            border: 1px solid #ededf5;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(35, 35, 75, 0.025);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;
        }

        .section-description {
            color: #85899e;
            font-size: 12px;
            margin-top: 6px;
        }

        .primary-button {
            display: inline-block;
            border: 0;
            background: #7161e8;
            color: white;
            padding: 12px 17px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
            transition: 0.2s;
        }

        .primary-button:hover {
            background: #5947d0;
            transform: translateY(-1px);
        }

        .sample-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .sample-card {
            border: 1px solid #ededf5;
            border-radius: 14px;
            overflow: hidden;
            transition: 0.2s;
        }

        .sample-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(35, 35, 75, 0.08);
        }

        .sample-preview {
            height: 155px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 12px;
            font-size: 40px;
            overflow: hidden;
        }

        .preview-image {
            width: 100%;
            height: 155px;
            object-fit: cover;
        }

        .preview-logo {
            max-width: 100px;
            max-height: 80px;
            object-fit: contain;
        }

        .preview-caption {
            background: rgba(255,255,255,0.9);
            color: #45445b;
            font-size: 11px;
            padding: 7px 14px;
            border-radius: 7px;
            font-weight: 700;
            max-width: 90%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .sample-info {
            padding: 17px;
        }

        .sample-name {
            font-size: 14px;
            font-weight: 700;
        }

        .sample-category {
            font-size: 11px;
            color: #85899e;
            margin-top: 6px;
        }

        .sample-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 17px;
        }

        .status {
            font-size: 10px;
            font-weight: 700;
            padding: 6px 9px;
            border-radius: 20px;
            background: #e2f8ee;
            color: #18865a;
        }

        .sample-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .small-button {
            display: inline-block;
            border: 1px solid #e7e7f0;
            background: white;
            color: #5d55a8;
            border-radius: 7px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .small-button:hover {
            background: #f0edff;
            border-color: #7161e8;
        }

        .edit-button {
            color: #7161e8;
            border-color: #cfc8ff;
            background: #f5f2ff;
        }

        .activity-row {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f6;
        }

        .activity-row:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #f0edff;
        }

        .activity-text {
            font-size: 12px;
            font-weight: 600;
        }

        .activity-time {
            color: #9699ab;
            font-size: 11px;
            margin-top: 5px;
        }

        .demo-note {
            color: #85899e;
            font-size: 11px;
            margin-top: 16px;
        }

        .success-message {
            padding: 13px 16px;
            margin-bottom: 20px;
            background: #e2f8ee;
            color: #18865a;
            border-radius: 10px;
            font-size: 13px;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sample-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main {
                padding: 25px;
            }
        }

        @media (max-width: 700px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
            }

            .brand {
                padding-bottom: 20px;
            }

            .menu-label,
            .sidebar-bottom {
                display: none;
            }

            .sidebar nav {
                display: flex;
                gap: 7px;
                overflow-x: auto;
            }

            .nav-link {
                flex-shrink: 0;
                margin: 0;
                padding: 10px;
            }

            .main {
                padding: 22px 15px;
            }

            .topbar {
                align-items: flex-start;
            }

            .page-title {
                font-size: 21px;
            }

            .profile {
                padding: 7px;
            }

            .profile-details {
                display: none;
            }

            .stats,
            .sample-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 17px;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">Digi <span>BizSites.</span></div>

        <div class="menu-label">MAIN MENU</div>

        <nav>
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <span class="nav-icon">▦</span> Dashboard
            </a>

            <a href="#samples" class="nav-link">
                <span class="nav-icon">▣</span> Website Samples
            </a>

            <a href="#clients" class="nav-link">
                <span class="nav-icon">♙</span> Clients
            </a>

            <a href="#activity" class="nav-link">
                <span class="nav-icon">◷</span> Recent Activity
            </a>

            <a href="#settings" class="nav-link">
                <span class="nav-icon">⚙</span> Settings
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('client.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link logout-button">
                    <span class="nav-icon">↪</span> Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1 class="page-title">Super Admin Dashboard</h1>
                <p class="page-subtitle">
                    Welcome back! Manage your website templates and clients.
                </p>
            </div>

            <div class="profile">
                <div class="avatar">SA</div>
                <div class="profile-details">
                    <div class="profile-name">{{ $admin->name }}</div>
                    <div class="profile-role">Super Administrator</div>
                </div>
            </div>
        </header>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="success-message" style="background:#fff0df;color:#a45b00;">
                Please check the form and correct any errors.
            </div>
        @endif

        <!-- Statistics -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple">▣</div>
                </div>
                <div class="stat-number">{{ isset($samples) ? $samples->count() : 0 }}</div>
                <div class="stat-label">Total Website Samples</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon blue">♙</div>
                </div>
                <div class="stat-number">248</div>
                <div class="stat-label">Registered Clients</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green">✓</div>
                </div>
                <div class="stat-number">
                    {{ isset($samples) ? $samples->where('status', 'published')->count() : 0 }}
                </div>
                <div class="stat-label">Published Websites</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon orange">◷</div>
                </div>
                <div class="stat-number">
                    {{ isset($samples) ? $samples->where('status', 'draft')->count() : 0 }}
                </div>
                <div class="stat-label">Draft Websites</div>
            </div>
        </section>

        <!-- Website samples -->
        <section class="section" id="samples">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Website Samples</h2>
                    <p class="section-description">
                        Manage the website designs available to your clients.
                    </p>
                </div>

                <a href="{{ route('admin.samples.create') }}" class="primary-button">
                    + Add New Sample
                </a>
            </div>

            <div class="sample-grid">

                @forelse ($samples as $sample)

                    <article class="sample-card">

                        
<div class="sample-preview"
     style="background: {{ $sample->primary_color ?? '#eeeaff' }};">

    @if ($sample->homepage_banner_path)
        <img
            src="{{ asset('storage/' . $sample->homepage_banner_path) }}"
            alt="{{ $sample->title }}"
            class="preview-image"
        >
    @elseif ($sample->logo_path)
        <img
            src="{{ asset('storage/' . $sample->logo_path) }}"
            alt="{{ $sample->title }} logo"
            class="preview-logo"
        >
    @elseif ($sample->thumbnail)
        <img
            src="{{ $sample->thumbnail }}"
            alt="{{ $sample->title }}"
            class="preview-image"
        >
    @else
        <span>🌐</span>
    @endif

    <span class="preview-caption">
        {{ $sample->title }}
    </span>

</div>


                        <div class="sample-info">

                            <div class="sample-name">
                                {{ $sample->title }}
                            </div>

                            <div class="sample-category">
                                {{ $sample->category }}
                            </div>

                            <div class="sample-footer">

                                <span class="status"
                                      style="{{ $sample->status === 'published'
                                          ? ''
                                          : 'background:#fff0df;color:#a45b00;' }}">
                                    {{ ucfirst($sample->status) }}
                                </span>

                                <div class="sample-actions">

                                    @if ($sample->status === 'published')
                                        <a
                                            href="{{ route('sites.show', ['slug' => $sample->slug]) }}"
                                            target="_blank"
                                            rel="noopener"
                                            class="small-button"
                                        >
                                            Preview
                                        </a>
                                    @endif

                                    <a
    href="{{ route('admin.samples.edit', $sample->id) }}"
    class="small-button edit-button"
>
    Edit
</a>

                                    
<a
    href="{{ route('admin.site-admin.view', $sample->id) }}"
    class="small-button edit-button"
>
    <i class="fa-solid fa-gauge-high"></i>
    Site Admin View
</a>


                                </div>

                            </div>
                        </div>
                    </article>

                @empty

                    <div style="grid-column:1/-1;text-align:center;padding:40px 15px;">
                        <div style="font-size:35px;margin-bottom:12px;">🌐</div>
                        <h3>No websites added yet</h3>
                        <p style="color:#85899e;margin:10px 0 20px;">
                            Create your first business website using the button above.
                        </p>
                        <a href="{{ route('admin.samples.create') }}"
                           class="primary-button">
                            + Create First Website
                        </a>
                    </div>

                @endforelse

            </div>

            <p class="demo-note">
                Website cards are loaded from the database. Client totals will be connected separately.
            </p>
        </section>

        <!-- Recent activity -->
        <section class="section" id="activity">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Recent Activity</h2>
                    <p class="section-description">
                        A preview of activity in your platform.
                    </p>
                </div>
            </div>

            <div class="activity-row">
                <div class="activity-icon">♙</div>
                <div>
                    <div class="activity-text">Client registration</div>
                    <div class="activity-time">Activity preview</div>
                </div>
            </div>

            <div class="activity-row">
                <div class="activity-icon">▣</div>
                <div>
                    <div class="activity-text">Website sample management</div>
                    <div class="activity-time">Manage templates from this dashboard</div>
                </div>
            </div>
        </section>

    </main>
</div>
</body>
</html>
