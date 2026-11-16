# WinkCart - Simple E-commerce Website

A simple and easy-to-understand e-commerce website built with Laravel. This project is designed to be student-friendly with clean, readable code.

## Features

- **Simple Homepage** - Clean layout with product categories and featured products
- **Product Browsing** - Search and filter products by category
- **Shopping Cart** - Add, update, and remove items from cart
- **User Authentication** - Login and register functionality
- **Admin Panel** - Manage products and orders (admin users only)
- **Responsive Design** - Works on desktop and mobile devices

## Technologies Used

- **Backend**: Laravel 12 with PHP 8.2+
- **Frontend**: Bootstrap 5 for styling
- **Database**: SQLite (can be changed to MySQL)
- **Icons**: Font Awesome 6
- **CSS**: Simple custom CSS for clean design

## Installation

1. Clone or download this project
2. Open terminal in project folder
3. Run: `composer install`
4. Copy `.env.example` to `.env`
5. Run: `php artisan key:generate`
6. Run: `php artisan migrate`
7. Run: `php artisan db:seed`
8. Start server: `php artisan serve`
9. Open browser to: `http://localhost:8000`

## Default Login Credentials

**Admin Login:**
- Email: admin@winkcart.com
- Password: password

**Test Customer Login:**
- Email: customer@winkcart.com
- Password: password

## Project Structure

### Models
- `User` - Handles user accounts and authentication
- `Product` - Stores product information
- `Cart` - Manages shopping cart items
- `Order` - Handles customer orders
- `Category` - Product categories

### Controllers
- `HomeController` - Homepage and product pages
- `AuthController` - Login and registration
- `CartController` - Shopping cart functionality
- `AdminController` - Admin panel features

### Views
- `layouts/app.blade.php` - Main layout template
- `home.blade.php` - Homepage
- `products/search.blade.php` - Product search page
- `cart/index.blade.php` - Shopping cart page
- `auth/` - Login and registration pages
- `admin/` - Admin panel pages

## Database Tables

1. **users** - User accounts
2. **products** - Product catalog
3. **carts** - Shopping cart items
4. **orders** - Customer orders
5. **categories** - Product categories

## Key Features Explained

### Simple Authentication
- Users can register and login
- Admin users have access to admin panel
- Guest users can browse and add to cart

### Product Management
- Products have name, description, price, image, and category
- Products can have sale prices
- Stock quantity tracking

### Shopping Cart
- Add products to cart
- Update quantities
- Remove items
- Works for both logged-in and guest users

### Order System
- Simple checkout process
- Customer information collection
- Order confirmation

## Customization

### Adding New Products
1. Go to admin panel
2. Click "Products"
3. Click "Add New Product"
4. Fill in product details
5. Save

### Styling Changes
- Edit `public/css/style.css` for design changes
- Colors, fonts, and layout can be easily modified

### Adding New Categories
- Add categories in the database
- Update category lists in views

## Learning Points

This project demonstrates:
- Basic Laravel MVC structure
- Database relationships
- User authentication
- Session management
- Form handling
- Basic e-commerce concepts
- Responsive web design

## Student Notes

This code is written to be:
- **Easy to read** - Clear variable names and comments
- **Simple structure** - No complex design patterns
- **Well organized** - Logical file organization
- **Documented** - Comments explaining key concepts

## Future Enhancements

You can add:
- Payment integration
- Email notifications
- Product reviews
- Wishlist functionality
- Advanced search filters
- Product images upload
- Order tracking
- Inventory management

---

**Made by a student, for students! 🎓**