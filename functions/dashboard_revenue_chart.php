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


    <?php
    $cumulative_income_cash = 0;
    $cumulative_income_mobile = 0;
    $cumulative_income_credit = 0;
    $cumulative_paid_credit = 0;
    $cumulative_unpaid_credit = 0;
    $cumulative_overdue_credit = 0;

    // Query to get total amount sold for Cash payments
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_cash
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Cash'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($cash = $res->fetch_object()) {
        $cumulative_income_cash = $cash->total_cash;
    }

    // Query to get total amount sold for Mobile Payment payments
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_mobile
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Mobile Payment'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($mobile = $res->fetch_object()) {
        $cumulative_income_mobile = $mobile->total_mobile;
    }

    // Query to get total amount sold for Credit payments
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_credit
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Credit'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($credit = $res->fetch_object()) {
        $cumulative_income_credit = $credit->total_credit;
    }

    // Query to compute Paid Credit Purchases
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_credit_paid
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Credit' AND s.sale_payment_status = 'Paid'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($credit = $res->fetch_object()) {
        $cumulative_paid_credit = $credit->total_credit_paid;
    }

    // Query to compute Unpaid Credit Purchases
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_credit_unpaid
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Credit' AND s.sale_payment_status = 'Unpaid'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($credit = $res->fetch_object()) {
        $cumulative_unpaid_credit = $credit->total_credit_unpaid;
    }

    // Query to compute Overdue Credit Purchases
    $ret = "SELECT SUM(s.sale_payment_amount * s.sale_quantity) AS total_credit_overdue
    FROM sales s
    INNER JOIN products p ON p.product_id = sale_product_id
    INNER JOIN users us ON us.user_id = s.sale_user_id
    WHERE DATE(s.sale_datetime) = CURDATE() AND s.sale_payment_method = 'Credit' AND s.sale_payment_status = 'Unpaid' AND s.sale_credit_expected_date < CURDATE()";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($credit = $res->fetch_object()) {
        $cumulative_overdue_credit = $credit->total_credit_overdue;
    }
    ?>

        "use strict";
    ! function(NioApp, $) {
        var barChartMultiple = {
            labels: ["Cash", "Mobile Payments", "Credit Purchase"],
            dataUnit: "Ksh",
            datasets: [{
                label: "Revenue Per Payment Method",
                color: "#9cabff",
                data: [<?php echo $cumulative_income_cash; ?>, <?php echo $cumulative_income_mobile; ?>, <?php echo $cumulative_income_credit; ?>]
            }]
        }

        function barChart(selector, set_data) {
            var $selector = $(selector || ".bar-chart");
            $selector.each(function() {
                for (var $self = $(this), _self_id = $self.attr("id"), _get_data = void 0 === set_data ? eval(_self_id) : set_data, _d_legend = void 0 !== _get_data.legend && _get_data.legend, selectCanvas = document.getElementById(_self_id).getContext("2d"), chart_data = [], i = 0; i < _get_data.datasets.length; i++) chart_data.push({
                    label: _get_data.datasets[i].label,
                    data: _get_data.datasets[i].data,
                    backgroundColor: _get_data.datasets[i].color,
                    borderWidth: 2,
                    borderColor: "transparent",
                    hoverBorderColor: "transparent",
                    borderSkipped: "bottom",
                    barPercentage: .6,
                    categoryPercentage: .7
                });
                var chart = new Chart(selectCanvas, {
                    type: "bar",
                    data: {
                        labels: _get_data.labels,
                        datasets: chart_data
                    },
                    options: {
                        legend: {
                            display: !!_get_data.legend && _get_data.legend,
                            labels: {
                                boxWidth: 30,
                                padding: 20,
                                fontColor: "#6783b8"
                            }
                        },
                        maintainAspectRatio: !1,
                        tooltips: {
                            enabled: !0,
                            callbacks: {
                                title: function(a, t) {
                                    return t.datasets[a[0].datasetIndex].label
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
                                stacked: !!_get_data.stacked && _get_data.stacked,
                                ticks: {
                                    beginAtZero: !0,
                                    fontSize: 12,
                                    fontColor: "#9eaecf"
                                },
                                gridLines: {
                                    color: "#e5ecf8",
                                    tickMarkLength: 0,
                                    zeroLineColor: "#e5ecf8"
                                }
                            }],
                            xAxes: [{
                                display: !0,
                                stacked: !!_get_data.stacked && _get_data.stacked,
                                ticks: {
                                    fontSize: 12,
                                    fontColor: "#9eaecf",
                                    source: "auto"
                                },
                                gridLines: {
                                    color: "transparent",
                                    tickMarkLength: 10,
                                    zeroLineColor: "transparent"
                                }
                            }]
                        }
                    }
                })
            })
        }
        barChart();

        var pieChartData = {
            labels: ["Unpaid", "Paid", "Overdue"],
            dataUnit: "Ksh",
            legend: !1,
            datasets: [{
                borderColor: "#fff",
                background: ["#ffcc00", "#339900", "#cc3300"],
                data: [<?php echo $cumulative_unpaid_credit; ?>, <?php echo $cumulative_paid_credit; ?>, <?php echo $cumulative_overdue_credit; ?>]
            }]
        };

        function pieChart(selector, set_data) {
            var $selector = $(selector || ".pie-chart");
            $selector.each(function() {
                for (var $self = $(this), _self_id = $self.attr("id"), _get_data = void 0 === set_data ? eval(_self_id) : set_data, selectCanvas = document.getElementById(_self_id).getContext("2d"), chart_data = [], i = 0; i < _get_data.datasets.length; i++) chart_data.push({
                    backgroundColor: _get_data.datasets[i].background,
                    borderWidth: 2,
                    borderColor: _get_data.datasets[i].borderColor,
                    hoverBorderColor: _get_data.datasets[i].borderColor,
                    data: _get_data.datasets[i].data
                });
                var chart = new Chart(selectCanvas, {
                    type: "pie",
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
                        rotation: -.2,
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
                        }
                    }
                })
            })
        }
        pieChart();
        var doughnutChartData = {
            labels: ["Send", "Receive", "Withdraw"],
            dataUnit: "BTC",
            legend: !1,
            datasets: [{
                borderColor: "#fff",
                background: ["#9cabff", "#f4aaa4", "#8feac5"],
                data: [110, 80, 125]
            }]
        };

        function doughnutChart(selector, set_data) {
            var $selector = $(selector || ".doughnut-chart");
            $selector.each(function() {
                for (var $self = $(this), _self_id = $self.attr("id"), _get_data = void 0 === set_data ? eval(_self_id) : set_data, selectCanvas = document.getElementById(_self_id).getContext("2d"), chart_data = [], i = 0; i < _get_data.datasets.length; i++) chart_data.push({
                    backgroundColor: _get_data.datasets[i].background,
                    borderWidth: 2,
                    borderColor: _get_data.datasets[i].borderColor,
                    hoverBorderColor: _get_data.datasets[i].borderColor,
                    data: _get_data.datasets[i].data
                });
                var chart = new Chart(selectCanvas, {
                    type: "doughnut",
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
                        rotation: 1,
                        cutoutPercentage: 40,
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
                        }
                    }
                })
            })
        }
        doughnutChart();
    }(NioApp, jQuery);
</script>