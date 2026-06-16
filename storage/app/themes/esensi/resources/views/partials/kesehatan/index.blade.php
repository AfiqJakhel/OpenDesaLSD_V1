@extends('theme::layouts.full-content')
@include('theme::commons.asset_highcharts')
@section('content')
    <!-- Header Section -->
    <section class="relative bg-[#0D2247] text-white overflow-hidden" style="min-height: 280px;">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=1600&q=80'); background-size: cover; background-position: center;"></div>
        <div class="container mx-auto px-4 max-w-7xl py-16 relative z-10">
            <nav class="text-white/60 text-sm mb-6 font-jakarta flex items-center gap-2">
                <a href="{{ site_url('/') }}" class="hover:text-white transition">Beranda</a>
                <i class="fas fa-chevron-right text-[9px]"></i>
                <span class="text-white font-semibold">Data Desa</span>
            </nav>
            <span class="text-amber-400 font-bold tracking-[0.2em] text-xs uppercase font-jakarta">Kesehatan</span>
            <h1 class="font-jakarta font-extrabold text-4xl md:text-5xl mt-3 mb-4">{{ $title }}</h1>
            <p class="text-white/70 max-w-xl font-jakarta">Pemantauan data perkembangan kesehatan balita dan pencegahan stunting secara berkala.</p>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full" style="display:block">
                <path d="M0 50 L0 25 Q360 0 720 25 Q1080 50 1440 25 L1440 50 Z" fill="#f9fafb"/>
            </svg>
        </div>
    </section>

    <!-- Filter Section -->
    <div class="bg-gray-50 min-h-screen pt-8 pb-16">
        <section class="relative z-20 container mx-auto px-4 max-w-7xl mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
            <form action="" method="get" class="flex flex-col md:flex-row items-center gap-4">
                <div class="w-full md:w-1/3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Kuartal</label>
                    <select name="kuartal" id="kuartal" required class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-primary focus:border-primary block p-3">
                        @foreach (kuartal2() as $item)
                            <option value="{{ $item['ke'] }}" @selected($item['ke'] == $kuartal)>
                                Kuartal ke {{ $item['ke'] }} ({{ $item['bulan'] }})
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="w-full md:w-1/4">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Tahun</label>
                    <select name="tahun" id="tahun" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-primary focus:border-primary block p-3">
                        @foreach ($dataTahun as $item)
                            <option value="{{ $item->tahun }}" @selected($item->tahun == $tahun)>{{ $item->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="w-full md:w-1/3">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Posyandu</label>
                    <select name="id_posyandu" id="id_posyandu" class="w-full bg-gray-50 border border-gray-200 text-gray-800 text-sm rounded-xl focus:ring-primary focus:border-primary block p-3">
                        <option value="">Semua Posyandu</option>
                        @foreach ($posyandu as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $idPosyandu)>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="w-full md:w-auto md:mt-6">
                    <button type="submit" id="cari" class="w-full md:w-auto bg-[#0D2247] hover:bg-[#1a3a6e] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-lg hover:shadow-xl transition-all active:scale-95 flex items-center justify-center gap-2">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </section>

        <!-- Data Section -->
        <section class="container mx-auto px-4 max-w-7xl pb-8">
            <div id="stunting-list" class="space-y-8">
                <!-- Loading or Data will be injected here via AJAX -->
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const tahun = document.getElementById('tahun').value
            const kuartal = document.getElementById('kuartal').value
            const idPosyandu = document.getElementById('id_posyandu').value
            const widgetTemplate = `@include('theme::partials.kesehatan.widget_item')`
            const templateStunting = document.createElement('template')
            templateStunting.innerHTML = `@include('theme::partials.kesehatan.chart_stunting_umur')`
            const stuntingUmurNode = templateStunting.content.firstElementChild
            const templatePosyandu = document.createElement('template')
            templatePosyandu.innerHTML = `@include('theme::partials.kesehatan.chart_stunting_posyandu')`
            const posyanduNode = templatePosyandu.content.firstElementChild
            const scorecardNode = document.createElement('div')
            const loadStunting = function(tahun, kuartal, idPosyandu) {
                const stuntingList = document.getElementById('stunting-list');
                $.ajax({
                    url: `{{ ci_route('internal_api.stunting') }}`,
                    data: {
                        'tahun': tahun,
                        'kuartal': kuartal,
                        'idPosyandu': idPosyandu
                    },
                    type: "GET",
                    beforeSend: function() {
                        stuntingList.innerHTML = `@include('theme::commons.loading')`
                    },
                    dataType: 'json',
                    data: {

                    },
                    success: function(data) {
                        stuntingList.innerHTML = ''
                        const widgets = data.data[0]['attributes']['widgets']
                        const chartStuntingUmurData = data.data[0]['attributes']['chartStuntingUmurData']
                        const chartStuntingPosyanduData = data.data[0]['attributes']['chartStuntingPosyanduData']
                        const scorecard = data.data[0]['attributes']['scorecard']
                        const widgetList = document.createElement('div')
                        widgetList.className = `grid grid-cols-1 lg:grid-cols-3 gap-5 container px-3 lg:px-5`
                        stuntingList.appendChild(widgetList)
                        stuntingList.appendChild(stuntingUmurNode)
                        stuntingList.appendChild(posyanduNode)
                        stuntingList.appendChild(scorecardNode)
                        widgets.forEach(element => {
                            widgetList.innerHTML +=
                                widgetTemplate.replace('@@bg-color', element['bg-color'])
                                .replace('@@icon', element.icon)
                                .replace('@@title', element.title)
                                .replace('@@total', element.total)

                        });

                        generateChart(chartStuntingUmurData)
                        generatePosyandu(chartStuntingPosyanduData)
                        generateScorecard(scorecard)
                    }
                });
            }

            const generateChart = function(chartStuntingUmurData) {
                chartStuntingUmurData.forEach(function(item) {
                    Highcharts.chart(item['id'], {
                        chart: {
                            type: 'pie'
                        },
                        title: {
                            text: item['title']
                        },
                        tooltip: {
                            valueSuffix: '%'
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                colors: ['blue', 'red'],
                                showInLegend: true,
                            },
                            pie: {
                                dataLabels: {
                                    enabled: true,
                                    distance: -50,
                                    format: '{point.y:,.1f} %'
                                }
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'percentage',
                            colorByPoint: true,
                            data: item['data']
                        }]

                    })
                })
            }

            const generatePosyandu = function(chartStuntingPosyanduData) {
                Highcharts.chart('chart_posyandu', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafik Kasus Stunting per-Posyandu'
                    },
                    xAxis: {
                        categories: chartStuntingPosyanduData['categories']
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Angka Kasus Stunting'
                        }
                    },
                    colors: ['#028EFA', '#5EE497', '#FDB13B'],
                    series: chartStuntingPosyanduData['data']

                })
            }
            const generateScorecard = function(scorecard) {
                const _url = `{{ ci_route('data-kesehatan.scorecard') }}`
                $.post(_url, {
                    scorecard: scorecard
                }, (html) => scorecardNode.innerHTML = html)
            }
            loadStunting(tahun, kuartal, idPosyandu)
        });
    </script>
@endpush
