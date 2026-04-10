# Product CRUD(Create, Read, Update and Delete) Application using PHP Laravel

A complete Product Management System built with Laravel 12, MySQL, and Bootstrap 5 UI.

## 📋 Features

- **Create** - Add new products with images
- **Read** - View all products with pagination and detailed product pages
- **Update** - Edit existing product information
- **Delete** - Remove products with confirmation
- **Image Upload** - Support for product images with preview
- **Responsive Design** - Mobile-friendly Bootstrap 5 interface
- **Form Validation** - Client and server-side validation
- **Pagination** - 10 products per page
- **Stock Management** - Track product quantities
- **Success/Error Notifications** - User-friendly feedback messages

## 🛠️ Technology Stack Used

- **Backend:** Laravel 12 (PHP)
- **Database:** MySQL (via XAMPP)
- **Frontend:** Bootstrap 5, Font Awesome Icons
- **Blade Templates:** Laravel's templating engine

## 📁 Project Structures

```
CRUD-Applicatin in laravel/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php      # CRUD operations
│   └── Models/
│       └── Product.php                 # Product model
├── database/
│   ├── migrations/
│   │   └── *_create_products_table.php
│   └── database.sqlite
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php          # Master layout
│       └── products/
│           ├── index.blade.php         # Product listing
│           ├── create.blade.php        # Create form
│           ├── edit.blade.php          # Edit form
│           └── show.blade.php          # Product details
├── routes/
│   └── web.php                         # Route definitions
└── public/
    └── storage                         # Uploaded images
```

## 🚀 Installation & Setup

### Prerequisites

Make sure you have the following installed:

- PHP 8.1 or higher
- Composer
- XAMPP (for MySQL/MariaDB)
- Git (optional)

### Step-by-Step Setup

#### 1. Start XAMPP Services

1. Open **XAMPP Control Panel**
2. Start **Apache** (if you want to use phpMyAdmin)
3. Start **MySQL** service

#### 2. Databases Setup

The database `crud_app` has already been created. If you need to recreate it:

**Option A: Using phpMyAdmin**

1. Open http://localhost/phpmyadmin
2. Click "New" in the left sidebar
3. Enter database name: `crud_app`
4. Click "Create"

**Option B: Using MySQL Command Line**

```bash
C:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE IF NOT EXISTS crud_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

#### 3. Environment Configuration

The `.env` file is already configured with:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_app
DB_USERNAME=root
DB_PASSWORD=
```

If needed, update these values to match your environment.

#### 4. Install Dependencies (Already Done)

Dependencies are already installed. If starting fresh:

```bash
composer install
```

#### 5. Generate Application Key (Already Done)

The application key is already set. If needed:

```bash
php artisan key:generate
```

#### 6. Run Migrations (Already Done)

Migrations have been executed. To re-run:

```bash
php artisan migrate:fresh
```

#### 7. Create Storage Link (Already Done)

Symbolic link for image uploads is already created. If needed:

```bash
php artisan storage:link
```

## ▶️ Running the Application

### Start the Development Server

```bash
php artisan serve
```

The application will be available at: **http://127.0.0.1:8000**

To stop the server, press `Ctrl+C` in the terminal.

### Alternative: Use XAMPP Apache

1. Copy project folder to `C:\xampp\htdocs\`
2. Update `.env` file if needed
3. Access via: http://localhost/CRUD-Applicatin%20in%20laravel/public

## 📖 How to Use the Application

### 1. Home Page / Product List

When you first access the application, you'll see:

- An empty product list with a message "No products found"
- A button to add your first product

**Features:**

- View all products in a table format
- See product images, names, descriptions, prices, and quantities
- Pagination controls (when you have more than 10 products)
- Quick action buttons for each product

### 2. Add a New Product

Click the **"Add New Product"** button to create a product.

**Required Fields:**

- **Product Name** - Enter the product name (max 255 characters)
- **Price** - Enter price in dollars (must be 0 or greater)
- **Quantity** - Enter stock quantity (must be 0 or greater)

**Optional Fields:**

- **Description** - Detailed product description
- **Product Image** - Upload an image (JPEG, PNG, JPG, GIF, max 2MB)

**Steps:**

1. Fill in the required fields
2. Optionally add description and upload an image
3. Image preview appears automatically when selected
4. Click **"Save Product"**
5. You'll be redirected to the product list with a success message

### 3. View Product Details

Click the **eye icon** (👁️) to view product details.

**Details Page Shows:**

- Large product image (or placeholder if no image)
- Complete product information
- Creation and last update dates
- Stock status badge (green for in-stock, red for out of stock)
- Quick access to Edit and Delete actions

### 4. Edit a Product

Click the **edit icon** (✏️) to modify a product.

**Edit Features:**

- All current product data is pre-filled
- Current image is displayed
- Upload a new image to replace the old one
- Old image is automatically deleted when replaced
- Click **"Update Product"** to save changes

### 5. Delete a Product

Click the **delete icon** (🗑️) or use the delete button on the details page.

**Delete Process:**

1. Confirmation dialog appears: "Are you sure you want to delete this product?"
2. Click "OK" to confirm or "Cancel" to abort
3. Product and its image (if any) are permanently deleted
4. Success message confirms deletion

## 🎨 UI Features

### Navigation Bar

- **Blue header** with application logo
- Links to Products List and Add Product
- Responsive mobile menu

### Notifications

- **Green alerts** for successful operations
- **Red alerts** for errors
- Dismissible with close button

### Product Table

- **Striped rows** for better readability
- **Hover effect** on row mouseover
- **Status badges** showing stock availability
- **Action buttons** grouped together

### Forms

- **Validation feedback** with error messages
- **Required field indicators** (red asterisk)
- **Image preview** before upload
- **Responsive layout** with proper spacing

## 🗄️ Database Schema

### Products Table

| Column      | Type                 | Description                    |
| ----------- | -------------------- | ------------------------------ |
| id          | BIGINT (Primary Key) | Auto-increment ID              |
| name        | VARCHAR(255)         | Product name                   |
| description | TEXT                 | Product description (nullable) |
| price       | DECIMAL(10,2)        | Product price                  |
| quantity    | INTEGER              | Stock quantity (default: 0)    |
| image       | VARCHAR(255)         | Image path (nullable)          |
| created_at  | TIMESTAMP            | Record creation time           |
| updated_at  | TIMESTAMP            | Last update time               |

## 🔧 Artisan Commands

Useful commands for managing the application:

```bash
# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan optimize

# List all routes
php artisan route:list

# Check migration status
php artisan migrate:status

# Rollback last migration
php artisan migrate:rollback

# Fresh migration (WARNING: Deletes all data)
php artisan migrate:fresh

# Create database seeder
php artisan make:seeder ProductSeeder

# Generate IDE helper files
php artisan ide-helper:generate
```

## 📝 Testing the Application

### Test Scenarios

1. **Create Test Products**
    - Add 15+ products to test pagination
    - Upload images to test file handling
    - Test validation by submitting invalid data

2. **Edit Functionality**
    - Update product information
    - Replace product images
    - Verify old images are deleted

3. **Delete Functionality**
    - Delete products with images
    - Confirm images are removed from storage
    - Test cancellation of delete operation

4. **Search & Navigation**
    - Navigate through paginated results
    - View individual product details
    - Test responsive design on mobile

## 🐛 Troubleshooting

### Common Issues

**1. Database Connection Error**

```
SQLSTATE[HY000] [1049] Unknown database 'crud_app'
```

**Solution:** Ensure MySQL is running in XAMPP and database exists.

**2. Permission Denied for Image Upload**

```
Unable to write to storage path
```

**Solution:**

```bash
# On Windows, ensure XAMPP has write permissions
# Or run as Administrator
```

**3. Port 8000 Already in Use**

```
Address already in use
```

**Solution:** Use a different port:

```bash
php artisan serve --port=8080
```

**4. Images Not Displaying**
**Solution:** Ensure storage link exists:

```bash
php artisan storage:link
```

**5. Class Not Found Errors**
**Solution:** Regenerate autoload files:

```bash
composer dump-autoload
```

## 🔐 Security Notes

- Change `APP_DEBUG=false` in production
- Set strong database password in production
- Never commit `.env` file to version control
- Validate all user inputs (already implemented)
- Use HTTPS in production environment

## 📦 Future Enhancements

Potential features to add:

- [ ] Search/filter functionality
- [ ] Product categories
- [ ] User authentication
- [ ] Shopping cart integration
- [ ] Export to PDF/Excel
- [ ] API endpoints
- [ ] Product reviews/ratings
- [ ] Inventory tracking with alerts

## 📄 License

This project is open-source and available under the MIT License.

## 👨‍💻 Author

Created with ❤️ using Laravel 12 and Bootstrap 5

---

## Quick Reference

### Access URLs

- **Application:** http://127.0.0.1:8000
- **phpMyAdmin:** http://localhost/phpmyadmin

### Default Credentials

- **Database Username:** root
- **Database Password:** (empty)

### Key Files

- **Routes:** `routes/web.php`
- **Controller:** `app/Http/Controllers/ProductController.php`
- **Model:** `app/Models/Product.php`
- **Views:** `resources/views/products/`

### Support

For issues or questions, please check:

- Laravel Documentation: https://laravel.com/docs
- Bootstrap Documentation: https://getbootstrap.com/docs

---
## Contact:
mdraushanji22@gmail.com

**Happy Coding! 🚀*

## Contact Us:
mdraushanji22@gmail.com 
6280779503
