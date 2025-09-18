@if( count($data) )
@foreach( $data as $key =>$results )
<div class="leader-user-box bg-first">
    <div class="d-flex align-items-center">
        <div>
            <p>{{$key+1}}</p>
        </div>
        <div class="d-flex align-items-center ms-2">
            <div class="user-profile-dash">
                <img src="{{url($results->image_url)}}" alt="user-profile" >
            </div>
            <div>
                <p>{{ $results->name }}</p>
            </div>
            </div>
        </div>
        <div>
            <img src="http://localhost:8000/assets/img/cup-img.png" alt="" class="img-fluid">
        </div>
        <div>
            <p>{{ $results->total_sale }}</p>
        </div>
</div>
@endforeach
    @else
        <tr>
            <td colspan="4">No Data Found</td>
        </tr>
    @endif
