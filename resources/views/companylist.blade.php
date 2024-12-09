<link rel="stylesheet" href="{{ asset('css/company.css') }}">
@extends('layout.app')
@section('title', 'Company List')
@section('content')
<div class="info" style="background: white;">
    <div class="container mt-4">
        <h2>Company List</h2>
        <form class="left" method="post">
            <a href="{{ asset('/companyadd') }}"
                style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">
                Add Company
            </a>
        </form>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <table id="CompanyTable" class="table table-bordered table-striped" style="width: 1150px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Company Type</th>
                    <th>Company Email</th>
                    <th>Add Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<!-- Address Overlay -->
<div id="address-overlay"
    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
    <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: 0 auto;">
        <h1>Company Address Details</h1>
        <form id="address-form">
            <div id="form-row">
                <!-- Address rows will be appended dynamically here -->
            </div>
        </form>
        <button type="button" id="add-overlay"
            style="background-color: green; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Add Another Address
        </button>
        <button type="button" id="submit-over"
            style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Submit
        </button>
        <button id="close-overlay"
            style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer;">
            Close
        </button>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const table = $('#CompanyTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/getCompanyAjax',
            type: 'POST',
        },
        pageLength: 5,
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'companyname',
                name: 'companyname'
            },
            {
                data: 'companytype',
                name: 'companytype'
            },
            {
                data: 'companyemail',
                name: 'companyemail'
            },
            {
                data: 'address',
                orderable: false,
                searchable: false
            },
            {
                data: 'edit',
                orderable: false,
                searchable: false
            },
            {
                data: 'delete',
                orderable: false,
                searchable: false
            },
        ],
    });

    // Open Address Overlay
    $(document).on('click', '.view-address-btn', function() {
        const company_id = $(this).data('company-id');
        $('#submit-over').attr('data-company-id', company_id);
        $('#address-overlay').fadeIn();

        $.ajax({
            url: '/getCompanyaddress',
            type: 'POST',
            data: {
                company_id: company_id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const addressData = response.data;
                    $('#address-form').empty();
                    addressData.forEach(function(address) {
                        const newRow = `
                            <div class="form-row" data-id="${address.id}">
                                <div class="input-group">
                                    <input type="hidden" name="id[]" value="${address.id}">
                                    <label>Address</label>
                                    <input type="text" name="address[]" value="${address.address}" required>
                                    <label>Mobile</label>
                                    <input type="text" name="mobile[]" value="${address.mobile}" required>
                                    <label>Latitude</label>
                                    <input type="text" name="latitude[]" value="${address.latitude}" required>
                                    <label>Longitude</label>
                                    <input type="text" name="longitude[]" value="${address.longitude}" required>
                                    <button type="button" class="delete-address-btn">Delete</button>
                                </div>
                            </div>`;
                        $('#address-form').append(newRow);
                    });
                } else {
                    alert('No address data found');
                }
            },
            error: function() {
                alert('Error fetching address data');
            }
        });
    });

    // Add new address row
    $('#add-overlay').click(function(event) {
        event.preventDefault();
        const newForm = `
            <div class="form-row">
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address[]" required>
                    <label>Mobile</label>
                    <input type="text" name="mobile[]" required>
                    <label>Latitude</label>
                    <input type="text" name="latitude[]" required>
                    <label>Longitude</label>
                    <input type="text" name="longitude[]" required>
                    <button type="button" class="delete-address-btn">Delete</button>
                </div>
            </div>`;
        $('#address-form').append(newForm);
    });
    // delete address

    $(document).on('click', '.delete-address-btn', function() {
        const row = $(this).closest('.form-row');
        const addressId = row.find('input[name="id[]"]').val();

        if (addressId) {

            $.ajax({
                url: '/deleteCompanyAddress',
                type: 'POST',
                data: {
                    address_id: addressId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Address deleted successfully!');
                        row.remove();
                    } else {
                        alert(response.message || 'Failed to delete address');
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the address');
                }
            });
        } else {

            row.remove();
        }
    });
    // save address
    $('#submit-over').on('click', function() {
        const companyId = $(this).data('company-id');
        const formData = $('#address-form').serializeArray();

        // Group data into arrays for each set of fields dynamically
        const data = {
            company_id: companyId,
            address: [],
            mobile: [],
            latitude: [],
            longitude: []
        };

        // Manually parse serialized data into grouped arrays
        formData.forEach(function(item, index) {
            if (item.name === "address[]") {
                data.address.push(item.value);
            }
            if (item.name === "mobile[]") {
                data.mobile.push(item.value);
            }
            if (item.name === "latitude[]") {
                data.latitude.push(item.value);
            }
            if (item.name === "longitude[]") {
                data.longitude.push(item.value);
            }
        });

        console.log("Sending data to server:", data);

        $.ajax({
            url: '/saveCompanyAddress',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
                if (response.status === 'success') {
                    alert('Data saved successfully!');
                    $('#address-overlay').fadeOut();
                } else {
                    alert(response.message || 'Failed to save data');
                }
            },
            error: function() {
                alert('An error occurred while saving the data');
            }
        });
    });


    // Close Overlay
    $('#close-overlay').click(function() {
        $('#address-overlay').fadeOut();
    });
});
</script>
@endsection