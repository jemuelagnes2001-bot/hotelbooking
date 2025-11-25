<div class="w-full max-w-8xl mx-auto px-4">


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

        <div class="bg-white p-6 rounded-xl shadow border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Guests</p>
              <h2 class="text-3xl font-bold text-gray-700">{{ $totalGuests }}</h2>
            </div>
            <div class="bg-blue-100 p-4 rounded-xl">
                <i class="ri-group-fill text-3xl text-blue-600"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Available Rooms</p>
           <h2 class="text-3xl font-bold text-gray-700">{{ $availableRooms }}</h2>
            </div>
            <div class="bg-green-100 p-4 rounded-xl">
                <i class="ri-door-open-line text-3xl text-green-600"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow border border-gray-200 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Bookings</p>
            <h2 class="text-3xl font-bold text-gray-700">{{ $totalBookings }}</h2>
            </div>
            <div class="bg-yellow-100 p-4 rounded-xl">
                <i class="ri-calendar-check-line text-3xl text-yellow-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow border border-gray-200 w-full">

        <h2 class="text-xl font-semibold text-gray-700 mb-4">Income Overview</h2>


        <ul class="flex border-b border-gray-200 mb-6 gap-6" id="chartTabs">
            <li><button data-target="dailyChart" class="px-4 py-2 text-gray-600 hover:text-blue-600 tab-btn border-b-2 border-transparent">Daily</button></li>
            <li><button data-target="weeklyChart" class="px-4 py-2 text-gray-600 hover:text-blue-600 tab-btn border-b-2 border-transparent">Weekly</button></li>
            <li><button data-target="monthlyChart" class="px-4 py-2 text-gray-600 hover:text-blue-600 tab-btn border-b-2 border-transparent">Monthly</button></li>
            <li><button data-target="yearlyChart" class="px-4 py-2 text-gray-600 hover:text-blue-600 tab-btn border-b-2 border-transparent">Yearly</button></li>
        </ul>


        <div class="w-full">
            <canvas id="dailyChart" class="chartCanvas w-full"></canvas>
            <canvas id="weeklyChart" class="chartCanvas w-full hidden"></canvas>
            <canvas id="monthlyChart" class="chartCanvas w-full hidden"></canvas>
            <canvas id="yearlyChart" class="chartCanvas w-full hidden"></canvas>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", () => {

    const dailyIncome = {{ $dailyIncome }};
    const weeklyIncome = {{ $weeklyIncome }};
    const monthlyIncome = {{ $monthlyIncome }};
    const yearlyIncome = {{ $yearlyIncome }};


    const charts = {
        dailyChart: new Chart(document.getElementById('dailyChart'), {
            type: 'bar',
            data: {
                labels: ['Today'],
                datasets: [{ label: 'Daily Income', data: [dailyIncome] }]
            }
        }),

        weeklyChart: new Chart(document.getElementById('weeklyChart'), {
            type: 'bar',
            data: {
                labels: ['This Week'],
                datasets: [{ label: 'Weekly Income', data: [weeklyIncome] }]
            }
        }),

        monthlyChart: new Chart(document.getElementById('monthlyChart'), {
            type: 'bar',
            data: {
                labels: ['This Month'],
                datasets: [{ label: 'Monthly Income', data: [monthlyIncome] }]
            }
        }),

        yearlyChart: new Chart(document.getElementById('yearlyChart'), {
            type: 'bar',
            data: {
                labels: ['This Year'],
                datasets: [{ label: 'Yearly Income', data: [yearlyIncome] }]
            }
        })
    };


    document.querySelectorAll(".tab-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".chartCanvas").forEach(c => c.classList.add("hidden"));
            document.getElementById(btn.dataset.target).classList.remove("hidden");
        });
    });

});
</script>


</div>
