@extends('admin.layout_admin.layout_admin')
@section("main")
    <div class="card" style="max-height: 100vh">

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <div id="datatable_wrapper" class="dataTables_wrapper no-footer">

                <table id="datatable"
                       class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer"
                       role="grid" aria-describedby="datatable_info">
                    <thead class="">
                    <tr role="row">

                        <th class="table-column-pl-0  text-center p-1 align-middle" tabindex="0"
                            aria-controls="datatable" rowspan="1"
                            colspan="1" aria-label="Name: activate to sort column ascending">
                            STT
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending">Ảnh
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Country: activate to sort column ascending">Tên bài
                            viết
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending">Tác giả
                        </th>

                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Role: activate to sort column ascending">Ngày tạo
                        </th>
                        <th class="_disabled" rowspan="1" colspan="1" aria-label=""
                        >Hành động
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($ds_bai_viet as $item)
                        <tr role="row" class="odd">


                            <td class="table-column-pl-0 text-center">
                                @if(empty(Request::get('page')))
                                    {{$loop->index + 1+ Request::get('page')* count($ds_bai_viet)}}
                                @else
                                    {{$loop->index + 1 + Request::get('page')* count($ds_bai_viet) -15}}
                                @endif
                            </td>
                            <td>
                                {{--                                <img src="{{asset('storage/images/'.$item->blog_image)}}" alt="" style="width: 80px;height: 80px">--}}
                                {{--                                <img src="{{ $item->blog_image }}" alt="" style="width: 80px;height: 80px">--}}
                                @if(preg_match_all('((http|https)\:\/\/)',$item->blog_image))
                                    <img src="{{ $item->blog_image }}" alt="" style="width: 80px;height: 80px">
                                @else
                                    <img src="{{asset('images/'.$item->blog_image)}}" alt=""
                                         style="width: 80px;height: 80px">
                                @endif

                            </td>

                            <td>{{ $item->blog_title }}</td>

                            <td> {{ $item->display_name }}</td>

                            <td>{{$item->blog_date}}</td>
                            <td>
                                @if(session()->get('role')[0] == 'admin' || session()->get('role')[0] == 'user')
                                    <a class="btn btn-sm btn-white"
                                       href="{{route('suaBV',['id'=>$item->id])}}">
                                        <i class="tio-edit"></i> Edit
                                    </a>
                                @endif
                                @if(session()->get('role')[0] == 'admin')
                                    <a class="btn btn-sm btn-white" href="{{route('xoaBV',['id'=>$item->id])}}"
                                       onclick="return confirm('Bạn có chắc không?')">
                                        Delete
                                    </a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 15 of 24
                    entries
                </div>
            </div>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
            <!-- Pagination -->
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                {{ $ds_bai_viet->appends(request()->all())->links('vendor.pagination.custom')}}
            </div>
            <!-- End Pagination -->
        </div>
        <!-- End Footer -->
    </div>

@endsection
