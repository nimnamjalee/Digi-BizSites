<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sample Websites | Digi BizSites</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #7161e8;
            --primary-dark: #5b4bd5;
            --background: #f7f7fc;
            --text: #24243a;
            --muted: #77778c;
            --border: #e8e7f2;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .page-header {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand {
            color: var(--primary);
            font-size: 24px;
            font-weight: 800;
        }

        .header-link {
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
            padding: 11px 18px;
            border: 1px solid var(--border);
            border-radius: 9px;
            transition: 0.2s;
        }

        .header-link:hover {
            color: var(--primary);
            border-color: var(--primary);
        }

        .container {
            width: 88%;
            max-width: 1250px;
            margin: 0 auto;
            padding: 45px 0 60px;
        }

        .page-intro {
            text-align: center;
            margin-bottom: 35px;
        }

        .page-intro h1 {
            font-size: 34px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .page-intro p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
        }

        .samples-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 25px;
        }

        .sample-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .sample-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(50, 40, 100, 0.09);
        }

        .sample-preview {
            height: 220px;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: #eeebff;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .preview-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            padding: 20px;
            background: #ffffff;
        }

        .placeholder-preview {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
            color: var(--primary);
            font-size: 20px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .preview-caption {
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 12px;
            width: fit-content;
            max-width: calc(100% - 24px);
            padding: 7px 12px;
            background: rgba(255, 255, 255, 0.92);
            color: var(--text);
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .sample-content {
            padding: 20px;
        }

        .sample-content h2 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            overflow-wrap: anywhere;
        }

        .sample-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.7;
            min-height: 44px;
            margin-bottom: 18px;
            overflow-wrap: anywhere;
        }

        .sample-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 11px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            flex: 1;
            min-width: 115px;
        }

        .btn-preview {
            background: var(--primary);
            color: var(--white);
            border: 1px solid var(--primary);
        }

        .btn-preview:hover {
            background: var(--primary-dark);
        }

        .btn-admin {
            background: var(--white);
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-admin:hover {
            background: #f0edff;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 55px 20px;
        }

        .empty-state h2 {
            margin-bottom: 10px;
            font-size: 21px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 14px;
        }

        .page-footer {
            text-align: center;
            padding: 25px 15px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
        }

        @media (max-width: 1000px) {
            .samples-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .page-header {
                padding: 18px 5%;
            }

            .brand {
                font-size: 21px;
            }

            .container {
                width: 90%;
                padding-top: 30px;
            }

            .page-intro h1 {
                font-size: 27px;
            }

            .samples-grid {
                grid-template-columns: 1fr;
            }

            .sample-preview {
                height: 220px;
            }
        }
    </style>
</head>

<body>

<header class="page-header">
    <a href="{{ url('/') }}" class="brand">Digi BizSites</a>

    <a href="{{ url('/') }}" class="header-link">
        <i class="fa-solid fa-arrow-left"></i>
        Back to Home
    </a>
</header>

<main class="container">

    <section class="page-intro">
        <h1>Sample Websites</h1>
        <p>
            Explore our sample business websites and preview their designs.
        </p>
    </section>

    <section class="samples-grid">

        @forelse ($samples as $sample)

            @php
                /*
                 * Image priority:
                 * 1. Homepage banner
                 * 2. Logo
                 * 3. Thumbnail
                 */
                $imagePath = $sample->homepage_banner_path
                    ?: $sample->logo_path
                    ?: $sample->thumbnail;

                $imageUrl = null;
                $imageType = 'banner';

                if ($sample->homepage_banner_path) {
                    $imagePath = $sample->homepage_banner_path;
                    $imageType = 'banner';
                } elseif ($sample->logo_path) {
                    $imagePath = $sample->logo_path;
                    $imageType = 'logo';
                } elseif ($sample->thumbnail) {
                    $imagePath = $sample->thumbnail;
                    $imageType = 'thumbnail';
                }

                if ($imagePath) {
                    $imagePath = trim($imagePath);

                    if (\Illuminate\Support\Str::startsWith(
                        $imagePath,
                        ['http://', 'https://']
                    )) {
                        $imageUrl = $imagePath;
                    } else {
                        $imagePath = ltrim($imagePath, '/');

                        if (\Illuminate\Support\Str::startsWith(
                            $imagePath,
                            'storage/'
                        )) {
                            $imageUrl = asset($imagePath);
                        } else {
                            $imageUrl = asset('storage/' . $imagePath);
                        }
                    }
                }
            @endphp

            <article class="sample-card">

                <div class="sample-preview"
                     style="background: {{ $sample->primary_color ?? '#eeebff' }};">

                    @if ($imageUrl)

                        <img
                            src="{{ $imageUrl }}"
                            alt="{{ $sample->title }}"
                            class="{{ $imageType === 'logo' ? 'preview-logo' : 'preview-image' }}"
                            loading="lazy"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >

                        <div class="placeholder-preview" style="display:none;">
                            {{ $sample->title }}
                        </div>

                    @else

                        <div class="placeholder-preview">
                            {{ $sample->title }}
                        </div>

                    @endif

                    <span class="preview-caption">
                        {{ $sample->title }}
                    </span>

                </div>

                <div class="sample-content">

                    <h2>{{ $sample->title }}</h2>

                    <p class="sample-description">
                        {{ $sample->description ?: 'Explore this business website sample.' }}
                    </p>

                    <div class="sample-buttons">

                        <a
                            href="{{ route('sites.show', $sample->slug) }}"
                            class="btn btn-preview"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <i class="fa-solid fa-eye"></i>
                            Preview
                        </a>

                        <a
                            href="{{ route('admin.site-admin.view', $sample->id) }}"
                            class="btn btn-admin"
                        >
                            <i class="fa-solid fa-gear"></i>
                            Site Admin View
                        </a>

                    </div>

                </div>

            </article>

        @empty

            <div class="empty-state">
                <h2>No Sample Websites Available</h2>
                <p>
                    Published sample websites will appear here.
                </p>
            </div>

        @endforelse

    </section>

</main>

<footer class="page-footer">
    &copy; {{ date('Y') }} Digi BizSites. All rights reserved.
</footer>

</body>
</html>
