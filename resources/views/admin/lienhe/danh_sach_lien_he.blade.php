@extends('admin.layout_admin.layout_admin')
@section("main")
    <div class="card" style="max-height: 100vh">

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <div id="datatable_wrapper" class="dataTables_wrapper no-footer">

                <table id="datatable"
                       class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer"
                       role="grid" aria-describedby="datatable_info" style="width: 100%">
                    <thead class="thead-light">
                    <tr role="row">

                        <th class="table-column-pl-0  text-center p-1 align-middle" tabindex="0"
                            aria-controls="datatable" rowspan="1"
                            colspan="1" aria-label="Name: activate to sort column ascending">
                            STT
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Position: activate to sort column ascending">Tên khách hàng
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Country: activate to sort column ascending">Email
                        </th>
                        <th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 70%">Nội dung
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

                            <td>{{ $item->contact_name }}</td>

                            <td> {{ $item->contact_email }}</td>

                            <td style="width: 300px">{{$item->contact_content}}</td>
                            <td>

                                @if(session()->get('role')[0] == 'admin')
                                    <a class="btn btn-sm btn-white" href="{{route('xoaTour',['id'=>$item->id])}}"
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

{{--        <!-- Footer -->--}}
{{--        <div class="card-footer">--}}
{{--            <!-- Pagination -->--}}
{{--            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">--}}
{{--                {{ $ds_bai_viet->appends(request()->all())->links('vendor.pagination.custom')}}--}}
{{--            </div>--}}
{{--            <!-- End Pagination -->--}}
{{--        </div>--}}
        <!-- End Footer -->
    </div>

@endsection
