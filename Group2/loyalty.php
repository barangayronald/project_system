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
            min-height: 100vh;
        }
        
        /* Header */
        .header {
            background: linear-gradient(90deg, #C17A3F 0%, #D4874B 100%);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .home-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            padding: 8px 15px;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .home-btn:hover {
            background: rgba(255,255,255,0.2);
        }
        
        .home-icon {
            font-size: 24px;
        }
        
        .page-header-title {
            color: #fff;
            font-size: 32px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .star-icon {
            font-size: 40px;
        }
        
        /* Stats Bar */
        .stats-bar {
            background: #fff;
            padding: 20px 30px;
            display: flex;
            gap: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .stat-box {
            flex: 1;
            text-align: center;
            padding: 15px;
            background: linear-gradient(135deg, #D4874B 0%, #C17A3F 100%);
            border-radius: 8px;
            color: #fff;
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 13px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 30px 30px;
            display: grid;
            grid-template-columns: 450px 1fr;
            gap: 30px;
        }
        
        .card {
            background: #fff;
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
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #D4874B;
        }
        
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }
        
        .help-text {
            font-size: 12px;
            color: #999;
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
        
        /* Customer List */
        .table-container {
            overflow-x: auto;
        }
        
        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .customer-table thead {
            background: #f8f9fa;
        }
        
        .customer-table th {
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #ddd;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .customer-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #eee;
            color: #666;
            font-size: 14px;
        }
        
        .customer-table tbody tr {
            transition: background 0.2s;
        }
        
        .customer-table tbody tr:hover {
            background: #f8f9fa;
        }
        
        .points-badge {
            background: linear-gradient(135deg, #D4874B 0%, #C17A3F 100%);
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
        }
        
        .search-input:focus {
            outline: none;
            border-color: #D4874B;
        }
        
        .transaction-count {
            background: #e9ecef;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 11px;
            color: #666;
            margin-left: 5px;
        }
        
        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .stats-bar {
                flex-direction: column;
                gap: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .page-header-title {
                font-size: 24px;
            }
            
            .header {
                padding: 15px;
            }
            
            .container {
                padding: 0 15px 15px;
            }
            
            .stats-bar {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="home.php" class="home-btn">
            <span class="home-icon">🏠</span>
            <span>Home</span>
        </a>
        <h1 class="page-header-title">
            Loyalty Program
            <span class="star-icon">⭐</span>
        </h1>
    </div>
    
    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat-box">
            <div class="stat-value">25</div>
            <div class="stat-label">Total Customers</div>
        </div>
        <div class="stat-box">
            <div class="stat-value">1,450</div>
            <div class="stat-label">Total Points Issued</div>
        </div>
        <div class="stat-box">
            <div class="stat-value">58.0</div>
            <div class="stat-label">Average Points</div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Add/Update Points Card -->
        <div class="card">
            <div class="card-header">
                ➕ Add / Update Customer Points
            </div>
            <div class="card-body">
                <form onsubmit="handleSubmit(event)">
                    <div class="form-group">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" 
                               placeholder="Enter customer name" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email / Phone</label>
                        <input type="text" name="contact" class="form-control" 
                               placeholder="email@example.com or 09171234567" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Points to Add / Redeem (+/-)</label>
                        <input type="number" name="points" class="form-control" 
                               placeholder="e.g., 10 or -5" required>
                        <div class="help-text">💡 Use positive numbers to add points, negative to redeem</div>
                    </div>
                    
                    <div class="form-group">