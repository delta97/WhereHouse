# WhereHouse - Design System & UI/UX Plan

## Table of Contents
1. [Design Philosophy](#design-philosophy)
2. [Brand Identity](#brand-identity)
3. [Design System](#design-system)
4. [Component Library](#component-library)
5. [Page Layouts](#page-layouts)
6. [User Flows](#user-flows)
7. [Responsive Design](#responsive-design)
8. [Accessibility](#accessibility)
9. [Design Deliverables](#design-deliverables)

---

## Design Philosophy

### Core Principles

**1. Trust & Transparency**
- Clear pricing with no hidden fees
- Verified information and authentic reviews
- Secure payment processing with visible security indicators
- Real-time availability and honest representations

**2. Efficiency & Speed**
- Fast loading times (<2s)
- Minimal clicks to complete key actions
- Smart defaults and auto-fill where possible
- Streamlined booking flow (search → view → book in 3 steps)

**3. Professional Yet Approachable**
- B2B-focused but not intimidating for small businesses
- Data-driven insights presented clearly
- Professional aesthetics with warm, welcoming touches
- Industry credibility with user-friendly language

**4. Flexibility & Control**
- Customizable search filters
- Flexible contract terms
- User-controlled notifications and preferences
- Powerful tools without overwhelming complexity

---

## Brand Identity

### Brand Positioning
WhereHouse positions itself as the **"Airbnb for warehouse space"** - a modern, trusted marketplace that makes commercial storage accessible, flexible, and transparent.

### Brand Personality
- **Reliable**: Like a warehouse should be - solid, secure, dependable
- **Innovative**: Bringing modern technology to traditional logistics
- **Empowering**: Giving small businesses enterprise-level storage solutions
- **Efficient**: No wasted time, no wasted space

### Target Audience Personas

**Persona 1: Sarah - The E-commerce Entrepreneur**
- Age: 32, runs a growing Shopify store
- Pain: Outgrew garage storage but can't commit to a full warehouse
- Needs: Flexible space, month-to-month, near shipping hubs
- Tech savvy: High

**Persona 2: Mike - The Warehouse Owner**
- Age: 48, owns 200,000 sq ft facility
- Pain: 30% of space sits empty during off-season
- Needs: Reliable tenants, automated management, extra revenue
- Tech savvy: Medium

**Persona 3: Lisa - The Operations Manager**
- Age: 39, manages logistics for mid-size manufacturer
- Pain: Seasonal inventory fluctuations, needs overflow storage
- Needs: Professional facilities, quick booking, compliance tracking
- Tech savvy: Medium-High

### Tone of Voice
- **Professional but conversational**: "Find warehouse space that grows with you" not "Enterprise-grade logistics solutions"
- **Clear over clever**: Direct communication, avoid jargon
- **Helpful and educational**: Guide users through processes
- **Confident but not pushy**: Present value without aggressive sales tactics

---

## Design System

### Color Palette

#### Primary Colors
```css
/* Warehouse Blue - Trust, reliability, logistics */
--primary-50:  #eff6ff;   /* Lightest blue for backgrounds */
--primary-100: #dbeafe;
--primary-200: #bfdbfe;
--primary-300: #93c5fd;
--primary-400: #60a5fa;
--primary-500: #3b82f6;   /* Main brand color */
--primary-600: #2563eb;   /* Hover states, emphasis */
--primary-700: #1d4ed8;
--primary-800: #1e40af;
--primary-900: #1e3a8a;   /* Darkest for text */
```

#### Secondary Colors
```css
/* Warehouse Orange - Energy, action, growth */
--secondary-50:  #fff7ed;
--secondary-100: #ffedd5;
--secondary-200: #fed7aa;
--secondary-300: #fdba74;
--secondary-400: #fb923c;
--secondary-500: #f97316;  /* Calls-to-action, highlights */
--secondary-600: #ea580c;  /* Hover states */
--secondary-700: #c2410c;
--secondary-800: #9a3412;
--secondary-900: #7c2d12;
```

#### Neutral Colors
```css
/* Grays for text, borders, backgrounds */
--gray-50:  #f9fafb;
--gray-100: #f3f4f6;   /* Page backgrounds */
--gray-200: #e5e7eb;   /* Borders, dividers */
--gray-300: #d1d5db;
--gray-400: #9ca3af;   /* Disabled states */
--gray-500: #6b7280;   /* Secondary text */
--gray-600: #4b5563;   /* Body text */
--gray-700: #374151;
--gray-800: #1f2937;   /* Headings */
--gray-900: #111827;   /* Primary text */
```

#### Semantic Colors
```css
/* Success - Active contracts, confirmations */
--success-50:  #f0fdf4;
--success-500: #22c55e;
--success-700: #15803d;

/* Warning - Pending actions, alerts */
--warning-50:  #fffbeb;
--warning-500: #eab308;
--warning-700: #a16207;

/* Error - Declined, failures, validation */
--error-50:  #fef2f2;
--error-500: #ef4444;
--error-700: #b91c1c;

/* Info - Tips, notifications */
--info-50:  #eff6ff;
--info-500: #3b82f6;
--info-700: #1d4ed8;
```

#### Storage Type Colors
```css
/* Visual indicators for warehouse storage types */
--frozen: #3b82f6;        /* Blue - Cold */
--cooler: #06b6d4;        /* Cyan - Cool */
--climate: #10b981;       /* Green - Controlled */
--dry: #f59e0b;           /* Amber - Room temp */
```

### Typography

#### Font Families
```css
/* Primary: Inter - Modern, readable, professional */
--font-sans: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;

/* Headings: Clash Display or Inter Bold */
--font-display: 'Inter', sans-serif;
/* Use font-weight: 700-800 for display text */

/* Monospace: For data, pricing, codes */
--font-mono: 'JetBrains Mono', 'Fira Code', monospace;
```

#### Type Scale
```css
/* Mobile-first with responsive scaling */
--text-xs:   0.75rem;   /* 12px - Labels, captions */
--text-sm:   0.875rem;  /* 14px - Secondary text */
--text-base: 1rem;      /* 16px - Body text */
--text-lg:   1.125rem;  /* 18px - Emphasized body */
--text-xl:   1.25rem;   /* 20px - Small headings */
--text-2xl:  1.5rem;    /* 24px - Section headings */
--text-3xl:  1.875rem;  /* 30px - Page headings */
--text-4xl:  2.25rem;   /* 36px - Hero headings */
--text-5xl:  3rem;      /* 48px - Marketing */

/* Line Heights */
--leading-tight:  1.25;  /* Headings */
--leading-normal: 1.5;   /* Body text */
--leading-relaxed: 1.75; /* Long-form content */
```

#### Font Weights
```css
--font-normal:    400;
--font-medium:    500;  /* Emphasis, labels */
--font-semibold:  600;  /* Buttons, nav */
--font-bold:      700;  /* Headings */
--font-extrabold: 800;  /* Hero text */
```

### Spacing System
Based on 4px base unit (Tailwind default):
```css
--spacing-0:   0px;
--spacing-1:   4px;    /* 0.25rem */
--spacing-2:   8px;    /* 0.5rem */
--spacing-3:   12px;   /* 0.75rem */
--spacing-4:   16px;   /* 1rem */
--spacing-5:   20px;   /* 1.25rem */
--spacing-6:   24px;   /* 1.5rem */
--spacing-8:   32px;   /* 2rem */
--spacing-10:  40px;   /* 2.5rem */
--spacing-12:  48px;   /* 3rem */
--spacing-16:  64px;   /* 4rem */
--spacing-20:  80px;   /* 5rem */
--spacing-24:  96px;   /* 6rem */
```

### Border Radius
```css
--radius-sm:  0.125rem;  /* 2px - Subtle */
--radius-md:  0.375rem;  /* 6px - Buttons, inputs */
--radius-lg:  0.5rem;    /* 8px - Cards */
--radius-xl:  0.75rem;   /* 12px - Modals */
--radius-2xl: 1rem;      /* 16px - Hero sections */
--radius-full: 9999px;   /* Pills, avatars */
```

### Shadows
```css
/* Elevation system */
--shadow-sm:  0 1px 2px 0 rgb(0 0 0 / 0.05);
--shadow-md:  0 4px 6px -1px rgb(0 0 0 / 0.1);
--shadow-lg:  0 10px 15px -3px rgb(0 0 0 / 0.1);
--shadow-xl:  0 20px 25px -5px rgb(0 0 0 / 0.1);
--shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);

/* Interactive elements */
--shadow-focus: 0 0 0 3px rgb(59 130 246 / 0.5); /* Primary-500 with 50% opacity */
```

### Animations
```css
/* Timing functions */
--ease-in:     cubic-bezier(0.4, 0, 1, 1);
--ease-out:    cubic-bezier(0, 0, 0.2, 1);
--ease-in-out: cubic-bezier(0.4, 0, 0.2, 1);

/* Durations */
--duration-fast:   150ms;  /* Micro-interactions */
--duration-normal: 200ms;  /* Standard transitions */
--duration-slow:   300ms;  /* Complex animations */
```

---

## Component Library

### Buttons

#### Primary Button
```tsx
// Usage: Main CTAs, form submissions
className="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-md shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
```

#### Secondary Button
```tsx
// Usage: Secondary actions, cancel buttons
className="bg-white hover:bg-gray-50 text-gray-700 font-semibold px-6 py-3 rounded-md border border-gray-300 shadow-sm transition-colors duration-200"
```

#### Danger Button
```tsx
// Usage: Delete, terminate actions
className="bg-error-600 hover:bg-error-700 text-white font-semibold px-6 py-3 rounded-md shadow-sm transition-colors duration-200"
```

#### Ghost Button
```tsx
// Usage: Tertiary actions, inline links
className="text-primary-600 hover:text-primary-700 hover:bg-primary-50 font-medium px-4 py-2 rounded-md transition-colors duration-200"
```

### Form Elements

#### Input Field
```tsx
<div className="space-y-1">
  <label className="block text-sm font-medium text-gray-700">
    Warehouse Name
  </label>
  <input
    type="text"
    className="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
    placeholder="Enter warehouse name"
  />
  <p className="text-sm text-gray-500">
    This will be displayed to potential renters
  </p>
</div>
```

#### Select Dropdown
```tsx
<select className="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white">
  <option>Select storage type</option>
  <option>Frozen (-20°F to 0°F)</option>
  <option>Cooler (32°F to 45°F)</option>
  <option>Climate Control (55°F to 75°F)</option>
  <option>Dry Storage (Room Temperature)</option>
</select>
```

#### Checkbox
```tsx
<label className="flex items-center space-x-3 cursor-pointer">
  <input
    type="checkbox"
    className="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500"
  />
  <span className="text-gray-700">
    Send me email notifications for new messages
  </span>
</label>
```

#### Radio Buttons
```tsx
<div className="space-y-3">
  <label className="flex items-center space-x-3 cursor-pointer">
    <input type="radio" name="booking-type" className="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500" />
    <span className="text-gray-700">Instant Book</span>
  </label>
  <label className="flex items-center space-x-3 cursor-pointer">
    <input type="radio" name="booking-type" className="w-4 h-4 text-primary-600 border-gray-300 focus:ring-primary-500" />
    <span className="text-gray-700">Request to Book</span>
  </label>
</div>
```

### Cards

#### Warehouse Listing Card
```tsx
<div className="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden cursor-pointer">
  {/* Image */}
  <div className="relative h-48 bg-gray-200">
    <img src="warehouse.jpg" className="w-full h-full object-cover" />
    <div className="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-sm font-semibold">
      <span className="text-frozen">❄️ Frozen</span>
    </div>
  </div>

  {/* Content */}
  <div className="p-5">
    <div className="flex items-start justify-between mb-2">
      <h3 className="text-lg font-semibold text-gray-900">
        Downtown Distribution Center
      </h3>
      <div className="flex items-center space-x-1">
        <span className="text-yellow-400">★</span>
        <span className="text-sm font-medium">4.8</span>
      </div>
    </div>

    <p className="text-sm text-gray-600 mb-3">
      Indianapolis, IN • 2.3 miles away
    </p>

    <div className="flex items-center justify-between">
      <div>
        <span className="text-2xl font-bold text-gray-900">$45</span>
        <span className="text-gray-600">/skid/month</span>
      </div>
      <span className="text-sm text-gray-500">
        120 skids available
      </span>
    </div>
  </div>
</div>
```

#### Dashboard Stat Card
```tsx
<div className="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
  <div className="flex items-center justify-between mb-2">
    <span className="text-sm font-medium text-gray-600">Active Contracts</span>
    <span className="text-2xl">📦</span>
  </div>
  <div className="text-3xl font-bold text-gray-900 mb-1">24</div>
  <div className="text-sm text-success-600 flex items-center">
    <span>↑ 12%</span>
    <span className="text-gray-500 ml-2">vs last month</span>
  </div>
</div>
```

### Navigation

#### Header Navigation
```tsx
<header className="bg-white border-b border-gray-200 sticky top-0 z-50">
  <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div className="flex items-center justify-between h-16">
      {/* Logo */}
      <div className="flex items-center space-x-2">
        <img src="logo.svg" className="h-8" />
        <span className="text-xl font-bold text-gray-900">WhereHouse</span>
      </div>

      {/* Search (for logged-in users) */}
      <div className="flex-1 max-w-2xl mx-8">
        <input
          type="search"
          placeholder="Search by city, zipcode, or warehouse name..."
          className="w-full px-4 py-2 border border-gray-300 rounded-full focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
        />
      </div>

      {/* User Menu */}
      <div className="flex items-center space-x-4">
        <button className="relative">
          <span className="text-2xl">🔔</span>
          <span className="absolute -top-1 -right-1 bg-error-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
            3
          </span>
        </button>
        <button className="flex items-center space-x-2">
          <img src="avatar.jpg" className="w-10 h-10 rounded-full" />
          <span className="text-sm font-medium">John Doe</span>
        </button>
      </div>
    </div>
  </div>
</header>
```

#### Sidebar Navigation
```tsx
<aside className="w-64 bg-white border-r border-gray-200 h-screen sticky top-16">
  <nav className="p-4 space-y-1">
    {/* Active link */}
    <a href="/dashboard" className="flex items-center space-x-3 px-4 py-3 bg-primary-50 text-primary-700 rounded-md font-medium">
      <span className="text-xl">📊</span>
      <span>Dashboard</span>
    </a>

    {/* Inactive link */}
    <a href="/warehouses" className="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-md">
      <span className="text-xl">🏭</span>
      <span>My Warehouses</span>
    </a>

    {/* With badge */}
    <a href="/requests" className="flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-md">
      <div className="flex items-center space-x-3">
        <span className="text-xl">📝</span>
        <span>Requests</span>
      </div>
      <span className="bg-warning-100 text-warning-700 text-xs font-semibold px-2 py-1 rounded-full">
        5
      </span>
    </a>
  </nav>
</aside>
```

### Modals & Dialogs

#### Standard Modal
```tsx
<div className="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
  <div className="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto">
    {/* Header */}
    <div className="flex items-center justify-between p-6 border-b border-gray-200">
      <h2 className="text-xl font-bold text-gray-900">
        Confirm Booking
      </h2>
      <button className="text-gray-400 hover:text-gray-600">
        <span className="text-2xl">×</span>
      </button>
    </div>

    {/* Body */}
    <div className="p-6 space-y-4">
      <p className="text-gray-600">
        You are about to book 10 skids at Downtown Distribution Center for $450/month.
      </p>
    </div>

    {/* Footer */}
    <div className="flex items-center justify-end space-x-3 p-6 border-t border-gray-200">
      <button className="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md">
        Cancel
      </button>
      <button className="px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md">
        Confirm Booking
      </button>
    </div>
  </div>
</div>
```

### Badges & Tags

#### Status Badges
```tsx
{/* Pending */}
<span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-warning-100 text-warning-700">
  Pending
</span>

{/* Active */}
<span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-success-100 text-success-700">
  Active
</span>

{/* Declined */}
<span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-error-100 text-error-700">
  Declined
</span>

{/* Terminated */}
<span className="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
  Terminated
</span>
```

#### Feature Tags
```tsx
<div className="flex flex-wrap gap-2">
  <span className="px-3 py-1 bg-primary-100 text-primary-700 text-sm rounded-full">
    24/7 Access
  </span>
  <span className="px-3 py-1 bg-primary-100 text-primary-700 text-sm rounded-full">
    Loading Dock
  </span>
  <span className="px-3 py-1 bg-primary-100 text-primary-700 text-sm rounded-full">
    Security Cameras
  </span>
</div>
```

### Alerts & Notifications

#### Toast Notification
```tsx
<div className="fixed top-20 right-4 bg-white rounded-lg shadow-lg border-l-4 border-success-500 p-4 max-w-sm">
  <div className="flex items-start space-x-3">
    <span className="text-success-500 text-xl">✓</span>
    <div>
      <h4 className="font-semibold text-gray-900">Booking Confirmed</h4>
      <p className="text-sm text-gray-600 mt-1">
        Your reservation at Downtown DC is confirmed. Check your email for details.
      </p>
    </div>
    <button className="text-gray-400 hover:text-gray-600">×</button>
  </div>
</div>
```

#### Banner Alert
```tsx
<div className="bg-warning-50 border-l-4 border-warning-500 p-4">
  <div className="flex items-start space-x-3">
    <span className="text-warning-500 text-xl">⚠️</span>
    <div>
      <h4 className="font-semibold text-warning-900">Payment Method Expiring Soon</h4>
      <p className="text-sm text-warning-700 mt-1">
        Your credit card ending in 4242 expires on 12/2025.
        <a href="/account" className="underline font-medium">Update payment method</a>
      </p>
    </div>
  </div>
</div>
```

---

## Page Layouts

### Landing Page (Public)
```
┌──────────────────────────────────────────────┐
│ Header (Logo | Nav: How it Works, About, Login)│
├──────────────────────────────────────────────┤
│                                              │
│  🏭 HERO SECTION                            │
│  "Find Warehouse Space That Grows With You" │
│  [Search by city or zipcode] [Search Button]│
│                                              │
├──────────────────────────────────────────────┤
│  📦 FEATURED WAREHOUSES (Carousel)          │
│  [Card] [Card] [Card] [Card]                │
├──────────────────────────────────────────────┤
│  ✨ HOW IT WORKS                            │
│  1. Search → 2. Compare → 3. Book           │
├──────────────────────────────────────────────┤
│  💡 VALUE PROPS                             │
│  Flexible | Transparent | Secure            │
├──────────────────────────────────────────────┤
│  ⭐ TESTIMONIALS                            │
│  "WhereHouse saved us 40% on storage..."    │
├──────────────────────────────────────────────┤
│  📈 STATS                                   │
│  10K+ Warehouses | 5K+ Happy Customers      │
├──────────────────────────────────────────────┤
│  Footer (Links, Social, Legal)              │
└──────────────────────────────────────────────┘
```

### Dashboard (Lessee)
```
┌──────────────────────────────────────────────┐
│ Header (Logo | Search | Notifications | Avatar)│
├─────────┬────────────────────────────────────┤
│ Sidebar │ Dashboard Content                  │
│         │                                    │
│ 📊 Home │ Welcome back, John!               │
│ 🔍 Search│                                   │
│ 📦 Rentals│ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐│
│ 📝 Requests│ │Stat │ │Stat │ │Stat │ │Stat ││
│ 💬 Messages│ │Card │ │Card │ │Card │ │Card ││
│ 👤 Account│ └─────┘ └─────┘ └─────┘ └─────┘│
│         │                                    │
│         │ Active Rentals                     │
│         │ ┌────────────────────────────┐    │
│         │ │ Table with warehouse info  │    │
│         │ └────────────────────────────┘    │
│         │                                    │
│         │ Recommended Warehouses             │
│         │ [Card] [Card] [Card]              │
└─────────┴────────────────────────────────────┘
```

### Warehouse Search Results
```
┌──────────────────────────────────────────────┐
│ Header                                       │
├─────────┬────────────────────────────────────┤
│ Filters │ Map View / List View Toggle       │
│         │                                    │
│ 📍 Location│ ┌──────────────────────────┐  │
│ 📅 Dates │ │                          │  │
│ 🌡️ Storage│ │   MAP WITH PINS         │  │
│ 💰 Price │ │                          │  │
│ ⭐ Rating│ └──────────────────────────┘  │
│         │                                    │
│ [Apply] │ Search Results (24 warehouses)     │
│         │                                    │
│         │ ┌──────────────────┐              │
│         │ │ Listing Card     │              │
│         │ │ Image | Details  │              │
│         │ └──────────────────┘              │
│         │ ┌──────────────────┐              │
│         │ │ Listing Card     │              │
│         │ └──────────────────┘              │
│         │                                    │
│         │ [Load More]                        │
└─────────┴────────────────────────────────────┘
```

### Warehouse Detail Page
```
┌──────────────────────────────────────────────┐
│ Header                                       │
├──────────────────────────────────────────────┤
│ ← Back to Search Results                     │
│                                              │
│ ┌────────────────┐  Warehouse Details       │
│ │                │  Downtown Distribution   │
│ │  Image Gallery │  ⭐ 4.8 (127 reviews)    │
│ │  (Carousel)    │                          │
│ │                │  📍 Indianapolis, IN     │
│ └────────────────┘  🌡️ Climate Controlled   │
│                                              │
│ ┌─────────────────────────────────────────┐ │
│ │ Pricing & Availability                  │ │
│ │ $45/skid/month | 120 skids available    │ │
│ │                                         │ │
│ │ Select Dates: [From] [To]              │ │
│ │ Number of Skids: [10]                  │ │
│ │                                         │ │
│ │ Total: $450/month                      │ │
│ │ [Request Booking]                      │ │
│ └─────────────────────────────────────────┘ │
│                                              │
│ About This Warehouse                         │
│ Lorem ipsum dolor sit amet...                │
│                                              │
│ Amenities                                    │
│ ✓ 24/7 Access  ✓ Loading Dock  ✓ Security  │
│                                              │
│ Location                                     │
│ [Map embed]                                  │
│                                              │
│ Reviews (127)                                │
│ ┌──────────────────────────────┐            │
│ │ ⭐⭐⭐⭐⭐ "Great facility..." │            │
│ │ - Sarah M. | 2 months ago    │            │
│ └──────────────────────────────┘            │
└──────────────────────────────────────────────┘
```

### Owner Dashboard
```
┌──────────────────────────────────────────────┐
│ Header                                       │
├─────────┬────────────────────────────────────┤
│ Sidebar │ Owner Dashboard                    │
│         │                                    │
│ 📊 Home │ Revenue Overview                   │
│ 🏭 Warehouses│ ┌──────────────────────┐     │
│ 👥 Renters│ │  Revenue Chart       │     │
│ 📈 Analytics│ │  (Last 12 months)    │     │
│ 💬 Messages│ └──────────────────────┘     │
│ 👤 Account│                                 │
│         │ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐│
│ + Add   │ │Total│ │Active│ │Occupancy│ │Avg││
│ Warehouse│ │Rev  │ │Renters│ │Rate   │ │Rating││
│         │ └─────┘ └─────┘ └─────┘ └─────┘│
│         │                                    │
│         │ Your Warehouses (3)                │
│         │ ┌────────────────────────────┐    │
│         │ │ Name | Location | Status   │    │
│         │ │ [Edit] [View] [Analytics]  │    │
│         │ └────────────────────────────┘    │
│         │                                    │
│         │ Recent Bookings                    │
│         │ [Pending requests requiring action]│
└─────────┴────────────────────────────────────┘
```

---

## User Flows

### Flow 1: Lessee Registration & First Booking

```
1. Landing Page
   └→ Click "Sign Up"

2. Registration Modal
   ├→ "I'm looking for warehouse space" [Selected]
   ├→ "I have warehouse space to rent"
   │
   ├→ Email
   ├→ Password
   ├→ Company Name
   ├→ Phone
   └→ [Create Account] → Email verification sent

3. Email Verification
   └→ Click link → Account activated

4. Complete Profile
   ├→ Business Address
   ├→ Payment Method (credit card)
   └→ [Save & Continue]

5. Dashboard (First-time user)
   └→ Onboarding tooltip: "Let's find your first warehouse!"
      └→ Click "Search Warehouses"

6. Search Page
   ├→ Enter zipcode: "46202"
   ├→ Select dates: Jan 1 - Jun 30
   ├→ Storage type: "Climate Control"
   └→ [Search]

7. Search Results
   ├→ View 24 results on map
   ├→ Apply filters (price, rating)
   ├→ Click on listing card

8. Warehouse Detail Page
   ├→ Review photos, amenities, reviews
   ├→ Select: 10 skids, Jan 1 - Jun 30
   ├→ See total: $450/month
   └→ Click [Request Booking]

9. Booking Review Modal
   ├→ Review details
   ├→ Accept terms & conditions
   └→ [Confirm Request]

10. Booking Confirmation
    ├→ Success message: "Request sent to owner"
    ├→ Email confirmation sent
    └→ Redirect to "My Requests" page

11. Owner Reviews & Accepts
    └→ Lessee receives notification

12. Contract Signing
    ├→ Review contract
    ├→ E-sign
    └→ First payment processed

13. Active Rental
    └→ Appears in "My Rentals" dashboard
```

### Flow 2: Owner Listing First Warehouse

```
1. Registration
   └→ Select "I have warehouse space to rent"

2. Complete Profile
   ├→ Company information
   ├→ Bank account for payouts
   └→ Identity verification (future: KYC)

3. Dashboard → Add Warehouse

4. Warehouse Setup Wizard
   │
   ├─ Step 1: Basic Info
   │  ├→ Warehouse name
   │  ├→ Address
   │  └→ [Continue]
   │
   ├─ Step 2: Specifications
   │  ├→ Total capacity (skids)
   │  ├→ Storage type
   │  ├→ Temperature range
   │  ├→ Size (sq ft)
   │  └→ [Continue]
   │
   ├─ Step 3: Amenities
   │  ├→ Checkboxes (24/7 access, loading dock, etc.)
   │  └→ [Continue]
   │
   ├─ Step 4: Photos
   │  ├→ Upload images (drag & drop)
   │  ├→ Set cover photo
   │  └→ [Continue]
   │
   ├─ Step 5: Pricing
   │  ├→ Price per skid/month
   │  ├→ Security deposit
   │  ├→ Minimum rental period
   │  └→ [Continue]
   │
   └─ Step 6: Booking Settings
      ├→ Instant book: Yes/No
      ├→ Available dates
      └→ [Publish Listing]

5. Listing Review
   └→ Admin approval (if required)

6. Listing Published
   ├→ Appears in search results
   └→ Owner can track views in analytics
```

### Flow 3: Monthly Payment Processing

```
1. Automated Schedule
   └→ 1st of each month

2. Payment Attempt
   ├→ Charge lessee credit card
   │
   ├─ SUCCESS
   │  ├→ Email receipt to lessee
   │  ├→ Schedule payout to owner (platform fee deducted)
   │  └→ Update payment history
   │
   └─ FAILURE
      ├→ Email notification to lessee
      ├→ Retry after 3 days
      │
      ├─ SUCCESS on retry
      │  └→ (same as above)
      │
      └─ FAILURE after 3 retries
         ├→ Email final warning
         ├→ Notify owner
         ├→ Grace period (7 days)
         │
         └─ Still unpaid
            ├→ Suspend access
            ├→ Initiate termination process
            └→ Security deposit may be applied
```

---

## Responsive Design

### Breakpoints (Tailwind)
```css
/* Mobile-first approach */
sm:  640px   /* Small tablets */
md:  768px   /* Tablets */
lg:  1024px  /* Laptops */
xl:  1280px  /* Desktops */
2xl: 1536px  /* Large desktops */
```

### Mobile Adaptations (< 768px)

**Navigation**
- Hamburger menu replaces desktop nav
- Full-screen mobile menu overlay
- Bottom tab bar for key actions (Search, Messages, Profile)

**Search**
- Filters in collapsible drawer (bottom sheet)
- Map view full-screen with floating filter button
- List view becomes vertical scroll

**Cards**
- Stack vertically
- Full-width on mobile
- Larger touch targets (min 44x44px)

**Forms**
- Single column layout
- Native mobile inputs (date pickers, number steppers)
- Sticky CTAs at bottom of screen

**Tables**
- Transform to card view on mobile
- Horizontal scroll for data tables
- Swipeable rows for actions

### Desktop Enhancements (> 1024px)

- Persistent sidebar navigation
- Multi-column layouts for efficiency
- Hover states and tooltips
- Keyboard shortcuts
- Drag & drop interfaces
- Split-screen views (e.g., message list + conversation)

---

## Accessibility (WCAG 2.1 AA)

### Color Contrast
- **Text**: Minimum 4.5:1 contrast ratio
- **Large text (18px+)**: Minimum 3:1
- **UI components**: 3:1 against background
- **Tested**: Use tools like WebAIM Contrast Checker

### Keyboard Navigation
- All interactive elements keyboard accessible
- Visible focus indicators (focus ring)
- Logical tab order
- Skip links for navigation
- Keyboard shortcuts with modifier keys

### Screen Readers
- Semantic HTML (nav, main, article, aside)
- ARIA labels where needed
- Alt text for images
- Form labels properly associated
- Status messages announced (aria-live regions)

### Other Considerations
- Text scalable to 200% without breaking layout
- No reliance on color alone for information
- Captions for video content
- Clear error messages with suggestions
- Sufficient time for forms (or ability to extend)

---

## Design Deliverables

### Phase 1: Design System Setup
- [ ] Tailwind config with custom theme
- [ ] Typography scale documentation
- [ ] Color palette with semantic meanings
- [ ] Spacing system guide
- [ ] Component variants (Storybook)

### Phase 2: Wireframes
- [ ] Low-fidelity wireframes for all key pages
- [ ] User flow diagrams
- [ ] Mobile & desktop layouts

### Phase 3: High-Fidelity Mockups
- [ ] Landing page (public)
- [ ] Registration/login flows
- [ ] Lessee dashboard
- [ ] Owner dashboard
- [ ] Admin dashboard
- [ ] Search results (map & list views)
- [ ] Warehouse detail page
- [ ] Booking flow
- [ ] Contract signing
- [ ] Messaging interface
- [ ] Account settings
- [ ] Analytics dashboards

### Phase 4: Prototypes
- [ ] Interactive Figma prototype
- [ ] Mobile app prototype (if building native)
- [ ] Usability testing with 5-10 users

### Phase 5: Assets
- [ ] Logo (SVG, PNG in multiple sizes)
- [ ] Favicon set
- [ ] Social media preview images
- [ ] Email templates
- [ ] Illustration library (empty states, errors)
- [ ] Icon set (custom or from library like Heroicons)

---

## Design Tools

**Recommended Stack**:
- **Design**: Figma (collaborative, web-based)
- **Prototyping**: Figma or ProtoPie
- **Handoff**: Figma Dev Mode or Zeplin
- **Icons**: Heroicons, Lucide, or custom
- **Illustrations**: unDraw, Storyset, or custom
- **Stock Photos**: Unsplash, Pexels (warehouse imagery)
- **Color Tools**: Coolors, Adobe Color
- **Typography**: Google Fonts (Inter is free)

---

**Document Version**: 1.0
**Last Updated**: 2025-11-03
**Status**: Draft for Review
**Related**: [plan.md](./plan.md) | [plan.dev.md](./plan.dev.md)
