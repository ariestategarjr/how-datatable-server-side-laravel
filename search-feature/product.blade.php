<script>
    $(document).ready(function() {
        var table = $("#user_table").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
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
