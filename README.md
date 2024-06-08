This is a repository that contains ways to server-side manipulate DataTables displayed via Modal using Laravel.

As an example case, I use "product" which is related to "sales". The flow that occurs is that when a "sales" transaction occurs, the "product" is also involved in the transaction.

This repository uses 3 files as references, namely:
1. product.blade.php (View) -> contains Capital which contains a table as a DataTables template and an AJAX function to initialize DataTables server-side.
2. SaleController.php (Controller) -> there is a function to perform table JOIN operations for table relations and WHERE for table search features.
3. ProductDatatable.php (Model) -> there is a function to declare the "products" table and its data.

This repository also contains several discussions regarding DataTables manipulation such as:
1. Display the data in a table in Datatable format
2. Added a search feature using datatable's built-in search element
3. Added pagination feature using built-in Data elements

Notes:
The code in this repository comes from ChatGPT
