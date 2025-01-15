<aside class="bg-white w-64 min-h-screen flex flex-col shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in fixed md:static z-30" id="sidebar">
    <div class="p-4 border-b flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Quiz App</h2>
        <button class="md:hidden text-gray-600" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
            <i class="fas fa-close text-xl"></i>
        </button>
    </div>
    <nav class="flex-grow p-4" id="sidebar"></nav>
</aside>
<script>
    let sidebarItems = [
        {
            'name': 'Dashboard',
            'uri': '/dashboard',
            'icon': 'fas fa-home',
        },
        {
            'name': 'My Quizzes',
            'uri': '/dashboard/quizzes',
            'icon': 'fas fa-book',
        },
        {
            'name': 'Create Quiz',
            'uri': '/dashboard/create-quiz',
            'icon': 'fas fa-plus',
        },
        {
            'name': 'Statistics',
            'uri': '/dashboard/statistics',
            'icon': 'fas fa-chart-bar',
        }
    ];

    let sidebar = document.getElementById('sidebar');
    let htmlContent = '';
    sidebarItems.forEach(item => {
        let isActive = window.location.pathname === item.uri ? 'bg-gray-100' : 'hover:bg-gray-100';
        htmlContent += `<a href="${item.uri}" class="block p-3 mb-2 text-gray-800 ${isActive} rounded-lg">
            <i class="${item.icon}"></i> ${item.name}
        </a>`;
    });
    sidebar.innerHTML = htmlContent;
</script>