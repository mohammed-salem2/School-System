<div class="card-header">
            <div class="col-md-6">
                <a href="{{ route($create) }}" type="submit" class="btn btn-info">{{ $name }}</a>
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
