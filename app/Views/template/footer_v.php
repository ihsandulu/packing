<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<!--<footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>-->
<!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<!--Toast-->
<div class="toast" data-autohide="false">
    <div class="toast-header">
        <strong class="mr-auto text-primary">Alert</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
        asdfaf
    </div>
</div>
<script>
    function showmessage(a) {
        //alert('<?= (isset($_GET['message'])) ? $_GET['message'] : $this->session->getFlashdata("message"); ?>');
        <?php
        if (isset($_GET['message'])) {
            $isipesan = $_GET['message'];
        } else {
            $isipesan = $this->session->getFlashdata("message");
        }
        ?>
        /* $('.toast-body').html('<?= $isipesan ?>');
        $('.toast').toast('show');
        if (a > 0) {
            setTimeout(function() {
                $('.toast').toast('hide');
            }, a);
        } */

        toast('INFO >>>', '<?= $isipesan ?>');
    }




    function toast(judul, isi) {
        toastr.warning(isi, judul, {
            "positionClass": "toast-bottom-right",
            timeOut: 5000,
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "tapToDismiss": false

        })
    }

    function hidebar() {
        // $(".scroll-sidebar").toggleClass("hidebar");
        setTimeout(function() {
            $(".scroll-sidebar").css({
                "height": "inherit",
                "overflow": "auto"
            });
        }, 500);

    }

    $(document).ready(function() {
        $('#example23').DataTable({
            dom: 'Blfrtip',
            autoWidth: false,
            lengthMenu: [
                [50, 100, -1],
                [50, 100, "All"]
            ],
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    },
                    customize: function(win) {
                        // Tambahkan CSS langsung ke dokumen cetak
                        var css = `
                            .screen-only { display: none !important; }
                            .print-only { display: inline !important; }
                        `;
                        $(win.document.head).append('<style>' + css + '</style>');
                        $(win.document.body)
                            .find('td.text-left')
                            .css('text-align', 'left');
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    }
                }
            ],
            ordering: false // Mencegah DataTables mengatur order by
        });
        $('#example231').DataTable({
            dom: 'Blfrtip',
            autoWidth: false,
            lengthMenu: [
                [50, 100, -1],
                [50, 100, "All"]
            ],
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    },
                    customize: function(win) {
                        // Tambahkan CSS langsung ke dokumen cetak
                        var css = `
                            .screen-only { display: none !important; }
                            .print-only { display: inline !important; }
                        `;
                        $(win.document.head).append('<style>' + css + '</style>');
                        $(win.document.body)
                            .find('td.text-left')
                            .css('text-align', 'left');
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:first-child)'
                    }
                }
            ],
            ordering: false // Mencegah DataTables mengatur order by
        });
        $('.dtable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:first-child)' // Mengabaikan kolom pertama
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:first-child)' // Mengabaikan kolom pertama
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:first-child)' // Mengabaikan kolom pertama
                    }
                }
            ]
        });
        $('.select').select2();
        <?php if ($this->session->getFlashdata("message") != "" || isset($_GET['message'])) { ?>
            showmessage(3000);
        <?php } ?>
        $('[data-toggle="tooltip"]').tooltip();

        setTimeout(function() {
            $(".select2-selection").css({
                "padding": "8px 6px 6px 8px",
                "height": "48px"
            });
        }, 200);
    });
</script>
<script>
    function tampilrow(a, id, colspan, tha, tda) {
        $('.xtr').remove();
        if ($(a).children().hasClass("fa-plus")) {
            $(".tampilrow").children().removeClass("fa-minus").addClass("fa-plus");
            $(a).children().removeClass("fa-plus").addClass("fa-minus");
            let th = '';
            let td = '';
            for (i = 0; i < tha.length; i++) {
                th = th + '<th>' + tha[i];
            }
            for (i = 0; i < tda.length; i++) {
                td = td + '<td>' + tda[i];
            }
            let tr = '<tr id="x' + id + '" class="xtr"><td colspan="' + colspan + '"><table id="dataTable" class="table table-condensed "><thead class=""><tr style="background-color:blanchedalmond;">' + th + '</tr></thead><tbody><tr style="background-color:white;">' + td + '</tr></tbody></table></td></tr>';

            $('#' + id).after(tr);

        } else {

            $(a).children().removeClass("fa-minus").addClass("fa-plus");
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tableContainer = document.querySelector(".table-responsive");
        let isDown = false;
        let startX;
        let scrollLeft;

        tableContainer.addEventListener("mousedown", (e) => {
            isDown = true;
            tableContainer.classList.add("active");
            startX = e.pageX - tableContainer.offsetLeft;
            scrollLeft = tableContainer.scrollLeft;
        });

        tableContainer.addEventListener("mouseleave", () => {
            isDown = false;
            tableContainer.classList.remove("active");
        });

        tableContainer.addEventListener("mouseup", () => {
            isDown = false;
            tableContainer.classList.remove("active");
        });

        tableContainer.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - tableContainer.offsetLeft;
            const walk = (x - startX) * 1.5; // Kecepatan geser
            tableContainer.scrollLeft = scrollLeft - walk;
        });
    });
</script>



<script src="js/lib/datatables/datatables.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!-- <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script> -->
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="js/lib/datatables/datatables-init.js"></script>

<script src="js/lib/toastr/toastr.min.js"></script>
<script src="js/lib/toastr/toastr.init.js"></script>

</body>

</html>