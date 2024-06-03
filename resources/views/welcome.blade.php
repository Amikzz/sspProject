<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="src/css/style.css">
        <script src="https://unpkg.com/animejs@3.0.1/lib/anime.min.js"></script>
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;}::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ; }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px ;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-black/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <img src="src/images/output-onlinepngtools.png" width="300">
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        style="z-index: 10"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]]"
                                        style="z-index: 10"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                            style="z-index: 10"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main>
                        <section class="hero">
                            <div class="container">
                                <div class="hero-inner">
                                    <div class="hero-copy">
                                        <h1 class="hero-title mt-0">Welcome to SkillSwap</h1>
                                        <p class="hero-paragraph">SkillSwap is an innovative platform designed to facilitate the exchange of skills and knowledge between individuals. It serves as a marketplace where users can offer their expertise in various domains in exchange for money. This model leverages the diverse talents and knowledge within a community, fostering a collaborative environment where everyone can benefit. Some users can get benefit by earning extra money while some will be benefited by getting skills without a hassle.</p>
                                        <br>
                                        <div class="hero-cta"><a class="button button-primary" href="{{route('policy')}}" target="_blank">Our privacy policy</a><a class="button" href="{{route("terms")}}" target="_blank">About Us</a></div>
                                    </div>
                                    <div class="hero-figure anime-element">
                                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                                            <rect width="528" height="396" style="fill:transparent;" />
                                        </svg>
                                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                                        <div class="hero-figure-box hero-figure-box-05"></div>
                                        <div class="hero-figure-box hero-figure-box-06"></div>
                                        <div class="hero-figure-box hero-figure-box-07"></div>
                                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="features section">
                            <div class="container">
                                <div class="features-inner section-inner has-bottom-divider">
                                    <div class="features-wrap">
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-01.svg" alt="Feature 01">
                                                </div>
                                                <h4 class="feature-title mt-24">Create a Detailed Profile</h4>
                                                <p class="text-sm mb-0">Start by including a comprehensive description of your skills and expertise on your profile. Highlight your availability and preferred methods of communication to make it easier for potential skill swap partners to connect with you. Uploading a professional profile picture can significantly build trust and credibility, helping you stand out in the community.</p>
                                            </div>
                                        </div>
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-02.svg" alt="Feature 02">
                                                </div>
                                                <h4 class="feature-title mt-24">Utilize the Search Function</h4>
                                                <p class="text-sm mb-0">SkillSwap’s search function is a powerful tool to find the right individuals. Use specific keywords related to the skills you are seeking and take advantage of filters to narrow down results based on location, skill level, and availability. This targeted approach saves time and helps you connect with the most relevant people.</p>
                                            </div>
                                        </div>
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-03.svg" alt="Feature 03">
                                                </div>
                                                <h4 class="feature-title mt-24">Communicate Effectively</h4>
                                                <p class="text-sm mb-0">When you find potential skill swap partners, reach out with clear and concise messages explaining what you are looking for and what you can offer. Effective communication is key to building positive relationships, so always be respectful and professional in your interactions to foster a supportive and collaborative environment.</p>
                                            </div>
                                        </div>
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-04.svg" alt="Feature 04">
                                                </div>
                                                <h4 class="feature-title mt-24">Give and Receive Feedback</h4>
                                                <p class="text-sm mb-0"> Constructive feedback is essential for growth. Provide your skill swap partner with helpful feedback to aid their improvement, and be open to receiving feedback yourself. Use the feedback to refine your skills and enhance the effectiveness of your exchanges.</p>
                                            </div>
                                        </div>
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-05.svg" alt="Feature 05">
                                                </div>
                                                <h4 class="feature-title mt-24">Engage in the Community</h4>
                                                <p class="text-sm mb-0">Participate actively in SkillSwap’s forums and discussion groups to connect with more people. Sharing your experiences and success stories can inspire others and help you build a network of like-minded individuals. Engaging in the community also opens up more opportunities for skill swapping.</p>
                                            </div>
                                        </div>
                                        <div class="feature text-center is-revealing">
                                            <div class="feature-inner">
                                                <div class="feature-icon">
                                                    <img src="src/images/feature-icon-06.svg" alt="Feature 06">
                                                </div>
                                                <h4 class="feature-title mt-24">Maintain Professionalism</h4>
                                                <p class="text-sm mb-0">Always honor your commitments and respect your partner’s time. Professionalism is crucial in maintaining a positive reputation within the community. Ensure that all exchanges are fair and mutually beneficial, fostering a trustworthy environment where everyone can thrive.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="pricing section">
                            <div class="container-sm">
                                <div class="pricing-inner section-inner">
                                    <div class="pricing-header text-center">
                                        <h2 class="section-title mt-0">Our Premium Subscription</h2>
                                        <p class="section-paragraph mb-0">Our Premium Subscription offers you a dashboard where you can view analytics and get insights on how you have worked and contributed.</p>
                                    </div>
                                    <div class="pricing-tables-wrap">
                                        <div class="pricing-table">
                                            <div class="pricing-table-inner is-revealing">
                                                <div class="pricing-table-main">
                                                    <div class="pricing-table-header pb-24">
                                                        <div class="pricing-table-price"><span class="pricing-table-price-currency h2">Rs.</span><span class="pricing-table-price-amount h1">250</span><span class="text-xs">/month</span></div>
                                                    </div>
                                                    <div class="pricing-table-features-title text-xs pt-24 pb-24">What you will get</div>
                                                    <ul class="pricing-table-features list-reset text-xs">
                                                        <li>
                                                            <span>Dashboard</span>
                                                        </li>
                                                        <li>
                                                            <span>Premium Badge</span>
                                                        </li>
                                                        <li>
                                                            <span>Discounts</span>
                                                        </li>
                                                        <li>
                                                            <span>Free Advertising</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="pricing-table-cta mb-8">
                                                    <a class="button button-primary button-shadow button-block" href="{{route('register')}}">Register Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="cta section">
                            <div class="container">
                                <div class="cta-inner section-inner">
                                    <h3 class="section-title mt-0">Still not convinced with us?</h3>
                                    <div class="cta-cta">
                                        <a class="button button-primary button-wide-mobile" target="_blank" href={{route('stillnotconvinced')}}>Click here</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>

                    <footer class="site-footer">
                        <div class="container">
                            <div class="site-footer-inner">
                                <div class="brand footer-brand">
                                    <a href="#">
                                        <img class="header-logo-image" src="src/images/logo.svg" alt="Logo">
                                    </a>
                                </div>
                                <ul class="footer-links list-reset">
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                    <li>
                                        <a href="#">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">FAQ's</a>
                                    </li>
                                    <li>
                                        <a href="#">Support</a>
                                    </li>
                                </ul>
                                <ul class="footer-social-links list-reset">
                                    <li>
                                        <a href="#">
                                            <span class="screen-reader-text">Facebook</span>
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z" fill="#0270D7"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="screen-reader-text">Twitter</span>
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#0270D7"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="screen-reader-text">Google</span>
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#0270D7"/>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                <div class="footer-copyright">&copy; 2024 SkillSwap, all rights reserved</div>
                            </div>
                        </div>
                    </footer>
                </div>

                <script src="src/js/main.min.js"></script>
                </div>
            </div>
        </div>
    </body>
</html>
