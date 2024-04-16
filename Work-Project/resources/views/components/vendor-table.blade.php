<div class="vendor-table">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Account Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->id }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->phone_number }}</td>
                    <td>{{ $vendor->address }}</td>
                    <td>{{ $vendor->accountNumber }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
