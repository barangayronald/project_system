<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback - Panyeros sa Kusina</title>
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
        
        .feedback-icon {
            font-size: 40px;
        }
        
        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: #D4874B;
            color: #fff;
            padding: 15px 25px;
            font-size: 18px;
            font-weight: 600;
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
            min-height: 120px;
            font-family: inherit;
        }
        
        .rating-container {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }
        
        .star-display {
            font-size: 24px;
            color: #D4874B;
        }
        
        .rating-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background: #fff;
            cursor: pointer;
        }
        
        .rating-select:focus {
            outline: none;
            border-color: #D4874B;
        }
        
        .submit-btn {
            background: #D4874B;
            color: #fff;
            border: none;
            padding: 12px 40px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            display: block;
            margin: 20px auto 0;
        }
        
        .submit-btn:hover {
            background: #B8693A;
        }
        
        .alert {
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }
        
        .alert.show {
            display: block;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        /* Feedback List */
        .feedback-list {
            max-height: 500px;
            overflow-y: auto;
        }
        
        .feedback-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .feedback-item:last-child {
            border-bottom: none;
        }
        
        .feedback-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .customer-name {
            font-weight: 600;
            color: #333;
            font-size: 16px;
        }
        
        .feedback-date {
            font-size: 12px;
            color: #999;
        }
        
        .feedback-text {
            color: #666;
            line-height: 1.6;
            margin-bottom: 10px;
        }
        
        .feedback-rating {
            color: #D4874B;
            font-size: 16px;
        }
        
        .no-feedback {
            text-align: center;
            padding: 60px 20px;
            color: #999;
            font-style: italic;
        }
        
        /* Scrollbar */
        .feedback-list::-webkit-scrollbar {
            width: 6px;
        }
        
        .feedback-list::-webkit-scrollbar-track {
            background: rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        
        .feedback-list::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.3);
            border-radius: 10px;
        }
        
        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .page-header-title {
                font-size: 24px;
            }
            
            .container {
                padding: 0 15px;
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
            Customer Feedback
            <span class="feedback-icon">💬</span>
        </h1>
    </div>
    
    <!-- Main Content -->
    <div class="container">
        <!-- Submit Feedback Card -->
        <div class="card">
            <div class="card-header">Submit New Feedback</div>
            <div class="card-body">
                <div id="successAlert" class="alert alert-success">
                    Feedback submitted successfully!
                </div>
                
                <form id="feedbackForm">
                    <div class="form-group">
                        <label class="form-label">Customer Name</label>
                        <input type="text" id="customerName" class="form-control" 
                               placeholder="Enter your name" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Comment</label>
                        <textarea id="comment" class="form-control" 
                                  placeholder="Share your experience with us..." required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Rate us</label>
                        <div class="rating-container">
                            <span class="star-display">⭐ ⭐ ⭐ ⭐ ⭐</span>
                        </div>
                        <select id="rating" class="rating-select" required>
                            <option value="">Select Rating</option>
                            <option value="5">5 Stars - Excellent</option>
                            <option value="4">4 Stars - Very Good</option>
                            <option value="3">3 Stars - Good</option>
                            <option value="2">2 Stars - Fair</option>
                            <option value="1">1 Star - Poor</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
        
        <!-- All Feedback Card -->
        <div class="card">
            <div class="card-header">All Feedback</div>
            <div class="card-body">
                <div id="feedbackList" class="feedback-list">
                    <!-- Sample feedbacks -->
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name">Anna Lee</span>
                            <span class="feedback-date">Oct 12, 2025</span>
                        </div>
                        <div class="feedback-text">Great food and excellent service! Will definitely come back.</div>
                        <div class="feedback-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name">Mark Johnson</span>
                            <span class="feedback-date">Oct 11, 2025</span>
                        </div>
                        <div class="feedback-text">The noodles are amazing! Very authentic taste.</div>
                        <div class="feedback-rating">⭐⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name">Lisa Wong</span>
                            <span class="feedback-date">Oct 10, 2025</span>
                        </div>
                        <div class="feedback-text">Good food but waiting time is a bit long.</div>
                        <div class="feedback-rating">⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name">Robert Chen</span>
                            <span class="feedback-date">Oct 09, 2025</span>
                        </div>
                        <div class="feedback-text">Best Filipino food in town! Highly recommended.</div>
                        <div class="feedback-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    
                    <div class="feedback-item">
                        <div class="feedback-header">
                            <span class="customer-name">Sarah Martinez</span>
                            <span class="feedback-date">Oct 08, 2025</span>
                        </div>
                        <div class="feedback-text">Delicious dishes and friendly staff. Will order again!</div>
                        <div class="feedback-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Handle form submission
        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const customerName = document.getElementById('customerName').value;
            const comment = document.getElementById('comment').value;
            const rating = parseInt(document.getElementById('rating').value);
            
            if (!customerName || !comment || !rating) {
                alert('Please fill in all fields');
                return;
            }
            
            // Create stars
            const stars = '⭐'.repeat(rating);
            
            // Get current date
            const currentDate = new Date().toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric', 
                year: 'numeric' 
            });
            
            // Create new feedback item
            const feedbackHTML = `
                <div class="feedback-item" style="animation: slideIn 0.3s;">
                    <div class="feedback-header">
                        <span class="customer-name">${customerName}</span>
                        <span class="feedback-date">${currentDate}</span>
                    </div>
                    <div class="feedback-text">${comment}</div>
                    <div class="feedback-rating">${stars}</div>
                </div>
            `;
            
            // Add to the top of feedback list
            const feedbackList = document.getElementById('feedbackList');
            feedbackList.insertAdjacentHTML('afterbegin', feedbackHTML);
            
            // Show success message
            const successAlert = document.getElementById('successAlert');
            successAlert.classList.add('show');
            
            // Reset form
            document.getElementById('feedbackForm').reset();
            
            // Hide success message after 3 seconds
            setTimeout(() => {
                successAlert.classList.remove('show');
            }, 3000);
        });
    </script>
    
    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>
</html>