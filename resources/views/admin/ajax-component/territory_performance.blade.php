                                      
        @if( count($territoryData) )
            @foreach( $territoryData as $territory_name => $results)
                                    @php 
                                    $display='d-none';
                                    if($loop->index==0){
                                        $display='';
                                    }
                                    @endphp
                                    <tr class="diplay_tperformance {{$display}}"  id="{{$loop->index}}" >
                                    <td colspan="4"> 
                                    <table >
                                    @if(isset($results['data'][0]))
                                   
                                      <tr class="{{$territory_name}}">
                                        <td colspan="2"><span class="table-circle me-2 cirlce-orange"></span><span>   
                                        {{$results['data'][0]->kpi_group}}</span></td>
                                        <td>{{$results['data'][0]->title}}</td>
                                        <td>{{$results['data'][0]->total_pin}}</td>
                                    </tr>
                                    @endif
                                    @if(isset($results['data'][1]))

                                    <tr class="{{$territory_name}}"> 
                                        <td colspan="2"><span class="table-circle me-2 cirlce-purple"></span><span>{{$results['data'][1]->kpi_group}}</span></td>
                                        <td>{{$results['data'][1]->title}}</td>
                                        <td>{{$results['data'][1]->total_pin}}</td>
                                    </tr>
                                    @endif
                                    @if(isset($results['data'][2]))

                                    <tr class="{{$territory_name}}">
                                        <td colspan="2"><span class="table-circle me-2 cirlce-aqua"></span><span>{{$results['data'][2]->kpi_group}}</span></td>
                                        <td>{{$results['data'][2]->title}}</td>
                                        <td>{{$results['data'][2]->total_pin}}</td>
                                    </tr>
                              
                                    @endif
                                    </td>
                                    </table>
                                    </tr>
                                   
        @endforeach
    @endif
