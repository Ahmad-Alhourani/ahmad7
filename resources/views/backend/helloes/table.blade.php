<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($helloes as $hello)
        <tr>
            
                

               <td>{!! $hello->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>