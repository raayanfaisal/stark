@extends('layouts.app')

@section('content')
<div class="container">
    <h4>View Materials Database Entries</h4>
    <form action="/entry" method="post">
    {{ csrf_field() }}
        <input type="text" class="form-control" name="search_itm" placeholder="Search">
        <input type="submit" name="submit" class="submit btn btn-primary btn-block btn-lg mt-3" value="search">
    </form>
    <table>
        <tr>
            <th>Item Code</th>
            <th>Item Description</th>
            <th>Item Value</th>
        </tr>
        @foreach($enty as $enty)
			<tr>
                <td>{{ $enty -> itmCode }}</td>
                <td>{{ $enty -> itmDescription }}</td>
                <td>{{ $enty -> itmValue }}</td>
            </tr>
		@endforeach
    </table>
</div>
@endsection