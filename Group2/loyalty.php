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
        
        .star-icon {
            font-size: 32px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
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
        
        /* Stats Bar */
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
        
        /* Main Container */
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
        
        /* Customer Table */
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
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            Panyeros kusina
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" onclick="alert('Navigate to home page'); return false;">
                    <span class="nav-icon">🏠</span>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="#" onclick="return false;">
                    <span class="nav-icon">💳</span>
                    <span>Loyalty Cards</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="alert('Navigate to feedback page'); return false;">
                    <span class="nav-icon">💬</span>
                    <span>Feedbacks</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h1 class="page-header-title">
                Loyalty Program
                <span class="star-icon">⭐</span>
            </h1>
            <button class="logout-btn" onclick="alert('Logout functionality')">Logout</button>
        </div>
        
        <!-- Content Area -->
        <div class="content-area">
            <!-- Stats Bar -->
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
            
            <!-- Main Container -->
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
        const customers = {
            'juan.dela.cruz@email.com': {
                name: 'Juan Dela Cruz',
                contact: 'juan.dela.cruz@email.com',
                points: 350,
                transactions: [
                    { date: '2025-10-01', time: '09:30 AM', points: 50, note: 'Purchase: Mixed vegetables bundle' },
                    { date: '2025-10-08', time: '02:15 PM', points: 100, note: 'Purchase: Premium meat pack' },
                    { date: '2025-10-14', time: '11:45 AM', points: 200, note: 'Birthday bonus points' }
                ]
            },
            'maria.santos@email.com': {
                name: 'Maria Santos',
                contact: 'maria.santos@email.com',
                points: 280,
                transactions: [
                    { date: '2025-09-28', time: '10:00 AM', points: 80, note: 'Weekly grocery shopping' },
                    { date: '2025-10-05', time: '03:30 PM', points: 120, note: 'Bulk purchase discount' },
                    { date: '2025-10-12', time: '01:20 PM', points: 80, note: 'Regular purchase' }
                ]
            },
            'pedro.garcia@email.com': {
                name: 'Pedro Garcia',
                contact: 'pedro.garcia@email.com',
                points: 220,
                transactions: [
                    { date: '2025-09-30', time: '08:45 AM', points: 60, note: 'Fresh produce purchase' },
                    { date: '2025-10-07', time: '04:10 PM', points: 90, note: 'Weekend shopping' },
                    { date: '2025-10-13', time: '12:30 PM', points: 70, note: 'Special order' }
                ]
            },
            'anna.lee@email.com': {
                name: 'Anna Lee',
                contact: 'anna.lee@email.com',
                points: 195,
                transactions: [
                    { date: '2025-10-02', time: '11:15 AM', points: 45, note: 'Small purchase' },
                    { date: '2025-10-09', time: '02:00 PM', points: 100, note: 'Large order' },
                    { date: '2025-10-15', time: '10:30 AM', points: 50, note: 'Regular customer bonus' }
                ]
            },
            '09171234567': {
                name: 'Mark Johnson',
                contact: '09171234567',
                points: 180,
                transactions: [
                    { date: '2025-10-03', time: '09:00 AM', points: 60, note: 'First purchase' },
                    { date: '2025-10-10', time: '03:45 PM', points: 70, note: 'Return customer' },
                    { date: '2025-10-14', time: '01:00 PM', points: 50, note: 'Referral bonus' }
                ]
            }
        };

        function updateStats() {
            const customerCount = Object.keys(customers).length;
            const totalPoints = Object.values(customers).reduce((sum, c) => sum + c.points, 0);
            const avgPoints = customerCount > 0 ? (totalPoints / customerCount).toFixed(1) : 0;
            
            document.getElementById('totalCustomers').textContent = customerCount;
            document.getElementById('totalPoints').textContent = totalPoints.toLocaleString();
            document.getElementById('avgPoints').textContent = avgPoints;
        }

        function renderTopCustomers() {
            const sortedCustomers = Object.values(customers)
                .sort((a, b) => b.points - a.points)
                .slice(0, 5);
            
            const html = sortedCustomers.map((customer, index) => `
                <div class="top-customer-item">
                    <span class="customer-name">${index + 1}. ${customer.name}</span>
                    <span class="customer-points">${customer.points} pts</span>
                </div>
            `).join('');
            
            document.getElementById('topCustomersList').innerHTML = html;
        }

        function renderCustomerTable(filter = '') {
            const tbody = document.getElementById('customerTableBody');
            const filteredCustomers = Object.values(customers)
                .filter(c => 
                    c.name.toLowerCase().includes(filter.toLowerCase()) ||
                    c.contact.toLowerCase().includes(filter.toLowerCase())
                );
            
            if (filteredCustomers.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;padding:30px;color:#999;">No customers found</td></tr>';
                return;
            }
            
            const html = filteredCustomers.map(customer => {
                const lastTransaction = customer.transactions[customer.transactions.length - 1];
                const lastPurchase = `${lastTransaction.date} ${lastTransaction.time}`;
                
                return `
                    <tr>
                        <td>${customer.name}</td>
                        <td>${customer.contact}</td>
                        <td><span class="points-badge">${customer.points} pts</span></td>
                        <td style="font-size:12px; color:#666;">${lastPurchase}</td>
                        <td><span class="transaction-count">${customer.transactions.length} transactions</span></td>
                        <td>
                            <button class="history-btn" onclick="viewHistory('${customer.contact}')">View History</button>
                        </td>
                    </tr>
                `;
            }).join('');
            
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

        function viewHistory(contact) {
            const customer = customers[contact];
            if (!customer) return;
            
            const history = customer.transactions.map(t => 
                `${t.date} ${t.time}: ${t.points > 0 ? '+' : ''}${t.points} pts - ${t.note}`
            ).join('\n');
            
            alert(`Transaction History for ${customer.name}\n\n${history}`);
        }
        
        function updateTimestamp() {
            const now = new Date();
            const date = now.toLocaleDateString('en-US', { 
                year: 'numeric', 
                month: '2-digit', 
                day: '2-digit' 
            });
            const time = now.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                hour12: true 
            });
            document.getElementById('timestamp').value = `${date} ${time}`;
        }
        
        // Update timestamp every second
        setInterval(updateTimestamp, 1000);
        updateTimestamp();

        document.getElementById('loyaltyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('customerName').value.trim();
            const contact = document.getElementById('contact').value.trim();
            const points = parseInt(document.getElementById('points').value);
            const note = document.getElementById('note').value.trim() || 'No note provided';
            
            // Get current timestamp
            const now = new Date();
            const date = now.toISOString().split('T')[0];
            const time = now.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit',
                hour12: true 
            });
            
            if (!customers[contact]) {
                customers[contact] = {
                    name: name,
                    contact: contact,
                    points: 0,
                    transactions: []
                };
            }
            
            const customer = customers[contact];
            
            if (customer.points + points < 0) {
                showAlert('⚠️ Insufficient points for redemption!', 'error');
                return;
            }
            
            customer.points += points;
            customer.transactions.push({
                date: date,
                time: time,
                points: points,
                note: note
            });
            
            const action = points > 0 ? 'added' : 'redeemed';
            showAlert(`✅ Successfully ${action} ${Math.abs(points)} points for ${name}! (${date} ${time})`, 'success');
            
            updateStats();
            renderTopCustomers();
            renderCustomerTable(document.getElementById('searchInput').value);
            
            this.reset();
            updateTimestamp();
        });

        document.getElementById('searchInput').addEventListener('input', function(e) {
            renderCustomerTable(e.target.value);
        });

        updateStats();
        renderTopCustomers();
        renderCustomerTable();
    </script>
</body>
</html>