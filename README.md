# Fastlinee - Taxi Booking Management System

A comprehensive web-based taxi booking platform that connects passengers with drivers, featuring real-time booking management and a powerful admin dashboard for fleet operations.

## 📋 Overview

Fastlinee is a modern taxi booking system built with Laravel and Alpine.js that streamlines the process of booking rides, managing drivers, and tracking bookings. The platform provides an intuitive interface for customers to book rides and a comprehensive admin panel for managing the entire taxi service operation.

## ✨ Key Features

### Customer Features
- **Easy Ride Booking**: Simple and intuitive taxi booking interface
- **Real-time Updates**: Live booking status and driver assignment notifications
- **Booking History**: View past rides and booking details
- **Receipt Generation**: Digital receipts for completed rides
- **Responsive Design**: Optimized for mobile and desktop devices

### Admin Features
- **Booking Management**: View, track, and manage all taxi bookings
- **Driver Assignment**: Assign available drivers to pending bookings
- **Fleet Management**: Manage drivers, vehicles, and availability
- **Receipt Export**: Generate and export booking receipts in PDF format
- **Dashboard Analytics**: Overview of bookings, revenue, and performance metrics
- **User Management**: Manage customer accounts and driver profiles
- **Real-time Monitoring**: Live tracking of active bookings and driver status

### Technical Features
- **PDF Generation**: Automated receipt and report generation
- **Authentication System**: Secure login for customers, drivers, and admins
- **Role-based Access**: Different permission levels for various user types
- **Data Export**: Export booking data and reports
- **Responsive UI**: Mobile-first design with Bootstrap CSS

## 🛠️ Technology Stack

### Backend
- **Framework**: Laravel 10.x (PHP 8.1+)
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum + Laravel Breeze
- **PDF Generation**: DomPDF for receipt and report generation

### Frontend
- **JavaScript Framework**: Alpine.js
- **Styling**: BootStrap
- **Build Tool**: Vite

### Key Packages
- **PDF Generation**: Laravel DomPDF
- **Authentication**: Laravel Breeze (Starter Kit)
- **Development Tools**: Laravel Tinker, Pint (Code Style)
- **Testing**: PHPUnit, Mockery

## 🚀 Installation

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL/PostgreSQL database

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/webamz007/fastlinee.git
   cd fastlinee
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure your `.env` file**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=fastlinee
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   
   # Mail Configuration (for notifications)
   MAIL_MAILER=smtp
   MAIL_HOST=your_smtp_host
   MAIL_PORT=587
   MAIL_USERNAME=your_email
   MAIL_PASSWORD=your_password
   ```

6. **Run database migrations**
   ```bash
   php artisan migrate
   ```

8. **Build frontend assets**
   ```bash
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   npm run dev
   ```

## 🚗 System Workflow

### Booking Process
1. **Customer Registration/Login**: Users create accounts or log in
2. **Ride Booking**: Customers input pickup/drop locations and book rides
3. **Admin Assignment**: Admins assign available drivers to bookings
4. **Driver Notification**: Assigned drivers receive booking details
5. **Ride Completion**: Trip completion and automatic receipt generation
6. **Payment & Receipt**: Digital receipts sent to customers

### Admin Operations
- **Dashboard Overview**: Monitor active bookings and system metrics
- **Booking Management**: View all bookings with filtering and search
- **Driver Assignment**: Manually assign drivers based on availability and location
- **Receipt Management**: Generate, view, and export receipts
- **Reporting**: Export booking data and generate performance reports

## 📊 Admin Panel Features

Access the admin panel at `/admin` with administrator credentials:

- **Dashboard**: Real-time overview of bookings, revenue, and driver status
- **Bookings**: Complete booking management with status tracking
- **Drivers**: Manage driver profiles, availability, and assignments
- **Customers**: Customer account management and booking history
- **Receipts**: Generate and export receipts in PDF format
- **Reports**: Comprehensive reporting and data export functionality
- **Settings**: System configuration and user role management

## 🔧 Configuration

### PDF Receipt Setup
The system uses DomPDF for generating receipts. Configure PDF settings in `config/dompdf.php`:

```php
'default_font' => 'DejaVu Sans',
'dpi' => 96,
'enable_html5_parser' => true,
```

### Role-based Access
Configure user roles and permissions:
- **Admin**: Full system access and management
- **Driver**: Access to assigned bookings and profile management
- **Customer**: Booking creation and history access

## 🖥️ Development

### Running in Development Mode
```bash
# Start Laravel development server
php artisan serve

# Start Vite development server (in separate terminal)
npm run dev
```

### Building for Production
```bash
# Build frontend assets
npm run build

# Optimize Laravel (production)
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 📱 Mobile Responsiveness

Fastlinee is built with a mobile-first approach using Bootstrap, ensuring optimal user experience across all devices:
- Responsive booking forms
- Touch-friendly admin interface
- Mobile-optimized receipt viewing
- Adaptive navigation and layouts

## 🔒 Security Features

- **Authentication**: Secure user authentication with Laravel Breeze
- **Authorization**: Role-based access control for different user types
- **CSRF Protection**: Cross-site request forgery protection
- **Input Validation**: Comprehensive data validation and sanitization
- **Secure Sessions**: Encrypted session management

## 📈 Performance Features

- **Optimized Assets**: Vite-powered asset bundling and optimization
- **Database Indexing**: Optimized database queries for fast performance
- **Caching**: Laravel's built-in caching for improved response times
- **Alpine.js**: Lightweight JavaScript framework for reactive UI

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support and inquiries:
- **Email**: websiteamz@gmail.com

---

**Built with ❤️ using Laravel and Bootstrap**