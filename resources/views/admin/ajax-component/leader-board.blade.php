<div class="table-responsive  list-table user-manage-table">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col" class="color-light"></th>
                <th scope="col">Designation</th>
                <th scope="col">Sales %</th>
            </tr>
        </thead>
        <tbody id="leader_board">
            @if( count($data->data) )
            @foreach( $data->data as $results )
            @php
            if( $loop->iteration == 1 ){
            $reward_image = 'bg-first';
            } else if($loop->iteration == 2){
            $reward_image = 'bg-second';
            } else if($loop->iteration >= 3){
            $reward_image = 'bg-third';
            } else {
            $reward_image = 'bg-third';
            
            }
            @endphp
            <tr class="{{$reward_image}}" data-name="{{ $results->name }}" data-mobile_no="{{ $results->mobile_no }}" data-email="{{ $results->email }}" data-image_url="{{ URL::to($results->image_url) }}" data-team_title="{{$results->team_title??'Team not available'}}">
                <td> {{$loop->iteration}}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="table-user-img"><img src="{{ URL::to($results->image_url) }}" alt="{{ URL::to('assets/img/cup-img.png') }}" class="img-fluid" /></div>
                        <div>
                            <p class="ms-1">{{ $results->name }}</p>
                        </div>
                    </div>
                </td>
                <td><img src="{{ URL::to('assets/img/cup-img.png') }}" alt="" class="img-fluid" /></td>
                <td>{{$results->team_title??"Team not available"}}</td>
                <td>{{ $results->total_sale }}%</td>
            </tr>
            @endforeach

            @else
            <tr>
                <td>Data not found</td>
            </tr>
            @endif




        </tbody>
    </table>
</div>
<div class="col-12 mt-3 d-none">
    <ul class="pagination table-pagination">
        <li class="disabled left-arrow"><a href="{{$data->pagination->links->first}}">&laquo;</a></li>
        <!-- <li class="active"><a href="{{$data->pagination->links->first}}" class="pagination-ordering">1 <span class="sr-only">(current)</span></a></li> -->
        <li><a href="{{$data->pagination->links->next}}" class="pagination-ordering">2</a></li>
        <li><a href="{{$data->pagination->links->prev}}" class="pagination-ordering">3</a></li>
        <!-- <li><a href="{{$data->pagination->links->last}}" class="pagination-ordering">4</a></li> -->
        <!-- <li><a href="#" class="pagination-ordering">5</a></li> -->
        <li class="right-arrow"><a href="{$data->pagination->links->last}}">&raquo;</a></li>
    </ul>
</div>
