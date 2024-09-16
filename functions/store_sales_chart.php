<script>
/*
 *   Crafted On Mon Sep 16 2024
 *   By the one and only Martin Mbithi (martin@devlan.co.ke)
 *   
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD Super Duper User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. LICENSE TO BE AWESOME
 *   Congrats, you lucky human! Devlan Solutions LTD hereby bestows upon you the magical,
 *   revocable, personal, non-exclusive, and totally non-transferable right to install this epic system
 *   on not one, but TWO separate computers for your personal, non-commercial shenanigans.
 *   Unless, of course, you've leveled up with a commercial license from Devlan Solutions LTD.
 *   Sharing this software with others or letting them even peek at it? Nope, that's a big no-no.
 *   And don't even think about putting this on a network or letting a crowd join the fun unless you
 *   first scored a multi-user license from us. Sharing is caring, but rules are rules!
 *
 *   2. COPYRIGHT POWER-UP
 *   This Software is the prized possession of Devlan Solutions LTD and is shielded by copyright law
 *   and the forces of international copyright treaties. You better not try to hide or mess with
 *   any of our awesome proprietary notices, labels, or marks. Respect the swag!
 *
 *
 *   3. RESTRICTIONS, NO CHEAT CODES ALLOWED
 *   You may not, and you shall not let anyone else:
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or do any sneaky stuff to
 *   figure out the source code of this software;
 *   (b) modify, remix, distribute, or create your own funky version of this masterpiece;
 *   (c) copy (except for that one precious backup), distribute, show off in public, transmit, sell, rent,
 *   lease, or otherwise exploit the Software like it's your own.
 *
 *
 *   4. THE ENDGAME
 *   This License lasts until one of us says 'Game Over'. You can call it quits anytime by
 *   destroying the Software and all the copies you made (no hiding them under your bed).
 *   If you break any of these sacred rules, this License self-destructs, and you must obliterate
 *   every copy of the Software, no questions asked.
 *
 *
 *   5. NO GUARANTEES, JUST PIXELS
 *   DEVLAN SOLUTIONS LTD doesn’t guarantee this Software is flawless—it might have a few
 *   quirks, but who doesn’t? DEVLAN SOLUTIONS LTD washes its hands of any other warranties,
 *   implied or otherwise. That means no promises of perfect performance, marketability, or
 *   non-infringement. Some places have different rules, so you might have extra rights, but don’t
 *   count on us for backup if things go sideways. Use at your own risk, brave adventurer!
 *
 *
 *   6. SEVERABILITY—KEEP THE GOOD STUFF
 *   If any part of this License gets tossed out by a judge, don’t worry—the rest of the agreement
 *   still stands like a boss. Just because one piece fails doesn’t mean the whole thing crumbles.
 *
 *
 *   7. NO DAMAGE, NO DRAMA
 *   Under no circumstances will Devlan Solutions LTD or its squad be held responsible for any wild,
 *   indirect, or accidental chaos that might come from using this software—even if we warned you!
 *   And if you ever think you’ve got a claim, the most you’re getting out of us is the license fee you
 *   paid—if any. No drama, no big payouts, just pixels and code.
 *
 */

    "use strict";
    ! function(NioApp, $) {
        var filledLineChart = {
            labels: [
                <?php
                $view = $_GET['view'];
                /* Fetch Todays Sales Only */
                $ret = "SELECT * FROM sales s
                INNER JOIN products p ON p.product_id = sale_product_id
                INNER JOIN users us ON us.user_id = s.sale_user_id
                WHERE DATE(s.sale_datetime)=CURDATE() AND p.product_store_id = '{$view}'
                ORDER BY sale_datetime ASC ";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                $cumulative_income = 0;
                while ($sales = $res->fetch_object()) {

                ?> "<?php echo date('g:ia', strtotime($sales->sale_datetime)); ?>",
                <?php } ?>
            ],
            dataUnit: "Ksh",
            lineTension: .4,
            datasets: [{
                label: "Total Received",
                color: "#798bff",
                background: NioApp.hexRGB("#798bff", .4),
                data: [
                    <?php
                    $ret = "SELECT * FROM sales s
                    INNER JOIN products p ON p.product_id = sale_product_id
                    INNER JOIN users us ON us.user_id = s.sale_user_id
                    WHERE DATE(s.sale_datetime)=CURDATE() AND p.product_store_id = '{$view}'
                    ORDER BY sale_datetime ASC ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    $cumulative_income = 0;
                    while ($sales = $res->fetch_object()) {

                        echo ($sales->sale_payment_amount) * ($sales->sale_quantity) . ',';
                    } ?>
                ]
            }]
        }

        function lineChart(selector, set_data) {
            var $selector = $(selector || ".line-chart");
            $selector.each(function() {
                for (var $self = $(this), _self_id = $self.attr("id"), _get_data = void 0 === set_data ? eval(_self_id) : set_data, selectCanvas = document.getElementById(_self_id).getContext("2d"), chart_data = [], i = 0; i < _get_data.datasets.length; i++) chart_data.push({
                    label: _get_data.datasets[i].label,
                    tension: _get_data.lineTension,
                    backgroundColor: _get_data.datasets[i].background,
                    borderWidth: 2,
                    borderColor: _get_data.datasets[i].color,
                    pointBorderColor: _get_data.datasets[i].color,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: _get_data.datasets[i].color,
                    pointBorderWidth: 2,
                    pointHoverRadius: 4,
                    pointHoverBorderWidth: 2,
                    pointRadius: 4,
                    pointHitRadius: 4,
                    data: _get_data.datasets[i].data
                });
                var chart = new Chart(selectCanvas, {
                    type: "line",
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: !!_get_data.legend && _get_data.legend,
                            labels: {
                                boxWidth: 12,
                                padding: 20,
                                fontColor: "#6783b8"
                            }
                        },
                        maintainAspectRatio: !1,
                        tooltips: {
                            enabled: !0,
                            callbacks: {
                                title: function(a, t) {
                                    return t.labels[a[0].index]
                                },
                                label: function(a, t) {
                                    return t.datasets[a.datasetIndex].data[a.index] + " " + _get_data.dataUnit
                                }
                            },
                            backgroundColor: "#eff6ff",
                            titleFontSize: 13,
                            titleFontColor: "#6783b8",
                            titleMarginBottom: 6,
                            bodyFontColor: "#9eaecf",
                            bodyFontSize: 12,
                            bodySpacing: 4,
                            yPadding: 10,
                            xPadding: 10,
                            footerMarginTop: 0,
                            displayColors: !1
                        },
                        scales: {
                            yAxes: [{
                                display: !0,
                                ticks: {
                                    beginAtZero: !1,
                                    fontSize: 12,
                                    fontColor: "#9eaecf",
                                    padding: 10
                                },
                                gridLines: {
                                    color: "#e5ecf8",
                                    tickMarkLength: 0,
                                    zeroLineColor: "#e5ecf8"
                                }
                            }],
                            xAxes: [{
                                display: !0,
                                ticks: {
                                    fontSize: 12,
                                    fontColor: "#9eaecf",
                                    source: "auto",
                                    padding: 5
                                },
                                gridLines: {
                                    color: "transparent",
                                    tickMarkLength: 10,
                                    zeroLineColor: "#e5ecf8",
                                    offsetGridLines: !0
                                }
                            }]
                        }
                    }
                })
            })
        }
        lineChart();
    }(NioApp, jQuery);
</script>