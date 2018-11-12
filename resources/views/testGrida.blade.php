@extends('layouts.appjqwidgets')


@section('content')

<script type='text/javascript'>
      // console.log("dfdf");
        $(document).ready(function () {
        // prepare the data
        var source ={
            datatype: "json",
            datafields: [{ name: 'id' },
                { name: 'nazwa' },
                { name: 'lok_us', type: 'string' }],
            url: '{{ url("/loadGrid") }}',
            root: 'Rows',
            beforeprocessing: function (data) {
                source.totalrecords = data[0].TotalRows;
            },
            sort: function () {        
              $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },
            filter: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                }
        };
        
       
            
        
        $("#jqxgrid").jqxGrid({
            localization: localizationobj,
            source: source,
            width:'100%',
            theme: 'classic',
            filterable: true,
            sortable: true,
            sorttogglestates: 1,
            autoheight: true,
            pageable: true,
            virtualmode: true,
            rendergridrows: function (params) {
                return params.data;
            },
            //columns: [{ text: 'ID', datafield: 'id', width: 250 },{ text: 'Adres url', datafield: 'url', width: 250 },{ text: 'Opis', datafield: 'description' }]
            //select s.id, s.nr_inw, s.lok_us, s.nazwa, s.opis, s.data_lik, s.nazwadns, s.adr_ip,
            // s.zestaw, s.num_fabr, s.id_gr, s.inwold, s.status, s.nr_pom, s.nr_etyk, s.notatka,
            //  s.data_zak, s.lok_out, s.stat_przek
            columns: [ { text: 'ID', datafield: 'id', width: 250 },               
                {text:'US', datafield:'lok_us', width: 250 },
                {text:'Nazwa', datafield:'nazwa'}
            ]
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