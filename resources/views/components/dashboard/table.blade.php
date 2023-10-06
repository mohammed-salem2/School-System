@props([
    'text_filters',
    'select_fixed_filters',
    'title',
    'create',
    'name',
    'ths',
    'models',
    'table',
    'values',
    'edit',
    'show',
    'destory',
    'modeltitle',
    'relation',
    'relationtwo',
    'relationthree',
    'relationfour',
])



<div class="">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">{{ __($title) }}</h3>
            <div class="card-toolbar">
                <a href="{{ route($create) }}" type="submit" class="btn btn-info">{{ $name }}</a>
            </div>
        </div>
    </div>
    <div class="card shadow-sm mt-3">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">{{ __('app.filters') }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ URL::current() }}" method="get">
                <div class="row">
                    @isset($text_filters)
                        @foreach ($text_filters as $filter)
                            <div class="col-12 col-md-{{ $filter['cols'] ?? '3' }} mt-2">
                                <label for="{{ $filter['name'] }}"
                                    class="mb-1 ps-1 text-black">{{ __('app.'.$filter['label']) }}</label>
                                <input class="form-control form-control-sm mb-1" type="text" name="{{ $filter['name'] }}"
                                    value="{{ request()->query($filter['name']) }}" placeholder="{{  __('app.'.$filter['label']) }}" />
                                {{--  @if (count($datas) <= 0) disabled @endif  --}}
                            </div>
                        @endforeach
                    @endisset

                    @isset($select_fixed_filters)
                        @foreach ($select_fixed_filters as $filter)
                            <div class="col-{{ $filter['cols'] ?? '3' }} mt-2">
                                <label for="{{ $filter['name'] }}"
                                    class="mb-1 ps-1 text-black">{{ __('app.'.$filter['label']) }}</label>
                                <div class="input-group input-group-sm">
                                    <select name="{{ $filter['name'] }}" id="{{ $filter['name'] }}"
                                        class="form-select form-select-sm">
                                        <option value="">{{ __('app.All') }}</option>
                                        @foreach ($filter['options'] as $option)
                                            <option value="{{ $option['option_value'] }}" @selected($option['option_value'] == request($filter['name']))>
                                                {{ __('app.'.$option['option_label']) }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-dark" type="submit">{{ __('app.filter') }}</button>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                {{-- Hidden Submit Button --}}
                <button class="btn btn-sm btn-dark d-none" type="submit">Filter</button>
            </form>
        </div>
    </div>
</div>
<div class="">
    <table id="kt_datatable_example_5" class="table table-striped gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                @foreach ($ths as $th)
                    <th>{{ __($th) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
                @if ($table == 'auth')
                    @if (auth()->user()->role == 1)
                        <tr>
                            @foreach ($values as $value)
                                @if ($value == 'status')
                                    <td>
                                        @if ($model->status == 'active')
                                            <div class="badge badge-success">
                                                {{ $model->$value }}
                                            </div>
                                        @else
                                            <div class="badge badge-danger">
                                                {{ $model->$value }}
                                            </div>
                                        @endif
                                    </td>
                                @elseif ($value == 'image_url')
                                    <td>
                                        <img src="{{ $model->$value }}" width="50">
                                    </td>
                                @elseif ($value == 'forign_id')
                                    <td>
                                        {{ $model->$relation->name ?? ' ' }}
                                    </td>
                                @elseif ($value == 'created')
                                    <td>
                                        {{ $model->admin_data['name'] ?? 'Not Found' }}
                                    </td>
                                    {{-- @elseif ($value == 'email')
                                    <td style="width: 100px !important;">{{ $model->$value }}</td> --}}
                                @else
                                    <td>{{ $model->$value }}</td>
                                @endif
                            @endforeach
                            <td>
                                <div class="actions">
                                    <a href="{{ route($edit, $model->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route($show, $model->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal_{{ $model->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $model->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        {{ $modeltitle }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('app.want_delete_the_item') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">{{ __('app.Close') }}</button>
                                                    <form action="{{ route($destory, $model->id) }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> {{ __('app.Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @elseif ($model->id == auth()->user()->id)
                        <tr>
                            @foreach ($values as $value)
                                @if ($value == 'status')
                                    <td>
                                        @if ($model->status == 'active')
                                            <div class="badge badge-success">
                                                {{ $model->$value }}
                                            </div>
                                        @else
                                            <div class="badge badge-danger">
                                                {{ $model->$value }}
                                            </div>
                                        @endif
                                    </td>
                                @elseif ($value == 'image_url')
                                    <td>
                                        <img src="{{ $model->$value }}" width="50">
                                    </td>
                                @elseif ($value == 'forign_id')
                                    <td>
                                        {{ $model->$relation->name ?? ' ' }}
                                    </td>
                                @elseif ($value == 'created')
                                    <td>
                                        {{ $model->admin_data['name'] ?? 'Not Found' }}
                                    </td>
                                @else
                                    <td>{{ $model->$value }}</td>
                                @endif
                            @endforeach
                            <td>
                                <div class="actions">
                                    {{-- <a href="{{ route($edit, $model->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    <a href="{{ route($show, $model->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal_{{ $model->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $model->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                        {{ $modeltitle }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('app.want_delete_the_item') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">{{ __('app.Close') }}</button>
                                                    <form action="{{ route($destory, $model->id) }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i> {{ __('app.Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @else
                    <tr>
                        @foreach ($values as $value)
                            @if ($value == 'status')
                                <td>
                                    @if ($model->status == 'active')
                                        <div class="badge badge-success">
                                            {{ $model->$value }}
                                        </div>
                                    @else
                                        <div class="badge badge-danger">
                                            {{ $model->$value }}
                                        </div>
                                    @endif
                                </td>
                            @elseif ($value == 'image_url')
                                <td>
                                    <img src="{{ $model->$value }}" width="50">
                                </td>
                            @elseif ($value == 'forign_id')
                                <td>
                                    {{ $model->$relation->name ?? ' ' }}
                                </td>
                            @elseif ($value == 'forign_id_two')
                                <td>
                                    {{ $model->$relationtwo->name ?? ' ' }}
                                </td>
                            @elseif ($value == 'forign_id_three')
                                <td>
                                    {{ $model->$relationthree->name ?? ' ' }}
                                </td>
                            @elseif ($value == 'forign_id_four')
                                <td>
                                    {{ $model->$relationfour->name_father ?? ' ' }}
                                </td>
                            @elseif ($value == 'created')
                                <td>
                                    {{ $model->admin_data['name'] ?? 'Not Found' }}
                                </td>
                            @else
                                <td>{{ $model->$value }}</td>
                            @endif
                        @endforeach
                        <td>
                            <div class="actions">
                                <a href="{{ route($edit, $model->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route($show, $model->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{ $model->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{ $model->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    {{ $modeltitle }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('app.want_delete_the_item') }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ __('app.Close') }}</button>
                                                <form action="{{ route($destory, $model->id) }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i> {{ __('app.Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>
