@extends('layouts.appjqwidgets')


@section('content')

<script type='text/javascript'>
      // console.log("dfdf");
        $(document).ready(function () {
        // prepare the data
        var source ={
            datatype: "json",
            datafields: [{ name: 'id' },{ name: 'url' },{ name: 'description' }],
            url: '{{ url("/loadGrid") }}',
            sort: function () {        
              $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },
            filter: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                }
        };
        $("#jqxgrid").jqxGrid({       
            source: source,
            width:'100%',
            theme: 'classic',
            filterable: true,
            sortable: true,
            sorttogglestates: 1,
            columns: [{ text: 'ID', datafield: 'id', width: 250 },{ text: 'Adres url', datafield: 'url', width: 250 },{ text: 'Opis', datafield: 'description' }]
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