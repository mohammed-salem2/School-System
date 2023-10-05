<div class="card-header">
    <form action="" method="get" style="margin-bottom:2%">
        <div class="row">
            @foreach ($filters as $filter)
                <div class="input-icon col-md-3">
                    <input type="text" class="form-control" placeholder="{{ $filter['placeholder'] }}"
                        name="{{ $filter['name'] }}"
                        @if (request()->has($filter['name'])) value="{{ request()->input($filter['name']) }}" @endif>
                    <span>
                        <i class="flaticon2-search1 text-muted"></i>
                    </span>
                </div>
            @endforeach
            {{-- <div class="input-icon col-md-4">
                <input type="text" class="form-control" placeholder="Search By Description" name="description"
                @if (request()->description)
                vlaue={{ request()->description }}
                @endif >
                <span>
                    <i class="flaticon2-search1 text-muted"></i>
                </span>
            </div> --}}
            <div class="col-md-{{ $colbtn }}">
                <button class="btn btn-success btn-md" type="submit">Fliter</button>
                <a href="{{ route($trash) }}" class="btn btn-danger">Finish Fliter</a>
                <a href="{{ route($index) }}" type="submit" class="btn btn-info">{{ $name }}</a>
                <a href="{{ route($restoreall) }}" type="submit" class="btn btn-info">Restore All Data</a>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table table-hover table-rounded table-striped border gy-7 gs-7">
        <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                @foreach ($ths as $th)
                    <th>{{ __($th) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $model)
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
                            <a href="{{ route($restore, $model->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-trash-restore"></i>
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
                                            Are you sure you want to delete the item?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route($deleteforce, $model->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $models->links() }}
</div>
