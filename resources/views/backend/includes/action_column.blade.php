<div class="text-right">
    @can('edit_'.$module_name)
        {{--        <x-buttons.edit route='{!!route("backend.$module_name.edit", $data)!!}'--}}
        {{--                        data-url='{!!route("backend.$module_name.edit", $data)!!}'--}}
        {{--                        title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}"--}}
        {{--                        data-title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" small="true"/>--}}

        <button type="button" class="btn btn-primary btn-icon btn-sm btn-datatable-row-action" data-toggle="tooltip"
                data-placement="top" title="" data-original-title="Edit"
                data-url='{{route("backend.$module_name.edit", $data)}}'
                data-modal_size="{{((isset($edit_modal_size) && $edit_modal_size!='')?$edit_modal_size:'md')}}"
                data-type="edit" data-title="{{formatSpecialCharacter($module_name)}} Edit">
            <i class="far fa-edit"></i>
        </button>
    @endcan
    <x-buttons.show route='{!!route("backend.$module_name.show", $data)!!}'
                    data-url='{!!route("backend.$module_name.edit", $data)!!}'
                    title="{{__('Show')}} {{ ucwords(Str::singular($module_name)) }}"
                    data-title="{{__('Show')}} {{ ucwords(Str::singular($module_name)) }}" small="true"/>


    {{--    @can('delete_'.$module_name)--}}
    <button class="btn btn-danger btn-sm btn-datatable-row-action" data-type="delete"
            data-url="{{route('backend.'.$module_name.'.destroy',$data)}}" data-title="Delete Resource"
            data-message="{{__("Once Deleted You Can't Undone This Message ")}}">
        <i class="fas fa-trash"></i>
    </button>
    {{--    @endcan--}}

    @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.customers.index')
        @include('customer::includes.action_column',compact('data'))
    @endif
</div>
