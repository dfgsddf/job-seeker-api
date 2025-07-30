<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تطبيق البحث عن الوظائف</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 2em;
            color: #667eea;
        }

        .logo h1 {
            font-size: 1.8em;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-section {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .token-input {
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }

        .token-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        /* Navigation */
        .nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.8);
            color: #666;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .nav-btn:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            transform: translateY(-2px);
        }

        .nav-btn.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Main Content */
        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        /* Dashboard Stats Styles */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 20px;
            color: white;
            font-size: 1.5rem;
        }

        .stat-content {
            flex: 1;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Interactive Buttons */
        .interactive-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 5px;
        }

        .interactive-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .interactive-btn:active {
            transform: translateY(0);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff4757 0%, #ff3742 100%);
        }

        .btn-success {
            background: linear-gradient(135deg, #2ed573 0%, #1e90ff 100%);
        }

        /* Loading Styles */
        .loading-policies {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: #666;
        }

        .loading-policies i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #667eea;
        }

        .loading-policies p {
            font-size: 1.1rem;
            margin: 0;
        }

        /* Policy Card Styles */
        .policy-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .policy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .policy-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: white;
            font-size: 1.5rem;
        }

        .policy-content h3 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .policy-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .policy-content ul {
            list-style: none;
            padding: 0;
        }

        .policy-content ul li {
            color: #555;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-right: 25px;
        }

        .policy-content ul li:before {
            content: '✓';
            color: #2ed573;
            font-weight: bold;
            position: absolute;
            right: 0;
            top: 8px;
        }

        .policy-content ul li:last-child {
            border-bottom: none;
        }

        /* Policy Text Styles */
        .policy-text {
            color: #666;
            line-height: 1.6;
        }

        .policy-text p {
            margin-bottom: 15px;
        }

        .policy-text .bullet {
            color: #667eea;
            font-weight: bold;
            margin-left: 5px;
        }

        /* Error State Styles */
        .error-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            text-align: center;
            color: #666;
        }

        .error-state i {
            font-size: 3rem;
            color: #ff4757;
            margin-bottom: 20px;
        }

        .error-state h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .error-state p {
            margin-bottom: 20px;
        }

        /* Empty State Styles */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            text-align: center;
            color: #666;
        }

        .empty-state i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #333;
            margin-bottom: 10px;
        }

        /* Loading Companies Styles */
        .loading-companies {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: #666;
        }

        .loading-companies i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #667eea;
        }

        .loading-companies p {
            font-size: 1.1rem;
            margin: 0;
        }

        /* Company Card Styles */
        .company-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            display: flex;
            align-items: center;
        }

        .company-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .company-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 20px;
            color: white;
            font-size: 2rem;
        }

        .company-info {
            flex: 1;
        }

        .company-info h3 {
            color: #333;
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .company-industry {
            color: #667eea;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .company-stats {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .company-stats span {
            color: #666;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .company-stats i {
            color: #667eea;
        }

        .company-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-right: 20px;
        }

        .company-actions .btn {
            min-width: 120px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close {
            color: white;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close:hover {
            transform: scale(1.2);
        }

        .modal-body {
            padding: 25px;
        }

        .loading-modal {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            color: #666;
        }

        .loading-modal i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #667eea;
        }

        .company-details {
            display: grid;
            gap: 20px;
        }

        .company-detail-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            border-right: 4px solid #667eea;
        }

        .company-detail-section h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .company-detail-section h3 i {
            color: #667eea;
        }

        .company-detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .detail-item i {
            color: #667eea;
            font-size: 1.1rem;
            width: 20px;
        }

        .detail-item span {
            color: #666;
            font-weight: 500;
        }

        .detail-item strong {
            color: #333;
            font-weight: 600;
        }

        .company-description {
            line-height: 1.6;
            color: #666;
            text-align: justify;
        }

        .company-jobs {
            margin-top: 20px;
        }

        .job-item {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-right: 3px solid #667eea;
        }

        .job-item h4 {
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .job-item p {
            color: #666;
            margin: 5px 0;
            font-size: 0.9rem;
        }

        .no-jobs {
            text-align: center;
            color: #666;
            padding: 20px;
            font-style: italic;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .modal-actions .btn {
            min-width: 120px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .section-header h2 {
            font-size: 2em;
            color: #333;
            font-weight: 700;
        }

        /* Buttons */
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        /* Filter Form */
        .filter-form {
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Results */
        .results {
            margin-top: 30px;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 1.1em;
        }

        .loading i {
            font-size: 2em;
            color: #667eea;
            margin-bottom: 15px;
        }

        .jobs-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
        }

        .job-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .job-title {
            font-size: 1.3em;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .job-company {
            color: #667eea;
            font-weight: 600;
        }

        .job-favorite {
            background: none;
            border: none;
            font-size: 1.2em;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .job-favorite:hover,
        .job-favorite.active {
            color: #ff4757;
        }

        .job-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .job-detail {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
            font-size: 14px;
        }

        .job-detail i {
            color: #667eea;
            width: 16px;
        }

        .job-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .job-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-sm {
            padding: 8px 15px;
            font-size: 12px;
        }

        .btn-danger {
            background: #ff4757;
            color: white;
        }

        .btn-danger:hover {
            background: #ff3742;
            transform: translateY(-2px);
        }

        .btn-success {
            background: #2ed573;
            color: white;
        }

        .btn-success:hover {
            background: #26d0ce;
            transform: translateY(-2px);
        }

        /* Favorites Section */
        .favorites-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-icon {
            font-size: 2em;
            color: #667eea;
        }

        .stat-info {
            flex: 1;
        }

        .stat-number {
            font-size: 1.8em;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .favorites-filters {
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 200px;
        }

        .filter-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .favorite-card {
            border: 2px solid #ff4757;
            position: relative;
        }

        .favorite-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #ff4757, #ff3742);
            border-radius: 15px 15px 0 0;
        }

        .job-actions-header {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-end;
        }

        .job-status {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 600;
        }

        .job-status.applied {
            background: rgba(46, 213, 115, 0.1);
            color: #2ed573;
        }

        .job-status.not-applied {
            background: rgba(255, 71, 87, 0.1);
            color: #ff4757;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-icon {
            font-size: 4em;
            color: #ccc;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #333;
        }

        .empty-state p {
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Companies Section */
        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .company-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .company-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .company-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
            border-color: #667eea;
        }

        .company-card:hover::before {
            opacity: 1;
        }

        .company-logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .company-card:hover .company-logo {
            transform: scale(1.1);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        .company-info {
            text-align: center;
            margin-bottom: 25px;
        }

        .company-info h3 {
            font-size: 1.4em;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .company-industry {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 0.95em;
            background: rgba(102, 126, 234, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .company-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 25px;
        }

        .company-stats span {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #4a5568;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            background: rgba(248, 249, 250, 0.8);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .company-stats span:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(3px);
        }

        .company-stats i {
            color: #667eea;
            width: 18px;
            font-size: 16px;
        }

        .company-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .company-actions .btn {
            flex: 1;
            min-width: 120px;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .company-actions .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .company-actions .btn:hover::before {
            left: 100%;
        }

        .company-actions .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }

        .company-actions .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .company-actions .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .company-actions .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        /* Responsive Design for Company Cards */
        @media (max-width: 768px) {
            .companies-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .company-card {
                padding: 25px;
            }

            .company-logo {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }

            .company-info h3 {
                font-size: 1.2em;
            }

            .company-actions {
                flex-direction: column;
            }

            .company-actions .btn {
                width: 100%;
            }
        }

        /* Animation for Company Cards */
        .company-card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation for multiple cards */
        .company-card:nth-child(1) { animation-delay: 0.1s; }
        .company-card:nth-child(2) { animation-delay: 0.2s; }
        .company-card:nth-child(3) { animation-delay: 0.3s; }
        .company-card:nth-child(4) { animation-delay: 0.4s; }
        .company-card:nth-child(5) { animation-delay: 0.5s; }
        .company-card:nth-child(6) { animation-delay: 0.6s; }

        /* FAQs Section */
        .faqs-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .faq-item {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .faq-question {
            padding: 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(248, 249, 250, 0.8);
            transition: background 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(102, 126, 234, 0.1);
        }

        .faq-question h3 {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .faq-question i {
            color: #667eea;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 20px;
            max-height: 200px;
        }

        .faq-answer p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        /* Policies Section */
        .policies-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .policy-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border: 1px solid #e0e0e0;
        }

        .policy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .policy-icon {
            font-size: 2.5em;
            color: #667eea;
            margin-bottom: 20px;
            text-align: center;
        }

        .policy-content h3 {
            font-size: 1.3em;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .policy-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .policy-content ul {
            list-style: none;
            padding: 0;
        }

        .policy-content li {
            color: #666;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
            position: relative;
            padding-right: 20px;
        }

        .policy-content li:before {
            content: '✓';
            position: absolute;
            right: 0;
            color: #2ed573;
            font-weight: bold;
        }

        .policy-content li:last-child {
            border-bottom: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .header {
                flex-direction: column;
                text-align: center;
            }
            
            .nav {
                justify-content: center;
            }
            
            .nav-btn {
                font-size: 12px;
                padding: 10px 15px;
            }
            
            .section-header {
                flex-direction: column;
                text-align: center;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .jobs-list {
                grid-template-columns: 1fr;
            }
            
            .favorites-stats {
                grid-template-columns: 1fr;
            }
            
            .favorites-filters {
                flex-direction: column;
            }
            
            .companies-grid {
                grid-template-columns: 1fr;
            }
            
            .policies-container {
                grid-template-columns: 1fr;
            }
            
            .stat-card {
                flex-direction: column;
                text-align: center;
            }
            
            .company-actions,
            .job-actions {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .logo h1 {
                font-size: 1.5em;
            }
            
            .section-header h2 {
                font-size: 1.5em;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 12px;
            }
            
            .job-card,
            .company-card,
            .policy-card {
                padding: 20px;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header fade-in">
            <div class="logo">
                <i class="fas fa-briefcase"></i>
                <h1>البحث عن الوظائف</h1>
            </div>
            <div class="auth-section">
                <a href="/register" class="btn btn-secondary" style="margin-right: 10px;">
                    <i class="fas fa-user-plus"></i>
                    حساب جديد
                </a>
                <a href="/login" class="btn btn-primary" style="margin-right: 10px;">
                    <i class="fas fa-sign-in-alt"></i>
                    تسجيل الدخول
                </a>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="nav fade-in">
            <button class="nav-btn active" onclick="showSection('dashboard')">
                <i class="fas fa-chart-bar"></i>
                لوحة التحكم
            </button>
            <button class="nav-btn" onclick="showSection('jobs')">
                <i class="fas fa-search"></i>
                البحث عن الوظائف
            </button>
            <button class="nav-btn" onclick="showSection('favorites')">
                <i class="fas fa-heart"></i>
                الوظائف المفضلة
            </button>
            <button class="nav-btn" onclick="showSection('companies')">
                <i class="fas fa-building"></i>
                الشركات
            </button>
            <button class="nav-btn" onclick="showSection('faqs')">
                <i class="fas fa-question-circle"></i>
                الأسئلة الشائعة
            </button>
            <button class="nav-btn" onclick="showSection('policies')">
                <i class="fas fa-file-contract"></i>
                الشروط والسياسات
            </button>
            <a href="/my-applications" class="nav-btn" style="text-decoration: none; color: inherit;">
                <i class="fas fa-clipboard-list"></i>
                طلباتي
            </a>
        </nav>

        <!-- Main Content -->
        <main class="main-content fade-in">
            <!-- Dashboard Stats Section -->
            <section id="dashboard" class="section active">
                <div class="section-header">
                    <h2>📊 لوحة التحكم</h2>
                </div>
                
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="applicationsCount">0</div>
                            <div class="stat-label">تطبيقات مرسلة</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="weeklyViews">0</div>
                            <div class="stat-label">مشاهدات هذا الأسبوع</div>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="savedJobs">0</div>
                            <div class="stat-label">وظيفة محفوظة</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Jobs Section -->
            <section id="jobs" class="section">
                <div class="section-header">
                    <h2>🔍 البحث عن الوظائف</h2>
                    <button onclick="showFilterModal()" class="btn btn-secondary">
                        <i class="fas fa-filter"></i>
                        فلترة متقدمة
                    </button>
                </div>

                <!-- Filter Form -->
                <div class="filter-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-calendar"></i> من تاريخ:</label>
                            <input type="date" id="fromDate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-calendar"></i> إلى تاريخ:</label>
                            <input type="date" id="toDate" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-graduation-cap"></i> بلد التخرج:</label>
                            <select id="countryGraduation" class="form-control">
                                <option value="">اختر البلد</option>
                                <option value="1">مصر</option>
                                <option value="2">السعودية</option>
                                <option value="3">الإمارات</option>
                                <option value="4">الكويت</option>
                                <option value="5">قطر</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-home"></i> بلد الإقامة:</label>
                            <select id="countryResidence" class="form-control">
                                <option value="">اختر البلد</option>
                                <option value="1">مصر</option>
                                <option value="2">السعودية</option>
                                <option value="3">الإمارات</option>
                                <option value="4">الكويت</option>
                                <option value="5">قطر</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-briefcase"></i> مجال العمل:</label>
                            <select id="workField" class="form-control">
                                <option value="">اختر المجال</option>
                                <option value="1">تكنولوجيا المعلومات</option>
                                <option value="2">المالية والمحاسبة</option>
                                <option value="3">التسويق</option>
                                <option value="4">الموارد البشرية</option>
                                <option value="5">الهندسة</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-certificate"></i> المؤهل العلمي:</label>
                            <select id="qualification" class="form-control">
                                <option value="">اختر المؤهل</option>
                                <option value="1">بكالوريوس</option>
                                <option value="2">ماجستير</option>
                                <option value="3">دكتوراه</option>
                                <option value="4">دبلوم</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-clock"></i> سنوات الخبرة:</label>
                            <select id="experienceYears" class="form-control">
                                <option value="">اختر الخبرة</option>
                                <option value="0">بدون خبرة</option>
                                <option value="1">1-3 سنوات</option>
                                <option value="2">3-5 سنوات</option>
                                <option value="3">5-10 سنوات</option>
                                <option value="4">أكثر من 10 سنوات</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-money-bill-wave"></i> الراتب المطلوب:</label>
                            <select id="salary" class="form-control">
                                <option value="">اختر الراتب</option>
                                <option value="1">أقل من 5000</option>
                                <option value="2">5000-10000</option>
                                <option value="3">10000-15000</option>
                                <option value="4">15000-20000</option>
                                <option value="5">أكثر من 20000</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-calendar-alt"></i> نوع الوظيفة:</label>
                            <select id="jobType" class="form-control">
                                <option value="">اختر النوع</option>
                                <option value="1">دوام كامل</option>
                                <option value="2">دوام جزئي</option>
                                <option value="3">عن بُعد</option>
                                <option value="4">عقد مؤقت</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-map-marker-alt"></i> المدينة:</label>
                            <select id="city" class="form-control">
                                <option value="">اختر المدينة</option>
                                <option value="1">الرياض</option>
                                <option value="2">جدة</option>
                                <option value="3">الدمام</option>
                                <option value="4">مكة</option>
                                <option value="5">المدينة</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-language"></i> اللغة:</label>
                            <select id="language" class="form-control">
                                <option value="">اختر اللغة</option>
                                <option value="1">العربية</option>
                                <option value="2">الإنجليزية</option>
                                <option value="3">الفرنسية</option>
                                <option value="4">الألمانية</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> الجنس:</label>
                            <select id="gender" class="form-control">
                                <option value="">اختر الجنس</option>
                                <option value="1">ذكر</option>
                                <option value="2">أنثى</option>
                                <option value="3">كلا الجنسين</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label><i class="fas fa-tag"></i> نوع الإعلان:</label>
                            <select id="adType" class="form-control">
                                <option value="">اختر النوع</option>
                                <option value="1">وظيفة</option>
                                <option value="2">تدريب</option>
                                <option value="3">عمل تطوعي</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fas fa-sort"></i> الترتيب:</label>
                            <select id="sortBy" class="form-control">
                                <option value="">اختر الترتيب</option>
                                <option value="1">الأحدث</option>
                                <option value="2">الأقدم</option>
                                <option value="3">الأعلى راتباً</option>
                                <option value="4">الأقل راتباً</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button onclick="searchJobs()" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            البحث
                        </button>
                        <button onclick="clearFilters()" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            مسح الفلاتر
                        </button>
                    </div>
                </div>

                <!-- Results -->
                <div id="results" class="results">
                    <div class="loading" id="loading" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                        <p>جاري البحث...</p>
                    </div>
                    <div id="jobsList" class="jobs-list">
                        <!-- Sample Job Cards -->
                        <div class="job-card fade-in" data-job-id="1">
                            <div class="job-header">
                                <div>
                                    <div class="job-title">مطور ويب Frontend</div>
                                    <div class="job-company">شركة التقنية المتقدمة</div>
                                </div>
                                <button class="job-favorite" onclick="markAsFavorite(1)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="job-details">
                                <div class="job-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>الرياض</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>8000-12000 ريال</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-clock"></i>
                                    <span>دوام كامل</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>منذ يومين</span>
                                </div>
                            </div>
                            <div class="job-description">
                                نبحث عن مطور ويب موهوب للانضمام إلى فريقنا. المطلوب خبرة في React و JavaScript.
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary btn-sm" onclick="applyForJob(1)">
                                    <i class="fas fa-paper-plane"></i>
                                    التقديم للوظيفة
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="viewJobDetails(1)">
                                    <i class="fas fa-eye"></i>
                                    عرض التفاصيل
                                </button>
                                <button class="interactive-btn btn-success btn-sm" onclick="addToFavorites(1)">
                                    <i class="fas fa-heart"></i>
                                    إضافة للمفضلة
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="shareJob(1)">
                                    <i class="fas fa-share"></i>
                                    مشاركة
                                </button>
                            </div>
                        </div>

                        <div class="job-card fade-in" data-job-id="2">
                            <div class="job-header">
                                <div>
                                    <div class="job-title">محلل بيانات</div>
                                    <div class="job-company">بنك الأمانة</div>
                                </div>
                                <button class="job-favorite" onclick="markAsFavorite(2)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="job-details">
                                <div class="job-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>جدة</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>10000-15000 ريال</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-clock"></i>
                                    <span>دوام كامل</span>
                                </div>
                                <div class="job-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span>منذ 3 أيام</span>
                                </div>
                            </div>
                            <div class="job-description">
                                مطلوب محلل بيانات للعمل في قسم التحليل المالي. خبرة في Python و SQL مطلوبة.
                            </div>
                            <div class="job-actions">
                                <button class="btn btn-primary btn-sm" onclick="applyForJob(2)">
                                    <i class="fas fa-paper-plane"></i>
                                    التقديم للوظيفة
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="viewJobDetails(2)">
                                    <i class="fas fa-eye"></i>
                                    عرض التفاصيل
                                </button>
                                <button class="interactive-btn btn-success btn-sm" onclick="addToFavorites(2)">
                                    <i class="fas fa-heart"></i>
                                    إضافة للمفضلة
                                </button>
                                <button class="btn btn-secondary btn-sm" onclick="shareJob(2)">
                                    <i class="fas fa-share"></i>
                                    مشاركة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Favorites Section -->
            <section id="favorites" class="section">
                <div class="section-header">
                    <h2>❤️ الوظائف المفضلة</h2>
                    <div>
                        <button onclick="clearAllFavorites()" class="btn btn-secondary">
                            <i class="fas fa-trash"></i>
                            مسح الكل
                        </button>
                        <button onclick="exportFavorites()" class="btn btn-primary">
                            <i class="fas fa-download"></i>
                            تصدير المفضلة
                        </button>
                    </div>
                </div>

                <div class="favorites-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number" id="favoritesCount">3</div>
                            <div class="stat-label">وظيفة محفوظة</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">12</div>
                            <div class="stat-label">مشاهدات هذا الأسبوع</div>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <div class="stat-number">5</div>
                            <div class="stat-label">تطبيقات مرسلة</div>
                        </div>
                    </div>
                </div>

                <div class="favorites-filters">
                    <div class="filter-group">
                        <label>ترتيب حسب:</label>
                        <select id="favoritesSort" class="form-control" onchange="sortFavorites()">
                            <option value="date">تاريخ الإضافة</option>
                            <option value="salary">الراتب</option>
                            <option value="company">الشركة</option>
                            <option value="location">الموقع</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>فلترة حسب:</label>
                        <select id="favoritesFilter" class="form-control" onchange="filterFavorites()">
                            <option value="all">جميع الوظائف</option>
                            <option value="applied">المتقدم لها</option>
                            <option value="not-applied">لم أتقدم لها</option>
                        </select>
                    </div>
                </div>

                <div id="favoritesList" class="jobs-list">
                    <!-- Favorite Job Cards -->
                    <div class="job-card favorite-card fade-in" data-job-id="1">
                        <div class="job-header">
                            <div>
                                <div class="job-title">مطور ويب Frontend</div>
                                <div class="job-company">شركة التقنية المتقدمة</div>
                            </div>
                            <div class="job-actions-header">
                                <button class="job-favorite active" onclick="markAsFavorite(1)">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <div class="job-status applied">
                                    <i class="fas fa-check-circle"></i>
                                    متقدم
                                </div>
                            </div>
                        </div>
                        <div class="job-details">
                            <div class="job-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>الرياض</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>8000-12000 ريال</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-clock"></i>
                                <span>دوام كامل</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-calendar"></i>
                                <span>أضيفت منذ 3 أيام</span>
                            </div>
                        </div>
                        <div class="job-description">
                            نبحث عن مطور ويب موهوب للانضمام إلى فريقنا. المطلوب خبرة في React و JavaScript.
                        </div>
                        <div class="job-actions">
                            <button class="btn btn-primary btn-sm" onclick="viewJobDetails(1)">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </button>
                            <button class="btn btn-secondary btn-sm" onclick="shareJob(1)">
                                <i class="fas fa-share"></i>
                                مشاركة
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="removeFromFavorites(1)">
                                <i class="fas fa-trash"></i>
                                إزالة
                            </button>
                        </div>
                    </div>

                    <div class="job-card favorite-card fade-in" data-job-id="2">
                        <div class="job-header">
                            <div>
                                <div class="job-title">محلل بيانات</div>
                                <div class="job-company">بنك الأمانة</div>
                            </div>
                            <div class="job-actions-header">
                                <button class="job-favorite active" onclick="markAsFavorite(2)">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <div class="job-status not-applied">
                                    <i class="fas fa-clock"></i>
                                    لم أتقدم
                                </div>
                            </div>
                        </div>
                        <div class="job-details">
                            <div class="job-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>جدة</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>10000-15000 ريال</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-clock"></i>
                                <span>دوام كامل</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-calendar"></i>
                                <span>أضيفت منذ أسبوع</span>
                            </div>
                        </div>
                        <div class="job-description">
                            مطلوب محلل بيانات للعمل في قسم التحليل المالي. خبرة في Python و SQL مطلوبة.
                        </div>
                        <div class="job-actions">
                            <button class="btn btn-primary btn-sm" onclick="viewJobDetails(2)">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </button>
                            <button class="btn btn-success btn-sm" onclick="applyForJob(2)">
                                <i class="fas fa-paper-plane"></i>
                                التقديم
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="removeFromFavorites(2)">
                                <i class="fas fa-trash"></i>
                                إزالة
                            </button>
                        </div>
                    </div>

                    <div class="job-card favorite-card fade-in" data-job-id="3">
                        <div class="job-header">
                            <div>
                                <div class="job-title">مدير تسويق رقمي</div>
                                <div class="job-company">شركة الإبداع للتسويق</div>
                            </div>
                            <div class="job-actions-header">
                                <button class="job-favorite active" onclick="markAsFavorite(3)">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <div class="job-status applied">
                                    <i class="fas fa-check-circle"></i>
                                    متقدم
                                </div>
                            </div>
                        </div>
                        <div class="job-details">
                            <div class="job-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>الدمام</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-money-bill-wave"></i>
                                <span>12000-18000 ريال</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-clock"></i>
                                <span>دوام كامل</span>
                            </div>
                            <div class="job-detail">
                                <i class="fas fa-calendar"></i>
                                <span>أضيفت منذ 5 أيام</span>
                            </div>
                        </div>
                        <div class="job-description">
                            مطلوب مدير تسويق رقمي ذو خبرة في إدارة الحملات الإعلانية ووسائل التواصل الاجتماعي.
                        </div>
                        <div class="job-actions">
                            <button class="btn btn-primary btn-sm" onclick="viewJobDetails(3)">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </button>
                            <button class="btn btn-secondary btn-sm" onclick="shareJob(3)">
                                <i class="fas fa-share"></i>
                                مشاركة
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="removeFromFavorites(3)">
                                <i class="fas fa-trash"></i>
                                إزالة
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div id="emptyFavorites" class="empty-state" style="display: none;">
                    <div class="empty-icon">
                        <i class="fas fa-heart-broken"></i>
                    </div>
                    <h3>لا توجد وظائف مفضلة</h3>
                    <p>لم تقم بإضافة أي وظائف إلى المفضلة بعد. ابدأ بالبحث عن الوظائف وأضف ما يعجبك!</p>
                    <button onclick="showSection('jobs')" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                        البحث عن الوظائف
                    </button>
                </div>
            </section>

            <!-- Companies Section -->
            <section id="companies" class="section">
                <div class="section-header">
                    <h2>🏢 الشركات</h2>
                    <button onclick="showCompanyModal()" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        إضافة شركة
                    </button>
                </div>

                <div class="companies-grid" id="companiesContainer">
                    <div class="loading-companies">
                        <i class="fas fa-spinner fa-spin"></i>
                        <p>جاري تحميل الشركات...</p>
                    </div>
                </div>

                <!-- Modal for Company Details -->
                <div id="companyModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 id="modalCompanyName">تفاصيل الشركة</h2>
                            <span class="close" onclick="closeCompanyModal()">&times;</span>
                        </div>
                        <div class="modal-body" id="modalCompanyContent">
                            <div class="loading-modal">
                                <i class="fas fa-spinner fa-spin"></i>
                                <p>جاري تحميل تفاصيل الشركة...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQs Section -->
            <section id="faqs" class="section">
                <div class="section-header">
                    <h2>❓ الأسئلة الشائعة</h2>
                    <button onclick="contactSupport()" class="btn btn-primary">
                        <i class="fas fa-headset"></i>
                        تواصل مع الدعم
                    </button>
                </div>

                <div class="faqs-container">
                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>كيف يمكنني البحث عن الوظائف؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>يمكنك البحث عن الوظائف باستخدام الفلاتر المتقدمة مثل الموقع، الراتب، سنوات الخبرة، والمؤهل العلمي. استخدم نموذج البحث في الصفحة الرئيسية للحصول على نتائج دقيقة.</p>
                        </div>
                    </div>

                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>كيف أضيف وظيفة إلى المفضلة؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>انقر على أيقونة القلب بجانب الوظيفة لإضافتها إلى المفضلة. يمكنك الوصول إلى جميع الوظائف المفضلة من خلال تبويب "الوظائف المفضلة".</p>
                        </div>
                    </div>

                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>كيف أتقدم لوظيفة؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>انقر على "عرض التفاصيل" ثم "التقديم" لفتح نموذج التقديم. تأكد من إرفاق السيرة الذاتية والوثائق المطلوبة قبل الإرسال.</p>
                        </div>
                    </div>

                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>هل يمكنني متابعة حالة طلبي؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>نعم، يمكنك متابعة حالة طلبك من خلال صفحة "طلباتي" في حسابك الشخصي. ستتلقى أيضاً إشعارات عبر البريد الإلكتروني عند تحديث الحالة.</p>
                        </div>
                    </div>

                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>كيف أتأكد من صحة بيانات الشركة؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>جميع الشركات في منصتنا مُتحقق منها ومُعتمدة. يمكنك الاطلاع على تقييمات الشركة ومراجعات الموظفين السابقين قبل التقديم.</p>
                        </div>
                    </div>

                    <div class="faq-item fade-in">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <h3>هل الخدمة مجانية؟</h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>نعم، الخدمة الأساسية مجانية تماماً. يمكنك البحث والتقديم للوظائف بدون أي رسوم. هناك خدمات إضافية مدفوعة مثل التقييمات المتقدمة والاستشارات المهنية.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Policies Section -->
            <section id="policies" class="section">
                <div class="section-header">
                    <h2>📄 الشروط والسياسات</h2>
                    <button onclick="downloadPolicies()" class="btn btn-secondary">
                        <i class="fas fa-download"></i>
                        تحميل السياسات
                    </button>
                </div>

                <div class="policies-container" id="policiesContainer">
                    <div class="loading-policies">
                        <i class="fas fa-spinner fa-spin"></i>
                        <p>جاري تحميل السياسات...</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Navigation functionality
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all nav buttons
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }

        // Set auth token
        async function setAuthToken() {
            const token = document.getElementById('authToken').value;
            if (!token) {
                alert('يرجى إدخال رمز المصادقة');
                return;
            }

            try {
                // حفظ التوكن في localStorage
                localStorage.setItem('authToken', token);
                
                // اختبار صحة التوكن
                const response = await fetch('/api/users', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    alert('تم تسجيل الدخول بنجاح!');
                    // تحديث واجهة المستخدم
                    updateAuthUI(true);
                } else {
                    alert('رمز المصادقة غير صحيح');
                    localStorage.removeItem('authToken');
                }
            } catch (error) {
                alert('حدث خطأ في الاتصال');
                console.error('Auth error:', error);
            }
        }

        // تحديث واجهة المصادقة
        function updateAuthUI(isLoggedIn) {
            const authSection = document.querySelector('.auth-section');
            if (isLoggedIn) {
                authSection.innerHTML = `
                    <span style="color: #667eea; font-weight: 600;">
                        <i class="fas fa-user-check"></i> تم تسجيل الدخول
                    </span>
                    <button onclick="logout()" class="btn btn-danger" style="margin-right: 10px;">
                        <i class="fas fa-sign-out-alt"></i>
                        تسجيل الخروج
                    </button>
                `;
            } else {
                authSection.innerHTML = `
                    <a href="/register" class="btn btn-secondary" style="margin-right: 10px;">
                        <i class="fas fa-user-plus"></i>
                        حساب جديد
                    </a>
                    <a href="/login" class="btn btn-outline" style="margin-right: 10px;">
                        <i class="fas fa-sign-in-alt"></i>
                        تسجيل الدخول
                    </a>
                `;
            }
        }

        // تسجيل الخروج
        function logout() {
            localStorage.removeItem('authToken');
            updateAuthUI(false);
            alert('تم تسجيل الخروج بنجاح');
        }

        // التحقق من حالة المصادقة عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            const token = localStorage.getItem('authToken');
            if (token) {
                updateAuthUI(true);
            }
            
            // تحميل الإحصائيات
            loadDashboardStats();
            
            // تحميل السياسات
            loadPolicies();
            
            // تحميل الشركات
            loadCompanies();
        });

        // تحميل إحصائيات لوحة التحكم
        async function loadDashboardStats() {
            try {
                const response = await fetch('/api/dashboard/stats');
                const data = await response.json();
                
                if (data.success) {
                    document.getElementById('applicationsCount').textContent = data.stats.sent_applications;
                    document.getElementById('weeklyViews').textContent = data.stats.weekly_views;
                    document.getElementById('savedJobs').textContent = data.stats.saved_jobs;
                }
            } catch (error) {
                console.error('Error loading dashboard stats:', error);
            }
        }

        // إضافة وظيفة للمفضلة
        async function addToFavorites(jobId) {
            try {
                const token = localStorage.getItem('authToken');
                if (!token) {
                    alert('يرجى تسجيل الدخول أولاً');
                    return;
                }

                const userId = 1; // يمكن الحصول عليه من التوكن أو الجلسة
                
                const response = await fetch('/api/favorites/add', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        job_id: jobId,
                        user_id: userId
                    })
                });

                const result = await response.json();
                
                if (result.success) {
                    alert('تم إضافة الوظيفة إلى المفضلة بنجاح');
                    loadDashboardStats(); // تحديث الإحصائيات
                } else {
                    alert(result.message || 'حدث خطأ في إضافة الوظيفة للمفضلة');
                }
            } catch (error) {
                console.error('Error adding to favorites:', error);
                alert('حدث خطأ في الاتصال بالخادم');
            }
        }

        // إزالة وظيفة من المفضلة
        async function removeFromFavorites(jobId) {
            try {
                const token = localStorage.getItem('authToken');
                if (!token) {
                    alert('يرجى تسجيل الدخول أولاً');
                    return;
                }

                const userId = 1; // يمكن الحصول عليه من التوكن أو الجلسة
                
                const response = await fetch('/api/favorites/remove', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        job_id: jobId,
                        user_id: userId
                    })
                });

                const result = await response.json();
                
                if (result.success) {
                    alert('تم إزالة الوظيفة من المفضلة بنجاح');
                    loadDashboardStats(); // تحديث الإحصائيات
                } else {
                    alert(result.message || 'حدث خطأ في إزالة الوظيفة من المفضلة');
                }
            } catch (error) {
                console.error('Error removing from favorites:', error);
                alert('حدث خطأ في الاتصال بالخادم');
            }
        }

        // تحميل السياسات
        async function loadPolicies() {
            try {
                const response = await fetch('/api/policies');
                const data = await response.json();
                
                if (data.success) {
                    displayPolicies(data.policies);
                } else {
                    showPolicyError('حدث خطأ في تحميل السياسات');
                }
            } catch (error) {
                console.error('Error loading policies:', error);
                showPolicyError('حدث خطأ في الاتصال بالخادم');
            }
        }

        // عرض السياسات
        function displayPolicies(policies) {
            const container = document.getElementById('policiesContainer');
            
            if (!policies || policies.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-file-contract"></i>
                        <h3>لا توجد سياسات متاحة</h3>
                        <p>لم يتم العثور على سياسات متاحة حالياً.</p>
                    </div>
                `;
                return;
            }
            
            const policiesHTML = policies.map(policy => `
                <div class="policy-card fade-in">
                    <div class="policy-icon">
                        <i class="${policy.icon || 'fas fa-file-contract'}"></i>
                    </div>
                    <div class="policy-content">
                        <h3>${policy.title}</h3>
                        <div class="policy-text">${formatPolicyContent(policy.content)}</div>
                    </div>
                </div>
            `).join('');
            
            container.innerHTML = policiesHTML;
        }

        // تنسيق محتوى السياسة
        function formatPolicyContent(content) {
            // تحويل النص إلى HTML مع تنسيق مناسب
            return content
                .replace(/\n\n/g, '</p><p>')
                .replace(/\n/g, '<br>')
                .replace(/•/g, '<span class="bullet">•</span>')
                .replace(/^/, '<p>')
                .replace(/$/, '</p>');
        }

        // تحميل الشركات
        async function loadCompanies() {
            try {
                const response = await fetch('/api/companies');
                const data = await response.json();
                
                if (data.companies) {
                    displayCompanies(data.companies);
                } else {
                    showCompanyError('حدث خطأ في تحميل الشركات');
                }
            } catch (error) {
                console.error('Error loading companies:', error);
                showCompanyError('حدث خطأ في الاتصال بالخادم');
            }
        }

        // عرض الشركات
        function displayCompanies(companies) {
            const container = document.getElementById('companiesContainer');
            
            if (!companies || companies.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-building"></i>
                        <h3>لا توجد شركات متاحة</h3>
                        <p>لم يتم العثور على شركات متاحة حالياً.</p>
                    </div>
                `;
                return;
            }
            
            // دالة لتحديد الأيقونة المناسبة حسب الصناعة
            function getIndustryIcon(industry) {
                const iconMap = {
                    'النفط والغاز': 'fas fa-industry',
                    'تكنولوجيا المعلومات': 'fas fa-laptop-code',
                    'الخدمات المالية': 'fas fa-university',
                    'التسويق والإعلان': 'fas fa-bullhorn',
                    'الرعاية الصحية': 'fas fa-heartbeat',
                    'التعليم': 'fas fa-graduation-cap',
                    'التجزئة': 'fas fa-shopping-cart',
                    'البناء والتشييد': 'fas fa-hard-hat',
                    'النقل واللوجستيات': 'fas fa-truck',
                    'الطاقة': 'fas fa-bolt',
                    'التصنيع': 'fas fa-cogs',
                    'السياحة والضيافة': 'fas fa-hotel'
                };
                return iconMap[industry] || 'fas fa-building';
            }
            
            const companiesHTML = companies.map((company, index) => `
                <div class="company-card" style="animation-delay: ${index * 0.1}s">
                    <div class="company-logo">
                        <i class="${getIndustryIcon(company.industry)}"></i>
                    </div>
                    <div class="company-info">
                        <h3>${company.name}</h3>
                        <p class="company-industry">${company.industry}</p>
                        <div class="company-stats">
                            <span><i class="fas fa-map-marker-alt"></i> ${company.location}</span>
                            <span><i class="fas fa-users"></i> +${company.employee_count} موظف</span>
                            <span><i class="fas fa-briefcase"></i> ${company.job_posts_count || 0} وظيفة متاحة</span>
                        </div>
                    </div>
                    <div class="company-actions">
                        <button class="btn btn-primary" onclick="viewCompanyDetails(${company.id})">
                            <i class="fas fa-eye"></i>
                            عرض الشركة
                        </button>
                        <button class="btn btn-secondary" onclick="followCompany(${company.id})">
                            <i class="fas fa-heart"></i>
                            متابعة
                        </button>
                    </div>
                </div>
            `).join('');
            
            container.innerHTML = companiesHTML;
        }

        // عرض خطأ في الشركات
        function showCompanyError(message) {
            const container = document.getElementById('companiesContainer');
            container.innerHTML = `
                <div class="error-state">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>خطأ في التحميل</h3>
                    <p>${message}</p>
                    <button onclick="loadCompanies()" class="btn btn-primary">
                        <i class="fas fa-redo"></i>
                        إعادة المحاولة
                    </button>
                </div>
            `;
        }

        // عرض تفاصيل الشركة
        async function viewCompanyDetails(companyId) {
            try {
                // إظهار النافذة المنبثقة
                const modal = document.getElementById('companyModal');
                modal.style.display = 'block';
                
                // تحميل تفاصيل الشركة
                const response = await fetch(`/api/companies/${companyId}`);
                const data = await response.json();
                
                if (data.company) {
                    displayCompanyDetails(data.company, data.jobs || []);
                } else {
                    showCompanyModalError('حدث خطأ في تحميل تفاصيل الشركة');
                }
            } catch (error) {
                console.error('Error loading company details:', error);
                showCompanyModalError('حدث خطأ في الاتصال بالخادم');
            }
        }

        // عرض تفاصيل الشركة في النافذة المنبثقة
        function displayCompanyDetails(company, jobs) {
            const modalName = document.getElementById('modalCompanyName');
            const modalContent = document.getElementById('modalCompanyContent');
            
            modalName.textContent = company.name;
            
            const jobsHTML = jobs.length > 0 ? jobs.map(job => `
                <div class="job-item">
                    <h4>${job.title}</h4>
                    <p><i class="fas fa-map-marker-alt"></i> ${job.location}</p>
                    <p><i class="fas fa-money-bill-wave"></i> ${job.salary_range}</p>
                    <p><i class="fas fa-clock"></i> ${job.job_type}</p>
                </div>
            `).join('') : '<div class="no-jobs">لا توجد وظائف متاحة حالياً</div>';
            
            modalContent.innerHTML = `
                <div class="company-details">
                    <div class="company-detail-section">
                        <h3><i class="fas fa-info-circle"></i> معلومات الشركة</h3>
                        <div class="company-detail-grid">
                            <div class="detail-item">
                                <i class="fas fa-industry"></i>
                                <span>الصناعة: <strong>${company.industry}</strong></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>الموقع: <strong>${company.location}</strong></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-users"></i>
                                <span>عدد الموظفين: <strong>${company.employee_count}+</strong></span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-briefcase"></i>
                                <span>الوظائف المتاحة: <strong>${jobs.length}</strong></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="company-detail-section">
                        <h3><i class="fas fa-address-card"></i> معلومات التواصل</h3>
                        <div class="company-detail-grid">
                            ${company.website ? `
                                <div class="detail-item">
                                    <i class="fas fa-globe"></i>
                                    <span>الموقع الإلكتروني: <strong><a href="${company.website}" target="_blank">${company.website}</a></strong></span>
                                </div>
                            ` : ''}
                            ${company.email ? `
                                <div class="detail-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>البريد الإلكتروني: <strong>${company.email}</strong></span>
                                </div>
                            ` : ''}
                            ${company.phone ? `
                                <div class="detail-item">
                                    <i class="fas fa-phone"></i>
                                    <span>الهاتف: <strong>${company.phone}</strong></span>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                    
                    ${company.description ? `
                        <div class="company-detail-section">
                            <h3><i class="fas fa-file-alt"></i> وصف الشركة</h3>
                            <div class="company-description">
                                ${company.description}
                            </div>
                        </div>
                    ` : ''}
                    
                    <div class="company-detail-section">
                        <h3><i class="fas fa-briefcase"></i> الوظائف المتاحة</h3>
                        <div class="company-jobs">
                            ${jobsHTML}
                        </div>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button class="btn btn-primary" onclick="followCompany(${company.id})">
                        <i class="fas fa-heart"></i>
                        متابعة الشركة
                    </button>
                    <button class="btn btn-secondary" onclick="closeCompanyModal()">
                        <i class="fas fa-times"></i>
                        إغلاق
                    </button>
                </div>
            `;
        }

        // إظهار خطأ في النافذة المنبثقة
        function showCompanyModalError(message) {
            const modalContent = document.getElementById('modalCompanyContent');
            modalContent.innerHTML = `
                <div class="error-state">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>خطأ في التحميل</h3>
                    <p>${message}</p>
                    <button onclick="closeCompanyModal()" class="btn btn-primary">
                        <i class="fas fa-times"></i>
                        إغلاق
                    </button>
                </div>
            `;
        }

        // إغلاق النافذة المنبثقة
        function closeCompanyModal() {
            const modal = document.getElementById('companyModal');
            modal.style.display = 'none';
        }

        // إغلاق النافذة عند النقر خارجها
        window.onclick = function(event) {
            const modal = document.getElementById('companyModal');
            if (event.target === modal) {
                closeCompanyModal();
            }
        }

        // متابعة الشركة
        function followCompany(companyId) {
            // يمكن إضافة وظيفة المتابعة هنا
            alert(`تمت متابعة الشركة رقم ${companyId}`);
        }

        // عرض خطأ في السياسات
        function showPolicyError(message) {
            const container = document.getElementById('policiesContainer');
            container.innerHTML = `
                <div class="error-state">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>خطأ في التحميل</h3>
                    <p>${message}</p>
                    <button onclick="loadPolicies()" class="btn btn-primary">
                        <i class="fas fa-redo"></i>
                        إعادة المحاولة
                    </button>
                </div>
            `;
        }

        // تحديث حالة التقديم
        async function updateApplicationStatus(favoriteId, isApplied) {
            try {
                const token = localStorage.getItem('authToken');
                if (!token) {
                    alert('يرجى تسجيل الدخول أولاً');
                    return;
                }
                
                const response = await fetch('/api/favorites/update-status', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        favorite_id: favoriteId,
                        is_applied: isApplied
                    })
                });

                const result = await response.json();
                
                if (result.success) {
                    alert(result.message);
                    loadDashboardStats(); // تحديث الإحصائيات
                } else {
                    alert(result.message || 'حدث خطأ في تحديث حالة التقديم');
                }
            } catch (error) {
                console.error('Error updating application status:', error);
                alert('حدث خطأ في الاتصال بالخادم');
            }
        }

        // Favorite functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.job-favorite')) {
                const icon = e.target.closest('.job-favorite').querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = '#ff4757';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '#ccc';
                }
            }
        });

        // Add fade-in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(el);
        });

        // Apply for job function
        function applyForJob(jobId) {
            window.location.href = `/job-application?job_id=${jobId}`;
        }

        // View job details function
        function viewJobDetails(jobId) {
            // إنشاء modal لعرض تفاصيل الوظيفة
            const modal = document.createElement('div');
            modal.className = 'modal';
            modal.style.display = 'block';
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
            modal.style.zIndex = '1000';
            
            const modalContent = document.createElement('div');
            modalContent.style.position = 'absolute';
            modalContent.style.top = '50%';
            modalContent.style.left = '50%';
            modalContent.style.transform = 'translate(-50%, -50%)';
            modalContent.style.backgroundColor = 'white';
            modalContent.style.padding = '30px';
            modalContent.style.borderRadius = '15px';
            modalContent.style.maxWidth = '600px';
            modalContent.style.width = '90%';
            modalContent.style.maxHeight = '80vh';
            modalContent.style.overflowY = 'auto';
            
            // محتوى تفاصيل الوظيفة
            const jobDetails = getJobDetails(jobId);
            modalContent.innerHTML = `
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h2 style="color: #333; margin: 0;">تفاصيل الوظيفة</h2>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" 
                            style="background: none; border: none; font-size: 24px; cursor: pointer; color: #666;">&times;</button>
                </div>
                <div style="line-height: 1.6;">
                    <h3 style="color: #667eea; margin-bottom: 10px;">${jobDetails.title}</h3>
                    <p><strong>الشركة:</strong> ${jobDetails.company}</p>
                    <p><strong>الموقع:</strong> ${jobDetails.location}</p>
                    <p><strong>الراتب:</strong> ${jobDetails.salary}</p>
                    <p><strong>نوع العمل:</strong> ${jobDetails.type}</p>
                    <p><strong>الوصف:</strong></p>
                    <p style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 10px 0;">
                        ${jobDetails.description}
                    </p>
                    <p><strong>المتطلبات:</strong></p>
                    <p style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 10px 0;">
                        ${jobDetails.requirements}
                    </p>
                </div>
                <div style="margin-top: 20px; text-align: center;">
                    <button onclick="applyForJob(${jobId})" class="btn btn-primary" style="margin: 0 5px;">
                        <i class="fas fa-paper-plane"></i>
                        التقديم على الوظيفة
                    </button>
                    <button onclick="shareJob(${jobId})" class="btn btn-secondary" style="margin: 0 5px;">
                        <i class="fas fa-share"></i>
                        مشاركة الوظيفة
                    </button>
                </div>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            // إغلاق Modal عند النقر خارجه
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // دالة مساعدة للحصول على تفاصيل الوظيفة
        function getJobDetails(jobId) {
            const jobs = {
                1: {
                    title: 'مطور ويب Frontend',
                    company: 'شركة التقنية المتقدمة',
                    location: 'الرياض',
                    salary: '8000-12000 ريال',
                    type: 'دوام كامل',
                    description: 'نبحث عن مطور ويب موهوب للانضمام إلى فريقنا. المطلوب خبرة في React و JavaScript مع فهم عميق لتطوير واجهات المستخدم الحديثة.',
                    requirements: '• خبرة لا تقل عن 3 سنوات في تطوير الواجهات الأمامية\n• إتقان HTML, CSS, JavaScript\n• خبرة في React.js أو Vue.js\n• فهم جيد لـ Responsive Design\n• مهارات حل المشاكل والعمل الجماعي'
                },
                2: {
                    title: 'محلل بيانات',
                    company: 'بنك الأمانة',
                    location: 'جدة',
                    salary: '10000-15000 ريال',
                    type: 'دوام كامل',
                    description: 'مطلوب محلل بيانات للعمل في قسم التحليل المالي. سيكون مسؤولاً عن تحليل البيانات المالية وتقديم التوصيات.',
                    requirements: '• درجة البكالوريوس في الإحصاء أو الرياضيات أو علوم الحاسب\n• خبرة في Python و SQL\n• مهارات تحليل البيانات\n• خبرة في أدوات التحليل مثل Tableau أو Power BI\n• مهارات التواصل والعرض'
                },
                3: {
                    title: 'مدير تسويق رقمي',
                    company: 'شركة الإبداع للتسويق',
                    location: 'الدمام',
                    salary: '12000-18000 ريال',
                    type: 'دوام كامل',
                    description: 'مطلوب مدير تسويق رقمي ذو خبرة في إدارة الحملات الإعلانية ووسائل التواصل الاجتماعي.',
                    requirements: '• خبرة لا تقل عن 5 سنوات في التسويق الرقمي\n• إتقان منصات الإعلانات مثل Google Ads و Facebook Ads\n• خبرة في إدارة وسائل التواصل الاجتماعي\n• مهارات تحليل البيانات والتقارير\n• مهارات القيادة وإدارة الفرق'
                }
            };
            
            return jobs[jobId] || {
                title: 'وظيفة',
                company: 'شركة',
                location: 'الموقع',
                salary: 'الراتب',
                type: 'نوع العمل',
                description: 'وصف الوظيفة',
                requirements: 'متطلبات الوظيفة'
            };
        }

        // Share job function
        function shareJob(jobId) {
            const jobDetails = getJobDetails(jobId);
            const shareText = `وظيفة مثيرة للاهتمام: ${jobDetails.title} في ${jobDetails.company}`;
            const shareUrl = `${window.location.origin}/job-application?job_id=${jobId}`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'وظيفة مثيرة للاهتمام',
                    text: shareText,
                    url: shareUrl
                }).then(() => {
                    showSuccessMessage('تم مشاركة الوظيفة بنجاح');
                }).catch((error) => {
                    console.log('Error sharing:', error);
                    fallbackShare(shareText, shareUrl);
                });
            } else {
                fallbackShare(shareText, shareUrl);
            }
        }

        // Fallback sharing method
        function fallbackShare(text, url) {
            // إنشاء modal للمشاركة
            const modal = document.createElement('div');
            modal.className = 'modal';
            modal.style.display = 'block';
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
            modal.style.zIndex = '1000';
            
            const modalContent = document.createElement('div');
            modalContent.style.position = 'absolute';
            modalContent.style.top = '50%';
            modalContent.style.left = '50%';
            modalContent.style.transform = 'translate(-50%, -50%)';
            modalContent.style.backgroundColor = 'white';
            modalContent.style.padding = '30px';
            modalContent.style.borderRadius = '15px';
            modalContent.style.maxWidth = '500px';
            modalContent.style.width = '90%';
            modalContent.style.textAlign = 'center';
            
            modalContent.innerHTML = `
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #333; margin-bottom: 15px;">مشاركة الوظيفة</h3>
                    <p style="color: #666; margin-bottom: 20px;">اختر طريقة المشاركة:</p>
                </div>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button onclick="copyToClipboard('${url}')" class="btn btn-primary" style="margin: 5px;">
                        <i class="fas fa-copy"></i>
                        نسخ الرابط
                    </button>
                    <button onclick="shareOnWhatsApp('${text} ${url}')" class="btn btn-success" style="margin: 5px;">
                        <i class="fab fa-whatsapp"></i>
                        مشاركة عبر واتساب
                    </button>
                    <button onclick="shareOnTwitter('${text}')" class="btn btn-info" style="margin: 5px;">
                        <i class="fab fa-twitter"></i>
                        مشاركة عبر تويتر
                    </button>
                    <button onclick="shareOnLinkedIn('${text}')" class="btn btn-secondary" style="margin: 5px;">
                        <i class="fab fa-linkedin"></i>
                        مشاركة عبر لينكد إن
                    </button>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" 
                        class="btn btn-secondary" style="margin-top: 20px;">
                    إغلاق
                </button>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            // إغلاق Modal عند النقر خارجه
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // Copy to clipboard function
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showSuccessMessage('تم نسخ الرابط إلى الحافظة');
                document.querySelector('.modal').remove();
            }).catch(() => {
                showErrorMessage('فشل في نسخ الرابط');
            });
        }

        // Share on WhatsApp
        function shareOnWhatsApp(text) {
            const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(text)}`;
            window.open(whatsappUrl, '_blank');
            document.querySelector('.modal').remove();
        }

        // Share on Twitter
        function shareOnTwitter(text) {
            const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
            window.open(twitterUrl, '_blank');
            document.querySelector('.modal').remove();
        }

        // Share on LinkedIn
        function shareOnLinkedIn(text) {
            const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(window.location.href)}&title=${encodeURIComponent(text)}`;
            window.open(linkedinUrl, '_blank');
            document.querySelector('.modal').remove();
        }

        // Show success message
        function showSuccessMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.style.position = 'fixed';
            messageDiv.style.top = '20px';
            messageDiv.style.right = '20px';
            messageDiv.style.backgroundColor = '#28a745';
            messageDiv.style.color = 'white';
            messageDiv.style.padding = '15px 20px';
            messageDiv.style.borderRadius = '8px';
            messageDiv.style.zIndex = '1001';
            messageDiv.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            messageDiv.textContent = message;
            
            document.body.appendChild(messageDiv);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 3000);
        }

        // Show error message
        function showErrorMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.style.position = 'fixed';
            messageDiv.style.top = '20px';
            messageDiv.style.right = '20px';
            messageDiv.style.backgroundColor = '#dc3545';
            messageDiv.style.color = 'white';
            messageDiv.style.padding = '15px 20px';
            messageDiv.style.borderRadius = '8px';
            messageDiv.style.zIndex = '1001';
            messageDiv.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            messageDiv.textContent = message;
            
            document.body.appendChild(messageDiv);
            
            setTimeout(() => {
                messageDiv.remove();
            }, 3000);
        }

        // Remove job from favorites function
        function removeFromFavorites(jobId) {
            const jobDetails = getJobDetails(jobId);
            
            // إنشاء modal للتأكيد
            const modal = document.createElement('div');
            modal.className = 'modal';
            modal.style.display = 'block';
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
            modal.style.zIndex = '1000';
            
            const modalContent = document.createElement('div');
            modalContent.style.position = 'absolute';
            modalContent.style.top = '50%';
            modalContent.style.left = '50%';
            modalContent.style.transform = 'translate(-50%, -50%)';
            modalContent.style.backgroundColor = 'white';
            modalContent.style.padding = '30px';
            modalContent.style.borderRadius = '15px';
            modalContent.style.maxWidth = '500px';
            modalContent.style.width = '90%';
            modalContent.style.textAlign = 'center';
            
            modalContent.innerHTML = `
                <div style="margin-bottom: 20px;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 48px; color: #ffc107; margin-bottom: 15px;"></i>
                    <h3 style="color: #333; margin-bottom: 15px;">تأكيد الإزالة</h3>
                    <p style="color: #666; margin-bottom: 20px;">
                        هل أنت متأكد من إزالة الوظيفة التالية من المفضلة؟
                    </p>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 15px 0;">
                        <strong>${jobDetails.title}</strong><br>
                        <small style="color: #666;">${jobDetails.company}</small>
                    </div>
                </div>
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <button onclick="confirmRemoveJob(${jobId})" class="btn btn-danger" style="margin: 5px;">
                        <i class="fas fa-trash"></i>
                        نعم، إزالة
                    </button>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="btn btn-secondary" style="margin: 5px;">
                        <i class="fas fa-times"></i>
                        إلغاء
                    </button>
                </div>
            `;
            
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            // إغلاق Modal عند النقر خارجه
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        }

        // Confirm remove job function
        function confirmRemoveJob(jobId) {
            const jobCard = document.querySelector(`[data-job-id="${jobId}"]`);
            if (jobCard) {
                // إضافة تأثير بصري للإزالة
                jobCard.style.animation = 'fadeOut 0.5s ease';
                jobCard.style.transform = 'scale(0.8)';
                
                setTimeout(() => {
                    jobCard.remove();
                    updateFavoritesCount();
                    showSuccessMessage('تم إزالة الوظيفة من المفضلة بنجاح');
                }, 500);
            }
            
            // إغلاق modal التأكيد
            document.querySelector('.modal').remove();
        }

        // Mark as favorite function
        function markAsFavorite(jobId) {
            const favoriteBtn = document.querySelector(`[data-job-id="${jobId}"] .job-favorite`);
            if (favoriteBtn) {
                favoriteBtn.classList.toggle('active');
                const icon = favoriteBtn.querySelector('i');
                if (favoriteBtn.classList.contains('active')) {
                    icon.className = 'fas fa-heart';
                    alert('تم إضافة الوظيفة إلى المفضلة');
                } else {
                    icon.className = 'far fa-heart';
                    alert('تم إزالة الوظيفة من المفضلة');
                }
            }
        }

        // Clear all favorites function
        function clearAllFavorites() {
            if (confirm('هل أنت متأكد من مسح جميع الوظائف المفضلة؟')) {
                const favoriteCards = document.querySelectorAll('.favorite-card');
                favoriteCards.forEach(card => {
                    card.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        card.remove();
                    }, 300);
                });
                setTimeout(() => {
                    updateFavoritesCount();
                }, 350);
            }
        }

        // Export favorites function
        function exportFavorites() {
            alert('سيتم تصدير الوظائف المفضلة إلى ملف PDF');
        }

        // Company functionality
        function showCompanyModal() {
            alert('إضافة شركة جديدة - سيتم إضافة هذه الميزة قريباً');
        }

        // View company details function - تم حذفها واستبدالها بالدالة الجديدة

        // Follow company function
        function followCompany(companyId) {
            alert(`تم متابعة الشركة رقم ${companyId}`);
        }

        // FAQ functionality
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }

        // Support functionality
        function contactSupport() {
            alert('سيتم فتح نموذج التواصل مع الدعم الفني');
        }

        // Policies functionality
        function downloadPolicies() {
            alert('سيتم تحميل ملف السياسات والشروط');
        }

        // Search jobs function
        function searchJobs() {
            const loading = document.getElementById('loading');
            const jobsList = document.getElementById('jobsList');
            
            loading.style.display = 'block';
            jobsList.style.display = 'none';
            
            // Simulate search delay
            setTimeout(() => {
                loading.style.display = 'none';
                jobsList.style.display = 'block';
                alert('تم البحث عن الوظائف بنجاح');
            }, 2000);
        }

        // Clear filters function
        function clearFilters() {
            // Reset all form inputs
            const formInputs = document.querySelectorAll('.filter-form input, .filter-form select');
            formInputs.forEach(input => {
                input.value = '';
            });
            alert('تم مسح جميع الفلاتر');
        }

        // Sort favorites function
        function sortFavorites() {
            const sortSelect = document.getElementById('favoritesSort');
            const sortValue = sortSelect.value;
            alert(`تم ترتيب المفضلة حسب: ${sortSelect.options[sortSelect.selectedIndex].text}`);
        }

        // Filter favorites function
        function filterFavorites() {
            const filterSelect = document.getElementById('favoritesFilter');
            const filterValue = filterSelect.value;
            alert(`تم فلترة المفضلة حسب: ${filterSelect.options[filterSelect.selectedIndex].text}`);
        }

        // Update favorites count function
        function updateFavoritesCount() {
            const count = document.querySelectorAll('.favorite-card').length;
            document.getElementById('favoritesCount').textContent = count;
            
            if (count === 0) {
                document.getElementById('emptyFavorites').style.display = 'block';
            }
        }

        // Add CSS animations and button improvements
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeOut {
                from { opacity: 1; transform: scale(1); }
                to { opacity: 0; transform: scale(0.8); }
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            
            .btn:active {
                transform: scale(0.95);
            }
            
            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            }
            
            .job-actions .btn {
                transition: all 0.3s ease;
            }
            
            .job-favorite:hover {
                animation: pulse 0.6s ease;
            }
            
            .modal {
                animation: fadeIn 0.3s ease;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        `;
        document.head.appendChild(style);

        // Add loading states to buttons
        function addLoadingState(button, text) {
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري التحميل...';
            button.disabled = true;
            
            return function() {
                button.innerHTML = originalText;
                button.disabled = false;
            };
        }

        // Enhanced button click feedback
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn')) {
                const button = e.target.closest('.btn');
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                }, 150);
            }
        });
    </script>
</body>
</html> 