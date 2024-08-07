<script>
    /*
     * Created on Fri May 20 2022
     *
     * Devlan Solutions LTD - www.devlan.co.ke 
     *
     * hello@devlan.co.ke
     *
     *
     * The Devlan Solutions LTD End User License Agreement
     *
     * Copyright (c) 2022 Devlan Solutions LTD
     *
     * 1. GRANT OF LICENSE
     * Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
     * install and activate this system on two separated computers solely for your personal and non-commercial use,
     * unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
     * or allowing other individuals to view the contents of this Software, is in violation of this license.
     * You may not make the Software available on a network, or in any way provide the Software to multiple users
     * unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
     *
     * 2. COPYRIGHT 
     * The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
     * You may not remove or conceal any proprietary notices, labels or marks from the Software.
     *
     * 3. RESTRICTIONS ON USE
     * You may not, and you may not permit others to
     * (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
     * (b) modify, distribute, or create derivative works of the Software;
     * (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
     * otherwise exploit the Software.  
     *
     * 4. TERM
     * This License is effective until terminated. 
     * You may terminate it at any time by destroying the Software, together with all copies thereof.
     * This License will also terminate if you fail to comply with any term or condition of this Agreement.
     * Upon such termination, you agree to destroy the Software, together with all copies thereof.
     *
     * 5. NO OTHER WARRANTIES. 
     * DEVLAN SOLUTIONS LTD DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
     * DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
     * EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
     * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
     * SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
     * ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
     * INCIDENTAL OR CONSEQUENTIAL DAMAGES,
     * SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
     * THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
     * HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
     *
     * 6. SEVERABILITY
     * In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
     * affect the validity of the remaining portions of this license.
     *
     * 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD  OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
     * CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
     * USE OF THE SOFTWARE, EVEN IF DEVLAN HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
     * IN NO EVENT WILL DEVLAN  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
     * TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
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