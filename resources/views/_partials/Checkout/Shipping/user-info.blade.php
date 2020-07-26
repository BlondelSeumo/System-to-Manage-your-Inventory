<table class="table table-bordered">
    <tr>
        <th class="bold">User Name:</th>
        <td>{{ beautify($data->name) }}</td>
    </tr>
    {{--<tr>--}}
        {{--<th class="bold">County:</th>--}}
        {{--<td>{{ beautify($data->county->name) }}</td>--}}
    {{--</tr>--}}
    <tr>
        <th class="bold">Hometown:</th>
        <td>{{ beautify($data->town) }}</td>
    </tr>
    <tr>
        <th class="bold">Home Address:</th>
        <td>{{ beautify($data->address) }}</td>
    </tr>
</table>