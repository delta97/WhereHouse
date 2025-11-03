# WhereHouse Marketplace - Migration & Modernization Plan

## Executive Summary

WhereHouse is a warehouse space marketplace platform that connects warehouse owners with businesses seeking flexible, scalable storage solutions. Originally built as a college project using PHP and MySQL, this plan outlines a comprehensive migration to a modern, production-ready technology stack.

### Current State
- **Technology**: PHP (procedural), MySQL, jQuery, Bootstrap
- **Hosting**: Purdue University servers (academic environment)
- **Status**: Functional prototype with core marketplace features
- **Issues**: Security vulnerabilities, no payment integration, code quality concerns

### Target State
- **Frontend**: React 18+ with TypeScript, Tailwind CSS, potentially Next.js
- **Backend**: Node.js with TypeScript, Express.js
- **Database**: PostgreSQL via Supabase (self-hosted or cloud)
- **Deployment**: Production-ready, scalable, secure
- **Status**: Full-featured marketplace with payments, analytics, and modern UX

---

## Project Vision

**Mission**: Democratize warehouse storage by creating a flexible, transparent marketplace that connects underutilized warehouse space with businesses that need scalable storage solutions.

**Target Users**:
1. **Warehouse Owners**: Property owners, logistics companies, 3PL providers with excess capacity
2. **Lessees**: SMBs, e-commerce businesses, seasonal businesses, startups needing flexible storage
3. **Platform Admins**: Marketplace operators managing platform health and growth

**Value Proposition**:
- **For Owners**: Monetize unused space, automated management, predictable income streams
- **For Lessees**: Pay only for what you need, month-to-month flexibility, transparent pricing
- **For Platform**: Commission-based revenue, network effects, data-driven insights

---

## Core Features (Current)

### Existing Functionality
✅ **User Management**
- Three-tier role system (Lessees, Owners, Admins)
- Basic registration and authentication
- Profile management with contact information

✅ **Warehouse Listings**
- Owners can create warehouse listings with:
  - Location (address, city, state, zipcode)
  - Pricing (per-skid pricing model)
  - Capacity and size specifications
  - Storage type (Frozen, Cooler, Climate Control, Dry)
  - Temperature ranges

✅ **Search & Discovery**
- Distance-based search using zipcode and lat/long calculations
- Filter by storage type and date availability
- Sort by distance or rating
- Results limited to top 100 matches

✅ **Contract Management**
- Request-based rental workflow
- Contract lifecycle: Pending → Accepted → Active → Terminated
- Start/end date tracking
- Skid allocation and pricing calculation
- Security deposit management

✅ **Messaging System**
- Direct messaging between owners and lessees
- Unread message notifications
- Message status tracking

✅ **Analytics**
- Owner analytics: revenue, contract status, renter information
- Admin analytics: platform-wide metrics, embedded R Shiny app
- Rating system foundation (data structure exists)

✅ **Basic Infrastructure**
- Database schema with users, warehouses, contracts, messages
- Zipcode-based geolocation data
- Session-based authentication

### Critical Gaps
❌ Payment processing integration
❌ Password encryption and security hardening
❌ Email notifications
❌ Complete rating/review system UI
❌ Mobile-responsive design
❌ Real-time notifications
❌ Document generation (contracts, invoices)
❌ Advanced search filters
❌ Multi-factor authentication
❌ API documentation
❌ Automated testing

---

## New Features & Enhancements

### Phase 1: Foundation & Security (MVP)

#### 1.1 Security Overhaul
- **Password Encryption**: Bcrypt/Argon2 for password hashing
- **SQL Injection Prevention**: Parameterized queries via ORM (Prisma)
- **Input Validation**: Zod schemas for all user inputs
- **CSRF Protection**: Token-based protection for forms
- **Rate Limiting**: Prevent brute force attacks
- **Session Management**: JWT-based authentication with refresh tokens
- **PCI Compliance**: Remove credit card storage, integrate payment processor

#### 1.2 Payment Integration
- **Provider**: Stripe Connect for marketplace payments
- **Features**:
  - Automated monthly billing
  - Split payments (platform commission + owner payout)
  - Security deposit handling with escrow
  - Failed payment retry logic
  - Payment history and invoicing
  - Refund management
- **Payment Methods**: Credit cards, ACH transfers, digital wallets

#### 1.3 Email & Notifications
- **Email Provider**: SendGrid or AWS SES
- **Notification Types**:
  - Account verification emails
  - Contract status updates (pending, accepted, declined)
  - Payment confirmations and receipts
  - Payment failure alerts
  - New message notifications
  - Monthly rental reminders
  - Rating/review requests post-rental
- **Channels**: Email, in-app notifications, optional SMS (Twilio)

#### 1.4 Enhanced Authentication
- **Features**:
  - Email verification on signup
  - Password reset flow
  - Two-factor authentication (optional)
  - OAuth integration (Google, Microsoft)
  - Session management dashboard
  - Login history and device tracking

### Phase 2: Core Marketplace Features

#### 2.1 Complete Rating & Review System
- **Multi-dimensional Ratings**:
  - Overall satisfaction (1-5 stars)
  - Quality of storage space
  - Handling and logistics
  - Storage conditions (temperature, cleanliness)
  - Consistency and reliability
  - Communication responsiveness
- **Features**:
  - Written reviews with character limits
  - Photo uploads (warehouse conditions)
  - Owner responses to reviews
  - Verified renter badge (only after contract completion)
  - Review moderation for admins
  - Aggregated rating displays on listings

#### 2.2 Advanced Search & Filtering
- **Search Criteria**:
  - Location (zipcode, city, radius in miles)
  - Date availability (start/end dates)
  - Storage type (multiple selection)
  - Temperature requirements (range slider)
  - Price range (min/max per skid)
  - Minimum capacity needed
  - Amenities (loading docks, 24/7 access, security, insurance)
  - Rating threshold (e.g., 4+ stars only)
- **Search Experience**:
  - Map view with warehouse pins (Google Maps/Mapbox)
  - List view with comparison tools
  - Save searches and favorites
  - Price alerts for saved searches
  - Recently viewed warehouses

#### 2.3 Smart Recommendations
- **Recommendation Engine** (based on existing R recommender.R):
  - Item-based collaborative filtering (IBCF)
  - User-based collaborative filtering (UBCF)
  - Hybrid approach combining multiple signals
  - Consider: past rentals, ratings given, search history, business type
- **Display**:
  - "Recommended for you" on dashboard
  - "Similar warehouses" on listing pages
  - "Lessees who rented this also viewed..."

#### 2.4 Enhanced Contract Management
- **Contract Features**:
  - Digital contract signing (e-signature via DocuSign API or custom)
  - PDF contract generation
  - Contract templates with customization
  - Automatic renewal options
  - Early termination requests
  - Contract amendment workflow
  - Insurance requirements and certificates of insurance (COI)
  - Liability waivers
- **Terms & Conditions**:
  - Platform terms of service
  - Warehouse-specific rules
  - Cancellation policies
  - Damage liability clauses

#### 2.5 Booking Flow Improvements
- **Instant Book**: Select warehouses allow immediate booking without owner approval
- **Request to Book**: Traditional approval workflow for others
- **Calendar Integration**: Real-time availability calendars
- **Provisional Holds**: 24-hour hold while finalizing details
- **Booking Modifications**: Request changes to existing contracts
- **Bulk Booking**: Book multiple skids/warehouses in one transaction

### Phase 3: Advanced Features

#### 3.1 Inventory Management (for Lessees)
- **Features**:
  - Track items stored in each warehouse
  - SKU management and barcodes
  - Inventory levels and alerts
  - Transfer requests between warehouses
  - Retrieval/delivery scheduling
  - Photos of stored goods
  - Chain of custody logging

#### 3.2 Warehouse Management Tools (for Owners)
- **Space Management**:
  - Visual floor plans with zone allocation
  - Real-time capacity tracking
  - Zone-based pricing (premium zones cost more)
  - Maintenance scheduling
  - Occupancy rate tracking
  - Availability calendar management
- **Tenant Management**:
  - Tenant directory with contact info
  - Communication logs
  - Issue tracking (damage reports, complaints)
  - Move-in/move-out checklists
  - Access control logs (if integrated with physical security)

#### 3.3 Financial Dashboard
- **For Owners**:
  - Revenue analytics (daily, monthly, yearly)
  - Payout history and pending payments
  - Occupancy rate vs revenue
  - Price optimization suggestions
  - Tax document generation (1099 forms)
  - Expense tracking
- **For Lessees**:
  - Spending analytics across warehouses
  - Budget tracking and alerts
  - Invoice history and downloads
  - Payment method management
  - Cost per SKU/item stored

#### 3.4 Advanced Analytics
- **Platform Analytics** (Admin):
  - GMV (Gross Merchandise Value) tracking
  - User acquisition and retention metrics
  - Conversion funnel analysis
  - Geographic heat maps
  - Pricing trends by region
  - Supply vs demand by market
  - Churn analysis
- **Predictive Analytics**:
  - Demand forecasting
  - Price optimization recommendations
  - Churn risk scoring
  - Fraud detection

#### 3.5 Mobile Application
- **Platform**: React Native or Progressive Web App (PWA)
- **Features**:
  - Mobile-optimized search and booking
  - Push notifications
  - QR code scanning for inventory
  - On-site check-ins
  - Photo uploads for reviews
  - Mobile payments
  - Offline mode for inventory access

### Phase 4: Marketplace Growth

#### 4.1 Dynamic Pricing
- **Features**:
  - Seasonal pricing calendars
  - Supply/demand-based pricing suggestions
  - Promotional pricing and discounts
  - Volume discounts for multiple skids
  - Long-term contract discounts
  - Last-minute booking discounts

#### 4.2 Insurance & Trust
- **Platform Insurance**:
  - Integrated insurance offerings
  - Damage protection plans
  - Liability coverage
  - Claims management workflow
- **Trust & Safety**:
  - Identity verification (KYC for owners)
  - Background checks (optional)
  - Warehouse inspection certifications
  - Compliance badges (FDA, organic, etc.)
  - Dispute resolution process
  - Escrow services for security deposits

#### 4.3 Logistics Integration
- **Integrations**:
  - Shipping carrier APIs (UPS, FedEx, USPS)
  - Last-mile delivery coordination
  - Freight forwarder partnerships
  - Loading dock scheduling
  - Cross-docking capabilities
- **Features**:
  - Shipment tracking from warehouse
  - Delivery coordination
  - Pickup scheduling
  - Freight quotes

#### 4.4 Value-Added Services
- **Warehouse Services Marketplace**:
  - Kitting and assembly
  - Palletizing and shrink-wrapping
  - Quality inspections
  - Returns processing
  - Inventory photography
  - Fulfillment services
- **Service Provider Network**:
  - Vetted service providers
  - Request quotes for services
  - Service booking and payment through platform

#### 4.5 API & Integrations
- **Public API**:
  - RESTful API for third-party integrations
  - Webhooks for real-time events
  - API documentation (OpenAPI/Swagger)
  - Rate limiting and authentication
- **Integrations**:
  - E-commerce platforms (Shopify, WooCommerce)
  - Inventory management systems
  - Accounting software (QuickBooks, Xero)
  - CRM systems (Salesforce, HubSpot)
  - Business intelligence tools (Tableau, Power BI)

---

## Technology Stack

### Frontend
- **Framework**: React 18+ with TypeScript
- **Styling**: Tailwind CSS with custom design system
- **Routing**: React Router (SPA) or Next.js App Router (SSR/SSG)
- **State Management**: Zustand or Redux Toolkit
- **Forms**: React Hook Form + Zod validation
- **UI Components**: Headless UI, Radix UI, or shadcn/ui
- **Data Fetching**: TanStack Query (React Query)
- **Maps**: Mapbox GL JS or Google Maps API
- **Charts**: Recharts or Chart.js
- **Date/Time**: date-fns or Day.js
- **Rich Text**: Tiptap or Lexical (for reviews, messages)

### Backend
- **Runtime**: Node.js 20+ with TypeScript
- **Framework**: Express.js or Fastify
- **ORM**: Prisma with PostgreSQL
- **Authentication**: Passport.js or NextAuth.js (if using Next.js)
- **Validation**: Zod (shared with frontend)
- **File Upload**: Multer with S3 storage
- **Email**: SendGrid or AWS SES
- **Payments**: Stripe SDK
- **Background Jobs**: BullMQ with Redis
- **Real-time**: Socket.io for live notifications
- **API Documentation**: Swagger/OpenAPI

### Database & Infrastructure
- **Database**: PostgreSQL 15+ via Supabase
- **Hosting Options**:
  - Self-hosted Supabase (Docker Compose)
  - Supabase Cloud (managed service)
- **Storage**: Supabase Storage or AWS S3 for files/images
- **Caching**: Redis for sessions, rate limiting, job queues
- **Search**: PostgreSQL full-text search or Algolia/Meilisearch
- **Monitoring**: Sentry (errors), LogRocket (session replay)
- **Analytics**: PostHog, Mixpanel, or Amplitude

### DevOps & Deployment
- **Version Control**: Git with GitHub
- **CI/CD**: GitHub Actions
- **Containerization**: Docker
- **Hosting**:
  - Frontend: Vercel (Next.js) or Netlify
  - Backend: Railway, Render, or AWS ECS
  - Database: Supabase Cloud or self-hosted
- **Domain & SSL**: Cloudflare
- **Monitoring**: Uptime Robot, Better Uptime

### Development Tools
- **Package Manager**: pnpm or npm
- **Monorepo**: Turborepo (optional, if managing multiple apps)
- **Linting**: ESLint + Prettier
- **Testing**:
  - Unit: Vitest or Jest
  - Integration: Supertest
  - E2E: Playwright or Cypress
- **Type Safety**: TypeScript strict mode
- **Git Hooks**: Husky + lint-staged

---

## Migration Strategy

### Approach: Incremental Rewrite
Rather than a "big bang" rewrite, we'll build the new system alongside the old and migrate features incrementally.

### Phase-by-Phase Migration

#### Phase 0: Preparation (2-3 weeks)
1. **Data Export**: Extract all data from MySQL to CSV/JSON
2. **Schema Design**: Design PostgreSQL schema in Prisma
3. **Development Environment**: Set up Next.js + Express + Supabase locally
4. **Design System**: Create Figma designs and Tailwind config
5. **Repository Setup**: Initialize monorepo with frontend/backend

#### Phase 1: Core Infrastructure (4-6 weeks)
1. **Database Migration**: Import data to PostgreSQL/Supabase
2. **Authentication System**: Build JWT-based auth with password hashing
3. **User Management**: Registration, login, profile pages
4. **API Foundation**: RESTful API structure with error handling
5. **Email Setup**: Configure SendGrid for transactional emails

#### Phase 2: Marketplace Core (6-8 weeks)
1. **Warehouse Listings**: CRUD operations for warehouses
2. **Search & Discovery**: Build search with filters and map view
3. **Warehouse Detail Pages**: Complete listing pages with photos
4. **Basic Booking Flow**: Request-to-book workflow
5. **Contract Management**: Contract creation and status tracking

#### Phase 3: Payments & Contracts (4-6 weeks)
1. **Stripe Integration**: Set up Stripe Connect
2. **Payment Processing**: Monthly billing automation
3. **Payout Management**: Owner payout scheduling
4. **Invoice Generation**: PDF invoices for renters
5. **Security Deposits**: Escrow handling

#### Phase 4: Communication & Ratings (3-4 weeks)
1. **Messaging System**: Real-time messaging with Socket.io
2. **Notification System**: Email + in-app notifications
3. **Rating & Review UI**: Complete rating system
4. **Review Moderation**: Admin tools for review management

#### Phase 5: Analytics & Recommendations (3-4 weeks)
1. **Dashboard Analytics**: Revenue, occupancy, metrics
2. **Recommendation Engine**: Port R recommender to Node.js/Python microservice
3. **Admin Analytics**: Platform-wide metrics dashboard
4. **Reporting**: Exportable reports for users

#### Phase 6: Polish & Launch (4-6 weeks)
1. **Mobile Responsiveness**: Complete mobile optimization
2. **Performance Optimization**: Lazy loading, caching, CDN
3. **SEO**: Meta tags, sitemaps, structured data
4. **Security Audit**: Third-party penetration testing
5. **User Acceptance Testing**: Beta testing with select users
6. **Documentation**: User guides, API docs, admin manuals
7. **Launch**: Gradual rollout with monitoring

**Total Timeline**: 6-9 months for full migration

---

## Success Metrics

### Technical Metrics
- **Performance**: Page load < 2s, API response < 200ms
- **Uptime**: 99.9% availability
- **Security**: Zero critical vulnerabilities
- **Test Coverage**: >80% code coverage
- **Mobile**: 100% feature parity with desktop

### Business Metrics
- **User Growth**: Track registered owners and lessees
- **Listing Growth**: Number of active warehouse listings
- **Booking Conversion**: % of searches that result in bookings
- **Revenue**: GMV (Gross Merchandise Value) and platform fees
- **User Retention**: % of users who return within 30 days
- **NPS**: Net Promoter Score for user satisfaction
- **Rating Completion**: % of rentals that get rated

### User Experience Metrics
- **Search Success Rate**: % of searches with >3 relevant results
- **Time to Book**: Average time from search to booking
- **Support Tickets**: Volume and resolution time
- **Bounce Rate**: % of users who leave immediately
- **Feature Adoption**: Usage rates of new features

---

## Risk Mitigation

### Technical Risks
- **Data Migration Issues**:
  - Mitigation: Thorough testing with staging database, data validation scripts
- **API Performance**:
  - Mitigation: Load testing, caching strategy, database indexing
- **Third-party Service Downtime**:
  - Mitigation: Fallback mechanisms, service redundancy, monitoring

### Business Risks
- **User Adoption**:
  - Mitigation: Beta program with early adopters, gradual rollout, training materials
- **Payment Processing Compliance**:
  - Mitigation: Use established provider (Stripe), legal review, compliance audit
- **Competition**:
  - Mitigation: Focus on unique features, superior UX, build community

### Operational Risks
- **Timeline Delays**:
  - Mitigation: Agile sprints with buffer time, MVP approach, regular stakeholder updates
- **Cost Overruns**:
  - Mitigation: Detailed budget tracking, cloud cost monitoring, optimize infrastructure
- **Security Breaches**:
  - Mitigation: Security-first development, regular audits, incident response plan

---

## Budget Estimate (Annual)

### Development Costs (One-time)
- Development: 6-9 months (depends on team size)
- Third-party integrations: $5k-10k
- Security audit: $5k-15k
- Design: $5k-10k

### Operational Costs (Annual)
- **Infrastructure**:
  - Supabase Cloud (Pro): $25/month = $300/year
  - Vercel (Pro): $20/month = $240/year
  - Backend hosting (Render/Railway): $50/month = $600/year
  - Redis: $15/month = $180/year
  - CDN/Storage: $20/month = $240/year
- **Services**:
  - Stripe: 2.9% + $0.30 per transaction (variable)
  - SendGrid: $20/month = $240/year
  - Monitoring (Sentry): $26/month = $312/year
  - Domain & SSL: $50/year
  - Maps API: $200/month = $2,400/year (or use Mapbox)
- **Total Fixed**: ~$4,500-5,000/year (before scaling)

### Scaling Costs
- Costs will increase with user growth (database, bandwidth, API calls)
- Budget 20-30% increase per 10x user growth

---

## Next Steps

1. **Review & Approval**: Stakeholder review of this plan
2. **Design Phase**: Complete design system and mockups (see `plan.design.md`)
3. **Technical Architecture**: Detailed technical specs (see `plan.dev.md`)
4. **Team Formation**: Assemble development team
5. **Sprint Planning**: Break down Phase 0 into 2-week sprints
6. **Kickoff**: Begin Phase 0 with environment setup

---

## Related Documents
- [`plan.design.md`](./plan.design.md) - Design system, UI/UX specifications, and branding
- [`plan.dev.md`](./plan.dev.md) - Technical architecture, API specs, and development roadmap

---

**Document Version**: 1.0
**Last Updated**: 2025-11-03
**Status**: Draft for Review
