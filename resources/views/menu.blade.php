@extends('layouts.app')

@section('content')
 <table>
    <tr>
        <th>link</th>
        <th>nazwa</th>
    </tr>
    
    @foreach ($menu as $menuitem)   
        <tr>
            <td>"{{ $menuitem->link }}"</td>
            <td>"{{ $menuitem->nazwa }}"</td>
        </tr>
    @endforeach
                
    <tr>
        <td>Cell</td>
        <td>Cell</td>
    </tr>


</table>
    
@endsection