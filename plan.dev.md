# WhereHouse - Technical Architecture & Development Plan

## Table of Contents
1. [Technology Stack](#technology-stack)
2. [System Architecture](#system-architecture)
3. [Database Schema](#database-schema)
4. [API Specification](#api-specification)
5. [Authentication & Authorization](#authentication--authorization)
6. [Payment Processing](#payment-processing)
7. [File Storage](#file-storage)
8. [Email & Notifications](#email--notifications)
9. [Search & Recommendations](#search--recommendations)
10. [Testing Strategy](#testing-strategy)
11. [Deployment](#deployment)
12. [Development Roadmap](#development-roadmap)

---

## Technology Stack

### Frontend

#### Core Framework
```json
{
  "framework": "Next.js 14+",
  "runtime": "React 18+",
  "language": "TypeScript 5+",
  "routing": "App Router (Next.js)"
}
```

**Rationale**:
- Next.js provides SSR/SSG for SEO (important for marketplace discoverability)
- App Router offers improved performance with React Server Components
- Built-in API routes for BFF (Backend for Frontend) pattern
- Excellent developer experience with hot reload

#### Styling & UI
```json
{
  "styling": "Tailwind CSS 3+",
  "components": "shadcn/ui (Radix UI primitives)",
  "icons": "Lucide React",
  "animations": "Framer Motion"
}
```

#### State & Data Management
```json
{
  "server-state": "TanStack Query (React Query) v5",
  "client-state": "Zustand",
  "forms": "React Hook Form",
  "validation": "Zod"
}
```

#### Key Libraries
```typescript
// package.json dependencies
{
  "next": "^14.2.0",
  "react": "^18.3.0",
  "typescript": "^5.4.0",
  "tailwindcss": "^3.4.0",
  "@tanstack/react-query": "^5.0.0",
  "zustand": "^4.5.0",
  "react-hook-form": "^7.51.0",
  "zod": "^3.23.0",
  "date-fns": "^3.6.0",
  "mapbox-gl": "^3.3.0",
  "recharts": "^2.12.0",
  "framer-motion": "^11.0.0",
  "@radix-ui/react-dialog": "^1.0.5",
  "@radix-ui/react-dropdown-menu": "^2.0.6",
  "lucide-react": "^0.378.0",
  "next-auth": "^5.0.0-beta",
  "stripe": "^15.0.0",
  "@supabase/supabase-js": "^2.43.0"
}
```

### Backend

#### Core Framework
```json
{
  "runtime": "Node.js 20+ LTS",
  "framework": "Express.js 4+",
  "language": "TypeScript 5+"
}
```

#### Database & ORM
```json
{
  "database": "PostgreSQL 15+",
  "provider": "Supabase (self-hosted or cloud)",
  "orm": "Prisma 5+",
  "migrations": "Prisma Migrate"
}
```

#### Authentication & Security
```json
{
  "auth": "JWT (jsonwebtoken)",
  "password-hashing": "bcrypt or argon2",
  "session-store": "Redis",
  "rate-limiting": "express-rate-limit + Redis"
}
```

#### Key Libraries
```typescript
// backend package.json
{
  "express": "^4.19.0",
  "typescript": "^5.4.0",
  "@prisma/client": "^5.13.0",
  "prisma": "^5.13.0",
  "jsonwebtoken": "^9.0.2",
  "bcrypt": "^5.1.1",
  "zod": "^3.23.0",
  "express-validator": "^7.0.1",
  "helmet": "^7.1.0",
  "cors": "^2.8.5",
  "dotenv": "^16.4.5",
  "winston": "^3.13.0",
  "express-rate-limit": "^7.2.0",
  "redis": "^4.6.13",
  "bullmq": "^5.7.0",
  "stripe": "^15.0.0",
  "@sendgrid/mail": "^8.1.3",
  "socket.io": "^4.7.5",
  "multer": "^1.4.5-lts.1",
  "@aws-sdk/client-s3": "^3.555.0"
}
```

### Infrastructure

#### Database
- **PostgreSQL 15+** via Supabase
- **Redis** for caching, sessions, job queues
- **Supabase Storage** or **AWS S3** for file storage

#### Deployment
- **Frontend**: Vercel (optimized for Next.js)
- **Backend**: Railway, Render, or AWS ECS
- **Database**: Supabase Cloud or self-hosted on DigitalOcean/AWS
- **CDN**: Cloudflare for static assets
- **DNS**: Cloudflare

#### Monitoring & Logging
- **Error Tracking**: Sentry
- **Logging**: Winston + CloudWatch/Logtail
- **Uptime**: Better Uptime
- **Analytics**: PostHog or Mixpanel

---

## System Architecture

### High-Level Architecture

```
┌─────────────────────────────────────────────────────────┐
│                    CLIENT LAYER                         │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐ │
│  │   Web App    │  │  Mobile PWA  │  │  Admin Panel │ │
│  │  (Next.js)   │  │  (Next.js)   │  │  (Next.js)   │ │
│  └──────┬───────┘  └──────┬───────┘  └──────┬───────┘ │
└─────────┼──────────────────┼──────────────────┼─────────┘
          │                  │                  │
          └──────────────────┴──────────────────┘
                             │
                  ┌──────────▼──────────┐
                  │   CDN (Cloudflare)  │
                  └──────────┬──────────┘
                             │
          ┌──────────────────┴──────────────────┐
          │                                     │
┌─────────▼─────────┐              ┌───────────▼──────────┐
│  Next.js API      │              │  Backend API         │
│  Routes (BFF)     │◄─────────────┤  (Express.js)        │
│                   │              │                      │
│  - Auth helpers   │              │  - REST API          │
│  - SSR data fetch │              │  - WebSocket (msgs)  │
│  - File uploads   │              │  - Background jobs   │
└───────┬───────────┘              └───────┬──────────────┘
        │                                  │
        │         ┌────────────────────────┼─────────────┐
        │         │                        │             │
┌───────▼─────────▼───┐          ┌─────────▼─────┐  ┌───▼────────┐
│   PostgreSQL        │          │     Redis     │  │  BullMQ    │
│   (Supabase)        │          │               │  │  Workers   │
│                     │          │  - Sessions   │  │            │
│  - Users            │          │  - Cache      │  │ - Emails   │
│  - Warehouses       │          │  - Rate limit │  │ - Payments │
│  - Contracts        │          │  - Pub/Sub    │  │ - Reports  │
│  - Messages         │          └───────────────┘  └────────────┘
│  - Ratings          │
└─────────┬───────────┘
          │
┌─────────▼───────────┐
│  Supabase Storage   │
│  or AWS S3          │
│                     │
│  - Warehouse photos │
│  - Contract PDFs    │
│  - User avatars     │
└─────────────────────┘

EXTERNAL SERVICES:
┌──────────────┐  ┌──────────────┐  ┌──────────────┐
│   Stripe     │  │  SendGrid    │  │   Mapbox     │
│  (Payments)  │  │   (Email)    │  │    (Maps)    │
└──────────────┘  └──────────────┘  └──────────────┘
```

### Request Flow Example: Warehouse Search

```
1. User enters search → Next.js page (SSR)
   │
2. getServerSideProps fetches from Backend API
   │
3. Backend API:
   ├─ Check Redis cache for similar query
   │  └─ HIT: Return cached results
   │  └─ MISS: Continue
   │
   ├─ Query PostgreSQL with filters
   │  └─ Use PostGIS extension for distance calculations
   │
   ├─ Apply business logic (availability, pricing)
   │
   ├─ Cache results in Redis (5 min TTL)
   │
   └─ Return JSON to Next.js
   │
4. Next.js renders HTML with data
   │
5. Client receives interactive page
   └─ User clicks warehouse → Client-side navigation
      └─ React Query fetches details from API
```

---

## Database Schema

### Prisma Schema

```prisma
// prisma/schema.prisma

generator client {
  provider = "prisma-client-js"
}

datasource db {
  provider = "postgresql"
  url      = env("DATABASE_URL")
}

enum UserType {
  LESSEE
  OWNER
  ADMIN
}

enum ContractStatus {
  PENDING
  ACCEPTED
  ACTIVE
  DECLINED
  TERMINATED
  CANCELLED
}

enum StorageType {
  FROZEN
  COOLER
  CLIMATE_CONTROL
  DRY
}

// ============ USERS ============

model User {
  id            String    @id @default(cuid())
  email         String    @unique
  passwordHash  String
  firstName     String
  lastName      String
  phone         String?
  userType      UserType
  emailVerified Boolean   @default(false)

  // Address
  address1      String?
  address2      String?
  city          String?
  state         String?
  zipcode       String?

  // Metadata
  createdAt     DateTime  @default(now())
  updatedAt     DateTime  @updatedAt
  lastLoginAt   DateTime?

  // Relations
  lesseeProfile LesseeProfile?
  ownerProfile  OwnerProfile?

  // Messages
  sentMessages     Message[] @relation("SentMessages")
  receivedMessages Message[] @relation("ReceivedMessages")

  // Contracts (for lessees)
  lesseeContracts Contract[] @relation("LesseeContracts")

  // Notifications
  notifications Notification[]

  @@index([email])
  @@index([userType])
}

model LesseeProfile {
  userId          String   @id
  user            User     @relation(fields: [userId], references: [id], onDelete: Cascade)

  companyName     String?
  businessType    String?

  // Payment (tokenized, not raw card numbers)
  stripeCustomerId String? @unique

  // Preferences
  preferredStorage StorageType[]

  createdAt       DateTime @default(now())
  updatedAt       DateTime @updatedAt
}

model OwnerProfile {
  userId          String   @id
  user            User     @relation(fields: [userId], references: [id], onDelete: Cascade)

  companyName     String?
  businessLicense String?

  // Payout (Stripe Connect)
  stripeAccountId String?  @unique
  payoutEnabled   Boolean  @default(false)

  // Warehouses
  warehouses      Warehouse[]

  createdAt       DateTime @default(now())
  updatedAt       DateTime @updatedAt
}

// ============ WAREHOUSES ============

model Warehouse {
  id              String      @id @default(cuid())
  ownerId         String
  owner           OwnerProfile @relation(fields: [ownerId], references: [userId], onDelete: Cascade)

  // Basic Info
  name            String
  description     String?     @db.Text

  // Location
  address1        String
  address2        String?
  city            String
  state           String
  zipcode         String
  latitude        Float
  longitude       Float

  // Specifications
  totalCapacity   Int         // Total skids
  availableCapacity Int       // Available skids
  sizeSquareFeet  Int?
  pricePerSkid    Decimal     @db.Decimal(10, 2)

  // Storage
  storageType     StorageType
  lowestTemp      Int?        // Fahrenheit
  highestTemp     Int?        // Fahrenheit

  // Amenities (JSON array)
  amenities       Json        @default("[]")
  // Example: ["24/7 Access", "Loading Dock", "Security Cameras", "Climate Control"]

  // Booking Settings
  instantBook     Boolean     @default(false)
  minimumRentalMonths Int     @default(1)
  securityDeposit Decimal     @db.Decimal(10, 2)

  // Ratings
  averageRating   Float       @default(0)
  totalRatings    Int         @default(0)

  // Status
  isActive        Boolean     @default(true)
  isVerified      Boolean     @default(false)

  // Metadata
  createdAt       DateTime    @default(now())
  updatedAt       DateTime    @updatedAt

  // Relations
  images          WarehouseImage[]
  contracts       Contract[]
  reviews         Review[]
  availabilities  Availability[]

  @@index([ownerId])
  @@index([city, state])
  @@index([zipcode])
  @@index([storageType])
  @@index([isActive])
  @@index([latitude, longitude])
}

model WarehouseImage {
  id          String    @id @default(cuid())
  warehouseId String
  warehouse   Warehouse @relation(fields: [warehouseId], references: [id], onDelete: Cascade)

  url         String
  caption     String?
  order       Int       @default(0)
  isCover     Boolean   @default(false)

  createdAt   DateTime  @default(now())

  @@index([warehouseId])
}

model Availability {
  id          String    @id @default(cuid())
  warehouseId String
  warehouse   Warehouse @relation(fields: [warehouseId], references: [id], onDelete: Cascade)

  startDate   DateTime  @db.Date
  endDate     DateTime  @db.Date
  isBlocked   Boolean   @default(false) // Owner can block dates

  @@index([warehouseId])
  @@index([startDate, endDate])
}

// ============ CONTRACTS ============

model Contract {
  id              String         @id @default(cuid())

  // Parties
  lesseeId        String
  lessee          User           @relation("LesseeContracts", fields: [lesseeId], references: [id])
  warehouseId     String
  warehouse       Warehouse      @relation(fields: [warehouseId], references: [id])

  // Terms
  startDate       DateTime       @db.Date
  endDate         DateTime       @db.Date
  numSkids        Int
  pricePerSkid    Decimal        @db.Decimal(10, 2)
  totalMonthly    Decimal        @db.Decimal(10, 2)
  securityDeposit Decimal        @db.Decimal(10, 2)

  // Status
  status          ContractStatus @default(PENDING)

  // Documents
  contractPdfUrl  String?
  signedByLessee  Boolean        @default(false)
  signedByOwner   Boolean        @default(false)
  signedAt        DateTime?

  // Special terms
  storageType     StorageType
  tempControl     String?        // e.g., "55-65°F"
  specialTerms    String?        @db.Text

  // Metadata
  createdAt       DateTime       @default(now())
  updatedAt       DateTime       @updatedAt
  acceptedAt      DateTime?
  declinedAt      DateTime?
  terminatedAt    DateTime?

  // Relations
  payments        Payment[]
  review          Review?

  @@index([lesseeId])
  @@index([warehouseId])
  @@index([status])
  @@index([startDate, endDate])
}

// ============ PAYMENTS ============

model Payment {
  id              String    @id @default(cuid())
  contractId      String
  contract        Contract  @relation(fields: [contractId], references: [id])

  // Stripe
  stripePaymentIntentId String? @unique
  stripeChargeId        String? @unique

  // Amount
  amount          Decimal   @db.Decimal(10, 2)
  currency        String    @default("usd")

  // Status
  status          String    // succeeded, pending, failed, refunded
  paidAt          DateTime?
  failedAt        DateTime?

  // Metadata
  description     String?
  metadata        Json?

  // Dates
  dueDate         DateTime  @db.Date
  createdAt       DateTime  @default(now())
  updatedAt       DateTime  @updatedAt

  @@index([contractId])
  @@index([status])
  @@index([dueDate])
}

// ============ REVIEWS ============

model Review {
  id              String    @id @default(cuid())
  contractId      String    @unique
  contract        Contract  @relation(fields: [contractId], references: [id])
  warehouseId     String
  warehouse       Warehouse @relation(fields: [warehouseId], references: [id])

  // Ratings (1-5 stars)
  overallRating   Int       // Overall satisfaction
  qualityRating   Int       // Quality of space
  handlingRating  Int       // Handling and logistics
  storageRating   Int       // Storage conditions
  consistencyRating Int     // Consistency
  communicationRating Int   // Communication

  // Review
  reviewText      String?   @db.Text

  // Owner Response
  ownerResponse   String?   @db.Text
  ownerRespondedAt DateTime?

  // Verification
  isVerified      Boolean   @default(true) // Only renters who completed contract can review

  // Metadata
  createdAt       DateTime  @default(now())
  updatedAt       DateTime  @updatedAt

  @@index([warehouseId])
  @@index([overallRating])
}

// ============ MESSAGES ============

model Message {
  id          String    @id @default(cuid())

  senderId    String
  sender      User      @relation("SentMessages", fields: [senderId], references: [id])

  recipientId String
  recipient   User      @relation("ReceivedMessages", fields: [recipientId], references: [id])

  subject     String?
  body        String    @db.Text

  isRead      Boolean   @default(false)
  readAt      DateTime?

  // Thread support (optional)
  parentId    String?
  parent      Message?  @relation("MessageThread", fields: [parentId], references: [id])
  replies     Message[] @relation("MessageThread")

  createdAt   DateTime  @default(now())

  @@index([senderId])
  @@index([recipientId])
  @@index([isRead])
  @@index([createdAt])
}

// ============ NOTIFICATIONS ============

model Notification {
  id          String    @id @default(cuid())
  userId      String
  user        User      @relation(fields: [userId], references: [id], onDelete: Cascade)

  type        String    // "contract_accepted", "payment_due", "new_message", etc.
  title       String
  message     String    @db.Text

  // Link
  actionUrl   String?

  // Status
  isRead      Boolean   @default(false)
  readAt      DateTime?

  // Metadata
  metadata    Json?

  createdAt   DateTime  @default(now())

  @@index([userId])
  @@index([isRead])
  @@index([createdAt])
}

// ============ SAVED SEARCHES ============

model SavedSearch {
  id          String    @id @default(cuid())
  userId      String

  name        String
  filters     Json      // Store search filters

  // Alerts
  emailAlerts Boolean   @default(false)

  createdAt   DateTime  @default(now())
  updatedAt   DateTime  @updatedAt

  @@index([userId])
}

// ============ ANALYTICS ============

model WarehouseView {
  id          String    @id @default(cuid())
  warehouseId String
  userId      String?   // Null if anonymous
  ipAddress   String?
  userAgent   String?

  viewedAt    DateTime  @default(now())

  @@index([warehouseId])
  @@index([viewedAt])
}
```

### Database Migrations Strategy

```bash
# Initialize Prisma
npx prisma init

# Create migration
npx prisma migrate dev --name init

# Apply migrations to production
npx prisma migrate deploy

# Generate Prisma Client
npx prisma generate

# Seed database
npx prisma db seed
```

### Migration from MySQL to PostgreSQL

```typescript
// scripts/migrate-data.ts

import { PrismaClient as OldPrisma } from '@prisma/client-old';
import { PrismaClient as NewPrisma } from '@prisma/client';
import bcrypt from 'bcrypt';

const oldDb = new OldPrisma(); // Connected to old MySQL
const newDb = new NewPrisma(); // Connected to new PostgreSQL

async function migrateUsers() {
  const oldUsers = await oldDb.$queryRaw`SELECT * FROM User`;

  for (const user of oldUsers) {
    // Hash plaintext passwords
    const passwordHash = await bcrypt.hash(user.password, 10);

    // Determine user type
    const isLessee = await oldDb.$queryRaw`
      SELECT * FROM Lessee WHERE lessee_id = ${user.id}
    `;
    const userType = isLessee.length > 0 ? 'LESSEE' : 'OWNER';

    await newDb.user.create({
      data: {
        id: user.id.toString(),
        email: user.email,
        passwordHash,
        firstName: user.first_name,
        lastName: user.last_name,
        phone: user.phone_num,
        address1: user.address_1,
        address2: user.address_2,
        city: user.city,
        state: user.state,
        zipcode: user.zipcode,
        userType,
        emailVerified: true, // Assume existing users are verified
      },
    });
  }
}

async function migrateWarehouses() {
  const oldWarehouses = await oldDb.$queryRaw`SELECT * FROM Warehouse`;

  for (const wh of oldWarehouses) {
    await newDb.warehouse.create({
      data: {
        id: wh.warehouse_id.toString(),
        ownerId: wh.owner_id.toString(),
        name: wh.name || `Warehouse ${wh.warehouse_id}`,
        address1: wh.address_1,
        address2: wh.address_2,
        city: wh.city,
        state: wh.state,
        zipcode: wh.zipcode,
        latitude: parseFloat(wh.latitude),
        longitude: parseFloat(wh.longitude),
        totalCapacity: wh.capacity,
        availableCapacity: wh.capacity, // Recalculate based on contracts
        pricePerSkid: wh.price_per_skid,
        sizeSquareFeet: wh.size,
        storageType: mapStorageType(wh.storage_pref),
        lowestTemp: wh.lowest_temp,
        highestTemp: wh.highest_temp,
        averageRating: wh.weighted_average_rating || 0,
        totalRatings: wh.number_of_ratings || 0,
        securityDeposit: 500, // Default, adjust as needed
      },
    });
  }
}

function mapStorageType(old: string): string {
  const map = {
    'Frozen': 'FROZEN',
    'Cooler': 'COOLER',
    'Climate Control': 'CLIMATE_CONTROL',
    'Dry': 'DRY',
  };
  return map[old] || 'DRY';
}

// Run migrations
async function main() {
  console.log('Migrating users...');
  await migrateUsers();

  console.log('Migrating warehouses...');
  await migrateWarehouses();

  console.log('Migration complete!');
}

main()
  .catch(console.error)
  .finally(() => {
    oldDb.$disconnect();
    newDb.$disconnect();
  });
```

---

## API Specification

### API Architecture

**Pattern**: RESTful API with consistent conventions

**Base URL**: `https://api.wherehouse.com/v1`

**Authentication**: Bearer token (JWT) in `Authorization` header

### Endpoint Structure

```
/api/v1
├── /auth
│   ├── POST   /register
│   ├── POST   /login
│   ├── POST   /logout
│   ├── POST   /refresh-token
│   ├── POST   /forgot-password
│   ├── POST   /reset-password
│   └── POST   /verify-email
│
├── /users
│   ├── GET    /me
│   ├── PATCH  /me
│   ├── PATCH  /me/password
│   └── DELETE /me
│
├── /warehouses
│   ├── GET    /           (search, filters, pagination)
│   ├── GET    /:id
│   ├── POST   /           (create, owner only)
│   ├── PATCH  /:id        (update, owner only)
│   ├── DELETE /:id        (delete, owner only)
│   ├── GET    /:id/reviews
│   ├── GET    /:id/availability
│   └── POST   /:id/images (upload images)
│
├── /contracts
│   ├── GET    /           (list user's contracts)
│   ├── GET    /:id
│   ├── POST   /           (create booking request)
│   ├── PATCH  /:id/accept (owner accepts)
│   ├── PATCH  /:id/decline (owner declines)
│   ├── PATCH  /:id/cancel (lessee cancels)
│   ├── PATCH  /:id/terminate
│   └── POST   /:id/sign   (e-signature)
│
├── /payments
│   ├── GET    /           (payment history)
│   ├── GET    /:id
│   ├── POST   /setup-intent (Stripe setup intent)
│   └── POST   /retry/:id  (retry failed payment)
│
├── /messages
│   ├── GET    /           (inbox, sent)
│   ├── GET    /:id
│   ├── POST   /           (send message)
│   ├── PATCH  /:id/read   (mark as read)
│   └── DELETE /:id
│
├── /reviews
│   ├── GET    /           (all reviews, filtered)
│   ├── GET    /:id
│   ├── POST   /           (create review)
│   ├── PATCH  /:id        (edit review, within 30 days)
│   └── POST   /:id/response (owner response)
│
├── /notifications
│   ├── GET    /
│   ├── PATCH  /:id/read
│   └── PATCH  /read-all
│
└── /admin (admin only)
    ├── GET    /stats
    ├── GET    /users
    ├── GET    /warehouses
    └── PATCH  /warehouses/:id/verify
```

### API Examples

#### 1. Register User

**Request**:
```http
POST /api/v1/auth/register
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "SecurePass123!",
  "firstName": "John",
  "lastName": "Doe",
  "phone": "+1-555-1234",
  "userType": "LESSEE",
  "companyName": "Acme Corp"
}
```

**Response**:
```json
{
  "success": true,
  "data": {
    "user": {
      "id": "clx123abc",
      "email": "john@example.com",
      "firstName": "John",
      "lastName": "Doe",
      "userType": "LESSEE"
    },
    "message": "Registration successful. Please check your email to verify your account."
  }
}
```

#### 2. Search Warehouses

**Request**:
```http
GET /api/v1/warehouses?zipcode=46202&radius=25&storageType=CLIMATE_CONTROL&minCapacity=10&maxPrice=50&startDate=2025-01-01&endDate=2025-06-30&sort=distance&page=1&limit=20
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
```

**Response**:
```json
{
  "success": true,
  "data": {
    "warehouses": [
      {
        "id": "wh_123",
        "name": "Downtown Distribution Center",
        "address": "123 Main St, Indianapolis, IN 46202",
        "distance": 2.3,
        "pricePerSkid": 45.00,
        "availableCapacity": 120,
        "storageType": "CLIMATE_CONTROL",
        "averageRating": 4.8,
        "totalRatings": 127,
        "coverImage": "https://cdn.wherehouse.com/warehouses/wh_123/cover.jpg",
        "amenities": ["24/7 Access", "Loading Dock", "Security Cameras"],
        "instantBook": true
      },
      // ... more warehouses
    ],
    "pagination": {
      "page": 1,
      "limit": 20,
      "total": 45,
      "pages": 3
    },
    "filters": {
      "zipcode": "46202",
      "radius": 25,
      "storageType": "CLIMATE_CONTROL"
    }
  }
}
```

#### 3. Create Booking Request

**Request**:
```http
POST /api/v1/contracts
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
Content-Type: application/json

{
  "warehouseId": "wh_123",
  "startDate": "2025-01-01",
  "endDate": "2025-06-30",
  "numSkids": 10,
  "specialTerms": "Need temperature monitoring"
}
```

**Response**:
```json
{
  "success": true,
  "data": {
    "contract": {
      "id": "con_abc123",
      "warehouseId": "wh_123",
      "startDate": "2025-01-01",
      "endDate": "2025-06-30",
      "numSkids": 10,
      "pricePerSkid": 45.00,
      "totalMonthly": 450.00,
      "securityDeposit": 500.00,
      "status": "PENDING",
      "createdAt": "2024-11-03T10:30:00Z"
    },
    "message": "Booking request sent to warehouse owner. You will be notified when they respond."
  }
}
```

#### 4. Send Message

**Request**:
```http
POST /api/v1/messages
Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
Content-Type: application/json

{
  "recipientId": "user_456",
  "subject": "Question about warehouse",
  "body": "Hi, I'd like to know if you have loading docks available?"
}
```

**Response**:
```json
{
  "success": true,
  "data": {
    "message": {
      "id": "msg_789",
      "senderId": "user_123",
      "recipientId": "user_456",
      "subject": "Question about warehouse",
      "body": "Hi, I'd like to know if you have loading docks available?",
      "isRead": false,
      "createdAt": "2024-11-03T10:35:00Z"
    }
  }
}
```

### API Response Standards

**Success Response**:
```typescript
interface SuccessResponse<T> {
  success: true;
  data: T;
  message?: string;
}
```

**Error Response**:
```typescript
interface ErrorResponse {
  success: false;
  error: {
    code: string;          // e.g., "VALIDATION_ERROR", "NOT_FOUND"
    message: string;       // Human-readable message
    details?: any;         // Additional error details
    field?: string;        // For validation errors
  };
}
```

**Example Error**:
```json
{
  "success": false,
  "error": {
    "code": "VALIDATION_ERROR",
    "message": "Invalid email format",
    "field": "email"
  }
}
```

### Rate Limiting

```typescript
// Apply rate limits per route
const authLimiter = rateLimit({
  windowMs: 15 * 60 * 1000, // 15 minutes
  max: 5, // 5 requests per window
  message: 'Too many login attempts, please try again later.',
});

const apiLimiter = rateLimit({
  windowMs: 1 * 60 * 1000, // 1 minute
  max: 60, // 60 requests per minute
});

app.use('/api/v1/auth/login', authLimiter);
app.use('/api/v1/', apiLimiter);
```

---

## Authentication & Authorization

### JWT Structure

```typescript
interface JWTPayload {
  userId: string;
  email: string;
  userType: 'LESSEE' | 'OWNER' | 'ADMIN';
  iat: number;  // Issued at
  exp: number;  // Expires at
}

// Generate token
const accessToken = jwt.sign(
  { userId, email, userType },
  process.env.JWT_SECRET!,
  { expiresIn: '15m' } // Short-lived
);

const refreshToken = jwt.sign(
  { userId },
  process.env.JWT_REFRESH_SECRET!,
  { expiresIn: '7d' } // Long-lived
);
```

### Authentication Flow

```
1. User submits email + password
   │
2. Backend validates credentials
   ├─ Hash password with bcrypt
   ├─ Compare with stored hash
   └─ If valid, generate tokens
   │
3. Return access token + refresh token
   ├─ Access token (15 min expiry)
   └─ Refresh token (7 day expiry, stored in httpOnly cookie)
   │
4. Client stores access token in memory (Zustand)
   │
5. Client includes access token in Authorization header
   │
6. When access token expires:
   └─ Client calls /api/v1/auth/refresh-token
      ├─ Sends refresh token (from cookie)
      ├─ Backend validates refresh token
      └─ Returns new access token
```

### Authorization Middleware

```typescript
// middleware/auth.ts

import { Request, Response, NextFunction } from 'express';
import jwt from 'jsonwebtoken';

export interface AuthRequest extends Request {
  user?: JWTPayload;
}

export const authenticate = async (
  req: AuthRequest,
  res: Response,
  next: NextFunction
) => {
  try {
    const authHeader = req.headers.authorization;

    if (!authHeader?.startsWith('Bearer ')) {
      return res.status(401).json({
        success: false,
        error: {
          code: 'UNAUTHORIZED',
          message: 'No token provided',
        },
      });
    }

    const token = authHeader.substring(7);
    const decoded = jwt.verify(token, process.env.JWT_SECRET!) as JWTPayload;

    req.user = decoded;
    next();
  } catch (error) {
    return res.status(401).json({
      success: false,
      error: {
        code: 'UNAUTHORIZED',
        message: 'Invalid or expired token',
      },
    });
  }
};

export const requireRole = (...roles: UserType[]) => {
  return (req: AuthRequest, res: Response, next: NextFunction) => {
    if (!req.user || !roles.includes(req.user.userType)) {
      return res.status(403).json({
        success: false,
        error: {
          code: 'FORBIDDEN',
          message: 'Insufficient permissions',
        },
      });
    }
    next();
  };
};

// Usage:
app.get('/api/v1/admin/stats', authenticate, requireRole('ADMIN'), getAdminStats);
app.post('/api/v1/warehouses', authenticate, requireRole('OWNER'), createWarehouse);
```

---

## Payment Processing

### Stripe Integration Architecture

```
┌─────────────────────────────────────────────────────┐
│                 WhereHouse Platform                 │
│                                                     │
│  ┌──────────────┐              ┌──────────────┐   │
│  │   Lessee     │              │    Owner     │   │
│  │              │              │              │   │
│  │ Credit Card  │              │ Bank Account │   │
│  └──────┬───────┘              └──────▲───────┘   │
│         │                             │           │
│         │ 1. Monthly charge           │           │
│         │    $450                     │           │
│         │                             │           │
│         ▼                             │           │
│  ┌─────────────────────────────────────────────┐  │
│  │         Stripe Connect Platform             │  │
│  │                                             │  │
│  │  - Charge lessee: $450                     │  │
│  │  - Platform fee: $45 (10%)                 │  │
│  │  - Owner payout: $405                      │  │
│  │                                             │  │
│  └─────────────────────────────────────────────┘  │
│         │                             │           │
│         │                             │ 2. Payout │
│         │                             │    $405   │
│         │                             │           │
└─────────┼─────────────────────────────┼───────────┘
          │                             │
          ▼                             ▼
    Stripe Account                Stripe Connect
    (Platform)                    Account (Owner)
```

### Implementation

```typescript
// services/stripe.service.ts

import Stripe from 'stripe';
import prisma from '../lib/prisma';

const stripe = new Stripe(process.env.STRIPE_SECRET_KEY!, {
  apiVersion: '2024-10-28.acacia',
});

export class StripeService {

  // 1. Create Stripe customer for lessee
  async createCustomer(userId: string, email: string, paymentMethodId: string) {
    const customer = await stripe.customers.create({
      email,
      payment_method: paymentMethodId,
      invoice_settings: {
        default_payment_method: paymentMethodId,
      },
      metadata: { userId },
    });

    // Save customer ID to database
    await prisma.lesseeProfile.update({
      where: { userId },
      data: { stripeCustomerId: customer.id },
    });

    return customer;
  }

  // 2. Create Stripe Connect account for owner
  async createConnectAccount(userId: string, email: string) {
    const account = await stripe.accounts.create({
      type: 'express',
      email,
      capabilities: {
        transfers: { requested: true },
      },
      metadata: { userId },
    });

    // Generate onboarding link
    const accountLink = await stripe.accountLinks.create({
      account: account.id,
      refresh_url: `${process.env.APP_URL}/owner/onboarding/refresh`,
      return_url: `${process.env.APP_URL}/owner/onboarding/complete`,
      type: 'account_onboarding',
    });

    // Save account ID to database
    await prisma.ownerProfile.update({
      where: { userId },
      data: { stripeAccountId: account.id },
    });

    return { account, accountLink };
  }

  // 3. Process monthly payment
  async processMonthlyPayment(contractId: string) {
    const contract = await prisma.contract.findUnique({
      where: { id: contractId },
      include: {
        lessee: { include: { lesseeProfile: true } },
        warehouse: { include: { owner: { include: { ownerProfile: true } } } },
      },
    });

    if (!contract) throw new Error('Contract not found');

    const customerId = contract.lessee.lesseeProfile?.stripeCustomerId;
    const connectedAccountId = contract.warehouse.owner.ownerProfile?.stripeAccountId;

    if (!customerId || !connectedAccountId) {
      throw new Error('Payment information incomplete');
    }

    // Calculate amounts
    const amount = contract.totalMonthly.toNumber() * 100; // Convert to cents
    const platformFee = Math.round(amount * 0.10); // 10% platform fee

    // Create payment intent
    const paymentIntent = await stripe.paymentIntents.create({
      amount,
      currency: 'usd',
      customer: customerId,
      payment_method_types: ['card'],
      confirm: true,
      application_fee_amount: platformFee,
      transfer_data: {
        destination: connectedAccountId,
      },
      metadata: {
        contractId,
        type: 'monthly_rental',
      },
    });

    // Record payment
    await prisma.payment.create({
      data: {
        contractId,
        stripePaymentIntentId: paymentIntent.id,
        amount: contract.totalMonthly,
        status: paymentIntent.status,
        dueDate: new Date(),
        paidAt: paymentIntent.status === 'succeeded' ? new Date() : null,
      },
    });

    return paymentIntent;
  }

  // 4. Handle webhook events
  async handleWebhook(event: Stripe.Event) {
    switch (event.type) {
      case 'payment_intent.succeeded':
        await this.handlePaymentSuccess(event.data.object as Stripe.PaymentIntent);
        break;

      case 'payment_intent.payment_failed':
        await this.handlePaymentFailure(event.data.object as Stripe.PaymentIntent);
        break;

      case 'account.updated':
        await this.handleAccountUpdate(event.data.object as Stripe.Account);
        break;
    }
  }

  private async handlePaymentSuccess(paymentIntent: Stripe.PaymentIntent) {
    await prisma.payment.update({
      where: { stripePaymentIntentId: paymentIntent.id },
      data: {
        status: 'succeeded',
        paidAt: new Date(),
      },
    });

    // Send confirmation email
    // ...
  }

  private async handlePaymentFailure(paymentIntent: Stripe.PaymentIntent) {
    await prisma.payment.update({
      where: { stripePaymentIntentId: paymentIntent.id },
      data: {
        status: 'failed',
        failedAt: new Date(),
      },
    });

    // Send failure notification
    // ...
  }
}
```

### Webhook Endpoint

```typescript
// routes/webhooks.ts

import express from 'express';
import Stripe from 'stripe';

const router = express.Router();
const stripe = new Stripe(process.env.STRIPE_SECRET_KEY!);

router.post('/stripe', express.raw({ type: 'application/json' }), async (req, res) => {
  const sig = req.headers['stripe-signature']!;

  try {
    const event = stripe.webhooks.constructEvent(
      req.body,
      sig,
      process.env.STRIPE_WEBHOOK_SECRET!
    );

    await stripeService.handleWebhook(event);

    res.json({ received: true });
  } catch (err) {
    console.error('Webhook error:', err);
    res.status(400).send(`Webhook Error: ${err.message}`);
  }
});

export default router;
```

---

## File Storage

### Supabase Storage Setup

```typescript
// lib/storage.ts

import { createClient } from '@supabase/supabase-js';

const supabase = createClient(
  process.env.SUPABASE_URL!,
  process.env.SUPABASE_SERVICE_KEY!
);

export class StorageService {

  // Upload warehouse image
  async uploadWarehouseImage(
    warehouseId: string,
    file: Express.Multer.File
  ): Promise<string> {
    const fileName = `${Date.now()}-${file.originalname}`;
    const filePath = `warehouses/${warehouseId}/${fileName}`;

    const { data, error } = await supabase.storage
      .from('warehouse-images')
      .upload(filePath, file.buffer, {
        contentType: file.mimetype,
        upsert: false,
      });

    if (error) throw error;

    // Get public URL
    const { data: { publicUrl } } = supabase.storage
      .from('warehouse-images')
      .getPublicUrl(data.path);

    return publicUrl;
  }

  // Upload contract PDF
  async uploadContract(contractId: string, pdfBuffer: Buffer): Promise<string> {
    const filePath = `contracts/${contractId}/contract.pdf`;

    const { data, error } = await supabase.storage
      .from('contracts')
      .upload(filePath, pdfBuffer, {
        contentType: 'application/pdf',
        upsert: true,
      });

    if (error) throw error;

    const { data: { publicUrl } } = supabase.storage
      .from('contracts')
      .getPublicUrl(data.path);

    return publicUrl;
  }

  // Delete file
  async deleteFile(bucket: string, path: string): Promise<void> {
    const { error } = await supabase.storage
      .from(bucket)
      .remove([path]);

    if (error) throw error;
  }
}
```

### Image Upload Endpoint

```typescript
// routes/warehouses.ts

import multer from 'multer';
import { StorageService } from '../services/storage.service';

const upload = multer({
  storage: multer.memoryStorage(),
  limits: {
    fileSize: 5 * 1024 * 1024, // 5MB max
  },
  fileFilter: (req, file, cb) => {
    if (file.mimetype.startsWith('image/')) {
      cb(null, true);
    } else {
      cb(new Error('Only images are allowed'));
    }
  },
});

router.post(
  '/warehouses/:id/images',
  authenticate,
  requireRole('OWNER'),
  upload.array('images', 10), // Max 10 images
  async (req, res) => {
    const warehouseId = req.params.id;
    const files = req.files as Express.Multer.File[];

    const storageService = new StorageService();
    const uploadedUrls = [];

    for (const file of files) {
      const url = await storageService.uploadWarehouseImage(warehouseId, file);

      // Save to database
      await prisma.warehouseImage.create({
        data: {
          warehouseId,
          url,
          order: uploadedUrls.length,
        },
      });

      uploadedUrls.push(url);
    }

    res.json({
      success: true,
      data: { urls: uploadedUrls },
    });
  }
);
```

---

## Email & Notifications

### SendGrid Setup

```typescript
// services/email.service.ts

import sgMail from '@sendgrid/mail';
import { renderToString } from 'react-dom/server';
import { EmailTemplate } from '../emails/template';

sgMail.setApiKey(process.env.SENDGRID_API_KEY!);

export class EmailService {

  async sendVerificationEmail(email: string, token: string) {
    const verificationUrl = `${process.env.APP_URL}/verify-email?token=${token}`;

    const html = renderToString(
      <EmailTemplate
        title="Verify Your Email"
        preview="Click to verify your WhereHouse account"
      >
        <h1>Welcome to WhereHouse!</h1>
        <p>Please verify your email address to get started.</p>
        <a href={verificationUrl} style={{ /* button styles */ }}>
          Verify Email
        </a>
      </EmailTemplate>
    );

    await sgMail.send({
      to: email,
      from: 'noreply@wherehouse.com',
      subject: 'Verify Your WhereHouse Account',
      html,
    });
  }

  async sendContractAccepted(lesseeEmail: string, contractId: string) {
    const contractUrl = `${process.env.APP_URL}/contracts/${contractId}`;

    await sgMail.send({
      to: lesseeEmail,
      from: 'notifications@wherehouse.com',
      subject: 'Your Booking Request Has Been Accepted!',
      html: /* template */,
    });
  }

  async sendPaymentReceipt(email: string, payment: Payment) {
    // Generate PDF receipt
    // Send email with PDF attachment
  }
}
```

### Notification System

```typescript
// services/notification.service.ts

import prisma from '../lib/prisma';
import { io } from '../server'; // Socket.io instance

export class NotificationService {

  async create(userId: string, type: string, title: string, message: string, actionUrl?: string) {
    const notification = await prisma.notification.create({
      data: {
        userId,
        type,
        title,
        message,
        actionUrl,
      },
    });

    // Emit real-time notification via Socket.io
    io.to(`user:${userId}`).emit('notification', notification);

    return notification;
  }

  async notifyContractAccepted(contractId: string) {
    const contract = await prisma.contract.findUnique({
      where: { id: contractId },
      include: { warehouse: true, lessee: true },
    });

    await this.create(
      contract.lesseeId,
      'contract_accepted',
      'Booking Accepted!',
      `Your booking at ${contract.warehouse.name} has been accepted.`,
      `/contracts/${contractId}`
    );
  }
}
```

---

## Search & Recommendations

### PostgreSQL Full-Text Search

```typescript
// services/search.service.ts

import prisma from '../lib/prisma';

export class SearchService {

  async searchWarehouses(params: {
    query?: string;
    zipcode?: string;
    radius?: number;
    storageType?: StorageType;
    minCapacity?: number;
    maxPrice?: number;
    startDate?: Date;
    endDate?: Date;
    minRating?: number;
    amenities?: string[];
    page?: number;
    limit?: number;
    sort?: 'distance' | 'price' | 'rating';
  }) {
    const { query, zipcode, radius = 25, page = 1, limit = 20 } = params;

    // Get user's location from zipcode
    let userLat: number, userLon: number;
    if (zipcode) {
      const location = await prisma.$queryRaw`
        SELECT latitude, longitude FROM zipcode_lat_long WHERE zipcode = ${zipcode}
      `;
      userLat = location[0].latitude;
      userLon = location[0].longitude;
    }

    // Build query
    const warehouses = await prisma.$queryRaw`
      SELECT
        w.*,
        ${userLat && userLon ? `
          (3959 * acos(
            cos(radians(${userLat})) * cos(radians(w.latitude)) *
            cos(radians(w.longitude) - radians(${userLon})) +
            sin(radians(${userLat})) * sin(radians(w.latitude))
          )) AS distance
        ` : 'NULL AS distance'}
      FROM "Warehouse" w
      WHERE w."isActive" = true
        ${params.storageType ? `AND w."storageType" = ${params.storageType}` : ''}
        ${params.minCapacity ? `AND w."availableCapacity" >= ${params.minCapacity}` : ''}
        ${params.maxPrice ? `AND w."pricePerSkid" <= ${params.maxPrice}` : ''}
        ${params.minRating ? `AND w."averageRating" >= ${params.minRating}` : ''}
        ${query ? `AND to_tsvector('english', w.name || ' ' || w.description) @@ plainto_tsquery('english', ${query})` : ''}
      ${userLat && userLon && radius ? `
        HAVING distance <= ${radius}
      ` : ''}
      ORDER BY ${params.sort === 'rating' ? 'w."averageRating" DESC' : params.sort === 'price' ? 'w."pricePerSkid" ASC' : 'distance ASC'}
      LIMIT ${limit}
      OFFSET ${(page - 1) * limit}
    `;

    return warehouses;
  }
}
```

### Recommendation Engine (Port from R)

```typescript
// services/recommendation.service.ts

import prisma from '../lib/prisma';

export class RecommendationService {

  // Item-based collaborative filtering
  async getRecommendations(userId: string, limit: number = 5) {
    // 1. Get user's past rentals and ratings
    const userContracts = await prisma.contract.findMany({
      where: { lesseeId: userId },
      include: { review: true, warehouse: true },
    });

    if (userContracts.length === 0) {
      // New user: return popular warehouses
      return this.getPopularWarehouses(limit);
    }

    // 2. Find similar warehouses based on:
    //    - Storage type
    //    - Location proximity
    //    - Price range
    //    - Amenities
    const likedWarehouses = userContracts
      .filter(c => c.review && c.review.overallRating >= 4)
      .map(c => c.warehouse);

    if (likedWarehouses.length === 0) {
      return this.getPopularWarehouses(limit);
    }

    // 3. Calculate similarity scores
    const avgStorageType = this.getMostCommonStorageType(likedWarehouses);
    const avgPriceRange = this.getAveragePriceRange(likedWarehouses);
    const preferredAmenities = this.getMostCommonAmenities(likedWarehouses);

    // 4. Query for similar warehouses
    const recommendations = await prisma.warehouse.findMany({
      where: {
        isActive: true,
        id: { notIn: userContracts.map(c => c.warehouseId) }, // Exclude already rented
        storageType: avgStorageType,
        pricePerSkid: {
          gte: avgPriceRange.min,
          lte: avgPriceRange.max,
        },
      },
      orderBy: {
        averageRating: 'desc',
      },
      take: limit,
    });

    return recommendations;
  }

  private async getPopularWarehouses(limit: number) {
    return prisma.warehouse.findMany({
      where: { isActive: true },
      orderBy: [
        { averageRating: 'desc' },
        { totalRatings: 'desc' },
      ],
      take: limit,
    });
  }

  // Helper methods...
}
```

---

## Testing Strategy

### Unit Tests (Vitest)

```typescript
// tests/services/stripe.service.test.ts

import { describe, it, expect, beforeEach, vi } from 'vitest';
import { StripeService } from '../../src/services/stripe.service';
import Stripe from 'stripe';

vi.mock('stripe');

describe('StripeService', () => {
  let stripeService: StripeService;

  beforeEach(() => {
    stripeService = new StripeService();
  });

  describe('processMonthlyPayment', () => {
    it('should create payment intent with correct amount', async () => {
      const mockContract = {
        id: 'con_123',
        totalMonthly: 450,
        lessee: {
          lesseeProfile: { stripeCustomerId: 'cus_123' },
        },
        warehouse: {
          owner: {
            ownerProfile: { stripeAccountId: 'acct_123' },
          },
        },
      };

      // Mock Prisma and Stripe calls
      // ...

      const result = await stripeService.processMonthlyPayment('con_123');

      expect(result.amount).toBe(45000); // $450 in cents
      expect(result.application_fee_amount).toBe(4500); // 10% fee
    });
  });
});
```

### Integration Tests (Supertest)

```typescript
// tests/routes/auth.test.ts

import { describe, it, expect, beforeAll, afterAll } from 'vitest';
import request from 'supertest';
import app from '../../src/app';
import prisma from '../../src/lib/prisma';

describe('Auth Routes', () => {

  beforeAll(async () => {
    // Setup test database
    await prisma.$connect();
  });

  afterAll(async () => {
    // Cleanup
    await prisma.user.deleteMany();
    await prisma.$disconnect();
  });

  describe('POST /api/v1/auth/register', () => {
    it('should register a new user', async () => {
      const res = await request(app)
        .post('/api/v1/auth/register')
        .send({
          email: 'test@example.com',
          password: 'SecurePass123!',
          firstName: 'John',
          lastName: 'Doe',
          userType: 'LESSEE',
        });

      expect(res.status).toBe(201);
      expect(res.body.success).toBe(true);
      expect(res.body.data.user.email).toBe('test@example.com');
    });

    it('should reject duplicate email', async () => {
      // Register first user
      await request(app).post('/api/v1/auth/register').send({ /* ... */ });

      // Try to register again
      const res = await request(app)
        .post('/api/v1/auth/register')
        .send({ email: 'test@example.com', /* ... */ });

      expect(res.status).toBe(400);
      expect(res.body.error.code).toBe('EMAIL_EXISTS');
    });
  });
});
```

### E2E Tests (Playwright)

```typescript
// tests/e2e/booking-flow.spec.ts

import { test, expect } from '@playwright/test';

test.describe('Lessee Booking Flow', () => {

  test('should complete full booking flow', async ({ page }) => {
    // 1. Login
    await page.goto('/login');
    await page.fill('[name="email"]', 'lessee@test.com');
    await page.fill('[name="password"]', 'password123');
    await page.click('button[type="submit"]');
    await expect(page).toHaveURL('/dashboard');

    // 2. Search warehouses
    await page.goto('/search');
    await page.fill('[name="zipcode"]', '46202');
    await page.selectOption('[name="storageType"]', 'CLIMATE_CONTROL');
    await page.click('button:has-text("Search")');

    // 3. View results
    await expect(page.locator('.warehouse-card')).toHaveCountGreaterThan(0);

    // 4. Click on first warehouse
    await page.locator('.warehouse-card').first().click();
    await expect(page).toHaveURL(/\/warehouses\/wh_.+/);

    // 5. Fill booking form
    await page.fill('[name="startDate"]', '2025-01-01');
    await page.fill('[name="endDate"]', '2025-06-30');
    await page.fill('[name="numSkids"]', '10');

    // 6. Submit booking
    await page.click('button:has-text("Request Booking")');

    // 7. Verify success
    await expect(page.locator('.success-message')).toBeVisible();
    await expect(page.locator('.success-message')).toContainText('Booking request sent');
  });
});
```

---

## Deployment

### Environment Variables

```bash
# .env.example

# App
NODE_ENV=production
APP_URL=https://wherehouse.com
PORT=3000

# Database
DATABASE_URL=postgresql://user:password@host:5432/wherehouse
REDIS_URL=redis://localhost:6379

# Supabase
SUPABASE_URL=https://xxx.supabase.co
SUPABASE_SERVICE_KEY=xxx
SUPABASE_ANON_KEY=xxx

# JWT
JWT_SECRET=your-secret-key-here
JWT_REFRESH_SECRET=your-refresh-secret-here

# Stripe
STRIPE_SECRET_KEY=sk_live_xxx
STRIPE_PUBLISHABLE_KEY=pk_live_xxx
STRIPE_WEBHOOK_SECRET=whsec_xxx

# SendGrid
SENDGRID_API_KEY=SG.xxx

# Mapbox
NEXT_PUBLIC_MAPBOX_TOKEN=pk.xxx

# Monitoring
SENTRY_DSN=https://xxx@sentry.io/xxx
```

### Docker Setup

```dockerfile
# Dockerfile (Backend)

FROM node:20-alpine AS base

WORKDIR /app

# Dependencies
COPY package*.json ./
RUN npm ci --only=production

# Build
COPY . .
RUN npx prisma generate
RUN npm run build

# Production
FROM node:20-alpine

WORKDIR /app

COPY --from=base /app/dist ./dist
COPY --from=base /app/node_modules ./node_modules
COPY --from=base /app/prisma ./prisma
COPY --from=base /app/package.json ./

EXPOSE 3000

CMD ["npm", "start"]
```

```yaml
# docker-compose.yml

version: '3.8'

services:
  postgres:
    image: postgres:15
    environment:
      POSTGRES_DB: wherehouse
      POSTGRES_USER: user
      POSTGRES_PASSWORD: password
    volumes:
      - postgres_data:/var/lib/postgresql/data
    ports:
      - "5432:5432"

  redis:
    image: redis:7-alpine
    ports:
      - "6379:6379"

  backend:
    build: ./backend
    environment:
      DATABASE_URL: postgresql://user:password@postgres:5432/wherehouse
      REDIS_URL: redis://redis:6379
    ports:
      - "3000:3000"
    depends_on:
      - postgres
      - redis

volumes:
  postgres_data:
```

### CI/CD (GitHub Actions)

```yaml
# .github/workflows/deploy.yml

name: Deploy to Production

on:
  push:
    branches: [main]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - uses: actions/setup-node@v3
        with:
          node-version: '20'

      - name: Install dependencies
        run: npm ci

      - name: Run tests
        run: npm test

      - name: Run linter
        run: npm run lint

  deploy-frontend:
    needs: test
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3

      - name: Deploy to Vercel
        uses: amondnet/vercel-action@v25
        with:
          vercel-token: ${{ secrets.VERCEL_TOKEN }}
          vercel-org-id: ${{ secrets.VERCEL_ORG_ID }}
          vercel-project-id: ${{ secrets.VERCEL_PROJECT_ID }}
          vercel-args: '--prod'

  deploy-backend:
    needs: test
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3

      - name: Deploy to Railway
        run: |
          npm install -g @railway/cli
          railway up --service backend
        env:
          RAILWAY_TOKEN: ${{ secrets.RAILWAY_TOKEN }}
```

---

## Development Roadmap

### Phase 0: Setup (Weeks 1-2)

**Week 1**:
- [ ] Initialize Next.js project with TypeScript + Tailwind
- [ ] Initialize Express backend with TypeScript
- [ ] Set up Supabase account and database
- [ ] Configure Prisma with PostgreSQL
- [ ] Set up dev environment (Docker Compose)

**Week 2**:
- [ ] Design Prisma schema
- [ ] Run database migration
- [ ] Export data from old MySQL database
- [ ] Import data to PostgreSQL (with transformations)
- [ ] Set up Git repository and CI/CD

### Phase 1: Core Infrastructure (Weeks 3-8)

**Weeks 3-4: Authentication**
- [ ] Implement JWT auth system
- [ ] Build registration flow (lessee + owner)
- [ ] Email verification
- [ ] Login/logout
- [ ] Password reset flow
- [ ] Profile pages

**Weeks 5-6: User Management**
- [ ] Lessee dashboard (basic)
- [ ] Owner dashboard (basic)
- [ ] Admin dashboard (basic)
- [ ] Account settings pages
- [ ] Profile editing

**Weeks 7-8: API Foundation**
- [ ] Set up Express routes structure
- [ ] Implement error handling
- [ ] Add request validation (Zod)
- [ ] Set up logging (Winston)
- [ ] Configure rate limiting

### Phase 2: Marketplace Core (Weeks 9-16)

**Weeks 9-10: Warehouse Listings**
- [ ] Owner: Create warehouse wizard
- [ ] Owner: Edit/delete warehouses
- [ ] Image upload (Supabase Storage)
- [ ] Warehouse detail page
- [ ] Availability calendar

**Weeks 11-13: Search & Discovery**
- [ ] Search page with filters
- [ ] Map view (Mapbox integration)
- [ ] Distance calculation
- [ ] Search results page
- [ ] Save searches
- [ ] Favorites/wishlists

**Weeks 14-16: Booking Flow**
- [ ] Request-to-book flow
- [ ] Instant book flow
- [ ] Contract creation
- [ ] Owner accept/decline
- [ ] Contract status tracking
- [ ] My rentals page
- [ ] My requests page

### Phase 3: Payments (Weeks 17-20)

**Weeks 17-18: Stripe Integration**
- [ ] Set up Stripe Connect
- [ ] Lessee payment method setup
- [ ] Owner onboarding to Stripe
- [ ] Test payment flow

**Weeks 19-20: Payment Processing**
- [ ] Monthly billing automation (BullMQ jobs)
- [ ] Payment retry logic
- [ ] Invoice generation
- [ ] Payment history
- [ ] Security deposit handling
- [ ] Payout management

### Phase 4: Communication (Weeks 21-24)

**Weeks 21-22: Messaging**
- [ ] Real-time messaging (Socket.io)
- [ ] Inbox page
- [ ] Send message
- [ ] Message notifications
- [ ] Unread count badges

**Weeks 23-24: Notifications & Email**
- [ ] Email templates (React Email)
- [ ] SendGrid integration
- [ ] In-app notifications
- [ ] Notification preferences
- [ ] Email notification types

### Phase 5: Reviews & Recommendations (Weeks 25-28)

**Weeks 25-26: Rating System**
- [ ] Post-rental review form
- [ ] Multi-dimensional ratings
- [ ] Review display on listings
- [ ] Owner responses
- [ ] Review moderation (admin)

**Weeks 27-28: Recommendations**
- [ ] Recommendation engine
- [ ] "Recommended for you" section
- [ ] "Similar warehouses"
- [ ] Popular warehouses

### Phase 6: Polish & Launch (Weeks 29-34)

**Weeks 29-30: Mobile & Responsiveness**
- [ ] Mobile layout testing
- [ ] Touch interactions
- [ ] Mobile navigation
- [ ] PWA setup (optional)

**Weeks 31-32: Performance & SEO**
- [ ] Image optimization
- [ ] Lazy loading
- [ ] Code splitting
- [ ] Meta tags and SEO
- [ ] Sitemap generation
- [ ] Structured data (schema.org)

**Weeks 33-34: Testing & Launch**
- [ ] Security audit
- [ ] Load testing
- [ ] User acceptance testing
- [ ] Bug fixes
- [ ] Documentation
- [ ] Soft launch
- [ ] Monitor and iterate

---

**Total Timeline**: 34 weeks (~8 months)

**Team Recommendation**:
- 1 Frontend Developer (React/Next.js)
- 1 Backend Developer (Node.js/TypeScript)
- 1 Full-Stack Developer (shared responsibilities)
- 1 UI/UX Designer (part-time after initial phase)
- 1 QA Engineer (part-time in later phases)

---

**Document Version**: 1.0
**Last Updated**: 2025-11-03
**Status**: Draft for Review
**Related**: [plan.md](./plan.md) | [plan.design.md](./plan.design.md)
