<?php echo $__env->make('theme::commons.asset_highcharts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box-header">
        <div class="p-4">
            <h1 class="text-h3"><?= $title ?></h1>
            <form class="form form-horizontal" action="" method="get">
                <div class="flex space-x-2">
                    <div class="">
                        <div class="form-group">
                            <select name="kuartal" id="kuartal" required class="form-control input-sm" title="Pilih salah satu">
                                <?php $__currentLoopData = kuartal2(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item['ke']); ?>" <?= ($item['ke'] == $kuartal) ? 'selected' : ''; ?>>
                                        Kuartal ke <?php echo e($item['ke']); ?>

                                        (<?php echo e($item['bulan']); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <select name="tahun" id="tahun" class="form-control input-sm" title="Pilih salah satu">
                                <?php $__currentLoopData = $dataTahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->tahun); ?>" <?= ($item->tahun == $tahun) ? 'selected' : ''; ?>><?php echo e($item->tahun); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <select name="id_posyandu" id="id_posyandu" class="form-control input-sm" title="Pilih salah satu">
                                <option value="">Semua</option>
                                <?php $__currentLoopData = $posyandu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?= ($item->id == $idPosyandu) ? 'selected' : ''; ?>>
                                        <?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-social btn-info btn-sm" id="cari">
                            <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="box-body text-sm py-2 space-y-4" id="stunting-list">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            const tahun = document.getElementById('tahun').value
            const kuartal = document.getElementById('kuartal').value
            const idPosyandu = document.getElementById('id_posyandu').value
            const widgetTemplate = `<?php echo $__env->make('theme::partials.kesehatan.widget_item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`
            const templateStunting = document.createElement('template')
            templateStunting.innerHTML = `<?php echo $__env->make('theme::partials.kesehatan.chart_stunting_umur', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`
            const stuntingUmurNode = templateStunting.content.firstElementChild
            const templatePosyandu = document.createElement('template')
            templatePosyandu.innerHTML = `<?php echo $__env->make('theme::partials.kesehatan.chart_stunting_posyandu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`
            const posyanduNode = templatePosyandu.content.firstElementChild
            const scorecardNode = document.createElement('div')
            const loadStunting = function(tahun, kuartal, idPosyandu) {
                const stuntingList = document.getElementById('stunting-list');
                $.ajax({
                    url: `<?php echo e(ci_route('internal_api.stunting')); ?>`,
                    data: {
                        'tahun': tahun,
                        'kuartal': kuartal,
                        'idPosyandu': idPosyandu
                    },
                    type: "GET",
                    beforeSend: function() {
                        stuntingList.innerHTML = `<?php echo $__env->make('theme::commons.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`
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
                                widgetTemplate.replace('@bg-color', element['bg-color'])
                                .replace('@icon', element.icon)
                                .replace('@title', element.title)
                                .replace('@total', element.total)

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
                const _url = `<?php echo e(ci_route('data-kesehatan.scorecard')); ?>`
                $.post(_url, {
                    scorecard: scorecard
                }, (html) => scorecardNode.innerHTML = html)
            }
            loadStunting(tahun, kuartal, idPosyandu)
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('theme::layouts.full-content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OpenSID\/storage/app/themes/esensi/resources/views/partials/kesehatan/index.blade.php ENDPATH**/ ?>