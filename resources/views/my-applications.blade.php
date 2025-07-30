<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلباتي - نظام التقديم على الوظائف</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            direction: rtl;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-weight: 600;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .back-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.2));
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            border-color: rgba(255,255,255,0.5);
        }

        .back-btn:hover::before {
            left: 100%;
        }

        .back-btn:active {
            transform: translateY(-1px) scale(1.02);
        }

        .applications-container {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .applications-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .applications-title {
            font-size: 1.8rem;
            color: #333;
            font-weight: 600;
        }

        .applications-count {
            background: #667eea;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .application-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            border-left: 5px solid #667eea;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .application-card::before {
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

        .application-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.15);
            border-left-color: #764ba2;
        }

        .application-card:hover::before {
            opacity: 1;
        }

        .application-card:active {
            transform: translateY(-4px) scale(1.01);
        }

        .application-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .job-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .company-name {
            color: #666;
            font-size: 1rem;
        }

        .application-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-reviewed {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-accepted {
            background: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .application-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: rgba(248, 249, 250, 0.5);
        }

        .detail-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(5px);
        }

        .detail-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .detail-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .detail-item:hover .detail-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .detail-item:hover .detail-icon::before {
            left: 100%;
        }

        .detail-content h4 {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 2px;
        }

        .detail-content p {
            font-size: 1rem;
            color: #333;
            font-weight: 500;
        }

        .application-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 14px 28px;
            border: none;
            border-radius: 35px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            min-width: 160px;
            justify-content: center;
            letter-spacing: 0.5px;
            text-transform: none;
        }

        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.7s ease;
        }

        .action-btn:hover::before {
            left: 100%;
        }

        .action-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }

        .action-btn:active::after {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: 3px solid transparent;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-4px) scale(1.08);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.6);
            border-color: rgba(255,255,255,0.4);
        }

        .btn-primary:active {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            color: white;
            border: 3px solid transparent;
            box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
            transform: translateY(-4px) scale(1.08);
            box-shadow: 0 15px 35px rgba(108, 117, 125, 0.6);
            border-color: rgba(255,255,255,0.4);
        }

        .btn-secondary:active {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 25px rgba(108, 117, 125, 0.5);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: 3px solid transparent;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #218838 0%, #1ea085 100%);
            transform: translateY(-4px) scale(1.08);
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.6);
            border-color: rgba(255,255,255,0.4);
        }

        .btn-success:active {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 25px rgba(40, 167, 69, 0.5);
        }

        /* تحسين أيقونات الأزرار */
        .action-btn i {
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .action-btn:hover i {
            transform: scale(1.2);
        }

        /* تأثيرات خاصة لكل زر */
        .btn-primary:hover i {
            animation: bounce 0.6s ease;
        }

        .btn-secondary:hover i {
            animation: slideIn 0.6s ease;
        }

        .btn-success:hover i {
            animation: pulse 0.6s ease;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0) scale(1.2);
            }
            40% {
                transform: translateY(-5px) scale(1.2);
            }
            60% {
                transform: translateY(-3px) scale(1.2);
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-10px) scale(1.2);
                opacity: 0;
            }
            100% {
                transform: translateX(0) scale(1.2);
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1.2);
            }
            50% {
                transform: scale(1.4);
            }
            100% {
                transform: scale(1.2);
            }
        }

        /* تحسين تخطيط الأزرار */
        .application-actions {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 25px;
        }

        /* تأثيرات إضافية للأزرار */
        .action-btn {
            animation: fadeInUp 0.8s ease-out;
        }

        .action-btn:nth-child(1) {
            animation-delay: 0.2s;
        }

        .action-btn:nth-child(2) {
            animation-delay: 0.4s;
        }

        .action-btn:nth-child(3) {
            animation-delay: 0.6s;
        }

        /* تحسين أزرار الحالة الفارغة */
        .empty-state .action-btn {
            margin-top: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }
            50% {
                box-shadow: 0 4px 25px rgba(102, 126, 234, 0.6);
            }
            100% {
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .loading i {
            font-size: 2rem;
            color: #667eea;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-message {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 5px solid #dc3545;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
            transition: all 0.3s ease;
        }

        .error-message:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
        }

        .error-message i {
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        /* تحسينات إضافية للتفاعلية */
        .application-status {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .application-status::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .application-card:hover .application-status::before {
            left: 100%;
        }

        /* تحسين تأثيرات التحميل */
        .loading {
            text-align: center;
            padding: 60px 20px;
            color: #667eea;
        }

        .loading i {
            font-size: 3rem;
            color: #667eea;
            animation: spin 1.5s linear infinite;
            margin-bottom: 20px;
        }

        .loading p {
            font-size: 1.1rem;
            font-weight: 500;
            color: #4a5568;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* تحسين رسائل الخطأ */
        .error-message {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-left: 5px solid #dc3545;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
            transition: all 0.3s ease;
        }

        .error-message:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
        }

        .error-message i {
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        /* تصميم الإشعارات */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            color: #333;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.5s ease-in-out;
            z-index: 1000;
            border-left: 5px solid #667eea; /* Default color */
        }

        /* تصميم تفاصيل الحالة */
        .status-details {
            padding: 20px 0;
        }

        .status-item {
            margin-bottom: 20px;
            padding: 15px;
            background: linear-gradient(135deg, rgba(248, 249, 250, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%);
            border-radius: 15px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }

        .status-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.15);
        }

        .status-item h4 {
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .status-item p {
            color: #2d3748;
            font-weight: 500;
            margin: 0;
            font-size: 1rem;
        }

        .status-item .application-status {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            text-align: center;
            min-width: 120px;
        }

        .notification.show {
            opacity: 1;
            transform: translateY(0);
        }

        .notification-success {
            border-left-color: #28a745;
        }

        .notification-info {
            border-left-color: #17a2b8;
        }

        .notification-error {
            border-left-color: #dc3545;
        }

        /* تصميم النافذة المنبثقة */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: white;
            margin: 5% auto;
            padding: 0;
            border-radius: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            animation: modalSlideIn 0.4s ease-out;
            position: relative;
            overflow: hidden;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .modal-header .close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
        }

        .modal-header .close:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }

        .modal-body {
            padding: 30px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .detail-section {
            margin-bottom: 25px;
        }

        .detail-section h3 {
            color: #667eea;
            font-size: 1.1rem;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-section h3 i {
            font-size: 1.2rem;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .detail-item-modal {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }

        .detail-item-modal:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .detail-item-modal h4 {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .detail-item-modal p {
            color: #333;
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            margin: 10px 0;
        }

        .modal-actions {
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .modal-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .modal-btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .modal-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .modal-btn-secondary {
            background: #6c757d;
            color: white;
        }

        .modal-btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .applications-container {
                padding: 20px;
            }

            .application-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .application-details {
                grid-template-columns: 1fr;
            }

            .application-actions {
                justify-content: center;
                flex-direction: column;
                gap: 12px;
            }

            .action-btn {
                width: 100%;
                min-width: auto;
            }

            .back-btn {
                position: relative;
                top: auto;
                right: auto;
                margin-bottom: 20px;
                display: inline-block;
            }

            .detail-item {
                padding: 10px;
            }

            .detail-icon {
                width: 40px;
                height: 40px;
                font-size: 0.9rem;
            }

            .notification {
                right: 10px;
                left: 10px;
                top: 10px;
            }

            .modal-content {
                width: 95%;
                margin: 10% auto;
            }

            .modal-body {
                padding: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .modal-actions {
                flex-direction: column;
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <a href="/job-app" class="back-btn">
        <i class="fas fa-arrow-right"></i>
        العودة للوظائف
    </a>

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-clipboard-list"></i> طلباتي</h1>
            <p>تتبع جميع طلبات التقديم الخاصة بك</p>
        </div>

        <div class="applications-container">
            <div class="applications-header">
                <h2 class="applications-title">
                    <i class="fas fa-briefcase"></i>
                    طلبات التقديم
                </h2>
                <span class="applications-count" id="applicationsCount">0 طلب</span>
            </div>

            <div id="applicationsList">
                <div class="loading">
                    <i class="fas fa-spinner"></i>
                    <p>جاري تحميل الطلبات...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- النافذة المنبثقة لعرض التفاصيل -->
    <div id="applicationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2><i class="fas fa-file-alt"></i> تفاصيل الطلب</h2>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- سيتم ملء المحتوى ديناميكياً -->
            </div>
            <div class="modal-actions">
                <button class="modal-btn modal-btn-primary" onclick="downloadResumeFromModal()">
                    <i class="fas fa-download"></i>
                    تحميل السيرة الذاتية
                </button>
                <button class="modal-btn modal-btn-secondary" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                    إغلاق
                </button>
            </div>
        </div>
    </div>

    <script>
        // API Base URL
        const API_BASE_URL = window.location.origin;

        // Load applications on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadApplications();
        });

        async function loadApplications() {
            try {
                const response = await fetch(`${API_BASE_URL}/api/my-applications`);
                const data = await response.json();

                if (response.ok) {
                    applicationsData = data.applications; // Store applications globally
                    displayApplications(applicationsData);
                } else {
                    showError('حدث خطأ في تحميل الطلبات');
                }
            } catch (error) {
                console.error('Error loading applications:', error);
                showError('حدث خطأ في الاتصال بالخادم');
            }
        }

        function getStatusClass(status) {
            const statusClasses = {
                'pending': 'status-pending',
                'reviewed': 'status-reviewed',
                'accepted': 'status-accepted',
                'rejected': 'status-rejected'
            };
            return statusClasses[status] || 'status-pending';
        }

        function getStatusText(status) {
            const statusTexts = {
                'pending': 'قيد المراجعة',
                'reviewed': 'تمت المراجعة',
                'accepted': 'مقبول',
                'rejected': 'مرفوض'
            };
            return statusTexts[status] || 'قيد المراجعة';
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('ar-SA', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function showError(message) {
            const container = document.getElementById('applicationsList');
            container.innerHTML = `
                <div class="error-message">
                    <i class="fas fa-exclamation-triangle"></i>
                    ${message}
                </div>
            `;
        }

        // متغير عام لتخزين بيانات الطلبات
        let applicationsData = [];

        // دالة للبحث عن الطلب بواسطة المعرف
        function findApplicationById(applicationId) {
            return applicationsData.find(app => app.id == applicationId) || null;
        }

        // متغير عام لتخزين بيانات الطلب الحالي
        let currentApplicationData = null;

        function viewApplicationDetails(applicationId, event) {
            // إضافة تأثير بصري للأزرار
            const button = event ? event.target.closest('.action-btn') : null;
            if (button) {
                // تأثير النقر
                button.style.transform = 'scale(0.9)';
                button.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
                
                setTimeout(() => {
                    button.style.transform = '';
                    button.style.boxShadow = '';
                }, 200);
                
                // إضافة تأثير الوميض
                button.style.background = 'linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%)';
                setTimeout(() => {
                    button.style.background = '';
                }, 300);
            }
            
            // البحث عن بيانات الطلب
            const application = findApplicationById(applicationId);
            if (application) {
                currentApplicationData = application;
                showApplicationModal(application);
            } else {
                showNotification('لم يتم العثور على بيانات الطلب', 'error');
            }
        }

        // دالة لعرض النافذة المنبثقة
        function showApplicationModal(application) {
            const modal = document.getElementById('applicationModal');
            const modalHeader = modal.querySelector('.modal-header h2');
            const modalBody = document.getElementById('modalBody');
            
            modalHeader.innerHTML = '<i class="fas fa-file-alt"></i> تفاصيل الطلب';
            
            const applicationData = JSON.parse(application.notes || '{}');
            const statusClass = getStatusClass(application.status);
            const statusText = getStatusText(application.status);
            
            modalBody.innerHTML = `
                <div class="detail-section">
                    <h3><i class="fas fa-briefcase"></i> معلومات الوظيفة</h3>
                    <div class="detail-grid">
                        <div class="detail-item-modal">
                            <h4>المسمى الوظيفي</h4>
                            <p>${application.job_post?.title || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>الشركة</h4>
                            <p>${application.job_post?.company?.name || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>حالة الطلب</h4>
                            <span class="status-badge ${statusClass}">${statusText}</span>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3><i class="fas fa-user"></i> المعلومات الشخصية</h3>
                    <div class="detail-grid">
                        <div class="detail-item-modal">
                            <h4>الاسم الكامل</h4>
                            <p>${applicationData.name || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>البريد الإلكتروني</h4>
                            <p>${applicationData.email || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>رقم الهاتف</h4>
                            <p>${applicationData.phone || 'غير متوفر'}</p>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3><i class="fas fa-graduation-cap"></i> المؤهلات والخبرة</h3>
                    <div class="detail-grid">
                        <div class="detail-item-modal">
                            <h4>الدرجة العلمية</h4>
                            <p>${applicationData.education || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>سنوات الخبرة</h4>
                            <p>${applicationData.experience || 'غير متوفر'}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>المهارات</h4>
                            <p>${applicationData.skills || 'غير متوفر'}</p>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3><i class="fas fa-calendar-alt"></i> تواريخ مهمة</h3>
                    <div class="detail-grid">
                        <div class="detail-item-modal">
                            <h4>تاريخ التقديم</h4>
                            <p>${formatDate(application.created_at)}</p>
                        </div>
                        <div class="detail-item-modal">
                            <h4>آخر تحديث</h4>
                            <p>${formatDate(application.updated_at)}</p>
                        </div>
                    </div>
                </div>

                ${applicationData.cover_letter ? `
                <div class="detail-section">
                    <h3><i class="fas fa-file-text"></i> خطاب التقديم</h3>
                    <div class="detail-item-modal">
                        <h4>المحتوى</h4>
                        <p>${applicationData.cover_letter}</p>
                    </div>
                </div>
                ` : ''}
            `;
            
            modal.style.display = 'block';
        }

        // دالة لإغلاق النافذة المنبثقة
        function closeModal() {
            const modal = document.getElementById('applicationModal');
            modal.style.display = 'none';
            currentApplicationData = null;
        }

        // دالة لتحميل السيرة الذاتية من النافذة المنبثقة
        async function downloadResumeFromModal() {
            if (!currentApplicationData) {
                showNotification('لا توجد بيانات طلب متاحة', 'error');
                return;
            }

            try {
                showNotification('جاري تحميل السيرة الذاتية...', 'info');
                
                const response = await fetch(`${API_BASE_URL}/api/applications/${currentApplicationData.id}/resume`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/octet-stream',
                    }
                });

                if (response.ok) {
                    // الحصول على اسم الملف من header أو استخدام اسم افتراضي
                    const contentDisposition = response.headers.get('content-disposition');
                    let filename = 'resume.pdf';
                    if (contentDisposition) {
                        const filenameMatch = contentDisposition.match(/filename="(.+)"/);
                        if (filenameMatch) {
                            filename = filenameMatch[1];
                        }
                    }

                    // تحويل الاستجابة إلى blob وإنشاء رابط التحميل
                    const blob = await response.blob();
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);

                    showNotification('تم تحميل السيرة الذاتية بنجاح', 'success');
                } else {
                    const errorData = await response.json();
                    showNotification(errorData.error || 'حدث خطأ في تحميل الملف', 'error');
                }
            } catch (error) {
                console.error('Download error:', error);
                showNotification('حدث خطأ في تحميل السيرة الذاتية', 'error');
            }
        }

        // إغلاق النافذة المنبثقة عند النقر خارجها
        window.onclick = function(event) {
            const modal = document.getElementById('applicationModal');
            if (event.target === modal) {
                closeModal();
            }
        }

        async function checkApplicationStatus(applicationId, event) {
            // إضافة تأثير بصري للأزرار
            const button = event ? event.target.closest('.action-btn') : null;
            if (button) {
                // تأثير النقر
                button.style.transform = 'scale(0.9)';
                button.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
                
                setTimeout(() => {
                    button.style.transform = '';
                    button.style.boxShadow = '';
                }, 200);
                
                // إضافة تأثير الوميض
                button.style.background = 'linear-gradient(135deg, #218838 0%, #1ea085 100%)';
                setTimeout(() => {
                    button.style.background = '';
                }, 300);
            }
            
            try {
                showNotification('جاري التحقق من حالة الطلب...', 'info');
                
                const response = await fetch(`${API_BASE_URL}/api/applications/${applicationId}/status`);
                
                if (response.ok) {
                    const data = await response.json();
                    const application = data.application;
                    const statusInfo = data.status_info;
                    
                    // عرض حالة الطلب في نافذة منبثقة
                    showStatusModal(application, statusInfo);
                } else {
                    const errorData = await response.json();
                    showNotification(errorData.message || 'حدث خطأ في التحقق من حالة الطلب', 'error');
                }
            } catch (error) {
                console.error('Status check error:', error);
                showNotification('حدث خطأ في التحقق من حالة الطلب', 'error');
            }
        }

        // دالة لعرض نافذة منبثقة لحالة الطلب
        function showStatusModal(application, statusInfo) {
            const modal = document.getElementById('applicationModal');
            const modalHeader = modal.querySelector('.modal-header h2');
            const modalBody = modal.querySelector('.modal-body');
            const modalActions = modal.querySelector('.modal-actions');
            
            modalHeader.innerHTML = '<i class="fas fa-info-circle"></i> حالة الطلب';
            
            const statusText = statusInfo[application.status] || 'غير محدد';
            const statusClass = getStatusClass(application.status);
            
            modalBody.innerHTML = `
                <div class="status-details">
                    <div class="status-item">
                        <h4>الوظيفة:</h4>
                        <p>${application.job_post?.title || 'غير محدد'}</p>
                    </div>
                    <div class="status-item">
                        <h4>الشركة:</h4>
                        <p>${application.job_post?.company?.name || 'غير محدد'}</p>
                    </div>
                    <div class="status-item">
                        <h4>الحالة الحالية:</h4>
                        <p class="application-status ${statusClass}">${statusText}</p>
                    </div>
                    <div class="status-item">
                        <h4>تاريخ التقديم:</h4>
                        <p>${formatDate(application.created_at)}</p>
                    </div>
                    <div class="status-item">
                        <h4>آخر تحديث:</h4>
                        <p>${formatDate(application.updated_at)}</p>
                    </div>
                </div>
            `;
            
            modalActions.innerHTML = `
                <button class="modal-btn modal-btn-secondary" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                    إغلاق
                </button>
            `;
            
            modal.style.display = 'block';
        }

        // دالة لتحميل السيرة الذاتية مع تأثيرات
        async function downloadResume(applicationId, event) {
            const button = event ? event.target.closest('.action-btn') : null;
            if (button) {
                // تأثير النقر
                button.style.transform = 'scale(0.9)';
                button.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
                
                setTimeout(() => {
                    button.style.transform = '';
                    button.style.boxShadow = '';
                }, 200);
                
                // إضافة تأثير الوميض
                button.style.background = 'linear-gradient(135deg, #5a6268 0%, #495057 100%)';
                setTimeout(() => {
                    button.style.background = '';
                }, 300);
            }
            
            try {
                showNotification('جاري تحميل السيرة الذاتية...', 'info');
                
                const response = await fetch(`${API_BASE_URL}/api/applications/${applicationId}/resume`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/octet-stream',
                    }
                });

                if (response.ok) {
                    // الحصول على اسم الملف من header أو استخدام اسم افتراضي
                    const contentDisposition = response.headers.get('content-disposition');
                    let filename = 'resume.pdf';
                    if (contentDisposition) {
                        const filenameMatch = contentDisposition.match(/filename="(.+)"/);
                        if (filenameMatch) {
                            filename = filenameMatch[1];
                        }
                    }

                    // تحويل الاستجابة إلى blob وإنشاء رابط التحميل
                    const blob = await response.blob();
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    window.URL.revokeObjectURL(url);

                    showNotification('تم تحميل السيرة الذاتية بنجاح', 'success');
                } else {
                    const errorData = await response.json();
                    showNotification(errorData.error || 'حدث خطأ في تحميل الملف', 'error');
                }
            } catch (error) {
                console.error('Download error:', error);
                showNotification('حدث خطأ في تحميل السيرة الذاتية', 'error');
            }
        }

        // دالة لعرض الإشعارات محسنة
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <i class="fas fa-${type === 'info' ? 'info-circle' : type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            // إضافة تأثير الظهور
            setTimeout(() => {
                notification.classList.add('show');
            }, 100);
            
            // إزالة الإشعار بعد 3 ثوان
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // إضافة مستمعي الأحداث للأزرار
        document.addEventListener('click', function(e) {
            if (e.target.closest('.action-btn')) {
                const button = e.target.closest('.action-btn');
                
                // إضافة تأثير النقر
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                }, 150);
            }
        });

        // تحسين دالة عرض الطلبات مع تأثيرات حركية
        function displayApplications(applications) {
            const container = document.getElementById('applicationsList');
            const countElement = document.getElementById('applicationsCount');

            if (applications.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>لا توجد طلبات بعد</h3>
                        <p>لم تقم بالتقديم على أي وظيفة بعد</p>
                        <a href="/job-app" class="action-btn btn-primary">
                            <i class="fas fa-search"></i>
                            تصفح الوظائف
                        </a>
                    </div>
                `;
                countElement.textContent = '0 طلب';
                return;
            }

            countElement.textContent = `${applications.length} طلب`;

            const applicationsHTML = applications.map((application, index) => {
                const statusClass = getStatusClass(application.status);
                const statusText = getStatusText(application.status);
                const applicationData = JSON.parse(application.notes || '{}');
                
                return `
                    <div class="application-card" style="animation-delay: ${index * 0.1}s">
                        <div class="application-header">
                            <div>
                                <h3 class="job-title">${application.job_post?.title || 'وظيفة غير متاحة'}</h3>
                                <p class="company-name">${application.job_post?.company?.name || 'شركة غير متاحة'}</p>
                            </div>
                            <span class="application-status ${statusClass}">${statusText}</span>
                        </div>

                        <div class="application-details">
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>الاسم</h4>
                                    <p>${applicationData.name || 'غير متوفر'}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>سنوات الخبرة</h4>
                                    <p>${applicationData.experience || 'غير متوفر'}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>الدرجة العلمية</h4>
                                    <p>${applicationData.education || 'غير متوفر'}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>البريد الإلكتروني</h4>
                                    <p>${applicationData.email || 'غير متوفر'}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>تاريخ التقديم</h4>
                                    <p>${formatDate(application.created_at)}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="detail-content">
                                    <h4>آخر تحديث</h4>
                                    <p>${formatDate(application.updated_at)}</p>
                                </div>
                            </div>
                        </div>

                        <div class="application-actions">
                            <button onclick="viewApplicationDetails(${application.id}, event)" class="action-btn btn-primary">
                                <i class="fas fa-eye"></i>
                                عرض التفاصيل
                            </button>
                            
                            ${application.resume_path ? `
                                <button onclick="downloadResume(${application.id}, event)" class="action-btn btn-secondary">
                                    <i class="fas fa-download"></i>
                                    تحميل السيرة الذاتية
                                </button>
                            ` : ''}
                            
                            <button onclick="checkApplicationStatus(${application.id}, event)" class="action-btn btn-success">
                                <i class="fas fa-info-circle"></i>
                                حالة الطلب
                            </button>
                        </div>
                    </div>
                `;
            }).join('');

            container.innerHTML = applicationsHTML;
        }
    </script>
</body>
</html> 