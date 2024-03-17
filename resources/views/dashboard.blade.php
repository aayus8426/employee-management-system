@extends('master')
@section('content')

   <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-100 dark:bg-gray-900"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto">
        <div class="mb-4">
            <span class="text-2xl text-left font-semibold text-gray-800 dark:text-white">Employee Management
                System</span>
        </div>


        <ul class="space-y-2 font-medium">
            <details>
                <summary class="cursor-pointer">
                    <span class="flex-1 ms-3 whitespace-nowrap">Admin Section</span>
                </summary>
                <ul>
                    <li>
                        <a href="#" onclick="loadContent('/employees')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Manage Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('employees/create')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Add Employee</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('attendance')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Record Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('attendance/show')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Show Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('leave/pending')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Pending Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('settings')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Leave Setting</span>
                        </a>
                    </li>
                    <li>
                </ul>
            </details>
            <hr class="my-2 border-t border-gray-300 dark:border-gray-700">
            <details>
                <summary class="cursor-pointer">
                    <span class="flex-1 ms-3 whitespace-nowrap">Employee Section</span>
                </summary>
                <ul>
                    <li>
                        <a href="#" onclick="loadContent('leave')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">Apply Leave</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('myleave')"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <span class="flex-1 ms-3 whitespace-nowrap">My Leave</span>
                        </a>
                    </li>
                </ul>
            </details>
            <hr class="my-2 border-t border-gray-300 dark:border-gray-700">
            <li>
                <a href="#" onclick="loadContent('profile')"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-800 group">
                        <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>


<div class="main-section">
    <!-- Default main content area -->
    <main class="main-container ml-64 p-6">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
            </div>
        </div>

        <div class="main-cards grid grid-cols-2 gap-4 mt-4 p-10">
            <div class="card bg-white shadow-md p-10 rounded-md h-auto">
                <div class="card-inner flex items-center">
                    <p class="text-primary">Employees</p>

                </div>
                <span class="text-primary font-bold text-lg mt-2">249</span>
            </div>

            <div class="card bg-white shadow-md p-10 rounded-md">
                <div class="card-inner flex items-center">
                    <p class="text-primary">Admin</p>
                </div>
                <span class="text-primary font-bold text-lg mt-2">3</span>
            </div>

            <div class="card bg-white shadow-md p-10 rounded-md">
                <div class="card-inner flex items-center">
                    <p class="text-primary">Employee on leave</p>
                </div>
                <span class="text-primary font-bold text-lg mt-2">3</span>
            </div>

            <div class="card bg-white shadow-md p-10 rounded-md">
                <div class="card-inner flex items-center">
                    <p class="text-primary">INVENTORY ALERTS</p>
                    <span class="material-icons-outlined text-red ml-auto">notification_important</span>
                </div>
                <span class="text-primary font-bold text-lg mt-2">56</span>
            </div>
        </div>

    </main>
</div>
<!-- JavaScript Section -->
<script>
    function loadContent(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.querySelector('.main-section').innerHTML = data;
            })
            .catch(error => console.error('Error loading content:', error));
    }
    
</script>


@endsection