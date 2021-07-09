<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 8 DOM PDF Tutorial - Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>
  <body>
      <div class="container py-5">
          <div class="card mt-4">
              <div class="card-header">
                    <h5 class="card-title font-weight-bold">Laravel 8 DOM PDF Tutorial</h4>
              </div>
              <div class="card-body">
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <th>id_customer</th>
                                <th>date_order</th>
                                <th>total</th>
                                <th>payment</th>
                                <th>note</th>
                                <th>created_at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($bills as $bill)
                                <tr>
                                    <td>{{ $bill->id_customer}}</td>
                                    <td>{{ $bill->date_order}}</td>
                                    <td>{{ $bill->total}}</td>
                                    <td>{{ $bill->payment}}</td>
                                    <td>{{ $bill->note}}</td>
                                    <!-- <td>{{ date('d m Y', strtotime($bill->created_at)) }}</td> -->
                                    <td>{{ \Carbon\Carbon::parse($bill->created_at)->diffForHumans() }}</td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
              </div>
          </div>
      </div>
  </body>
</html>