...
    <script>
        $(document).ready(function() {
            $("#user_table").DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "{{ route('sale.showProductsModalData') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}",
                    },
                    "dataSrc": "data" // Menggunakan data sebagai sumber data utama
                },
                "columns": [{
                        "data": "id"
                    }, // Menampilkan nomor urutan biasa
                    {
                        "data": "barcode"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "category_name"
                    }, // Menampilkan nama kategori
                    {
                        "data": "stock"
                    },
                    {
                        "data": "selling_price"
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            // Tambahkan tombol aksi di sini
                            return "<input type='number'>";
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, full, meta) {
                            // Tambahkan tombol aksi di sini
                            return "<button class='btn btn-sm btn-primary'>Action</button>";
                        }
                    }
                ]
            });
        });
    </script>
...
