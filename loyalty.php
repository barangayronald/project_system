<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loyalty Program - Panyeros sa Kusina</title>
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
        
        .star-icon {
            font-size: 32px;
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
        
        .container {
            display: grid;
            grid-template-columns: 450px 1fr;
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
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }
        
        .help-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            font-style: italic;
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
            margin-top: 10px;
        }
        
        .submit-btn:hover {
            background: #B8693A;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .customer-table thead {
            background: rgba(0,0,0,0.05);
        }
        
        .customer-table th {
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
            color: #2d2d2d;
            border-bottom: 2px solid #ddd;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .customer-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #ddd;
            color: #2d2d2d;
            font-size: 14px;
        }
        
        .customer-table tbody tr {
            transition: background 0.2s;
        }
        
        .customer-table tbody tr:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .points-badge {
            background: #D4874B;
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            font-size: 13px;
        }
        
        .history-btn {
            background: #6c757d;
            color: #fff;
            border: none;
            padding: 7px 14px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .history-btn:hover {
            background: #5a6268;
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
        
        .transaction-count {
            background: rgba(0,0,0,0.1);
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 11px;
            color: #2d2d2d;
            margin-left: 5px;
        }
        
        .top-customers {
            background: #b5b5b5;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 30px;
        }
        
        .top-customers-header {
            font-size: 18px;
            font-weight: 600;
            color: #2d2d2d;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .top-customer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: rgba(255,255,255,0.3);
            border-radius: 8px;
            margin-bottom: 12px;
            transition: transform 0.2s;
        }
        
        .top-customer-item:hover {
            transform: translateX(5px);
            background: rgba(255,255,255,0.4);
        }
        
        .customer-name {
            font-weight: 500;
            color: #2d2d2d;
        }
        
        .customer-points {
            background: #D4874B;
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
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
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
            
            .page-header-title {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    
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
            <li class="nav-item">
                <a href="inventory.php">
                    <span class="nav-icon">📦</span>
                    <span>Inventory</span>
                </a>
            </li>
            <li class="nav-item active">
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
    
    <div class="main-content">
        <div class="top-bar">
            <h1 class="page-header-title">
                Loyalty Program
                <span class="star-icon">⭐</span>
            </h1>
            <button class="logout-btn" onclick="alert('Logout functionality')">Logout</button>
        </div>
        
        <div class="content-area">
            <div class="stats-bar">
                <div class="stat-box">
                    <div class="stat-value" id="totalCustomers">0</div>
                    <div class="stat-label">Total Customers</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="totalPoints">0</div>
                    <div class="stat-label">Total Points Issued</div>
                </div>
                <div class="stat-box">
                    <div class="stat-value" id="avgPoints">0</div>
                    <div class="stat-label">Average Points</div>
                </div>
            </div>
            
            <div class="container">
                <div>
                    <div class="card">
                        <div class="card-header">
                            ➕ Add / Update Customer Points
                        </div>
                        <div class="card-body">
                            <div id="alertContainer"></div>
                            <form id="loyaltyForm">
                                <div class="form-group">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" id="customerName" class="form-control" 
                                           placeholder="Enter customer name" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Email / Phone</label>
                                    <input type="text" id="contact" class="form-control" 
                                           placeholder="email@example.com or 09171234567" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Points to Add / Redeem (+/-)</label>
                                    <input type="number" id="points" class="form-control" 
                                           placeholder="e.g., 10 or -5" required>
                                    <div class="help-text">💡 Use positive numbers to add points, negative to redeem</div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Transaction Note (Optional)</label>
                                    <textarea id="note" class="form-control" 
                                              placeholder="Add a note about this transaction..."></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Purchase Timestamp</label>
                                    <input type="text" id="timestamp" class="form-control" readonly 
                                           style="background: rgba(0,0,0,0.05); cursor: not-allowed;">
                                    <div class="help-text">🕒 Auto-generated timestamp for this transaction</div>
                                </div>
                                
                                <button type="submit" class="submit-btn">Submit Transaction</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="top-customers">
                        <div class="top-customers-header">
                            🏆 Top Loyalty Customers
                        </div>
                        <div id="topCustomersList"></div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        👥 Customer List
                    </div>
                    <div class="card-body">
                        <div class="search-box">
                            <input type="text" id="searchInput" class="search-input" 
                                   placeholder="🔍 Search customers...">
                        </div>
                        <div class="table-container">
                            <table class="customer-table">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>Points</th>
                                        <th>Last Purchase</th>
                                        <th>Transactions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="customerTableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // This would connect to your PHP backend
        // For now, using the database structure to show consolidated customer info
        
        async function loadCustomers() {
            try {
                // In production, this would be: fetch('api/get_customers.php')
                // For now, simulating the database query result that groups by email
                // SQL: SELECT Name, Email, MAX(Points) as Points, MAX(Purchase_Date) as Purchase_Date, 
                //      COUNT(*) as transaction_count FROM loyalty GROUP BY Email ORDER BY Points DESC
                
                const response = {
                    customers: [
                        {
                            name: 'Juan Dela Cruz',
                            email: 'juan.dela.cruz@email.com',
                            points: 350,
                            last_purchase: '2025-10-14 11:45:00',
                            transaction_count: 3
                        },
                        {
                            name: 'Maria Santos',
                            email: 'maria.santos@email.com',
                            points: 280,
                            last_purchase: '2025-10-12 13:20:00',
                            transaction_count: 3
                        },
                        {
                            name: 'Pedro Garcia',
                            email: 'pedro.garcia@email.com',
                            points: 220,
                            last_purchase: '2025-10-13 12:30:00',
                            transaction_count: 3
                        },
                        {
                            name: 'Anna Lee',
                            email: 'anna.lee@email.com',
                            points: 195,
                            last_purchase: '2025-10-15 10:30:00',
                            transaction_count: 3
                        },
                        {
                            name: 'Mark Johnson',
                            email: '09171234567',
                            points: 180,
                            last_purchase: '2025-10-14 13:00:00',
                            transaction_count: 3
                        }
                    ]
                };
                
                return response.customers;
            } catch (error) {
                console.error('Error loading customers:', error);
                return [];
            }
        }

        async function loadCustomerHistory(email) {
            try {
                // In production: fetch(`api/get_history.php?email=${email}`)
                // SQL: SELECT * FROM loyalty WHERE Email = ? ORDER BY Purchase_Date DESC
                
                const histories = {
                    'juan.dela.cruz@email.com': [
                        { purchase_date: '2025-10-14 11:45:00', points: 350, note: 'Birthday bonus points' },
                        { purchase_date: '2025-10-08 14:15:00', points: 150, note: 'Premium meat pack' },
                        { purchase_date: '2025-10-01 09:30:00', points: 50, note: 'Mixed vegetables bundle' }
                    ],
                    'maria.santos@email.com': [
                        { purchase_date: '2025-10-12 13:20:00', points: 280, note: 'Regular purchase' },
                        { purchase_date: '2025-10-05 15:30:00', points: 200, note: 'Bulk purchase discount' },
                        { purchase_date: '2025-09-28 10:00:00', points: 80, note: 'Weekly grocery shopping' }
                    ],
                    'pedro.garcia@email.com': [
                        { purchase_date: '2025-10-13 12:30:00', points: 220, note: 'Special order' },
                        { purchase_date: '2025-10-07 16:10:00', points: 150, note: 'Weekend shopping' },
                        { purchase_date: '2025-09-30 08:45:00', points: 60, note: 'Fresh produce purchase' }
                    ],
                    'anna.lee@email.com': [
                        { purchase_date: '2025-10-15 10:30:00', points: 195, note: 'Regular customer bonus' },
                        { purchase_date: '2025-10-09 14:00:00', points: 145, note: 'Large order' },
                        { purchase_date: '2025-10-02 11:15:00', points: 45, note: 'Small purchase' }
                    ],
                    '09171234567': [
                        { purchase_date: '2025-10-14 13:00:00', points: 180, note: 'Referral bonus' },
                        { purchase_date: '2025-10-10 15:45:00', points: 130, note: 'Return customer' },
                        { purchase_date: '2025-10-03 09:00:00', points: 60, note: 'First purchase' }
                    ]
                };
                
                return histories[email] || [];
            } catch (error) {
                console.error('Error loading history:', error);
                return [];
            }
        }

        let customers = [];

        async function updateStats() {
            const customerCount = customers.length;
            const totalPoints = customers.reduce((sum, c) => sum + c.points, 0);
            const avgPoints = customerCount > 0 ? (totalPoints / customerCount).toFixed(1) : 0;
            
            document.getElementById('totalCustomers').textContent = customerCount;
            document.getElementById('totalPoints').textContent = totalPoints.toLocaleString();
            document.getElementById('avgPoints').textContent = avgPoints;
        }

        function renderTopCustomers() {
            const topCustomers = [...customers]
                .sort((a, b) => b.points - a.points)
                .slice(0, 5);
            
            const html = topCustomers.map((customer, index) => `
                <div class="top-customer-item">
                    <span class="customer-name">${index + 1}. ${customer.name}</span>
                    <span class="customer-points">${customer.points} pts</span>
                </div>
            `).join('');
            
            document.getElementById('topCustomersList').innerHTML = html || '<p style="text-align:center;color:#999;">No customers yet</p>';
        }

        function renderCustomerTable(filter = '') {
            const tbody = document.getElementById('customerTableBody');
            const filteredCustomers = customers.filter(c => 
                c.name.toLowerCase().includes(filter.toLowerCase()) ||
                c.email.toLowerCase().includes(filter.toLowerCase())
            );
            
            if (filteredCustomers.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;padding:30px;color:#999;">No customers found</td></tr>';
                return;
            }
            
            const html = filteredCustomers.map(customer => `
                <tr>
                    <td>${customer.name}</td>
                    <td>${customer.email}</td>
                    <td><span class="points-badge">${customer.points} pts</span></td>
                    <td style="font-size:12px; color:#666;">${customer.last_purchase}</td>
                    <td><span class="transaction-count">${customer.transaction_count} transactions</span></td>
                    <td>
                        <button class="history-btn" onclick="viewHistory('${customer.email}')">View History</button>
                    </td>
                </tr>
            `).join('');
            
            tbody.innerHTML = html;
        }

        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = `
                <div class="alert alert-${type}">
                    ${message}
                </div>
            `;
            
            setTimeout(() => {
                alertContainer.innerHTML = '';
            }, 5000);
        }

        async function viewHistory(email) {
            const history = await loadCustomerHistory(email);
            const customer = customers.find(c => c.email === email);
            
            if (!customer || history.length === 0) {
                alert('No transaction history found');
                return;
            }
            
            const historyText = history.map(t => 
                `${t.purchase_date}: ${t.points} pts - ${t.note || 'No note'}`
            ).join('\n');
            
            alert(`Transaction History for ${customer.name}\n\n${historyText}`);
        }
        
        function updateTimestamp() {
            const now = new Date();
            const formatted = now.toLocaleString('en-US', { 
                year: 'numeric', 
                month: '2-digit', 
                day: '2-digit',
                hour: '2-digit', 
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });
            document.getElementById('timestamp').value = formatted;
        }
        
        setInterval(updateTimestamp, 1000);
        updateTimestamp();

        document.getElementById('loyaltyForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const name = document.getElementById('customerName').value.trim();
            const email = document.getElementById('contact').value.trim();
            const points = parseInt(document.getElementById('points').value);
            const note = document.getElementById('note').value.trim() || 'No note provided';
            const timestamp = document.getElementById('timestamp').value;
            
            // In production, this would send to: fetch('api/add_transaction.php', {...})
            // SQL: INSERT INTO loyalty (Name, Email, Points, Purchase_Date) VALUES (?, ?, ?, ?)
            
            const existingCustomer = customers.find(c => c.email === email);
            
            if (existingCustomer) {
                const newPoints = existingCustomer.points + points;
                if (newPoints < 0) {
                    showAlert('⚠️ Insufficient points for redemption!', 'error');
                    return;
                }
                
                existingCustomer.points = newPoints;
                existingCustomer.last_purchase = timestamp;
                existingCustomer.transaction_count++;
            } else {
                if (points < 0) {
                    showAlert('⚠️ Cannot create new customer with negative points!', 'error');
                    return;
                }
                
                customers.push({
                    name: name,
                    email: email,
                    points: points,
                    last_purchase: timestamp,
                    transaction_count: 1
                });
            }
            
            const action = points > 0 ? 'added' : 'redeemed';
            showAlert(`✅ Successfully ${action} ${Math.abs(points)} points for ${name}!`, 'success');
            
            await updateStats();
            renderTopCustomers();
            renderCustomerTable(document.getElementById('searchInput').value);
            
            this.reset();
            updateTimestamp();
        });

        document.getElementById('searchInput').addEventListener('input', function(e) {
            renderCustomerTable(e.target.value);
        });

        // Initialize
        (async function() {
            customers = await loadCustomers();
            await updateStats();
            renderTopCustomers();
            renderCustomerTable();
        })();
    </script>
</body>
</html>