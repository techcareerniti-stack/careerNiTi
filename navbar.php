<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 

</head>
<body class="font-sans antialiased">
    <?php
    class ResponsiveNavigation {
        private $currentPath;
        private $navItems;
        
        public function __construct() {
            $this->currentPath = $_SERVER['REQUEST_URI'];
            $this->navItems = [
                ['label' => 'Home', 'path' => '/', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                ['label' => 'Career', 'path' => '/career.php', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ['label' => 'Exam', 'path' => '/exam.php', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Admission', 'path' => '/admission.php', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['label' => 'Notification', 'path' => '/notification.php', 'icon' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'],
                ['label' => 'About Us', 'path' => 'pages/about.php', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Contact Us', 'path' => '/contact.php', 'icon' => 'M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z']
            ];
        }
        
        private function isActive($path) {
            return $this->currentPath === $path ? 'text-orange-500' : 'text-gray-700 hover:text-orange-500';
        }
        
        private function isActiveMobile($path) {
            return $this->currentPath === $path ? 'text-orange-500 bg-orange-50 border-l-4 border-orange-500' : 'text-gray-700 hover:text-orange-500 hover:bg-gray-50';
        }
        
        public function render() {
            ob_start();
            ?>
            <!-- Navigation Container -->
            <div x-data="{ 
                mobileMenuOpen: false,
                scrolled: false,
                init() {
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 10;
                    });
                    
                    // Close mobile menu on ESC key
                    window.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape' && this.mobileMenuOpen) {
                            this.mobileMenuOpen = false;
                        }
                    });
                }
            }">
                <!-- Navigation Bar -->
                <nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50 px-4 md:px-8 transition-all duration-300 py-3">
                    
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center">
                            
                            <!-- Logo Section -->
                            <div class="flex items-center flex-shrink-0">
                                <a href="/" 
                                   class="flex items-center space-x-2"
                                   onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
                                    <img src="assets/images/Careerniti_logo.png" 
                                         alt="CareerNiti Logo"
                                         class="h-8 w-auto sm:h-9 md:h-10">
                                   
                                </a>
                            </div>
                            
                            <!-- Desktop Navigation -->
                            <div class="hidden lg:flex items-center space-x-1 xl:space-x-2">
                                <?php foreach($this->navItems as $item): ?>
                                    <a href="<?php echo $item['path']; ?>"
                                       class="nav-link px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200 <?php echo $this->isActive($item['path']); ?> <?php echo $this->currentPath === $item['path'] ? 'active-nav' : ''; ?>">
                                        <?php echo $item['label']; ?>
                                    </a>
                                <?php endforeach; ?>
                                
                                <!-- Desktop Login Button -->
                                <div class="ml-4 pl-4 border-l border-gray-200">
                                    <button type="button"
                                            onclick="handleLogin()"
                                            class="inline-flex items-center px-4 py-2 border border-orange-500 text-sm font-medium rounded-md text-orange-500 bg-white hover:bg-orange-500 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                        </svg>
                                        Login
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Mobile Menu Button -->
                            <div class="lg:hidden flex items-center space-x-4">
                                <!-- Mobile Login Button (Visible on tablets) -->
                                <button type="button"
                                        onclick="handleLogin()"
                                        class="hidden sm:inline-flex items-center px-3 py-1.5 border border-orange-500 text-xs font-medium rounded-md text-orange-500 bg-white hover:bg-orange-500 hover:text-white transition-all duration-200">
                                    Login
                                </button>
                                
                                <button @click="mobileMenuOpen = !mobileMenuOpen"
                                        type="button"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-orange-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-orange-500"
                                        :aria-expanded="mobileMenuOpen"
                                        aria-label="Toggle menu">
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Hamburger icon -->
                                    <svg class="block h-6 w-6" :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen}" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                    <!-- Close icon -->
                                    <svg class="block h-6 w-6" :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen}" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile Menu Panel -->
                    <div x-show="mobileMenuOpen"
                         x-cloak
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="lg:hidden absolute top-full left-0 right-0 bg-white shadow-xl border-t border-gray-200"
                         @click.away="mobileMenuOpen = false">
                        
                        <div class="container mx-auto px-4 py-3">
                            <!-- Mobile Navigation Links -->
                            <div class="space-y-1">
                                <?php foreach($this->navItems as $item): ?>
                                    <a href="<?php echo $item['path']; ?>"
                                       class="flex items-center px-4 py-3 text-base font-medium rounded-md transition-colors duration-200 <?php echo $this->isActiveMobile($item['path']); ?>"
                                       @click="mobileMenuOpen = false">
                                        <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $item['icon']; ?>"/>
                                        </svg>
                                        <?php echo $item['label']; ?>
                                        <?php if($this->currentPath === $item['path']): ?>
                                            <span class="ml-auto text-orange-500">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- Mobile Login Button -->
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <button type="button"
                                        onclick="handleLogin(); mobileMenuOpen = false;"
                                        class="w-full flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-500 hover:bg-orange-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                    </svg>
                                    Login 
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <!-- Spacer for fixed navbar -->
                <div class="h-14 sm:h-16 md:h-18 lg:h-20"></div>
            </div>
            
            <?php
            return ob_get_clean();
        }
    }

    $nav = new ResponsiveNavigation();
    echo $nav->render();
    ?>
<script src="assets/js/navbar.js"></script>   
</body>
</html>
