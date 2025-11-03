<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Panyeros Kusina</title>
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
        
        .page-title {
            font-size: 32px;
            color: #D4874B;
            margin-bottom: 30px;
            font-weight: 500;
        }
        
        /* Dashboard Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: #b5b5b5;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            min-height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .stat-title {
            color: #4a4a4a;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.4;
        }
        
        .stat-icon {
            font-size: 32px;
            opacity: 0.7;
        }
        
        .stat-value {
            font-size: 48px;
            font-weight: bold;
            color: #2d2d2d;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            margin-top: 8px;
        }
        
        .alert-card {
            background: #ffc107;
            border-left: 5px solid #ff9800;
        }
        
        .alert-card .stat-value {
            color: #d84315;
        }
        
        /* Bottom Section */
        .bottom-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        
        .section-card {
            background: #b5b5b5;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .section-title {
            color: #4a4a4a;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(0,0,0,0.1);
        }
        
        .stock-list {
            max-height: 300px;
            overflow-y: auto;
        }
        
        .stock-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: rgba(255,255,255,0.3);
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        .stock-item-name {
            font-weight: 500;
            color: #2d2d2d;
        }
        
        .stock-badge {
            background: #d84315;
            color: #fff;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .customer-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .customer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: rgba(255,255,255,0.3);
            border-radius: 5px;
        }
        
        .customer-name {
            font-weight: 500;
            color: #2d2d2d;
        }
        
        .customer-points {
            background: #D4874B;
            color: #fff;
            padding: 4px 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .feedback-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 400px;
            overflow-y: auto;
        }
        
        .feedback-item {
            background: rgba(255,255,255,0.3);
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #D4874B;
        }
        
        .feedback-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .customer-name-fb {
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .feedback-date {
            font-size: 11px;
            color: #666;
        }
        
        .feedback-text {
            color: #444;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 8px;
        }
        
        .rating {
            color: #F5B461;
            font-size: 14px;
        }
        
        .quick-stat {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
            background: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        
        .quick-stat-icon {
            font-size: 24px;
        }
        
        .quick-stat-info {
            flex: 1;
        }
        
        .quick-stat-label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
        }
        
        .quick-stat-value {
            font-size: 18px;
            font-weight: 600;
            color: #2d2d2d;
        }
        
        .stock-list::-webkit-scrollbar,
        .feedback-list::-webkit-scrollbar {
            width: 6px;
        }
        
        .stock-list::-webkit-scrollbar-track,
        .feedback-list::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        
        .stock-list::-webkit-scrollbar-thumb,
        .feedback-list::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.3);
            border-radius: 10px;
        }
        
        @media (max-width: 1200px) {
            .bottom-section {
                grid-template-columns: 1fr;
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
            
            .stats-grid {
                grid-template-columns: 1fr;
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
            <li class="nav-item active">
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
            <div class="user-info">
                <span>👋 Welcome, <strong>Admin User</strong></span>
            </div>
            <button class="logout-btn" onclick="alert('Logout functionality')">Logout</button>
        </div>
        
        <div class="content-area">
            <h1 class="page-title">Dashboard</h1>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total Inventory Items</div>
                        <div class="stat-icon">📦</div>
                    </div>
                    <div class="stat-value">50</div>
                    <div class="stat-label">Active items in stock</div>
                </div>
                
                <div class="stat-card alert-card">
                    <div class="stat-header">
                        <div class="stat-title">Low Stock Alert</div>
                        <div class="stat-icon">⚠️</div>
                    </div>
                    <div class="stat-value">5</div>
                    <div class="stat-label">Items need restocking</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-title">Total Loyalty Points Issued</div>
                        <div class="stat-icon">⭐</div>
                    </div>
                    <div class="stat-value">1,450</div>
                    <div class="quick-stat">
                        <span class="quick-stat-icon">👥</span>
                        <div class="quick-stat-info">
                            <div class="quick-stat-label">Total Customers</div>
                            <div class="quick-stat-value">25</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bottom-section">
                <div class="section-card">
                    <div class="section-title">🔴 Low Stock Items</div>
                    <div class="stock-list">
                        <div class="stock-item">
                            <span class="stock-item-name">Rice (kg)</span>
                            <span class="stock-badge">5 left</span>
                        </div>
                        <div class="stock-item">
                            <span class="stock-item-name">Cooking Oil (L)</span>
                            <span class="stock-badge">3 left</span>
                        </div>
                        <div class="stock-item">
                            <span class="stock-item-name">Soy Sauce (bottle)</span>
                            <span class="stock-badge">7 left</span>
                        </div>
                        <div class="stock-item">
                            <span class="stock-item-name">Chicken (kg)</span>
                            <span class="stock-badge">2 left</span>
                        </div>
                        <div class="stock-item">
                            <span class="stock-item-name">Eggs (dozen)</span>
                            <span class="stock-badge">4 left</span>
                        </div>
                    </div>
                </div>
                
                <div class="section-card">
                    <div class="section-title">🏆 Top Loyalty Customers</div>
                    <div class="customer-list">
                        <div class="customer-item">
                            <span class="customer-name">1. Juan Dela Cruz</span>
                            <span class="customer-points">350 pts</span>
                        </div>
                        <div class="customer-item">
                            <span class="customer-name">2. Maria Santos</span>
                            <span class="customer-points">280 pts</span>
                        </div>
                        <div class="customer-item">
                            <span class="customer-name">3. Pedro Garcia</span>
                            <span class="customer-points">220 pts</span>
                        </div>
                        <div class="customer-item">
                            <span class="customer-name">4. Anna Lee</span>
                            <span class="customer-points">195 pts</span>
                        </div>
                        <div class="customer-item">
                            <span class="customer-name">5. Mark Johnson</span>
                            <span class="customer-points">180 pts</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section-card" style="margin-top: 20px;">
                <div class="section-title">💬 Recent Feedback</div>
                <div class="feedback-list">
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name-fb">Anna Lee</span>
                            <span class="feedback-date">Oct 12, 2025</span>
                        </div>
                        <div class="feedback-text">Great food and excellent service! Will definitely come back.</div>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name-fb">Mark Johnson</span>
                            <span class="feedback-date">Oct 11, 2025</span>
                        </div>
                        <div class="feedback-text">The noodles are amazing! Very authentic taste.</div>
                        <div class="rating">⭐⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name-fb">Lisa Wong</span>
                            <span class="feedback-date">Oct 10, 2025</span>
                        </div>
                        <div class="feedback-text">Good food but waiting time is a bit long.</div>
                        <div class="rating">⭐⭐⭐</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>