@extends('layouts.appjqwidgets')

@section('content')

<script type='text/javascript'>
      // console.log("dfdf");
        $(document).ready(function () {
        // prepare the data
        var source ={
            datatype: "json",
 			//datafields: [{ name: 'id' },{ name: 'url' },{ name: 'description', type: 'string' }],
            datafields: [{ name: 'id' },
                { name: 'nazwa' },
                { name: 'lok_us', type: 'string' },
                
                { name: 'id' },
                { name: 'nr_inw' },
                { name: 'opis' },
                { name: 'data_lik' },
                { name: 'nazwadns' },
                { name: 'adr_ip,' },
                { name: 'zestaw' },
                { name: 'num_fabr' },
                { name: 'id_gr' },
                { name: 'inwold' },
                { name: 'status' },
                { name: 'nr_pom' },
                { name: 'nr_etyk' },
                { name: 'notatka',type: 'string' },
                { name: 'data_zak' },
                { name: 'lok_out' },
                { name: 'stat_przek' },
            
            ],
            url: '{{ url("/getSprzetData") }}',
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
            autorowheight:true,
            columnsautoresize:true,
            columnsresize:true,
            pageable: true,
            virtualmode: true,
            rendergridrows: function (params) {
                return params.data;
            },
            //columns: [{ text: 'ID', datafield: 'id', width: 250 },{ text: 'Adres url', datafield: 'url', width: 250 },{ text: 'Opis', datafield: 'description' }]
            //select s.id, s.nr_inw, s.lok_us, s.nazwa, s.opis, s.data_lik, s.nazwadns, s.adr_ip,
            // s.zestaw, s.num_fabr, s.id_gr, s.inwold, s.status, s.nr_pom, s.nr_etyk, s.notatka,
            //  s.data_zak, s.lok_out, s.stat_przek
            columns: [ 
                //{ text: 'ID', datafield: 'id', width: 250 },               
                {text:'US', datafield:'lok_us' },
                {text:'Lokalizacja', datafield:'lok_out'},
                {text:'Nr inw', datafield:'nr_inw'},
                {text:'Nr ser', datafield:'num_fabr'},
                {text:'Nazwa DNS', datafield:'nazwadns'},
                {text:'adr IP', datafield:'adr_ip,'},
                {text:'Nazwa', datafield:'nazwa', width:200},
                {text:'Pokój', datafield:'nr_pom'},
                {text:'Data zakupu', datafield:'data_zak'},
                
                {text:'Notatka', datafield:'notatka'},
               
//                {text:'opis', datafield:'opis'},
//                {text:'data_lik', datafield:'data_lik'},                                
//                {text:'zestaw', datafield:'zestaw'},
//                
//                {text:'id_gr', datafield:'id_gr'},
//                {text:'inwold', datafield:'inwold'},
//                {text:'status', datafield:'status'},                
//                {text:'nr_etyk', datafield:'nr_etyk'},
//                {text:'stat_przek', datafield:'stat_przek'},

            ]
        });
        
        
        
        
        });
    </script>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div id="jqxgrid" style="width: 100%"></div>

        </div>
    </div>
</div>
@endsection