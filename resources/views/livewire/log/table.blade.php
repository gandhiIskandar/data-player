<div class="col-12">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Log Kegiatan</h5>

              
            </div>
          
        </div>
        <div class="card-body" wire:ignore>

            <table id="table-log" class="table table-striped table-bordered nowrap" style="width: 100%">
                <thead>

                    <tr>

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Username</th>
                        <th>IP</th>
                        <th>Activity</th>
                        <th>Target</th>
                        <th>Deskripsi</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $log->date }} </td>
                            <td>{{ $log->username }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->activity }}</td>
                            @if($log->member_id !=null)
                            <td>{{ $log->member->username }}</td>
                            @elseif($log->user_id !=null)
                            <td>{{ $log->user->name }}</td>
                            @elseif($log->keterangan != null)
                            <td>{{ $log->keterangan }}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{ $log->deskripsi }}</td>
                        </tr>
                    @endforeach

                </tbody>

            </table>


        </div>
    </div>
</div>


@push('script')


        <script>
            $(document).ready(function() {
                var table = $('#table-log').DataTable({
                    "responsive": true,
                    "order": [],
                    "columnDefs": [{
                        className: 'dt-center',
                        targets: '_all'
                    }],

                });

            });





        </script>
  

@endpush
