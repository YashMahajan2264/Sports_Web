<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users DataGrid</title>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.4.0/polyfill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.4.0/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <!-- DevExtreme CSS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/24.1.7/css/dx.light.css">

    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/24.1.7/js/dx.all.js"></script>
    <link rel="stylesheet" href="../assets_/css/darkTheme.css">
    <!-- DevExtreme JS -->

    <!-- <script src="https://cdn3.devexpress.com/jslib/23.1.4/js/jszip.min.js"></script>
    <script src="https://cdn3.devexpress.com/jslib/23.1.4/js/dx.all.js"></script> -->
</head>

<body>
    <div id="gridContainer"></div>

    <script>
        $(function() {

            $("#gridContainer").dxDataGrid({
                dataSource: "../classes/getUsers.php",
                columnAutoWidth: true,
                columns: [{
                        dataField: "id",
                        caption: "ID",
                        width: 50,
                    },
                    {
                        dataField: "username",
                        caption: "Username",
                        validationRules: [{
                            type: "required"
                        }],
                    },
                    {
                        dataField: "email",
                        caption: "Email",
                        validationRules: [{
                            type: "required"
                        }],
                    },
                    {
                        dataField: "phone_number",
                        caption: "Phone Number",
                        validationRules: [{
                            type: "required"
                        }],
                    },
                    {
                        dataField: "sport",
                        caption: "Sport(Cricket/Football)",
                        customizeText: function(cellInfo) {
                            return cellInfo.value ? cellInfo.value : "Not Selected";
                        }
                    },
                    {
                        dataField: "password_hash",
                        validationRules: [{
                            type: "required"
                        }],
                        caption: "Encoded Password",
                        visible: false
                    }

                ],
                paging: {
                    pageSize: 10,
                },
                pager: {
                    showPageSizeSelector: true,
                    allowedPageSizes: [5, 10, 20],
                    showInfo: true,
                },
                filterRow: {
                    visible: true,
                    applyFilter: "auto",
                },
                searchPanel: {
                    visible: true,
                    width: 240,
                    placeholder: "Search...",
                },
                headerFilter: {
                    visible: true,
                },
                columnChooser: {
                    enabled: true
                },
                groupPanel: {
                    visible: true
                },
                columnFixing: {
                    enabled: true
                },
                editing: {
                    mode: "popup",
                    allowUpdating: true,
                    allowDeleting: true,
                    allowAdding: true
                },
                grouping: {
                    autoExpandAll: false,
                },
                summary: {
                    groupItems: [{
                        column: "sport", // Grouping is done by 'sport' column
                        summaryType: "count", // Summary type is 'count'
                        displayFormat: "{0} users", // Custom text for the count summary
                        showInGroupFooter: true, // Show the summary in the group footer
                        alignByColumn: true, // Align it with the 'sport' column
                    }, ],
                },
                selection: {
                    mode: "single", // Enables single row selection
                },
                onSelectionChanged: function(e) {
                    if (e.currentSelectedRowKeys.length > 0) {
                        e.component
                            .byKey(e.currentSelectedRowKeys[0])
                            .done(function(user) {
                                if (user) {
                                    // Display user details using SweetAlert
                                    Swal.fire({
                                        title: 'Selected User Details',
                                        html: `
                                    <strong>ID:</strong> ${user.id}<br>
                                    <strong>Username:</strong> ${user.username}<br>
                                    <strong>Email:</strong> ${user.email}<br>
                                    <strong>Phone:</strong> ${user.phone_number}<br>
                                    <strong>Sport:</strong> ${user.sport ? user.sport : "Not Selected"}
                                `,
                                        icon: 'info', // Icon type for the popup
                                        confirmButtonText: 'OK'
                                    });
                                }
                            });
                    }
                },
                export: {
                    enabled: true,
                    formats: ['xlsx']
                },
                onExporting(e) {
                    if (e.format === 'xlsx') {
                        const workbook = new ExcelJS.Workbook();
                        const worksheet = workbook.addWorksheet("Main sheet");
                        DevExpress.excelExporter.exportDataGrid({
                            worksheet: worksheet,
                            component: e.component,
                        }).then(function() {
                            workbook.xlsx.writeBuffer().then(function(buffer) {
                                saveAs(new Blob([buffer], {
                                    type: "application/octet-stream"
                                }), "Users.xlsx");
                            });
                        });
                    }

                },
            });
        });
    </script>
</body>

</html>