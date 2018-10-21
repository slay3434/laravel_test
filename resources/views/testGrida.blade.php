@extends('layouts.appjqwidgets')


@section('content')

<script type='text/javascript'>
       console.log("dfdf");
        $(document).ready(function () {
        // prepare the data
        var source ={
            datatype: "json",
            datafields: [{ name: 'id' },{ name: 'url' },{ name: 'description' },{ name: 'Address' },{ name: 'City' },],
            url: '{{ url("/loadGrid") }}'
        };
        $("#jqxgrid").jqxGrid({       
            source: source,
            width:'100%',
            theme: 'classic',
            columns: [{ text: 'Company Name', datafield: 'id', width: 250 },{ text: 'ContactName', datafield: 'url', width: 150 },{ text: 'Contact Title', datafield: 'description', width: 180 },{ text: 'Address', datafield: 'Address', width: 200 },{ text: 'City', datafield: 'City' }]
        });
        });
    </script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="jqxgrid" style="width: 100%"></div>

        </div>
    </div>
</div>
@endsection