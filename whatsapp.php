<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .simple-whatsapp {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 9999;
        }
        
        .simple-whatsapp-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #25D366;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid white;
            text-decoration: none;
        }
        
        .simple-whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        
        .simple-whatsapp-btn i {
            font-size: 32px;
        }
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
        
        .simple-whatsapp-btn.pulse {
            animation: pulse 2s infinite;
        }
        @media (max-width: 768px) {
            .simple-whatsapp {
                bottom: 20px;
                right: 20px;
            }
            
            .simple-whatsapp-btn {
                width: 56px;
                height: 56px;
            }
            
            .simple-whatsapp-btn i {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="simple-whatsapp">
        <a href="https://wa.me/917030300132?text=Hello%20CareerNiti%20Team!%20I%20need%20assistance%20regarding%20career%20guidance." 
           target="_blank" 
           class="simple-whatsapp-btn pulse"
           title="Chat with us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappBtn = document.querySelector('.simple-whatsapp-btn');
            if (whatsappBtn) {
                whatsappBtn.addEventListener('click', function() {
                    console.log('WhatsApp button clicked');
                    // You can add Google Analytics tracking here
                });
            }
        });
    </script>
</body>
</html>
