@extends('layouts.app')

@section('content')
@livewire('livewire-toast')

<div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg> --}}
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="w-6 h-6" version="1.1" id="Layer_1" viewBox="0 0 511.893 511.893" xml:space="preserve">
                <g>
                    <g>
                        <g>
                            <path d="M331.04,202.667H164.107c-14.507,0-25.493,12.053-25.493,27.947v186.133c0,15.04,9.707,31.253,25.493,31.253H331.04     c15.36,0,31.573-16.107,31.573-31.253V230.613C362.613,214.827,345.653,202.667,331.04,202.667z M341.28,416.747     c0,3.307-6.827,9.92-10.24,9.92h-21.76v-64c0-5.867-4.8-10.667-10.667-10.667c-5.867,0-10.667,4.8-10.667,10.667v64h-32v-64     c0-5.867-4.8-10.667-10.667-10.667c-5.867,0-10.667,4.8-10.667,10.667v64H213.28v-64c0-5.867-4.8-10.667-10.667-10.667     c-5.867,0-10.667,4.8-10.667,10.667v64h-27.84c-0.96,0-4.16-4.267-4.16-9.92V230.613c0-0.32,0-6.613,4.16-6.613h27.84v53.333     c0,5.867,4.8,10.667,10.667,10.667c5.867,0,10.667-4.8,10.667-10.667V224h21.333v53.333c0,5.867,4.8,10.667,10.667,10.667     c5.867,0,10.667-4.8,10.667-10.667V224h32v53.333c0,5.867,4.8,10.667,10.667,10.667c5.867,0,10.667-4.8,10.667-10.667V224h21.76     c4.587,0,10.24,4.48,10.24,6.613V416.747z" style="&#10;"/>
                            <path  d="M445.707,77.867l-64-64.747C373.6,4.8,362.4,0,350.667,0H97.333C73.013,0,53.28,19.947,53.28,44.48v422.933     c0,24.533,19.733,44.48,44.053,44.48H414.56c24.32,0,44.053-19.947,44.053-44.48V109.227     C458.613,97.493,454.027,86.187,445.707,77.867z M437.28,467.52c0.107,12.693-10.027,23.04-22.72,23.147H97.333     c-12.693-0.107-22.827-10.56-22.72-23.147V44.48c-0.107-12.587,10.027-23.04,22.72-23.147h253.333c5.973,0,11.84,2.453,16,6.72     L430.56,92.8c4.267,4.373,6.72,10.347,6.72,16.427V467.52z"/>
                        </g>
                    </g>
                </g>
                </svg>
        </div>

        <div class="ml-4">
            <h2 class="font-semibold">{{$sims}} Sim</h2>
            {{-- <p class="mt-2 text-sm text-gray-500">Last opened 4 days ago</p> --}}
        </div>
    </div>

    <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>

        <div class="ml-4">
            <h2 class="font-semibold">{{$expired}} Sim sắp hết hạn</h2>
            {{-- <p class="mt-2 text-sm text-gray-500">Last checked 3 days ago</p> --}}
        </div>
    </div>
    <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-red-100 bg-red-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>

        <div class="ml-4">
            <h2 class="font-semibold">{{$requests}} yêu cầu</h2>
            <p class="mt-2 text-sm text-gray-500">Last authored 1 day ago</p>
        </div>
    </div>

</div>
<div class=" mt-5 bg-white">
    <div class="shadow-lg rounded-lg overflow-hidden w-full">
        <div class="py-3 px-5 bg-gray-50">Line chart</div>
        {{-- <canvas class="p-10" id="chartLine" class=" w-full"></canvas> --}}
        <div>
            <canvas id="chart-line" height="400"></canvas>
        </div>
    </div>
</div>
<div class="mt-5">
    <div class="flex">
        <div class=" w-1/2 pr-3">
            <livewire:daskboard-expired-sim>
        </div>
        <div class=" w-1/2 pl-3">
            <livewire:daskboard-requestest>

        </div>
    </div>
</div>
@endsection
@section('js')
    <!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart line -->
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
new Chart(ctx1, {
  type: "line",
  data: {
    // labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Doanh thu",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#5e72e4",
      backgroundColor: gradientStroke1,
      borderWidth: 3,
      fill: true,
      data: @json($revenue),
      maxBarThickness: 6

    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#fbfbfb',
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#ccc',
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
</script>
@endsection
