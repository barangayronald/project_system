<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Panyeros Kusina</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 200px;
            background: linear-gradient(180deg, #C17A3F 0%, #B8693A 100%);
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
        }
        
        .sidebar-header {
            background: #C17A3F;
            padding: 20px 15px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            line-height: 1.4;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .nav-item {
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        .nav-item a {
            display: flex;
            align-items: center;
            padding: 18px 20px;
            color: #2d2d2d;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s;
            background: rgba(255,255,255,0.2);
        }
        
        .nav-item a:hover {
            background: rgba(255,255,255,0.3);
            padding-left: 25px;
        }
        
        .nav-item.active a {
            background: rgba(0,0,0,0.2);
            color: #fff;
            font-weight: 600;
        }
        
        .nav-icon {
            margin-right: 12px;
            font-size: 20px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 200px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .top-bar {
            background: linear-gradient(90deg, #C17A3F 0%, #D4874B 100%);
            padding: 15px 30px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .page-header-title {
            color: #fff;
            font-size: 24px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 14px;
        }
        
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .content-area {
            padding: 30px;
            flex: 1;
            overflow-y: auto;
        }
        
        /* Stats */
        .stats-bar {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-box {
            flex: 1;
            text-align: center;
            padding: 20px;
            background: #b5b5b5;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #2d2d2d;
        }
        
        .stat-label {
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        
        /* Container */
        .container {
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 30px;
        }
        
        .card {
            background: #b5b5b5;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            height: fit-content;
        }
        
        .card-header {
            background: #D4874B;
            color: #fff;
            padding: 18px 25px;
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #2d2d2d;
            font-weight: 600;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            background: rgba(255,255,255,0.5);
        }
        
        .form-control:focus {
            outline: none;
            border-color: #D4874B;
            background: #fff;
        }
        
        .submit-btn {
            background: #D4874B;
            color: #fff;
            border: none;
            padding: 14px 40px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            display: block;
            width: 100%;
        }
        
        .submit-btn:hover {
            background: #B8693A;
        }
        
        /* Table */
        .table-container {
            overflow-x: auto;
        }
        
        .search-box {
            margin-bottom: 20px;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: rgba(255,255,255,0.5);
        }
        
        .search-input:focus {
            outline: none;
            border-color: #D4874B;
            background: #fff;
        }
        
        .inventory-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .inventory-table thead {
            background: rgba(0,0,0,0.05);
        }
        
        .inventory-table th {
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
            color: #2d2d2d;
            border-bottom: 2px solid #ddd;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .inventory-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #ddd;
            color: #2d2d2d;
            font-size: 14px;
        }
        
        .inventory-table tbody tr {
            transition: background 0.2s;
        }
        
        .inventory-table tbody tr:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .stock-status {
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 12px;
            display: inline-block;
        }
        
        .stock-low {
            background: #d84315;
            color: #fff;
        }
        
        .stock-good {
            background: #4caf50;
            color: #fff;
        }
        
        .stock-medium {
            background: #ffc107;
            color: #2d2d2d;
        }
        
        .action-btn {
            background: #6c757d;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s;
            margin-right: 5px;
        }
        
        .action-btn:hover {
            background: #5a6268;
        }
        
        .action-btn.delete {
            background: #d84315;
        }
        
        .action-btn.delete:hover {
            background: #c23616;
        }
        
        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .stats-bar {
                flex-direction: column;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }
            
            .sidebar-header {
                font-size: 10px;
                padding: 15px 10px;
            }
            
            .nav-item a {
                padding: 15px 10px;
                justify-content: center;
            }
            
            .nav-item a span:not(.nav-icon) {
                display: none;
            }
            
            .main-content {
                margin-left: 60px;
            }
            
            .content-area {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            Panyeros kusina
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="home.php">
                    <span class="nav-icon">🏠</span>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="inventory.php">
                    <span class="nav-icon">📦</span>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="loyalty.php">
                    <span class="nav-icon">💳</span>
                    <span>Loyalty Cards</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="feedback.php">
                    <span class="nav-icon">💬</span>
                    <span>Feedbacks</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1 class="page-header-title">
                📦 Inventory Management
            </h1>
            <button class="logout-btn" onclick="alert('Logout functionality')">Logout</button>
        </div>
        
        <div class="content-area">
            <div class="stats-bar">
                <div class="stat-box">
                    <div class="stat-value" id="totalItems">0</div>
                    <div class="stat-label">Total Items</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="lowStockCount">0</div>
                    <div class="stat-label">Low Stock Items</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="totalValue">₱0</div>
                    <div class="stat-label">Total Inventory Value</div>
                </div>
            </div>
            
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        ➕ Add New Item
                    </div>
                    <div class="card-body">
                        <div id="alertContainer"></div>
                        <form id="inventoryForm">
                            <div class="form-group">
                                <label class="form-label">Item Name</label>
                                <input type="text" id="itemName" class="form-control" 
                                       placeholder="e.g., Rice" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select id="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <option value="Grains">Grains</option>
                                    <option value="Meat">Meat</option>
                                    <option value="Vegetables">Vegetables</option>
                                    <option value="Condiments">Condiments</option>
                                    <option value="Dairy">Dairy</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <input type="text" id="quantity" class="form-control" 
                                       placeholder="e.g., 50kg" min="0" required>
                            </div>
        
                            
                            <div class="form-group">
                                <label class="form-label">Unit Price (₱)</label>
                                <input type="number" id="price" class="form-control" 
                                       placeholder="e.g., 50" step="0.01" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Low Stock Threshold</label>
                                <input type="number" id="threshold" class="form-control" 
                                       placeholder="e.g., 10" min="0" required>
                            </div>
                            
                            <button type="submit" class="submit-btn">Add Item</button>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        📋 Inventory List
                    </div>
                    <div class="card-body">
                        <div class="search-box">
                            <input type="text" id="searchInput" class="search-input" 
                                   placeholder="🔍 Search items...">
                        </div>
                        <div class="table-container">
                            <table class="inventory-table">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Value</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="inventoryTableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const inventory = {
            'rice': {
                name: 'Rice',
                category: 'Grains',
                quantity: 5,
                unit: 'kg',
                price: 50,
                threshold: 10
            },
            'cooking-oil': {
                name: 'Cooking Oil',
                category: 'Condiments',
                quantity: 3,
                unit: 'L',
                price: 120,
                threshold: 5
            },
            'soy-sauce': {
                name: 'Soy Sauce',
                category: 'Condiments',
                quantity: 7,
                unit: 'bottle',
                price: 45,
                threshold: 10
            },
            'chicken': {
                name: 'Chicken',
                category: 'Meat',
                quantity: 2,
                unit: 'kg',
                price: 180,
                threshold: 5
            },
            'eggs': {
                name: 'Eggs',
                category: 'Dairy',
                quantity: 4,
                unit: 'dozen',
                price: 90,
                threshold: 8
            }
        };

        function updateStats() {
            const totalItems = Object.keys(inventory).length;
            const lowStockCount = Object.values(inventory).filter(item => item.quantity <= item.threshold).length;
            const totalValue = Object.values(inventory).reduce((sum, item) => sum + (item.quantity * item.price), 0);
            
            document.getElementById('totalItems').textContent = totalItems;
            document.getElementById('lowStockCount').textContent = lowStockCount;
            document.getElementById('totalValue').textContent = '₱' + totalValue.toLocaleString();
        }

        function getStockStatus(item) {
            if (item.quantity <= item.threshold) {
                return '<span class="stock-status stock-low">Low Stock</span>';
            } else if (item.quantity <= item.threshold * 2) {
                return '<span class="stock-status stock-medium">Medium</span>';
            } else {
                return '<span class="stock-status stock-good">Good</span>';
            }
        }

        function renderInventoryTable(filter = '') {
            const tbody = document.getElementById('inventoryTableBody');
            const filteredItems = Object.entries(inventory)
                .filter(([key, item]) => 
                    item.name.toLowerCase().includes(filter.toLowerCase()) ||
                    item.category.toLowerCase().includes(filter.toLowerCase())
                );
            
            if (filteredItems.length === 0) {
                tbody.innerHTML = '<tr><td colspan="7" style="text-align:center;padding:30px;color:#999;">No items found</td></tr>';
                return;
            }
            
            const html = filteredItems.map(([key, item]) => {
                const totalValue = item.quantity * item.price;
                return `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.category}</td>
                        <td>${item.quantity} ${item.unit}</td>
                        <td>₱${item.price.toFixed(2)}</td>
                        <td>₱${totalValue.toFixed(2)}</td>
                        <td>${getStockStatus(item)}</td>
                        <td>
                            <button class="action-btn" onclick="editItem('${key}')">Edit</button>
                            <button class="action-btn delete" onclick="deleteItem('${key}')">Delete</button>
                        </td>
                    </tr>
                `;
            }).join('');
            
            tbody.innerHTML = html;
        }

        function showAlert(message) {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = `
                <div class="alert alert-success">
                    ${message}
                </div>
            `;
            
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 3000);
        }

        function editItem(key) {
            const item = inventory[key];
            if (!item) return;
            
            document.getElementById('itemName').value = item.name;
            document.getElementById('category').value = item.category;
            document.getElementById('quantity').value = item.quantity;
            document.getElementById('unit').value = item.unit;
            document.getElementById('price').value = item.price;
            document.getElementById('threshold').value = item.threshold;
            
            delete inventory[key];
            updateStats();
            renderInventoryTable(document.getElementById('searchInput').value);
        }

        function deleteItem(key) {
            if (confirm('Are you sure you want to delete this item?')) {
                delete inventory[key];
                showAlert('✅ Item deleted successfully!');
                updateStats();
                renderInventoryTable(document.getElementById('searchInput').value);
            }
        }

        document.getElementById('inventoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('itemName').value.trim();
            const category = document.getElementById('category').value;
            const quantity = parseInt(document.getElementById('quantity').value);
            const unit = document.getElementById('unit').value.trim();
            const price = parseFloat(document.getElementById('price').value);
            const threshold = parseInt(document.getElementById('threshold').value);
            
            const key = name.toLowerCase().replace(/\s+/g, '-');
            
            inventory[key] = {
                name: name,
                category: category,
                quantity: quantity,
                unit: unit,
                price: price,
                threshold: threshold
            };
            
            showAlert('✅ Item added successfully!');
            updateStats();
            renderInventoryTable(document.getElementById('searchInput').value);
            
            this.reset();
        });

        document.getElementById('searchInput').addEventListener('input', function(e) {
            renderInventoryTable(e.target.value);
        });

        updateStats();
        renderInventoryTable();
    </script>
</body>
</html>