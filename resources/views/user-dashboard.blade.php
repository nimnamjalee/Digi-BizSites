
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard | Digi BizSites</title>

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #5146e5;
            --primary-light: #eeedff;
            --text: #292c55;
            --muted: #70718b;
            --background: #f5f6fc;
            --border: #e8e7f5;
            --white: #ffffff;
            --green: #16845b;
            --orange: #a66a00;
            --red: #c0394b;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a { text-decoration: none; }
        button, input, select { font: inherit; }

        .topbar {
            background: var(--white);
            min-height: 74px;
            padding: 16px 4%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 2px 10px #0000000d;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            color: var(--primary);
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .profile-link {
            color: var(--primary);
            font-weight: bold;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 74px);
        }

        .sidebar {
            width: 235px;
            flex-shrink: 0;
            background: white;
            border-right: 1px solid var(--border);
            padding: 28px 16px;
        }

        .sidebar-label {
            padding: 0 12px;
            color: #9999ae;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 8px 0 14px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 9px;
            color: #62637d;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 32px;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            margin-bottom: 26px;
        }

        h1 { font-size: 27px; margin: 0 0 9px; }
        h2 { font-size: 19px; margin: 0; }
        h3 { font-size: 16px; margin: 0 0 9px; }

        p {
            color: var(--muted);
            line-height: 1.6;
            margin: 8px 0;
            font-size: 14px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 11px 16px;
            border: 0;
            border-radius: 8px;
            background: var(--primary);
            color: white;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .button:hover { opacity: .9; }

        .button-secondary {
            color: var(--primary);
            background: var(--primary-light);
        }

        .button-outline {
            background: white;
            color: var(--primary);
            border: 1px solid #d9d6ff;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card, .section {
            background: white;
            border: 1px solid #f0eff8;
            border-radius: 13px;
            padding: 22px;
            box-shadow: 0 4px 18px #00000006;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 11px;
            background: var(--primary-light);
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .stat-number {
            font-size: 29px;
            font-weight: bold;
            margin: 17px 0 4px;
            color: var(--text);
        }

        .stat-caption {
            font-size: 12px;
            color: var(--muted);
        }

        .section { margin-bottom: 24px; }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 20px;
        }

        .tools {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .field {
            min-height: 42px;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            background: white;
            color: var(--text);
        }

        .search-field { flex: 1; min-width: 180px; }

        .website-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
        }

        .website-card {
            border: 1px solid var(--border);
            border-radius: 11px;
            overflow: hidden;
            min-width: 0;
        }

        .website-preview {
            min-height: 115px;
            background: linear-gradient(135deg, #eeedff, #f9efff);
            display: grid;
            place-items: center;
            font-size: 39px;
        }

        .website-content { padding: 18px; }

        .website-title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .website-title { overflow-wrap: anywhere; }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            white-space: nowrap;
            background: #f1f1f5;
            color: #62637d;
        }

        .status-published {
            background: #e1f6eb;
            color: var(--green);
        }

        .status-pending {
            background: #fff1d6;
            color: var(--orange);
        }

        .status-draft {
            background: #eeedff;
            color: var(--primary);
        }

        .card-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
        }

        .card-actions .button {
            padding: 9px 11px;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 38px 15px;
            border: 1px dashed #d9d7f4;
            border-radius: 10px;
        }

        .empty-icon { font-size: 43px; margin-bottom: 12px; }

        .bottom-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.3fr) minmax(0, 1fr);
            gap: 22px;
        }

        .steps {
            list-style: none;
            padding: 0;
            margin: 22px 0 0;
        }

        .steps li {
            display: flex;
            gap: 13px;
            align-items: flex-start;
            margin-bottom: 19px;
        }

        .step-number {
            width: 31px;
            height: 31px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: bold;
        }

        .step-done {
            background: #e1f6eb;
            color: var(--green);
        }

        .notice {
            background: #f2f0ff;
            border-radius: 10px;
            padding: 17px;
            margin-top: 20px;
        }

        .notice strong { font-size: 13px; }
        .notice p { margin-bottom: 0; }

        .activity-item {
            padding: 14px 0;
            border-bottom: 1px solid #f0eff8;
        }

        .activity-item:last-child { border-bottom: 0; }

        .activity-title { font-size: 13px; font-weight: bold; }

        .activity-date {
            font-size: 12px;
            color: #9292a8;
            margin-top: 5px;
        }

        .limit-bar {
            height: 7px;
            border-radius: 10px;
            background: #eae9f5;
            overflow: hidden;
            margin-top: 12px;
        }

        .limit-progress {
            height: 100%;
            background: var(--primary);
            border-radius: 10px;
        }

        .hidden { display: none !important; }

        .no-results {
            padding: 20px;
            text-align: center;
            color: var(--muted);
            display: none;
        }

        footer {
            text-align: center;
            padding: 24px;
            color: #8889a0;
            font-size: 12px;
        }

        @media (max-width: 1000px) {
            .main { padding: 24px; }
            .bottom-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 800px) {
            .layout { display: block; }

            .sidebar {
                width: 100%;
                display: flex;
                overflow-x: auto;
                gap: 5px;
                padding: 12px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .sidebar-label { display: none; }

            .sidebar a {
                white-space: nowrap;
                margin: 0;
                padding: 11px;
            }

            .main { padding: 20px; }
            .stats { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .topbar { padding: 14px 16px; }
            .brand { font-size: 19px; }
            .top-right { gap: 10px; }
            .profile-link { font-size: 12px; }
            h1 { font-size: 23px; }
            .main { padding: 14px; }
            .stat-card, .section { padding: 17px; }
        }
    </style>
</head>

<body>

@php
    $websites = $websites ?? collect();
    $totalWebsites = $totalWebsites ?? $websites->count();
    $publishedWebsites = $publishedWebsites ?? 0;
    $pendingApprovals = $pendingApprovals ?? 0;
    $websiteLimit = $websiteLimit ?? 3;
    $remainingSlots = max(0, $websiteLimit - $totalWebsites);
@endphp

<header class="topbar">
    <a href="{{ route('user.dashboard') }}" class="brand">
        Digi BizSites
    </a>

    <div class="top-right">
        <a class="profile-link" href="{{ route('client.profile') }}">
            My Profile
        </a>

        <form action="{{ route('client.logout') }}" method="POST">
            @csrf
            <button type="submit" class="button button-secondary">
                Logout
            </button>
        </form>
    </div>
</header>

<div class="layout">

    <aside class="sidebar">
        <div class="sidebar-label">WORKSPACE</div>

        <a href="{{ route('user.dashboard') }}" class="active">
            <span>▦</span> Dashboard
        </a>

        <a href="#my-websites">
            <span>🌐</span> My Websites
        </a>

        <a href="{{ route('client.create-site') }}">
            <span>＋</span> Create Website
        </a>

        <a href="#approval-requests">
            <span>✓</span> My Requests
        </a>

        <div class="sidebar-label">ACCOUNT</div>

        <a href="{{ route('client.profile') }}">
            <span>👤</span> My Profile
        </a>
    </aside>

    <main class="main">

        <div class="welcome">
            <div>
                <h1>Welcome, {{ $user->name }}!</h1>
                <p>Manage your business websites in one place.</p>
            </div>

            @if ($totalWebsites < $websiteLimit)
                <a href="{{ route('client.create-site') }}" class="button">
                    + Create My Own Site
                </a>
            @else
                <a href="#approval-requests" class="button button-secondary">
                    Request More Websites
                </a>
            @endif
        </div>

        <div class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <p>Total Websites</p>
                    <div class="stat-icon">🌐</div>
                </div>

                <div class="stat-number">
                    {{ $totalWebsites }} / {{ $websiteLimit }}
                </div>

                <div class="stat-caption">Your website allowance</div>

                <div class="limit-bar">
                    <div class="limit-progress"
                         style="width: {{ $websiteLimit > 0 ? min(100, ($totalWebsites / $websiteLimit) * 100) : 0 }}%">
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <p>Published Websites</p>
                    <div class="stat-icon">✅</div>
                </div>

                <div class="stat-number">{{ $publishedWebsites }}</div>
                <div class="stat-caption">Websites available online</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <p>Pending Approvals</p>
                    <div class="stat-icon">⏳</div>
                </div>

                <div class="stat-number">{{ $pendingApprovals }}</div>
                <div class="stat-caption">Requests awaiting review</div>
            </div>

        </div>

        <section class="section" id="my-websites">

            <div class="section-heading">
                <div>
                    <h2>My Websites</h2>
                    <p>View and manage your business websites.</p>
                </div>

                @if ($totalWebsites < $websiteLimit)
                    <a href="{{ route('client.create-site') }}" class="button">
                        + Create Website
                    </a>
                @endif
            </div>

            <div class="tools">
                <input type="search"
                       id="websiteSearch"
                       class="field search-field"
                       placeholder="Search websites..."
                       aria-label="Search websites">

                <select id="websiteFilter" class="field" aria-label="Filter websites">
                    <option value="all">All Websites</option>
                    <option value="published">Published</option>
                    <option value="pending">Pending</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            @if ($websites->count() > 0)

                <div class="website-list" id="websiteList">

                    @foreach ($websites as $website)
                        @php
                            $status = strtolower($website->status ?? 'draft');

                            if (!in_array($status, ['published', 'pending', 'draft'])) {
                                $status = 'draft';
                            }

                            $websiteName = $website->title
                                ?? $website->name
                                ?? 'Untitled Website';

                            $websiteUrl = $website->url
                                ?? (
                                    !empty($website->slug)
                                        ? route('sites.show', $website->slug)
                                        : null
                                );
                        @endphp

                        <article class="website-card"
                                 data-name="{{ strtolower($websiteName) }}"
                                 data-status="{{ $status }}">

                            <div class="website-preview">🌐</div>

                            <div class="website-content">
                                <div class="website-title-row">
                                    <h3 class="website-title">
                                        {{ $websiteName }}
                                    </h3>

                                    <span class="status status-{{ $status }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </div>

                                <p>
                                    Created:
                                    {{ $website->created_at
                                        ? $website->created_at->format('d M Y')
                                        : 'Not available' }}
                                </p>

                                <div class="card-actions">
                                    @if ($status === 'published' && $websiteUrl)
                                        <a href="{{ $websiteUrl }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="button">
                                            Preview
                                        </a>
                                    @endif

                                    <span class="button button-secondary">
                                        {{ $status === 'pending'
                                            ? 'Awaiting Review'
                                            : 'Manage Website' }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>

                <div class="no-results" id="noResults">
                    No websites match your search.
                </div>

            @else

                <div class="empty">
                    <div class="empty-icon">🌐</div>
                    <h3>You haven't created a website yet</h3>

                    <p>
                        Start building your business website by selecting
                        the features you need.
                    </p>

                    @if ($totalWebsites < $websiteLimit)
                        <a href="{{ route('client.create-site') }}" class="button">
                            Create My Own Site
                        </a>
                    @else
                        <p>Your website limit has been reached.</p>
                    @endif
                </div>

            @endif

            <div class="notice">
                <strong>Website creation limit</strong>
                <p>
                    You can create up to {{ $websiteLimit }} websites.

                    @if ($remainingSlots > 0)
                        You can create {{ $remainingSlots }} more
                        {{ $remainingSlots === 1 ? 'website' : 'websites' }}.
                    @else
                        You have reached your standard limit. Request
                        Super Admin approval for additional websites.
                    @endif
                </p>
            </div>

        </section>

        <div class="bottom-grid">

            <section class="section">
                <h2>How It Works</h2>
                <p>Follow these steps to launch your website.</p>

                <ol class="steps">
                    <li>
                        <span class="step-number">1</span>
                        <div>
                            <h3>Create your website</h3>
                            <p>Enter your business and website details.</p>
                        </div>
                    </li>

                    <li>
                        <span class="step-number">2</span>
                        <div>
                            <h3>Select your features</h3>
                            <p>Choose the sections and features you need.</p>
                        </div>
                    </li>

                    <li>
                        <span class="step-number">3</span>
                        <div>
                            <h3>Customize and preview</h3>
                            <p>Review your website before publishing.</p>
                        </div>
                    </li>

                    <li>
                        <span class="step-number">4</span>
                        <div>
                            <h3>Publish your website</h3>
                            <p>Make it available online when ready.</p>
                        </div>
                    </li>
                </ol>
            </section>

            <section class="section" id="approval-requests">
                <h2>Approval Requests</h2>
                <p>Track your requests for additional websites.</p>

                <div class="activity-item">
                    <div class="activity-title">
                        Website limit: {{ $totalWebsites }} / {{ $websiteLimit }}
                    </div>

                    <p>
                        {{ $remainingSlots > 0
                            ? 'You still have available website slots.'
                            : 'Your standard website limit has been reached.' }}
                    </p>
                </div>

                @if ($remainingSlots === 0)
                    <div class="notice">
                        <strong>Need another website?</strong>
                        <p>
                            Submit a request to the Super Admin for approval.
                        </p>
                        <p>
                            Approval requests need to be connected to the
                            application backend.
                        </p>
                    </div>
                @else
                    <div class="activity-item">
                        <div class="activity-title">No approval required</div>
                        <p>You can create websites within your current limit.</p>
                    </div>
                @endif
            </section>

        </div>

    </main>
</div>

<footer>
    © {{ date('Y') }} Digi BizSites. All rights reserved.
</footer>

<script>
    const searchInput = document.getElementById('websiteSearch');
    const filterInput = document.getElementById('websiteFilter');
    const websiteCards = document.querySelectorAll('.website-card');
    const noResults = document.getElementById('noResults');

    function filterWebsites() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedStatus = filterInput.value;
        let visibleCount = 0;

        websiteCards.forEach(function (card) {
            const name = card.dataset.name || '';
            const status = card.dataset.status || 'draft';

            const matchesName = name.includes(searchTerm);
            const matchesStatus =
                selectedStatus === 'all' || selectedStatus === status;

            const visible = matchesName && matchesStatus;

            card.classList.toggle('hidden', !visible);

            if (visible) {
                visibleCount++;
            }
        });

        if (noResults) {
            noResults.style.display =
                websiteCards.length > 0 && visibleCount === 0
                    ? 'block'
                    : 'none';
        }
    }

    searchInput.addEventListener('input', filterWebsites);
    filterInput.addEventListener('change', filterWebsites);
</script>

</body>
</html>
