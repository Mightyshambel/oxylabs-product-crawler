<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Oxylabs Crawler</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        // Filament admin panel dark theme colors (the good ones!)
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617'
                        },
                        // Beautiful purple accent colors
                        purple: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            300: '#d8b4fe',
                            400: '#c084fc',
                            500: '#a855f7',
                            600: '#9333ea',
                            700: '#7c3aed',
                            800: '#6b21a8',
                            900: '#581c87',
                            950: '#3b0764'
                        }
                    }
                }
            }
        }
    </script>
    @livewireStyles
</head>
<body class="bg-gray-50 dark:bg-dark-900 transition-colors duration-300">
    <!-- Theme Toggle -->
    <div class="fixed top-4 right-4 z-50">
        <button 
            @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
            class="bg-white dark:bg-dark-800 border border-gray-200 dark:border-dark-600 rounded-full p-3 shadow-lg hover:shadow-xl transition-all duration-300 group backdrop-blur-sm"
            :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
        >
            <!-- Sun Icon (Light Mode) -->
            <svg x-show="!darkMode" class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <!-- Moon Icon (Dark Mode) -->
            <svg x-show="darkMode" class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
        </button>
    </div>

    @livewire('products-page')

    <!-- Footer -->
    <footer class="text-center py-6 px-4 mt-12 border-t border-gray-200 dark:border-dark-600 bg-white/50 dark:bg-dark-800/50 backdrop-blur-sm">
        <p class="text-sm text-purple-600 dark:text-purple-400 font-medium transition-colors duration-300">
            © 2025 The Almighty
        </p>
    </footer>

    @livewireScripts
</body>
</html>
