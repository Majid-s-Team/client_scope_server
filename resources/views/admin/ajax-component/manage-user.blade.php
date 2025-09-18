<div class="col-12">
    <div class="table-responsive list-table user-manage-table">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">

                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                    </th>
                    <th scope="col">Username</th>
                    <th scope="col" class="color-light">Designation</th>
                    <th scope="col"><span class="table-circle circle-white me-2"></span> Status</th>
                    <th scope="col"><img src="{{ URL::to('assets/img/table-last-icon.png') }}" alt="" class="img-fluid" /></th>
                </tr>
            </thead>
            <tbody id="manage_user">

                @if( !empty($data) )
                @foreach ( $data as $users)
                <tr>
                    <td>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="table-user-img"><img src="{{ $users->image_url }}" alt="user-profile" class="img-fluid" /></div>
                            <div>
                                <p class="ms-1">{{ $users->name }} </p>
                            </div>
                        </div>
                    </td>
                    <td>Sales Team Lead - Territory 3</td>
                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">{{ $users->status }}</span></td>
                    <td> <a data-target="#editUser" href="{{ URL::to('admin/user/manage/'.$users->id) }}" class="_edit_user"><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></a></td>
                </tr>

                @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
<div class="col-12 mt-3">
    <ul class="pagination table-pagination">
        {{$data->links()}}
        <!-- <li class="disabled left-arrow"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#" class="pagination-ordering">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#" class="pagination-ordering">2</a></li>
        <li><a href="#" class="pagination-ordering">3</a></li>
        <li><a href="#" class="pagination-ordering">4</a></li>
        <li><a href="#" class="pagination-ordering">5</a></li>
        <li class="right-arrow"><a href="#">&raquo;</a></li> -->
    </ul>
</div>