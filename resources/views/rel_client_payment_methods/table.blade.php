<table class="table table-responsive" id="relClientPaymentMethods-table">
    <thead>
        <tr>
            <th>Client Id</th>
        <th>Payment Method Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($relClientPaymentMethods as $relClientPaymentMethod)
        <tr>
            <td>{!! $relClientPaymentMethod->client_id !!}</td>
            <td>{!! $relClientPaymentMethod->payment_method_id !!}</td>
            <td>{!! $relClientPaymentMethod->status !!}</td>
            <td>
                {!! Form::open(['route' => ['relClientPaymentMethods.destroy', $relClientPaymentMethod->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('relClientPaymentMethods.show', [$relClientPaymentMethod->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('relClientPaymentMethods.edit', [$relClientPaymentMethod->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>