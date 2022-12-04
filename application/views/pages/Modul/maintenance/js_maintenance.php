<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js" integrity="sha512-rDbVu5s98lzXZsmJoMa0DjHNE+RwPJACogUCLyq3Xxm2kJO6qsQwjbE5NDk2DqmlKcxDirCnU1wAzVLe12IM3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.min.js" integrity="sha512-BDZ+kFMtxV2ljEa7OWUu0wuay/PAsJ2yeRsBegaSgdUhqIno33xmD9v3m+a2M3Bdn5xbtJtsJ9sSULmNBjCgYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function printPDF() {
        // e.preventDefault();

        function fetchImage(uri) {
            return new Promise(function (resolve, reject) {
                const image = new window.Image();
                image.onload = function () {
                    var canvas = document.createElement('canvas');
                    canvas.width = this.naturalWidth;
                    canvas.height = this.naturalHeight;
                    canvas.getContext('2d').drawImage(this, 0, 0);
                    resolve(canvas.toDataURL('image/png'));
                };
                image.onerror = function (params) {
                    reject(new Error('Cannot fetch image ' + uri + '.'));
                };
                image.src = uri;
            });
        }

        pdfMake.fonts = {
            Arial: {
                normal: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arial.ttf',
                bold: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arialbd.ttf',
                italic: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/ariali.ttf',
                bolditalics: '<?php echo base_url(); ?>/assets/universal/assets/fonts/arial/arialbi.ttf'
            }
        };
        const docDefinition = {
            pageOrientation: 'landscape',
            content: [
                {
                    columns: [
                        {width: '*',alignment: 'right', columns: [{image: '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>', height: 40, width: 167}]},
                    ]
                },
                {text: 'Laporan Kerusakan', style: 'title'},
                // {text: 'As of 21-Apr-2022', style: 'sub_title'},
                {
                    margin: [10, 20, 10, 10],
                    table: {
                        headerRows: 1,
                        widths: ['auto', 80,80,'auto', 'auto', 'auto', 'auto'],
                        body: [
                            [
                                {
                                    text: '#',
                                    style: 'table_header',
                                    border: [true, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'No Laporan',
                                    style: 'table_header',
                                    border: [false, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'Tanggal',
                                    style: 'table_header',
                                    border: [false, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'Sarfas',
                                    style: 'table_header',
                                    border: [false, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'Laporan Kerusakan',
                                    style: 'table_header',
                                    border: [false, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'Prioritas',
                                    style: 'table_header',
                                    border: [false, true, false, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                },
                                {
                                    text: 'Status',
                                    style: 'table_header',
                                    border: [false, true, true, false],
                                    borderColor: ['grey', 'grey', 'grey', 'grey'],
                                    fillColor: '#000090',
                                    color: 'white'
                                }
                            ],
<?php $no=1; foreach ($laporan_all['data'] as $i => $l) {
    
    $borderLeft =  '[true, false, false, true]';
    $borderMid =  '[false, false, false, true]';
    $borderRight =  '[false, false, true, true]';
    ?>
                                [
                                        {
                                            text: '<?php echo $no;?>',
                                            style: 'table_content',
                                            border: <?php echo $borderLeft; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: '<?php echo $l['no_laporan']; ?>',
                                            style: 'table_content',
                                            border: <?php echo $borderMid; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: '<?php echo date_format(date_create($l['tgl']),"d M Y"); ?>',
                                            style: 'table_content',
                                            border: <?php echo $borderMid; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: '<?php echo $l['kode'].' - '.$l['type'];?>',
                                            style: 'table_content',
                                            border: <?php echo $borderMid; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: "<?php echo preg_replace("/\n/m", '\n', $l['laporan_kerusakan']); ?>",
                                            style: 'table_content',
                                            border: <?php echo $borderMid; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: '<?php echo $l['priority']; ?>',
                                            style: 'table_content',
                                            border: <?php echo $borderMid; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey'],
                                        },
                                        {
                                            text: '<?php echo $l['status_laporan']; ?>',
                                            style: 'table_content',
                                            alignment: 'right',
                                            border: <?php echo $borderRight; ?>,
                                            borderColor: ['grey', 'grey', 'grey', 'grey']
                                        }
                                ],
<?php $no++;} ?>
                        ]
                    }
                },
                // {text: 'Batam, 24 Apr 2022', fontSize: 12, margin: [15, 20, 10, 20]},
                // {text: '', fontSize: 14, margin: [15, 20, 10, 20]},
                // {text: 'Muslim Ansori', fontSize: 12, margin: [15, 20, 10, 5]},
                // {text: 'NIP. 2018071154', fontSize: 12, margin: [15, 0, 10, 5]},
            ],

            images: {
                '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>': null,
                '<?php echo base_url('assets/pertamina/Logo-panjang.png'); ?>': null
            },

            styles: {
                title: {
                    fontSize: 20,
                    bold: true,
                    alignment: 'center',
                    margin: [0, 5, 0, 5]
                },
                sub_title: {
                    fontSize: 12,
                    alignment: 'center'
                },
                sub_header: {
                    fontSize: 12
                },
                label_sub: {
                    bold: true,
                    margin: [15, 0, 15, 7]
                },
                table_header: {
                    bold: true,
                    alignment: 'center',
                    margin: [10, 10, 10, 10]

                },
                money_format: {
                    alignment: 'right',
                    bold: true,
                    margin: [10, 5, 10, 5]
                },
                table_content: {
                    fontSize: 10,
                    margin: [10, 5, 10, 5]
                },
                footer_table: {
                    fontSize: 10,
                    margin: [5, 10, 5, 5]
                }
            },
            defaultStyle: {
                font: 'Arial'
            }
        };

        const fetches = [];
        Object.keys(docDefinition.images).forEach(src => {
            fetches.push(fetchImage(src).then(data => {
                docDefinition.images[src] = data;
            }));
        });

        Promise.all(fetches).then(() => {
            // var win = window.open('', '_blank');
            // pdfMake.createPdf(docDefinition).open({}, win);
            pdfMake.createPdf(docDefinition).open({}, window)
            
            // pdfMake.createPdf(docDefinition).open();
        });

//        pdfMake.createPdf(docDefinition).open();
    }
</script>