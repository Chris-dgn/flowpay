<svg {{ $attributes->merge(['viewBox' => '0 0 64 64', 'fill' => 'none', 'xmlns' => 'http://www.w3.org/2000/svg']) }}>
    <defs>
        <linearGradient id="flowpay-gradient" x1="8" y1="8" x2="56" y2="56" gradientUnits="userSpaceOnUse">
            <stop stop-color="#38BDF8"/>
            <stop offset="1" stop-color="#2563EB"/>
        </linearGradient>
    </defs>

    <rect x="3" y="3" width="58" height="58" rx="18" fill="url(#flowpay-gradient)"/>

    <!-- FlowPay : F stylisé + flux -->
    <path
        d="M22 18H43"
        stroke="white"
        stroke-width="5"
        stroke-linecap="round"
    />
    <path
        d="M22 31H38"
        stroke="white"
        stroke-width="5"
        stroke-linecap="round"
    />
    <path
        d="M22 18V46"
        stroke="white"
        stroke-width="5"
        stroke-linecap="round"
    />
    <path
        d="M38 31C45 31 48 35 48 40C48 45 45 48 40 48"
        stroke="white"
        stroke-width="4"
        stroke-linecap="round"
        stroke-linejoin="round"
    />
</svg>
