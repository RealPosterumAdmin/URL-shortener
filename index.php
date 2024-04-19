<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	$_SESSION['msg'] = "Вход необходим в целях безопасности.";
	header('Location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <title>Cократитель ссылок</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

        <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.css" rel="stylesheet">
    </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom topnav-navbar">
                        <div class="container-fluid">

                            <!-- LOGO -->
                            <a href="" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="16">
                                </span>
                                <span class="topnav-logo-sm">
                                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                                </span>
                            </a>
                            <ul class="list-unstyled topbar-menu float-end mb-0">

                                <li class="notification-list">
                                    <a class="nav-link end-bar-toggle" href="php/main.php?logout">
                                        <i class="dripicons-power noti-icon"></i>
                                    </a>
                                </li>
                            </ul>

						 </div>
					 </div>
					 <!-- end Topbar -->

                    <br>

                    <div class="content-page">
                        <div class="content">
                        <!-- Start Content-->
                            <div class="container-fluid">
<!--                    -----СОЗДАТЬ URL-----    -->
                                <div class="row for-tabs" id="send">
                                    <div class="card col-12">

                                        <div class="page-title-box">
                                            <h4 class="page-title">Создать URL</h4>
                                        </div>

                                        <div class="mb-3">
                                            <label for="url_name" class="form-label">Введите названия</label>
                                            <input type="text" id="url_name" class="form-control" placeholder="Напримар: ИИ курс для ВКонтакт">
                                        </div>
                                        <div class="page-title-box">
                                            <h5 id="text_for_url">Введите адрес сайта</h5>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="create_url" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
                                            <label for="floatingInput">Например: https://youtu.be</label>
                                            <br>
                                            <button onclick="sendUrl()" type="button" class="btn btn-primary rounded-pill pull-right">Создать</button>
                                        </div>
                                        <div id="short_url" class="mb-3" style="display:none;">
                                            <label  class="form-label">ГОТОВА <b id="labelTextToCopy"></b></label>
                                            <div class="input-group">
                                                <input id="textToCopy" type="text" class="form-control" aria-label="Recipient's username" readonly>
                                                <button id="copyButton" class="btn btn-dark" type="button">Копировать текст</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-12">
                                        <table id="urls_table" class="table table-striped table-centered mb-0">
                                            <thead>
                                            <tr>
                                                <th>Названия</th>
                                                <th>Оригинальный URL</th>
                                                <th>Короткий URL</th>
                                                <th>Переходи</th>
                                                <th>Создань</th>
                                                <th>Контроль</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="fullWidthModalLabel">Результаты</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="row">
                                                        <div class="mb-3 col-sm-6">
                                                            <label class="form-label">Дата начало</label>
                                                            <input id="chart_start" type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-00-00 00:00:00" maxlength="19">
                                                            <span class="font-13 text-muted"><b>От</b> ГГГГ-ММ-ДД ЧЧ:ММ:СС</span>
                                                        </div>
                                                        <div class="mb-3 col-sm-6">
                                                            <label class="form-label">Дата окончания</label>
                                                            <input id="chart_end" type="text" class="form-control" data-toggle="input-mask" data-mask-format="0000-00-00 00:00:00" maxlength="19">
                                                            <span class="font-13 text-muted"><b>До</b> ГГГГ-ММ-ДД ЧЧ:ММ:СС</span>
                                                        </div>
                                                        <div class="mb-3 col-sm-6">
                                                            <select id="chart_interval" class="form-select mb-3">
                                                                <option value="day" selected>Интервал: День</option>
                                                                <option value="hour">Час</option>
                                                                <option value="week">Неделя</option>
                                                                <option value="month">Mесяц</option>
                                                                <option value="year">Год</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-sm-6">
                                                            <button onclick="restartDiagram()" type="button" class="btn btn-primary">Показать</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <canvas id="myChart" width="400" height="200"></canvas>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Закрить</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- plugin js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
        <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/date-1.5.2/r-3.0.2/sc-2.4.1/sb-1.7.1/sr-1.4.1/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var domain = "https://" + window.location.hostname + "/";
            console.log(domain);
            var click_times = [];
            var this_diagram_name = "";
            var myChart = new Chart($('#myChart'), {
                type: 'line'
            });
            var all_url_table = $('#urls_table').DataTable({
                columns: [
                    {data: 'url_name'},
                    {data: 'full_url'},
                    {data: 'short_url',
                        render: function (data, type, row){
                        return '<td>'+ domain + row.short_url + '</td>'
                        }
                    },
                    {data: 'click_count'},
                    {data: 'created_at', visible: false},
                    {data: null,
                        render: function(data, type, row) {
                            return '<td class="table-action">' + '<a onclick="showDiagram(\'' + row.id + '\', \'' + row.url_name + '\')" class="action-icon" data-bs-toggle="modal" data-bs-target="#full-width-modal">' + '<i class="uil uil-chart-line"></i></a>' + '<a onclick="deleteUrl(\'' + row.id + '\', \'' + row.url_name + '\', \'' + row.full_url + '\')" class="action-icon"> <i class="mdi mdi-delete"></i></a>' + '</td>';
                        }
                    }
                ],
                order: [
                    [4, 'desc']
                ],
                language: {
                    processing: "Подождите...",
                    search: "Поиск:",
                    lengthMenu: "Показать _MENU_ записей",
                    info: "Показано с _START_ по _END_ из _TOTAL_ записей",
                    infoEmpty: "Показано с 0 по 0 из 0 записей",
                    infoFiltered: "(отфильтровано из _MAX_ записей)",
                    infoPostFix: "",
                    loadingRecords: "Загрузка записей...",
                    zeroRecords: "Ничего не найдено",
                    emptyTable: "Данные отсутствуют",
                    paginate: {
                        first: "Первая",
                        previous: "Предыдущая",
                        next: "Следующая",
                        last: "Последняя"
                    },
                    aria: {
                        sortAscending: ": активировать для сортировки столбца по возрастанию",
                        sortDescending: ": активировать для сортировки столбца по убыванию"
                    },
                    buttons: {
                        reload: "Обновить" // Изменение текста кнопки "Reload" на "Restart"
                    }
                }
            });

            function change_body(evt, cityName) {
                $('.for-tabs').hide();
                $('#' + cityName).show();
                $('.tablink').removeClass('active');
                $(evt.currentTarget).addClass('active');
            }

            function sendUrl() {
                var url = $('#create_url').val();
                if (checkUrl(url))
                {
                    new_url_adress = $('#create_url').val();
                    new_url_name = $('#url_name').val();
                    if (confirm("Все правильно? \n Названия:  " + new_url_name + "   ||   URL:  " + new_url_adress)) {
                        $.ajax({
                            url: 'php/main.php',
                            method: 'POST',
                            data: {
                                create_url: new_url_adress,
                                url_name: new_url_name
                            },
                            dataType: 'json',
                            success: function (responseData) {
                                console.log("Успешный ответ сервера: ", responseData);
                                $('#text_for_url').text('Введите адрес сайта');
                                $('#url_name').val('');
                                $('#create_url').val('');

                                $('#short_url').css('display', 'block');
                                $('#textToCopy').val(responseData[0]);
                                $('#labelTextToCopy').text(responseData[1]);
                                get_urls();

                                var elem = $('#short_url');
                                var signal = setInterval(function() {
                                    elem.css('visibility', elem.css('visibility') == 'hidden' ? '' : 'hidden');}, 200);
                                setTimeout(function() { clearInterval(signal); }, 800);
                            },
                            error: function (xhr, status, error) {
                                console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                            }
                        });
                    }
                } else {
                    $('#text_for_url').text("Этот URL-адрес не работает, пожалуйста, проверьте");
                    var elem = $('#text_for_url');
                    var signal = setInterval(function() {
                        elem.css('visibility', elem.css('visibility') == 'hidden' ? '' : 'hidden');}, 200);
                    setTimeout(function() { clearInterval(signal); }, 1200);
                }
            }

            function checkUrl(text) {
                try {
                    new URL(text);
                    return true;
                } catch (err) {
                    return false;
                }
            }

            function get_urls() {
                $.ajax({
                    url: 'php/main.php',
                    method: 'GET',
                    data: {
                        get_all_urls: true },
                    dataType: 'json',
                    success: function(responseData) {
                        all_url_table.clear().draw();
                        all_url_table.rows.add(responseData);
                        all_url_table.columns.adjust().draw();
                    },
                    error: function(xhr, status, error) {
                        console.error("Ошибка при выполнении AJAX запроса: ", status, error);
                    }
                });
            }

            function showDiagram(id, name) {
                this_diagram_name = name;

                $.ajax({
                    url: 'php/main.php',
                    method: 'POST',
                    data: { get_click_times: id },
                    dataType: 'json',
                    success: function(responseData) {

                        if (responseData && responseData.length > 0) {
                            click_times = responseData;
                            let data = createData(responseData, '0', '0', 'day');

                            if (data && data.length === 2) {

                                drawChart(data[0], data[1]);
                            } else {
                                console.error("Ошибка: Неверный формат данных для графика");
                            }
                        } else {
                            console.error("Ошибка: Пустой ответ сервера или отсутствие данных");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Ошибка при выполнении AJAX запроса:", status, error);
                    }
                });
            }

            function drawChart(times, count) {
                console.log("drawChart:  " + times + count);
                myChart.data = {
                    labels: times,
                    datasets: [{
                        data: count,
                        label: this_diagram_name,
                        borderColor: "#3e95cd",
                        pointStyle: false,
                        fill: true,
                        borderWidth: 1
                    }]
                }
                myChart.update();
            };

            function restartDiagram(){
                start = $('#chart_start').val();
                end = $('#chart_end').val();
                interval = $('#chart_interval').val();
                if (start === ""){
                    start = "0";
                }
                if (end === ""){
                    end = "0";
                }
                data = createData(click_times, start, end, interval);
                // drawChart(data[0], data[1]);
                myChart.data = {
                    labels: data[0],
                    datasets: [{
                        data: data[1],
                        label: this_diagram_name,
                        borderColor: "#3e95cd",
                        pointStyle: false,
                        fill: true,
                        borderWidth: 1
                    }]
                }
                myChart.update();
            }

            function deleteUrl(id, name, url){
                if (confirm("ВНИМАНИЕ !!! Удаленный URL-адрес невозможно восстановить. \n  Названия:  " + name + "   ||   URL:  " + url + "\nВы хотите удалить?")) {
                    $.ajax({
                        url: 'php/main.php',
                        method: 'POST',
                        data: { delete_url: id }, // Исправлено на get_click_times
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            console.error("Ошибка при выполнении AJAX запроса:", status, error);
                        }
                    });
                    alert(name + " удалено");
                    get_urls();
                }
            }

            function createData(array, startDate, endDate, interval) {
                array.sort((a, b) => new Date(a) - new Date(b));
                let currentDate = startDate === '0' ? new Date(array[0]) : new Date(startDate);
                const finalDate = endDate === '0' ? new Date(array[array.length - 1]) : new Date(endDate);
                let result = [
                    [],
                    []
                ];
                while (currentDate <= finalDate) {
                    let count = 0;
                    let nextDate = new Date(currentDate);
                    if (interval === 'hour') {
                        nextDate.setHours(nextDate.getHours() + 1);
                    } else if (interval === 'day') {
                        nextDate.setDate(nextDate.getDate() + 1);
                    } else if (interval === 'week') {
                        nextDate.setDate(nextDate.getDate() + 7);
                    } else if (interval === 'month') {
                        nextDate.setMonth(nextDate.getMonth() + 1);
                    } else if (interval === 'year') {
                        nextDate.setFullYear(nextDate.getFullYear() + 1);
                    }
                    let formattedDate = '';
                    if (interval === 'hour') {
                        formattedDate = `${getMonthAbbreviation(currentDate.getMonth())} ${currentDate.getDate().toString().padStart(2, '0')} ${currentDate.getHours().toString().padStart(2, '0') + ":00"}`;
                    } else if (interval === 'day') {
                        formattedDate = `${currentDate.getFullYear()} ${getMonthAbbreviation(currentDate.getMonth())} ${currentDate.getDate().toString().padStart(2, '0')}`;
                    } else if (interval === 'week') {
                        formattedDate = `${currentDate.getFullYear()} ${getMonthAbbreviation(currentDate.getMonth())} ${currentDate.getDate().toString().padStart(2, '0')}`;
                    } else if (interval === 'month') {
                        formattedDate = `${currentDate.getFullYear()} ${getMonthAbbreviation(currentDate.getMonth())}`;
                    } else if (interval === 'year') {
                        formattedDate = `${currentDate.getFullYear()}`;
                    }
                    for (let date of array) {
                        let currentDateObj = new Date(date);
                        if (currentDateObj >= currentDate && currentDateObj < nextDate) {
                            count++;
                        }
                    }
                    result[0].push(formattedDate);
                    result[1].push(count);
                    currentDate = nextDate;
                }
                return result;
            }
            function getMonthAbbreviation(month) {
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                return months[month];
            }

            var clipboard = new ClipboardJS('#copyButton', {
                    text: function () {
                        return document.getElementById('textToCopy').value;
                    }
                });
            clipboard.on('success', function(e) {
                alert('Текст скопирован: ' + e.text);
            });
            clipboard.on('error', function(e) {
                alert('Ошибка при копировании текста.');
            });
            get_urls();
        </script>
        </script>
        
    </body>
</html>
