<table class="table table-responsive" id="paymentMethodEnableds-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paymentMethodEnableds as $paymentMethodEnabled)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['paymentMethodEnableds.destroy', $paymentMethodEnabled->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('paymentMethodEnableds.show', [$paymentMethodEnabled->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('paymentMethodEnableds.edit', [$paymentMethodEnabled->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>