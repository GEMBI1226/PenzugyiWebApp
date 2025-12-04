<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <!-- Gradient definitions -->
    <defs>
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:currentColor;stop-opacity:1" />
            <stop offset="100%" style="stop-color:currentColor;stop-opacity:0.6" />
        </linearGradient>
    </defs>
    
    <!-- Outer circle with gradient -->
    <circle cx="100" cy="100" r="85" fill="none" stroke="url(#logoGradient)" stroke-width="3" opacity="0.3"/>
    
    <!-- Modern geometric finance symbol - abstract wallet/chart combination -->
    <!-- Base rectangle (wallet) -->
    <rect x="60" y="75" width="80" height="60" rx="8" fill="none" stroke="currentColor" stroke-width="3"/>
    
    <!-- Card slot detail -->
    <line x1="70" y1="85" x2="130" y2="85" stroke="currentColor" stroke-width="2" opacity="0.5"/>
    
    <!-- Rising bar chart inside -->
    <rect x="75" y="110" width="8" height="15" rx="2" fill="currentColor" opacity="0.7"/>
    <rect x="88" y="105" width="8" height="20" rx="2" fill="currentColor" opacity="0.8"/>
    <rect x="101" y="98" width="8" height="27" rx="2" fill="currentColor" opacity="0.9"/>
    <rect x="114" y="92" width="8" height="33" rx="2" fill="currentColor"/>
    
    <!-- Ascending arrow accent -->
    <path d="M 125 65 L 145 45 L 145 55 M 145 45 L 135 45" 
          stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    
    <!-- Decorative dots -->
    <circle cx="55" cy="55" r="2.5" fill="currentColor" opacity="0.4"/>
    <circle cx="145" cy="145" r="2.5" fill="currentColor" opacity="0.4"/>
    
    <!-- Subtle accent arc -->
    <path d="M 40 100 Q 40 40, 100 40" fill="none" stroke="currentColor" stroke-width="2" opacity="0.2"/>
</svg>
