<base href="/public">
@extends('layouts.app')

@section('content')

  
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            /* Applying the dark blue background */
          height: 100vh;
        }
        .donut-chart-inner {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-weight: 500;
            color: #333;
            font-size: 14px;
            user-select: none;
            pointer-events: none;
            /* Ensure the inner area is white */
            background-color: #ffffff;
        }
        .donut-chart-inner .value {
            font-size: 24px;
            font-weight: 700;
        }
        .clickable {
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }
        .clickable:hover {
            color: #1a202c !important; /* Darken on hover */
        }
        .chart-container {
            position: relative;
            width: 200px;
            height: 200px;
        }

        /* Custom border for the cards */
        .card-border {
            border: 1px solid #b3e6c3; /* Lighter green general border */
        }

        /* Vibrant green top border for cards */
        .card-top-highlight {
            border-top: 5px solid rgba(0, 164, 128, 1);
        }
        
    </style>



    <div class="max-w-screen-xl mx-auto p-4">

        <div class="flex flex-col lg:flex-row gap-6 w-full items-stretch">

            {{-- Left card: Results Analysis --}}
            <div class="bg-white rounded-xl shadow-lg w-full lg:w-1/2 p-6 flex flex-col card-border card-top-highlight mt-xl-5">
                <h2 class="text-gray-700 text-2xl font-semibold mb-4 text-center">
                    Task: {{ $fileName ?? 'Email List' }}
                </h2>

                <div class="border-y border-gray-200 py-4 mb-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-left text-gray-700 text-sm">
                    <div class="space-y-2">
                        <p><span class="font-semibold">Task ID:</span> <span class="inline-block bg-gray-200 text-gray-800 rounded px-2 py-0.5 ml-1 select-text text-xs">{{ $execution['random'] ?? 'N/A' }}</span></p>
                        <p><span class="font-semibold">Status:</span> <span class="capitalize">{{ $execution['status'] ?? 'N/A' }}</span></p>
                        <p>
                            <span class="font-semibold">Progress:</span>
                            {{ number_format(array_sum($summary ?? [])) }}/{{ $execution['total_emails'] ?? array_sum($summary ?? []) }}
                            ({{ ($execution['total_emails'] > 0) ? round((array_sum($summary ?? []) / $execution['total_emails']) * 100, 2) : 0 }}%)
                        </p>
                    </div>
                    <div class="space-y-2">
                        <p><span class="font-semibold">Started:</span> {{ $execution['start_time'] ? \Carbon\Carbon::parse($execution['start_time'])->format('M d, Y H:i:s') : 'N/A' }}</p>
                        <p><span class="font-semibold">Finished:</span> {{ $execution['end_time'] ? \Carbon\Carbon::parse($execution['end_time'])->format('M d, Y H:i:s') : 'N/A' }}</p>
                        <p><span class="font-semibold">Runtime:</span> {{ $execution['duration_seconds'] ?? 'N/A' }} seconds</p>
                    </div>
                </div>

                <h3 class="text-gray-700 text-xl
                 font-semibold mb-6 text-center">Results Analysis</h3>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-8 flex-grow">
                    <div class="chart-container">
                        <canvas id="myChartJsDonut"></canvas>
                        <div class="donut-chart-inner" id="donutInner">
                            <span class="text-md text-gray-600" id="donutLabel">Total</span>
                            <span class="value" id="donutValue">{{ number_format(array_sum($summary ?? [])) }}</span>
                        </div>
                    </div>
                    <ul class="text-left text-sm font-sm space-y-2 max-w-xs w-full">
                        @php
                            $colors = [
                                '✅ Safe' => '#5cb85c', // Bootstrap success green
                                '👥 Role-based' => '#f0ad4e', // Bootstrap warning orange
                                '🟠 Catch-All' => '#ec971f', // Darker orange
                                '🔥 Disposable' => '#d9534f', // Bootstrap danger red
                                '📥 Inbox Full' => '#e67399', // Custom pink
                                '⚠️ Spam Trap' => '#8a2be2', // Blue-violet
                                '🚫 Disabled' => '#5bc0de', // Bootstrap info blue
                                '❌ Invalid' => '#007bff', // Bootstrap primary blue
                                '❓ Unknown' => '#6c757d', // Bootstrap secondary gray
                                '🚫 Undeliverable' => '#343a40', // Dark grey
                            ];
                        @endphp
                        @foreach (($summary ?? []) as $label => $count)
                            <li class="flex items-center gap-2 clickable" style="color: {{ $colors[$label] ?? '#000' }}" data-label-raw="{{ $label }}">
                                <span class="w-4 h-4 rounded-sm block" style="background-color: {{ $colors[$label] ?? '#000' }}"></span>
                                <span class="flex-grow">{{ str_replace(['✅ ', '❌ ', '🔥 ', '👥 ', '⚠️ ', '📥 ', '🚫 ', '❓ ', '🟠 ', '📦 '], '', $label) }}:</span>
                                <span class="font-semibold">{{ number_format($count) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Right card: Download Categorized Results --}}
            <div class="bg-white rounded-xl shadow-lg w-full lg:w-1/2 p-6 flex flex-col justify-between card-border card-top-highlight mt-xl-5">
                <div class="flex flex-col items-center mb-6 mt-10">
                    <i class="fas fa-cloud-download-alt text-[rgba(0,164,128,1)] text-7xl mb-4"></i> {{-- Using the vibrant green here --}}
                    <h1 class="text-gray-700 text-2xl font-semibold mb-4 text-center">Download Categorized Results</h1>
                    <p class="text-gray-600 text-sm text-center mb-6">Select a category to download the corresponding email list in your preferred format.</p>
                </div>

                <select id="categorySelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-[rgba(0,164,128,1)] focus:border-[rgba(0,164,128,1)] block w-full p-2.5 mb-6">
                    <option value="all">All - Include all types of results</option>
                    <option value="safe">Safe</option>
                    <option value="rolebased">Role-based</option>
                    <option value="catchall">Catch-all</option>
                    <option value="disposable">Disposable</option>
                    <option value="inboxfull">Inbox Full</option>
                    <option value="spamtrap">Spam Trap</option>
                    <option value="disabled">Disabled</option>
                    <option value="invalid">Invalid</option>
                    <option value="unknown">Unknown</option>
                    <option value="undeliverable">Undeliverable</option>
                </select>

                <div class="flex justify-center gap-4 mt-auto">
                    <button id="downloadCSV" style="background-color: #00456F" class=" text-white px-6 py-3 rounded-lg transition duration-300 ease-in-out flex items-center gap-2">
                        <i class="fas fa-file-csv"></i> Download CSV
                    </button>
                    <button id="downloadXLSX" style="background-color: rgba(0, 164, 128, 1)" class=" text-white px-6 py-3 rounded-lg  transition duration-300 ease-in-out flex items-center gap-2">
                        <i class="fas fa-file-excel"></i> Download XLSX
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const summaryData = @json($summary ?? []);
        const colorMapping = @json($colors ?? []);
        const allEmailData = @json($data ?? []);

        const totalEmails = Object.values(summaryData).reduce((a, b) => a + b, 0);

        const chartLabels = Object.keys(summaryData);
        const chartValues = Object.values(summaryData);
        const chartBackgroundColors = chartLabels.map(label => colorMapping[label] || '#cccccc');

        const donutLabelEl = document.getElementById("donutLabel");
        const donutValueEl = document.getElementById("donutValue");

        const ctx = document.getElementById('myChartJsDonut');
        if (ctx) {
            const myDonutChart = new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: chartLabels.map(label => label.replace(/^[✅❌🔥👥⚠️📥🚫❓🟠📦]\s*/, '')),
                    datasets: [{
                        label: 'Email Status',
                        data: chartValues,
                        backgroundColor: chartBackgroundColors,
                        borderColor: '#ffffff', // Donut segment borders remain white for separation
                        borderWidth: 4,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '40%', // Retaining the thicker donut
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const originalLabel = chartLabels[context.dataIndex];
                                    const percentage = totalEmails > 0 ? ((context.parsed / totalEmails) * 100).toFixed(1) : 0;
                                    return `${originalLabel}: ${context.parsed.toLocaleString()} (${percentage}%)`;
                                }
                            },
                            title: function(context) {
                                return 'Email Count';
                            }
                        }
                    },
                     onClick: (event, elements) => {
                        if (elements.length > 0) {
                            const firstElement = elements[0];
                            const labelIndex = firstElement.index;
                            const labelText = chartLabels[labelIndex].replace(/^[✅❌🔥👥⚠️📥🚫❓🟠📦]\s*/, '');
                            const valueText = chartValues[labelIndex].toLocaleString();

                            if (donutLabelEl) donutLabelEl.innerText = labelText;
                            if (donutValueEl) donutValueEl.innerText = valueText;
                        }
                    }
                }
            });
        }

        document.querySelectorAll('li.clickable').forEach((item) => {
            item.addEventListener('click', () => {
                const labelText = item.querySelector('span:nth-child(2)').innerText.replace(':', '');
                const valueText = item.querySelector('span:nth-child(3)').innerText;

                if (donutLabelEl) donutLabelEl.innerText = labelText;
                if (donutValueEl) donutValueEl.innerText = valueText;
            });
        });

        function normalizeStatus(text) {
            if (!text) return "";
            return text.replace(/[\u{1F600}-\u{1F64F}\u{1F300}-\u{1F5FF}\u{1F680}-\u{1F6FF}\u{1F1E0}-\u{1F1FF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{FE0F}]/gu, '')
                         .replace(/\s+/g, '')
                         .toLowerCase()
                         .replace(/-/g, '');
        }

        function filterDataByCategory(category) {
            if (category === "all") return allEmailData;

            const categoryMap = {
                'safe': '✅ Safe',
                'rolebased': '👥 Role-based',
                'catchall': '🟠 Catch-All',
                'disposable': '🔥 Disposable',
                'inboxfull': '📥 Inbox Full',
                'spamtrap': '⚠️ Spam Trap',
                'disabled': '🚫 Disabled',
                'invalid': '❌ Invalid',
                'unknown': '❓ Unknown',
                'undeliverable': '🚫 Undeliverable',
            };

            const rawLabelToFilter = categoryMap[category];

            if (!rawLabelToFilter) return [];

            return allEmailData.filter(item => {
                return item.status === rawLabelToFilter;
            });
        }

        const downloadCSVButton = document.getElementById("downloadCSV");
        if (downloadCSVButton) {
            downloadCSVButton.addEventListener("click", () => {
                const selectedCategory = document.getElementById("categorySelect").value;
                const filteredEmails = filterDataByCategory(selectedCategory);

                if (!filteredEmails || filteredEmails.length === 0) {
                    alert("No data found for the category: " + selectedCategory);
                    return;
                }

                let csv = Object.keys(filteredEmails[0]).join(",") + "\n";
                filteredEmails.forEach(row => {
                    csv += Object.values(row).map(value => `"${String(value).replace(/"/g, '""')}"`).join(",") + "\n";
                });

                const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
                const url = URL.createObjectURL(blob);
                const link = document.createElement("a");
                link.setAttribute("href", url);
                link.setAttribute("download", `emails_${selectedCategory}.csv`);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        }

        const downloadXLSXButton = document.getElementById("downloadXLSX");
        if (downloadXLSXButton) {
            downloadXLSXButton.addEventListener("click", () => {
                const selectedCategory = document.getElementById("categorySelect").value;
                const filteredEmails = filterDataByCategory(selectedCategory);

                if (!filteredEmails || filteredEmails.length === 0) {
                    alert("No data found for the category: " + selectedCategory);
                    return;
                }

                const ws = XLSX.utils.json_to_sheet(filteredEmails);
                const wb = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(wb, ws, "FilteredEmails");
                XLSX.writeFile(wb, `emails_${selectedCategory}.xlsx`);
            });
        }
    </script>
<script src="https://cdn.tailwindcss.com"></script>


@endsection