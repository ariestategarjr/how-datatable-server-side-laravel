<script>
    $(document).ready(function() {
        var table = $("#user_table").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "pageLength": 10,  // Jumlah data default yang ditampilkan per halaman
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],  // Opsi jumlah data per halaman
            "ajax": {
                "url": "{{ route('sale.showProductsModalData') }}",
                "type": "POST",
                "data": function(d) {
                    d._token = "{{ csrf_token() }}";
                    d.search = $('input[type="search"]').val();  // Ambil nilai dari input pencarian bawaan DataTable
                },
                "dataSrc": "data"
            },
            "columns": [{
                    "data": "id"
                }, 
                {
                    "data": "barcode"
                },
                {
                    "data": "name"
                },
                {
                    "data": "category_name"
                }, 
                {
                    "data": "stock"
                },
                {
                    "data": "selling_price"
                },
                {
                    "data": null,
                    "render": function(data, type, full, meta) {
                        return "<input type='number'>";
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, full, meta) {
                        return "<button class='btn btn-sm btn-primary'>Action</button>";
                    }
                }
            ]
        });

        // Event listener untuk input pencarian bawaan DataTable
        $('input[type="search"]').on('keyup change', function() {
            table.draw();
        });
    });
</script>
